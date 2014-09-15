(function() {
    tinymce.PluginManager.add('mapmarker', function( editor, url ) {
        editor.addButton( 'mapmarker', {
            icon: 'icon mapmarker-button',
            tooltip: 'New Map',
            cmd: 'openMapMarkerCreator',
        });
        editor.addCommand('openMapMarkerCreator', function() {
            editor.windowManager.open({
                file: ajaxurl + '?action=open_mapmarker_creator',
                width: 800, 
                height: 600,
                inline: 1
            }, {
                plugin_url: url 
            });
        });
    });
})();
