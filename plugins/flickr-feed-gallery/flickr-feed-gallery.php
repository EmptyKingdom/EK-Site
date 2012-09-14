<?php
/*
Plugin Name: Flickr Feed Gallery
Plugin URI: http://www.jayson.in/projects/wordpress-plugins/flickr-feed-gallery
Description: Enables easy integration of Flickr photo feed to a WordPress blog. Configure feed parameters from settings page. Use <code>&lt;?php show_flickr_feed_gallery();?&gt;</code> in your theme or add plugin as a Widget.
Version: 1.1
Author: Jayson Joseph Chacko
Author URI: http://www.jayson.in
*/
class Flickr_Feed_Gallery {
    var $feed_type;
    var $user_id;
    var $group_id;
    var $language;
    var $images_per_contact;
    var $display_mode;
    var $tags;
    var $tag_mode;
    var $image_limit;
    var $image_size;
    function get_flickr_feed_options() {
        $this->feed_type = get_option("ffg_feed_type");
        $this->user_id = get_option("ffg_user_id");
        $this->group_id = get_option("ffg_group_id");
        $this->images_per_contact = get_option("ffg_images_per_contact");
        $this->display_mode = get_option("ffg_display_mode");
        $this->tags = get_option("ffg_tags");
        $this->tag_mode = get_option("ffg_tag_mode");
        $this->image_limit = get_option("ffg_image_limit");
        $this->image_size = get_option("ffg_image_size");
        return $this;
    }
    function get_flickr_json_url($options) {
        switch ($options->feed_type) {
            case 'PUBLIC':
                $id_key = strstr($options->user_id,",")? "ids":"id";
                $url = 'http://api.flickr.com/services/feeds/photos_public.gne?format=json&jsoncallback=?';
                $url = $url."&".$id_key."=".$options->user_id."&language=".$options->language;
                $url = $url."&tags=".$options->tags."&tagmode=".$options->tag_mode;
                break;
            case 'FRIEND': $url = 'http://api.flickr.com/services/feeds/photos_friends.gne?format=json&jsoncallback=?';
                $url = $url."&user_id=".$options->user_id;
                $url = $url."&friends=".$options->display_mode."&display_all=".$options->images_per_contact;
                break;
            case 'USERFAVS': $url = 'http://api.flickr.com/services/feeds/photos_faves.gne?format=json&jsoncallback=?';
                $url = $url."&id=".$options->user_id;
                break;
            case 'GROUPPOOL':
                    $url = 'http://api.flickr.com/services/feeds/groups_pool.gne?format=json&jsoncallback=?';
                    $url = $url."&id=".$options->group_id;
                    break;
                }
                return $url;
            }
}
function show_flickr_feed_gallery() {
    $gallery = new Flickr_Feed_Gallery();
    $options = $gallery->get_flickr_feed_options();
    $url = $gallery->get_flickr_json_url($options);
    echo ("<span id='ffg_marker_span' style='display:none;'></span>");
    echo ("<script> var ffg_options = ['".$gallery->get_flickr_json_url($options)."','".$options->image_size."','".$options->image_limit."']; </script>");
    echo ("<style>");
    include('flickr-feed-gallery.css');
    echo ("</style>");
?>
<script>
    (function() {
        jQuery(document).ready(ffg_show_image_content);
    })();
    function ffg_show_image_content() {
        jQuery.getJSON(ffg_options[0],
        function(result) {
            jQuery.each(result.items,
            function(i,item) {
                ffg_append_img_content(i,item);
                if(i+1>=ffg_options[2]) return false;
            }
        )
        }
    );
    }

    function ffg_append_img_content(i,item) {
        var img_url = item.media.m;
        var iu = img_url.replace("_m",ffg_options[1]);
        var content = '<a title="'+item.title+'" href="'+item.link+'" class="ffg_link_css" id="ffg_link_'+i+'">'
        content = content+ '<img alt="'+item.title+'" class="ffg_img_css" id="ffg_img_'+i+'"'+' src="'+iu+'">';
        content = content + '</a>';
        jQuery(content).insertAfter('#ffg_marker_span');
    }
</script>
<?php
}

add_action('admin_menu', 'flickr_feed_gallery_menu');

function flickr_feed_gallery_menu() {
    add_options_page('Flickr Feed Gallery Options', 'Flickr Feed Gallery', 8, __FILE__, 'flickr_feed_gallery_options');
}

function flickr_feed_gallery_options() {
    include('flickr-feed-gallery-admin-panel.php');

}
function flickr_feed_gallery_init() {
    wp_enqueue_script('jquery');
}
function widget_flickr_feed_gallery($args) {
    extract($args);
    $options = get_option('widget_ffg');
    $title = $options['title'];
    echo $before_widget;
    echo $before_title. $title. $after_title;
    show_flickr_feed_gallery();
    echo $after_widget;
}
function widget_flickr_feed_gallery_control() {
    $options = get_option('widget_ffg');
    if ( $_POST['widget_ffg_submit'] ) {
        $options['title'] = strip_tags(stripslashes($_POST['widget_ffg_title']));
        update_option('widget_ffg', $options);
    }
    $title = htmlspecialchars($options['title'], ENT_QUOTES);
    echo
        '<p><label for="flickrRSS-title">Title:<input class="widefat" name="widget_ffg_title" type="text" value="'.$title.'" /></label></p>'.
        '<input type="hidden" id="widget_ffg_submit" name="widget_ffg_submit" value="1" />';
}


function widget_flickr_feed_gallery_register() {
    register_sidebar_widget('Flickr Feed Gallery', 'widget_flickr_feed_gallery');
    register_widget_control('Flickr Feed Gallery', 'widget_flickr_feed_gallery_control');
}
add_action('init', flickr_feed_gallery_init);
add_action('plugins_loaded', widget_flickr_feed_gallery_register);
?>