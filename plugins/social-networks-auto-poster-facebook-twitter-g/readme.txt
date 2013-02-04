=== NextScripts: Social Networks Auto-Poster ===

Contributors: NextScripts
Donate link: http://www.nextscripts.com/social-networks-auto-poster-for-wordpress
Tags: automation, autopost, auto-post, auto post, socialnetworks, socialnetwork, social networks, social network, facebook, google, google+, twitter, google plus, pinterest, tumblr, blogger, blogspot, blogpost, linkedin, delicious, delicious.com, plugin, links, Post, posts, api, automatic, seo, integration, bookmark, bookmarking, bookmarks, admin, images, image, social, sharing, share, repost, re-post, wordpress.com, StumbleUpon, Diigo, vBulletin, Plurk, forums, vKontakte, open graph, LiveJournal
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 2.6.1
License: GPLv2 or later

Automatically re-publishes blogposts to Facebook, Twitter, Google+, Pinterest, LinkedIn, Blogger, Tumblr, Delicious, Plurk, etc profiles and/or pages

== Description ==

**This plugin automatically publishes posts from your blog to your Social Network accounts** such as Facebook, Twitter, Google+(Google Plus), Blogger, Tumblr, LiveJournal, DreamWidth, Delicious, Diigo, Stumbleupon, LinkedIn, Pinterest, Plurk, VKontakte(VK.com), Wordpress, etc. The whole process is completely automated. Just write a new post and either entire post or it's nicely formatted announcement with backlink will be published to all your configured social networks. You can reach the most audience and tell all your friends, readers and followers about your new post. Plugin works with profiles, business pages, community pages, groups, etc. 

* **Latest version 2.6** - Better Interface, DreamWidth support, ability to auto-import comments from social networks
* *Version 2.5* - Export/Import Plugin settings, direct links to the published posts from the "Edit" page, ability to assign categories to each Social Network. LiveJournal Support.  
* *Version 2.4* - "Image" posts for Facebook and Twitter, bit.ly support, Plurk Support
* *Version 2.3* - Google+ image posts, delayed postings (Pro Only), new networks - Stumbleupon, vBulletin, Diigo

= Supported Networks =

* **Blogger/Blogspot** - Autopost to your Blog. HTML is supported.
* **Delicious** - Auto-submit bookmark to your account. 
* **Diigo** - Auto-submit bookmark to your account. 
* **Facebook** - Autopost to your profile, business page, community page, or Facebook group page. Ability to attach your blogpost to Facebook post. Ability to make "Image" posts.
* **Google+** (*with third party API library*) - Autopost to your profile or business page. Ability to attach your blogpost to Google+ post. Ability to make "Image" posts.
* **LinkedIn** - Autopost to your account. Ability to attach your blogpost to LinkedIn post. Autopost to LinkedIn Company pages and/or Groups (*with third party API library*)
* **LiveJournal** - Auto-submit your blogpost to LiveJournal. "LiveJournal Engine" based website DreamWidth.org is also supported.
* **Pinterest** (*with third party API library*) - Pin your blogpost's featured image to your Pinterest board.
* **Stumbleupon** - Auto-submit bookmark to your account. 
* **Tumblr** - Autopost to your account. Ability to attach your blogpost to Tumblr post. HTML is supported.
* **Twitter** - Autopost to your account. Ability to attach Image to tweets.
* **Plurk**  - Autopost to your account. Ability to attach Image to messages.
* **vBulletin** - Auto-submit your blogpost to vBulletin forums. Could create new threads or new posts.
* **vKontakte(VK.com)** - Autopost to your profile or group page. Ability to attach your blogpost to Facebook post. Ability to make "Image" posts.
* **Wordpress** - Auto-submit your blogpost to another blog based on Wordpress. This options includes Wordpress.com, Blog.com, etc..

... more networks are coming soon ...

**Plugin makes 100% White Labeled Posts** The main idea behind the plugin is to give you the ability to promote only yourself. Plugin uses your own apps and all posts to all networks come only from you. No "Shared via NextScripts.com" or "Posted by SNAP for Wordpress" messages.

Please see <a href="http://www.nextscripts.com/installation-of-social-networks-auto-poster-for-wordpress/">complete installation instructions with screenshots</a>

<a href="http://www.nextscripts.com/support/">Contact support/Open Support Ticket</a>

== Installation ==

You need to have account with either Facebook, Tumblr, Google+, LinkedIn, Pinterest, Blogger, Twitter, Delicious, Diigo, Plurk, LiveJournal, Stumbleupon, DreamWidth or all of them.

