<?php
/**
* Plugin Name: Like
* Plugin URI: http://blog.bottomlessinc.com
* Description: Let your readers quickly share your content on Facebook with a simple click. The Like button is the new Facebook sharing button released on Apr. 21st 2010
* Version: 1.9.6
*
* Author: Bottomless
* Author URI: http://blog.bottomlessinc.com
*/

/*
* +--------------------------------------------------------------------------+
* | Copyright (c) 2010 Bottomless, Inc.                                      |
* +--------------------------------------------------------------------------+
* | This program is free software; you can redistribute it and/or modify     |
* | it under the terms of the GNU General Public License as published by     |
* | the Free Software Foundation; either version 2 of the License, or        |
* | (at your option) any later version.                                      |
* |                                                                          |
* | This program is distributed in the hope that it will be useful,          |
* | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
* | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
* | GNU General Public License for more details.                             |
* |                                                                          |
* | You should have received a copy of the GNU General Public License        |
* | along with this program; if not, write to the Free Software              |
* | Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA |
* +--------------------------------------------------------------------------+
*/

/*********************************************************************
 * File: tt_like_widget.php
 * Author: PlF
 * Contact: dev@bottomlessinc.com
 * Company: Bottomless, Inc. [http://www.bottomlessinc.com]
 * Date Created: Apr. 2010
 * Project Name: Facebook Like button Wordpress Widget
 * Description:
 *        Adds the new Facebook Like button to Wordpress blogs
 * Copyright � 2010 - Bottomless, Inc.
 *********************************************************************/

if (!defined('TT_LIKE_INIT')) define('TT_LIKE_INIT', 1);
else return;

$tt_like_settings = array();
$tt_like_settings['default_id'] = 'YOUR FACEBOOK ID';
$tt_like_settings['default_app_id'] = 'YOUR FACEBOOK APPLICATION ID';
$tt_like_settings['default_page_id'] = 'YOUR FACEBOOK PAGE ID';

// Pre-2.6 compatibility

$tt_like_layouts = array('standard', 'button_count', 'box_count');
$tt_like_verbs   = array('like', 'recommend');
$tt_like_colorschemes = array('light', 'dark');
$tt_like_aligns   = array('left', 'right');
$tt_like_types = array(
	'Activities', 'activity', 'sport',
	'Businesses', 'bar', 'company', 'cafe', 'hotel', 'restaurant',
	'Groups', 'cause', 'sports_league', 'sports_team',
	'Organizations', 'band', 'government', 'non_profit', 'school', 'university',
	'People', 'actor', 'athlete', 'author', 'director', 'musician', 'politician', 'public_figure',
	'Places', 'city', 'country', 'landmark', 'state_province',
	'Products and Entertainment', 'album', 'book', 'drink', 'food', 'game', 'movie', 'product', 'song', 'tv_show',
	'Websites', 'article', 'blog', 'website'
);
$tt_like_fonts= array(
	'', 'arial', 'lucida grande', 'segoe ui', 'tahoma', 'trebuchet ms', 'verdana'
);

if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

/**
* Returns major.minor WordPress version.
*/
function tt_get_wp_version() {
    return (float)substr(get_bloginfo('version'),0,3);
}


