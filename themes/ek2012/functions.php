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