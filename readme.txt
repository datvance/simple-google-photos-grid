=== Simple Google Photos Grid ===
Contributors: uwonder
Tags: album, gallery, photos, Google Photos
Requires at least: 4.0
Tested up to: 5.1.1
Stable tag: trunk
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Provides a widget and shortcode to display photos from a public Google Photos album in a simple grid.

== Description ==

A simple, no-frills solution to display a Google Photos album on your site using a widget or a shortcode. There is only one layout option: grid. There is only one required attribute: album url. That's it, that easy. [See a demo and read more about the plugin](https://josheli.com/knob/2017/11/21/simple-google-photos-a-wordpress-plugin/). The code is also [available on Github](https://github.com/datvance/simple-google-photos-grid).

## Notes
Your album on Google Photos must be "public", which means you need to go into Google Photos on the web and set "Sharing options" to on, i.e. "Anyone with the link can see these photos and the people who've been invited or joined."

Requires curl or similar to fetch the photo urls.

No support is provided. Probably no features will be added. You are free to ask, or to fork. Pull requests accepted.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly, or clone from Github.
1. Activate the plugin through the 'Plugins' screen in WordPress or with wp-cli.
1. Configure:

## Widget
Go to Appearance -> Widgets and a new widget named Simple Google Photos Grid should be available to use. Drag to your desired widget area and configure.

 - Title: Heading of the widget on your site. Default to empty.
 - Album URL: The full URL to your public gallery on Google Photos. Ideally should be a short, "shared" link (such as https://photos.app.goo.gl/G8EOLs5YtESchh4g1), but any Google Photos URL should do.
 - Num Photos to Show: Even numbers probably work best. There's a maximum number, not sure what it is, but it's pretty low.
 - Num Photos per Row: How many photos to show per row? Probably some number that works well with Num Photos.
 - Cache Interval (in minutes): How long to cache photo URLs before checking the album on Google again. 0 for no cache.

## Shortcode
Place the shortcode in a post, page or theme.
`[simple_google_photos_grid album-url="https://photos.app.goo.gl/G8EOLs5YtESchh4g1"]`

Available attributes are:
- album-url: (required) the url to a public Google Photos album
- number-photos: (optional) number of photos to display, defaults to 4
- number-photos-per-row: (optional) number of photos per row, defaults to 2
- cache-interval: (optional) length, in minutes, to cache the photo urls retrieved from Google, defaults to 15

`[simple_google_photos_grid album-url="https://photos.app.goo.gl/G8EOLs5YtESchh4g1" number-photos="6" number-photos-per-row="3" cache-interval="120"]`

== Screenshots ==

1. Two grids on a page, one placed with a shortcode and one placed with a widget.

== Changelog ==

= 1.3 =
* Added "number photos per row" configuration/attribute to have grids other than 2x2

= 1.2 =
* Fixed bug if more than one grid on a page

= 1.1 =
* Added shortcode

= 1.0 =
* Initial release
