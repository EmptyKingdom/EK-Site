<div id="<?php echo $class_base ?>-carousel-<?php echo $i ?>" class="<?php echo $class_base ?>-carousel carousel carousel-component slide carousel-fade <?php echo $i == 0 ? 'active' : '' ?>">
	<!-- Carousel items -->
	<div class="carousel-inner">
		<?php while ($carousel->slides->have_posts()) : $carousel->slides->the_post(); global $post; ?>
			<?php 
			if ($carousel->type == 'slide_collection') :
				$featured_post = get_field('featured_post');
				if (is_array($featured_post)) $featured_post = $featured_post[0];
			endif; ?>
			<div class="<?php echo $carousel->slides->current_post == 0 ? 'active' : '' ?> item" data-description="#slide-<?php the_id() ?>">
				<?php if ( ! $hide_title) : ?>
					<?php if ($carousel->type == 'slide_collection') : ?>
						<?php if ($featured_post) :?>
							<h3><a href="<?php echo get_permalink($featured_post) ?>"><?php echo $featured_post->post_title; ?></a></h3>
							<div class="postmeta clearfix">
								<p class="author">by <a href="<?php echo get_author_posts_url($featured_post->post_author) ?>" rel="author"><?php echo get_the_author_meta('display_name', $featured_post->post_author) ?></a></p>
								<p class="date"><?php echo get_the_time(get_option('date_format'), $featured_post) ?></p>
							</div> <!-- /.postmeta -->
						<?php else : // slide is showing ?>
							<h3><?php the_title() ?></h3>
						<?php endif; ?>
					<?php else : // carousel is recent posts ?>
						<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
						<div class="postmeta clearfix">
							<p class="author">by <?php the_author_posts_link(); ?></p>
							<p class="date"><?php the_time(get_option('date_format')) ?></p>
						</div> <!-- /.postmeta -->
					<?php endif; ?>
				<?php endif; // ! $hide_title ?>
				<a href="<?php echo $post->link ? $post->link : $featured_post ? get_permalink($featured_post->ID) : 'javascript:void(0)' ?>"<?php 	

					// check for featured video URL
					if ($post->featured_video) :
						$video_url = $post->featured_video;
					elseif ($featured_post) :
						$video_url = $featured_post->featured_video;
					else :
						$video_url = false;
					endif;

					// determine video provider
					if (preg_match('%vimeo\.com\/([0-9]*)%', $video_url, $code)) :
						$provider = 'vimeo';
					elseif (preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $code)) :
						$provider = 'youtube';
					endif;
					if ($video_url) : ?>
						class="video <?php echo $provider ?>" data-provider="<?php echo $provider ?>" data-video_ref="<?php echo $code[1] ?>"><div></div
					<?php endif; ?>
					><?php 
				if (has_post_thumbnail()) : 
					the_post_thumbnail(); 
				elseif ($featured_post) :
					echo get_the_post_thumbnail($featured_post->ID, 'post-thumbnail'); 
				endif; 
				?></a>
				<?php if ($carousel->show_caption) : ?>
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
					<a class="view-more" href="<?php echo get_field('link') ? get_field($link) : get_permalink($featured_post[0]) ?>">View More&hellip;</a></li>
				</div> <!-- /.caption -->
				<?php endif; ?>
			</div> <!-- /.item -->
		<?php endwhile; // slide loop ?>
	</div> <!-- /.carousel-inner -->
	<!-- Carousel nav -->
	<a class="carousel-control left" href="#<?php echo $class_base ?>-carousel-<?php echo $i ?>" data-slide="prev">&nbsp;</a>
	<a class="carousel-control right" href="#<?php echo $class_base ?>-carousel-<?php echo $i ?>" data-slide="next">&nbsp;</a>
	<!-- Carousel indicator -->
	<ul class="unstyled carousel-indicator">
		<?php for ($j = 0; $j < $carousel->slides->post_count; $j++) : ?>
		<li class="<?php echo $j == 0 ? 'active' : '' ?>"><a href="javascript:void(0)" class="page-<?php echo $j ?>" data-slide_to="<?php echo $j ?>"></a></li>
		<?php endfor; // carousel loop ?>
	</ul>
</div> <!-- /.carousel -->