/**
* Formally registers Like settings. Only called in WP 2.7+.
*/
function tt_register_like_settings() {
    register_setting('tt_like', 'tt_like_width');
    register_setting('tt_like', 'tt_like_height');
    register_setting('tt_like', 'tt_like_layout');
    register_setting('tt_like', 'tt_like_verb');
    register_setting('tt_like', 'tt_like_colorscheme');
    register_setting('tt_like', 'tt_like_font');
    register_setting('tt_like', 'tt_like_align');
    register_setting('tt_like', 'tt_like_showfaces');
    register_setting('tt_like', 'tt_like_show_at_top');
    register_setting('tt_like', 'tt_like_show_at_bottom');
    register_setting('tt_like', 'tt_like_show_on_page');
    register_setting('tt_like', 'tt_like_show_on_post');
    register_setting('tt_like', 'tt_like_show_on_home');
    register_setting('tt_like', 'tt_like_show_on_search');
    register_setting('tt_like', 'tt_like_show_on_archive');
    register_setting('tt_like', 'tt_like_margin_top');
    register_setting('tt_like', 'tt_like_margin_bottom');
    register_setting('tt_like', 'tt_like_margin_left');
    register_setting('tt_like', 'tt_like_margin_right');
    register_setting('tt_like', 'tt_like_facebook_id');
    register_setting('tt_like', 'tt_like_facebook_image');
    register_setting('tt_like', 'tt_like_xfbml');
    register_setting('tt_like', 'tt_like_xfbml_async');
    register_setting('tt_like', 'tt_like_facebook_app_id');
    register_setting('tt_like', 'tt_like_facebook_page_id');

    register_setting('tt_like', 'tt_like_use_excerpt_as_description');
    register_setting('tt_like', 'tt_like_latitude');
    register_setting('tt_like', 'tt_like_longitude');
    register_setting('tt_like', 'tt_like_street_address');
    register_setting('tt_like', 'tt_like_locality');
    register_setting('tt_like', 'tt_like_region');
    register_setting('tt_like', 'tt_like_postal_code');
    register_setting('tt_like', 'tt_like_country_name');

    register_setting('tt_like', 'tt_like_email');
    register_setting('tt_like', 'tt_like_phone_number');
    register_setting('tt_like', 'tt_like_fax_number');

    register_setting('tt_like', 'tt_like_type');
}

/**
* Adds WP filter so we can append the Like button to post content.
*/
function tt_like_init()
{
    global $tt_like_settings;

    if (tt_get_wp_version() >= 2.7) {
        if ( is_admin() ) {
            add_action( 'admin_init', 'tt_register_like_settings' );
        }
    }

    add_filter('the_content', 'tt_like_widget');
    add_filter('admin_menu', 'tt_like_admin_menu');
    add_filter('language_attributes', 'tt_like_schema');

    add_option('tt_like_width', '450');
    add_option('tt_like_height', '30');
    add_option('tt_like_layout', 'standard');
    add_option('tt_like_verb', 'like');
    add_option('tt_like_font', '');
    add_option('tt_like_colorscheme', 'light');
    add_option('tt_like_align', 'left');
    add_option('tt_like_showfaces', 'false');
    add_option('tt_like_show_at_top', 'true');
    add_option('tt_like_show_at_bottom', 'true');
    add_option('tt_like_show_on_page', 'true');
    add_option('tt_like_show_on_post', 'true');
    add_option('tt_like_show_on_home', 'true');
    add_option('tt_like_show_on_search', 'false');
    add_option('tt_like_show_on_archive', 'false');
    add_option('tt_like_margin_top', '2');
    add_option('tt_like_margin_bottom', '2');
    add_option('tt_like_margin_left', '0');
    add_option('tt_like_margin_right', '0');
    add_option('tt_like_facebook_id', $tt_like_settings['default_id']);
    add_option('tt_like_facebook_image', '');
    add_option('tt_like_xfbml', 'false');
    add_option('tt_like_xfbml_async', 'false');
    add_option('tt_like_facebook_app_id',  $tt_like_settings['default_app_id']);
    add_option('tt_like_facebook_page_id', $tt_like_settings['default_page_id']);

    add_option('tt_like_use_excerpt_as_description', 'true');
    add_option('tt_like_latitude', '');
    add_option('tt_like_longitude', '');
    add_option('tt_like_street_address', '');
    add_option('tt_like_locality', '');
    add_option('tt_like_region', '');
    add_option('tt_like_postal_code', '');
    add_option('tt_like_country_name', '');

    add_option('tt_like_email', '');
    add_option('tt_like_phone_number', '');
    add_option('tt_like_fax_number', '');

    add_option('tt_like_type', 'article');

    $tt_like_settings['width'] = get_option('tt_like_width');
    $tt_like_settings['height'] = get_option('tt_like_height');
    $tt_like_settings['layout'] = get_option('tt_like_layout');
    $tt_like_settings['verb'] = get_option('tt_like_verb');
    $tt_like_settings['font'] = get_option('tt_like_font');
    $tt_like_settings['colorscheme'] = get_option('tt_like_colorscheme');
    $tt_like_settings['align'] = get_option('tt_like_align');
    $tt_like_settings['showfaces'] = get_option('tt_like_showfaces') === 'true';
    $tt_like_settings['showattop'] = get_option('tt_like_show_at_top') === 'true';
    $tt_like_settings['showatbottom'] = get_option('tt_like_show_at_bottom') === 'true';
    $tt_like_settings['showonpage'] = get_option('tt_like_show_on_page') === 'true';
    $tt_like_settings['showonpost'] = get_option('tt_like_show_on_post') === 'true';
    $tt_like_settings['showonfeed'] = get_option('tt_like_show_on_feed') === 'false';
    $tt_like_settings['showonhome'] = get_option('tt_like_show_on_home') === 'false';
    $tt_like_settings['showonsearch'] = get_option('tt_like_show_on_search') === 'true';
    $tt_like_settings['showonarchive'] = get_option('tt_like_show_on_archive') === 'true';
    $tt_like_settings['margin_top'] = get_option('tt_like_margin_top');
    $tt_like_settings['margin_bottom'] = get_option('tt_like_margin_bottom');
    $tt_like_settings['margin_left'] = get_option('tt_like_margin_left');
    $tt_like_settings['margin_right'] = get_option('tt_like_margin_right');
    $tt_like_settings['facebook_id'] = get_option('tt_like_facebook_id');
    $tt_like_settings['facebook_image'] = get_option('tt_like_facebook_image');
    $tt_like_settings['xfbml'] = get_option('tt_like_xfbml');
    $tt_like_settings['xfbml_async'] = get_option('tt_like_xfbml_async');
    $tt_like_settings['facebook_app_id'] = get_option('tt_like_facebook_app_id');
    $tt_like_settings['facebook_page_id'] = get_option('tt_like_facebook_page_id');
    $tt_like_settings['use_excerpt_as_description'] = get_option('tt_like_use_excerpt_as_description');

    $tt_like_settings['og'] =  array();

    $tt_like_settings['og']['latitude'] =  get_option('tt_like_latitude');
    $tt_like_settings['og']['longitude'] =  get_option('tt_like_longitude');
    $tt_like_settings['og']['street_address'] =  get_option('tt_like_street_address');
    $tt_like_settings['og']['locality'] =  get_option('tt_like_locality');
    $tt_like_settings['og']['region'] =  get_option('tt_like_region');
    $tt_like_settings['og']['postal_code'] =  get_option('tt_like_postal_code');
    $tt_like_settings['og']['country_name'] =  get_option('tt_like_country_name');

    $tt_like_settings['og']['email'] =  get_option('tt_like_email');
    $tt_like_settings['og']['phone_number'] =  get_option('tt_like_phone_number');
    $tt_like_settings['og']['fax_number'] =  get_option('tt_like_fax_number');

    $tt_like_settings['og']['type'] =  get_option('tt_like_type');


    add_action('wp_head', 'tt_like_widget_header_meta');
    add_action('wp_footer', 'tt_like_widget_footer');

    $plugin_path = plugin_basename( dirname( __FILE__ ) .'/languages' );
    load_plugin_textdomain( 'tt_like_trans_domain', '', $plugin_path );

}

