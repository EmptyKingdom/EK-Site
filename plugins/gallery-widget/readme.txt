=== Gallery Widget ===
Contributors: cybio
Website link: http://blog.splash.de/
Author URI: http://blog.splash.de/
Plugin URI: http://blog.splash.de/plugins/gallery-widget/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=C2RBCTVPU9QKJ&lc=DE&item_name=splash%2ede&item_number=WordPress%20Plugin%3a%20Gallery%20Widget&cn=Mitteilung%20an%20den%20Entwickler&no_shipping=1&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest
Tags: gallery, widget, image, attachment, media, library, sidebar, picture, random, latest, photo, shortcode
License: GPL v3, see LICENSE
Requires at least: 2.8
Tested up to: 3.1.0
Stable tag: 1.2.1

Simple widget to show the latest/random images of the WordPress media library as a Widget, using a shortcode or directly with a php-function.

== Description ==

Gallery Widget is a simple plugin that let you show the latest/random images of
the wordpress media gallery inside a widget, directly in your templates (it is
possible to choose some categories to be included/excluded) or in posts/pages
using a shortcode (see faq on how to use them).

For more information on how to use this plugin see [splash ;)](http://blog.splash.de/plugins/)

Please report bugs and/or feature-request to the ticket-system: [TicketSystem/Wiki](http://trac.splash.de/gallerywidget).
For Support, please use the [forum](http://board.splash.de/forumdisplay.php?f=102).
Latest development news: [Twitter](http://twitter.com/cybiox9).

== Installation ==

1. Upload the 'gallery_widget' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in the WordPress admin
3. Go to Design->Widgets, activate the "Gallery Widget", adjust the title and max number of images to your needs
or
3. use the php-object `$galleryWidget` in your template (see [here](http://board.splash.de/showpost.php?p=173891&postcount=3) )

Warning: Cause of the way the attachments are fetched using the standard option (all), even images of not yet
published posts are shown. If this is a problem for you, you should use the option (include or exclude), although it
is less optimized.


== Frequently Asked Questions ==

= How can i adjust the look of the Widget? =

Just use the CSS-Class "wGallery" to alter the ul- or li-tags.

= How can i get only the images of one/some categories? =

Use the category-option include or exclude and enter the id's separated by comma
in the options of the widget.

= Why doesn't the images link to the parent article? =

This option actually only works with "category-option" set to include or exclude.

= How do i use the shortcodes? =

This is explained [here](http://board.splash.de/showpost.php?p=173891&postcount=2).

= Is it possible to show the images at any position in the theme (not only as widget)? =

Yes, is explained [here](http://board.splash.de/showpost.php?p=173891&postcount=3)

= Shortcode-Example using CSS =

This is explained [here](http://board.splash.de/showpost.php?p=173891&postcount=4).

For more examples and other questions, take a look at the [support forum](http://board.splash.de/forumdisplay.php?f=102).

== Changelog ==

= 1.2.1 =
* [FIX] code cleanup
* -> please don't use the functions calls anymore (use the galleryWidget-Object instead), support will be dropped with the next version

= 1.2.0 =
* [NEW] choose imagesize
* -> How to use another image/thumbnailsize is described here (http://blog.splash.de/2010/12/13/gallery-widget-1-2-0-imagesize/)

= 1.1.9 =
* [FIX] bugfix release for wp3.0 (instead of null, $wpdb->get_results now returns an empty array - damn!)
* [FIX] readme: code examples moved the forum (buggy readme-parser?)
* -> [FAQ @ forum](http://board.splash.de/showthread.php?p=173891)

= 1.1.8 =
* [NEW] dutch translation bei [Rene](http://wordpresspluginguide.com/)

= 1.1.7 =
* [NEW] show post-title instead of image title
* [NEW] title added to img-tags
* [WARNING] do not update, if you use a wordpress version less than 2.8!

= 1.1.6 =
* [FIX] security (don't allow script execution outside wordpress)

= 1.1.5 =
* [NEW] belarusian-belarus translation by [ilyuha](http://antsar.info/)
* [more information](http://blog.splash.de/2009/08/28/gallery-widget-1-1-2-1-1-5-bugfixuebersetzungen/)

= 1.1.4 =
* [NEW] português-brasil translation by [Vitor Damiani](http://www.luzrefletida.com/)

= 1.1.3 =
* [FIX] leading zero in categorylist (#16)
* [NEW] italian translation by [Gianni Diurno](http://gidibao.net)

= 1.1.2 =
* [NEW] russian translation by [Fat Cow](http://www.fatcow.com/)
* everyone is invited to send me a translated language pack, thx

= 1.1.1 =
* [FIX] description of widget
* [FIX] gettext domain
* [NEW] german translation
* [more information](http://blog.splash.de/2009/06/28/gallery-widget-1-1-1-ubersetzung-kleinere-fixes/)

= 1.1.0 =
* [NEW] multiple copies of the same widget (WP 2.8 only)
* [more information](http://blog.splash.de/2009/06/19/gallery-widget-1-1-0-mehrere-kopien-des-widget/)

= 1.0.0 =
* [TASK] prepare V1.0.0 - code cleanup
* [more information](http://blog.splash.de/2009/05/08/gallery-widget-100-stable-release)

= 0.7.2 =
* [FIX] don't show images of scheduled posts using the exclude option (#15)
* [more information](http://blog.splash.de/2009/04/19/gallery-widget-072-bilder-vorgemerkter-beitrage/)

= 0.7.1 =
* [NEW] shortcode example, using css (see FAQ)
* [NEW] updateinfobox/notice system
* [more information](http://blog.splash.de/2009/04/05/gallery-widget-071-updateinfoboxcss-beispiel)

= 0.7.0 =
* [NEW] shortcodes to use the php-functions in articles/pages
* [more information](http://blog.splash.de/2009/03/05/gallery-widget-070-shortcode)

= 0.6.1 =
* [FIX] don't print debug message as html comment

= 0.6.0 =
* [NEW] OOP rewrite (with wrapper functions for the old function calls)
* [more information](http://blog.splash.de/2009/02/14/gallery-widget-060-oop-rewrite/)

= 0.5.17 =
* [FIX] include option will work now again...
* [more information](http://blog.splash.de/2009/02/08/gallery-widget-0517-bugix-only/)

= 0.5.16 =
* [FIX] use the table prefix
* [more information](http://blog.splash.de/2009/01/30/gallery-widget-0516-bugfix-table-prefix/)

= 0.5.15 =
* [FIX] supress the error message, if no posts found for include/exclude...
* [more information](http://blog.splash.de/2009/01/18/gallery-widget-0515-bugfix/)

= 0.5.14 =
* [NEW] New option: show only 1 image per post
* [more information](http://blog.splash.de/2008/12/31/gallery-widget-0514-nur-ein-bild-pro-beitrag/)

= 0.5.13 =
* [FIX] SQL-performance improvement on include/exclude-option
* [more information](http://blog.splash.de/2008/12/29/gallery-widget-0513-optimierung/)

= 0.5.12 =
* [FIX] Can add CSS-class @widget control menu
* [FIX] Include/exclude categories
* [NEW] Option: add a link relation
* [more information](http://blog.splash.de/2008/12/14/gallery-widget-0512-bugfixlink-relation/)

= 0.5.11 =
* [FIX] Missing mime_type added (for the custom sql query used by "category-option" include/exclude)
* [more information](http://blog.splash.de/2008/09/08/gallery-widget-0511-bugfix-release/)

= 0.5.10 =
* [NEW] Option to link to the (parent) articles instead of the images (actually only works with "category-option" set to include or exclude)
* [more information](http://blog.splash.de/2008/08/29/gallery-widget-0510-link-zum-artikel-anstatt-zum-bild/)

= 0.5.9 =
* [NEW] Option: Link to images directly or to the summary page (with the ability to comment on images)
* [NEW] Option: Add a CSS-Class to the link
* [more information](http://blog.splash.de/2008/08/03/gallery-widget-059-wordpress-plugin/)

= 0.5.8 =
* [FIX] MySQL 5.0.51/GROUP BY-Problem
* take a look at the warning
* [more information](http://blog.splash.de/2008/06/22/gallery-widget-058/)

= 0.5.7 =
* [FIX] On option "all categories" a debuginfo was shown
* [more information](http://blog.splash.de/2008/06/13/galler-widget-057-bugfix-release/)

= 0.5.6 =
* [NEW] New Option, now you can decide if the Widget is shown on all pages or the frontpage only
* [more information](http://blog.splash.de/2008/06/11/gallery-widget-056/)

= 0.5.5 =
* [NEW] Option to include or exclude categories of posts (see FAQ)
* [more information](http://blog.splash.de/2008/06/04/gallery-widget-055/)

= 0.5.4 =
* [NEW] "selecting" post-categories to be used to get attachments

= 0.5.3 =
* [NEW] It is now possible to get "latest" or "random" Images
* [more information](http://blog.splash.de/2008/05/18/gallery-widget-053/)
