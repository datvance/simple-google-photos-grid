<?php
/**
 * Plugin Name: Simple Google Photos Grid
 * Description: Show the latest photos from a public Google Photos album.
 * Version: 1.0
 * Author: Josheli
 * Author URI: https://josheli.com
 * License: MIT
 */



add_action( 'widgets_init', function(){
  $file_name = basename(__DIR__) . '-widget';
  include_once __DIR__ . '/'.$file_name.'.php';

  $class_name = ucwords(str_replace('-', '_', $file_name), '_');
  register_widget($class_name);
});