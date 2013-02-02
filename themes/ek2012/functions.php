<?php 

if ($_GET['ref'] == 'ek_logo') 
{
	// unset saved category filter if you click on the logo
	$lastFilter = json_encode(array('category__in' => array()));
	setcookie('lastFilter', $lastFilter, 0, '/');
	$_COOKIE['lastFilter'] = $lastFilter;
	$_SERVER['REQUEST_URI'] = str_replace('ref=ek_logo', '', $_SERVER['REQUEST_URI']);
}

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
	'after_widget'  => '</div></div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4><div class="content">' ));
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
	
	// slide post type
	$labels = array(
		'name' => __('Offsite Products', 'ek'),
		'singular_name' => __('Offsite Product', 'ek'),
		'add_new_item' => __('Add New Product', 'ek'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array('slug' => 'store'),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'thumbnail'),
	); 

	register_post_type('offsite_product', $args);

	if ( ! is_admin())
	{
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.js', false, '1.8.1');
		wp_enqueue_script('jquery.cookie', get_stylesheet_directory_uri().'/js/bootstrap.min.js', array('jquery'), false, true);
		wp_enqueue_script('bootstrap', get_stylesheet_directory_uri().'/js/jquery.cookie.js', array('jquery'), false, true);
		wp_enqueue_script('theme', get_stylesheet_directory_uri().'/js/theme.js', array('jquery', 'bootstrap', 'jquery.cookie'), false, true);
	}

}
add_action('init', 'ek_register_stuff');

/* get ek main category */
function ek_get_cat($post = false, $property = false, $parent = true)
{
	global $wp_query;
	if ( ! defined('DOING_AJAX') && is_category() && $wp_query->in_the_loop)
	{
		$the_category = get_queried_object();
		if ($parent)
		{
			$the_category = ek_get_root_category($the_category);
		}
	}
	else 
	{
		$categories = get_the_category($post->ID);
		foreach($categories as $category)
		{
			if ($parent)
			{
				$category = ek_get_root_category($category);
			}
			if (in_array($category->slug, array('illustration-art', 'film', 'photography', 'new-media', 'the-interviews', 'the-mausoleum', 'gallery-spotlight'), true)) 
			{
				$the_category = $category;
				break;
			}
		}
	}
	if ( ! $the_category)
		return false;
	if ($property)
		return $the_category->$property;
	return $the_category;
}

function ek_get_root_category($category)
{
	if (is_object($category))
	{
		$_category = $category->term_id;
	}
	else
	{
		$_category = $category;
	}
	$parent_cats = get_category_parents($_category, false, '/', true);
	if (is_string($parent_cats))
	{
		$split_arr = explode("/", $parent_cats);
		return get_category_by_slug($split_arr[0]);
	}
	return $category;
}

function ek_get_tagline()
{
	if (function_exists('ot_get_option')) 
	{
		$taglines = explode("\n", ot_get_option('taglines', array()));
		$tagline = $taglines[array_rand($taglines)];
		return $tagline;
	}
	return '';

}

