
var map;

var autocomplete1;
var autocomplete2;

var departurePlace = null;
var arrivalPlace = null;

var places = [];
var itinerary = [];
var userPolylines = [];
var allMarkers = [];
var userMarkers = [];
var users = [];

var coords = new Array();
var allPolylines = Array();

function initAutocomplete() {
	autocomplete1 = new google.maps.places.Autocomplete(
		/** @type {!HTMLInputElement} */(document.getElementById('autocomplete1')),
		{types: ['(cities)']});
		
	autocomplete2 = new google.maps.places.Autocomplete(
		/** @type {!HTMLInputElement} */(document.getElementById('autocomplete2')),
		{types: ['(cities)']});
	
	autocomplete1.addListener('place_changed', function () {
		departurePlace = autocomplete1.getPlace();
	});
	
	autocomplete2.addListener('place_changed', function () {
		arrivalPlace = autocomplete2.getPlace();
	});
}

$("#clearRoute").click(function() {
	bootbox.confirm("Are you sure you want to clear your itinerary?", function(result) {
		if(result == true) {
			eraseAllPolylines();
			// Erase all markers
			userMarkers.forEach(function(marker) {
				marker.setMap(null);
			});
			userMarkers = [];
			itinerary = [];
			$("#autocomplete1").val("");
			$("#autocomplete2").val("");
			//autocomplete1.set('place',null);
			//autocomplete2.set('place',null);
			places = [];
			departurePlace = null;
			arrivalPlace = null;
			
			initAutocomplete();
		}
	});
});

$("#addRoute").click(function() {
	if(departurePlace == null || arrivalPlace ==  null || 
		$("#dtDeparture input").val().length == 0 || $("#dtArrival input").val().length == 0 || 
		typeof($('#transportation input:radio:checked').val()) === "undefined") {
		bootbox.alert("Please make sure to select proper departure and arrival information for your route and specify the transportation.");
		return;
	}

	//if($("#dtArrival input").val() < $("#dtArrival input").val() {
	//	bootbox.alert("The arrival date and time is earlier than the departure.");
	//	return;
	//}

	var route = {
		departurePlace: departurePlace,
		arrivalPlace: arrivalPlace,
		departureDateTime: $("#dtDeparture input").val(),
		arrivalDateTime: $("#dtArrival input").val(),
		transportation: $('#transportation input:radio:checked').val(),
		flight: $("#flight").val(),
		airline: $("#airline").val(),
		price: $("#price").val(),
		note: $("#note").val()
	};
	
	//alert(JSON.stringify(route));
	
	places.push(departurePlace);
	places.push(arrivalPlace);
	//alert(JSON.stringify(departurePlace));
	itinerary.push(route);
	
	departurePlace = arrivalPlace;
	autocomplete1 = autocomplete2;
	arrivalPlace = null;
	$("#autocomplete1").val($("#autocomplete2").val());
	$("#autocomplete2").val("");
	$("#dtDeparture input").val("");
	$("#dtArrival input").val("");
	$("#transportation input").removeClass("active");
	$("#flight").val("");
	$("#airline").val("");
	$("#price").val("");
	$("#note").val("");
	
	placeItineraryMarkers(places);
	drawItineraryPolylines();
});

function placeItineraryMarker(place, icon) {
	if(icon == null || typeof(icon) === 'undefined')
		icon = "";
	else
		icon = {
			fontFamily: 'Fontawesome', text: icon
		};
	
	var marker = new google.maps.Marker({
		map: map,
		label: icon,
		title: place.name,
		position: place.geometry.location
	});
	
	userMarkers.push(marker);
}

function placeItineraryMarkers() {
	$('#placesList').html("");

	itinerary.forEach(function(e) {
		var icon = faIcons[e["transportation"]];
		placeItineraryMarker(e["departurePlace"], icon);
		placeItineraryMarker(e["arrivalPlace"], null);
	});
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate1() {
	geolocate(autocomplete1);
}

function geolocate2() {
	geolocate(autocomplete2);
}

function geolocate(obj) {
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
		var geolocation = {
		  lat: position.coords.latitude,
		  lng: position.coords.longitude
		};
		var circle = new google.maps.Circle({
		  center: geolocation,
		  radius: position.coords.accuracy
		});
		obj.setBounds(circle.getBounds());
	  });
	}
}

function drawItineraryPolylines() {
	eraseAllPolylines();
	
	var placesListHtml = getPlacesListHtml();
	
	// Draw new polylines
	itinerary.forEach(function(e) {
		var polyline = new google.maps.Polyline({
			path: [ e["departurePlace"].geometry.location, e["arrivalPlace"].geometry.location ],
			geodesic: true,
			strokeColor: transpLineColor[e["transportation"]],
			strokeOpacity: 0,
			fillOpacity: 0,
			icons: [ transpLineStyle[e["transportation"]] ],
			map: map
		});

		allPolylines.push(polyline);
		
		// Add a listener for the click event
		google.maps.event.addListener(polyline, 'click', function() {
			bootbox.alert(placesListHtml);
		});
	});
}

function usersListHtml(usersList, showArrivalTime) {
	var html = "";
	
	for (var i=0, len = usersList.length; i < len; i++) {
		//$("#logs").html(JSON.stringify(usersList));
		//var zeusCode = usersList[i];
		var u = usersList[i];//= users[zeusCode];
		var iconTransportation = "<i class='fa' aria-hidden='true'>"+faIcons[u["transportation"]]+"</i>";
		html += '<p>'+iconTransportation+" <a href='?zeusCode="+u["zeusCode"]+"' target='_blank'>"+u["name"]+"</a> - "+u["antenna"];
		if(showArrivalTime == true)
			html += ' arriving on ' + u["arrivalDateTime"];
		else
			html += ' on ' + u["departureDateTime"];
		html += '</p>';
	}
	
	return html;
}

