=== WP Missed Schedule Fix Future Posts Scheduled Failed ===
Contributors: sLa
Donate link: http://lcsn.net/donate/
Tags: missed, schedule, future, posts, scheduled, fix, wp, cron, job, publish, post, cronjob, single, event, array, unix, time, stamp, wp-cron, 2.6.5, wordpress_wp_missed_schedule
Stable tag: 2011.0920.2011
Requires at least: 2.6
Tested up to: 3.4
License: GPLv3
Find missed schedule posts and it republish them correctly. Checking every 5 minutes all posts that match the problem, and fixed 5 items per session.
== Description ==
This plugin fix <code>Missed Schedule</code> Future Posts Cron Job. Find all missed schedule posts, during a failed cron job, and it republish them correctly. Checking every 5 minutes all posts that match the problem, and fixed 5 items per session, one session every 5 minutes, for not use too many resources. All others failed, will be solved on next sessions, until no longer exist missed schedule future posts.

For completely automatization of plugin, and no other action from the administrator, try on put it on `/mu-plugin/` directoy, and no other action will be required for activation and operation, starting from WordPress installation.

Supports all WP versions from 2.6 to 3.3, Network Multisite and WPMU 2.6 to 2.9.2. Also it is possible it work on old versions from 2.1 to 2.5.1, and legacy 2.0 branch, but the result is not guaranted. Work with Shared, Dedicated, Cloud and VPS Hosting with high and low resources.

