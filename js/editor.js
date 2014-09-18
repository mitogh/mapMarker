(function($){
    $(document).ready(function(){
        $("#location").on('keydown', function( event ){
            if( event.which == 13 ){
                event.preventDefault();
            }
        });
    });
})(jQuery);
