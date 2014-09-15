<?php namespace mitogh\github\com;
add_action('wp_ajax_open_mapmarker_creator', __NAMESPACE__ . '\open_mapparker_creator_callback');
/**
 * Call TinyMCE window content via admin-ajax
 * @return html content
 */
function open_mapparker_creator_callback() {
    if( User::canNotEdit() )
        die(__("You are not allowed to be here"));

    include_once plugin_dir_path( __FILE__) . '/editor/map-creator.php';
    //throw new themedelta_Clean_Exit();
}
?>

