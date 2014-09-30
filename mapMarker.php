<?php namespace com\github\mitogh;
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

$editor = new \com\github\mitogh\lib\TinyMCE();

include $base_path . $lib_directory . 'class-ajax.php';

$ajax = new \com\github\mitogh\lib\Ajax_Request();

$path = $base_path . '/editor/map-creator.php';
$ajax->send( $path );
