<?php
/*
Plugin Name:	Alkivia SidePosts
Plugin URI:		http://alkivia.org/wordpress/sideposts
Description:	A simple widget to move posts from a category to the sidebar. Posts do not show on index, archives or feeds, and have its own feed.
Version:		3.0.2
Author:			Jordi Canals
Author URI:		http://alkivia.org
*/

/**
 * SidePosts WordPress Widget.
 * WordPress widget to move post from a category to the sidebar.
 * Posts will not show on index pages, archives or feeds. The category has its own feed.
 *
 * @version		$Rev: 939 $
 * @author		Jordi Canals
 * @copyright   Copyright (C) 2008, 2009, 2010 Jordi Canals
 * @license		GNU General Public License version 2
 * @link		http://alkivia.org
 * @package		Alkivia
 * @subpackage	Sideposts
 *

	Copyright 2008, 2009, 2010 Jordi Canals <devel@jcanals.cat>

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	version 2 as published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

define ( 'SPOSTS_PATH', dirname(__FILE__) );
define ( 'SPOSTS_LIB', SPOSTS_PATH . '/includes' );

IF ( ! defined ('SIDEPOSTS_MAX') ) {    // Can be defined in wp-config.
    define ('SIDEPOSTS_MAX', 20);
}
/**
 * Sets an admin warning regarding required PHP version.
 *
 * @hook action 'admin_notices'
 * @return void
 */
function _sideposts_php_warning()
{
	$data = get_plugin_data(__FILE__);
	load_plugin_textdomain('sideposts', false, basename(dirname(__FILE__)) .'/lang');

	echo '<div class="error"><p><strong>' . __('Warning:', 'sideposts') . '</strong> '
		. sprintf(__('The active plugin %s is not compatible with your PHP version.', 'sideposts') .'</p><p>',
			'&laquo;' . $data['Name'] . ' ' . $data['Version'] . '&raquo;')
		. sprintf(__('%s is required for this plugin.', 'sideposts'), 'PHP 5.2')
		. '</p></div>';
}

// Check required PHP version.
if ( version_compare(PHP_VERSION, '5.2.0', '<') ) {
	// Send an armin warning
	add_action('admin_notices', '_sideposts_php_warning');
} else {
	require_once( SPOSTS_PATH . '/framework/loader.php');
	require ( SPOSTS_LIB . '/plugin.php' );
	require ( SPOSTS_LIB . '/functions.php' );

	ak_create_object('sideposts', new SidePosts(__FILE__, 'sideposts'));
}
