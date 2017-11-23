<?php

include_once 'Simple_Google_Photos_Grid.php';

/**
 * Widget to display Google Photos from a public album.
 */
class Simple_Google_Photos_Grid_Shortcode
{
  public function shortcode($attributes = [], $content = null, $tag = '') {

    $attributes = array_change_key_case((array)$attributes, CASE_LOWER);

    if(!isset($attributes['album-url']) || substr($attributes['album-url'], 0, 8) != 'https://') {
      return '';
    }

    $cache_interval = $attributes['cache-interval']
      ? intval($attributes['cache-interval'])
      : Simple_Google_Photos_Grid::CACHE_INTERVAL;

    $num_photos = $attributes['number-photos']
      ? intval($attributes['number-photos'])
      : Simple_Google_Photos_Grid::NUMBER_PHOTOS;

    $grid = new Simple_Google_Photos_Grid();

    $photos = $grid->get_photos($attributes['album-url'], $cache_interval);

    return $grid->html($photos, $num_photos, $attributes['album-url']);
  }
}