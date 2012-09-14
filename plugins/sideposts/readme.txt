=== Alkivia SidePosts ===
Revision: $Rev: 941 $
Contributors: txanny
Donate link: http://alkivia.org/donate
Help link: http://wordpress.org/tags/sideposts?forum_id=10
Docs link: http://wiki.alkivia.org/sideposts
Tags: sidebar, widget, sideposts, asides, posts, sideblog, miniblog, subblog, miniposts
Requires at least: 2.9
Tested up to: 2.9.2
Stable tag: trunk

Simple widget to move posts from a category to the sidebar. Posts in this category do not show on index, archives or feeds.

== Description ==

With this widget you select the category you want, and all entries with this category, will be shown on the sidebar instead the main blog. You will have then a small blog on the sidebar for those special entries. For each entry, you have the link to the post page. You can select the number of posts to show and if you want to show only the post excerpt or the full post content (Also excerpt with thumbnails can be shown or your out output template can be created).

Another option is to set a widget to show only private posts. In this case, private posts are hidden only in the home page and nowhere else. When set to private posts, widget only shows to users with <tt>read_private_posts</tt> capability (By default Administrators and Editors). Each widget has foot links to the category archive and feed (except por private posts).. With this simple functions, you will have a small blog on the sidebar.

= Features: =

* Have a mini-blog or foto-blog on the sidebar.
* Choose to show the full post, the post excerpt or excerpts with thumbnails.
* Create your own template to show anything else than provided templates.
* Setup a widget to show latest private posts at the sidebar.
* Entries at the aside category, are not shown from main pages.
* Widget will show a link to archives page (Option on file to remove).
* Widget has a link to the selected category feeds.
* Set category, number of posts and title on the widget settings.
* Widget allows for multiple instances.
* Some filters can be used by developers.

= Languages included: =

* English
* Catalan
* Spanish
* Belorussian *by <a href="http://www.fatcow.com" rel="nofollow">Marcis Gasuns</a>*
* Bulgarian *by <a href="http://eet-live.com/" rel="nofollow">Petar Toushkov</a>*
* Farsi (Persian) *by <a href="http://sourena.net" rel="nofollow">Sourena</a>*
* Finnish *by <a href="http://www.tiirikainen.fi" rel="nofollow">Vesa Tiirikainen</a>*
* French *by <a href="http://www.midiconcept.fr" rel="nofollow">Pierre Tabutiaux</a>*
* German *by <a href="http://www.flashdevelop.de" rel="nofollow">Andreas Khong</a>*
* Italian *by <a href="http://gidibao.net" rel="nofollow">Gianni Diurno</a>*
* Norwegian *by <a href="http://xrunblogg.com" rel="nofollow">^xRun^</a>*
* Polish *by <a href="http://aerolit.pl" rel="nofollow">Darek Sieradzki</a>*
* Portuguese (Brasil) *by <a href="http://http://www.maisquecoisa.net" rel="nofollow">Fabio Freitas</a>*
* Romanian *by <a href="http://drumliber.ro/" rel="nofollow">Drum liber</a>*
* Russian *by <a href="http://www.wp-ru.ru" rel="nofollow">Grib</a>*
* Swedish *by <a href="http://www.kopahus.se" rel="nofollow">Henrik Mortensen</a>*
* Turkish *by <a href="http://ramerta.com" rel="nofollow">Omer Faruk</a>*
* POT file for easy translation to other languages included. See the <a href="http://wiki.alkivia.org/general/translators">translators page</a> for more information.

== Installation ==

= System Requirements =

* **Requires PHP 5.2**. Will not work with obsolete PHP versions. (This includes PHP-4).
* Verify the plugin is compatible with your WordPress Version.
* WordPress SideBars must be used. If you intend to use any other sidebars replacement, check it before using this plugin.

= Installing the Widget =

1. Unzip the widget archive
1. Upload the folder sideposts to the /wp-content/plugins directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add the widget to your sidebar and select the category for the posts to show.
1. Enjoy your widget.

= Updating =

*When updating from a version prior to 2.0, you will loose your information. This is because the changes needed to allow multiple widget instances. You will have to manually set your widget again.*

* Have a backup of your style.css file if you customized it.
* Can use auto-update in wordpress plugins page.
* Can upload the new files to override the old version.

== Frequently Asked Questions ==

= Where can I find more information about this plugin, usage and support ? =

* You will find all plugin documentation in the <a href="http://wiki.alkivia.org/sideposts">Sideposts Manual</a>.
* Take a look to the <a href="http://alkivia.org/wordpress/sideposts">Plugin Homepage</a>.
* The <a href="http://alkivia.org/cat/sideposts">plugin posts archive</a> with new announcements about this plugin.
* If you need help, <a href="http://wordpress.org/tags/sideposts?forum_id=10">ask in the Support forum</a>.