**Please, see more detailed installation instructions with screenshots here:** http://www.nextscripts.com/installation-of-social-networks-auto-poster-for-wordpress 

Below are the quick instructions for Facebook, Twitter and Google+. Please see other networks at the link above...

Social Networks Auto Poster (SNAP).

1. Upload plugin folder to the /wp-content/plugins/.
2. Login to your Wordpress Admin Panel, Go to the Plugins->Installed Plugins, Find "Next Scripts Google+ AutoPoster" in your list, click "Activate"

Facebook.

1. Create an app and community page for your website.
   1. Login to your Facebook account.
   2. Go to the Facebook Developers page: https://developers.facebook.com/apps
   3. Click "+ Create New App" button. Fill "App Name", "App Namespace", agree to policies and click "Continue", fill captcha, click "Continue".
     ***Notice App ID and App Secret on this page.
   4. Click "Website with Faceook Login", enter your website URL
   5. Enter your domain to the App Domain. Domain should be the same domain from URL that you have entered to the "Website  with Faceook Login" during the step 4.   
   6. [Optional - you can skip this step and use existing page] Click "Advanced" from the left side menu "Settings.". Scroll all the way down and click "Create Facebook Page" button. Facebook will create Community page for your App. Click on it and see the URL. It will be something like http://www.facebook.com/pages/Your-Site-Community/304945439569358
   
2. Connect Facebook to your Wordpress.
   1. Login to your Wordpress Admin Panel, Go to the Settings->Social Networks AutoPoster Options.
   2. Click green "Add new account" button, select "Facebook" from the list. 
   3. Fill URL of your Community page from step 6 above.
   4. Fill "App ID" and "App Secret" from step 3 above.
3. Authorize Facebook for your Wordpress.
   1. Click "Update Settings". Notice new link "Authorize Your FaceBook Account".
   2. Click "Authorize Your FaceBook Account" and follow the Facebook authorization wizard. If you get any errors at this step, please make sure that domain for your Wordpress site is entered to your App as "App Domain".
4. Your facebook is ready to use.

Twitter.

1. Create a Twitter App for your website.
   1. Login to your Twitter account.
   2. Go to the Twitter Developers website: https://dev.twitter.com/ Sign in again if asked.
   3. Click "Create an app" link from the right panel. Fill details, click "Create your Twitter application".
     ***Notice Consumer key and Consumer secret on this page.    
   4. Click "Settings" tab. Scroll to the "Application type", change Access level from "Read Only" to "Read and Write". Click "Update this Twitter application settings".    
   5. Come back to "Details" tab. Scroll to the "Your access token" and click "Create my access token" button. Refresh page and notice "Access token" and "Access token secret". Make sure you have "Read and Write" access level. 
   
2. Connect Twitter to your Wordpress.    
   1. Login to your Wordpress Admin Panel, Go to the Settings->Social Networks AutoPoster Options.
   2. Click green "Add new account" button, select "Twitter" from the list. 
   3. Fill your Twitter URL.
   4. Fill "Consumer key" and "Consumer secret" from step 3 above.
   5. Fill "Access token" and "Access token secret" from step 5 above.
3. Your Twitter is ready to use.

Google+.

Google+ don't yet have API for automated posts. You need to get special library module to be able to publish Google+ posts.

1. Create Google+ page for your website.
   1. Login to your Google+ account.
   2. Click "Create a Google+ page" link from the right panel. Choose category, fill details, click "Create".
     ***Notice the URL of your page. 
2. Connect Google+ to your Wordpress.
   1. Login to your Wordpress Admin Panel, Go to the Settings->Social Networks AutoPoster Options.
   2. Click green "Add new account" button, select "Google+" from the list. 
   3. Fill Google+ Login and Password. Please note that Wordpress is not storing your Google+ password in very secure manner, so you better create a separate G+ account for your website.
   4. Fill the ID of your page. You can get this ID from your URL (Step 2 above). If your URL is https://plus.google.com/u/0/b/117008619877691455570/ - your ID is 117008619877691455570
3. Your Google+ is ready to use. 

Please see <a href="http://www.nextscripts.com/installation-of-social-networks-auto-poster-for-wordpress/">complete installation instructions with screenshots</a>

== Frequently Asked Questions ==

= What is the difference between "Free" and "Pro" versions? =

