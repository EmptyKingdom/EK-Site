<?php
/*
Plugin Name: Simple Social Sharing
Plugin URI: http://andrewnorcross.com/plugins/simple-social-sharing
Description: A simple, straightforward post footer to allow readers to share your content using pure HTML / CSS. Now includes an options panel.
Version: 1.24
Author: Andrew Norcross
Author URI: http://andrewnorcross.com
*/

/*  Copyright 2010 - 2011 Andrew Norcross

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; version 2 of the License (GPL v2) only.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('admin_menu', 'social_sharing_create_menu');

function social_sharing_create_menu() {

	//create new top-level menu
	add_options_page('Simple Social Sharing', 'Simple Social Sharing', 'manage_options', __FILE__, 'social_sharing_settings_page');
	add_filter( "plugin_action_links", "sss_settings_link", 10, 2 );
	//call register settings function
	add_action( 'admin_init', 'register_social_sharing' );
}

function sss_settings_link($links, $file) {
	static $this_plugin;
		if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
		if ($file == $this_plugin){
	$settings_link = '<a href="options-general.php?page=simple-social-sharing/simple-social-sharing.php">'.__("Settings", "simple-social-sharing").'</a>';
		array_unshift($links, $settings_link);
		}
	return $links;
	}

function register_social_sharing() {
	//register our settings
	register_setting( 'social_sharing_group', 'soc_twitter_user' );
	register_setting( 'social_sharing_group', 'soc_twitter_rec' );
	register_setting( 'social_sharing_group', 'soc_posts' );
	register_setting( 'social_sharing_group', 'soc_excerpts' );
	register_setting( 'social_sharing_group', 'soc_pages' );
	register_setting( 'social_sharing_group', 'soc_homep' );
	register_setting( 'social_sharing_group', 'soc_sharetext' );
	register_setting( 'social_sharing_group', 'soc_cssdark' );
}

function social_sharing_css_head() { ?>
<style type="text/css"  >

.soshare {padding-top:15px;}
.soshare .setting {display:block;padding:1em;}
.soshare .setting p.label_title {font-size:12px;font-weight:bold;display:block;margin-bottom:5px;}
.soshare .setting label.no_bold {font-weight:normal;}
.soshare .setting label span.slim {width:200px;float:left;display:block;margin: 1px;padding: 3px;}
.soshare .setting p.desc {font-size:10px;font-style:italic;text-indent:10px; text-align:left;}
</style>

<?php }
add_action('admin_head', 'social_sharing_css_head');


function social_sharing_settings_page() { ?>

<div class="wrap soshare">
<h2>Simple Social Sharing</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'social_sharing_group' ); ?>


        <div class="setting">
        <p class="label_title">Twitter User Info</p>
        <p><label class="no_bold" for="soc_twitter_user"><span class="slim"><?php _e('Twitter user name') ?></span>
		<input name="soc_twitter_user" type="text" id="soc_twitter_user" value="<?php form_option('soc_twitter_user'); ?>" /></label></p>
        <p class="desc">Enter your twitter username. No http:// or @ </p>

        <p><label class="no_bold" for="soc_twitter_rec"><span class="slim"><?php _e('Twitter Recommended User') ?></span>
		<input name="soc_twitter_rec" type="text" id="soc_twitter_rec" value="<?php form_option('soc_twitter_rec'); ?>" /></label></p>
        <p class="desc">Optional. Add a second username to "recommend" after a visitor tweets.</p>
        </div>

		<div class="setting">
        <p class="label_title">Post / Page Settings</p>
        <fieldset><legend class="screen-reader-text"><span><?php _e('Post / Page Settings') ?></span></legend>

        <p><label class="no_bold" for="soc_homep">
		<input name="soc_homep" type="checkbox" id="soc_homep" value="yes" <?php checked('yes', get_option('soc_homep')); ?> />
        <?php _e('Display on home page') ?></label></p>
		
        <p><label class="no_bold" for="soc_posts">
        <input name="soc_posts" type="checkbox" id="soc_posts" value="yes" <?php checked('yes', get_option('soc_posts')); ?> />
        <?php _e('Display on single posts') ?></label></p>


        <p><label class="no_bold" for="soc_excerpts">
		<input name="soc_excerpts" type="checkbox" id="soc_excerpts" value="yes" <?php checked('yes', get_option('soc_excerpts')); ?> />
        <?php _e('Display on excerpts') ?></label></p>

        <p><label class="no_bold" for="soc_pages">
        <input name="soc_pages" type="checkbox" id="soc_pages" value="yes" <?php checked('yes', get_option('soc_pages')); ?> />
        <?php _e('Display on single pages') ?></label></p>

		</div>
        
		<div class="setting">
        <p class="label_title">Style / Layout Settings</p>

        <p class="label_title">Twitter User Info</p>
        <p><label class="no_bold" for="soc_sharetext"><span class="slim"><?php _e('Leading Text') ?></span>

		<input name="soc_sharetext" type="text" id="soc_sharetext" value="<?php form_option('soc_sharetext'); ?>"  /></label></p>
        <p class="desc">Enter any leading text before the icons, i.e. "Share This"</p>

        <p><label class="no_bold" for="soc_cssdark">
        <input name="soc_cssdark" type="checkbox" id="soc_cssdark" value="yes" <?php checked('yes', get_option('soc_cssdark')); ?> />
        <?php _e('Load optional "dark" CSS (for themes with black backgrounds and white lettering)') ?></label></p>

        </fieldset>
        </div>


	<p class="settting">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>

</form>

</div>

<?php }

function sharing_css() {
	if (get_option('soc_cssdark' ) == 'yes') {
		wp_register_style( 'sss-style', plugins_url('simple-social-sharing-dark.css', __FILE__) );
	} else {
		wp_register_style( 'sss-style', plugins_url('simple-social-sharing.css', __FILE__) );
	}
	// actually load the things
	wp_enqueue_style( 'sss-style');
}

add_action( 'wp_print_styles', 'sharing_css' );

// conditionals to display box

if (get_option('soc_excerpts' ) == 'yes') : 
	add_filter('the_excerpt', 'add_sharing_excerpt', 25);
endif;

if (get_option('soc_posts' ) == 'yes') :
	add_filter('the_content', 'add_sharing_post', 25);
endif;

if (get_option('soc_pages' ) == 'yes') :
	add_filter('the_content', 'add_sharing_page', 25);
endif;

if (get_option('soc_homep' ) == 'yes') : 
	add_filter('the_content', 'add_sharing_homep', 25);
endif;        


function add_sharing_excerpt($share_content) {
	// define options
if (get_option('soc_sharetext' ))		{ $sharetext = '<li class="sharetext">'.get_option('soc_sharetext').'</li>';		} else { $sharetext = NULL; }
if (get_option('soc_twitter_user' ))	{ $twitter_name = '&amp;via='.get_option('soc_twitter_user').'';					} else { $twitter_name = NULL; }
if (get_option('soc_twitter_rec' ))		{ $twitter_rec = '&amp;related='.get_option('soc_twitter_rec').'';					} else { $twitter_rec = NULL; }

	
	// build share box
	global $post;
	if(empty($post->post_password)) :	
		$share_content .= '<div id="simple_socialmedia"><ul class="ssm_row">';
		$share_content .= '<li class="twitter"><a target="_blank" href="http://twitter.com/share?url='.get_permalink().'&amp;text='.get_the_title().''.$twitter_name.''.$twitter_rec.'">Tweet</a></li>';
		$share_content .= '<li class="facebook"><a target="_blank" title="Share on Facebook" rel="nofollow" href="http://www.facebook.com/sharer.php?u='.get_permalink().'&amp;t='.get_the_title().'">Facebook</a></li>';
		$share_content .= '<li class="linkedin"><a target="_blank" title="Share on LinkedIn" rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'&amp;source='.get_bloginfo( 'name' ).'">LinkedIn</a></li>';
		$share_content .= '<li class="tumblr"><a target="_blank" title="Share on Tumblr" rel="nofollow" href="http://www.tumblr.com/share/link?url='.urlencode(get_permalink() ).'&name='.urlencode(get_bloginfo('name')).'&description='.urlencode(get_the_title()).'" title="Share on Tumblr">Tumblr</a></li>';
		$share_content .= '<li class="stumble"><a target="_blank" title="Share on StumbleUpon" rel="nofollow" href="http://www.stumbleupon.com/submit?url='.get_permalink().'">Stumble</a></li>';
		$share_content .= '<li class="digg"><a target="_blank" title="Share on Digg" rel="nofollow" href="http://www.digg.com/submit?phase=2&amp;url='.get_permalink().'">Digg</a></li>';
		$share_content .= '<li class="delicious"><a target="_blank" title="Share on Delicious" rel="nofollow" href="http://del.icio.us/post?url='.get_permalink().'&amp;title='.get_the_title().'">Delicious</a></li>';
		$share_content .= '</ul></div>';
	return $share_content;
	endif;
}

function add_sharing_post($share_content) {
	// define options
if (get_option('soc_sharetext' ))		{ $sharetext = '<li class="sharetext">'.get_option('soc_sharetext').'</li>';		} else { $sharetext = NULL; }
if (get_option('soc_twitter_user' ))	{ $twitter_name = '&amp;via='.get_option('soc_twitter_user').'';					} else { $twitter_name = NULL; }
if (get_option('soc_twitter_rec' ))		{ $twitter_rec = '&amp;related='.get_option('soc_twitter_rec').'';					} else { $twitter_rec = NULL; }
	
	// build share box
	if(is_single()) {
		global $post;
		if(empty($post->post_password)) :
		$share_content .= '<div id="simple_socialmedia"><ul class="ssm_row">';
		$share_content .= $sharetext;
		$share_content .= '<li class="twitter"><a target="_blank" href="http://twitter.com/share?url='.get_permalink().'&amp;text='.get_the_title().''.$twitter_name.''.$twitter_rec.'">Tweet</a></li>';
		$share_content .= '<li class="facebook"><a target="_blank" title="Share on Facebook" rel="nofollow" href="http://www.facebook.com/sharer.php?u='.get_permalink().'&amp;t='.get_the_title().'">Facebook</a></li>';
		$share_content .= '<li class="linkedin"><a target="_blank" title="Share on LinkedIn" rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'&amp;source='.get_bloginfo( 'name' ).'">LinkedIn</a></li>';
		$share_content .= '<li class="tumblr"><a target="_blank" title="Share on Tumblr" rel="nofollow" href="http://www.tumblr.com/share/link?url='.urlencode(get_permalink() ).'&name='.urlencode(get_bloginfo('name')).'&description='.urlencode(get_the_title()).'" title="Share on Tumblr">Tumblr</a></li>';
		$share_content .= '<li class="stumble"><a target="_blank" title="Share on StumbleUpon" rel="nofollow" href="http://www.stumbleupon.com/submit?url='.get_permalink().'">Stumble</a></li>';
		$share_content .= '<li class="digg"><a target="_blank" title="Share on Digg" rel="nofollow" href="http://www.digg.com/submit?phase=2&amp;url='.get_permalink().'">Digg</a></li>';
		$share_content .= '<li class="delicious"><a target="_blank" title="Share on Delicious" rel="nofollow" href="http://del.icio.us/post?url='.get_permalink().'&amp;title=INSERT_TITLE">Delicious</a></li>';
		$share_content .= '</ul></div>';
		endif;
	}
	return $share_content;

}

function add_sharing_page($share_content) {
	// define options
if (get_option('soc_sharetext' ))		{ $sharetext = '<li class="sharetext">'.get_option('soc_sharetext').'</li>';		} else { $sharetext = NULL; }
if (get_option('soc_twitter_user' ))	{ $twitter_name = '&amp;via='.get_option('soc_twitter_user').'';					} else { $twitter_name = NULL; }
if (get_option('soc_twitter_rec' ))		{ $twitter_rec = '&amp;related='.get_option('soc_twitter_rec').'';					} else { $twitter_rec = NULL; }
	
	// build share box
	if(is_page()) {
	global $post;
	if(empty($post->post_password)) :	
		$share_content .= '<div id="simple_socialmedia"><ul class="ssm_row">';
		$share_content .= $sharetext;
		$share_content .= '<li class="twitter"><a target="_blank" href="http://twitter.com/share?url='.get_permalink().'&amp;text='.get_the_title().''.$twitter_name.''.$twitter_rec.'">Tweet</a></li>';
		$share_content .= '<li class="facebook"><a target="_blank" title="Share on Facebook" rel="nofollow" href="http://www.facebook.com/sharer.php?u='.get_permalink().'&amp;t='.get_the_title().'">Facebook</a></li>';
		$share_content .= '<li class="linkedin"><a target="_blank" title="Share on LinkedIn" rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'&amp;source='.get_bloginfo( 'name' ).'">LinkedIn</a></li>';
		$share_content .= '<li class="tumblr"><a target="_blank" title="Share on Tumblr" rel="nofollow" href="http://www.tumblr.com/share/link?url='.urlencode(get_permalink() ).'&name='.urlencode(get_bloginfo('name')).'&description='.urlencode(get_the_title()).'" title="Share on Tumblr">Tumblr</a></li>';
		$share_content .= '<li class="stumble"><a target="_blank" title="Share on StumbleUpon" rel="nofollow" href="http://www.stumbleupon.com/submit?url='.get_permalink().'">Stumble</a></li>';
		$share_content .= '<li class="digg"><a target="_blank" title="Share on Digg" rel="nofollow" href="http://www.digg.com/submit?phase=2&amp;url='.get_permalink().'">Digg</a></li>';
		$share_content .= '<li class="delicious"><a target="_blank" title="Share on Delicious" rel="nofollow" href="http://del.icio.us/post?url='.get_permalink().'&amp;title=INSERT_TITLE">Delicious</a></li>';
		$share_content .= '</ul></div>';
		endif;
	}
	return $share_content;
}

function add_sharing_homep($share_content) {
	// define options
if (get_option('soc_sharetext' ))		{ $sharetext = '<li class="sharetext">'.get_option('soc_sharetext').'</li>';		} else { $sharetext = NULL; }
if (get_option('soc_twitter_user' ))	{ $twitter_name = '&amp;via='.get_option('soc_twitter_user').'';					} else { $twitter_name = NULL; }
if (get_option('soc_twitter_rec' ))		{ $twitter_rec = '&amp;related='.get_option('soc_twitter_rec').'';					} else { $twitter_rec = NULL; }
	
	// build share box
	if( !is_single() && !is_page() ) {	
	global $post;
	if(empty($post->post_password)) :
		$share_content .= '<div id="simple_socialmedia"><ul class="ssm_row">';
		$share_content .= $sharetext;
		$share_content .= '<li class="twitter"><a target="_blank" href="http://twitter.com/share?url='.get_permalink().'&amp;text='.get_the_title().''.$twitter_name.''.$twitter_rec.'">Tweet</a></li>';
		$share_content .= '<li class="facebook"><a target="_blank" title="Share on Facebook" rel="nofollow" href="http://www.facebook.com/sharer.php?u='.get_permalink().'&amp;t='.get_the_title().'">Facebook</a></li>';
		$share_content .= '<li class="linkedin"><a target="_blank" title="Share on LinkedIn" rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'&amp;source='.get_bloginfo( 'name' ).'">LinkedIn</a></li>';
		$share_content .= '<li class="tumblr"><a target="_blank" title="Share on Tumblr" rel="nofollow" href="http://www.tumblr.com/share/link?url='.urlencode(get_permalink() ).'&name='.urlencode(get_bloginfo('name')).'&description='.urlencode(get_the_title()).'" title="Share on Tumblr">Tumblr</a></li>';
		$share_content .= '<li class="stumble"><a target="_blank" title="Share on StumbleUpon" rel="nofollow" href="http://www.stumbleupon.com/submit?url='.get_permalink().'">Stumble</a></li>';
		$share_content .= '<li class="digg"><a target="_blank" title="Share on Digg" rel="nofollow" href="http://www.digg.com/submit?phase=2&amp;url='.get_permalink().'">Digg</a></li>';
		$share_content .= '<li class="delicious"><a target="_blank" title="Share on Delicious" rel="nofollow" href="http://del.icio.us/post?url='.get_permalink().'&amp;title=INSERT_TITLE">Delicious</a></li>';
		$share_content .= '</ul></div>';
	endif;
	}
	return $share_content;

}