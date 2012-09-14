=== Like ===
Contributors: bottomlessinc
Donate link: http://blog.bottomlessinc.com/
Tags: facebook like button, facebook button, like button, social plugin, facebook like, like, share, facebook, like, button, social, bookmark, sharing, bookmarking, widget, open graph, opengraph, protocol
Requires at least: 2.0.2
Tested up to: 2.9.2
Stable tag: 1.9.6

The Facebook Like Button Widget adds a 'Like' button to your Wordpress blog posts.

== Description ==
Let your readers quickly share your content on Facebook with a simple click.

It uses the new Facebook Like button released on Apr. 21st 2010.

You can customize it in the Settings section:

* Access directly your Facebook Pages to manage them (see screenshot 2)
* Send updates to your Fans
* IFRAME or XFBML versions of the button
* Asynchronous or Synchronous loading of the Javascript
* Width/Height
* Layout (standard, button_count or box_count)
* Verb to display (Like or Recommend)
* Fonts
* Color Scheme (Light or Dark)
* Show thumbnails of Facebook profile pictures
* Align to the Left or Right of your posts
* Show at the top and/or bottom of posts
* Show/hide the button on pages/posts/home/search/archive.
* Margins (top, bottom, left, right)
* Complete support of the Open Graph protocol (http://opengraphprotocol.org)

Internationalization supporting:

* English
* French (Français)
* German (Deutsch)
* Spanish (Espanol) - Translation by pisos.com (http://www.pisos.com)
* Portuguese (Português)
* Italian (Italiano)
* Arabic
* Russian - Translation by 5gorets @ http://www.5gorsk.su/
* Hindi
* Thai

The plugin configures automatically all the Open Graph Meta tags you need in your HTML header:

* og:site_name
* og:title
* og:type
* og:description
* og:url
* og:image (configured in the Settings)
* fb:admins (configured in the Settings)
* fb:app_id (configured in the Settings)
* fb:page_id (configured in the Settings)

All other Open Graph options are available:

* og:latitude
* og:longitude
* og:street-address
* og:locality
* og:region
* og:postal-code
* og:country-name
* og:email
* og:phone_number
* og:fax_number
* og:type

Visit the <a
href="http://blog.bottomlessinc.com/2010/04/creating-a-wordpress-plugin-add-the-new-facebook-like-button-to-your-posts/">Like Plugin Homepage</a> for more information.

== Installation ==

1. Download the latest version (ex: like.1.6.zip)
2. Extract it in the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. (Optional) Customize the plugin in the Settings > Like menu

Adding your Facebook ID to the Settings will allow you to manage your Fans
faster and send them updates.


Visit the <a
href="http://blog.bottomlessinc.com/2010/04/creating-a-wordpress-plugin-add-the-new-facebook-like-button-to-your-posts/">Like Plugin Homepage</a> for more information.

== Frequently Asked Questions ==

= Is Like free? =

Yes, but you can <a
href="http://blog.bottomlessinc.com">support
it</a>

= The Button appears in the middle when I align it to the right =

Don't forget to reduce the Width too.

= Do I need to provide my Facebook ID? =

No. The plugin works out of the box.
Adding your Facebook ID allows you to administer your pages so you would get
more functionalities if you provide it.

= How to get my Facebook ID? =

You need your NUMERICAL Facebook ID (ex: 68310606562 and not
markzuckerberg).

Click on your Facebook profile and look at the URL, it should resemble this:
http://www.facebook.com/profile.php?id=68310606562
where 68310606562 is your Facebook user ID.

If you have a username (ex: markzuckerberg), lookup your user ID with this
URL:
http://graph.facebook.com/markzuckerberg

Be careful when adding your Facebook ID as it must always be present later on
(see the Errors question below)

= My Page has many Likes but I don't see the Admin link =

You need to enter your NUMERCIAL Facebook ID in the Settings.
You also need to Like your own page.

= I get a red "Error" when clicking the Like Button =

Click on the red Error link and a popup will give you more information.

Here are some common errors reported by Facebook:

"You previously specified 68310606562 as the leading admininstatory in the
fb_admins meta tag. The fb_admins tag now specifies that 666 is the
leading administrator. That needs to be changed back."

You changed your Facebook ID in the Settings of the plugin.

Make sure you keep the original one as the first one.

You can optionally add other Facebook IDs by separating them with commas.

"Your page no longer includes any admininstrator IDs, even though you\'ve
specified one before. You must include 68310606562 in the fb_admins meta
tag, and it must be the very first one if there are many."

You simply removed your previously entered Facebook ID in the Settings of the
plugin.
Put it back and be sure to use the original one.
If specifying several comma-separated Facebook IDs to administer your pages,
be sure the original one appears first.

"The application ID specified within the fb:app_id. meta tag is not allowed
on this domain. You must setup the Connect Base Domains for your application
to include this domain."

You are NOT using XFBML:
This error from Facebook is confusing, in fact they relly mean that the
fb:admins is incorrect (you probably entered an ID of a Facebook page instead
of your own Numeric Facebook user ID)

You are using XFBML and have a Facebook Application:
Chances are you are just missing a slash at the end of your Connect URL.
Edit your Facebook Application settings, go to the Connect tab, and add a
slash at then end of your domain name in the first field called "Connect URL".

For instance your domain name should read "http://bottomlessinc.com/" and not
"http://bottomlessinc.com".

"You failed to provide a valid list of administators. You need to supply the
administors using either a fb:app_id meta tag, or using a fb:admins meta
tag to specify a comma-delimited list of Facebook users. "

You provided your string Facebook ID (ex: markzuckerberg) instead of your
numerical Facebook ID (ex: 68310606562).

Change the Facebook ID field to the numerical one in the Settings of the
plugin.


Visit the <a
href="http://blog.bottomlessinc.com/2010/04/creating-a-wordpress-plugin-add-the-new-facebook-like-button-to-your-posts/">Like Plugin Homepage</a> for more information.

== Screenshots ==

1. The Facebook Like button on a sample post.
2. Administer your Facebook page.
3. The Settings menu in the admin panel for customization.


Visit the <a
href="http://blog.bottomlessinc.com/2010/04/creating-a-wordpress-plugin-add-the-new-facebook-like-button-to-your-posts/">Like Plugin Homepage</a> for more information.

== PHP Version ==

PHP 5+ is preferred; PHP 4 is supported.


Visit the <a
href="http://blog.bottomlessinc.com/2010/04/creating-a-wordpress-plugin-add-the-new-facebook-like-button-to-your-posts/">Like Plugin Homepage</a> for more information.

== Changelog ==

= 1.9.6 =
* New button layout release on September 8th 2010 (box_count)
* Show/Hide in feed

= 1.9.5 =
* Compatibility of the latest features with PHP4

= 1.9.4 =
* Better formatting of title appearing in the News Feed
* Support for admin pages
* Can disable excerpt as description

= 1.9.3 =
* Show/Hide on search/archive
* Fonts
* More Help
* Do not display empty og meta tags
* Encode only double quotes in meta tags

= 1.9.2 =
* XFBML fix

= 1.9.1 =
* Maintenance release to correct a typo
* Encode meta tags

= 1.9 =
* Complete support of Open Graph (http://opengraphprotocol.org/)

= 1.8 =
* Support for loading XFBML asynchronously (faster loading)
* Internationalization support (Hindi and Thai)

= 1.7.1 =
* Typo

= 1.7 =
* Bug fixed where the article was sometimes not showing.
* Internationalization support (Russian, Italian, Arabic, Spanish, Portuguese,
* German).

= 1.6 =
* Support for the XFBML/Javascript version of the button.
* Internationalization support (German, Spanish and Portuguese).

= 1.5 =
* Choice to display/hide the button on pages/posts/home/search/archive.
* Internationalization support (English and French).

= 1.4 =
* Admin link to manage your Pages and send updates to Fans.

= 1.3.1 =
* Minor release with new screenshots and more description of the plugin.

= 1.3 =
* Button can be aligned to the right.
* Margins can be set.

= 1.2 =
* URL encode and support for all types of permalinks.

= 1.1 =
* Adding settings to show the button at the top and/or the bottom of the post.

= 1.0 =
* Stable version.


Visit the <a
href="http://blog.bottomlessinc.com/2010/04/creating-a-wordpress-plugin-add-the-new-facebook-like-button-to-your-posts/">Like Plugin Homepage</a> for more information.