Free plugin is limited to one account per each type of connected networks. In other words you can add 1 Facebook, AND 1 Twitter AND 1 LinkedIn AND 1 etc ... accounts in the "Free" version. This is enough for about 95% of users.

Pro plugin is NOT limited in number of accounts per each type of connected networks.  You can add 10 (or 100) Facebook, AND 15 Twitter AND 5 LinkedIn AND 25 etc ... accounts in the "Pro" version. 

Please see more here: <a href="http://www.nextscripts.com/social-networks-auto-poster-pro-for-wordpress-compare-editions//">Compare Editions</a>

=  What networks in your auto-poster plugin are free and what are not? Why some networks are not free? =

All networks except Google+, Pinterest and LinkedIn Company Pages are available for free.

It really depends on the availability of the free API from the Social Network itself.
Facebook, Twitter, Tumblr, LinkedIn and others have a very good and powerful free APIs that could be used for publishing posts. Those networks are free for you. Some networks like Google+ and Pinterest don't have API or have a read-only API that doesn't allow to make posts. We had to create our own API libraries for such networks and those libraries are available separately for some fee.

=  Does the free plugin support Wordpress Multisite (ex-WPMU)? =

Free plugin does not support Wordpress Multisite. There is a separate "Pro for WPMU" plugin available for Wordpress Multisite. Please see more here: <a href="http://www.nextscripts.com/social-networks-auto-poster-pro-for-wordpress-compare-editions//">Compare Editions</a>

= Can I use it just for Twitter (Facebook, LinkedIn, Delicious) or it requres all networks to be set? =

Sure you can use it for just one or two networks.

= Can it post to Facebook and Google+ pages? Not to profiles, but to pages. =

Yes, it can. Specify page IDs in the settings, and it will post to pages. 

= Why it's not so easy to setup? Why do I need all those apps? There are other plugins (Jetpack Publicize, Linksalpha Network Publisher, etc ) that could do it much easier. =

There is a major difference between SNAP and other auto-posting plugins. Plugin MUST use an "App" to make posts. if plugin doesn't ask you to create your own app, it will use an app set by plugin author. Yes, it's easier to setup but it means that with every post you make you will promote that plugin author to all your friends and followers. All those posts will be marked as "Shared via Wordpress.com" or "posted by Linksalpha". SNAP gives you an ability to setup your own apps and promote only yourself. We have a very detailed and illustrated setup instructions and our support can help you with that. We beleive that it's well worth to spend your time by setting it up, instead of doing free advertisement for somebody else.

Please see more <a href="http://www.nextscripts.com/faq/">Frequently asked questions</a>

== Screenshots ==

1. Add new post metadata box (Pro Version)
2. Settings Page (Pro Version)
3. Facebook: Types of Post 
4. Google+: Types of Post 

== Changelog ==

= 2.6.1 [02/01/2013] =

* Bug fix - Critical bugfix for Facebook Authorization.
* Bug fix - "Import comments" interface tweaks.
* Bug fix - "Add new network" interface tweaks.

= 2.6.0 [01/31/2013] =

* New - Ability to auto-import Comments from Social Networks and post them as WP Comments (Facebook only so far)
* New/Improvement - New Settings Interface
* New - New network (kind of): DreamWidth.org - LJ Based Website
* New - Additional URL Parameters
* New/Improvement - Plugin will invoke it's own cron in case of broken WP Cron. 
* Bug fix - vKontakte - NXS API Fixed.
* Bug fix - Pinterest - fixed "board retreive" that could break the settings.
* Bug fix - Pinterest - fixed "0" board ID problem.
* Bug fix - Pinterest - fixed problem with wrong default image.
* Bug fix - Plurk - Better error handling.
* Bug fix - Fixed broken posting to selected categories only.
* Bug fix - Account assigned categories were not saved.
* Many other minor bug fixes and improvements

= 2.5.5 [01/18/2013] =

* New/Improvement - Tumblr - Audio and Video Post types
* New/Improvement - %HTAGS% and %HCATS% for insert tags and categories as hashtags
* Bug fix - Critical Facebook Authorization Problem

= 2.5.4 [01/17/2013] =

* New - New network: VKontakte(vk.com). Repost your blogposts to your VK account.
* Bug fix - Facebook settings saving problem on some configurations
* Bug fix - Google+ debug text removed
* Bug fix - WPMU Edition only. - Lost settings opages on users websites.

= 2.5.3 [01/15/2013] =

