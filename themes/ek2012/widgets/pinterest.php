<?php

/*
Plugin Name: Pinterest Pinboard Widget
Plugin URI: http://wordpress.org/extend/plugins/pinterest-pinboard-widget/
Description: Add a Pinterest Pinboard widget to WordPress.
Author: CodeFish
Author URI: http://www.codefish.nl
Version: 1.0.2
*/

/*  Copyright 2012 CodeFish (email: info at codefish.nl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

include_once(ABSPATH . WPINC . '/feed.php');

class EK_Pinterest_Widget extends WP_Widget {

    /**
     * Widget settings.
     */
    protected $widget = array(
            // Default title for the widget in the sidebar.
            'title' => 'Recent pins',

            'rows' => 2,

            // The widget description used in the admin area.
            'description' => 'EK Recent Pins',

            // RSS cache lifetime in seconds.
            'cache_lifetime' => 900,

            // Pinterest base url.
            'pinterest_url' => 'http://pinterest.com'
    );
    
    var $start_time;
    var $protocol;

    function EK_Pinterest_Widget() {
        $id = str_replace('_', '-', get_class($this));
        parent::WP_Widget(
                $id,
                'EK Pinterest Recent Pins',
                $options = array(
                    'description' => $this->widget['description']
                )
        );
        $this->start_time = microtime(true);
        $this->protocol = $this->is_secure() ? 'https://' : 'http://';
    }
    
    function form($instance) {
        // load current values or set to default.
        $title = array_key_exists('title', $instance) ? esc_attr($instance['title']) : $this->widget['title'];
        $rows = array_key_exists('rows', $instance) ? esc_attr($instance['rows']) : $this->widget['rows'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('rows'); ?>"><?php _e('Rows:'); ?></label>
            <input id="<?php echo $this->get_field_id('rows'); ?>" name="<?php echo $this->get_field_name('rows'); ?>" type="text" value="<?php echo $rows; ?>" size="3" />
        </p>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['rows'] = strip_tags($new_instance['rows']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract($args);
        echo($before_widget);
        $title = apply_filters('widget_title', $instance['title']);
        echo($before_title . $title . $after_title);
        ?>
        <div class="pinboard">
        <?php

        // Get the RSS.
        $username = 'emptykingdom';
        $rows = $instance['rows'];
        $cols = 3;
        $nr_pins = $rows * $cols;
        $pins = $this->get_pins($username, $nr_pins);
        if (is_null($pins)) {
            echo("Unable to load Pinterest pins for '$username'\n");
        } else {
            // Render the pinboard.
            $count = 0;
            foreach ($pins as $pin) {
                if ($count == 0) {
                    echo("<div class=\"row\">");
                }
                $title = $pin['title'];
                $url = $pin['url'];
                $image = $pin['image'];
                echo("<a class=\"span1\" href=\"$url\"><img src=\"$image\" alt=\"$title\" title=\"$title\" /></a>");
                $count++;
                if ($count >= $cols) {
                    echo("</div>");
                    $count = 0;
                }
            }
        }
        ?>
        </div>
        <p class="follow"><a href="http://pinterest.com/<?php echo $username ?>" target="_blank">Follow EK on <span class="logo"></span></a></p>
        <?php
        echo($after_widget);
    }
    
    /**
     * Retrieve RSS feed for username, and parse the data needed from it.
     * Returns null on error, otherwise a hash of pins.
     */
    function get_pins($username, $nrpins) {

        // Set caching.
        add_filter('wp_feed_cache_transient_lifetime', create_function('$a', 'return '. $this->widget['cache_lifetime'] .';'));

        // Get the RSS feed.
        $url = $this->widget['pinterest_url'] .'/'. $username .'/feed.rss';
        $rss = fetch_feed($url);
        if (is_wp_error($rss)) {
            return null;
        }
        
        $maxitems = $rss->get_item_quantity($nrpins);
        $rss_items = $rss->get_items(0, $maxitems);
        
        $pins;
        if (is_null($rss_items)) {
            $pins = null;
        } else {
            // Pattern to replace for the images.
            $search = array('_b.jpg');
            $replace = array('_t.jpg');
            // Add http replace is running secure.
            if ($this->is_secure) {
                array_push($search, 'http://');
                array_push($replace, $this->protocol);
            }
            $pins = array();
            foreach ($rss_items as $item) {
                $title = $item->get_title();
                $description = $item->get_description();
                $url = $item->get_permalink();
                if (preg_match_all('/<img src="([^"]*)".*>/i', $description, $matches)) {
                    $image = str_replace($search, $replace, $matches[1][0]);
                }
                array_push($pins, array(
                    title => $title,
                    image => $image,
                    url => $url
                ));
            }
        }
        return $pins;
    }
    
    /**
     * Determine the running plugin's version.
     */
    function get_version() {
        $headers = array(
            'Version' => 'Version'
        );
        $plugin_data = get_file_data(__FILE__, $headers);
        $plugin_version = $plugin_data['Version'];
        return $plugin_version;
    }

    /**
     * Render HTML comment footer for debugging purposes.
     */
    function get_footer() {
        $execution_time = (microtime(true) - $this->start_time) * 1e6;
        return '<!-- '.
               'Plugin ID: '. $this->id .' // '.
               'Version: '. $this->get_version() .' // '.
               'Execution Time: '. $execution_time .' (ms) '.
               "-->\n";
    }
    
    /**
     * Check if the server is running SSL.
     */
    function is_secure() {
        return !empty($_SERVER['HTTPS'])
            && $_SERVER['HTTPS'] !== 'off'
            || $_SERVER['SERVER_PORT'] == 443;
    } 

}

// Register the widget.
add_action('widgets_init', create_function('', 'return register_widget("EK_Pinterest_Widget");'));

?>
