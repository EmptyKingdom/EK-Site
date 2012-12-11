<?php global $wp_query; if (have_posts()) : ?>
	<div class="row">
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('/partials/loop', 'offsite_product') ?>
		<?php if ($wp_query->current_post+1 != $wp_query->post_count && ($wp_query->current_post+1) % 3 == 0) : ?>
	</div>
	<div class="row">
		<?php endif; ?>
	<?php endwhile; ?>
	</div>
<?php endif; ?>
