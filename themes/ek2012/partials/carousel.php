<div id="<?php echo $class_base ?>-carousel-<?php echo $i ?>" class="<?php echo $class_base ?>-carousel carousel carousel-component slide carousel-fade <?php echo $i == 0 ? 'active' : '' ?>">
	<!-- Carousel items -->
	<div class="carousel-inner">
		<?php while ($carousel->slides->have_posts()) : $carousel->slides->the_post(); ?>
			<?php 
			if ($carousel->type == 'slide_collection') :
				$featured_post = get_field('featured_post');
				if (is_array($featured_post)) $featured_post = $featured_post[0];
			endif; ?>
		<div class="<?php echo $carousel->slides->current_post == 0 ? 'active' : '' ?> item" data-description="#slide-<?php the_id() ?>">
			<?php 
			if (has_post_thumbnail()) : 
				the_post_thumbnail(); 
			elseif ($featured_post) :
				echo get_the_post_thumbnail($featured_post->ID, 'post-thumbnail'); 
			endif; 
			if ($carousel->show_caption) : ?>
			<div class="caption">
				<?php if ($carousel->type == 'slide_collection') : ?>
					<?php if ($featured_post) : ?>
						<h5 class="category"><?php echo ek_get_cat($featured_post, 'name'); ?></h5>
						<p><?php echo wp_trim_words($featured_post->post_content) ?></p>
					<?php else : ?>
						<p><?php echo get_the_content() ?></p>
					<?php endif; ?>
				<?php else: ?>
					<h5 class="category"><?php echo ek_get_cat($post, 'name'); ?></h5>
					<?php the_excerpt() ?>
				<?php endif; ?>
				<a class="btn btn-default" href="<?php echo get_field('link') ? get_field($link) : get_permalink($featured_post) ?>">View More...</a>
			</div> <!-- /.caption -->
			<?php endif; ?>
		</div> <!-- /.item -->
		<?php endwhile; // slide loop ?>
	</div> <!-- /.carousel-inner -->
	<!-- Carousel nav -->
	<a class="carousel-control left" href="#<?php echo $class_base ?>-carousel-<?php echo $i ?>" data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#<?php echo $class_base ?>-carousel-<?php echo $i ?>" data-slide="next">&rsaquo;</a>
	<!-- Carousel indicator -->
	<ul class="unstyled carousel-indicator">
		<?php for ($j = 0; $j < $carousel->slides->post_count; $j++) : ?>
		<li class="<?php echo $j == 0 ? 'active' : '' ?>"><a href="javascript:void(0)" class="page-<?php echo $j ?>" data-slide_to="<?php echo $j ?>"></a></li>
		<?php endfor; // carousel loop ?>
	</ul>
</div> <!-- /.carousel -->
