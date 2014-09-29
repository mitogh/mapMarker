<?php namespace mitogh\github\com\lib;

class TinyMCE extends Wordpress {

    public function __construct(){
        add_action( 'init', $this->call_method( 'init' ) );
    }

    public function init(){
        if( $this->has_rich_editor() ){
            $this->add_button_filter();
            $this->register_button_filter();
            $this->enqueue_style_to_admin();
        }
    }

    private function has_rich_editor(){
        return get_user_option( 'rich_editing' ) == 'true';
    }

    private function add_button_filter(){
        add_filter( 'mce_external_plugins', $this->call_method( 'add_button' ) );
    }

    private function register_button_filter(){
        add_filter( 'mce_buttons', $this->call_method( 'register_button' ) );
    }

    private function enqueue_style_to_admin(){
        add_action( 'admin_enqueue_scripts', $this->call_method( 'register_button_style' ) );
    }

    public function add_button( $plugin_array ){
        $plugin_array['mapmarker'] = $this->get_absolute_URL_for( '../editor/js/buttons.js' );
        return $plugin_array;
    }

    public function register_button( $buttons ) {
        array_push( $buttons, 'mapmarker');
        return $buttons;
    }

    public function register_button_style(){
        wp_enqueue_style( 'mapmarker-button-style', $this->get_absolute_URL_for( '../editor/css/button.css' ) );
    }

    private function get_absolute_URL_for( $fileName ){
        return plugins_url( $fileName, __FILE__ );
    }
}
