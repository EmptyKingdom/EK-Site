<?php
/*
Plugin Name: Gallery Widget
Website link: http://blog.splash.de/
Author URI: http://blog.splash.de/
Plugin URI: http://blog.splash.de/plugins/gallery-widget/
Description: Simple widget to show the latest/random images of the WordPress media gallery as a Widget, using a shortcode or directly with a php-function.
Author: Oliver Schaal
Version: 1.2.1
*/

if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

global $wp_version;
define('WPV28', version_compare($wp_version, '2.8', '>='));

if (!WPV28) {
    die('This version of Gallery Widget isn\'t compatible to WordPress version less than 2.8');
}

if (!class_exists("GalleryWidget")) {
    class GalleryWidget {

        // version
        var $version;

        // update notice
        var $checkfile = 'http://blog.splash.de/_chk/gallerywidget/';

        /* __construct */
        function __construct() {
            //load language
            if (function_exists('load_plugin_textdomain'))
                load_plugin_textdomain('gallerywidget', WP_PLUGIN_DIR.'/gallery-widget/lang/', '/gallery-widget/lang/');
            
            // set version
            $this->version = $this->get_version();
                
            register_deactivation_hook(__FILE__, array(&$this, 'deactivatePlugin'));

            add_shortcode('getGWImages', array(&$this, 'getShortCodeAttachedImages'));
            add_shortcode('getGWImages2', array(&$this, 'getShortCodeAttachedImagesByCategories'));
            add_action( 'after_plugin_row', array(&$this, 'plugin_version_nag') );
        }
        /* __construct */
        
        // Returns the plugin version
        function get_version() {
                if(!function_exists('get_plugin_data')) {
                        if(file_exists(ABSPATH . 'wp-admin/includes/plugin.php')) {
                                require_once(ABSPATH . 'wp-admin/includes/plugin.php'); //2.3+
                        } elseif (file_exists(ABSPATH . 'wp-admin/admin-functions.php')) {
                                require_once(ABSPATH . 'wp-admin/admin-functions.php'); //2.1
                        } else {
                                return "ERROR: couldn't get version";
                        }
                }
                $data = get_plugin_data(__FILE__, false, false);

                return $data['Version'];
        }

        /* nagscreen at plugins page */
        function plugin_version_nag($plugin) {
            if (preg_match('/gallery-widget/i',$plugin) && !empty($this->checkfile)) {
                $this->plugin_version_get($this->checkfile.$this->version);
            }
        }
        function plugin_version_get($checkfile, $tr=false) {
            $vcheck = wp_remote_fopen($checkfile);

            if($vcheck) {
                $status = explode('@', $vcheck);
                $theVersion = $status[1];
                $theMessage = $status[3];
                if( $theMessage ) {
                    if($tr == true)
                        echo '</tr><tr>';
                    $msg = __("Updatenotice for:", "gallerywidget").' <strong>'
                           .$theVersion.'</strong><br />'.$theMessage;
                    echo '<td colspan="5" class="plugin-update" style="line-height:1.2em;">'.$msg.'</td>';
                }
                if (version_compare($theVersion, $this->version) == 1) {
                    $this->plugin_version_get($this->checkfile.$theVersion, true);
                }
            }
        }
        /* nagscreen at plugins page */

        /* deactivatePlugin */
        function deactivatePlugin()
        {
            delete_option('widget_wGallery');
        }
        /* deactivatePlugin */

        /* getShortCodeAttachedImages */
        function getShortCodeAttachedImages($arg) {
            $options = shortcode_atts( array(
                                             'max' => 5,
                                             'order' => 'latest',
                                             'linktype' => 'page',
                                             'linkclass' => '',
                                             'linkrel' => ''
                                             ), $arg );

            return $this->getAttachedImages($options['max'], $options['order'],
                                            $options['linktype'],
                                            $options['linkclass'],
                                            $options['linkrel']);
        }
        /* getShortCodeAttachedImages */

        /* getShortCodeAttachedImagesByCategories */
        function getShortCodeAttachedImagesByCategories($arg) {
            $options = shortcode_atts( array(
                                             'max' => 5,
                                             'order' => 'latest',
                                             'categories' => '0',
                                             'option' => 'exclude',
                                             'linktype' => 'page',
                                             'linkclass' => '',
                                             'linkrel' => '',
                                             'singleimage' => 'no'
                                             ), $arg );

            return $this->getAttachedImagesByCategories($options['max'],
                                                        $options['order'],
                                                        $options['categories'],
                                                        $options['option'],
                                                        $options['linktype'],
                                                        $options['linkclass'],
                                                        $options['linkrel'],
                                                        $options['singleimage']);
        }
        /* getShortCodeAttachedImagesByCategories */
        
        /* getImageLink */
        function getImageLink($id, $linktype, $parent_id = 0)
        {
            if ($linktype == 'direct') {
                return wp_get_attachment_url($id);
            } elseif ($linktype == 'article') {
                if ($parent_id == 0) {
                    $parent_id == $id;
                }
                return get_permalink($parent_id);
            } else {
                return get_attachment_link($id);
            }
        }
        /* getImageLink */

        /* getAttachedImagesByCategories */
        function getAttachedImagesByCategories($_max = 5, $order = 'latest',
            $categories = '0', $option = 'include',
            $linktype = 'page', $linkclass = '',
            $linkrel = '', $singleimage = 'no', $titletype = 'default', $thumbsize = 'thumbnail')
        {
            global $wpdb; // wordpress database access
            $_addcss = '';
            $_addrel = '';
            
            /* if empty, set to default size, could be dropped later */
            if (empty($thumbsize))
                $thumbsize = 'thumbnail';

            if ($order == 'random') {
                $_orderby = 'ORDER BY RAND() ';
            } else {
                $_orderby = 'ORDER BY posts.post_date DESC ';
            }

            if ($singleimage == 'yes') {
                $_groupby = 'GROUP BY posts.post_parent ';
            } else {
                $_groupby = '';
            }

            if (empty($categories)) $categories = '0';    // otherwise 0 -> ''

            if ($option == 'exclude') {
                $_query = "SELECT DISTINCT ID FROM $wpdb->posts AS posts
                           INNER JOIN $wpdb->term_relationships AS tr ON ( posts.ID = tr.object_id )
                           INNER JOIN $wpdb->term_taxonomy AS tt ON ( tr.term_taxonomy_id = tt.term_taxonomy_id )
                           WHERE posts.post_type = 'post' AND (term_id IN ( $categories )
                           OR posts.post_status = 'draft' OR posts.post_status = 'future')";
            } else {
                $_query = "SELECT DISTINCT ID FROM $wpdb->posts AS posts
                           INNER JOIN $wpdb->term_relationships AS tr ON ( posts.ID = tr.object_id )
                           INNER JOIN $wpdb->term_taxonomy AS tt ON ( tr.term_taxonomy_id = tt.term_taxonomy_id )
                           WHERE posts.post_type = 'post' AND posts.post_status = 'publish'
                           AND term_id IN ( $categories )";
            }
            // print ('<!-- SQL 1:'. $_query . "-->\n");

            unset($_list);
            $_idarray = $wpdb->get_results($_query, ARRAY_A);
            if (count($_idarray) > 0) {
                foreach ($_idarray as $id) {
                    $_list[] = $id['ID'];
                }
                $_list = implode(',', $_list);
            } else {
                $_list = '0';
            }

            if ($option == 'exclude') {
                $_query = $wpdb->prepare("SELECT ID, post_title, post_parent FROM $wpdb->posts AS posts
                           WHERE posts.post_type = 'attachment'
                           AND posts.post_mime_type IN ('image/jpeg','image/gif','image/jpg','image/png')
                           AND posts.post_parent NOT IN ( $_list ) ${_groupby}${_orderby}LIMIT 0 , %d", $_max);
            } else {
                $_query = $wpdb->prepare("SELECT ID, post_title, post_parent FROM $wpdb->posts AS posts
                           WHERE posts.post_type = 'attachment'
                           AND posts.post_mime_type IN ('image/jpeg','image/gif','image/jpg','image/png')
                           AND posts.post_parent IN ( $_list ) ${_groupby}${_orderby}LIMIT 0 , %d", $_max);
            }
            // print ('<!-- SQL 2:'. $_query . "-->\n");

            $_result = $wpdb->get_results($_query);

            if (count($_result) > 0) {
                $_retval = '<ul class="wGallery">';
                foreach($_result as $_post) {
                    if (!empty($linkclass)) {
                        $_addcss = ' class="'.$linkclass.'"';
                    }
                    if (!empty($linkrel)) {
                        $_addrel = ' rel="'.$linkrel.'"';
                    }

                    if ($titletype == 'post') {
                        $_imgtitle = get_the_title($_post->post_parent);
                    } else {
                        $_imgtitle = $_post->post_title;
                    }
                    
                    $thumb = wp_get_attachment_image_src($_post->ID, $thumbsize);

                    $_retval .= '<li class="wGallery"><a href="' .
                                $this->getImageLink($_post->ID, $linktype, $_post->post_parent) .
                                '"' . $_addcss . $_addrel . '><img src="' .
                                $thumb[0] . '" alt="' .
                                $_imgtitle . '" title="' .
                                $_imgtitle . '" width="'.$thumb[1].'" height="'.$thumb[2].'" /></a></li>';
                }
                $_retval .= '</ul>';
            }

            return $_retval;
        }
        /* getAttachedImagesByCategories */

        /* getAttachedImages */
        function getAttachedImages($_max = 5, $order = 'latest', $linktype = 'page',
            $linkclass = '', $linkrel = '', $thumbsize = 'thumbnail')
        {
            $_addcss = '';
            $_addrel = '';
            $_retval = '';
            
            /* if empty, set to default size, could be dropped later */
            if (empty($thumbsize))
                $thumbsize = 'thumbnail';

            if ($order == 'random') {
                $r = new WP_Query("showposts=$_max&what_to_show=posts&post_status=inherit&post_type=attachment&orderby=rand&post_mime_type=image/jpeg,image/gif,image/jpg,image/png");
            } else {
                $r = new WP_Query("showposts=$_max&what_to_show=posts&post_status=inherit&post_type=attachment&orderby=menu_order ASC, ID ASC&post_mime_type=image/jpeg,image/gif,image/jpg,image/png");
            }

            if ($r->have_posts()) {
                $_retval = '<ul class="wGallery">';
                while ($r->have_posts()) : $r->the_post();

                if (!empty($linkclass)) {
                    $_addcss = ' class="'.$linkclass.'"';
                }
                if (!empty($linkrel)) {
                    $_addrel = ' rel="'.$linkrel.'"';
                }
                
                $thumb = wp_get_attachment_image_src(get_the_ID(), $thumbsize);
                
                $_retval .= '<li class="wGallery"><a href="' .
                $this->getImageLink(get_the_ID(), $linktype) .
                                '"' . $_addcss . $_addrel . '><img src="' .
                                $thumb[0]  .
                                '" alt="' . get_the_title() . 
                                '" title="' . get_the_title() .
                                '" width="'.$thumb[1].'" height="'.$thumb[2].'" /></a></li>';

                endwhile;
                $_retval .= '</ul>';
            }

            return $_retval;
        }
        /* getAttachedImages */

    }
}

if (class_exists("GalleryWidget")) {
    $galleryWidget = new GalleryWidget();
}

// WidgetObject, allows multiple instances of the widget
require_once('GalleryWidgetObject.php');


/* Wrapper for old function calls, you shouldn't use it anymore */
if (is_object($galleryWidget)) {
    function get_attached_images_by_categories($_max = 5, $order = 'latest',
    $categories = 0, $option = 'include',
    $linktype = 'page', $linkclass = '',
    $linkrel = '', $singleimage = 'no',
    $titletype = 'default',
    $thumbsize = 'thumbnail')
    {
        global $galleryWidget;
        return $galleryWidget->getAttachedImagesByCategories($_max, $order,
               $categories, $option, $linktype, $linkclass, $linkrel, $singleimage, $titletype, $thumbsize);
    }
    function get_attached_images($_max = 5, $order = 'latest', $linktype = 'page',
    $linkclass = '', $linkrel = '')
    {
        global $galleryWidget;
        return $galleryWidget->getAttachedImages($_max, $order,
               $option, $linktype, $linkclass, $linkrel);
    }
}