<?php namespace mitogh\github\com\lib;

class Wordpress{
    /**
     * Array to call the method from the class in the action as is required, more info:
     * http://codex.wordpress.org/Function_Reference/add_action#Using_with_a_Class
     */
    protected function callMethod( $method_name ){
        return array($this, $method_name);
    }
}
