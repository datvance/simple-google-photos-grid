<?php

include_once 'Simple_Google_Photos_Grid.php';

/**
 * Widget to display Google Photos from a public album.
 */
class Simple_Google_Photos_Grid_Widget extends WP_Widget
{
  /**
   * Register widget with WordPress.
   */
  function __construct()
  {
    $name = Simple_Google_Photos_Grid::name();

    parent::__construct(
      $name,
      __( ucwords(str_replace('-', ' ', $name)), $name ),
      [ 'description' => __( 'Show latest photos from a public Google Photos album', $name ), ]
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance )
  {
    $cache_interval = $instance['cache-interval']
      ? intval($instance['cache-interval'])
      : Simple_Google_Photos_Grid::CACHE_INTERVAL;

    $num_photos = $instance['number-photos']
      ? intval($instance['number-photos'])
      : Simple_Google_Photos_Grid::NUMBER_PHOTOS;

    $num_photos_per_row = $instance['number-photos-per-row']
      ? intval($instance['number-photos-per-row'])
      : Simple_Google_Photos_Grid::NUMBER_PHOTOS_PER_ROW;

    $grid = new Simple_Google_Photos_Grid();

    $photos = $grid->get_photos($instance['album-url'], $cache_interval);

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) )
    {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    echo $grid->html($photos, $num_photos, $num_photos_per_row, $instance['album-url']);

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   * @return string|void
   */
  public function form( $instance ) {
    if($instance['album-url']) {
      $album_url = $instance['album-url'];
      $title = $instance['title'];
      $cache_interval = $instance['cache-interval'];
      $num_photos = $instance['number-photos'];
      $num_photos_per_row = $instance['number-photos-per-row'];
    }
    else {
      $album_url = '';
      $title = '';
      $cache_interval = Simple_Google_Photos_Grid::CACHE_INTERVAL;
      $num_photos = Simple_Google_Photos_Grid::NUMBER_PHOTOS;
      $num_photos_per_row = Simple_Google_Photos_Grid::NUMBER_PHOTOS_PER_ROW;
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'album-url' ); ?>"><?php _e( 'Album URL:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'album-url' ); ?>" name="<?php echo $this->get_field_name( 'album-url' ); ?>" type="url" value="<?php echo esc_attr( $album_url ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'number-photos' ); ?>"><?php _e( 'Num Photos to Show:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'number-photos' ); ?>" name="<?php echo $this->get_field_name( 'number-photos' ); ?>" type="number" min="1" step="1" value="<?php echo esc_attr( $num_photos ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'number-photos-per-row' ); ?>"><?php _e( 'Num Photos Per Row:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'number-photos-per-row' ); ?>" name="<?php echo $this->get_field_name( 'number-photos-per-row' ); ?>" type="number" min="1" step="1" value="<?php echo esc_attr( $num_photos_per_row ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'cache-interval' ); ?>"><?php _e( 'Cache Interval (minutes):' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'cache-interval' ); ?>" name="<?php echo $this->get_field_name( 'cache-interval' ); ?>" type="number" min="0" step="1" value="<?php echo esc_attr( $cache_interval ); ?>">
    </p>
  <?php
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = [];
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['cache-interval'] = intval($new_instance['cache-interval']);
    $instance['number-photos'] = intval($new_instance['number-photos']);
    $instance['number-photos-per-row'] = intval($new_instance['number-photos-per-row']);
    $instance['album-url'] = esc_url_raw( $new_instance['album-url'], ['https'] );

    return $instance;
  }
}
