var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var place = new google.maps.LatLng(-25.363882,131.044922);

function createHTMLDOOM(){
    directionsDisplay = new google.maps.DirectionsRenderer();
    var mapcanvas = document.createElement('div');
    mapcanvas.id = 'mapcontainer';
    mapcanvas.style.height = '400px';
    mapcanvas.style.width = '500px';

    document.querySelector('#map').appendChild(mapcanvas);
}

function createMap(){
    var mapOptions = {
        mapTypeControl: false,
        streetViewControl: false,
        panControl: false,
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

function createAutoComplete(){
    new google.maps.places.Autocomplete(
        (document.getElementById('location')), {
        types: ['geocode']
    });
}
function onPlaceChanged() {
    var place = autocomplete.getPlace();
    if (place.geometry) {
        map.panTo(place.geometry.location);
        map.setZoom(15);
    } else {
        document.getElementById('location').placeholder = 'Enter a city';
    }

}
function showMap(){
    createHTMLDOOM();
    map = createMap();
    directionsDisplay.setMap(map);
    autocomplete = new google.maps.places.Autocomplete( document.getElementById('location'),
    {
        types: ['(cities)']
    });
    places = new google.maps.places.PlacesService(map);

    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
}

showMap();
