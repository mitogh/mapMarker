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
            google.maps.event.trigger(map, 'resize');
        });

        $("#height").on('focusout keyup', function(){
            var actualHeight = $(this).val();
            $("#mapcontainer").css("height", actualHeight); 
            google.maps.event.trigger(map, 'resize');
        });
    });
})(jQuery);
