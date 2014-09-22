var map;
var origin = new google.maps.LatLng(19.429570, -99.131585);
var markers = [];
var mapOptions = {
    mapTypeControl: false,
    streetViewControl: false,
    panControl: false,
    center: origin,
    zoom: 12
};

function createHTMLDOOM(){
    var mapcanvas = document.createElement('div');
    mapcanvas.id = 'mapcontainer';
    mapcanvas.style.height = '400px';
    mapcanvas.style.width = '500px';

    appenMapToDOM(mapcanvas);
}

function appenMapToDOM( element ){
    document.querySelector('#map').appendChild(element);
}

function createMap(){
    return new google.maps.Map(document.getElementById("mapcontainer"), mapOptions);
}

function createAutoComplete(){
    return new google.maps.places.Autocomplete( document.getElementById('location'), {});
}

function onPlaceChanged() {
    var place = autocomplete.getPlace();
    if (place.geometry) {
        map.panTo(place.geometry.location);
        map.setZoom(16);
    } else {
        document.getElementById('location').placeholder = 'Enter a city';
    }
}

function appendMap(){
    createHTMLDOOM();
    map = createMap();
    places = new google.maps.places.PlacesService(map);
    autocomplete = createAutoComplete();
    addListeners();
}

function addListeners(){
    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
    google.maps.event.addListener(map, 'click', function(event) {
        addMarker(event.latLng);
    });
}

function addMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    markers.push(marker);
}

function deleteMarkers() {
  clearMarkers();
  markers = [];
}

function clearMarkers() {
  setAllMap(null);
}

function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}


function updateMap( type ){
    var type = getTypeOfMap(type);
    map.setMapTypeId( type );
}

function getTypeOfMap( terrain ){
    terrain = terrain.toLowerCase();

    var type = getTypesOfMaps();

    if( type[terrain] ){
        return type[terrain];
    }
}

function getTypesOfMaps(){
    return {
        "roadmap" : google.maps.MapTypeId.ROADMAP,
        "satellite" : google.maps.MapTypeId.SATELLITE,
        "hybrid" : google.maps.MapTypeId.HYBRID,
        "terrain": google.maps.MapTypeId.TERRAIN
    }
}

function redraw(){
    google.maps.event.trigger(map, 'resize');
}

appendMap();
