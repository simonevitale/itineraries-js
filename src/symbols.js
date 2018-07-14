// Fontawesome Styles

var faIcons = new Array();

faIcons['thumbs-up'] = "\uf164";
faIcons['car'] = "\uf1b9";
faIcons['taxi'] = "\uf1ba";
faIcons['couch'] = "\uf207";
faIcons['train'] = "\uf238";
faIcons['boat'] = "\uf21a";
faIcons['plane'] = "\uf072";

// Marker Styles

var goldStarMarker = {
	//path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
	path: 'M 25,-95 55,-10 145,-10 75,45 100,130 25,80 -50,130 -25,45 -95,-10 -5,-10 z', //well x-offset
	fillColor: 'yellow',
	fillOpacity: 1,
	scale: 0.08,
	strokeColor: 'gold',
	strokeWeight: 1
};

var emptyMarker = {
	path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
	fillOpacity: 0.01,
	scale: 1,
	strokeWeight: 0
};

// Polyline Styles

// Define symbols using SVG path notation

var dottedLine = {
	path: '', // To be initialized
	strokeOpacity: 1,
	fillOpacity: 1,
	scale: 1
};

var dashedLine = {
	path: 'M 0,-2 0,2',
	strokeOpacity: 1,
	scale: 1.5
};

var line = {
	path: 'M 0,-1 0,1',
	strokeOpacity: 1,
	scale: 2
};

var transpLineColor = new Array();

transpLineColor['thumbs-up'] = '#dd0000';
transpLineColor['car'] = '#e20ef1';
transpLineColor['taxi'] = '#f00e65';
transpLineColor['couch'] = '#49e3f4';
transpLineColor['boat'] = '#20b531';
transpLineColor['train'] = '#ba1d47';
transpLineColor['plane'] = '#ffb454';

var transpLineStyle = new Array();

transpLineStyle['thumbs-up'] = {
				icon: dottedLine,
				offset: '0',
				repeat: '6px'
			};
			
transpLineStyle['car'] = {
				icon: dottedLine,
				offset: '0',
				repeat: '10px'
			};
			
transpLineStyle['taxi'] = {
				icon: dottedLine,
				offset: '0',
				repeat: '10px'
			};
			
transpLineStyle['couch'] = {
				icon: dottedLine,
				offset: '0',
				repeat: '10px'
			};
			
transpLineStyle['boat'] = {
				icon: dashedLine,
				offset: '0',
				repeat: '15px'
			};
			
transpLineStyle['train'] = {
				icon: dashedLine,
				offset: '0',
				repeat: '15px'
			};
			
transpLineStyle['plane'] = {
				icon: line,
				offset: '0',
				repeat: '1px'
			};