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
include $base_path . 'Wordpress.class.php';
include $base_path . 'User.class.php';
include $base_path . 'TinyMCE.class.php';

$editor = new TinyMCE();

include $base_path . 'ajax.class.php';

$user = new User();
$ajax = new AjaxRequest( $user );

$path = $base_path . '/editor/map-creator.php';
$ajax->send( $path );
