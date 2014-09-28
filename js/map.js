var mapCanvas = (function(){
    var canvas;

    var options = {
        id: 'map-container',
        width: '400px',
        height: '500px'
    }

    function init(){
        canvas = document.createElement('div');
        setProperties();
        return canvas;
    }

    function setProperties(){
        canvas.id = options.id;
        canvas.style.height = options.width;
        canvas.style.width = options.height;
    }

    return {
        create: init,
    }
})();

var googleMap = (function (){

    var map;
    var canvas; 
    var markers = [];
    var position = {
        'start': new google.maps.LatLng(19.429570, -99.131585)
    }

    var options = {
        mapTypeControl: false,
        streetViewControl: false,
        panControl: false,
        center: position['start'],
        zoom: 12
    };

    var types = {
        "roadmap" : google.maps.MapTypeId.ROADMAP,
        "satellite" : google.maps.MapTypeId.SATELLITE,
        "hybrid" : google.maps.MapTypeId.HYBRID,
        "terrain": google.maps.MapTypeId.TERRAIN
    };

    function create(){
        createCanvas();
        append(canvas);
        map = draw();
    }

    function createCanvas(){
        canvas = mapCanvas.create();
    }

    function append( element ){
        document.querySelector('#map').appendChild(element);
    }

    function redraw(){
      google.maps.event.trigger(map, 'resize');
    }

    function draw(){
        return new google.maps.Map(document.getElementById("map-container"), options);
    }

    function createAutocomplete(){
        autocomplete = google.maps.places.Autocomplete( document.getElementById('location'), {});
        addAutocompleteListener();
    }

    function addAutocompleteListener(){
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

    return {
        init: create,
        autocomplete: createAutocomplete,
    }
})();

googleMap.init();
googleMap.autocomplete();

/**
  function appendMap(){
  autocomplete = createAutoComplete();
  addListeners();
  }

  function addListeners(){
  addAutoCompleteListener();
  addClickListener();
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
}
}

function redraw(){
}
*/
