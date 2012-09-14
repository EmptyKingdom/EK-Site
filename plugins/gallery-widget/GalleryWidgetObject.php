<?php
/**
 * GalleryWidget Class
 */
 
if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

class GalleryWidgetObject extends WP_Widget {
    
    /** constructor */
    function GalleryWidgetObject() {
        // parent::WP_Widget(false, $name = 'GalleryWidget');
        $widget_ops = array('classname' => 'widget_search', 'description' => __( "A gallery of images that are attached to your posts", 'gallerywidget') );
        $this->WP_Widget('GalleryWidget', __('Gallery Widget', 'gallerywidget'), $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        global $galleryWidget;
	extract($args);
	$title = apply_filters('widget_title', $instance['title']);
        $max = esc_attr($instance['max']);
        $order = esc_attr($instance['order']);
        $linkclass = esc_attr($instance['linkclass']);
        $linkrel = esc_attr($instance['linkrel']);
        $categories = esc_attr($instance['categories']);
        $category_option = esc_attr($instance['category_option']);
        $linktype = esc_attr($instance['linktype']);
        $singleimage = esc_attr($instance['singleimage']);
        $showon = esc_attr($instance['showon']);
        $titletype = esc_attr($instance['titletype']);
        $thumbsize = esc_attr($instance['thumbsize']);
        
        if ((is_home() && $showon == 'home') || $showon == 'all') {

            echo $before_widget;
            if ( $title )
                echo $before_title . $title . $after_title;

            // main widget output
            if ($category_option == "include" || $category_option == "exclude") {
                echo $galleryWidget->getAttachedImagesByCategories($max, $order, $categories,
                    $category_option, $linktype,
                    $linkclass, $linkrel,
                    $singleimage,$titletype,$thumbsize);
            } else {
                echo $galleryWidget->getAttachedImages($max, $order, $linktype, $linkclass, $linkrel, $thumbsize);
            }
            
            echo $after_widget;
        }

    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => 'GalleryWidget',
                                                             'max' => 3,
                                                             'order' => 'random',
                                                             'category_option' => 'exclude',
                                                             'categories' => 0,
                                                             'showon' => 'all',
                                                             'linktype' => 'page',
                                                             'singleimage' => 'no',
                                                             'linkclass' => '',
                                                             'linkrel' => '',
                                                             'titletype' => 'default',
                                                             'thumbsize' => 'thumbnail'));
        $order_options = array("latest", "random");
        $category_option_options = array('all', 'include', 'exclude');
        $showon_options = array('all', 'home');
        $linktype_options = array('page', 'direct', 'article');
        $singleimage_options = array('no', 'yes');
        $titletype_options = array('image', 'post');
        $thumbsize_options = get_intermediate_image_sizes();