* New - Support for posting to Google+ Communities.
* New - Auto-posting is now supported for Wordpress pages as well. 
* Bug fix - Twitter over the limit if a lot of tags were used.
* Bug fix - Blogger posted the wrong title.

= 2.5.2 [01/07/2013] =

* Bug fix - Critical Facebook posting issue.
* Bug fix - Critical Stumbleupon posting issue.
* Bug fix - Tumblr and SU were not taking settings from the "Edit" page
* Bug fix - Post/Don't Post checkboxes issues.
* Bug fix - Twitter - incomatibility with url_f_open set to off.

= 2.5.1 [01/06/2013] =

* New - New network: LiveJournal. Repost your blogposts to your LiveJournal account.
* New/Improvement - Facebook - support for Vimeo videos
* Improvement/Bug fix - Facebook - better handling of videos in the post.
* Bug fix - Import was button broken on some sites

= 2.5.0 [01/02/2013] =

* New - Export/Import plugin settings 
* New/Improvement - Direct links to posts in the "Edit" page.
* New/Improvement - Pinterest - ability to "Pin" videos.
* Improvement - Facebook - Photos could be posted to the App Album or to the "Wall" album to avoid grouping
* Improvement - if post has video and no images, video preview image wil be used.
* Improvement/Bug fix - Fixed incorrect image checking against websites blocking HEAD request.
* Improvement/Bug fix - support for "attached" but not "featured" images.
* Bug fix - Facebook were getting a broken "image" post if post contained a video.
* Bug fix - Plurk was not taking settings from the "Edit" page
* Bug fix - Blogger (Free API) iframe was breaking autoposting with "iframe" must be followed by the ' = ' character." message

= 2.4.8 [12/21/2012] =

* New/Improvement - external jQuery reference removed.
* Bug fix - Pinterest board selection fix.
* Bug fix - StumbleUpon connection fix.
* Bug fix - Twitter %TAGS% and %CATS% for non English characters
* Bug fix - Twitter %TAGS% and %CATS% were not found in the text sometimes.
* Bug fix - Wordpress better handling of connection errors.
* Bug fix - Post status saving.

= 2.4.7 [12/13/2012] =

* New/Improvement - Ability to change format before reposting when you edit post.
* Bug fix - Critical Blogger "Function not found" fix.
* Bug fix - Escaped quotes in Message Format.

= 2.4.6 [12/12/2012] =

* Improvement - Wordpress 3.5 compatibility
* Improvement/Bug fix - Better image handling.
* Bug fix - Broken URL Shortener Selection.
* Bug fix - Fixed LinkedIn for European accounts.
* Bug fix - Twitter Message length tweaks.

= 2.4.5 [12/07/2012] =

* Improvement/Bug fix - Google+ better "Post type" selection.
* Bug fix - Google+ - image uploads for pages go to the right album, not profile.
* Bug fix - Google+ - Correct image for "attached" posts
* Bug fix - Twitter image attachment broken in 2.4.4

= 2.4.4 [12/06/2012] =

* Improvement - Twitter - If tags and categories are already in the text will become hashtags, not duplicates.
* Improvement/Bug fix - "Check All/Uncheck All" links now have priority over category selection.
* Bug fix - Blogger - broken messages.
* Bug fix - Plurk - 180 characters limit.
* Bug fix - Twitter correct characters count (119) for "Posts with image"

= 2.4.3 [12/04/2012] =

* New - Support for Wordpress Built-in Shortener
* Improvement/Bug fix - Facebook - better image posting.
* Bug fix - Blogger Error  "Attribute name associated with an element type "####" must be followed by the ' = ' character
* Bug fix - Blogger taking over the WP Admin after the error.
* Bug fix - Blogger "Invalid JSON" Error
* Bug fix - Plurk Error "Call to undefined function http_build_url()"
* Bug fix - LinkedIn "We were unable to post your update" error.
* Bug fix - Pinterest UTF characters in the Board names.
* Bug fix - Pinterest - better Handling of Error 502.

= 2.4.2 [11/30/2012] =

* New - New network: Plurk. share your new blogpost on your Plurk account.
* New - Twitter - ability to post tags and categories as #hashtags
* Improvement - Facebook settings screen shows what URL and Domain use for App Configuration.
* Improvement - Facebook - <br/> will add a line break for "Facebook Message text Format"
* Bug fix - SSL connections fix and SSL cerificate update
* Bug fix - Broken URL Shorthener selection

= 2.4.1 [11/22/2012] =

