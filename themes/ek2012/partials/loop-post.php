<div class="post <?php echo ek_get_cat($post, 'slug') ?> span4">
	<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
	<p class="author">by <?php the_author() ?></p>
	<p class="date"><?php the_time(get_option('date_format')) ?></p>
	<div class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a></div>
	<h5 class="category"><?php echo ek_get_cat($post, 'name') ?></h5>
	<div class="excerpt"><?php the_excerpt() ?></div>
	<a class="btn" href="<?php the_permalink() ?>">View More...</a>
</div>