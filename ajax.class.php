<?php namespace mitogh\github\com;

class AjaxRequest{
    private $url = '';

    private $user = null;


    public function __construct( $user = null ){
        if($user instanceof User){
            $this->user = $user;
        }else{
            throw new Exception('Invalid type of User');
        }
    }

    public function  send( $url ){
        $this->url = $url;
        $this->registerActionInWordpress();
    }

    public function registerActionInWordpress(){
        add_action('wp_ajax_open_mapmarker_creator', $this->callMethod('execute'));
    }

    /**
     * Array to call the method from the class as is required more info:
     * http://codex.wordpress.org/Function_Reference/add_action#Using_with_a_Class
     */
    private function callMethod( $method_name ){
        return array($this, $method_name);
    }

    public function execute(){
        if( $this->user->canNotEdit() ){
            dieWithError();
        }else{
            include_once $this->url;
        }
    }

    private function dieWithError(){
        die( __( $this->errorMessage() ));
    }

    private function errorMessage(){
        return 'You are not allowed to be here';
    }
}