* Bug fix - Twitter error if  attachmet image is missing
* Bug fix - Issue with apostrophes and quotes
* Improvement - "Click-through URL" for the Tumblr "Photo" posts can use shorthened URLs.
* Improvement - Ability to select custom field instead of the featured image.

= 2.4.0 [11/13/2012] =

* New - Facebook "Photo" posts.
* New - Ablity to attach image to Twitter posts
* New - Bit.ly support for short link.
* New - wp.me support for short links. (Jetpack users only)
* Improvement - "Click-through URL" for the Tumblr "Photo" posts.

= 2.3.12 [11/09/2012] =

* Improvement/Bug fix - Blogger Better support for broken HTML.
* Bug fix - LinkedIn "Empty Message" Fix 
* Bug fix - Facebook "Empty Message" Fix 
* Bug fix - StumbleUpon debug info removed.
* Bug fix - "Re-Post" buttons were not working sometimes.

= 2.3.11 =

* Bug fix - Pinterest "Board Not set Error"
* Bug fix - StumbleUpon "Uncategorized" problem.
* Bug fix - StumbleUpon "NSFW" problem.
* Bug fix - Delayed posts "Hours" settings wasn't saved properly sometimes.

= 2.3.10 =

* Bug fix - Critical Blogger "Function not found" fix.

= 2.3.9 =

* Improvement/Bug fix - qTranslate users - only default language will be auto-posted, not all of them at once.
* Improvement/Bug fix - Better image finder.
* Improvement/Bug fix - Better duplicate posts prevention.
* Bug fix - Google+ - quotes in title might break the posting.
* Bug fix - Google+ - broken switch between post types in "new post" page.
* Bug fix - Missing argument 1 for nxs_snapClassSU::suCats() error
* Bug fix - First argument is expected to be a valid callback, 'nsAddOGTags' was given error
* Bug fix - Better Tumblr Error handling.
* Bug fix - Better Delicious Error handling.
* Bug fix - Google+ - quotes in title might break the posting.

= 2.3.8 =

* Improvement/Bug fix - Blogger - UTF-8 Characters support (Russian, Greek, etc).
* Bug fix - multiple slashes in "message format" field.
* Bug fix - Blogger - Better errors handling.

= 2.3.7 =

* Improvement/Bug fix - Compatibility mode is on bu default and the name for it changed to "Use Advanced image finder".
* Bug fix - Tags settings for StumbleUpon and vBulletin.
* Bug fix - UTF 8 Special characters. 

= 2.3.6 =

* Improvement/Bug fix - Compatibility mode. Activate it in Plugin Settings->Other Settings if your site is having problems displaying content or giving you "ob_start() [ref.outcontrol]: Cannot use output buffering in output buffering display handlers" errors. 

= 2.3.5 =

* New - Google+ new post option - image post.
* New - Delayed postings (Pro only).
* Improvement - Google+ API is able to post images.
* Improvement/Bug fix - if your site has og:tags from another plugin, ours are automatically disabled. This will prevent double titles in Google+.
* Improvement/Bug fix - compatibility with several other popular plugins like Jetpack, bbPress, etc.
* Bug fix - Blogger - tags length fix.

= 2.3.4 =

* Improvement - Completely redone og:tags. Now compatible with SEO Optimizations from Plugins and Themes.

= 2.3.3 =

* New - New network: Diigo. Share your new blogpost on your Diigo account.
* Improvement - "No Categories Selected" warning.
* Bug fix - Special characters in passwords fix.
* Bug fix - Delicious Error Reporting fix.
* Bug fix - Better Facebook SSL Error Handling.

= 2.3.2 =

* New - New network: vBulletin. Share your new blogpost to vBulletin based forums.
* Functionality Change - due to massive amount of requests - WP Pro (not WP Pro for MU) allows to post only to one main Super Admin account, not to all accounts across in the network.
* Bug fix - StumbleUpon re-post wrong category fix.
* Bug fix - "expecting T_FUNCTION" error.
* Bug fix - Blogger - "Invalid JSON" Error

= 2.3.1 =

* Bug fix - Facebook stability.
* Bug fix - WP Multisite Management problems.

= 2.3.0 [10/12/2012] =

* New - Support for WP Multisite (Pro Only) - http://www.nextscripts.com/social-networks-auto-poster-pro-for-wordpress-compare-editions/
* New - New network: Stumbleupon. Share your new blogpost on your StumbleUpon account.
* Improvement - Better configuration screens.
* Improvement - Facebook SDK upped to 3.2.0
* Bug fix - Facebook authorization problems.
* Bug fix - Blogger Character encoding.
* Bug fix - Stability improvements
* Bug fix - LinkedIn post without attachment.


