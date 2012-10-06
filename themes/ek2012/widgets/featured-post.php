<?php
/**
 * Featured Post Widget Class
 */
class EK_Widget_FeaturedPost extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function __construct() 
    {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'featured-post', 'description' => 'Show one post.' );

		/* Widget control settings. */
		$control_ops = array('featured-post' );

		/* Create the widget. */
		parent::WP_Widget( 'featured-post', 'EK Featured Post', $widget_ops, $control_ops );
    }
 
    /** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) 
	{
	    extract($args);
	    extract($instance);
		
		$title = 'Empty Kingdom html event template';
		
		echo $before_widget;
		if ($title)
		{
			echo $before_title . $title . $after_title;		
		} 
		?>
		<img src="http://www.dummyimag.es/770x395/ccc/fff.png&text=%20">
		<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out...</p>
		<a class="btn btn-primary">Read More...</a>
		<?php 
		echo $after_widget; 
	}
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) 
    {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) 
    {
		/* Set up some default widget settings. */
		$defaults = array( 'post_type' => 'post');
		$instance = wp_parse_args( (array) $instance, $defaults );
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Post Type:'); ?></label>
          <?php $post_types = get_post_types(array('public' => true)); ?>
          <select class="widefat" id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>">
          <?php foreach ($post_types as $post_type) : ?>
          	<option value="<?php echo $instance['post_type']; ?>"><?php echo $post_type ?></option>
          <?php endforeach; ?>
         </select>
          <label for="<?php echo $this->get_field_id('post_select'); ?>"><?php _e('Which Post:'); ?></label>
          <select class="widefat" id="<?php echo $this->get_field_id('post_select'); ?>" name="<?php echo $this->get_field_name('post_select'); ?>">
          	<option value="latest">Latest</option>
          	<option value="specific">Specific</option>
         </select>
         <div class="ek-featured-post-id" style="display: none">
          <label for="<?php echo $this->get_field_id('post_id'); ?>"><?php _e('Post ID:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('post_id'); ?>" name="<?php echo $this->get_field_name('post_id'); ?>" type="text" value="<?php echo $instance['post_id']; ?>" />
         </div>
        </p>
        <script type="text/javascript">
        	jQuery('#<?php echo $this->get_field_id('post_select') ?>').change(function(){
	        	if (jQuery(this).val() == 'specific') {
		        	jQuery(this).parents('.widget-content').find('.ek-featured-post-id').show();
	        	} else {
		        	jQuery(this).parents('.widget-content').find('.ek-featured-post-id').hide();
	        	}
        	})
        </script>
        <?php
    }
 
 
} // end class example_widget
add_action('widgets_init', create_function('', 'return register_widget("EK_Widget_FeaturedPost");'));
?>