<?php while (have_posts()) : the_post(); ?>
<div class="ind-post">
	<h1><a href="<?php the_permalink() ?>" title="<?php printf(__("Permanent Link to %s", "magazine-basic"), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
	<div class="meta">
		<?php if(get_option('uwc_dates_index') == 'on') { echo '<div class="date">'; the_time(get_option('date_format')); echo '</div>'; } ?>
		 <?php if(get_option('uwc_authors_index') == 'on') { _e("By", "magazine-basic"); echo ' '; the_author_posts_link(); } ?> 
	</div>
	
	<div class="storycontent">
		<?php if(get_option('uwc_excerpt_content') == '2') { 
				resize(650,350);
				theme_content(__('VIEW MORE  &nbsp;&nbsp; &#9733;</span>', "magazine-basic"));
			} else {
				resize(650,350);
				theme_excerpt(get_option('uwc_excerpt_one'));
			}	
		?>
	</div>
</div>
<?php endwhile; ?>