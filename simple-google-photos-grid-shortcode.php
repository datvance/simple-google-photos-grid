<?php

include_once 'Simple_Google_Photos_Grid.php';

/**
 * Widget to display Google Photos from a public album.
 */
class Simple_Google_Photos_Grid_Shortcode
{
  public static function shortcode($attributes = [], $content = null, $tag = '') {

    $attributes = array_change_key_case((array)$attributes, CASE_LOWER);

    if(!isset($attributes['album-url']) || substr($attributes['album-url'], 0, 8) != 'https://') {
      return '';
    }

    $cache_interval = isset($attributes['cache-interval'])
      ? intval($attributes['cache-interval'])
      : Simple_Google_Photos_Grid::CACHE_INTERVAL;

    $num_photos = isset($attributes['number-photos'])
      ? intval($attributes['number-photos'])
      : Simple_Google_Photos_Grid::NUMBER_PHOTOS;

    $num_photos_per_row = isset($attributes['number-photos-per-row'])
      ? intval($attributes['number-photos-per-row'])
      : Simple_Google_Photos_Grid::NUMBER_PHOTOS_PER_ROW;

    $grid = new Simple_Google_Photos_Grid();

    $photos = $grid->get_photos($attributes['album-url'], $cache_interval);

    return $grid->html($photos, $num_photos, $num_photos_per_row, $attributes['album-url']);
  }
}
