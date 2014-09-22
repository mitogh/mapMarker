(function($){
    $(document).ready(function(){
        $("#location").on('keydown', function( event ){
            avoidNormalBehaviorOnEnterKey(event);
        });

        $("#width").on('focusout keyup', function(){
            var actualWidth = $(this).val();
            var width = getInPixel(actualWidth);
            $("#mapcontainer").css("width", width); 
            redraw();
        });

        $("#height").on('focusout keyup', function(){
            var actualHeight = $(this).val();
            var height = getInPixel(actualHeight, 500);
            $("#mapcontainer").css("height", height); 
            redraw();
        });

        $( "select.terrain-control" ).on('change', function(){
            var type = "";
            $( "select.terrain-control option:selected" ).each(function() {
                type = $(this).val();
            });
            updateMap(type);
        }).trigger('change');

        $("button.btn-remove-markers").on('click', function( event ){
            avoidDefaultBehavior( event );
            deleteMarkers();
        });
    });
})(jQuery);

function avoidNormalBehaviorOnEnterKey( event ){
    var enterKey = 13;

    if( event.which == enterKey ){
        avoidDefaultBehavior( event );
    }
}

function avoidDefaultBehavior( event ){
    event.preventDefault();
}

function getInPixel( expectedValue, defaultValue ){

    if( typeof defaulValue == undefined ){
        var defaultValue = 400;
    }

    if( isValidNumber( expectedValue ) ){
        return getValueInPixel(expectedValue);
    }else{
        return getValueInPixel(defaulValue);
    }
}

function isValidNumber( number ){
    number = parseInt(number);
    if( !isNaN(number) && number > 0 ){
        return true;
    }else{
        return false;
    }
}

function getValueInPixel( number ){
    return number + "px";
}
