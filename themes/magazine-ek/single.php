<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<div class="meta">
				<?php if(get_option('uwc_dates_posts') == 'on') { echo '<div class="date">'; the_time(get_option('date_format')); echo '</div>'; } ?>
                <?php if(get_option('uwc_authors_posts') == 'on') { _e("By", "magazine-basic"); echo ' '; the_author_posts_link(); } ?> 
			</div>

			<div class="entry">

				<?php $subtitle = get_post_meta($post->ID, 'subtitle', true);
					if($subtitle) echo '<p class="sub">'.$subtitle.'</p>';
				 ?>



				 <?php the_content(); ?>

				
            </div>
  		<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages', "magazine-basic").'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
        
	<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p><?php _e("Sorry, no posts matched your criteria.", "magazine-basic"); ?></p>
<?php endif; ?>
<?php get_footer(); ?>