function ek_display_carousels($carousels, $class_base = 'category', $side_captions = false, $hide_title = false)
{
	if (is_object($carousels))
	{
		$carousels = array($carousels);
	}
	foreach ($carousels as $i => &$carousel)
	{
		if ($carousel->type == 'slide_collection')
		{
			$carousel->slides = new WP_Query(array(
				'post_type' => 'slide',
				'tax_query' => array(
					array(
						'taxonomy' => 'slide_collections',
						'field' => 'id',
						'terms' => $carousel->slide_collection,
					)
				),
				'posts_per_page' => $carousel->max_num ? $carousel->max_num : 5,
				'order' => 'desc',
			));
		} 
		else if ($carousel->type == 'recent_posts')
		{
			$carousel->slides = new WP_Query(array(
				'post_type' => $carousel->post_type,
				'posts_per_page' => $carousel->max_num ? $carousel->max_num : 5,
				'cat' => $carousel->category ? $carousel->category : '',
				'tag' => $carousel->tag ? $carousel->tag : '',
				'meta_key' => '_thumbnail_id',
			));
		}
		
		if ( ! $side_captions)
		{
			$carousel->show_caption = true;
		}
		// initialize all values
		while($carousel->slides->have_posts()) : $carousel->slides->the_post(); global $post;
			if ($carousel->type == 'slide_collection') :
				// check for featured post
				$featured_post = get_field('featured_post');
				if (is_array($featured_post)) $featured_post = $featured_post[0];
				if ($featured_post) :
					// setup values from $post, falling back to $featured_post
					$post->title = get_the_title() ? get_the_title() : $featured_post->title;
					$post->link = $post->link ? $post->link : get_permalink($featured_post->ID);
					$post->thumbnail = has_post_thumbnail() ? get_the_post_thumbnail($post->ID) : get_the_post_thumbnail($featured_post->ID);
					$post->video_url = $post->featured_video ? $post->featured_video : $featured_post->featured_video;
					$post->author = get_the_author_meta('display_name', $featured_post->post_author);
					$post->author_link = get_author_posts_url($featured_post->post_author);
					$post->date = get_the_time(get_option('date_format'), $featured_post);
					$post->category = ek_get_cat($featured_post);
					$post->excerpt = $post->post_content != '' ? get_the_content() : wp_trim_words($featured_post->post_content);
				else :
					// it's a slide with no related post, get all values from $post
					$post->title = $post->post_title;
					$post->link = $post->link ? $post->link : false;
					$post->thumbnail = get_the_post_thumbnail($post->ID);
					$post->video_url = $post->featured_video;
					$post->excerpt = get_the_content();
				endif;
			else : 
				// carousel is recent posts, get all values from $post
				$post->title = get_the_title();
				$post->link = get_permalink($post->ID);
				$post->thumbnail = get_the_post_thumbnail($post->ID);
				$post->video_url = $post->featured_video;
				$post->author = get_the_author_meta('display_name', $post->post_author);
				$post->date = get_the_time(get_option('date_format'));
				$post->category = ek_get_cat($post);
				$post->excerpt = get_the_excerpt();
			endif;
			if ($post->video_url) :
				// determine video provider
				if (preg_match('%vimeo\.com\/([0-9]*)%', $post->video_url, $video_code)) :
					$post->video_provider = 'vimeo';
					$post->video_code = $video_code;
				elseif (preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post->video_url, $video_code)) :
					$post->video_provider = 'youtube';
					$post->video_code = $video_code;
				endif;
			endif;
		endwhile;
	}
	if ( ! $carousel->slides->post_count)
	{
		unset($carousels[$i]);
	}
	$carousels = array_values($carousels);
	include(locate_template('partials/carousels.php'));
}

add_filter('next_posts_link_attributes', 'ek_next_posts_attr');
function ek_next_posts_attr($attr)
{
	$attr .= ' class="btn btn-primary btn-arrow-left"';
	return $attr;
}

add_filter('previous_posts_link_attributes', 'ek_prev_posts_attr');
function ek_prev_posts_attr($attr)
{
	$attr .= ' class="btn btn-primary btn-arrow-right"';
	return $attr;
}

