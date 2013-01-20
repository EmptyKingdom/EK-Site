<?php
/**
 * EK Social Buttons Widget Class
 */
class EK_Widget_Social extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function __construct() 
    {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'ek-social', 'description' => 'Social buttons.' );

		/* Widget control settings. */
		$control_ops = array('ek-social' );

		/* Create the widget. */
		parent::WP_Widget( 'ek-social', 'EK Social Buttons', $widget_ops, $control_ops );
    }
 
    /** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) 
	{
	    extract( $args );
	    $title = $instance['title'];
		
		echo $before_widget;
		if ($title)
		{
			echo $before_title . $title . $after_title;		
		} 
		?>
		<ul class="unstyled">
			<li class="vimeo icon"><a href="http://vimeo.com/emptykingdom" target="_blank">Vimeo</a></li>
			<li class="pinterest icon"><a href="http://pinterest.com/emptykingdom/" target="_blank">Pinterest</a></li>
			<li class="facebook icon"><a href="https://www.facebook.com/myemptykingdom" target="_blank">Facebook</a></li>
			<li class="twitter icon"><a href="http://twitter.com/emptykingdom" target="_blank">Twitter</a></li>
		</ul>
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
		$defaults = array( 'title' => '<strong>EK</strong> Social');
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
add_action('widgets_init', create_function('', 'return register_widget("EK_Widget_Social");'));
?>