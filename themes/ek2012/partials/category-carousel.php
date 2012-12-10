<?php 
if (function_exists('ot_get_option')) :
	$category = ek_get_cat(); 
	$option_str = str_replace('-', '_', $category->slug).'_cat';
	$carousel->type = ot_get_option($option_str.'_carousel_type');
	$carousel->slide_collection = ot_get_option($option_str.'_carousel_slide_collection');
	$carousel->max_num = ot_get_option($option_str.'_carousel_max_num');
	$carousel->post_type = ot_get_option($option_str.'_carousel_post_type');
	$carousel->category = ot_get_option($option_str.'_carousel_category');
	ek_display_carousels($carousel);
endif; // function_exists('ot_get_option') ?>