= 2.2.5 =

* Improvement - Better Facebook Authorization handling
* Bug fix - Facebook Formatting problems.
* Bug fix - Blogger Connections.
* Bug fix - Blogger Connections.
* Bug fix - Errors in WP 2.8

= 2.2.4 =

* New - Installation/Configuration links.
* Bug fix - Plugin Activation problem on system with short_open_tag off
* Bug fix - Pinterest posting problems.
* Bug fix - Delicious Login problems.
* Bug fix - LinkedIn Company Pages posting improvements.
* Bug fix - Facebook re-posting without attached post problems.
* Bug fix - Blogger - "These characters are not allowed in a post label" error.
* Bug fix - Another try to work around Chrome bugs adding multiple Blogger accounts.

= 2.2.3 =

* New - New Tab - Help/Support with some useful info.
* Bug fix - Important performance fix.
* Bug fix - Log/History Refresh and Clear Buttons.

= 2.2.2 =

* Improvement - Some interface improvements.
* Bug fix - Important performance and stability fix.
* Bug fix - Problem with disappearing accounts.

= 2.2.1 =

* New - Admin can decide what user level can see the SNAP Meta Box on the "New Post" page.
* Bug fix - Better Facebook authorization errors handling
* Bug fix - LinkedIn was still attaching a post if not selected.
* Bug fix - Problem with Log/History saving.

= 2.2.0 [09/25/2012] =

* New - NextScript LinkeIn API support for company pages auto-posting (Beta).
* New - Actions Log - see the log of the auto-postings.
* Improvement - Better interface.
* Bug fix - "headers already sent by line 344" Error.
* Bug fix - Workaround fix for non-numeric "Facebook Group" pages. We hope that Facebook will fix it soon.
* Bug fix - Saving problems for the "Settings" page.
* Bug fix - LinkedIn post Formatting problems. 
* Bug fix - Facebook was still attaching a post if not selected.

= 2.1.3 =

* Improvement - Include/Exclude categories are now a select/unselect inteface, not a field for entering numbers.
* Improvement - Better Facebook attachement images handling.
* Improvement/Bug fix - Detection of the Select Google Analytics for WordPress plugin that causes authorization troubles.
* Bug fix - Twitter was missing URL if Title is too long.
* Bug fix - Include/Exclude categories

= 2.1.2 =
* Bug fix - 404 Errors during reactivation.
* Bug fix - Message for Multiuser Wordpress.
* Bug fix - Tumblr Authorization problems.

= 2.1.1 =
* Bug fix - Unselected Networks were still published.
* Bug fix - Broken quotes in the "Message Format".
* Bug fix - "Post Immediately" was broken for free accounts.

= 2.1.0 [09/12/2012] =
* New - New network: Wordpress based websites. This option includes Wordpress.com, Blog.com, and and any other blogs based on WP.
* Improvement - nicknames for your accounts. You can give each account a nickname to make it easier to identify in the list.
* Improvement - better looking settings pages. 
* Improvement - new option to either schedule auto-posts (recommended) or do it immediately. This could be useful to the people with disabled or broken WP Cron.
* Critical Stability fix - The next GoDaddy crush should not break your website.
* Bug fix - disappearing accounts.
* Bug fix - custom post settings weren't saved in some cases.
* Bug fix - format and settings fixes for almost all networks.

= 2.0.12 =
* Bug fix - Some Facebook connectivity issues.
* Bug fix - Unselected Custom post types were still published in some cases.

= 2.0.11 =
* Bug fix - Compatibility issue with some browsers.

= 2.0.10 =
* Bug fix - Facebook "Share link" fix.
* Improvement/Bug fix - some interface cosmetic changes.

= 2.0.9 =
* Bug fix - Facebook Authorization "Error 100" Fix.

= 2.0.8 [08/06/2012] =
* Improvement - Better list of available accounts.
* Improvement/Bug fix - a lot of cosmetic interface changes and code optimizations for problem fixing and better looking.
* Bug fix - Google+ Wrong options when using "Repost Button"
* Bug fix - Google+ Fixed publishing of new lines in messages.
* Bug fix - Pinterest Settings Disappearance

= 2.0.7 =
* Improvement - Better list of available accounts.
* Bug fix - "Facebok Options Save" error fix.

