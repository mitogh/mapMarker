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
            $("#mapcontainer").css("width", actualWidth); 
            redraw();
        });

        $("#height").on('focusout keyup', function(){
            var actualHeight = $(this).val();
            $("#mapcontainer").css("height", actualHeight); 
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
