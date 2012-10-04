=== Plugin Name ===
Contributors: codefish
Tags: pinterest, pinboard, widget
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 1.0.2

A simple must-have widget for the Pinterest addict! Displays thumbnails of your latest Pinterest pins on your website.

== Description ==

This plugin adds a Pinterest widget much like the pinboards on Pinterest. It uses the original thumbnails from Pinterest itself. The plugin aims to have the same look and feel as the pinboords on Pinterest. To improve your site's performance, the pins are cached every 15 minutes.

== Installation ==

1. Upload the folder pinterest-pinboard-widget and its contents to the /wp-content/plugins/ directory or use the wordpress plugin installer
1. Activate the plugin through the 'Plugins' menu in WordPress
1. A new "Pinterest Pinboard" widget will be available under Appearance > Widgets.
1. Add it to your sidebar and edit settings of the plugin

== Frequently Asked Questions ==

= My latest pins are not showing on my website  =

The Pinterest Pinboard Widget caches the RSS feed from Pinterest itself every 15 minutes. This improves loading time of your website, but may show a new pin with a slight delay. A just added pin also takes some time to show up in Pinterest's RSS feed.

= Can I disable caching? =

In the current version caching is always enabled (15 minutes). Future versions of the plugin will allow you to set the caching interval or disable caching completely.

= Can I add a Follow Me button? =

The current version show a 'more pins' link only. Future versions of the plugin will have more choices of buttons provided by Pinterest.

== Screenshots ==

1. Settings of the widget under: Appearance > Widgets
2. This is the Pinterest Pinboard widget in the sidebar of the Twenty Eleven WordPress theme

== Changelog ==

= 1.0.2 =

* When server runs https:// also retrieve the pins from Pinterest that way
* Fixed a bug when pin description contained a quote (")
* Replaced inline php with echo

= 1.0.1 =

* CSS enhancements
* Output HTML comment line for troubleshooting purposes

= 1.0.0 =

* Initial version
