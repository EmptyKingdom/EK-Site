=== Facebook Fan box ===
Contributors: Marcos Esperon
Tags: facebook, fan box
Requires at least: 2.5
Tested up to: 2.9
Stable tag: 1.6

Display a Facebook Fan Box on your blog. Put the Facebook Fan Box in your sidebar using the widget mode or call the function inside your template.

== Description ==

If you have a page in Facebook about your blog and want to show the Facebook Fan Box with the recent updates and fans, just activate this widget or insert this line of code anywhere in your theme:

`<?php facebook_fan_box('API_KEY', 'PROFILE_ID'); ?>`

If you want to change updates visibility, max. number of fans, width or css properties, just do this:

`<?php facebook_fan_box('API_KEY', 'PROFILE_ID', 'STREAM', 'CONNECTIONS', 'WIDTH', 'CSS', 'IFRAME', 'HEIGHT', 'LOGO', 'LANG'); ?>`

Where:

- STREAM: Set to 1 to display stream stories in the Fan Box or 0 to hide stream stories. (Default value is 1.)

- CONNECTIONS: The number of fans to display in the Fan Box. Specifying 0 hides the list of fans in the Fan Box. You cannot display more than 100 fans. (Default value is 10 connections.)

- WIDTH: The width of the Fan Box in pixels. The Fan Box must be at least 200 pixels wide at minimum. (Default value is 300 pixels.)

- CSS: The URL to your own style sheet (more info: http://wiki.developers.facebook.com/index.php/Fb:fan).

- IFRAME: If you are unable to use JavaScript method for some reason, you can use add a Fan Box using an HTML iframe tag (Default value is 0).

- HEIGHT: Limits the height used by the widget.

- LOGO: Show/Hide Facebook logo bar.

- LANG: Facebook Locale (en_US, es_ES...).

UPDATED: Facebook changed the social plugins so Fan Box is now Like Box (and there is a new plugin for it). If you want to use this plugin LEAVE API_KEY VALUE EMPTY.

== Installation ==

1. Upload the entire facebook-fan-box folder to your wp-content/plugins/ directory.

2. Activate the plugin through the 'Plugins' menu in WordPress.

3. Visit http://www.facebook.com/pages/create.php to create a new page in Facebook.
   Edit your page and copy its Page ID from adress bar.

4. Use this information to call the function inside your template or activate the widget.

== Screenshots ==
1. Facebook Fan Box - Select Fan box

2. Facebook Fan Box - Copy your Page ID from text at adress bar

== Changelog ==  

= 1.6 =
* New Fan Box call: not use API_KEY value.

= 1.5 =
* Facebook locale option.
* Title enabled in the widget method.
* New Facebook javascript call.

= 1.4.1 =
* Solved issue with height parameter.

= 1.4 =
* Facebook logo bar option.

= 1.3.2 =
* Height option.
* Solved validation errors.

= 1.3.1 =  
* Solved problem with CSS cache.
* CSS template for personal customization included.

= 1.3 =  
* widget support.

= 1.2 =  
* iFrame check change.

= 1.1 =  
* iFrame support.

= 1.0 =  
* Initial release.