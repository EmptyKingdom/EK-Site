<?php
/**
 * Newsletter Signup Widget Class
 */
class EK_Widget_NewsletterSignup extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function __construct() 
    {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'newsletter-signup', 'description' => 'EK newsletter subscription box.' );

		/* Widget control settings. */
		$control_ops = array('newsletter-signup');

		/* Create the widget. */
		parent::WP_Widget( 'newsletter-signup', 'EK Newsletter Signup', $widget_ops, $control_ops );
    }
 
    /** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) 
	{
	    extract( $args );
		
		echo $before_widget;
		if ($instance['title'])
		{
			echo $before_title . $instance['title'] . $after_title;		
		} 
		?>
			<form class="form-inline input-append">
				<input type="text" name="newsletter-signup">
				<button class="btn btn-inverse" type="submit">Subscribe<span class="arrow"></span></button>
			</form>

		<?php 
		echo $after_widget; 
	}
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) 
    {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) 
    {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => '<strong>EK Newsletter</strong> Signup');
		$instance = wp_parse_args( (array) $instance, $defaults );
        $title 		= esc_attr($instance['title']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php
    }
 
 
} // end class example_widget
add_action('widgets_init', create_function('', 'return register_widget("EK_Widget_NewsletterSignup");'));
?>