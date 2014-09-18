<?php namespace mitogh\github\com;

class TinyMCE extends Wordpress{
    public function __construct(){
        add_action( 'init', $this->callMethod('init') );
    }

    public function init(){
        if( $this->hasRichEditor() ){
            $this->addButtonFilter();
            $this->registerButtonFilter();
            $this->enqueueStyleToAdmin();
        }
    }

    private function hasRichEditor(){
        return get_user_option( 'rich_editing' ) == 'true';
    }

    private function addButtonFilter(){
        add_filter( 'mce_external_plugins', $this->callMethod('addButton') );
    }

    private function registerButtonFilter(){
        add_filter( 'mce_buttons', $this->callMethod('registerButton') );
    }

    private function enqueueStyleToAdmin(){
        add_action( 'admin_enqueue_scripts', $this->callMethod('registerButtonStyle') );
    }

    public function addButton( $plugin_array ){
        $plugin_array['mapmarker'] = plugins_url('/js/buttons.js', __FILE__);
        return $plugin_array;
    }

    public function registerButton( $buttons ) {
        array_push( $buttons, 'mapmarker');
        return $buttons;
    }

    public function registerButtonStyle(){
        wp_enqueue_style('mapmarker-button-style', plugins_url('/css/button.css', __FILE__) );
    }
}
