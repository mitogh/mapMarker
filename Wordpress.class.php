<?php namespace mitogh\github\com;

class Wordpress{
    /**
     * Array to call the method from the class as is required more info:
     * http://codex.wordpress.org/Function_Reference/add_action#Using_with_a_Class
     */
    protected function callMethod( $method_name ){
        return array($this, $method_name);
    }
}
