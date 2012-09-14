<?php
/**
 * Sideposts: Excerpts with thumbnail widget template.
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

    global $more, $post;

    $current = 0;
	$total = $query->post_count;

    while ( $query->have_posts() ) {
	    $query->the_post();
        ++$current;

		echo '<li' . ak_sposts_post_class($current, $total) . '>';
		echo '<span class="sideposts-title"><a href="'. get_permalink() .'">'. get_the_title() .'</a></span>';

		$date_string = '<span class="sideposts_date">'. mysql2date(get_option('date_format'), $post->post_date) . ' | ' . get_the_time() .'</span>';
		echo '<br />' . apply_filters('ak_' . $i18n . '_date',  $date_string);

		// Show excerpt with thumbnail;
		echo '<p>'. ak_get_object('sideposts')->excerptThumbnail($widget) . get_the_excerpt() . '</p>';

        echo '</li>' . PHP_EOL;
	}

	ak_sposts_archives_link($widget['category'], $widget['title']);