= I've found a bug or want to suggest a new feature. Where can I do it? =

* To fill a bug report or suggest a new feature, please fill a report in our <a href="http://tracker.alkivia.org/set_project.php?project_id=2&ref=view_all_bug_page.php">Bug Tracker</a>.

= I'm a developer, where can I browse the source code? =

* You have all links to source code, logs and other information <a href="http://wiki.alkivia.org/sideposts/extend">in this page</a>.

== Screenshots ==

1. Widget settings panel.
2. Widget: Full posts.
3. Widget: Showing only excerpts.
4. Widget: Excerpts with thumbnails.
5. Widget: PhotoBlog feature.

== License ==

Copyright 2008, 2009, 2010 Jordi Canals

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License version 2 as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.

== Changelog ==

= 3.0.2 =
  * Max number of posts can be set in wp-config with the SIDEPOSTS_MAX constant.
  * Updated framework to 0.9 to solve some framework issues.
  
= 3.0.1 =
* Fixed issue when adding additional templates path on alkivia.ini

= 3.0 =
* New templating system for widget output.
* New option to remove archives bottom link.
* Option to include templates from your own directory.
* Plugin and Framework have separared translation files.
* Included Bulgarian translation.

= 2.5.2 = 
* Changed license to GPL version 2.
* Updated framework to 0.4.2.
* Updated Italian translation.

= 2.5.1 =
* Solved some style issues to make fully XHTML compliant.

= 2.5 =
* Updated to new framework 0.4.
* Requires PHP 5.2.

= 2.4.2 =
* Added new CSS classes: sideposts_title, spli, spli-first and spli-last.
* PhotoBlog widget now uses image size set on widget.

= 2.4.1 =
* Updated Italian Translation.

= 2.4 =
* Allows for a mini-photoblog.
* Does not show if browsing same category.

= 2.3.1 =
* Added Romanian translation.

= 2.3 =
* Now the exceprt thumbnail shown is the first image in gallery order instead the first uploaded image.

= 2.2.2 =
* Added Finnish translation.

= 2.2.1 =
* Added Russian translation.

= 2.2 =
* Now using the new WP_Widget class from WP 2.8.
* Requires WP 2.8

= 2.1.4 =
* Updated internal dashboard.
* Tested with WP 2.8.1.

= 2.1.3 =
* Fixed a dashboard block on WordPress 2.8

= 2.1.2 =
* Updated Italian translation.

= 2.1.1 =
* Added Norwegian translation.

= 2.1 =
* New option to show only title.
* Now posts are shown in daily archives.

= 2.0.3 =
* Added belorussian translation.

= 2.0.2 =
* Added compatiblity for WP 2.8.
* Solved issues with thumbnails in some browsers.
 
= 2.0.1 =
* Soved problem with thumbnails not showing.

= 2.0 =
* Allows multiple widget instances.
* Allows a widget for private posts.

= 1.5.3 =
* Updated italian translation.

= 1.5.2 =
* Added Portuguese (Brasil) translation.
* Some improvements to widget queries.

= 1.5.1 =
* Solves a query bug introduced in 1.5 related to filter not appliying correctly.

= 1.5 =
* Now can show excerpts with thumbnails.
* Added some developers filters.
* Minor fixes.

= 1.4.5 =
* Added Swedish and Polish translations.

= 1.4.4 =
* Fix: When using custom queries on templates, posts show repeated. (b30).

= 1.4.3 =
* Now language translations are not set until all plugins are loaded.
* Included Farsi (Persian) translation.

= 1.4.2 =
* Solved a major bug with "more" tag (b13).
* Corrected some translations. Increased maximum posts to 20.

= 1.4.1 =
* Completed Italian Translation for 1.4

= 1.4 =
* Check system compatibilities and dependencies.
* Deletes widget and options when deactivated.

= 1.3.3 =
* Included German Translation.

= 1.3.2 =
* Included French Translation.

= 1.3.1 =
* Now posts are shown when viewing tag pages.
* Improved the query filter.

= 1.3 =
* Arranged to show Full Content or Excerpt for the Widget.
* Improved queries to better approach.

= 1.2.1 =
* Some code cleanup.
* Added Turkish translation.

= 1.2 =
* Solved presentation issues in some themes.

= 1.1 =
* Improved filter, and deactivates it when widget is not loaded.

= 1.0.1 =
* Solved problems with K2 Theme and XHTML fixes.

= 1.0 =
* First public version

== Upgrade Notice ==
 
 = 3.0.2 =
 New configuration constant SIDEPOSTS_MAX
 
 = 3.0.1 =
 Makes 'templates-path' option to work when set on alkivia.ini.
 
 = 3.0 =
 New templating system for output.
 
 = 2.5.2 =
 Solved a problem not sending the styles file. License updated to fully compatible with WordPress.
 