        $title = esc_attr($instance['title']);
        $max = esc_attr($instance['max']);
        $linkclass = esc_attr($instance['linkclass']);
        $linkrel = esc_attr($instance['linkrel']);
        $categories = esc_attr($instance['categories']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'gallerywidget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

            <p><label for="<?php echo $this->get_field_id('max'); ?>"><?php _e('How many images:', 'gallerywidget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('max'); ?>" name="<?php echo $this->get_field_name('max'); ?>" type="text" value="<?php echo $max; ?>" /></label></p>

            <p>
            <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order by:', 'gallerywidget'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>">
            <?php
            foreach ( $order_options as $value ) {
                echo '<option value="' . $value . '"'
                    . ( $value == $instance['order'] ? ' selected="selected"' : '' )
                    . '>' . $value . "</option>\n";
            }
            ?>
            </select></p>

            <p>
            <label for="<?php echo $this->get_field_id('showon'); ?>"><?php _e('Shown widget on:', 'gallerywidget'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('showon'); ?>" name="<?php echo $this->get_field_name('showon'); ?>">
            <?php
            foreach ( $showon_options as $value ) {
                echo '<option value="' . $value . '"'
                    . ( $value == $instance['showon'] ? ' selected="selected"' : '' )
                    . '>' . $value . "</option>\n";
            }
            ?>
            </select></p>

            <p>
            <label for="<?php echo $this->get_field_id('linktype'); ?>"><?php _e('Linktype*:', 'gallerywidget'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('linktype'); ?>" name="<?php echo $this->get_field_name('linktype'); ?>">
            <?php
            foreach ( $linktype_options as $value ) {
                echo '<option value="' . $value . '"'
                    . ( $value == $instance['linktype'] ? ' selected="selected"' : '' )
                    . '>' . $value . "</option>\n";
            }
            ?>
            </select></p>

            <p>
            <label for="<?php echo $this->get_field_id('titletype'); ?>"><?php _e('Titletype*:', 'gallerywidget'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('titletype'); ?>" name="<?php echo $this->get_field_name('titletype'); ?>">
            <?php
            foreach ( $titletype_options as $value ) {
                echo '<option value="' . $value . '"'
                    . ( $value == $instance['titletype'] ? ' selected="selected"' : '' )
                    . '>' . $value . "</option>\n";
            }
            ?>
            </select></p>

            <p>
            <label for="<?php echo $this->get_field_id('singleimage'); ?>"><?php _e('Show only 1 image per post*:', 'gallerywidget'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('singleimage'); ?>" name="<?php echo $this->get_field_name('singleimage'); ?>">
            <?php
            foreach ( $singleimage_options as $value ) {
                echo '<option value="' . $value . '"'
                    . ( $value == $instance['singleimage'] ? ' selected="selected"' : '' )
                    . '>' . $value . "</option>\n";
            }
            ?>
            </select></p>

            <p><label for="<?php echo $this->get_field_id('linkclass'); ?>"><?php _e('CSS-Class to add to the link:', 'gallerywidget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('linkclass'); ?>" name="<?php echo $this->get_field_name('linkclass'); ?>" type="text" value="<?php echo $linkclass; ?>" /></label></p>

            <p><label for="<?php echo $this->get_field_id('linkrel'); ?>"><?php _e('Linkrelationship (rel=):', 'gallerywidget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('linkrel'); ?>" name="<?php echo $this->get_field_name('linkrel'); ?>" type="text" value="<?php echo $linkrel; ?>" /></label></p>

            <p>
            <label for="<?php echo $this->get_field_id('category_option'); ?>"><?php _e('Category-Option:', 'gallerywidget'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('category_option'); ?>" name="<?php echo $this->get_field_name('category_option'); ?>">
            <?php
            foreach ( $category_option_options as $value ) {
                echo '<option value="' . $value . '"'
                    . ( $value == $instance['category_option'] ? ' selected="selected"' : '' )
                    . '>' . $value . "</option>\n";
            }
            ?>
            </select></p>

            <p><label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Categories (commaseparated list of ids)*:', 'gallerywidget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" type="text" value="<?php echo $categories; ?>" /></label></p>
            
            <p>
            <label for="<?php echo $this->get_field_id('thumbsize'); ?>"><?php _e('Imagesize:', 'gallerywidget'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('thumbsize'); ?>" name="<?php echo $this->get_field_name('thumbsize'); ?>">
            <?php
            foreach ( $thumbsize_options as $value ) {
                echo '<option value="' . $value . '"'
                    . ( $value == $instance['thumbsize'] ? ' selected="selected"' : '' )
                    . '>' . $value . "</option>\n";
            }
            ?>
            </select></p>
            <p><?php _e('You can choose any registered size in WordPress.', 'gallerywidget'); ?> (<a href="http://codex.wordpress.org/Function_Reference/add_image_size" target="_blank"><?php _e('Link', 'gallerywidget'); ?></a>)</p>

            <p><?php _e('* these options can be used only, if you use category-option include or exclude', 'gallerywidget'); ?></p>

        <?php
    }

} // class GalleryWidgetObject

add_action('widgets_init', create_function('', 'return register_widget("GalleryWidgetObject");'));
