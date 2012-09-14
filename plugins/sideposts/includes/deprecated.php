<?php
/**
 * Deprecated filters, actions and functions.
 *
 * @version		$Rev: 199488 $
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

/**
 * 'ak_sideposts_style_url' replaces 'sideposts_style_url'
 * @deprecated since 2.5.1
 */
function _ak_df_sideposts_style ( $data )
{
    return apply_filters('ak_sideposts_style_url', $data);
}
add_filter('sideposts_style_url', '_ak_df_sideposts_style');

/**
 * 'ak_sideposts_style_admin' replaces 'sideposts_style_admin'
 * @deprecated since 2.5.1
 */
function _ak_df_sideposts_admin_css ( $data )
{
    return apply_filters('ak_sideposts_style_admin', $data);
}
add_filer('sideposts_style_admin', '_ak_df_sideposts_admin_css');

/**
 * 'ak_sideposts_thumbnail' replaces 'sideposts_thumbnail'
 * @deprecated since 2.5.3
 */
function _ak_df_sideposts_thumbnail ( $data )
{
    return apply_filters('ak_sideposts_thumbnail', $data);
}
add_filter('sideposts_thumbnail', '_ak_df_sideposts_thumbnail');

/**
 * 'ak_sideposts_picture' replaces 'sideposts_picture'
 * @deprecated since 2.5.3
 */
function _ak_df_sideposts_picture ( $data )
{
    return apply_filters('ak_sideposts_picture', $data);
}
add_filter('sideposts_picture', '_ak_df_sideposts_picture');

/**
 * 'ak_sideposts_date' replaces 'sideposts_date'
 * @deprecated since 2.5.3
 */
function _ak_df_sideposts_date ( $data )
{
    return apply_filters('ak_sideposts_date', $data);
}
add_filter('sideposts_date', '_ak_df_sideposts_date');
