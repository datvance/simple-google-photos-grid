<?php
/**
 * Plugin Name: Simple Google Photos Grid
 * Plugin URI: https://github.com/datvance/simple-google-photos-grid
 * Description: Show the latest photos from a public Google Photos album.
 * Version: 1.1
 * Author: Josheli
 * Author URI: https://josheli.com
 * License: GPL2
 */

add_action('init', function(){
  $file_name = basename(__DIR__) . '-shortcode';
  include_once __DIR__ . '/'.$file_name.'.php';

  $class_name = ucwords(str_replace('-', '_', $file_name), '_');

  add_shortcode('simple_google_photos_grid', [$class_name, 'shortcode']);
});

add_action( 'widgets_init', function(){
  $file_name = basename(__DIR__) . '-widget';
  include_once __DIR__ . '/'.$file_name.'.php';

  $class_name = ucwords(str_replace('-', '_', $file_name), '_');
  register_widget($class_name);
});