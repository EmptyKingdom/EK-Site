<?php 
/* 
Plugin Name: Facebook Fan Box
Plugin URI: http://www.dolcebita.com/wordpress/facebook-fan-box-wordpress-plugin/
Description: Displays a Facebook Fan Box
Version: 1.6
Author: Marcos Esperon
Author URI: http://www.dolcebita.com/
*/

/*  Copyright 2009  Marcos Esperon

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; 
*/

$ffb_options['widget_fields']['title'] = array('label'=>'Title:', 'type'=>'text', 'default'=>'', 'class'=>'widefat', 'size'=>'', 'help'=>'');
$ffb_options['widget_fields']['api_key'] = array('label'=>'API Key:', 'type'=>'text', 'default'=>'', 'class'=>'widefat', 'size'=>'', 'help'=>'');
$ffb_options['widget_fields']['profile_id'] = array('label'=>'Profile ID:', 'type'=>'text', 'default'=>'', 'class'=>'widefat', 'size'=>'', 'help'=>'');
$ffb_options['widget_fields']['stream'] = array('label'=>'Stream:', 'type'=>'checkbox', 'default'=>true, 'class'=>'', 'size'=>'', 'help'=>'');
$ffb_options['widget_fields']['connections'] = array('label'=>'Connections:', 'type'=>'text', 'default'=>'10', 'class'=>'', 'size'=>'3', 'help'=>'(Limit 100)');
$ffb_options['widget_fields']['width'] = array('label'=>'Width:', 'type'=>'text', 'default'=>'300', 'class'=>'', 'size'=>'3', 'help'=>'(Value in px)');
$ffb_options['widget_fields']['height'] = array('label'=>'Height:', 'type'=>'text', 'default'=>'550', 'class'=>'', 'size'=>'3', 'help'=>'(Value in px)');
$ffb_options['widget_fields']['css'] = array('label'=>'CSS:', 'type'=>'text', 'default'=>'', 'class'=>'widefat', 'size'=>'', 'help'=>'(External URL file)');
$ffb_options['widget_fields']['iframe'] = array('label'=>'iFrame:', 'type'=>'checkbox', 'default'=>false, 'class'=>'', 'size'=>'', 'help'=>'');
$ffb_options['widget_fields']['logo'] = array('label'=>'Logo:', 'type'=>'checkbox', 'default'=>false, 'class'=>'', 'size'=>'', 'help'=>'');
$ffb_options['widget_fields']['lang'] = array('label'=>'Language:', 'type'=>'text', 'default'=>'en_US', 'class'=>'', 'size'=>'4', 'help'=>'(en_US, es_ES...)');

function facebook_fan_box($api_key, $profile_id, $stream = 1, $connections = 10, $width = 300, $css = '', $iframe = 0, $height = '', $logo = 0, $lang = '') {
	$output = '';
  if ($profile_id != '') {
    if($api_key == '') {
      $stream = ($stream == 1) ? 'true' : 'false';
      $header = ($logo == 1) ? 'true' : 'false';        
      $locale = $lang;
      $output = '<iframe src="http://www.facebook.com/plugins/fan.php?id='.$profile_id.'&amp;width='.$width.'&amp;connections='.$connections.'&amp;stream='.$stream.'&amp;header='.$header.'&amp;locale='.$locale.'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:'.$width.'px; height:'.$height.'px"></iframe>';
    } else {
      if($iframe != 1) {
        if($lang != '') $lang = '/'.$lang;
        /* -- Old Facebook call -- */
        /*$output = '<script src="http://www.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php'.$lang.'" type="text/javascript"></script><script type="text/javascript">FB.init("'.$api_key.'", "");</script><fb:fan profile_id="'.$profile_id.'" stream="'.$stream.'" connections="'.$connections.'" logobar="'.$logo.'" width="'.$width.'" css="'.$css.'?'.mktime().'"></fb:fan>';*/
        $output = '<script type="text/javascript" src="http://static.ak.connect.facebook.com/connect.php'.$lang.'"></script>'
                 .'<script type="text/javascript">FB.init("'.$api_key.'");</script>'
                 .'<fb:fan profile_id="'.$profile_id.'" stream="'.$stream.'" connections="'.$connections.'" logobar="'.$logo.'" width="'.$width.'" css="'.$css.'?'.mktime().'"></fb:fan>';
      } else {
        if($height != '') $height = ' height: '.$height.'px;';
        $output = '<iframe scrolling="no" frameborder="0" src="http://www.facebook.com/connect/connect.php?id='.$profile_id.'&amp;stream='.$stream.'&amp;connections='.$connections.'&amp;logobar='.$logo.'&amp;css='.$css.'?'.mktime().'" style="border: none; width: '.$width.'px; '.$height.'">&nbsp;</iframe>';
      }
    }
  }
  echo $output;
}