function infoHtml(info) {
	var html = "";
	
	html += info["counter"] + " participants on the route " + info["departure"] + " => " + info["arrival"] + "<hr />";
	
	html += usersListHtml(info["users"]);
	
	return html;
}

function eraseAllPolylines() {
	// Erase all polylines
	allPolylines.forEach(function(polyline) {
		polyline.setMap(null);
	});
	allPolylines = Array();
	// Erase all markers
	allMarkers.forEach(function(marker) {
		marker.setMap(null);
	});
	allMarkers = Array();
}

function drawAllPolylines(itineraries, markers, insertMode) {
	eraseAllPolylines();
			
	// Draw new polylines
	for(var k in itineraries) {		
		var polyline = new google.maps.Polyline({
			path: JSON.parse("["+k+"]"),
			geodesic: true,
			strokeOpacity: 1,
			strokeColor: (insertMode == true) ? "#AA444444" : "#0089dd",//getRandomColor(),
			strokeWeight: (insertMode == true) ? 1 : 2,
			icons: [ transpLineStyle["plane"] ],
			map: map
		});

		allPolylines.push(polyline);
		
		var html = infoHtml(itineraries[k]);
		
		if(insertMode != true)
			polylineAppendClickEvent(polyline, html);
	}

	if(insertMode != true)
		$.each(markers, function(k, v) {
			var markerUsers = v["users"];
			var markerName = v["name"];
			
			var marker = new google.maps.Marker({
			  position: JSON.parse(k),
			  map: map,
			  title: markerName
			});
			
			allMarkers.push(marker);
			
			var text = usersListHtml(markerUsers, true);

			marker.addListener('click', function() {
				bootbox.alert({ message: text, title: markerName });
			});
		});
}

function polylineAppendClickEvent(path, text) {
	// Add a listener for the click event
	google.maps.event.addListener(path, 'click', function(p) {
		bootbox.alert(text);
	});
}

function loadAllItineraries(insertMode, doneFunc, departuredt) {
	if(typeof(departuredt) === "undefined") departuredt = "";

	//alert("itineraries-service.php?action=all&departuredt="+departuredt);
	$.ajax({url: "itineraries-service.php?action=exp&departuredt="+departuredt, method: "get", success: function(result){
		//$("#logs").html(result);
		var o = JSON.parse(result);
		
		itineraries = o['itineraries'];
		users = o['users'];
		markers = o['markers'];
		
		//itinerary = JSON.parse(result['itineraryJson']);
		drawAllPolylines(itineraries, markers, insertMode);
		
		if(typeof(doneFunc) !== undefined)
			doneFunc();
	}});
}

function getPlacesListHtml() {
	var html = "";
	
	if(itinerary != null)
		itinerary.forEach(function(e) {
			var iconTransportation = "<i class='fa' aria-hidden='true'>"+faIcons[e["transportation"]]+"</i>";
			html += '<p>' + iconTransportation + "&nbsp;";
			html += e["departurePlace"].name + " (" + e["departureDateTime"] + ") -> " + e["arrivalPlace"].name +  " (" + e["arrivalDateTime"] + ")</p>";
			if(e["flight"].length > 0 ||  e["airline"].length > 0 || e["price"].length > 0) {
				html += "<p class='left15'>";
				if(e["flight"].length > 0) html += "<span class='right15'><b>Flight</b> " + e["flight"] + "</span>";
				if(e["airline"].length > 0) html += "<span class='right15'><b>Airline</b> " + e["airline"] + "</span>";
				if(e["price"].length > 0) html += "<span class='right15'><b>Price</b> " + e["price"] + "</span>";
				html += "</p>";
			}
			if(e["note"].length > 0) {
				html += "<p class='left15'>";
				if(e["note"].length > 0) html += "<b>Note</b><i> " + e["note"] + "</i> ";
				html += "</p>";
			}
			//$("#logs").html(JSON.stringify(e));
		});
	
	return html;
}

function initMap() {
	dottedLine['path'] = google.maps.SymbolPath.CIRCLE;
	
	coords['catania'] = { lat: 37.505127, lng: 15.097429 };
	coords['star'] = { lat: 37.872181, lng: 15.097429 };
	
	// Init map
	map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 4,
	  center: {lat: 47.583721, lng: 12.337369},
	  mapTypeId: 'terrain'
	});
	
	// Catania Star
	var marker = new google.maps.Marker({
		position: coords['catania'],
		icon: goldStarMarker,
		map: map
	});
	
	initAutocomplete();
	
	if(insert == true) {
		$("body").removeClass("all");
		$("body").addClass("insert");
		loadAllItineraries(true, function() { });
	} else if(zeusCode != null) {
		loadAllItineraries(true, function() {
			$("body").removeClass("all");
			if(edit != null && edit == true)
				$("body").addClass("edit");
			
			$.ajax({url: "itineraries-service.php?action=profile&zeusCode="+zeusCode, method: "get", success: function(result){
				//$("#logs").html(result);
				result = JSON.parse(result);
				$("#zeusCode").val(result['zeusCode']);
				$("#name").val(result['name']);
				$("#surname").val(result['surname']);
				$("#antenna").val(result['antenna']);
				$("#email").val(result['email']);
				$("#mobile").val(result['mobile']);
				
				itinerary = JSON.parse(result['itineraryJson']);
				drawItineraryPolylines();
				
				// Print Itinerary
				var placesListHtml = getPlacesListHtml();
				$("#PlacesList").html(placesListHtml);
			}});
		});
	} else {
		$("body").addClass("all");
		loadAllItineraries(false, function() { });
	}
	
	// Tests
	//addLiverpoolMarker(map);
	//addLiverpoolCataniaRoute(map);
}
