var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var place = new google.maps.LatLng(-25.363882,131.044922);

function createHTMLDOOM(){
    directionsDisplay = new google.maps.DirectionsRenderer();
    var mapcanvas = document.createElement('div');
    mapcanvas.id = 'mapcontainer';
    mapcanvas.style.height = '400px';
    mapcanvas.style.width = '580px';

    document.querySelector('#map').appendChild(mapcanvas);
}

function createMap(){
    var mapOptions = {
        mapTypeControl: true,
        center: place,
        zoom: 4
    };
    return new google.maps.Map(document.getElementById("mapcontainer"), mapOptions);
}

function addMark(map){
    var marker = new google.maps.Marker({
        position: place,
        map: map,
        title: 'Hello World!'
    });
}
function showMap(){
    createHTMLDOOM();
    map = createMap();
    addMark(map);
    directionsDisplay.setMap(map);
}

showMap();