function tt_like_schema($attr) {
	$attr .= "\n xmlns:og=\"http://opengraphprotocol.org/schema/\"";
	$attr .= "\n xmlns:fb=\"http://www.facebook.com/2008/fbml\"";

	return $attr;
}

function tt_like_widget_header_meta()
{
    global $tt_like_settings;

    $fbid = trim($tt_like_settings['facebook_id']);
    $fbappid = trim($tt_like_settings['facebook_app_id']);
    $fbpageid = trim($tt_like_settings['facebook_page_id']);

    if ($fbid != $tt_like_settings['default_id'] && $fbid!='') {
	echo '<meta property="fb:admins" content="'.$fbid.'" />'."\n";
    }
    if ($fbappid != $tt_like_settings['default_app_id'] && $fbappid!='') {
	echo '<meta property="fb:app_id" content="'.$fbappid.'" />'."\n";
    }
    if ($fbpageid != $tt_like_settings['default_page_id'] && $fbpageid!='') {
	echo '<meta property="fb:page_id" content="'.$fbpageid.'" />'."\n";
    }
    $image = trim($tt_like_settings['facebook_image']);
    if($image!='') {
	    echo '<meta property="og:image" content="'.$image.'" />'."\n";
    }
    echo '<meta property="og:site_name" content="'.htmlspecialchars(get_bloginfo('name')).'" />'."\n";
    if(is_single() || is_page()) {
	$title = the_title('', '', false);
	$php_version = explode('.', phpversion());
	if(count($php_version) && $php_version[0]>=5)
		$title = html_entity_decode($title,ENT_QUOTES,'UTF-8');
	else
		$title = html_entity_decode($title,ENT_QUOTES);
    	echo '<meta property="og:title" content="'.htmlspecialchars($title).'" />'."\n";
    	echo '<meta property="og:url" content="'.get_permalink().'" />'."\n";
	if($tt_like_settings['use_excerpt_as_description']=='true') {
    		$description = trim(get_the_excerpt());
		if($description!='')
		    	echo '<meta property="og:description" content="'.htmlspecialchars($description).'" />'."\n";
	}
    } else {
    	//echo '<meta property="og:title" content="'.get_bloginfo('name').'" />';
    	//echo '<meta property="og:url" content="'.get_bloginfo('url').'" />';
    	//echo '<meta property="og:description" content="'.get_bloginfo('description').'" />';
    }

    foreach($tt_like_settings['og'] as $k => $v) {
	$v = trim($v);
	if($v!='')
	    	echo '<meta property="og:'.$k.'" content="'.htmlspecialchars($v).'" />'."\n";
    }
}

