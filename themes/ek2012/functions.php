<?php 

/* theme support */
add_theme_support('menus');
add_theme_support('post-thumbnails');
set_post_thumbnail_size('770', '395', true);

/* menus */
register_nav_menu('main-menu', 'Main Menu');
register_nav_menu('quick-links-footer', 'Footer Quick Links');

/* widgets */
$widgets = glob(dirname(__FILE__).'/widgets/*');
foreach($widgets as $widget_file) 
{
	include($widget_file);	
}

/* sidebars */
register_sidebar(array(
	'name'          => 'Right Sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>' ));
register_sidebar(array(
	'name'          => 'Footer Left',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>' ));
register_sidebar(array(
	'name'          => 'Footer Right',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>' ));
	
/* custom post types */
function ek_register_stuff() {

	// carousel taxonomy
	register_taxonomy('slide_collections', 'slide', array(
		'labels' => array(
			'name' => __('Collections', 'ek'),
			'singular_name' => __('Slide Collection', 'ek'),
		),
	));

	// slide post type
	$labels = array(
		'name' => __('Slides', 'ek'),
		'singular_name' => __('Slide', 'ek'),
		'add_new_item' => __('Add New Slide', 'ek'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array('slide_collections'),
	); 
	register_post_type('slide', $args);
}
add_action('init', 'ek_register_stuff');

/* get ek main category */
function ek_get_cat($post, $property = false)
{
	$categories = get_the_category($post->ID);
	foreach($categories as $category)
	{
		if (in_array($category->slug, array('illustration-art', 'film', 'photography', 'new-media', 'event', 'interview'))) 
		{
			$the_category = $category;
			break;
		}
	}
	if ( ! $the_category)
		return false;
	if ($property)
		return $the_category->$property;
	return $the_category;
}


/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );
include_once('theme-options.php');

// filter cats
add_action('wp_ajax_ek_filter_cats', 'ek_load_filtered_cats');
add_action('wp_ajax_nopriv_ek_filter_cats', 'ek_load_filtered_cats');
function ek_load_filtered_cats() 
{
	$query = $_POST['orig_query'] ?: array();
	$query['post_status'] = 'publish'; // otherwise wp thinks we're in the admin and shows all post statuses
	if ( ! empty($_POST['categories']))
	{
		$query['category__in'] = $_POST['categories'];
	}
	query_posts($query);
	get_template_part('/partials/posts', 'listing');
	die();
}

add_action('admin_head', 'ek_admin_head');
function ek_admin_head()
{
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		var carouselTypeSelects = function(){
			$('.carousel-type').each(function(i, el) {
				if ($(el).val() == 'slide_collection') {
					$(el).closest('.option-tree-setting-body').find('.slide-collection').closest('.format-settings').show();
					$(el).closest('.option-tree-setting-body').find('.carousel-post-type, .carousel-category, .carousel-tag').each(function(i, e){
						$(e).closest('.format-settings').hide();
					})
				} else {
					$(el).closest('.option-tree-setting-body').find('.slide-collection').closest('.format-settings').hide();
					$(el).closest('.option-tree-setting-body').find('.carousel-post-type, .carousel-category, .carousel-tag').each(function(i, e){
						$(e).closest('.format-settings').show();
					})
				}
			})
		}
		if (pagenow == 'appearance_page_ot-theme-options') {
			carouselTypeSelects();
			$('.carousel-type').change(carouselTypeSelects)
		}
	})		
				
	</script>
	<?php
}

/**
 * Activate Add-ons
 * Here you can enter your activation codes to unlock Add-ons to use in your theme. 
 * Since all activation codes are multi-site licenses, you are allowed to include your key in premium themes. 
 * Use the commented out code to update the database with your activation code. 
 * You may place this code inside an IF statement that only runs on theme activation.
 */ 
 
// if(!get_option('acf_repeater_ac')) update_option('acf_repeater_ac', "xxxx-xxxx-xxxx-xxxx");
// if(!get_option('acf_options_page_ac')) update_option('acf_options_page_ac', "xxxx-xxxx-xxxx-xxxx");
// if(!get_option('acf_flexible_content_ac')) update_option('acf_flexible_content_ac', "xxxx-xxxx-xxxx-xxxx");
// if(!get_option('acf_gallery_ac')) update_option('acf_gallery_ac', "xxxx-xxxx-xxxx-xxxx");


/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '507ef43c5fb19',
		'title' => 'Slides',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_507dfe64a3359',
				'label' => 'Post to feature',
				'name' => 'featured_post',
				'type' => 'relationship',
				'instructions' => 'Optionally choose a post to feature in this slide. You can leave the slide title, content, link, and featured image blank to use the selected post\'s title, content, link, and image. If you enter a value for any of those fields, they will override the selected post\'s value when the slide is displayed in the carousel.',
				'required' => '0',
				'post_type' => 
				array (
					0 => 'post',
					1 => 'event',
					2 => 'cause',
				),
				'taxonomy' => 
				array (
					0 => 'all',
				),
				'max' => '1',
				'order_no' => '0',
			),
			1 => 
			array (
				'key' => 'field_507e0220d8eed',
				'label' => 'Link',
				'name' => 'link',
				'type' => 'text',
				'instructions' => 'Optionally enter a URL that the title of this slide will be linked to.
	
	If left blank, and a featured post is selected for this slide, the title will be linked to the post. If no post is selected, then the title will not be linked.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'order_no' => '1',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
}
