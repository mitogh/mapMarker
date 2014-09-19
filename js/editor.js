(function($){
    var enterKey = 13;
    $(document).ready(function(){
        $("#location").on('keydown', function( event ){
            if( event.which == enterKey ){
                event.preventDefault();
            }
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

        $( "select" ).on('change', function(){
            var type = "";
            $( "select option:selected" ).each(function() {
                type = $(this).val();
            });
            updateMap(type);
        }).trigger('change');
    });
})(jQuery);

function avoidNormalBehaviorOnEnterKey( event ){
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
