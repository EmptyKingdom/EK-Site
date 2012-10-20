<?php global $wp_query; if (have_posts()) : ?>
	<div class="row">
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('/partials/loop', 'post') ?>
		<?php if ($wp_query->current_post+1 != $wp_query->post_count && ($wp_query->current_post+1) % 2 == 0) : ?>
	</div>
	<div class="row">
		<?php endif; ?>
	<?php endwhile; ?>
	</div>
<?php endif; ?>
