<?php

class Simple_Optimizer_Plugin{

	private $debug = false;

	//plugin version number
	private $version = "1.2.2";

	


	//holds simple security settings page class
	private $settings_page;
	

	
	//holds simple security tools class
	private $tools;
	
	
	
	//options are: edit, upload, link-manager, pages, comments, themes, plugins, users, tools, options-general
	private $page_icon = "options-general"; 	
	
	//settings page title, to be displayed in menu and page headline
	private $plugin_title = "Simple Optimizer";
	
	//page name
	private $plugin_name = "simple-optimizer";
	
	//will be used as option name to save all options
	private $setting_name = "simple-optimizer-settings";



	
	//holds plugin options
	private $opt = array();




	//initialize the plugin class
	public function __construct() {
		
		$this->opt = get_option($this->setting_name);
		
				
		//initialize plugin settings
        add_action( 'admin_init', array(&$this, 'settings_page_init') );
		
		//create menu in wp admin menu
        add_action( 'admin_menu', array(&$this, 'admin_menu') );
		
		//add help menu to settings page
		add_filter( 'contextual_help', array(&$this,'admin_help'), 10, 3);	
		
		// add plugin "Settings" action on plugin list
		add_action('plugin_action_links_' . plugin_basename(SO_LOADER), array(&$this, 'add_plugin_actions'));
		
		// add links for plugin help, donations,...
		add_filter('plugin_row_meta', array(&$this, 'add_plugin_links'), 10, 2);


		
		$this->tools = new Simple_Optimizer_Tools;
		$this->tools->opt = $this->opt;
		
		//$this->tools->init();



    }
	
	




	//setup the plugin settings page
	public function settings_page_init() {

		$this->settings_page  = new Simple_Optimizer_Settings_Page( $this->setting_name );
		
        //set the settings
        $this->settings_page->set_sections( $this->get_settings_sections() );
        $this->settings_page->set_fields( $this->get_settings_fields() );
		$this->settings_page->set_sidebar( $this->get_settings_sidebar() );

		$this->build_optional_tabs();

        //initialize settings
        $this->settings_page->init();
    }




   /**
     * Returns all of the settings sections
     *
     * @return array settings sections
     */
    public function get_settings_sections() {
	
		$settings_sections = array(
			array(
				'id' => 'wordpress_optimizer_settings',
				'title' => __( 'WordPress Optimization', $this->plugin_name )
			),
			array(
				'id' => 'db_optimizer_settings',
				'title' => __( 'Database Optimization', $this->plugin_name )
			)
		);

								
        return $settings_sections;
    }