function widget_ffb_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	
	$check_options = get_option('widget_ffb');
  
	function widget_ffb($args) {

		global $ffb_options;
    
    // $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
    
		extract($args);
		
		$options = get_option('widget_ffb');
		
		// fill options with default values if value is not set
		$item = $options;
		foreach($ffb_options['widget_fields'] as $key => $field) {
			if (! isset($item[$key])) {
				$item[$key] = $field['default'];
			}
		}    
		
    $title = $item['title'];
    $api_key = $item['api_key'];
    $profile_id = $item['profile_id'];
    $stream = ($item['stream']) ? 1 : 0;
    $connections = $item['connections'];
    $width = $item['width'];
    $height = $item['height'];
    $css = $item['css'];
    $iframe = ($item['iframe']) ? 1 : 0;
    $logo = ($item['logo']) ? 1 : 0;
    $lang = $item['lang'];
    
		// These lines generate our output.
    echo $before_widget . $before_title . $title . $after_title;    
    facebook_fan_box($api_key, $profile_id, $stream, $connections, $width, $css, $iframe, $height, $logo, $lang);
    echo $after_widget;
				
	}

	// This is the function that outputs the form to let the users edit
	// the widget's title. It's an optional feature that users cry for.
	function widget_ffb_control() {
	
		global $ffb_options;

		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_ffb');
		if ( isset($_POST['ffb-submit']) ) {

			foreach($ffb_options['widget_fields'] as $key => $field) {
				$options[$key] = $field['default'];
				$field_name = sprintf('%s', $key);        
				if ($field['type'] == 'text') {
					$options[$key] = strip_tags(stripslashes($_POST[$field_name]));
				} elseif ($field['type'] == 'checkbox') {
					$options[$key] = isset($_POST[$field_name]);
				}
			}

			update_option('widget_ffb', $options);
		}
    
		foreach($ffb_options['widget_fields'] as $key => $field) {
			$field_name = sprintf('%s', $key);
			$field_checked = '';
			if ($field['type'] == 'text') {
				$field_value = (isset($options[$key])) ? htmlspecialchars($options[$key], ENT_QUOTES) : htmlspecialchars($field['default'], ENT_QUOTES);
			} elseif ($field['type'] == 'checkbox') {
				$field_value = (isset($options[$key])) ? $options[$key] :$field['default'] ;
				if ($field_value == 1) {
					$field_checked = 'checked="checked"';
				}
			}
      $jump = ($field['type'] != 'checkbox') ? '<br />' : '&nbsp;';
      $field_class = $field['class'];
      $field_size = ($field['class'] != '') ? '' : 'size="'.$field['size'].'"';
      $field_help = ($field['help'] == '') ? '' : '<small>'.$field['help'].'</small>';
			printf('<p class="ffb_field"><label for="%s">%s</label>%s<input id="%s" name="%s" type="%s" value="%s" class="%s" %s %s /> %s</p>',
		  $field_name, __($field['label']), $jump, $field_name, $field_name, $field['type'], $field_value, $field_class, $field_size, $field_checked, $field_help);
		}

		echo '<input type="hidden" id="ffb-submit" name="ffb-submit" value="1" />';
	}	
	
	function widget_ffb_register() {		
    $title = 'Facebook Fan Box';
    // Register widget for use
    register_sidebar_widget($title, 'widget_ffb');    
    // Register settings for use, 300x100 pixel form
    register_widget_control($title, 'widget_ffb_control');
	}

	widget_ffb_register();
}

// Run our code later in case this loads prior to any required plugins.
add_action('widgets_init', 'widget_ffb_init');
?>