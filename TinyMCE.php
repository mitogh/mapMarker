<?php namespace mitogh\github\com;

add_action( 'init', __NAMESPACE__ . '\mapmarker_buttons' );

function mapmarker_buttons() {
    if( User::canEdit() ){
        if ( 'true' == get_user_option( 'rich_editing' ) ) {
            add_filter( 'mce_external_plugins', __NAMESPACE__ . '\add_buttons' );
            add_filter( 'mce_buttons', __NAMESPACE__ . '\register_buttons' );
        }
    }
}
function add_buttons( $plugin_array ) {
    $plugin_array['mapmarker'] = plugins_url('/js/buttons.js', __FILE__);
    return $plugin_array;
}

function register_buttons( $buttons ) {
    array_push( $buttons, 'mapmarker');
    return $buttons;
}

function register_button_style(){
    wp_enqueue_style('mapmarker_button_style', plugins_url('/css/button.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\register_button_style' );
