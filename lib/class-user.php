<?php namespace mitogh\github\com\lib;

class User {
    public static function can_edit(){
        return ( self::can_edit_posts()  && self::can_edit_pages() );
    }

    private static function can_edit_posts(){
        return current_user_can('edit_posts');
    }

    private static function can_edit_pages(){
        return current_user_can('edit_pages');
    }
}
