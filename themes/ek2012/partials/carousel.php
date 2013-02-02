<div id="<?php echo $class_base ?>-carousel-<?php echo $i ?>" class="<?php echo $class_base ?>-carousel carousel carousel-component slide carousel-fade <?php echo $i == 0 ? 'active' : '' ?>">
	<!-- Carousel items -->
	<div class="carousel-inner">
		<?php while ($carousel->slides->have_posts()) : $carousel->slides->the_post(); global $post; ?>
 			<div class="<?php echo $carousel->slides->current_post == 0 ? 'active' : '' ?> item" data-description="#section-<?php echo $i ?>-slide-<?php the_id() ?>">
				<?php if ( ! $hide_title) : ?>
						<h1><a href="<?php echo $post->link ?>"><?php echo $post->title; ?></a></h1>
						<?php if ($post->author || $post->date) : ?>
							<div class="postmeta clearfix">
								<p class="author">by <a href="<?php echo $post->author_link ?>" rel="author"><?php echo $post->author ?></a></p>
								<p class="date"><?php echo $post->date ?></p>
							</div> <!-- /.postmeta -->
						<?php endif; ?>
				<?php endif; // ! $hide_title ?>
				<a href="<?php echo $post->link ? $post->link : 'javascript:void(0)' ?>"<?php
					if ($post->video_code) : ?>
						class="video <?php echo $post->video_provider ?>" data-provider="<?php echo $post->video_provider ?>" data-video_ref="<?php echo $post->video_code[1] ?>"><div></div
					<?php endif; ?>
					><?php echo $post->thumbnail ?></a>
				<?php if ($carousel->show_caption) : ?>
					<div class="caption">
						<?php if ($post->category) : ?>
							<h5 class="category"><?php echo $post->category->name ?></h5>
						<?php endif; ?>
						<p><?php echo $post->excerpt; ?></p>
						<?php if ($post->link) : ?>
							<a class="view-more" href="<?php echo $post->link ?>">View More&hellip;</a>
						<?php endif; ?>
					</div> <!-- /.caption -->
				<?php endif; ?>
			</div> <!-- /.item -->
		<?php unset($featured_post); endwhile; // slide loop ?>
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
