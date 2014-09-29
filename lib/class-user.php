<?php namespace mitogh\github\com\lib;

class User {
    public function can_edit(){
        return ! $this->can_not_edit_post();
    }

    public function can_not_edit_post(){
        return  ! $this->can_edit_posts()  && ! $this->can_edit_pages();
    }

    public function can_edit_posts(){
        return current_user_can('edit_posts');
    }

    public function can_edit_pages(){
        return current_user_can('edit_pages');
    }
}