add_filter('the_title', 'ek_filter_title');
function ek_filter_title($title)
{
	$title = str_replace('EK Interview:', '<strong>EK Interview:</strong>', $title);
	return $title;
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

// load posts
add_action('wp_ajax_ek_load_posts', 'ek_load_posts');
add_action('wp_ajax_nopriv_ek_load_posts', 'ek_load_posts');
function ek_load_posts() 
{
	if (check_ajax_referer(__FUNCTION__,'nonce', false))
	{
		$query = $_POST['query'] ?: array();
		$query['post_status'] = 'publish'; // otherwise wp thinks we're in the admin and shows all post statuses
		query_posts($query);
		get_template_part('/partials/posts', 'listing');
		echo '<div id="nonce" style="display: none">'.wp_create_nonce(__FUNCTION__).'</div>';
	}
	else
	{
		die('No posts found.');
	}
	
	die();
}

// sfw endpoint
add_action( 'init', 'ek_add_sfw_endpoint' );
function ek_add_sfw_endpoint() 
{
	add_rewrite_endpoint( 'sfw', EP_ALL );
}

// sfw query filter
add_action( 'pre_get_posts', 'ek_sfw_pre_get_posts' );
function ek_sfw_pre_get_posts($query)
{
	global $wp_query;
	if (isset($wp_query->query_vars['sfw']))
	{
		add_filter('post_link', 'ek_add_sfw_to_link');
		add_filter('category_link', 'ek_add_sfw_to_link');
		add_filter('page_link', 'ek_add_sfw_to_link');
		add_filter('author_link', 'ek_add_sfw_to_link');
		if ( ! empty($wp_query->query_vars['sfw']) && $query->is_main_query())
		{
			$vars = explode('/', $wp_query->query_vars['sfw']);
			if (count($vars) == 1)
			{
				$new_query = array('pagename' => $vars[0]);
			}
			foreach ($vars as $i => $var)
			{
				if ($i % 2 == 0)
				{
					if ( ! $wp_query->is_singular() && $var == 'page')
					{
						$var = 'paged';
					}
					else if ($var == 'category')
					{
						$var = 'category_name';
					}
					else if ($var == 'author')
					{
						$var = 'author_name';
					}
					else if ($var == 'featured')
					{
						$var = 'name';
					}
					$new_query[$var] = $vars[$i+1];
				}
			}
			$query->parse_query($new_query);
			$query->query_vars['sfw'] = '';
		}
		$query->query_vars['tax_query'][] = array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => 'nsfw',
            'operator' => 'NOT IN',
		);
	}
}

function ek_add_sfw_to_link($link)
{
	if (strpos('/sfw/', $link) === false)
	{
		$link = str_replace(site_url('/'), site_url('/').'sfw/', $link);
	}
	return $link;
}

/*
add_action( 'posts_request', function($query){
	if ($query->is_main_query())
	{
		print_r($query);
	}
}, 11 );
*/


add_filter('nav_menu_css_class', 'ek_nav_cat_classes', 10, 2);
function ek_nav_cat_classes($classes, $item)
{
	if ($item->type == 'taxonomy' && $item->object == 'category')
	{
		$classes[] = get_category($item->object_id)->slug;
	}
	return $classes;
}

add_action('admin_footer', 'ek_admin_footer');
function ek_admin_footer()
{
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		var carouselTypeSelects = function(){
			$('.carousel-type').each(function(i, el) {
				if ($(el).val() == 'slide_collection') {
					$(el).closest('.format-settings').siblings().find('.slide-collection').closest('.format-settings').show();
					$(el).closest('.format-settings').siblings().find('.carousel-post-type, .carousel-category, .carousel-tag').each(function(i, e){
						$(e).closest('.format-settings').hide();
					})
				} else {
					$(el).closest('.format-settings').siblings().find('.slide-collection').closest('.format-settings').hide();
					$(el).closest('.format-settings').siblings().find('.carousel-post-type, .carousel-category, .carousel-tag').each(function(i, e){
						$(e).closest('.format-settings').show();
					})
				}
			})
		}
		if (pagenow == 'appearance_page_ot-theme-options') {
			setInterval(carouselTypeSelects, 500);
			$('#option-tree-settings-api').on({
				change: carouselTypeSelects,
			}, '.carousel-type')
		}
	})		
				
	</script>
	<?php
}

class EK_Nav_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"custom-sub\"><ul class=\"sub-menu unstyled\">\n";
    }
    function end_lvl(&$output, $depth)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
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
	include('acf-fields.php');
}
