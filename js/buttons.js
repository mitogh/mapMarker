(function() {
    tinymce.create('tinymce.plugins.mapmarker', {
        init: function(editor, url){
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
                    close_previous  : 'yes', 
                    inline          : 'yes', 
                }, {
                    plugin_url: url 
                });
            });
        },
        getInfo: function(){
            return {
                longname    : 'Create maps with markers', 
                author      : 'Crisoforo Gaspar', 
                authorurl   : 'www.crisoforo.com', 
                infourl     : 'github.com/mitogh', 
                version     : tinymce.majorVersion +'.'+ tinymce.minorVersion
            };
        }
    });
    tinymce.PluginManager.add('mapmarker', tinymce.plugins.mapmarker);
})();
