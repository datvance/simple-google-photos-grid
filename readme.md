# Simple Google Photos WordPress Plugin
Provides a WordPress widget to display photos from a public Google Photos album. [See a demo](https://josheli.com). Read more [about the plugin](https://josheli.com/knob/2017/11/21/simple-google-photos-a-wordpress-plugin/).

## Installation and Usage
[Install](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins) as you would any other WordPress plugin.

Go to Appearance -> Widgets and a new widget named Simple Google Photos Grid should be available to use. Drag to your desired widget area and configure.

## Configuration Options
 - Title: Heading of the widget on your site. Default to empty.
 - Album URL: The full URL to your public gallery on Google Photos. Ideally should be a short, "shared" link (such as https://photos.app.goo.gl/G8EOLs5YtESchh4g1), but any Google Photos URL should do.
 - Num Photos to Show: Even numbers probably work best. There's a maximum number, not sure what it is, but it's pretty low.
 - Cache Interval (in minutes): How long to cache photo URLs before checking the album on Google again. 0 for no cache.

## Notes
Your album must be "public", which means you need to go into Google Photos on the web and set "Sharing options" to on, i.e. "Anyone with the link can see these photos and the people who've been invited or joined." 

This plugin is pretty hacky since the above doesn't really make the album public in the sense that Picasa used to, or Flickr does, etc. Anyway, there is no reliable Google Photos api. The Picasa API is broken and doesn't list new albums made in Photos, and not all albums show up in Google Drive. So, read [this](https://kunnas.com/google-photos-is-a-disaster/) and [this](https://productforums.google.com/forum/#!topic/photos/WuqfNazcqh4) if you're interested in this mess.

## Finally
No support is provided. Probably no features will be added. You are free to ask, or to fork. Pull requests accepted.
