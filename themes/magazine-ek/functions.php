<?php

$themename = "Magazine Basic";
$themefile = "magazine_basic";
$shortname = "uwc";

load_theme_textdomain( 'magazine-basic', TEMPLATEPATH.'/languages' );

$options = array (
	
	array(	"name" => __("Site Width", "magazine-basic"),
			"desc" => __("Select the width of your site.", "magazine-basic"),
			"id" => $shortname."_site_width",
			"default" => "800",
			"type" => "site"),
			
	array(	"name" => __("Number of Sidebars", "magazine-basic"),
			"desc" => __("How many sidebars would you like?", "magazine-basic"),
            "id" => $shortname."_site_sidebars",
			"default" => "1",
            "type" => "sidebars"),
	
	array(  "name" => __("First Sidebar Width", "magazine-basic"),
			"desc" => __("What would you like your first sidebar width to be?", "magazine-basic"),
            "id" => $shortname."_sidebar_width1",
			"default" => "180",
            "type" => "left"),
			
	array(  "name" => __("Second Sidebar Width", "magazine-basic"),
			"desc" => __("What would you like your second sidebar width to be?", "magazine-basic"),
            "id" => $shortname."_sidebar_width2",
			"default" => "180",
            "type" => "right"),

	array(  "name" => __("Sidebar Location", "magazine-basic"),
			"desc" => __("Where would you like your sidebars located?", "magazine-basic"),
            "id" => $shortname."_sidebar_location",
			"default" => "1",
            "type" => "location"),

	array(  "name" => __("Header Logo", "magazine-basic"),
			"desc" => __("If you would like to display a logo in the header, please enter the file path above.", "magazine-basic"),
            "id" => $shortname."_logo_header",
            "type" => "logo"),	
			
	array(  "name" => __("Logo or Blog Name Location", "magazine-basic"),
			"desc" => __("Where do you want your Logo or Blog Name located?", "magazine-basic"),
            "id" => $shortname."_logo_location",
			"default" => "1",
            "type" => "logo-location"),	
			
	array(  "name" => __("User Login", "magazine-basic"),
			"desc" => __("Would you like to have a User Login section at the top of your site?", "magazine-basic"),
            "id" => $shortname."_user_login",
			"default" => "1",
            "type" => "login"),

	array(  "name" => __("Post Layout", "magazine-basic"),
			"desc" => __("How would you like your posts displayed on the front page?", "magazine-basic"),
            "id" => $shortname."_post_layout",
			"default" => "3",
            "type" => "post-layout"),

	array(  "name" => __("Categories", "magazine-basic"),
			"desc" => __('Which Categories would you like to include in the nav menu? Enter the Category IDs separated by commas or "all" to display all Categories.', "magazine-basic"),
            "id" => $shortname."_category_include",
            "type" => "categories"),
			
	array(  "name" => __("Pages", "magazine-basic"),
			"desc" => __('Which Pages would you like to include in the nav menu? Enter the Page IDs separated by commas or "all" to display all Pages.', "magazine-basic"),
            "id" => $shortname."_pages_include",
            "type" => "pages"),			

	array(  "name" => __("Display Dates", "magazine-basic"),
			"desc" => __("Would you like to have dates displayed under your post titles?", "magazine-basic"),
            "type" => "dates"),

	array(  "id" => "uwc_dates_index",
			"default" => "on"),
	array(  "id" => "uwc_dates_cats",
			"default" => "on"),
	array(  "id" => "uwc_dates_posts",
			"default" => "on"),
			
	array(  "name" => __("Display Authors", "magazine-basic"),
			"desc" => __("Would you like to have the author displayed under your post titles?", "magazine-basic"),
            "type" => "authors"),

	array(  "id" => "uwc_authors_index",
			"default" => "on"),
	array(  "id" => "uwc_authors_cats",
			"default" => "on"),
	array(  "id" => "uwc_authors_posts",
			"default" => "on"),			

	array(  "name" => __("Number of Posts", "magazine-basic"),
			"desc" => __("How many posts would you like to appear on the front page?", "magazine-basic"),
            "id" => $shortname."_number_posts",
			"default" => "6",
            "type" => "posts"),

	array(  "name" => __("Excerpt or Content", "magazine-basic"),
			"desc" => __("Do want to display the excerpt or the content on the front page?", "magazine-basic"),
            "id" => $shortname."_excerpt_content",
			"default" => 1,
            "type" => "exorcon"),

	array(  "name" => __("Excerpt Word Limit", "magazine-basic"),
			"desc" => __("How many words do you want to appear in your front page post excerpts? (max. 55)", "magazine-basic"),
            "type" => "excerpts"),

	array(  "id" => "uwc_excerpt_one",
			"default" => "55"),
	array(  "id" => "uwc_excerpt_two",
			"default" => "0"),
	array(  "id" => "uwc_excerpt_three",
			"default" => "0"),

	array(  "name" => __("Site Description", "magazine-basic"),
			"desc" => __("Add a site description here. NOTE: Content is used as a description on individual posts and pages.", "magazine-basic"),
            "id" => $shortname."_site_description",
            "type" => "site-description"),

	array(  "name" => __("Keywords", "magazine-basic"),
			"desc" => __("Add site specific keywords here, separated by commas. NOTE: Tags are used as keywords on individual post pages.", "magazine-basic"),
            "id" => $shortname."_keywords",
            "type" => "keywords"),
				
	array(  "name" => __("Google Analytics", "magazine-basic"),
			"desc" => __("Add your Google Analytics code here.", "magazine-basic"),
            "id" => $shortname."_google_analytics",
            "type" => "google"),
			
	array(  "id" => $shortname."_header_ad",
			"default" => "off"),

	array(  "name" => __("Display Date in Nav-Bar", "magazine-basic"),
			"desc" => __("Would you like to display the date in the nav-bar?", "magazine-basic"),
            "id" => $shortname."_nav_date",
			"default" => "1",
            "type" => "nav-date"),
	
	array(  "name" => __("Header Ad", "magazine-basic"),
			"desc" => __("Add your 468 x 60 header ad image and link here. NOTE: A Header Ad won't be shown if Centered is selected for the Logo or Blog Name location.", "magazine-basic"),
            "id" => $shortname."_headerad_img",
            "type" => "header-ad"),			

	array(  "id" => $shortname."_headerad_link"),
	
	array(  "name" => __('Display "Latest Story"', "magazine-basic"),
			"desc" => __('Would you like to display the "Latest Story" header on the front page?', "magazine-basic"),
            "id" => $shortname."_latest_story",
			"default" => "on",
            "type" => "latest"),
			
	array(  "name" => __("Image Resizer", "magazine-basic"),
			"desc" => __("Would you like to have images automatically resized?", "magazine-basic"),
            "id" => $shortname."_image_resizer",
			"default" => "off",
            "type" => "resizer"),

	array(  "name" => __("CSS", "magazine-basic"),
			"desc" => __("Add any CSS styles above. NOTE: Any modifications made to style.css directly will be overwritten when updating the theme so make your modifications here.", "magazine-basic"),
            "id" => $shortname."_css_styles",
            "type" => "css")													
);

