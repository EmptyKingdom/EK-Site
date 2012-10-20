<?php
/**
 * Newsletter Signup Widget Class
 */
class EK_Widget_Facebook extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function __construct() 
    {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'facebook', 'description' => 'EK facebook like / fan box.' );

		/* Widget control settings. */
		$control_ops = array('facebook');

		/* Create the widget. */
		parent::WP_Widget( 'facebook', 'EK Facebook Box', $widget_ops, $control_ops );
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
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="content">
			<div class="facebookOuter">
				<div class="fb-like-box" 
				data-href="https://www.facebook.com/pages/Empty-Kingdom/151292131589404" 
				data-width="292" 
				data-show-faces="true" 
				data-border-color="#F5F5F5" 
				data-stream="false" 
				data-header="false"></div>
			</div>
		</div> <!-- /.content -->

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
		$defaults = array( 'title' => 'EK Comrades');
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
add_action('widgets_init', create_function('', 'return register_widget("EK_Widget_Facebook");'));
?>