= 2.0.6 =
* Improvement - Ability to check/uncheck all networks during post writing
* Bug fix - Unchecked networks were still getting posts
* Bug fix - Pinterest "Retrieve Boards" problem
* Bug fix - Delicious broken tags error.

= 2.0.5 =
* New - Delicious support (test)
* Bug fix - Pinterest "Cannot access empty property" error.

= 2.0.4 =
* Improvement - Pinterest is caching login info to prevent "multiple logins" issues.
* Bug fix - Pinterest special characters

= 2.0.3 =
* Initial public 2.0 Release.

= 1.9.13 [08/28/2012] =
* Improvement - Pinterest is caching login info to prevent "multiple logins" issues.
* Bug fix - Pinterest special characters
* Bug fix - Tumblr Authorization issue.

= 1.9.12 =
* New - Version 2.0.3 Beta is available to try.
* Bug fix - Removed many (\\\) Slashes from some Google+ Posts.
* Bug fix - Tumblr Authorization fix.
* Bug fix -  New LinkedIn oAuth model support fix.
* Bug fix -  Twitter New "Smarter" Twitter 140 characters limit handling fix.

= 1.9.11 =
* Bug fix - Google+ Fix for new interfaces.
* Improvement/Bug fix - New "Smarter" Twitter 140 characters limit handling. URL won't be cut anymore.

= 1.9.10 =
* Improvement/Bug fix - New LinkedIn oAuth model support.  

= 1.9.9 =
* Bug fix - Javascript/JQuery Error fixed  

= 1.9.8 =
* Improvement - Now you have a choice between "attaching" your post to Facebook or "Sharing a link" to it  
* Improvement - Better Twitter connection for non SSL
* Bug fix - Pinterest Default Settings
* Bug fix - Pinterest Board Selection

= 1.9.7 =
* Improvement - New Internal DB Structure preparing for 2.0
* Bug fix - Google Connectivity issues
* Bug fix - Blogger Connectivity issues

= 1.9.6 =
* Bug fix - Twitter formatting
* Bug fix - Google incorrect page issue.
* Bug fix - Facebook Personal Page Authorization Issue.
* Bug fix - SSL connectivity issued for some hosts.

= 1.9.5 =
* Bug fix - Twitter short URLS
* Bug fix - Google/Pinterest Connectivity issues

= 1.9.4 =
* Bug fix - Tumblr, LinkedIn and Blogger compatibility issues..

= 1.9.3 =
* Bug fix - Missing "No custom posts" option.

= 1.9.2 =
* Improvement - Ability to Include/Exclude "Custom Post Types" from autoposting.
* Improvement - Better "Custom Post Types" support.
* Bug fix - Tumblr Authorization issues

= 1.9.1 =
* Bug fix - Correct Special Character Encoding
* Bug fix - Blooger Encoding issues.

= 1.9.0  [07/13/2012]=
* New - LinkedIn Support
* Improvement - Post Options are now movable
* Improvement - Security for Google+, Pinterest, Blogger - passwords are better encoded in the DB.
* Improvement - Tumblr - Better compatibility with other plugins.
* Bug fix - Twitter URL length fix.
* Bug fix - Google+, Pinterest, Blogger - Incorrect Username/Problem due to the magic quotes being "On"
* Bug fix - More then 10 stability, compatibility, security fixes.

= 1.8.7 =
* Bug fix - Tumblr/Blogger issue with missing function.

= 1.8.6 =
* New - If blogpost has video it can be used as attachment in Facebook post. 
* Bug fix - Facebook %TEXT% and %FULLTEXT% formatiing issues.
* Bug fix - Some Blogger Authorization issues.

= 1.8.5  [07/05/2012]=
* Bug fix - Format settings disappeared after update post
* Bug fix - Twitter 140 characters limit when used with %TEXT% and %FULLTEXT%

= 1.8.4 =
* New - Blogger Support
* New/Improvement - Post to Tumblr and Blogger/Blogspot could be posted with tags
* New/Improvement - Tumblr is now open_basedir safe. 
* Bug fix - G+ Authorization problem with non google.com domains (like google.com.sg, google.com.br, google.ru, etc). 
* Bug fix - Pinterest "Test" Button

= 1.8.3 =
* Improvement - better compatibility with some other popular plugins.
* Bug fix - Tumblr Authorization Problem. 

= 1.8.2 =
* Bug fix - Tumblr Authorization Problem. 

