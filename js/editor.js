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
            var width = parseInt(actualWidth);
            if( isNaN(width) || width <= 0 ){
                width = 500;
            }
            $("#mapcontainer").css("width", width + "px"); 
            redraw();
        });

        $("#height").on('focusout keyup', function(){
            var actualHeight = $(this).val();
            var height = parseInt(actualHeight);
            if( isNaN(height) || height <= 0){
                height = 400;
            }
            $("#mapcontainer").css("height", height + "px"); 
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