function tt_like_widget_footer()
{
    global $tt_like_settings;

    if($tt_like_settings['xfbml']=='true') {
	$appids = trim($tt_like_settings['facebook_app_id']);
	$appids = explode(',', $appids);

	if(!count($appids))
		return;

	foreach($appids as $appid) {
		if(is_numeric($appid))
			break;
	}

	if(!is_numeric($appid))
		return;

	if($tt_like_settings['xfbml_async']=='true') {
echo <<<END
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: '$appid', status: true, cookie: true, xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script>
END;
	} else {

echo <<<END
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: '$appid', status: true, cookie: true, xfbml: true});
  };
</script>
END;
	}

    }
}

/**
* Appends Like button to post content.
*/
function tt_like_widget($content, $sidebar = false)
{
    global $tt_like_settings;

    if (is_feed() && !$tt_like_settings['showonfeed'])
	return $content;

    if(is_single() && !$tt_like_settings['showonpost'])
	return $content;

    if(is_page() && !$tt_like_settings['showonpage'])
	return $content;

    if(is_front_page() && !$tt_like_settings['showonhome'])
	return $content;

    if(is_search() && !$tt_like_settings['showonsearch'])
	return $content;

    if(is_archive() && !$tt_like_settings['showonarchive'])
	return $content;

    $purl = get_permalink();

    $button = "\n<!-- Facebook Like Button v1.9.6 BEGIN [http://blog.bottomlessinc.com] -->\n";

    $showfaces = ($tt_like_settings['showfaces']=='true')?"true":"false";

    $url = urlencode($purl);

    $separator = '&amp;';

    $url = $url . $separator . 'layout='  . $tt_like_settings['layout']
		. $separator . 'show_faces=' . $showfaces
		. $separator . 'width=' . $tt_like_settings['width']
		. $separator . 'action=' . $tt_like_settings['verb']
		. $separator . 'colorscheme=' . $tt_like_settings['colorscheme']
    ;

    $xfbml_font = '';
    if($tt_like_settings['font']!='') {
	$url .= $separator . 'font=' . urlencode($tt_like_settings['font']);
	$xfbml_font = ' font="'.$tt_like_settings['font'].'"';
    }

    $align = $tt_like_settings['align']=='right'?'right':'left';
    $margin = $tt_like_settings['margin_top'] . 'px '
		. $tt_like_settings['margin_right'] . 'px '
		. $tt_like_settings['margin_bottom'] . 'px '
		. $tt_like_settings['margin_left'] . 'px';

    if($tt_like_settings['xfbml']=='true') {
	$button .= '<fb:like href="'.$purl.'" layout="'.$tt_like_settings['layout'].'" show_faces="'.$showfaces.'" width="'.$tt_like_settings['width'].'" action="'.$tt_like_settings['verb'].'" colorscheme="'.$tt_like_settings['colorscheme'].'"'.$xfbml_font.'></fb:like>';
    } else {
	$button .= '<iframe src="http://www.facebook.com/plugins/like.php?href='.$url.'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:'.$tt_like_settings['width'].'px; height: '.$tt_like_settings['height'].'px; align: '.$align.'; margin: '.$margin.'"></iframe>';
    }

    if($align=='right') {
	$button = '<div style="float: right; clear: both; text-align: right">'.$button.'</div>';
    }

    $button .= "\n<!-- Facebook Like Button END -->\n";

    if($tt_like_settings['showattop']=='true')
	$content = $button.$content;

    if($tt_like_settings['showatbottom']=='true')
	    $content .= $button;

    return $content;
}