= 1.8.1 =
* Improvement - Pinterest will look for images in post text if featured image is missing
* Improvement - Pinterest - ability to change board during the post writing
* Bug fix - Several small bugs and formating fixes.

= 1.8.0  [06/29/2012]=
* New - Pinterest Support
* New - Tumblr Support
* New/Improvement - %IMG% replacement tag - Inserts Featured Image URL
* Improvement - Better Image Handling  
* Improvement - Better Facebook Authorization
* Improvement - Google+ Interactive Phone and Email Account Verification Support
* Bug fix - Google+ "You are not authorized for this page" Error

= 1.7.6 =
* Improvement - Better Facebook Posts Formatting  
* Improvement - Better Google+ Posts Formatting  
* Improvement - Google+ Phone Verification support
* Bug fix - Google+ "You are not authorized for this page" Error

= 1.7.5  [06/14/2012]=
* New/Improvement - %SURL% replacement tag - Shortens URL
* Improvement - Wordpress 3.4 Compatibility
* Improvement - Better handling of Twitter's "140 characters limit" 
* Bug fix - Facebook posts to use Home URL instead of Site URL
* Bug fix - Better error handling

= 1.7.3 =
* Bug fix - Some Facebook Authorization/Connection issues.

= 1.7.2 =
* New/Improvement - %AUTHORNAME% - Inserts the author's name.
* Improvement - better Facebook errors handling
* Bug fix - Facebook 1000 character limit error fixed.

= 1.7.1 =
* Bug fix - Repost button fixed.

= 1.7.0 [06/05/2012] =
* New - Support for Wordpress "Custom Post Types".
* New - Ability to add open graph tags without third party plugins.
* Improvement - Better compatibility/faster Google+ posting.
* Improvement - If post thumbnail (featured image) is not set, script will look for images in the post.
* Improvement - If excerpt is not set, script will auto-generate it.
* Bug fix - Fixed "Changing format of the message for each individual post" problem.
* Bug fix - Fixed missing "Pending-to-Publish" status change.
* Bug fix - Twitter settings page format fixed.

= 1.6.2 [05/09/2012]=
* Bug fix - Fix for "Cannot modify header information" message while posting to Twitter.

= 1.6.1 =
* Improvement - New posting format: %TEXT% - Inserts the excerpt of your post. %FULLTEXT% - Inserts the body(text) of your post.
* Bug fix - Activation Problem "unexpected $end" for servers with no support for short php tags <? ?>.

= 1.6.0 =
* Improvement - New improved settings page with test buttons.
* Bug fix - Rare Facebook crush.
* Bug fix - G+ Stability Fix.

= 1.5.9 =
* Improvement/Bug fix - Fixed compatibility with another plugins using the same Facebook and Twitter APIs.

= 1.5.8 =
* Bug fix - G+ problem with Wordpress installed on Windows Servers.
* Bug fix - Problem with Facebook and empty Website title.

= 1.5.7 =
* Improvement - Updated Facebook posting - support for Facebook Groups, faster profile posting.
* Improvement - Better compatibility with older WP versions (<3.1).
* Improvement - Not required to replace G+ library with each update if placed into /wp-content/plugins/ folder.

= 1.5.6 =
* Bug fix - Wrong Options Page Placement.
* Improvement - Better G+ Attachments Handling.

= 1.5.5 =
* Bug fix - Included/Excluded Categories.
* Improvement - Easier Facebook setup.

= 1.5.4 =
* Bug fix - Wrong Re-Post Buttons.
* Improvement - Better G+ Compatibility.
 
= 1.5.3 =
* Bug fix - Correct Message after the post.

= 1.5.2 =
* Bug fixes - default checkboxes.

= 1.5.1 =
* Initial public release

= 1.2.0 =
* Closed Beta

= 1.0.0 =
* Closed Beta

== Upgrade Notice ==

Just repllace plugin files, the rest will be updated automatically.

== Other/Copyrights ==

Plugin Name: Next Scripts Social Networks Auto-Poster

Plugin URI: http://www.nextscripts.com/social-networks-auto-poster-for-wordpress

Description: This plugin automatically publishes posts from your blog to your Facebook, Twitter, and Google+ profiles and/or pages.

Author: Next Scripts

Author URL: http://www.nextscripts.com

Copyright 2012  Next Scripts, Inc

PHP Twitter API: Copyright 2012 -  themattharris - tmhOAuth

PHP Facebook API: Copyright 2011 Facebook, Inc.

NextScripts.com, Inc