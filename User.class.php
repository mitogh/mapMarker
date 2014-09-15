<?php namespace mitogh\github\com;

class User {
    public static function canEdit(){
        return ! self::canNotEdit();
    }

    public static function canNotEdit(){
        return  (! self::canEditPost() ) && (! self::canEditPages() );
    }

    public static function canEditPost(){
        return current_user_can('edit_posts');
    }

    public static function canEditPages(){
        return current_user_can('edit_pages');
    }
}
