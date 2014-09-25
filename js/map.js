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


function appendMap(){
    createHTMLDOOM();
    map = createMap();
    places = new google.maps.places.PlacesService(map);
    autocomplete = createAutoComplete();
    addListeners();
}

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

function addListeners(){
    addAutoCompleteListener();
    addClickListener();
}

function addAutoCompleteListener(){
    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
}

function onPlaceChanged() {
    var place = autocomplete.getPlace();
    if (place.geometry) {
        var location = place.geometry.location;
        centerMapIn( location );
    } else {
        setDefaultTextToLocationInput();
    }
}

function centerMapIn( location ){
    map.panTo(location);
    map.setZoom(16);
}

function setDefaultTextToLocationInput(){
    document.getElementById('location').placeholder = 'Enter a city';
}

function addClickListener(){
    google.maps.event.addListener(map, 'click', function(event) {
        addMarker(event.latLng);
    });
}

function addMarker(location) {
    var marker = createMark( location );
    markers.push(marker);
}

function createMark( location ){
    return new google.maps.Marker({
        position: location,
        map: map
    });
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
