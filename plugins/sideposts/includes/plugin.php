<?php
/**
 * Alkivia SidePosts Widget.
 * WordPress widget to move post from a category to the sidebar.
 * Posts will not show on index pages, archives or feeds. The category has its own feed.
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

require_once ( AK_CLASSES . '/abstract/plugin.php');

/**
 * SidePosts Class.
 * Manages all plugin features.
 *
 * @author		Jordi Canals
 * @package		Alkivia
 * @subpackage	SidePosts
 * @link		http://alkivia.org
 */
class SidePosts extends akPluginAbstract
{
	/**
	 * Updates widget info when updating the widget.
	 * Deletes information from old versions, as it is incompatible with current version.
	 *
	 * @return void
	 */
	protected function pluginUpdate($version)
	{
	    if ( version_compare($version, '2.2', '<') ) {
		    // Change Widget settings to new class names.
		    $widget = get_option($this->ID . '_widget');
		    if ( false !== $widget ) {
		        add_option('widget_' . $this->ID, $widget);
		        delete_option($this->ID . '_widget');
		    }
		}
	}

	/**
	 * Inits the widget and prepares parameters.
	 * Registers widget at sidebar and admin panels.
	 *
	 * @return void
	 */
	protected function registerWidgets()
	{
		add_action('pre_get_posts', array($this, 'postsFilter' ));

		require_once ( SPOSTS_LIB . '/widget.php');
        register_widget('SidepostsWidget');
	}

	/**
	 * Filters the categories not to be shown in main blog area.
	 * Also filters private posts from home (and only from home) if there is a widget for private posts.
	 *
	 * @hook filter 'pre_get_posts' on posts query.
	 * @access private
	 * @param WP_Query &$query	By Ref: Prepared query for posts, before doing it.
	 * @return void
	 */
	function postsFilter( & $query )
	{
		global $wpdb;

		if ( $query->is_category || $query->is_tag || $query->is_day ) {
			return;
		}

		// Some platforms do not process correctly the attachment queries. (Gallery)
		$type = $query->get('post_type');
		if ( 'attachment' == $type ) {
			return;
		}

		$options = get_option('widget_' . $this->ID);
		$is_front = ( $query->is_home && ( ! $query->get('paged') || 1 == $query->get('paged') ) );

		$cat_in = $query->get('category__in');
		$cat_filter = array();

		if ( is_array($options) && ( $query->is_home || $query->is_feed || $query->is_archive ) ) {
			foreach( $options as $id => $widget ) {
			    if ( isset($widget['feeds']) && $widget['feeds'] && $query->is_feed ) {
			        continue;    // By default posts are excluded from feeds, but user can force to appear there.
			    }

				if ( is_active_widget(false, "{$this->ID}-{$id}", $this->ID) ) {	// If widget is loaded then apply posts filters.
  					$category = (int) $widget['category'];

  					if ( -99 == $category && 'private' != $query->get('post_status') && current_user_can('read_private_posts') && $is_front ) {
  						$query->set('post__not_in' , $wpdb->get_col("SELECT ID FROM {$wpdb->posts} WHERE post_status='private'"));
	  				} elseif ( ! in_array($category, $cat_in) ) {
  						$cat_filter[] = $category;
	  				}
				}
			}

			if ( ! empty($cat_filter) ) {
				$query->set('category__not_in', $cat_filter);
			}
		}
	}

	/**
	 * Generates the excerpts thumbnails.
	 *
	 * @uses apply_filters() Calls the 'ID_thumbnail' on img tag for the thumbnail.
	 * @param array $instance The widget instance.
	 * @return string The thumbnail image tag.
	 */
	public function excerptThumbnail( $instance )
	{
		global $post;

		$images = get_children( 'post_type=attachment&post_mime_type=image&orderby=menu_order&post_parent=' . $post->ID );
		if ( $images ) {
			$img = array();
			foreach( $images as $imageID => $imagePost ) {
				$img[] = wp_get_attachment_image_src($imageID);
			}
			$thumb = array_pop($img);
			$thumb_h = intval( (int) $instance['thumbnail'] * (int) $thumb[2] / (int) $thumb[1] );
			$class = ( isset($instance['rightalign']) && $instance['rightalign']) ? 'alignright' : 'alignleft';
			$thumbnail = '<img src="'. $thumb[0] .'" width="'. $instance['thumbnail'] .'" height="'. $thumb_h .'" class="' . $class . '" />';
		} else {
			$thumbnail = '';
		}

		return apply_filters('ak_' . $this->ID . '_thumbnail', $thumbnail);
	}

	/**
	 * Gets the medium size image tag.
	 * This is used for the PhotoBlog format.
	 *
	 * @uses apply_filters() Calls the 'ID_picture' on img tag for the thumbnail.
	 * @param array $instance The widget instance.
	 * @return string The medium size image tag.
	 */
	public function mediumImage( $instance )
	{
		global $post;

		$images = get_children( 'post_type=attachment&post_mime_type=image&orderby=menu_order&post_parent=' . $post->ID );
		if ( $images ) {
			$img = array();
			foreach( $images as $imageID => $imagePost ) {
				$img[] = wp_get_attachment_image_src($imageID, 'medium');
			}
			$photo = array_pop($img);
			$img_height = intval( (int) $instance['thumbnail'] * (int) $photo[2] / (int) $photo[1] );
			$picture = '<a href="' . get_permalink() . '"><img src="'
			         . $photo[0] . '" width="'. $instance['thumbnail']
			         . '" height="'. $img_height .'" class="aligncenter" /></a>';
		} else {
			$picture = '';
		}

		return apply_filters('ak_' . $this->ID . '_picture', $picture);
    }

    /**
     * Returns ID of a saved post.
     * @return int Saved post ID
     */
    public function savedID()
    {
        if ( isset($this->saved['post']->ID) ) {
            return $this->saved['post']->ID;
        } else {
            return 0;
        }
    }

    /**
     * Default plugin options.
     * @see wp-content/themes/chameleon/framework/classes/abstract/akModuleAbstract#defaultOptions()
     */
    protected function defaultOptions ()
    {
        return array();
    }

    /**
     * Executes at plugin load time.
     * @see wp-content/themes/chameleon/framework/classes/abstract/akModuleAbstract#moduleLoad()
     */
    protected function moduleLoad() {}

    /**
     * Creates plugin admin menus.
     * @see wp-content/themes/chameleon/framework/classes/abstract/akModuleAbstract#adminMenus()
     */
    public function adminMenus () {}

    /**
     * Plugin activation.
     * @see wp-content/plugins/sideposts/framework/classes/abstract/akPluginAbstract#pluginActivate()
     */
    protected function pluginActivate () {}

    /**
     * Plugin deactivation.
     * @see wp-content/plugins/sideposts/framework/classes/abstract/akPluginAbstract#pluginDeactivate()
     */
    protected function pluginDeactivate () {}

    /**
     * Fires when all plugins have been loaded.
     * @see wp-content/plugins/sideposts/framework/classes/abstract/akPluginAbstract#pluginsLoaded()
     */
    protected function pluginsLoaded () {}

    /**
     * Wordpress Init.
     * @see wp-content/themes/chameleon/framework/classes/abstract/akModuleAbstract#wpInit()
     */
    public function wpInit () {}
}