function tt_like_admin_menu()
{
    add_options_page('Like Plugin Options', 'Like', 8, __FILE__, 'tt_plugin_options');
}

function tt_plugin_options()
{
    global $tt_like_layouts;
    global $tt_like_verbs;
    global $tt_like_fonts;
    global $tt_like_colorschemes;
    global $tt_like_aligns;
    global $tt_like_types;

?>
    <table>
    <tr>
    <td>

    <div class="wrap">
    <h2>Facebook Like Button <small>by <a href="http://www.bottomlessinc.com" target="_blank">Bottomless</a></h2>

    <form method="post" action="options.php">
    <?php
        if (tt_get_wp_version() < 2.7) {
            wp_nonce_field('update-options');
        } else {
            settings_fields('tt_like');
        }
    ?>

    <table class="form-table">
        <tr valign="top">
            <th scope="row"><h3><?php _e("Appearance", 'tt_like_trans_domain' ); ?></h3></th>
	</tr>
        <tr valign="top">
            <th scope="row"><?php _e("Width:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_width" value="<?php echo get_option('tt_like_width'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Height:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_height" value="<?php echo get_option('tt_like_height'); ?>" /></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Layout:", 'tt_like_trans_domain' ); ?></th>
            <td>
                <select name="tt_like_layout">
                <?php
                    $curmenutype = get_option('tt_like_layout');
                    foreach ($tt_like_layouts as $type)
                    {
                        echo "<option value=\"$type\"". ($type == $curmenutype ? " selected":""). ">$type</option>";
                    }
                ?>
                </select>
        </tr>
        <tr>
            <th scope="row"><?php _e("Verb to display:", 'tt_like_trans_domain' ); ?></th>
            <td>
                <select name="tt_like_verb">
                <?php
                    $curmenutype = get_option('tt_like_verb');
                    foreach ($tt_like_verbs as $type)
                    {
                        echo "<option value=\"$type\"". ($type == $curmenutype ? " selected":""). ">$type</option>";
                    }
                ?>
                </select>
        </tr>
        <tr>
            <th scope="row"><?php _e("Font:", 'tt_like_trans_domain' ); ?></th>
            <td>
                <select name="tt_like_font">
                <?php
                    $curmenutype = get_option('tt_like_font');
                    foreach ($tt_like_fonts as $type)
                    {
                        echo "<option value=\"$type\"". ($type == $curmenutype ? " selected":""). ">$type</option>";
                    }
                ?>
                </select>
        </tr>
        <tr>
            <th scope="row"><?php _e("Color Scheme:", 'tt_like_trans_domain' ); ?></th>
            <td>
                <select name="tt_like_colorscheme">
                <?php
                    $curmenutype = get_option('tt_like_colorscheme');
                    foreach ($tt_like_colorschemes as $type)
                    {
                        echo "<option value=\"$type\"". ($type == $curmenutype ? " selected":""). ">$type</option>";
                    }
                ?>
                </select>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show Faces:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_showfaces" value="true" <?php echo (get_option('tt_like_showfaces') == 'true' ? 'checked' : ''); ?>/> <small><?php _e("Don't forget to increase the Height accordingly", 'tt_like_trans_domain' ); ?></small></td>
        </tr>
        <tr valign="top">
            <th scope="row"><h3><?php _e("Position", 'tt_like_trans_domain' ); ?></h3></th>
	</tr>
        <tr>
            <th scope="row"><?php _e("Align:", 'tt_like_trans_domain' ); ?></th>
            <td>
                <select name="tt_like_align">
                <?php
                    $curmenutype = get_option('tt_like_align');
                    foreach ($tt_like_aligns as $type)
                    {
                        echo "<option value=\"$type\"". ($type == $curmenutype ? " selected":""). ">$type</option>";
                    }
                ?>
                </select>
		<br /><small><?php _e("Don't forget to adjust the Width accordingly if you choose to align right", 'tt_like_trans_domain' ); ?></small>
		<br /><small>(<?php _e("ex: reduce the Width to 100px", 'tt_like_trans_domain' ); ?>)</small>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show at Top:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_show_at_top" value="true" <?php echo (get_option('tt_like_show_at_top') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show at Bottom:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_show_at_bottom" value="true" <?php echo (get_option('tt_like_show_at_bottom') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show on Page:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_show_on_page" value="true" <?php echo (get_option('tt_like_show_on_page') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show on Post:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_show_on_post" value="true" <?php echo (get_option('tt_like_show_on_post') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show on Home:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_show_on_home" value="true" <?php echo (get_option('tt_like_show_on_home') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show on Search:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_show_on_search" value="true" <?php echo (get_option('tt_like_show_on_search') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show on Archive:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_show_on_archive" value="true" <?php echo (get_option('tt_like_show_on_archive') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Show on Feed:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_show_on_feed" value="true" <?php echo (get_option('tt_like_show_on_feed') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Margin Top:", 'tt_like_trans_domain' ); ?></th>
            <td><input size="5" type="text" name="tt_like_margin_top" value="<?php echo get_option('tt_like_margin_top'); ?>" />px</td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Margin Bottom:", 'tt_like_trans_domain' ); ?></th>
            <td><input size="5" type="text" name="tt_like_margin_bottom" value="<?php echo get_option('tt_like_margin_bottom'); ?>" />px</td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Margin Left:", 'tt_like_trans_domain' ); ?></th>
            <td><input size="5" type="text" name="tt_like_margin_left" value="<?php echo get_option('tt_like_margin_left'); ?>" />px</td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Margin Right:", 'tt_like_trans_domain' ); ?></th>
            <td><input size="5" type="text" name="tt_like_margin_right" value="<?php echo get_option('tt_like_margin_right'); ?>" />px</td>
        </tr>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php _e("Facebook Admin Page", 'tt_like_trans_domain' ); ?><br /><small><?php _e("For Advanced users only"); ?><br /><?php _e("Be sure to read the Help and Support section below in case of problem", 'tt_like_trans_domain' ); ?></small></h3></th>
	</tr>
        <tr valign="top">
            <th scope="row"><?php _e("Numeric Facebook ID:", 'tt_like_trans_domain' ); ?><br /><small><?php _e("Your Facebook ID to manage your Fans and send them updates", 'tt_like_trans_domain' ); ?><br /><?php _e("If you have several, separate them with commas.", 'tt_like_trans_domain' ); ?></small></th>
            <td><input id="tt_like_fbids" type="text" size="35" name="tt_like_facebook_id" value="<?php echo get_option('tt_like_facebook_id'); ?>" /> <small><?php _e("Required if using XFBML", 'tt_like_trans_domain' ); ?><br /><?php _e("(ex: 68310606562 and not markzuckerberg)", 'tt_like_trans_domain' ); ?></small></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Image URL:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" size="60" name="tt_like_facebook_image" value="<?php echo get_option('tt_like_facebook_image'); ?>" /></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Use XFBML:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_xfbml" value="true" <?php echo (get_option('tt_like_xfbml') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr>
            <th scope="row"><?php _e("Load XFBML Asynchronously:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_xfbml_async" value="true" <?php echo (get_option('tt_like_xfbml_async') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Facebook App ID:", 'tt_like_trans_domain' ); ?><br /><small><?php _e("To get an App ID:", 'tt_like_trans_domain' ); ?> <a href="http://developers.facebook.com/setup/" target="_blank"><?php _e("Create an  App", 'tt_like_trans_domain' ); ?></a><br /><?php _e("If you have several, separate them with commas.", 'tt_like_trans_domain' ); ?></small></th>
            <td><input type="text" size="35" name="tt_like_facebook_app_id" value="<?php echo get_option('tt_like_facebook_app_id'); ?>" /> <small><?php _e("Required if using XFBML", 'tt_like_trans_domain' ); ?></small></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Facebook Page ID:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" size="35" name="tt_like_facebook_page_id" value="<?php echo get_option('tt_like_facebook_page_id'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php _e("Open Graph Options", 'tt_like_trans_domain' ); ?><br /><small><?php _e("For more information:", 'tt_like_trans_domain' ); ?> <a href="http://opengraphprotocol.org" target="_blank">http://opengraphprotocol.org</a></small></h3></th>
	</tr>
        <tr>
            <th scope="row"><?php _e("Use Excerpt as Description:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="checkbox" name="tt_like_use_excerpt_as_description" value="true" <?php echo (get_option('tt_like_use_excerpt_as_description') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Latitude:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_latitude" value="<?php echo get_option('tt_like_latitude'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Longitude:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_longitude" value="<?php echo get_option('tt_like_longitude'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Street Address:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_street_address" value="<?php echo get_option('tt_like_street_address'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Locality:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_locality" value="<?php echo get_option('tt_like_locality'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Region:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_region" value="<?php echo get_option('tt_like_region'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Postal Code:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_postal_code" value="<?php echo get_option('tt_like_postal_code'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Country:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_country_name" value="<?php echo get_option('tt_like_country_name'); ?>" /></td>
        </tr>

        <tr valign="top">
            <th scope="row"><?php _e("Email:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_email" value="<?php echo get_option('tt_like_email'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Phone:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_phone_number" value="<?php echo get_option('tt_like_phone_number'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("Fax:", 'tt_like_trans_domain' ); ?></th>
            <td><input type="text" name="tt_like_fax_number" value="<?php echo get_option('tt_like_fax_number'); ?>" /></td>
        </tr>

        <tr>
            <th scope="row"><?php _e("Type:", 'tt_like_trans_domain' ); ?></th>
            <td>
                <select name="tt_like_type">
                <?php
                    $curmenutype = get_option('tt_like_type');
                    foreach ($tt_like_types as $type)
                    {
			if(strtolower($type)==$type)
	                        echo "<option value=\"$type\"". ($type == $curmenutype ? " selected":""). ">$type</option>";
			else
	                        echo "<option value=\"\">-- $type --</option>";
                    }
                ?>
                </select>
        </tr>

        <tr valign="top">
            <th scope="row"><h3><?php _e("Help and Support", 'tt_like_trans_domain' ); ?></h3></th>
	</tr>
        <tr>
            <th scope="row" colspan="2">1/ <a href="http://wordpress.org/extend/plugins/like/faq" target="_blank"><?php _e("Check the FAQ", 'tt_like_trans_domain' ); ?></a></th>
	</tr>
        <tr>
            <th scope="row" colspan="2">2/ <a href="http://blog.bottomlessinc.com/2010/04/creating-a-wordpress-plugin-add-the-new-facebook-like-button-to-your-posts/" target="_blank"><?php _e("Read the Plugin Homepage and its comments", 'tt_like_trans_domain' ); ?></a></th>
        </tr>
    </table>

    <?php if (tt_get_wp_version() < 2.7) : ?>
    	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="tt_like_width, tt_like_height, tt_like_layout, tt_like_verb, tt_like_font, tt_like_colorscheme, tt_like_align, tt_like_showfaces, tt_like_show_at_top, tt_like_show_at_bottom, tt_like_show_on_page, tt_like_show_on_post, tt_like_show_on_feed, tt_like_show_on_home, tt_like_show_on_search, tt_like_show_on_archive, tt_like_margin_top, tt_like_margin_bottom, tt_like_margin_left, tt_like_margin_right, tt_like_facebook_id, tt_like_facebook_image, tt_like_xfbml, tt_like_xfbml_async, tt_like_use_excerpt_as_description, tt_like_facebook_app_id, tt_like_facebook_page_id, tt_like_latitude, tt_like_longitude, tt_like_street_address, tt_like_locality, tt_like_region, tt_like_postal_code, tt_like_country_name, tt_like_email, tt_like_phone_number, tt_like_fax_number, tt_like_type" />
    <?php endif; ?>
    <p class="submit">
    <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
    </p>

    </form>
    </div>

    </td>
    <td>
	<div style='background: #ffc; border: 1px solid #333; margin: 2px; padding: 5px'>
	<h3 align='center'><?php _e( 'Support Like', 'tt_like_trans_domain' ); ?></h3>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="N8EYVY36H2P6G">
		<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
    </td>
    </tr>
    </table>
<?php
}

tt_like_init();
?>