    /**
     * Returns all of the settings fields
     *
     * @return array settings fields
     */
    public function get_settings_fields() {
		$settings_fields = array(
			'wordpress_optimizer_settings' => array(
				array(
                    'name' => 'delete_spam_comments',
                    'label' => __( 'Delete Spam Comments', $this->plugin_name ),
                    'desc' => 'Delete Spam Comments (Recommended)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'delete_unapproved_comments',
                    'label' => __( 'Delete Un-Approved Comments', $this->plugin_name ),
                    'desc' => 'Delete Un-Approved Comments (Advanced)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'delete_revisions',
                    'label' => __( 'Delete Revisions', $this->plugin_name ),
                    'desc' => 'Delete Revisions (Advanced)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'delete_auto_drafts',
                    'label' => __( 'Delete Auto Drafts', $this->plugin_name ),
                    'desc' => 'Delete Auto Drafts (Advanced)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'delete_transient_options',
                    'label' => __( 'Delete Transient Options', $this->plugin_name ),
                    'desc' => 'Delete Transient Options (Advanced)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'delete_unused_postmeta',
                    'label' => __( 'Delete Unsed Postmeta', $this->plugin_name ),
                    'desc' => 'Delete Unsed Postmeta (Advanced)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'delete_unused_tags',
                    'label' => __( 'Delete Unused Tags ', $this->plugin_name ),
                    'desc' => 'Delete Unused Tags (Advanced)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'delete_pingbacks',
                    'label' => __( 'Delete Pingbacks', $this->plugin_name ),
                    'desc' => 'Delete Pingbacks (Advanced)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                )
			),
			'db_optimizer_settings' => array(
				array(
                    'name' => 'optimize_database',
                    'label' => __( 'Optimize Database', $this->plugin_name ),
                    'desc' => 'Optimize WordPress MySQL Database (Recommended)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'check_database',
                    'label' => __( 'Check Database', $this->plugin_name ),
                    'desc' => 'Check WordPress MySQL Database (Recommended)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                ),
				array(
                    'name' => 'repair_database',
                    'label' => __( 'Repair Database', $this->plugin_name ),
                    'desc' => 'Repair WordPress MySQL Database (Advanced)',
                    'type' => 'radio',
					//'default' => 'true',
                    'options' => array(
                        'true' => 'Enabled',
                        'false' => 'Disabled'
                    )
                )
			)
		);
		
        return $settings_fields;
    }



	

	//plugin settings page template
	public function plugin_settings_page(){
	
		echo "<style> 
		.form-table{ clear:left; } 
		.nav-tab-wrapper{ margin-bottom:0px; }
		</style>";
		
		echo $this->display_social_media(); 
		
        echo '<div class="wrap" >';
		
			echo '<div id="icon-'.$this->page_icon.'" class="icon32"><br /></div>';
			
			echo "<h2>".$this->plugin_title." Plugin Settings</h2>";
			
			$this->tools->init();
			
			$this->show_optimizer_action_button();
			
			$this->settings_page->show_tab_nav();
			
			echo '<div id="poststuff" class="metabox-holder has-right-sidebar">';
			
				echo '<div class="inner-sidebar">';
					echo '<div id="side-sortables" class="meta-box-sortabless ui-sortable" style="position:relative;">';
					
						$this->settings_page->show_sidebar();
					
					echo '</div>';
				echo '</div>';
			
				echo '<div class="has-sidebar" >';			
					echo '<div id="post-body-content" class="has-sidebar-content">';
						
						$this->settings_page->show_settings_forms();
						
					echo '</div>';
				echo '</div>';
				
			echo '</div>';
			
        echo '</div>';
		
    }




	private function show_optimizer_action_button(){
		//echo "<div id='optimizer-action' class='postbox'>\n";		
			//echo "<h3 class='hndle'><span>Optimizer</span></h3>\n";
			//echo "<div class='inside'>\n";
				echo "<form method='post'>";
					echo "<input type='hidden' name='action' value='run_simple_optimizer' >";
					echo '<div style="padding-left: 1.5em; margin-left:5px;">';
						echo "<p><input type='submit' value='Optimize WordPress' class='button-primary'></p>";
					echo "</div>";
				echo "</form>";	
			//echo "</div>\n";
		//echo "</div>\n";
	}





   	public function admin_menu() {
		
        $this->page_menu = add_options_page( $this->plugin_title, $this->plugin_title, 'manage_options',  $this->setting_name, array($this, 'plugin_settings_page') );
    }


	public function admin_help($contextual_help, $screen_id, $screen){
	
		
		
		if ( $screen_id == $this->page_menu  ) {
				
			$support_the_dev = $this->display_support_us();
			$screen->add_help_tab(array(
				'id' => 'developer-support',
				'title' => "Support the Developer",
				'content' => "<h2>Support the Developer</h2><p>".$support_the_dev."</p>"
			));
			
			
			$video_id = "lkdfqqPG1cY";
			$video_code = '<iframe width="500" height="350" src="http://www.youtube.com/embed/'.$video_id.'?rel=0&vq=hd720" frameborder="0" allowfullscreen></iframe>';

			$screen->add_help_tab(array(
				'id' => 'tutorial-video',
				'title' => "Tutorial Video",
				'content' => "<h2>{$this->plugin_title} Tutorial Video</h2><p>$video_code</p>"
			));
			
			$screen->add_help_tab(array(
				'id' => 'plugin-support',
				'title' => "Plugin Support",
				'content' => "<h2>{$this->plugin_title} Support</h2><p>For {$this->plugin_title} Plugin Support please visit <a href='http://mywebsiteadvisor.com/support/' target='_blank'>MyWebsiteAdvisor.com</a></p>"
			));
			
			

			$screen->set_help_sidebar("<p>Please Visit us online for more Free WordPress Plugins!</p><p><a href='http://mywebsiteadvisor.com/tools/wordpress-plugins/' target='_blank'>MyWebsiteAdvisor.com</a></p><br>");
			
		}
			
		

	}
	
	
	
	private function do_diagnostic_sidebar(){
	
		ob_start();
		
			echo "<p>Plugin Version: $this->version</p>";
				
			echo "<p>Server OS: ".PHP_OS."</p>";
			
			echo "<p>Required PHP Version: 5.0+<br>";
			echo "Current PHP Version: " . phpversion() . "</p>";

			echo "<p>Memory Use: " . number_format(memory_get_usage()/1024/1024, 1) . " / " . ini_get('memory_limit') . "</p>";
			
			echo "<p>Peak Memory Use: " . number_format(memory_get_peak_usage()/1024/1024, 1) . " / " . ini_get('memory_limit') . "</p>";
			
			if(function_exists('sys_getloadavg')){
				$lav = sys_getloadavg();
				echo "<p>Server Load Average: ".$lav[0].", ".$lav[1].", ".$lav[2]."</p>";
			}
	
		return ob_get_clean();
				
	}
	
	
	
	
	
	
	private function get_settings_sidebar(){
	
		$plugin_resources = "<p><a href='http://mywebsiteadvisor.com/tools/wordpress-plugins/simple-optimizer/' target='_blank'>Plugin Homepage</a></p>
			<p><a href='http://mywebsiteadvisor.com/learning/video-tutorials/simple-optimizer-tutorial/'  target='_blank'>Plugin Tutorial</a></p>
			<p><a href='http://mywebsiteadvisor.com/contact-us/'  target='_blank'>Plugin Support</a></p>
			<p><a href='http://mywebsiteadvisor.com/contact-us/'  target='_blank'>Contact Us</a></p>
			<p><a href='http://wordpress.org/support/view/plugin-reviews/simple-security?rate=5#postform'  target='_blank'>Rate and Review This Plugin</a></p>";
	
		$more_plugins = "<p><a href='http://mywebsiteadvisor.com/tools/premium-wordpress-plugins/'  target='_blank'>Premium WordPress Plugins!</a></p>
			<p><a href='http://profiles.wordpress.org/MyWebsiteAdvisor/'  target='_blank'>Free Plugins on Wordpress.org!</a></p>
			<p><a href='http://mywebsiteadvisor.com/tools/wordpress-plugins/'  target='_blank'>Free Plugins on MyWebsiteAdvisor.com!</a></p>";
	
		$follow_us = "<p><a href='http://facebook.com/MyWebsiteAdvisor/'  target='_blank'>Follow us on Facebook!</a></p>
			<p><a href='http://twitter.com/MWebsiteAdvisor/'  target='_blank'>Follow us on Twitter!</a></p>
			<p><a href='http://www.youtube.com/mywebsiteadvisor'  target='_blank'>Watch us on YouTube!</a></p>
			<p><a href='http://MyWebsiteAdvisor.com/'  target='_blank'>Visit our Website!</a></p>";
	
		$upgrade = "<p>
			<a href='http://mywebsiteadvisor.com/products-page/premium-wordpress-plugin/simple-optimizer-ultra/'  target='_blank'>Upgrade to Simple Optimizer Ultra!</a><br />
			<br />
			<b>Features:</b><br />
			-Automatic Optimization Function<br />
			-Email Notification<br />
			-Daily, Weekly or Monthly Schedule<br />
			-Much More!</br>
			</p>";
	
		$sidebar_info = array(
			array(
				'id' => 'diagnostic',
				'title' => 'Plugin Diagnostic Check',
				'content' => $this->do_diagnostic_sidebar()		
			),
			array(
				'id' => 'resources',
				'title' => 'Plugin Resources',
				'content' => $plugin_resources	
			),
			array(
				'id' => 'upgrade',
				'title' => 'Plugin Upgrades',
				'content' => $upgrade	
			),
			array(
				'id' => 'more_plugins',
				'title' => 'More Plugins',
				'content' => $more_plugins	
			),
			array(
				'id' => 'follow_us',
				'title' => 'Follow MyWebsiteAdvisor',
				'content' => $follow_us	
			)
		);
		
		return $sidebar_info;

	}






		//build optional tabs, using debug tools class worker methods as callbacks
	private function build_optional_tabs(){
	
		if($debug == true){
		
			//general debug settings
			$plugin_debug = array(
				'id' => 'plugin_debug',
				'title' => __( 'Plugin Settings Debug', $this->plugin_name ),
				'callback' => array(&$this, 'show_plugin_settings')
			);
	
				
			$this->settings_page->add_section( $plugin_debug );
			
		}
		
	}
	

 

	// displays the plugin options array
	public function show_plugin_settings(){
				
		echo "<pre>";
			print_r($this->opt);
		echo "</pre>";
			
	}





	/**
	 * Add "Settings" action on installed plugin list
	 */
	public function add_plugin_actions($links) {
		array_unshift($links, '<a href="options-general.php?page=' . $this->setting_name . '">' . __('Settings') . '</a>');
		
		return $links;
	}
	
	/**
	 * Add links on installed plugin list
	 */
	public function add_plugin_links($links, $file) {
		if($file == plugin_basename(SO_LOADER)) {
			$rate_url = 'http://wordpress.org/support/view/plugin-reviews/' . basename(dirname(__FILE__)) . '?rate=5#postform';
			$links[] = '<a href="'.$rate_url.'" target="_blank" title="Click Here to Rate and Review this Plugin on WordPress.org">Rate This Plugin</a>';
		}
		
		return $links;
	}
	
	
	public function display_support_us(){
				
		$string = '<p><b>Thank You for using the '.$this->plugin_title.' Plugin for WordPress!</b></p>';
		$string .= "<p>Please take a moment to <b>Support the Developer</b> by doing some of the following items:</p>";
		
		$rate_url = 'http://wordpress.org/support/view/plugin-reviews/' . basename(dirname(__FILE__)) . '?rate=5#postform';
		$string .= "<li><a href='$rate_url' target='_blank' title='Click Here to Rate and Review this Plugin on WordPress.org'>Click Here</a> to Rate and Review this Plugin on WordPress.org!</li>";
		
		$string .= "<li><a href='http://facebook.com/MyWebsiteAdvisor' target='_blank' title='Click Here to Follow us on Facebook'>Click Here</a> to Follow MyWebsiteAdvisor on Facebook!</li>";
		$string .= "<li><a href='http://twitter.com/MWebsiteAdvisor' target='_blank' title='Click Here to Follow us on Twitter'>Click Here</a> to Follow MyWebsiteAdvisor on Twitter!</li>";
		$string .= "<li><a href='http://mywebsiteadvisor.com/tools/premium-wordpress-plugins/' target='_blank' title='Click Here to Purchase one of our Premium WordPress Plugins'>Click Here</a> to Purchase Premium WordPress Plugins!</li>";
	
		return $string;
	}
	
	
	
	
	
	public function display_social_media(){
	
		$social = '<style>
	
		.fb_edge_widget_with_comment {
			position: absolute;
			top: 0px;
			right: 200px;
		}
		
		</style>
		
		<div  style="height:20px; vertical-align:top; width:25%; float:right; text-align:right; margin-top:5px; padding-right:16px; position:relative;">
		
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=253053091425708";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));</script>
			
			<div class="fb-like" data-href="http://www.facebook.com/MyWebsiteAdvisor" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
			
			
			<a href="https://twitter.com/MWebsiteAdvisor" class="twitter-follow-button" data-show-count="false"  >Follow @MWebsiteAdvisor</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
		
		</div>';
		
		return $social;

	}	




}

?>