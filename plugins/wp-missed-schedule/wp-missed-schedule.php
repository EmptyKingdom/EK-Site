<?php
/*
Plugin Name: WP Missed Schedule
Plugin URI: http://wordpress.org/extend/plugins/wp-missed-schedule/
Description: Fix <code>Missed Schedule</code> Future Posts Cron Job | <a href="http://lcsn.net/donate/" title="Free Donation">Donate</a> | <a href="http://wordpress.org/extend/plugins/wp-overview-lite/" title="Show Dashboard Overview and Memory Load Usage on Footer">WP Overview?</a> | <a href="http://wordpress.org/extend/plugins/wp-admin-bar-removal/" title="Remove Admin Bar Frontend Backend and User Code">Admin Bar Removal?</a> | <a href="http://wordpress.org/extend/plugins/wp-total-deindexing/" title="Total DeIndexing WordPress from all Search Engines">WP DeIndexing?</a> | <a href="http://wordpress.org/extend/plugins/wp-ie-enhancer-and-modernizer/" title="Enhancer and Modernizer IE Surfing Expirience">Enhancer IE Surfing?</a>
Version: 2011.0920.2011
Author: sLa
Author URI: http://wordpress.org/extend/plugins/profile/sla/
Requires at least: 2.6
Tested up to: 3.4
License: GPLv3
 *
 * DEVELOPMENTAL Release: Version 2012 Build 0000-BUGFIX Revision 2012-DEVELOPMENTAL
 *
 *  WP Missed Schedule - WordPress PlugIn
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the [GNU General Public License](http://wordpress.org/about/gpl/)
 *  as published by the Free Software Foundation; either [version 2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Part of Copyright © 2008-2011 belongs to sLaT ™ [LavaTeam] NGjI ™ [NewGenerationInterfaces] (slangji [at] gmail [dot] com)
 * and a portion to their respective owners. Not For Resale or Business Purpose.
 */
/**
 * @package WP Missed Schedule
 * @subpackage WordPress PlugIn
 * @since 2.6.0
 * @version 2011.0920.2011
 *
 * Fix Missed Scheduled Future Posts Cron Job.
 */
if(!function_exists('add_action')){header('Status 403 Forbidden');header('HTTP/1.0 403 Forbidden');header('HTTP/1.1 403 Forbidden');exit();}?><?php
function wpms_log(){echo"\n<!--Plugin WP Missed Schedule 2011.0920.2011 Active-->\n";}add_action('wp_head','wpms_log');add_action('wp_footer','wpms_log')?><?php
define('WPMS_DELAY',5);define('WPMS_OPTION','wp_missed_schedule');function wpms_replace(){delete_option(WPMS_OPTION);}register_deactivation_hook(__FILE__,'wpms_replace');function wpms_init(){remove_action('publish_future_post','check_and_publish_future_post');$last=get_option(WPMS_OPTION,false);if(($last!==false)&&($last>(time()-(WPMS_DELAY*60))))return;update_option(WPMS_OPTION,time());global$wpdb;$scheduledIDs=$wpdb->get_col("SELECT`ID`FROM`{$wpdb->posts}`"."WHERE("."((`post_date`>0)&&(`post_date`<=CURRENT_TIMESTAMP()))OR"."((`post_date_gmt`>0)&&(`post_date_gmt`<=UTC_TIMESTAMP()))".")AND`post_status`='future'LIMIT 0,5");if(!count($scheduledIDs))return;foreach($scheduledIDs as$scheduledID){if(!$scheduledID)continue;wp_publish_post($scheduledID);}}add_action('init','wpms_init',0)?>