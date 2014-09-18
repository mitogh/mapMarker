var map;
var origin = new google.maps.LatLng(19.429570, -99.131585);
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
}

function updateMap( type ){
    var type = getTypeOfMap(type);
    map.setMapTypeId( type );
}

function getTypeOfMap( t ){
    var tmp = t.toLowerCase();
    console.log(tmp);
    if(tmp === "roadmap"){
        return google.maps.MapTypeId.ROADMAP;
    }else if(tmp === "satellite"){
        return google.maps.MapTypeId.SATELLITE;
    }else if(tmp === "hybrid"){
        return google.maps.MapTypeId.HYBRID;
    }else{
        return google.maps.MapTypeId.TERRAIN;
    }
}

function redraw(){
    google.maps.event.trigger(map, 'resize');
}

appendMap();
