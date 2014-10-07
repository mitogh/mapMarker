<?php namespace com\github\mitogh\mapMarker\lib;

class MapMarker {
    private $path;

    private $lib_directory = '/lib/';

    public function __construct( $path = '' ) {
        $this->path = $path;

        $this->load_files();

        $this->create_tinyMCE_editor();
        $this->create_ajax_request();
    }

    private function load_files() {
        include $this->path_to_lib() . 'class-wordpress.php';
        include $this->path_to_lib() . 'class-user.php';
        include $this->path_to_lib() . 'class-tinymce.php';
        include $this->path_to_lib() . 'class-ajax.php';
    }

    private function path_to_lib() {
        return $this->path . $this->lib_directory;
    }

    private function create_tinyMCE_editor(){
        return new TinyMCE();
    }

    private function create_ajax_request(){
        $ajax = new Ajax_Request();

        $path = $this->path . '/editor/map-creator.php';
        $ajax->send( $path );
    }
}
