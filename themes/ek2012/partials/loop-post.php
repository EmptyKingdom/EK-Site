<div class="post <?php echo ek_get_cat($post, 'slug', true) ?> span4">
	<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
	<p class="author">by <?php the_author_posts_link() ?></p>
	<p class="date"><?php the_time(get_option('date_format')) ?></p>
	<div class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a></div>
	<h5 class="category"><?php echo ek_get_cat($post, 'name', true) ?></h5>
	<div class="excerpt"><?php the_excerpt() ?></div>
	<a class="view-more" href="<?php the_permalink() ?>">View More&hellip;</a>
</div>