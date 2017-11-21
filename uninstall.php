<?php

/**
 * Uninstall script
 *
 * This file contains all the logic required to uninstall the plugin
 *
 * @package 	Simple Google Photo Grid
 */


if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit;

include_once __DIR__ . '/simple-google-photos-grid-widget.php';
Simple_Google_Photo_Grid_Widget::uninstall();