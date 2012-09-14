<?php get_header(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
			<div class="entry">
				<?php $subtitle = get_post_meta($post->ID, 'subtitle', true);
					if($subtitle) echo '<p class="sub">'.$subtitle.'</p>';
				 ?>
                 <?php the_content(); ?>
			</div>
  			<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages', "magazine-basic").':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
       	<?php comments_template(); ?>

		<?php endwhile; endif; ?>
<?php get_footer(); ?>