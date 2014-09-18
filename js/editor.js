(function($){
    var enterKey = 13;
    $(document).ready(function(){
        $("#location").on('keydown', function( event ){
            if( event.which == enterKey ){
                event.preventDefault();
            }
        });
    });
})(jQuery);
