<?php namespace mitogh\github\com;

class AjaxRequest{
    private $url = '';


    public function __constuctor(){
    }

    public function  send( $url ){
        $this->url = $url;
        $this->registerActionInWordpress();
    }

    public function registerActionInWordpress(){
        add_action('wp_ajax_open_mapmarker_creator', $this->callMethod('execute'));
    }

    private function callMethod( $method_name ){
        return array($this, $method_name);
    }

    public function execute(){
        if( User::canNotEdit() ){
            dieWithError();
        }else{
            include_once $this->url;
        }
    }

    private function dieWithError(){
        die(__( $this->errorMessage() ));
    }
    private function errorMessage(){
        return 'You are not allowed to be here';
    }
}
