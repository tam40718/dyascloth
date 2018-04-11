var map = L.map('map');

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var control = L.Routing.control({
	waypoints: [
        L.latLng(-7.9658969,112.6052842),
        L.latLng(-7.982609,112.6286752),
        L.latLng(-7.9878004,112.6306022),
        L.latLng(-7.9877997,112.6240361)
	],
	geocoder: L.Control.Geocoder.nominatim(),
    routeWhileDragging: true,
    reverseWaypoints: true,
    showAlternatives: true,
    altLineOptions: {
        styles: [
            {color: 'black', opacity: 0.15, weight: 9},
            {color: 'white', opacity: 0.8, weight: 6},
            {color: 'blue', opacity: 0.5, weight: 2}
        ]
    }
}).addTo(map);

L.Routing.errorControl(control).addTo(map);