(function() {
    tinymce.PluginManager.add('mapmarker', function( editor, url ) {
        editor.addButton( 'mapmarker', {
            icon: 'icon mapmarker-button',
            tooltip: 'New Map',
            onclick: function() {
                editor.insertContent('Hello World!');
            }
        });
    });
})();
