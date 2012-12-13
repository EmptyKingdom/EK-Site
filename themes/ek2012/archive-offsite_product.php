<?php get_header(); query_posts('post_type=offsite_product&posts_per_page=-1') ?>
	<div id="feature" class="row">
	<?php 
		if (function_exists('ot_get_option')) :
			$option_str = 'offsite_products';
			$carousel->type = ot_get_option($option_str.'_carousel_type');
			$carousel->slide_collection = ot_get_option($option_str.'_carousel_slide_collection');
			$carousel->max_num = ot_get_option($option_str.'_carousel_max_num');
			$carousel->post_type = ot_get_option($option_str.'_carousel_post_type');
			$carousel->category = ot_get_option($option_str.'_carousel_category');
			ek_display_carousels($carousel, 'featured', true, true);
			if (ot_get_option('offsite_products_hide_promo_credits') != array('yes')) :
				get_template_part('partials/tempshop', 'credits');
			endif;
		endif; // function_exists('ot_get_option') ?>
		<hr class="dotted span12">
	</div> <!-- /#feature.row -->
	<div class="row">
		<div class="span8 <?php echo ek_get_cat(false, 'slug', true) ?>" id="main">
			<div id="post-list" class="post-list">
				<?php get_template_part('/partials/offsite_products', 'listing') ?>
			</div> <!-- /#post-list -->
			<?php get_template_part('partials/tempshop', 'credits'); ?>
		</div> <!-- /#main -->
		<div class="span4" id="sidebar">
			<?php get_sidebar(); ?>
		</div> <!-- /#sidebar -->
	</div> <!-- /.row -->
<?php get_footer(); ?>