* Try also:
 * [WP Admin Bar Removal](http://wordpress.org/extend/plugins/wp-admin-bar-removal/)
 * [WP Overview (lite)](http://wordpress.org/extend/plugins/wp-overview-lite/)
 * [WP Total DeIndexing](http://wordpress.org/extend/plugins/wp-total-deindexing/)
 * [WP IE Enhancer and Modernizer](http://wordpress.org/extend/plugins/wp-ie-enhancer-and-modernizer/)

* Tested and Reviewed by: 
 * [wordpress.stackexchange.com](http://wordpress.stackexchange.com/questions/13673/missed-schedule/)
 * [pertamaxxx.com](http://www.pertamaxxx.com/wordpress/wp-missed-schedule-fix-failed-scheduled-posts-error/)
 * [seomention.com](http://seomention.com/wp-missed-schedule-fix/)
 * [wpjedi.com](http://www.wpjedi.com/wp-missed-schedule-fix-failed-scheduled-posts-error/)

`
No need to delete anything from disk or VPS when deactivate!
No need to delete anything from disk space or VPS when deleted!
No need to delete anything from the database when deactivate!
No need to delete anything from the database when deleted!
No need to delete anything from the wp_option when deactivate!
No need to delete anything from the wp_option when deleted!
wp_option table is auto cleaned when deactivate or deleted!
Not need other actions except installing or uninstall it!
Supports all existing WordPress versions, or almost ...
Work with Shared, Dedicated, Cloud and VPS Hosting.
Run on Hosting with high and low resources.
`
== Installation ==
= For users of single WordPress 2.6+ (via FTP) =
1. Download WP Missed Schedule from wordpress.org plugin repository.
2. Upload it into /wp-content/plugins`/wp-missed-schedule/` directory via FTP.
3. Active WP Missed Schedule.

= For users of single WordPress 2.7+ (manual) =
1. Download WP Missed Schedule from wordpress.org plugin repository.
2. Upload it into your WordPress directly from Plugin Add Feature.
3. It will create a directory /wp-content/plugins`/wp-missed-schedule/`
4. Active WP Missed Schedule.

= For users of single WordPress 2.7+ (auto) =
1. Search WP Missed Schedule from Plugin Add Feature.
2. Install it live directly from wordpress.org repository.
3. It will create a directory /wp-content/plugins`/wp-missed-schedule/`
4. Active WP Missed Schedule.

= For users of old WPMU 2.6+ or Network Multisite 3.0+ (manual) =
1. If you are using WordPress MU or Network Multisite `wp-missed-schedule.php` must be put directly into the directory /wp-content`/mu-plugins/`
2. Activate of WP Missed Schedule should be `AutomaTTic` since setup! ;)

= For all users of single, multisite and WPMU WordPress (trick) =
1. Download WP Missed Schedule from wordpress.org plugin repository.
2. Make new directory `/mu-plugins/` on /wp-content/ via FTP
3. Upload `wp-missed-schedule.php` into `/mu-plugins/` via FTP.
4. Activate of WP Missed Schedule should be `AutomaTTic` since setup! ;)
= How to uninstall WP Missed Schedule =
1. Disable WP Missed Schedule from Menu Plugins of Control Panel.
2. Delete WP Missed Schedule from Menu Plugins of Control Panel.
= Troubleshooting =
If all else fails and your site is broken remove directly via ftp on your host space /home/your-wp-install-dir/wp-content/plugins/wp-missed-schedule/ or /home/your-wp-install-dir/wp-content/mu-plugins/wp-missed-schedule.php
== Frequently Asked Questions ==
= WP Missed Schedule Fix Failed Scheduled Future Posts =
Publish a bunch of future posts noticed that they won't publish and when time comes to go live they just turn Missed Schedule.
Took a look at the Wordpress code and noticed future posts get assigned a cronjob `($unix_time_stamp, 'publish_future_post', array($post_ID))` [wp_schedule_single_event](http://codex.wordpress.org/Function_Reference/wp_schedule_single_event)
Why don't you just look at the database and publish all posts with future status and date in past?
My plugin WP Missed Shcedule looks for posts with a date in the past that still have `post_status=future`. It will take each `post_ID` and publish [wp_publish_post](http://codex.wordpress.org/Function_Reference/wp_publish_post) it.
= How to Work? =
This plugin will check every 5 minutes, if there are posts that match the problem described. <code>'WPMS_DELAY',5</code> To not use too many resources, it fix for 5 items per session, one session every 5 minutes. <code>LIMIT 0,5</code> All others failed will be solved in future sessions, until no longer exist. When you activate this plugin the first 5 "Missed Scheduled Future Posts" are fixed immediately. All others are fixed the next batch. On some case (rare?) are also fixed live. If you have "Missed Scheduled Future Posts" after this plugin is activated, is not one error or bug: wait the next checking. If "Missed Scheduled Future Posts" persist, verify that WordPress installation is clean, or exist conflict with other plugins. N.B. If have active others plugins with the same functions of "WP Missed Schedule" this is on conflict and not work. I suggest to delete or deactivate all others, clean related database options table, and use only "WP Missed Schedule". In the same way "WP Missed Schedule" could create conflicts with other plugins with the same functions. In this case, delete or disable it and only used the others.
= Dealing with WordPress "Missed Schedule" =
If you are scheduling blog posts in WordPress and seeing a "Missed Schedule" message, it's likely caused by an issue with your web server, or it is WordPress that is causing the problem of your blog posts not being posted as scheduled. This is an annoying problem. However, there is a very simple fix that is easy to do. The "Missed Schedule" problem seems to point to the web server and WordPress. The "time/date" comparison needs to match in order for your blog posts to get published as scheduled. If you are currently using the WordPress, blogging platform, you can easily fix the issue by modifying the wp-cron.php file which is located in the root folder. You simply open your notepad editor in Windows and search for the following line of code, which is located towards the bottom on the file wp-cron.php file.

This is the code you need to search for: <code>update_option(’doing_cron’, 0);</code>

This is the code you need to replace it with: <code>//update_option(’doing_cron’, 0);</code>

Next step is to save the wp-cron.php file and upload to your web server. However, make sure that you renamed the current "wp-cron.php" on the web server to "wp-cron.php-org", just in case there is an issue, and you need to resort back to the original file. The final step is to schedule another blog post and make sure that it processes correctly and that it gets published according to schedule. To manually run the cron, you'll need to type or paste the code below in your Internet browser URL without the brackets. "yourdomain.com/wp-cron.php"
If things are working correctly, it should return a blank screen. Furthermore, this should update the time/date" comparison between your web server and WordPress.
= The Missed Schedule Problem =
The way WordPress handles scheduling is that whenever a page is loaded, either from your blog or in your admin control panel, the file wp-cron.php is loaded. At normal, if correctly configured, the server can talk to itself just fine and WordPress scheduling system will works perfectly. It’s only when you start doing strange and weird things like not having DNS setup properly or blocking loopback connections then it will cause you problems. It is possible that certain web hosts are not allowing WordPress cron jobs to run but for many that is not the issue as scheduled posting was working before upgrading to WordPress 2.7.

In WordPress 2.7, the cron job design, which is the core of the scheduling engine, is significantly changed as you can from both wp-cron.php and cron.php in /wp-includes/ folder. In WordPress 2.7 wp-cron.php, there are references to local-time and doing_cron option is set to zero. This is not exist in WordPress version 2.6.5. This might be the cause of the problem as it’s very likely that your web server time is off by a few seconds or minutes from the WordPress official time. And doing_cron argument is set to zero making it absolutely necessary that your web server and WordPress time to match with each other in order for the scheduled post to go through.
= Solutioni #1 =
If you think that your web server settings is the cause of the problem, simply type this URL in your browser http://www.yourblog.com/wp-cron.php (replace yourblog with your actual domain name) to verify. If you see a blank screen, then your web server settings is ok. You can proceed to solution #2. If you see some error pages, then kindly check with your web hosting technical staff and ask for their help.
= Solution #2 =
This is the solution to fix local-time and doing_cron option in wp-cron.php. If your programming is good enough, you are free to change the code and fix the issue yourselves. Remember to backup your WordPress before applying any change in production.

If you’re not familiar with programming, don’t worry, there is a simple solution.

   1. Download WordPress version 2.6.5 from WordPress repository.
   2. Extract both wp-cron.php and cron.php file from version 2.6.5.
   3. Backup your WordPress database.
   4. Rename both wp-cron.php and cron.php in your web server to other name.
   5. Upload both wp-cron.php and cron.php extracted from version 2.6.5 to your web server via FTP client.
= Conclusion = 
I hope the fix working fine for you. WordPress should really look into this issue seriously and provide a fix or help to resolve the issue faced by many of the bloggers. If WordPress is not able to publish future post at predefined time, it should recheck it periodically for several time, says every 5/10/15 minutes, and publish the post as soon as possible.
== Changelog ==
`
All previous release, prior of latest stable, are on fact 
deprecated and no longer supported on this project: 
is very suggested upgrade to the latest build always!
`
= Development Release =
[Version 2012 Build 0000-BUGFIX.2012-DEVELOPMENTAL](http://downloads.wordpress.org/plugin/wp-missed-schedule.zip) (new mysql way?)
= 2011.0920.2011 =
* Major Update [CERTIFIED] WordPress 3.3 and 3.2 / 3.2.1 / 3.2.2 Upgrade.
 * Please update as soon possible!
 * NEW Working on WordPress 3.3 and future 3.3.x a.k.a. 3.3+ releases.
 * Full compatible with WordPress 3.2 / 3.2.1 / 3.2.2 a.k.a 3.2+
 * BUMP Version 2011 Build 0920 Revision 2011
= 2011.0424.3333 =
* Silent Update [MAINTENANCE] WP 3.1 and 3.1.1 Upgrade. Fixed slowness.
 * PLEASE Update as soon possible!
 * UPGRADE Make it full compatible with WordPress 3.1 and 3.1.1 a.k.a 3.1+
 * NEW Replaced wp_future_post function with wpms_future_post
 * NEW Very realtime missed scheduled failed future posts recovery and fixing
 * EXPLAINED WP Missed Schedule fix one failed post in a minute: cool!
 * UPDATE Preemptive support for WordPress 3.1.2-alpha and 3.2-bleeding
 * UPDATE Now fix 5 items per session (previous 10) <code>'LIMIT' 0,5</code>
 * FIXED Low resource hosting slowness when execute session task
 * IMPROVED Code cleanup and compress again for new faster loading
 * IMPROVED Functions redefinied for best timeline
 * BUMP Version 2011 Build 0424 Revision 3333
= 2011.0214.2222 =
* Silent Update [MAINTENANCE] WP 3.0.5 and 3.1-RC4-17441 Upgrade.
 * Please update as soon possible!
 * UPGRADE Make it full compatible with WordPress 3.0.5
 * FIXED Some Hosting Crash with Full Strict Security Rules (.htaccess)
 * UPDATE check every 5 minutes (previous 15 minutes) <code>'WPMS_DELAY',5</code>
 * UPDATE Preemptive support for WordPress 3.1-RC4-17441
 * Bump Version 2011 Build 0214 Revision 2222
= 2011.0107.1111 =
* Major Update [CERTIFIED] WP 3.1-RC2-17229 Compatibility Upgrade.
 * Please update as soon possible!
 * First 2011 Major Release (Zero Bug Certified) :)
 * UPDATE Preemptive support for WordPress 3.1-RC2-17229
 * Bump Version 2011 Build 0107 Revision 1111
= 2010.1231.2010 =
* Major Update [STABLE] Full WP 3.0.4 and 3.1-RC1-17163 Zero Bugs Compatibility Upgrade.
 * Please update as soon possible!
 * Fix Missed Scheduled Future Posts Cron Job.
 * ZERO-BUGS Full Last 2010 Major Release.
 * UPDATE Preemptive support for WordPress 3.1-RC1-17163
 * FIXED WordPress [wp_schedule_single_event](http://codex.wordpress.org/Function_Reference/wp_schedule_single_event) Function Behavior.
 * FIXED WordPress [wp_publish_post](http://codex.wordpress.org/Function_Reference/wp_publish_post) Function Behavior.
 * Make it full compatible with WordPress 3.0.4
 * Plugin Memory Consumption (less of 1KB or no more)
 * Only 3KB of unique php plugin file.
 * Full Strict Security Rules Applied.
 * Fixed Execution Time.
 * Reduce Code Bloat.
 * Code Cleanup for faster loading.
 * Nothing is written into your space disk
 * wp_option database table is cleaned after uninstall
 * Work with single WordPress 2.6.x to 3.1.x and old MU.
 * Work with Shared and VPS Hosting.
 * Bump Version 2010 Build 1231 Revision 2010
= 2010.1226.0246 =
* Silent Update [MAINTENANCE] WP 3.1-RC1 Compatibility Upgrade.
 * Please update as soon possible!
 * UPDATE Preemptive support for WordPress 3.1-RC1
 * Bump Version 2010 Build 1226 Revision 0246
= 2010.1220.0048 =
* Silent Update [MAINTENANCE] WP 3.1-beta2-16997 Compatibility Upgrade.
 * Please update as soon possible!
 * UPDATE Preemptive support for WordPress 3.1-beta2-16997
 * Bump Version 2010 Build 1220 Revision 0048
= 2010.1211.0038 =
* Silent Update [MAINTENANCE] WP 3.0.3 and 3.1-beta1-16732 Compatibility Upgrade.
 * Please update as soon possible!
 * UPDATE Make it full compatible with WP 3.0.3
 * UPDATE Preemptive support for WordPress 3.1-beta1-16732
 * Bump Version 2010 Build 1211 Revision 0038
= 2010.1201.1918 =
* Silent Update [MAINTENANCE] WP 3.0.2 and 3.1-beta1 Compatibility Upgrade.
 * Please update as soon possible!
 * NEW Make it full compatible with WP 3.0.2
 * NEW Preemptive support for WordPress 3.1-beta1
 * NEW More Accurate Links on Plugin Control Panel Description
 * Bump Version 2010 Build 1201 Revision 1918
= 2010.0821.1539 =
* Silent Update [BUGFIX] Reduced Bloat and Code Cleanup.
 * Please update as soon possible!
 * Bump Version 2010 Build 0821 Revision 1539
= 2010.0816.2254 =
* First Public Stable Release (full WP 3.0.1 compatible)
 * Fix Missed Scheduled Future Posts Cron Job
 * Make it full compatible with WP 3.0.1
 * Preemptive support for WordPress 3.1-alpha
 * Plugin Memory Consumption (less of 1KB or no more)
 * Only 3KB of unique php plugin file.
 * Full Strict Security Rules Applied.
 * Code Cleanup for faster loading.
 * Nothing is written into your space disk
 * wp_option database table is cleaned after uninstall
 * Bump Version 2010 Build 0816 Revision 2254
= 2009.1218.2009 =
* Make it full compatible with WP 2.9 and WPMU
 * Preemptive support for WordPress 3.0-alpha
 * Fixed Execution Time
 * Bump Version 2009 Build 1218 Revision 2009
= 2008.1210.2008 =
* Make it full compatible with WP 2.7 and WPMU
 * Preemptive support for WordPress 2.8-alpha
 * Reduce Code Bloat
 * Bump Version 2008 Build 1210 Revision 2008
== Upgrade Notice ==
= 2011.0920.2011 =
* Major Update [CERTIFIED] WordPress 3.3 / 3.2 / 3.2.1 / 3.2.2 Compatibility Update.
= 2011.0424.3333 =
* Silent Update [MAINTENANCE] WP 3.1 and 3.1.1 Upgrade. Now fixed 5 posts in one session. Fixed low resource hosting slowness.
= 2011.0214.2222 =
* Silent Update [MAINTENANCE] WP 3.0.5 and 3.1-RC4-17441 Upgrade. Check every 5 minutes. Fixed Some Hosting Crash.
= 2011.0107.1111 =
* Major Update [CERTIFIED] WP 3.1-RC2-17229 Compatibility Upgrade. Zero Bug Certified.
= 2010.1231.2010 =
Major Update [STABLE] Full WP 3.0.4 and 3.1-RC1-17163 Zero Bugs Compatibility Upgrade.
= 2010.1226.0246 =
Silent Update [MAINTENANCE] WP 3.1-RC1 Compatibility Upgrade.
= 2010.1220.0048 =
Silent Update [MAINTENANCE] WP 3.1-beta2-16997 Compatibility Upgrade.
= 2010.1211.0038 =
Silent Update [MAINTENANCE] WP 3.0.3 and 3.1-beta1-16732 Compatibility Upgrade.
= 2010.1201.1918 =
Silent Update [MAINTENANCE] WP 3.0.2 and 3.1-beta1 Compatibility Upgrade.
= 2010.0821.1539 =
Silent Update [BUGFIX] Reduced Bloat and Code Cleanup: please update! Fix Missed Scheduled Future Posts Cron Job.
= 2010.0816.2254 =
First Public Stable Release (full WP 3.0.1 compatible) Fix Missed Scheduled Future Posts Cron Job.
= 2009.1218.2009 =
Future Posts (full WP 2.9 compatible) Fix Missed Scheduled.
= 2008.1210.2008 =
Fix Future Posts (full WP 2.7 compatible) Failed Missed Scheduled Cron Job.
== Licensing ==
* License
 *  This program is free software; you can redistribute it and/or
    modify it under the terms of the [GNU General Public License](http://wordpress.org/about/gpl/)
    as published by the Free Software Foundation; either [version 2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
    of the License, or (at your option) any later version.
 *  This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 *  You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
* Disclaimer
 * The license under which the WordPress software is released is the GPLv2 (or later) from the Free Software Foundation. A copy of the license is included with every copy of WordPress.
 * Part of this license outlines requirements for derivative works, such as plugins or themes. Derivatives of WordPress code inherit the GPL license.
 * There is some legal grey area regarding what is considered a derivative work, but we feel strongly that plugins and themes are derivative work and thus inherit the GPL license.
* Copyright
 * Part of copyright belongs to sLaT and a portion to their respective owners.
   Not For Resale or Business Purpose.
== Links ==
[Credit Link](http://wordpress.org/extend/plugins/profile/slangji)
== Screenshot ==
[Screenshots](http://plugins.trac.wordpress.org/browser/wp-missed-schedule/branches/screenshots/)
== Support ==
[Support Forums Tag](http://wordpress.org/tags/wp-missed-schedule)
== Todo List ==
... nothing for now ;)
== Translations ==
[Translation Link](http://plugins.trac.wordpress.org/browser/wp-missed-schedule/branches/languages/wp-missed-schedule.pot)
== Updates ==
[SVN Repo](http://plugins.svn.wordpress.org/wp-missed-schedule/) and [Trac Browser](http://plugins.trac.wordpress.org/browser/wp-missed-schedule/)
== Thanks ==
Thanks to all keep the credit link or donate for this free work :D