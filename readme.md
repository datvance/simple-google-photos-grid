# Simple Google Photos WordPress Plugin
[Get the plugin here](https://wordpress.org/plugins/simple-google-photos-grid/). Provides a WordPress widget and shortcode to display photos from a public Google Photos album. [See a demo and read more about the plugin](https://josheli.com/knob/2017/11/21/simple-google-photos-a-wordpress-plugin/).

## Installation
[Install](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins) as you would any other WordPress plugin.

## Widget
Go to Appearance -> Widgets and a new widget named Simple Google Photos Grid should be available to use. Drag to your desired widget area and configure.

 - Title: Heading of the widget on your site. Default to empty.
 - Album URL: The full URL to your public gallery on Google Photos. URL must use one of the following domains: `photos.app.goo.gl` or `photos.google.com`. Ideally should be the short, "shared" link (such as https://photos.app.goo.gl/G8EOLs5YtESchh4g1z).
 - Num Photos to Show: Even numbers probably work best. There's a maximum number, not sure what it is, but it's pretty low.
 - Num Photos per Row: How many photos to show per row? Probably some number that works well with Num Photos.
 - Cache Interval (in minutes): How long to cache photo URLs before checking the album on Google again. 0 for no cache.

## Shortcode
Place the shortcode in a post, page or theme.
`[simple_google_photos_grid album-url="https://photos.app.goo.gl/G8EOLs5YtESchh4g1"]`

Available attributes are:
- album-url: (required) the url to a public Google Photos album, domain must be one of `photos.app.goo.gl` or `photos.google.com`
- number-photos: (optional) number of photos to display, defaults to 4
- number-photos-per-row: (optional) number of photos per row, defaults to 2
- cache-interval: (optional) length, in minutes, to cache the photo urls retrieved from Google, defaults to 15

`[simple_google_photos_grid album-url="https://photos.app.goo.gl/G8EOLs5YtESchh4g1" number-photos="6" number-photos-per-row="3" cache-interval="120"]`

## Notes
Your album on Google Photos must be "public", which means you need to go into Google Photos on the web and set "Sharing options" to on, i.e. "Anyone with the link can see these photos and the people who've been invited or joined."

Google Photos Public Sharing Settings:

<img src="https://josheli.com/wp-content/uploads/Screen-Shot-2017-11-20-at-10.40.34-PM.png" width="350" alt="Required settings for a Google Photos album to be public and accessible by the Simple Google Photos Grid WordPress plugin.">

This plugin is pretty hacky since the above doesn't really make the album public in the sense that Picasa used to, or Flickr does, etc. Anyway, there is no reliable Google Photos api. The Picasa API is broken and doesn't list new albums made in Photos, and not all albums show up in Google Drive. So, read [this](https://kunnas.com/google-photos-is-a-disaster/) and [this](https://productforums.google.com/forum/#!topic/photos/WuqfNazcqh4) if you're interested in this mess.

## Finally
No support is provided. Probably no features will be added. You are free to ask, or to fork. Pull requests accepted.

## Changelog

= 1.6 =
* Fix CVE-2025-46503

= 1.5 =
* Fixed notices in shortcode

= 1.4 =
* Fixed uninstall and shortcode bugs

= 1.3 =
* Added "number photos per row" configuration/attribute to have grids other than 2x2

= 1.2 =
* Fixed bug if more than one grid on a page

= 1.1 =
* Added shortcode

= 1.0 =
* Initial release
