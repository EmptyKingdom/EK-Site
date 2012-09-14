<?php
/**
 *
 *
 * @version		$Rev: 199488 $
 * @author		Jordi Canals
 * @copyright   Copyright (C) 2009, 2010 Jordi Canals
 * @license		GNU General Public License version 2
 * @link		http://alkivia.org
 * @package		Alkivia
 * @subpackage
 *

	Copyright 2009, 2010 Jordi Canals <devel@jcanals.cat>

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
 * Creates and displays the Archives link.
 *
 * @param int $category Widget category.
 * @param string $title Widget title.
 * @return void
 */
function ak_sposts_archives_link ( $category, $title = '' )
{
    if ( ak_get_object('sideposts')->getOption('disable-archives-link') || -99 == (int) $category ) {
        return;
    }

	echo '<li class="spli-archive">' . PHP_EOL;
	echo '<a href="'
		. get_category_feed_link($category) .'"><img style="border:0;float:right;" src="'
		. ak_get_object('sideposts')->getURL() . '/images/rss.png" alt="RSS" /></a>';

    echo '<a href="' . get_category_link($category) .'">';
    if ( empty($title) ) {
        _e('Archive');
    } else {
        _e('Archive for', 'sideposts');
	    echo ' '. $title .'</a> &raquo;</li>' . PHP_EOL; // get_the_category_by_ID($widget['category'])
    }
}

/**
 * Creates and returns the post CSS class.
 * Can be: 'spli', 'spli-first' or 'spli-last' depending if first last or other post.
 *
 * @param int $current Position in list for current post.
 * @param int $total Number of posts found by the query.
 * @return string CSS class tag.
 */
function ak_sposts_post_class ( $current, $total )
{
    $class = ' class="spli"';
    if ( 1 < $total ) {    // Need to have more than one post.
        if ( 1 == $current) {
            $class = ' class="spli-first"';    // First item.
        } elseif ( $current == $total ) {
            $class = ' class="spli-last"';    // Last item.
        }
    }

    return $class;
}
