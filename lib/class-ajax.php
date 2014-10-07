<?php namespace com\github\mitogh\mapMarker\lib;

class Ajax_Request extends Wordpress {

    private $url = '';

    public function send( $url ){
        $this->url = $url;
        $this->register_action_in_wordpress();
    }

    public function register_action_in_wordpress(){
        add_action( 'wp_ajax_open_mapmarker_creator', $this->call_method( 'execute' ) );
    }

    public function execute(){
        if( User::can_edit() ){
            $this->start_editor();
        }else{
            $this->end( $this->error_message() );
        }
    }

    private function start_editor(){
        $this->include_file();
        $this->end();
    }

    private function include_file(){
        include_once $this->url;
    }

    private function end( $message = '' ){
        die( $message );
    }

    private function error_message(){
        return 'You are not allowed to be here';
    }
}
