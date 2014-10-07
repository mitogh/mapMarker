<?php namespace com\github\mitogh\mapMarker;

use \com\github\mitogh\mapMarker\lib as Library;

/**
 * Plugin Name: Map Marker using Google Maps API
 * Plugin URI: https://github.com/mitogh/mapMarker
 * Description: Plugin to insert multiple markers in a Location. Using Google Maps API.
 * Version: 0.1
 * Author: Crisoforo Gaspar
 * Author URI: http://www.crisoforo.com
 * License: GPL2
 */
$base_path = plugin_dir_path( __FILE__ );
$lib_directory = '/lib/';

include $base_path . $lib_directory . 'class-wordpress.php';
include $base_path . $lib_directory . 'class-user.php';
include $base_path . $lib_directory . 'class-tinymce.php';

$editor = new Library\TinyMCE();

include $base_path . $lib_directory . 'class-ajax.php';

$ajax = new Library\Ajax_Request();

$path = $base_path . '/editor/map-creator.php';
$ajax->send( $path );
