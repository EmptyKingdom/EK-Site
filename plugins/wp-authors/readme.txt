=== Plugin Name ===

Contributors: rtsai
Tags: authors, widget
Requires at least: 2.2
Tested up to: 2.7
Stable tag: trunk

This sidebar widget provides a list of authors, useful for multi-author blogs.

== Description ==

This sidebar widget provides a list of authors, useful for multi-author blogs.

== Installation ==

1. Ensure that your theme is [widget-ready](http://codex.wordpress.org/Theme_List/Widget-ready).
1. Ensure you are running WordPress-2.2 or later. The "Authors" widget already exists in the [Widgets plugin](http://automattic.com/code/widgets/) for WordPress-2.1.
1. Upload `wp-authors.php` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Go to the 'Presentation' menu, click on 'Widgets', and add the 'Authors' widget to the sidebar.

== Frequently Asked Questions ==

= Isn't this already a widget? =

Yes, it is, in the older [widgets plugin](http://automattic.com/code/widgets/) releases. For some reason, the "Authors" widget was removed for WordPress-2.2.

= Can the display be customized in some way? =

There are many requests for:

* Hide an author.
* Sort them alphabetically/by-registration/by-posts/whatever.
* Show only editors/authors/whatever.
* Make list collapsible.

The wp-authors plugin simply calls `wp_list_authors` in `wp-includes/author-template.php`. The lack of all of the above feature requests are due to the sparseness of that API. Implementing any of the above features will require either hacking the WP core or directly embedding SQL queries into the plugin. Both strategies subject the plugin to breakage with each WordPress release.
