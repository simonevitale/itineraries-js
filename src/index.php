<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta property="og:image" content="http://www.agoracatania.eu/itineraries/images/logo-agora-catania-outlined.png" />
		
		<title>Participants Itineraries</title>
		
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		
		<!-- Latest compiled and minified Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="./libs/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css" />
	</head>
  
  <body class="all">
	<div class="container-fluid">
		<div class="row map-container">
			<div id="map"></div>
			<img id="logo" src="images/logo-agora-catania.png" />
		</div>
	</div>

	<div class="container" style="margin-top: 15px">
	
	<form id="itineraryForm" method="post" action="itineraries-service.php">
		<h1>Share your journey information</h1>
		<hr />
	
		<h2>Provide your basic information</h2>
			
		<!-- User Data 1 -->
		<div class="row">
			<div class="form-group">
				<label class="control-label col-sm-1" for="zeusCode">Zeus Code*</label>
				<div class="col-sm-3">
					<div class="input-group">
						<span class="input-group-addon">213 -</span>
						<input type="text" maxlength="4" class="form-control" id="zeusCode" placeholder="Enter zeus code" name="zeusCode">
					</div>
				</div>

				<label class="control-label col-sm-1" for="name">Name*</label>
				<div class="col-sm-3">          
					<input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
				</div>

				<label class="control-label col-sm-1" for="surname">Surname*</label>
				<div class="col-sm-3">          
					<input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname">
				</div>
			</div>
		</div>
		
		<!-- User Data 2 -->
		<div class="row">
			<div class="form-group">
				<label class="control-label col-sm-1" for="antenna">Antenna</label>
				<div class="col-sm-3">
					<select id="antenna" class="form-control" placeholder="Enter antenna" name="antenna">
						<option></option>
						<option>AEGEE Academy</option>
						<option>AEGEE Election Observation</option>
						<option>AEGEE-Gold</option>
						<option>Action Agenda Committee</option>
						<option>Audit Commission</option>
						<option>Chair</option>
						<option>Comité Directeur</option>
						<option>Europe on Track</option>
						<option>Juridical Commission</option>
						<option>Mediation Commission</option>
						<option>Network Commission</option>
						<option>Former Comité Directeur</option>
						<option>Civic Education Working Group</option>
						<option>Corporate and Institutional Relations Committee</option>
						<option>Equal Rights Working Group</option>
						<option>European Citizenship Working Group</option>
						<option>Human Resources Committee</option>
						<option>Information Technology Committee</option>
						<option>Key-to-Europe</option>
						<option>Language Interest Group</option>
						<option>Liaison Office</option>
						<option>Migration Interest Group</option>
						<option value="ORG">Organizers & Helpers</option>
						<option>Quality Assurance Committee</option>
						<option>Youth Development Working Group</option>
						<option>Summer University Project</option>
						<option>The AEGEEan</option>
						<option>Your Vision for EUrope</option>
						<option>AEGEE-A Coruna</option>
						<option>AEGEE-Aachen</option>
						<option>AEGEE-Agrigento</option>
						<option>AEGEE-Alicante</option>
						<option>AEGEE-Amsterdam</option>
						<option>AEGEE-Ankara</option>
						<option>AEGEE-Athina</option>
						<option>AEGEE-Bakı</option>
						<option>AEGEE-Bamberg</option>
						<option>AEGEE-Barcelona</option>
						<option>AEGEE-Bari</option>
						<option>AEGEE-Beograd</option>
						<option>AEGEE-Bergamo</option>
						<option>AEGEE-Berlin</option>
						<option>AEGEE-Bialystok</option>
						<option>AEGEE-Bilbao</option>
						<option>AEGEE-Bologna</option>
						<option>AEGEE-Bratislava</option>
						<option>AEGEE-Brescia</option>
						<option>AEGEE-Brno</option>
						<option>AEGEE-Brussel-Bruxelles</option>
						<option>AEGEE-Bucureşti</option>
						<option>AEGEE-Budapest</option>
						<option>AEGEE-Burgos</option>
						<option>AEGEE-Cagliari</option>
						<option>AEGEE-Castelló</option>
						<option>AEGEE-Catania</option>
						<option>AEGEE-Chişinău</option>
						<option>AEGEE-Cluj-Napoca</option>
						<option>AEGEE-Darmstadt</option>
						<option>AEGEE-Debrecen</option>
						<option>AEGEE-Delft</option>
						<option>AEGEE-Dresden</option>
						<option>AEGEE-Düsseldorf</option>
						<option>AEGEE-Eindhoven</option>
						<option>AEGEE-Enschede</option>
						<option>AEGEE-Erfurt</option>
						<option>AEGEE-Eskişehir</option>
						<option>AEGEE-Ferrara</option>
						<option>AEGEE-Firenze</option>
						<option>AEGEE-Frankfurt am Main</option>
						<option>AEGEE-Gaziantep</option>
						<option>AEGEE-Gdańsk</option>
						<option>AEGEE-Genova</option>
						<option>AEGEE-Gliwice</option>
						<option>AEGEE-Gold</option>
						<option>AEGEE-Grodno</option>
						<option>AEGEE-Groningen</option>
						<option>AEGEE-Hamburg</option>
						<option>AEGEE-Heidelberg</option>
						<option>AEGEE-Heraklio</option>
						<option>AEGEE-Iaşi</option>
						<option>AEGEE-Ioannina</option>
						<option>AEGEE-Istanbul</option>
						<option>AEGEE-Izmir</option>
						<option>AEGEE-Kaiserslautern</option>
						<option>AEGEE-Katowice</option>
						<option>AEGEE-Kharkiv</option>
						<option>AEGEE-Köln</option>
						<option>AEGEE-Kraków</option>
						<option>AEGEE-Kyïv</option>
						<option>AEGEE-Las Palmas</option>
						<option>AEGEE-Leiden</option>
						<option>AEGEE-León</option>
						<option>AEGEE-Leuven</option>
						<option>AEGEE-Lille</option>
						<option>AEGEE-Lisboa</option>
						<option>AEGEE-Ljubljana</option>
						<option>AEGEE-London</option>
						<option>AEGEE-Lublin</option>
						<option>AEGEE-Lviv</option>
						<option>AEGEE-Maastricht</option>
						<option>AEGEE-Madrid</option>
						<option>AEGEE-Mağusa</option>
						<option>AEGEE-Mainz-Wiesbaden</option>
						<option>AEGEE-Málaga</option>
						<option>AEGEE-Manchester</option>
						<option>AEGEE-Mannheim</option>
						<option>AEGEE-Maribor</option>
						<option>AEGEE-Messina</option>
						<option>AEGEE-Milano</option>
						<option>AEGEE-Moskva</option>
						<option>AEGEE-Muğla</option>
						<option>AEGEE-München</option>
						<option>AEGEE-Napoli</option>
						<option>AEGEE-Nijmegen</option>
						<option>AEGEE-Niš</option>
						<option>AEGEE-Novi Sad</option>
						<option>AEGEE-Osnabrück</option>
						<option>AEGEE-Oviedo</option>
						<option>AEGEE-Padova</option>
						<option>AEGEE-Palermo</option>
						<option>AEGEE-Passau</option>
						<option>AEGEE-Pécs</option>
						<option>AEGEE-Pisa</option>
						<option>AEGEE-Ploiesti</option>
						<option>AEGEE-Plzeň</option>
						<option>AEGEE-Porto</option>
						<option>AEGEE-Poznań</option>
						<option>AEGEE-Praha</option>
						<option>AEGEE-Reggio Calabria</option>
						<option>AEGEE-Riga</option>
						<option>AEGEE-Roma</option>
						<option>AEGEE-Rostov-na-Donu</option>
						<option>AEGEE-Ryazan</option>
						<option>AEGEE-Salerno</option>
						<option>AEGEE-Samara</option>
						<option>AEGEE-Sankt-Peterburg</option>
						<option>AEGEE-Santander</option>
						<option>AEGEE-Sheffield</option>
						<option>AEGEE-Siena</option>
						<option>AEGEE-Skopje</option>
						<option>AEGEE-Sofia</option>
						<option>AEGEE-Stuttgart</option>
						<option>AEGEE-Sumqayit</option>
						<option>AEGEE-Tallinn</option>
						<option>AEGEE-Tarragona</option>
						<option>AEGEE-Tartu</option>
						<option>AEGEE-Tbilisi</option>
						<option>AEGEE-Tenerife</option>
						<option>AEGEE-Thessaloníki</option>
						<option>AEGEE-Tilburg</option>
						<option>AEGEE-Torino</option>
						<option>AEGEE-Toulouse</option>
						<option>AEGEE-Tyumen</option>
						<option>AEGEE-Udine</option>
						<option>AEGEE-Utrecht</option>
						<option>AEGEE-Valencia</option>
						<option>AEGEE-Valladolid</option>
						<option>AEGEE-Valletta</option>
						<option>AEGEE-Verona</option>
						<option>AEGEE-Vigo</option>
						<option>AEGEE-Voronezh</option>
						<option>AEGEE-Warszawa</option>
						<option>AEGEE-Wien</option>
						<option>AEGEE-Wroclaw</option>
						<option>AEGEE-Yerevan</option>
						<option>AEGEE-Zagreb</option>
						<option>AEGEE-Zaragoza</option>
					</select>
				</div>

				<label class="control-label col-sm-1" for="email">E-mail</label>
				<div class="col-sm-3">          
					<input type="text" class="form-control" id="email" placeholder="Enter e-mail" name="email">
				</div>

				<label class="control-label col-sm-1" for="mobile">Mobile</label>
				<div class="col-sm-3">          
					<input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="mobile">
				</div>
			</div>
		</div>
		
		<hr />
		
		<!-- Build your itinerary to Catania -->
		<div class="route-box">
			<h2>Build your itinerary to Catania</h2>
			
			<div class="row">
				<div class="form-group">
					<label class="control-label col-sm-2" for="autocomplete1">Departure from*</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="autocomplete1" placeholder="Enter your departure place (e.g. airport or station)" onFocus="geolocate()"></input>
					</div>
					
					<label class="control-label col-sm-1" for="dtDeparture">at*</label>
					<div class="col-sm-3">
						<div class='input-group date' id='dtDeparture'>
							<input type='text' class="form-control" />
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<label class="control-label col-sm-2" for="autocomplete2">Arrival to*</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="autocomplete2" placeholder="Enter your arrival place (e.g. airport or station)" onFocus="geolocate()"></input>
					</div>
					
					<label class="control-label col-sm-1" for="dtArrival">at*</label>
					<div class="col-sm-3">
						<div class='input-group date' id='dtArrival'>
							<input type='text' class="form-control" />
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
			</div>
				
			<!-- Transportation -->
			<div class="row">
				<div class="form-group">
					<label class="control-label col-sm-2" for="transportation">By*</label>
					<div class="btn-group col-sm-10" id="transportation" data-toggle="buttons">
						<label class="btn btn-primary">
							<input type="radio" name="options" id="option1" value="plane"><i class="fa fa-plane" aria-hidden="true"></i> Plane
						</label>
						<label class="btn btn-primary">
							<input type="radio" name="options" id="option2" value="train"><i class="fa fa-train" aria-hidden="true"></i> Train
						</label>
						<label class="btn btn-primary">
							<input type="radio" name="options" id="option3" value="boat"><i class="fa fa-ship" aria-hidden="true"></i> Boat
						</label>
						<label class="btn btn-primary">
							<input type="radio" name="options" id="option4" value="couch"><i class="fa fa-bus" aria-hidden="true"></i> Couch / Bus
						</label>
						<label class="btn btn-primary">
							<input type="radio" name="options" id="option5" value="car"><i class="fa fa-car" aria-hidden="true"></i> Car
						</label>
						<label class="btn btn-primary">
							<input type="radio" name="options" id="option6" value="taxi"><i class="fa fa-taxi" aria-hidden="true"></i> Taxi
						</label>
						<label class="btn btn-primary">
							<input type="radio" name="options" id="option7" value="thumbs-up"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Hitchhiking
						</label>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<label class="control-label col-sm-1" for="flight">Flight/Transp. Number</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="flight" placeholder="Enter your flight or other transportation number"></input>
					</div>
				
					<label class="control-label col-sm-1" for="airline">Airline or transportation company</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="airline" placeholder="Enter your airline or transportation company"></input>
					</div>
				
					<label class="control-label col-sm-1" for="price">Price</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="price" placeholder="Enter the amount you paid for this journey"></input>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<label class="control-label col-sm-1" for="note">Note</label>
					<div class="col-sm-11">
						<input type="text" class="form-control" id="note" placeholder="Enter additional notes"></input>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-2">
					<button id="clearRoute" type="button" class="btn btn-warning">Clear Route</button>
				</div>
				<div class="col-sm-offset-8 col-sm-2 text-right">
					<button id="addRoute" type="button" class="btn btn-info">Add Route</button>
				</div>
			</div>
			
			<hr />
		</div>
		
		<div id="PlacesList"></div>
		
		<div class="submit-box">
			<p>The aim of this tool is only to share potentially useful travel information with other <i>aegeeans</i> and show it visually on a dynamic map.</p>
			<p>We will not disclose your personal data or any other personal data provided by you to us to any third party or use it for a different purpose than the one mentioned above.</p>
			
			<p>Please take a second to read and understand.</p>
			
			<p>By flagging these clauses you will authorize us to</p>
			
			<div class="row">
				<div class="col-sm-10">
					<div class="checkbox">
					  <label><input id="publishContact" name="publishContact" type="checkbox" checked>Publish your contact information to other users in order to allow other people to get in touch with you (only participants in possession of the URL can see these informations).</label>
					  <label><input id="publishItinerary" name="publishItinerary" type="checkbox" checked>Publish the itinerary data you are providing on a public map.*</label>
					</div>
				</div>

				<div class="col-sm-2 text-right">
					<button type="submit" name="submit" id="itineraryFormSubmit" class="btn btn-primary">Submit Form</button>
				</div>
			</div>
		</div>
	</form>

	<div class="row guide-box">
		<h1>How participants get to Catania</h1>
		
		<p class="text-center">Each line in the map represents a route that one or more participants is taking to get to Catania.</p>
		<p class="text-center"><strong>Click on a line or a marker</strong> to get travel and contact information about other participants.</p>

		<div class="col-sm-offset-2">
			<label class="control-label col-xs-1 col-sm-2 text-right" for="dtDepartureFilter">Filter by</label>
			<div class="col-xs-9 col-sm-6">
				<div class='input-group date' id='dtDepartureFilter'>
					<input type='text' class="form-control" />
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			<button type="button" class="btn btn-warning col-xs-2 col-sm-2 col-md-1" id="resetDepartureFilter">Reset</button>
		</div>
		
		<br /><br />
		
		<button type="button" data-date="2017-09-24" 
			class="col-sm-1 col-xs-2 col-sm-offset-3 btn btn-link filter-date-button">24/09</button>
		
		<button type="button" data-date="2017-09-25" 
			class="col-sm-1 col-xs-2 btn btn-link filter-date-button">25/09</button>
		
		<button type="button" data-date="2017-09-26" 
			class="col-sm-1 col-xs-2 btn btn-link filter-date-button">26/09</button>
		
		<button type="button" data-date="2017-09-27" 
			class="col-sm-1 col-xs-2 btn btn-link filter-date-button">27/09</button>
		
		<button type="button" data-date="2017-09-28" 
			class="col-sm-1 col-xs-2 btn btn-link filter-date-button">28/09</button>
		
		<button type="button" data-date="2017-09-29" 
			class="col-sm-1 col-xs-2 btn btn-link filter-date-button hidden-xs">29/09</button>
		
		<br /><br /><br />
		
		<button type="button" class="btn btn-primary col-xs-offset-1 col-sm-offset-4 col-xs-10 col-sm-4" id="insertItinerary">Add your Itinerary</button>
		
	</div>
	
	<hr />
	
	<p class="text-center">For any problem or question feel free to <a href="mailto:incoming@agoracatania.eu?subject=Itinerary%20Map%20Support">contact us clicking here</a>.</p>
	
	<div id="logs"></div>
	
	</div>
	
	<script>
		<!-- Retrieve GET params -->
		var insert = <?  echo (isset($_GET["insert"])) ? $_GET["insert"] : "false"; ?>;
		var zeusCode = <? echo (isset($_GET["zeusCode"])) ? "'".$_GET["zeusCode"]."'" : "null"; ?>;
		var edit = <?  echo (isset($_GET["edit"])) ? $_GET["edit"] : "false"; ?>;
		//var departuredt = "";
	</script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="./libs/moment.min.js"></script>
	<!-- Latest compiled Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./libs/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script src="./libs/bootbox.min.js"></script>
	<script src="./libs/jquery.form.min.js"></script>
	<script src="./symbols.js"></script>
	<script src="./utils.js"></script>
	<script src="./itineraries.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpnCSBhvcRHcCreMIytGwCxGh1HWSuUT0&libraries=places&callback=initMap&language=en">
    </script>

	<script>
	
		function validate(formData, jqForm, options) { 
			// jqForm is a jQuery object which wraps the form DOM element 
			// 
			// To validate, we can access the DOM elements directly and return true 
			// only if the values of both the username and password fields evaluate 
			// to true 
		 
			var form = jqForm[0]; 
			if (!form.username.value || !form.password.value) { 
				alert('Please enter a value for both Username and Password'); 
				return false; 
			} 
			alert('Both fields contain values.'); 
		}
		
		function getItineraryJson() {
			itinerary.forEach(function(e) {
				e["departurePlace"]["photos"] = [];
				e["arrivalPlace"]["photos"] = [];
			});
			
			itJson = JSON.stringify(itinerary);
			
			//$("#logs").html(itJson);
			
			return itJson;
		}

		$(function () {
			$("#zeusCode").keypress(function (e) {
				//if the letter is not digit then display error and don't type anything
				if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
					//$("#errmsg").html("Digits Only").show().fadeOut("slow");
					return false;
				}
			});
			
			$('#itineraryForm').on('keyup keypress', function(e) {
			  var keyCode = e.keyCode || e.which;
			  if (keyCode === 13) { 
				e.preventDefault();
				return false;
			  }
			});
			
			$('#dtDeparture').datetimepicker({
				format: "YYYY-MM-DD H:mm",
                sideBySide: true
            });
			
			$("#dtDeparture").on("dp.change", function (e) {
				$('#dtArrival').data("DateTimePicker").minDate(e.date);
			});
			
			$('#dtArrival').datetimepicker({
				format: "YYYY-MM-DD H:mm",
                sideBySide: true
            });

			$('#dtDepartureFilter').datetimepicker({
				format: "YYYY-MM-DD"
            });
			
			$("#dtDepartureFilter").on("dp.change", function (e) {
				departuredt = $("#dtDepartureFilter input").val();
				loadAllItineraries(false, function() { }, departuredt);
			});

			$(".filter-date-button").click(function() {
				$("#dtDepartureFilter input").val($(this).data("date"));
				departuredt = $("#dtDepartureFilter input").val();
				loadAllItineraries(false, function() { }, departuredt);
			});
			
			$("#antenna").on("change", function (e) {
				if($("#antenna").val() == "ORG") {
					$("#zeusCode").val("ORG");
					$("#zeusCode").attr("disabled", "disabled");
				} else {
					if($("#zeusCode").val() == "ORG")
						$("#zeusCode").val("");
					$("#zeusCode").removeAttr("disabled");
				}
			});

			$("#resetDepartureFilter").click(function() {
				departuredt = "";
				$("#dtDepartureFilter input").val("");
				loadAllItineraries(false, function() { }, departuredt);
			});
			
			$("#insertItinerary").click(function() {
				window.location.href = "?insert=true";
			});
			
			// prepare Options Object 
			var options = {
				url: 'itineraries-service.php',
				beforeSubmit: function (formData, jqForm, options) {
					var publishContact = $('#publishContact:checked').length > 0;
					var publishItinerary = $('#publishItinerary:checked').length > 0;
					var itineraryJson = getItineraryJson();
					
					formData.push({ name: "action", value: "insert" });
					formData.push({ name: "itineraryJson", value: itineraryJson });
					formData.push({ name: "publishItinerary", value: publishItinerary });
					formData.push({ name: "publishContact", value: publishContact });
					
					if($("#antenna").val() != "ORG" && ($("#zeusCode").val().length != 4)) {
						bootbox.alert("The Zeus Code must be 4 digits.");
						return false; // prevent the form from being submitted
					}
					
					if(($("#name").val().length == 0) || ($("#surname").val().length == 0)) {
						bootbox.alert("You need to fill all required fields. Zeus Code, Name and Surname are required.");
						return false; // prevent the form from being submitted
					}
					
					if(publishItinerary == false) {
						bootbox.alert("You must tick the box to authorize us to show your itinerary in a public map");
						return false;
					}
					
					/*if(publishContact == false) {
						bootbox.confirm("You haven't authorized to publish your contact information. In this way, on the map there will be shown only your route anonymously. Would you like to reconsider to tick the authorization box?", function(result){ 
							if(result == "yes")
								return false;
						});
					}*/
					
					return true;
				},
				success: function(d) {
					if(d == "OK") {
						bootbox.alert("<strong>Thanks!</strong> We have stored your travel information, which will be shown on a dynamic map, along with all the others. :)", function() { window.location.href = "/itineraries"; });
					} else {
						bootbox.alert("Success: " + d);
					}
				},
				error: function (data){
					alert(JSON.stringify(data));
				}
			};
			 
			// pass options to ajaxForm
			$('#itineraryForm').ajaxForm(options);
		});
	</script>
  </body>
</html>