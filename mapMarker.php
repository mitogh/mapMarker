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
$plugin_path = plugin_dir_path(__FILE__);
include_once $plugin_path . './lib/class-mapmarker.php';

$mapMarker = new Library\MapMarker( $plugin_path );
