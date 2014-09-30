<?php namespace com\github\mitogh\lib;

class Ajax_Request extends Wordpress {

    private $url = '';

    public function  send( $url ){
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
            $this->die_with_error();
        }
    }

    private function start_editor(){
        $this->include_file();
        die();
    }

    private function include_file(){
        include_once $this->url;
    }

    private function die_with_error(){
        die( $this->error_message() );
    }

    private function error_message(){
        return 'You are not allowed to be here';
    }
}
