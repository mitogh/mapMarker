<?php namespace mitogh\github\com\lib;

class User {
    public function canEdit(){
        return ! $this->canNotEdit();
    }

    public function canNotEdit(){
        return  ! $this->canEditPost()  && ! $this->canEditPages();
    }

    public function canEditPost(){
        return current_user_can('edit_posts');
    }

    public function canEditPages(){
        return current_user_can('edit_pages');
    }
}
