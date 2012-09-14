<?php while (have_posts()) : the_post(); ?>
<?php if($x == 1) { ?>
<div class="ind-post">
	<h1><a href="<?php the_permalink() ?>" title="<?php printf(__("Permanent Link to %s", "magazine-basic"), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
	<div class="meta">
		<?php if(get_option('uwc_dates_index') == 'on') { echo '<div class="date">'; the_time(get_option('date_format')); echo '</div>'; } ?>
		 <?php if(get_option('uwc_authors_index') == 'on') { _e("By", "magazine-basic"); echo ' '; the_author_posts_link(); } ?> 
	</div>
	
	<div class="storycontent">
		<?php if(get_option('uwc_excerpt_content') == '2') { 
				resize(780,420);
				theme_content(__('view more &#9733;', "magazine-basic"));
			} else {
				resize(780,420);
				theme_excerpt(get_option('uwc_excerpt_one'));
			}	
		?>
	</div>
</div>
<?php $x++; ?>
<?php } else {
	if($x==2) { echo '<div id="twocol">'; $i=1; } ?>
	<div class="twopost twopost<?php if($i==5) { $i = 3; } echo $i; $i++; ?>">
		<h1><a href="<?php the_permalink() ?>" title="<?php printf(__("Permanent Link to %s", "magazine-basic"), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
		<div class="meta">
			<?php if(get_option('uwc_dates_index') == 'on') { echo '<div class="date">'; the_time(get_option('date_format')); echo '</div>'; } ?>
		 <?php if(get_option('uwc_authors_index') == 'on') { _e("By", "magazine-basic"); echo ' '; the_author_posts_link(); } ?> 
		</div>

		<div class="storycontent">
			<?php if(get_option('uwc_excerpt_content') == '2') { 
				resize(370,200);
				theme_content(__('view more &#9733;', "magazine-basic"));
			} else {
				resize(370,200);
				theme_excerpt(get_option('uwc_excerpt_two'));
			}	
			?>
		</div>
	 </div>
<?php $x++; } ?>
<?php endwhile; ?>
</div>