add_action('admin_head', 'wp_admin_js');

function wp_admin_js() {
	global $themename;
	if(stristr($_REQUEST['page'], $themename)) { 
		wp_enqueue_script("jquery");
		echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/admin/js/jquery.jqtransform.js" ></script>'."\n";
		echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/admin/style.css" />';
		echo "
<script type=\"text/javascript\">
jQuery(function() {
    //find all form with class jqtransform and apply the plugin
    jQuery(\"form.jqtransform\").jqTransform();
	jQuery(\"form.jqtransform\").fadeIn(500);
});
</script>
";
	}
	if(stristr($_REQUEST['page'], $themename.'-Layout')) { 
		echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/admin/js/basic.js"></script>'."\n";
	}
	if(stristr($_REQUEST['page'], $themename.'-Front-Page')) { 
		echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/admin/js/front.js"></script>'."\n";
	}	
}

function uwc_head() {
// include the dynamic css styles
include(TEMPLATEPATH.'/style.php'); 
}
add_action('wp_head', 'uwc_head');

function mytheme_add_admin() {

    global $themename, $themefile, $shortname, $options;
    if (stristr($_REQUEST['page'], $themename)) {

        if ( 'save' == $_REQUEST['action']) {
				
                foreach ($options as $value) {
                    if( !isset( $_REQUEST[ $value['id'] ]) ) {  } else { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } }
					if(get_option( $shortname.'_excerpt_one') > 55) { update_option($shortname.'_excerpt_one', '55'); }
					if(get_option($shortname.'_excerpt_two') > 55) { update_option($shortname.'_excerpt_two', '55'); }
					if(get_option($shortname.'_excerpt_three') > 55) { update_option($shortname.'_excerpt_three', '55'); }
				if(stristr($_SERVER['REQUEST_URI'],'&saved=true')) {
					$location = $_SERVER['REQUEST_URI'];
					} else {
					$location = $_SERVER['REQUEST_URI'] . "&saved=true";		
					}
						
                header("Location: $location");
				die;
        } 
    }
	// Set all default options
	foreach ($options as $default) {
		if(get_option($default['id'])=="") {
			update_option($default['id'],$default['default']);
		}
	}
	 /*
	// Delete all default options
	foreach ($options as $default) {
		delete_option($default['id'],$default['default']);
	}
	 */
	
	add_menu_page($themename, $themename, 10, $themename, $themefile);
	add_submenu_page($themename, "$themename - Info", __("Info", "magazine-basic"), 10, $themename, $themefile);
	add_submenu_page($themename, "$themename - Layout", __("Layout", "magazine-basic"), 10, $themename.'-Layout', 'mb_layout');
	add_submenu_page($themename, "$themename - Header", __("Header &amp; Footer", "magazine-basic"), 10, $themename.'-Header', 'mb_header');
	add_submenu_page($themename, "$themename - Front Page", __("Front Page", "magazine-basic"), 10, $themename.'-Front-Page', 'mb_frontpage');
	add_submenu_page($themename, "$themename - SEO", __("SEO", "magazine-basic"), 10, $themename.'-SEO', 'mb_seo');
	add_submenu_page($themename, "$themename - CSS", __("CSS", "magazine-basic"), 10, $themename.'-CSS', 'mb_css');
}

// HTML for top of admin pages
function admin_pages_top() {
?>
<form method="post" class="jqtransform" id="myForm" action="">
<div id="poststuff" class="metabox-holder has-right-sidebar">

<div id="side-info-column" class="inner-sidebar">
<div id='side-sortables' class='meta-box-sortables'>
<div id="linksubmitdiv" class="postbox " >
<h3><?php _e("Current Saved Settings", "magazine-basic"); ?></h3>
<div class="inside">
<div class="submitbox" id="submitlink">

<div id="minor-publishing">
	<ul style="padding:10px 0 0 5px;">
<?php
}

// HTML for middle of admin pages
function admin_pages_middle() {
?>
	</ul>
<div id="major-publishing-actions">

<div id="publishing-action">
	<input name="save" type="submit" value="<?php _e("Save Changes", "magazine-basic"); ?>" />    
	<input type="hidden" name="action" value="save" />
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>

</div>
</div>
</div><a href="http://themes.bavotasan.com" target="_blank"><img src="<?php bloginfo('template_url'); ?>/admin/images/brand.png" class="bavota" alt="Designed by c.bavota" /></a></div></div>

<div id="post-body" class="has-sidebar">
<div id="post-body-content" class="has-sidebar-content">
<?php
}

######################################
## Display the info page ###
######################################

function magazine_basic() { 
     global $themename, $shortname, $options;
?>
<div class="wrap">
<h2><?php echo $themename." ".__("Settings", "magazine-basic")." - ".__("Info", "magazine-basic"); ?></h2>
<img src="<?php bloginfo('template_url'); ?>/admin/images/theme.png" alt="<?php echo $themename; ?>" class="theme" />
<?php
printf(__("<p>Thanks for downloading <strong>%s</strong>. Hope you enjoy using it!</p>
<p>There are tons of layout possibilities available with this theme, as well as a bunch of cool features that will surely help you get your site looking and working it's best.</p>", "magazine-basic"), $themename);
printf(__("<p>A lot of hard work went in to programming and designing <strong>%s</strong>, and if you would like to support c.bavota (the guy who built it) please use the donate link below. Any amount, even $1.00, is appreciated (a man's gotta eat, ya know).</p>", "magazine-basic"), $themename);
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="5745952" />
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" />
<img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
</form>
<?php _e('<p>If you have any questions, comments, or if you encounter a bug, please <a href="http://tinkerpriestmedia.com/contact/">contact me</a>.</p>
', "magazine-basic"); ?>
<br style="clear: left;" />
<hr class="mbdotted" />
<h3 class="mbinstructions"><?php _e('INSTRUCTIONS', "magazine-basic"); ?></h3>
<p class="mbclear"><?php _e("<h4>1. Header Logo</h4>", "magazine-basic");
printf(__('To add a logo to the header, you need to upload the image through the WordPress uploader or through FTP. Once the image is uploaded, copy the file path, which should look like <code>http://www.yoursite.com/your-image.jpg</code>, and paste it into the <em>Header Logo</em> field on the <a href="admin.php?page=%s-Header">Header &amp; Footer</a> page.', "magazine-basic"), $themename); ?></p>
<?php _e("<h4>2. Header Ad</h4>", "magazine-basic"); ?>
<p><?php printf(__('To add an advertisement banner to the header, first you need to upload the banner through the WordPress uploader or through FTP. Once the banner is uploaded, copy the file path, which should look like <code>http://www.yoursite.com/your-image.jpg</code>, and paste it into the <em>Header Ad - Path to  Ad Image</em> field on the <a href="admin.php?page=%s-Header">Header &amp; Footer</a> page. Then add your click-through link to the <em>Header Ad - Click-through Link</em> field. Both fields are needed to make the ad display. NOTE: AdSense or any ad script will not work through the <em>Header Ad</em> panel.', "magazine-basic"), $themename); ?></p>
<?php _e("<h4>3. Post Subtitle</h4>", "magazine-basic"); ?>
<p><?php _e('If you would like to add a <strong>Subtitle</strong> to your post, it is pretty simple. Just create a custom field with the name "subtitle" (a) and place the text you want as the value (b) then click "Add Custom Field" (c). The <strong>Subtitle</strong> will be displayed beneath the main title on the front page, category page and single post page.', "magazine-basic"); ?></p>
<img src="<?php bloginfo('template_url'); ?>/admin/images/custom.png" alt="Add Custom Field" />
<?php _e("<h4>4. Pull Quote</h4>", "magazine-basic"); ?>
<p><?php _e('To add a <strong>Pull Quote</strong> to you post, enter the HTML editor and surround the selected text with <code>&lt;div class="pullquote"&gt; &lt;/div&gt;</code>. NOTE: The blockquote tag use to be used to style a pull quote but that has been changed since version 2.5.', "magazine-basic"); ?></p>
<?php _e("<h4>5. Image Resizer</h4>", "magazine-basic"); ?>
<p><?php printf(__('First, make sure to set the permissions of the cache folder in the theme\'s directory to 0755. Then turn on the Image Resizer on the <a href="admin.php?page=%s-Layout">Layout page</a>. ICropped images should now appear on your front page and category pages. If images only appear on the single post page, please go here to troubleshoot: <a href="http://code.google.com/p/timthumb/issues/detail?id=8">http://code.google.com/p/timthumb/issues/detail?id=8</a> or just keep the Image Resizer turned off.', "magazine-basic"), $themename); ?></p>
</div>

<?php 
}

######################################
## Display the layout options page ###
######################################

function mb_layout() { 
    global $themename, $shortname, $options;
?>
<div class="wrap">
<h2><?php echo $themename." ".__("Settings", "magazine-basic")." - ".__("Layout", "magazine-basic"); ?></h2>
<?php
if ( $_REQUEST['saved']) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__("Settings Saved", "magazine-basic").'</strong></p></div>';
?>
<?php admin_pages_top(); // Display the HTML for the top of admin pages ?>
        <li><?php _e('Site Width', "magazine-basic"); ?>: <strong><?php echo get_option('uwc_site_width'); ?>px</strong></li>
        <li><?php _e('Number of Sidebars', "magazine-basic"); ?>: <strong><?php echo get_option('uwc_site_sidebars'); ?></strong></li>
        <?php if (get_option('uwc_site_width') == "1024") { ?>
        <li><?php _e('First Sidebar Width', "magazine-basic"); ?>: <strong><?php echo get_option('uwc_sidebar_width1'); ?>px</strong></li>
        <?php if (get_option('uwc_site_sidebars') == "2") { ?>
        <li><?php _e('Second Sidebar Width', "magazine-basic"); ?>: <strong><?php echo get_option('uwc_sidebar_width2'); ?>px</strong></li>
        <?php } ?>
        <?php } ?>
        <li><?php _e('Sidebar Location', "magazine-basic"); ?>: <strong>
		<?php
			if(get_option('uwc_sidebar_location') == "1" || get_option('uwc_sidebar_location') == "2") {
				$barbar = true; 
			}
			if(get_option('uwc_site_sidebars') == "1" && $barbar != true) {
				echo "<span style='color:#ff0000;'>".__('Undefined', "magazine-basic")."</span>";
			} elseif(get_option('uwc_site_sidebars') == "2" && $barbar == true) { 
				echo "<span style='color:#ff0000;'>".__('Undefined', "magazine-basic")."</span>";
			} else {
				if(get_option('uwc_sidebar_location') == "3" || get_option('uwc_sidebar_location') == "1") { _e("Left", "magazine-basic"); } elseif(get_option('uwc_sidebar_location') == "2" || get_option('uwc_sidebar_location') == "4") { 
					_e("Right", "magazine-basic"); 
				} else {
					_e("Separate", "magazine-basic"); 
				}
			}
		?>
        </strong></li>
        <li><?php _e("Display Dates", "magazine-basic"); ?>: <strong><?php if(get_option('uwc_dates_index') == 'on') _e("Front ", "magazine-basic")." "; if(get_option('uwc_dates_cats') == 'on') _e("Cats ", "magazine-basic")." "; if(get_option('uwc_dates_posts') == 'on') _e("Posts", "magazine-basic"); ?></strong></li>
        <li><?php _e("Display Authors", "magazine-basic"); ?>: <strong><?php if(get_option('uwc_authors_index') == 'on') _e("Front ", "magazine-basic")." "; if(get_option('uwc_authors_cats') == 'on') _e("Cats ", "magazine-basic")." "; if(get_option('uwc_authors_posts') == 'on') _e("Posts", "magazine-basic"); ?></strong></li>
        <li><?php _e("Image Resizer", "magazine-basic"); ?>: <strong><?php if(get_option('uwc_image_resizer') == 'on') { _e("Activated", "magazine-basic"); } else { _e("Off", "magazine-basic"); }  ?></strong></li>

<?php admin_pages_middle(); // Display the HTML for the middle of admin pages ?>
<?php
foreach ($options as $value) { 
	switch ( $value['type']) {

		case "site":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
                <input  name="<?php echo $value['id']; ?>" type="radio" value="800"<?php if(get_option( $value['id']) == "800") { echo ' checked="checked"'; } ?> /><label>800px</label>
                <input  name="<?php echo $value['id']; ?>" type="radio" value="1024"<?php if(get_option( $value['id']) == "1024") { echo ' checked="checked"'; } ?> /><label>1024px</label>
                <p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>

		<?php 
		break;
		
		case "sidebars":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
                <input  name="<?php echo $value['id']; ?>" type="radio" value="1"<?php if(get_option( $value['id']) == "1") { echo ' checked="checked"'; } ?> /><label>1</label>
                <input  name="<?php echo $value['id']; ?>" type="radio" value="2"<?php if(get_option( $value['id']) == "2") { echo ' checked="checked"'; } ?> /><label>2</label>
                <p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php 
		break;
		
		case "left":
		?>
		<div id="leftWidth">
			<div class="stuffbox">
				<h3><?php echo $value['name']; ?></h3>
				<div class="inside">
                	<input  name="<?php echo $value['id']; ?>" type="radio" value="180"<?php if(get_option( $value['id']) == "180") { echo ' checked="checked"'; } ?> /><label>180px</label>
                    <input  name="<?php echo $value['id']; ?>" type="radio" value="360"<?php if(get_option( $value['id']) == "360") { echo ' checked="checked"'; } ?> /><label>360px</label>
					<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
				</div>
			</div>
		</div>
		<?php
		break;
		   
		case "right":
		?>
		<div id="rightWidth">
			<div class="stuffbox">
				<h3><?php echo $value['name']; ?></h3>
				<div class="inside">
                	<input  name="<?php echo $value['id']; ?>" type="radio" value="180"<?php if(get_option( $value['id']) == "180") { echo ' checked="checked"'; } ?> /><label>180px</label>
                    <input  name="<?php echo $value['id']; ?>" type="radio" value="360"<?php if(get_option( $value['id']) == "360") { echo ' checked="checked"'; } ?> /><label>360px</label>
					<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
				</div>
			</div>
		</div>           
		<?php
		break;

		case "location":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
            <div class="inside">
                <div id="oneSidebar">
                    <table>
                        <tr>
                            <td style="padding-right: 15px;">
                                <img src="<?php bloginfo('template_url'); ?>/admin/images/oneleft.png" alt="One Left" />
                            </td>
                            <td style="padding-right: 15px;">
                                <img src="<?php bloginfo('template_url'); ?>/admin/images/oneright.png" alt="One Right" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding-right: 15px;">
                                <input  name="<?php echo $value['id']; ?>" type="radio" value="1"<?php if(get_option( $value['id']) == "1") { echo ' checked="checked"'; } ?> />
                            </td>
                            <td align="center" style="padding-right: 15px;">
                                <input  name="<?php echo $value['id']; ?>" type="radio" value="2"<?php if(get_option( $value['id']) == "2") { echo ' checked="checked"'; } ?> />
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="twoSidebar">
                    <table>
                        <tr>
                            <td style="padding-right: 15px;">
                                <img src="<?php bloginfo('template_url'); ?>/admin/images/twoleft.png" alt="" />
                            </td>
                            <td style="padding-right: 15px;">
                                <img src="<?php bloginfo('template_url'); ?>/admin/images/tworight.png" alt="" />
                            </td>
                            <td style="padding-right: 15px;">
                                <img src="<?php bloginfo('template_url'); ?>/admin/images/twoseparate.png" alt="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding-right: 15px;">
                                <input  name="<?php echo $value['id']; ?>" type="radio" value="3"<?php if(get_option( $value['id']) == "3") { echo ' checked="checked"'; } ?> />
                            </td>
                            <td align="center" style="padding-right: 15px;">
                                <input  name="<?php echo $value['id']; ?>" type="radio" value="4"<?php if(get_option( $value['id']) == "4") { echo ' checked="checked"'; } ?> />
                            </td>
                            <td align="center" style="padding-right: 15px;">
                                <input  name="<?php echo $value['id']; ?>" type="radio" value="5"<?php if(get_option( $value['id']) == "5") { echo ' checked="checked"'; } ?> />
                            </td>
                        </tr>
                    </table>
                </div>
                <p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;		

		case "dates":
		?>
        
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<input  name="uwc_dates_index" type="hidden" value="off" />
            	<input  name="uwc_dates_index" type="checkbox" <?php if(get_option("uwc_dates_index") == "on") { echo ' checked="checked"'; } ?> /><label><?php _e("Front Page", "magazine-basic"); ?></label>
            	<input  name="uwc_dates_cats" type="hidden" value="off" />             
                <input  name="uwc_dates_cats" type="checkbox" <?php if(get_option("uwc_dates_cats") == "on") { echo ' checked="checked"'; } ?> /><label><?php _e("Categories, Archives, Search Pages", "magazine-basic"); ?></label>
             	<input  name="uwc_dates_posts" type="hidden" value="off" />
                <input  name="uwc_dates_posts" type="checkbox" <?php if(get_option("uwc_dates_posts") == "on") { echo ' checked="checked"'; } ?> /><label><?php _e("Posts", "magazine-basic"); ?></label>
			<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;

		case "authors":
		?>
        
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<input  name="uwc_authors_index" type="hidden" value="off" />
            	<input  name="uwc_authors_index" type="checkbox" <?php if(get_option("uwc_authors_index") == "on") { echo ' checked="checked"'; } ?> /><label><?php _e("Front Page", "magazine-basic"); ?></label>
            	<input  name="uwc_authors_cats" type="hidden" value="off" />             
                <input  name="uwc_authors_cats" type="checkbox" <?php if(get_option("uwc_authors_cats") == "on") { echo ' checked="checked"'; } ?> /><label><?php _e("Categories, Archives, Search Pages", "magazine-basic"); ?></label>
             	<input  name="uwc_authors_posts" type="hidden" value="off" />
                <input  name="uwc_authors_posts" type="checkbox" <?php if(get_option("uwc_authors_posts") == "on") { echo ' checked="checked"'; } ?> /><label><?php _e("Posts", "magazine-basic"); ?></label>
			<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;

		case "resizer":
		?>
        
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<input  name="<?php echo $value['id']; ?>" type="hidden" value="off" />
            	<input  name="<?php echo $value['id']; ?>" type="checkbox" <?php if(get_option($value['id']) == "on") { echo ' checked="checked"'; } ?> /><label><?php _e('Activate Image Resizer', "magazine-basic"); ?></label>
			<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;
	} 
}
	?>
</div></div>
</div>
</form>
</div>
<?php
}

######################################
## Display the header options page ###
######################################

function mb_header() {
    global $themename, $shortname, $options;
?>
<div class="wrap">
<h2><?php echo $themename." ".__("Settings", "magazine-basic")." - ".__("Header &amp; Footer", "magazine-basic"); ?></h2>
<?php
if ( $_REQUEST['saved']) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__("Settings Saved", "magazine-basic").'</strong></p></div>';
?>
<?php admin_pages_top(); // Display the HTML for the top of admin pages ?>
        <li><?php _e('Header Logo', "magazine-basic"); ?>: <strong><?php if(get_option('uwc_logo_header')) { _e('Yes', "magazine-basic"); } else { _e('No', "magazine-basic"); } ?></strong></li>
        <li><?php _e('Logo or Blog Name Location', "magazine-basic"); ?>: <strong><?php if(get_option('uwc_logo_location')==1) { _e('Left', "magazine-basic"); } elseif(get_option('uwc_logo_location')==2) { _e('Right', "magazine-basic"); } else { _e('Centered', "magazine-basic"); } ?></strong></li>
        <li><?php _e('Categories', "magazine-basic"); ?>: <strong><?php if(get_option($shortname.'_category_include')) { _e('Added', "magazine-basic"); } else { echo '<span style="color:#ff0000;">'.__('Not Added', "magazine-basic").'</span>'; } ?></strong></li>
        <li><?php _e('Pages', "magazine-basic"); ?>: <strong><?php if(get_option($shortname.'_pages_include')) { _e('Added', "magazine-basic"); } else { echo '<span style="color:#ff0000;">'.__('Not Added', "magazine-basic").'</span>'; } ?></strong></li>
       <li><?php _e('User Login', "magazine-basic"); ?>: <strong><?php if(get_option('uwc_user_login') ==1) { _e('Yes', "magazine-basic"); } else { _e('No', "magazine-basic"); } ?></strong></li>
       <li><?php _e('Date in Nav-Bar', "magazine-basic"); ?>: <strong><?php if(get_option('uwc_nav_date') ==1) { _e('Yes', "magazine-basic"); } else { _e('No', "magazine-basic"); } ?></strong></li>
       <li><?php _e('Header Ad', "magazine-basic"); ?>: <strong><?php if(get_option('uwc_logo_location')=='middle') { _e('Not Available', "magazine-basic"); } elseif(get_option('uwc_header_ad') == 'on') { _e('On', "magazine-basic"); } else { _e('Off', "magazine-basic"); } ?></strong></li>

<?php admin_pages_middle(); // Display the HTML for the middle of admin pages ?>
<?php
foreach ($options as $value) { 
	switch ( $value['type']) {

		case "logo":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
				<input type="text" size="50" name="<?php echo $value['id']; ?>" value="<?php echo get_option($value['id']); ?>" />
				<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
                    <?php 
				  	$logofile = get_option($value['id']);
					if($logofile) { echo '<div><img src="'; echo $logofile; echo '" style="margin-top:10px;border:1px solid #aaa;padding:10px;" alt="" /></div>'; }
					?> 
	    	</div>
		</div>
		<?php
		break;
		
		case "logo-location":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
				<table>
					<tr>
						<td style="padding-right: 15px;">
							<img src="<?php bloginfo('template_url'); ?>/admin/images/logoleft.png" alt="" />
						</td>
						<td style="padding-right: 15px;">
							<img src="<?php bloginfo('template_url'); ?>/admin/images/logoright.png" alt="" />
						</td>
						<td style="padding-right: 15px;">
							<img src="<?php bloginfo('template_url'); ?>/admin/images/logomiddle.png" alt="" />
						</td>
					</tr>
					<tr>
						<td align="center" style="padding-right: 15px;">
							<input  name="<?php echo $value['id']; ?>" type="radio" value="1"<?php if(get_option( $value['id']) == "1") { echo ' checked="checked"'; } ?> />
						</td>
						<td align="center" style="padding-right: 15px;">
							<input  name="<?php echo $value['id']; ?>" type="radio" value="2"<?php if(get_option( $value['id']) == "2") { echo ' checked="checked"'; } ?> />
						</td>
						<td align="center" style="padding-right: 15px;">
							<input  name="<?php echo $value['id']; ?>" type="radio" value="3"<?php if(get_option( $value['id']) == "3") { echo ' checked="checked"'; } ?> />
						</td>
					</tr>
				</table>
				<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		 </div>
		<?php break;			

		case "categories":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<input type="text" name="<?php echo $value['id']; ?>" size="50" value="<?php echo get_option($value['id']); ?>" />
            	<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;
		
		case "pages":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<input type="text" name="<?php echo $value['id']; ?>" size="50" value="<?php echo get_option($value['id']); ?>" />
            	<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;			

		case "login":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<input  name="<?php echo $value['id']; ?>" type="radio" value="1"<?php if(get_option( $value['id']) == "1") { echo ' checked="checked"'; } ?> /><label>Yes</label>
                <input  name="<?php echo $value['id']; ?>" type="radio" value="2"<?php if(get_option( $value['id']) == "2") { echo ' checked="checked"'; } ?> /><label>No</label>
			<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;
		
		case "nav-date":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<input  name="<?php echo $value['id']; ?>" type="radio" value="1"<?php if(get_option( $value['id']) == "1") { echo ' checked="checked"'; } ?> /><label>Yes</label>
                <input  name="<?php echo $value['id']; ?>" type="radio" value="2"<?php if(get_option( $value['id']) == "2") { echo ' checked="checked"'; } ?> /><label>No</label>
			<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;		
		
		case "header-ad":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<span id="searchHeader"><input type="text" name="<?php echo $value['id']; ?>" size="50" value="<?php echo get_option($value['id']); ?>" /><label style="padding-top: 5px;">&nbsp;&laquo;&nbsp;<?php _e('Path to Ad Image', "magazine-basic"); ?></label>
                <br style="clear:both;" />
            	<input type="text" name="uwc_headerad_link" size="50" value="<?php echo get_option('uwc_headerad_link'); ?>" /><label style="padding-top: 5px;">&nbsp;&laquo;&nbsp;<?php _e('Click-through Link', "magazine-basic"); ?></label>
                <br style="clear:both;" />
               	<input  name="uwc_header_ad" type="hidden" value="off" />
            	<input  name="uwc_header_ad" type="checkbox" <?php if(get_option("uwc_header_ad") == "on") { echo ' checked="checked"'; } ?> /><label><?php _e('Display Header Ad', "magazine-basic"); ?></label>
</span>
				<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;		

	}
}	
?>
</div></div>
</div></form>
</div>
<?php
}

##########################################
## Display the front page options page ###
##########################################

function mb_frontpage() {
    global $themename, $shortname, $options;
?>
<div class="wrap">
<h2><?php echo $themename." ".__("Settings", "magazine-basic")." - ".__("Front Page", "magazine-basic"); ?></h2>
<?php
if ( $_REQUEST['saved']) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__("Settings Saved", "magazine-basic").'</strong></p></div>';
?>
<?php admin_pages_top(); // Display the HTML for the top of admin pages ?>
        <li><?php _e('Post Layout', "magazine-basic"); ?>: <strong><?php _e('Option', "magazine-basic"); ?> <?php echo get_option('uwc_post_layout'); ?></strong></li>
        <li><?php _e('Number of Posts', "magazine-basic"); ?>: <strong><?php echo get_option('uwc_number_posts'); ?></strong></li>
        <li><?php _e('Excerpt or Content', "magazine-basic"); ?>: <strong><?php if(get_option('uwc_excerpt_content')==1) { _e('Excerpt', "magazine-basic"); } else { _e('Content', "magazine-basic"); } ?></strong></li>
        <?php if(get_option('uwc_excerpt_content')=='1') { ?>
            <li><?php _e('Row', "magazine-basic"); ?> 1: <strong><?php echo get_option('uwc_excerpt_one'); ?> <?php _e('Words', "magazine-basic"); ?></strong></li>
            <li><?php _e('Row', "magazine-basic"); ?> 2: <strong><?php echo get_option('uwc_excerpt_two'); ?> <?php _e('Words', "magazine-basic"); ?></strong></li>
            <li><?php _e('Row', "magazine-basic"); ?> 3: <strong><?php echo get_option('uwc_excerpt_three'); ?> <?php _e('Words', "magazine-basic"); ?></strong></li>
		<?php } ?>
        <li><?php _e('Latest Story', "magazine-basic"); ?>: <strong><?php echo ucwords(get_option('uwc_latest_story')); ?></strong></li>
        
<?php admin_pages_middle(); // Display the HTML for the middle of admin pages ?>

<?php
foreach ($options as $value) { 
	switch ( $value['type']) {

        case "post-layout":
        ?>
        <div class="stuffbox">
            <h3><?php echo $value['name']; ?></h3>
            <div class="inside">
				<table>
                    <tr>
                        <td style="padding-right: 15px;">
                            <img src="<?php bloginfo('template_url'); ?>/admin/images/option1.png" alt="Option 1" />
                        </td>
                        <td style="padding-right: 15px;">
                            <img src="<?php bloginfo('template_url'); ?>/admin/images/option2.png" alt="Option 2" />
                        </td>
                        <td style="padding-right: 15px;">
                            <img src="<?php bloginfo('template_url'); ?>/admin/images/option3.png" alt="Option 3" />
                        </td>
                        <td style="padding-right: 15px;">
                            <img src="<?php bloginfo('template_url'); ?>/admin/images/option4.png" alt="Option 4" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-right: 15px;">
<input name="<?php echo $value['id']; ?>" type="radio" value="1"<?php if(get_option( $value['id'] ) == "1") { echo ' checked="checked"'; } ?> /><label><?php _e('Option', "magazine-basic"); ?> 1</label>                            
                        </td>
                        <td align="center" style="padding-right: 15px;">
<input name="<?php echo $value['id']; ?>" type="radio" value="2"<?php if(get_option( $value['id'] ) == "2") { echo ' checked="checked"'; } ?> /><label><?php _e('Option', "magazine-basic"); ?> 2</label>
                        </td>
                        <td align="center" style="padding-right: 15px;">
<input name="<?php echo $value['id']; ?>" type="radio" value="3"<?php if(get_option( $value['id'] ) == "3") { echo ' checked="checked"'; } ?> /><label><?php _e('Option', "magazine-basic"); ?> 3</label>
                        </td>
                        <td align="center" style="padding-right: 15px;">
<input name="<?php echo $value['id']; ?>" type="radio" value="4"<?php if(get_option( $value['id'] ) == "4") { echo ' checked="checked"'; } ?> /><label><?php _e('Option', "magazine-basic"); ?> 4</label>
                        </td>
                    </tr>
                </table>           
                <p><small><?php echo $value['desc']; ?></small></p>
            </div>
        </div>

        <?php 
        break;

		case "posts":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
                <input  name="<?php echo $value['id']; ?>" size="3" type="text" value="<?php echo get_option( $value['id']); ?>" />
                <p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php
		break;
		
		case "exorcon":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<input  name="<?php echo $value['id']; ?>" type="radio" value="1"<?php if(get_option( $value['id']) == "1") { echo ' checked="checked"'; } ?> /><label><?php _e('Excerpt', "magazine-basic"); ?></label>
                <input  name="<?php echo $value['id']; ?>" type="radio" value="2"<?php if(get_option( $value['id']) == "2") { echo ' checked="checked"'; } ?> /><label><?php _e('Content', "magazine-basic"); ?></label>
				<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php
		break;	

		case "excerpts":
		?>
		<div id="excerptsdiv" class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<table class="rows">
                <tr>
                <th><label><?php _e('Row', "magazine-basic"); ?> 1:</label></th>
                <th><label><?php _e('Row', "magazine-basic"); ?> 2:</label></th>               
                <th><label><?php _e('Row', "magazine-basic"); ?> 3+:</label></th>
                </tr>	
                <tr>
                <td><input  name="uwc_excerpt_one" size="3" type="text" value="<?php echo get_option('uwc_excerpt_one'); ?>" /></td>
                <td><input  name="uwc_excerpt_two" size="3" type="text" value="<?php echo get_option('uwc_excerpt_two'); ?>" /></td>
                <td><input  name="uwc_excerpt_three" size="3" type="text" value="<?php echo get_option('uwc_excerpt_three'); ?>" /></td>
                </tr>
                </table>
                <p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php
		break;	
		
		case "latest":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
				<input  name="<?php echo $value['id']; ?>" type="hidden" value="off" />
            	<input  name="<?php echo $value['id']; ?>" type="checkbox"<?php if(get_option($value['id']) == "on") { echo ' checked="checked"'; } ?> /><label><?php _e('Display "Latest Story"', "magazine-basic"); ?></label>            
                <p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php
		break;			

	}
}
?>
</div></div>
</div>
</form>
</div>
<?php
}


########################################
## Display the seo options page ###
########################################

function mb_seo() {
    global $themename, $shortname, $options;
?>
<div class="wrap">
<h2><?php echo $themename." ".__("Settings", "magazine-basic")." - ".__("SEO", "magazine-basic"); ?></h2>
<?php
if ( $_REQUEST['saved']) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__("Settings Saved", "magazine-basic").'</strong></p></div>';
?>
<?php admin_pages_top(); // Display the HTML for the top of admin pages ?>
        <li><?php _e('Site Description', "magazine-basic"); ?>: <strong><?php if(get_option($shortname.'_site_description')) { _e('Added', "magazine-basic"); } else { echo '<span style="color:#ff0000;">'.__('Not Added', "magazine-basic").'</span>'; } ?></strong></li>
        <li><?php _e('Keywords', "magazine-basic"); ?>: <strong><?php if(get_option($shortname.'_keywords')) { _e('Added', "magazine-basic"); } else { echo '<span style="color:#ff0000;">'.__('Not Added', "magazine-basic").'</span>'; } ?></strong></li>
        <li><?php _e('Google Analytics', "magazine-basic"); ?>: <strong><?php if(get_option($shortname.'_google_analytics')) { _e('Added', "magazine-basic"); } else { echo '<span style="color:#ff0000;">'.__('Not Added', "magazine-basic").'</span>'; } ?></strong></li>
<?php admin_pages_middle(); // Display the HTML for the middle of admin pages ?>

<?php
foreach ($options as $value) { 
	switch ( $value['type']) {

		case "site-description":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<textarea name="<?php echo $value['id']; ?>" cols="60" rows="4"><?php echo stripslashes(get_option($value['id'])); ?></textarea>
				<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;

		case "keywords":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<textarea name="<?php echo $value['id']; ?>" cols="60" rows="6"><?php echo stripslashes(get_option($value['id'])); ?></textarea>
				<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;

		case "google":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<textarea name="<?php echo $value['id']; ?>" cols="60" rows="10"><?php echo stripslashes(get_option($value['id'])); ?></textarea>
				<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;
	}
}
?>
</div></div>
</div>
</form>
</div>
<?php
}

########################################
## Display the css options page ###
########################################

function mb_css() {
    global $themename, $shortname, $options;
?>
<div class="wrap">
<h2><?php echo $themename." ".__("Settings", "magazine-basic")." - ".__("CSS", "magazine-basic"); ?></h2>
<?php
if ( $_REQUEST['saved']) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__("Settings Saved", "magazine-basic").'</strong></p></div>';
?>
<?php admin_pages_top(); // Display the HTML for the top of admin pages ?>
        <li><?php _e('CSS', "magazine-basic"); ?>: <strong><?php if(get_option($shortname.'_css_styles')) { _e('Added', "magazine-basic"); } else { echo '<span style="color:#ff0000;">'.__("Not Added", "magazine-basic").'</span>'; } ?></strong></li>
<?php admin_pages_middle(); // Display the HTML for the middle of admin pages ?>

<?php
foreach ($options as $value) { 
	switch ( $value['type']) {

		case "css":
		?>
		<div class="stuffbox">
			<h3><?php echo $value['name']; ?></h3>
			<div class="inside">
            	<textarea name="<?php echo $value['id']; ?>" cols="60" rows="35"><?php echo stripslashes(get_option($value['id'])); ?></textarea>
				<p style="clear:left;"><small><?php echo $value['desc']; ?></small></p>
			</div>
		</div>
		<?php break;

	}
}
?>
</div></div>
</div>
</form>
</div>
<?php
}

add_action('admin_menu', 'mytheme_add_admin'); 

// include the login widget
include(TEMPLATEPATH.'/widgets/widget_login.php'); 

// include the featured post widget
include(TEMPLATEPATH.'/widgets/widget_feature.php'); 


// Initiating the siebars
if (function_exists("register_sidebar")) {
register_sidebar(array(
'name' => 'Sidebar One',
	'before_widget' => '<div class="side-widget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));

if (get_option('uwc_site_sidebars') == "2") {
	register_sidebar(array(
	'name' => 'Sidebar Two',
	'before_widget' => '<div class="side-widget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	}
}

// Tags for keywords
function csv_tags() {
	global $shortname;
    $posttags = get_the_tags();
    if($posttags) {
		foreach((array)$posttags as $tag) {
			$csv_tags .= $tag->name . ',';
		}
	}
    echo '<meta name="keywords" content="'.$csv_tags.get_option($shortname.'_keywords').'" />';
}

// Theme excerpts
function theme_excerpt($num) {
	$link = get_permalink();
	$limit = $num;
	if(!$limit) $limit = 55;
	$excerpt = explode(' ', strip_tags(get_the_excerpt()), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...<br /><a href="'.$link.'" class="more-link">'.__("VIEW MORE &nbsp; &#9733;", "magazine-basic").'</a>';
	} else {
		$excerpt = implode(" ",$excerpt).'<br /><a href="'.$link.'" class="more-link">'.__("VIEW MORE &nbsp; &#9733;", "magazine-basic").'</a>';
	}	
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	echo '<p>'.$excerpt.'</p>';
}

// Theme contents
function theme_content($readmore) {
	$content = get_the_content($readmore);
	$content = strip_tags($content, '<a><strong><em><b><i><embed><object>');
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
}

// Meta description
function metaDesc() {
	global $shortname;
	$content = strip_tags(get_the_content());
	if($content) {
		$content = preg_replace('/\[.+\]/','', $content);
		$content = ereg_replace("[\n\r]", "\t", $content);
		$content = ereg_replace("\t\t+", " ", $content);
	} else {
		$content = get_option($shortname.'_site_description');
	}
	if (strlen($content) < 155) {
		echo $content;
	} else {
		$desc = substr($content,0,155);
		echo $desc."...";
	}
}

// resize function
function resize($w,$h,$q=80,$class='alignleft',$showlink=true) {
	global $more;
	$more = 1;
	$content = get_the_content();
	$title = get_the_title();
	$theme = get_bloginfo('template_url');
	if($showlink) {
		$link = "<a href='".get_permalink()."' title='$title'>";
		$linkend = "</a>";
	}
	$pattern = '/<img[^>]+src[\\s=\'"]';
	$pattern .= '+([^"\'>\\s]+)/is';
	if(preg_match($pattern,$content,$match)) {
		if(get_option('uwc_image_resizer') == "on") { 
		echo "$link<img src=\"$theme/thumb.php?src=$match[1]&amp;h=$h&amp;w=$w&amp;zc=1&amp;q=$q\" class=\"$class\" alt=\"$title\" width=\"$w\" height=\"$h\" />$linkend"."\n\n";
		} else {
		echo "$link<img src=\"$match[1]\" class=\"$class\" alt=\"$title\" width=\"$w\" />$linkend"."\n\n";	
		}
	}
	$more = 0;
}

// Comments
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
        <div class="comment-avatar">
        	<?php echo get_avatar($comment,$size='48'); ?>
        </div>     
        <div class="comment-author">
        	<?php echo get_comment_author_link()." ";
        	printf(__('on %1$s at %2$s', "magazine-basic"), get_comment_date(),get_comment_time()); 
			edit_comment_link(__('(Edit)', "magazine-basic"),'  ','');
			?>
        </div>
        <div class="comment-text">
	        <?php if ($comment->comment_approved == '0') { _e('<em>Your comment is awaiting moderation.</em>', "magazine-basic"); } ?>
        	<?php comment_text() ?>
        </div>
        <?php if($args['max_depth']!=$depth) { ?>
        <div class="reply">
        	<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
        <?php } ?>
	</div>
<?php
}

### Function: Page Navigation: Boxed Style Paging
function pagination($before = '', $after = '') {
	global $wpdb, $wp_query;
	$pagenavi_options = array();
	$pagenavi_options['pages_text'] = __('Page %CURRENT_PAGE% of %TOTAL_PAGES%',"magazine-basic");
	$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['first_text'] = __('First Page',"magazine-basic");
	$pagenavi_options['last_text'] = __('Last Page',"magazine-basic");
	$pagenavi_options['next_text'] = '&raquo;';
	$pagenavi_options['prev_text'] = '&laquo;';
	$pagenavi_options['dotright_text'] = '...';
	$pagenavi_options['dotleft_text'] = '...';
	$pagenavi_options['num_pages'] = 5;
	$pagenavi_options['always_show'] = 0;
	$pagenavi_options['num_larger_page_numbers'] = 0;
	$pagenavi_options['larger_page_numbers_multiple'] = 5;
	if (!is_single()) {
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pagenavi_options['num_pages']);
		$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
		$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
		$pages_to_show_minus_1 = $pages_to_show - 1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		$larger_per_page = $larger_page_to_show*$larger_page_multiple;
		$larger_start_page_start = (n_round($start_page, 10) + $larger_page_multiple) - $larger_per_page;
		$larger_start_page_end = n_round($start_page, 10) + $larger_page_multiple;
		$larger_end_page_start = n_round($end_page, 10) + $larger_page_multiple;
		$larger_end_page_end = n_round($end_page, 10) + ($larger_per_page);
		if($larger_start_page_end - $larger_page_multiple == $start_page) {
			$larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
			$larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
		}
		if($larger_start_page_start <= 0) {
			$larger_start_page_start = $larger_page_multiple;
		}
		if($larger_start_page_end > $max_page) {
			$larger_start_page_end = $max_page;
		}
		if($larger_end_page_end > $max_page) {
			$larger_end_page_end = $max_page;
		}
		if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
			$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			echo $before.'<div class="pagination">'."\n";
			if(!empty($pages_text)) {
				echo '<span class="pages">'.$pages_text.'</span>';
			}
			previous_posts_link($pagenavi_options['prev_text']);
			if ($start_page >= 2 && $pages_to_show < $max_page) {
				$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
				echo '<a href="'.clean_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a>';
				if(!empty($pagenavi_options['dotleft_text'])) {
					echo '<span class="extend">'.$pagenavi_options['dotleft_text'].'</span>';
				}
			}
			if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
				for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
					$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
					echo '<a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
				}
			}
			for($i = $start_page; $i  <= $end_page; $i++) {						
				if($i == $paged) {
					$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
					echo '<span class="current">'.$current_page_text.'</span>';
				} else {
					$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
					echo '<a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
				}
			}
			if ($end_page < $max_page) {
				if(!empty($pagenavi_options['dotright_text'])) {
					echo '<span class="extend">'.$pagenavi_options['dotright_text'].'</span>';
				}
				$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
				echo '<a href="'.clean_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a>';
			}
			next_posts_link($pagenavi_options['next_text'], $max_page);
			if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
				for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
					$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
					echo '<a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
				}
					}

			echo '</div>'.$after."\n";
		}
	}
}

### Function: Round To The Nearest Value
function n_round($num, $tonearest) {
   return floor($num/$tonearest)*$tonearest;
}
?>