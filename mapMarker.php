<?php namespace mitogh\github\com;
/**
 * Plugin Name: Map Marker with Google Maps
 * Plugin URI: https://github.com/mitogh/mapMarker
 * Description: Plugin for Wordpress to insert maps with different locations in a map. Using Google Maps API.
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

$editor = new \mitogh\github\com\lib\TinyMCE();

include $base_path . $lib_directory . 'class-ajax.php';

$user = new \mitogh\github\com\lib\User();
$ajax = new \mitogh\github\com\lib\Ajax_Request( $user );

$path = $base_path . '/editor/map-creator.php';
$ajax->send( $path );
