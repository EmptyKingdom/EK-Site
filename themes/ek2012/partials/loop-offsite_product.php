<div class="post <?php echo ek_get_cat($post, 'slug') ?> span2">
	<h3><a href="<?php echo get_field('product_url') ?>" target="blank"><?php the_title() ?></a></h3>
	<p class="author">by <a href="<?php echo get_field('artist_url') ?>"><?php echo get_field('artist_name') ?></a></p>
	<div class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a></div>
</div>