<div id="feature" class="row">
<?php 
if (function_exists('ot_get_option')) :
	$carousels = array_slice(ot_get_option('home_carousels', array()), 0, 3); ?>
	<div class="span8">
	<?php
	foreach ($carousels as $i => &$carousel) :
		if ($carousel['type'] == 'slide_collection' && $carousel['slide_collection'])
		{
			$carousel['slides'] = new WP_Query(array(
				'post_type' => 'slide',
				'tax_query' => array(
					array(
						'taxonomy' => 'slide_collections',
						'field' => 'id',
						'terms' => $carousel['slide_collection'],
					)
				),
				'posts_per_page' => $carousel['max_num'] ? $carousel['max_num'] : 5,
				'order' => 'asc',
			));
		} 
		
		else if ($carousel['type'] == 'recent_posts')
		{
			$carousel['slides'] = new WP_Query(array(
				'post_type' => $carousel['post_type'],
				'posts_per_page' => $carousel['max_num'] ? $carousel['max_num'] : 5,
				'cat' => $carousel['category'] ? $carousel['category'] : '',
				'tag_id' => $carousel['tag'] ? $carousel['tag'] : '',
			));
		}
		
		if ( ! $carousel['slides']->post_count)
		{
			unset($carousels[$i]);
		}
/* 		print_r($carousel); */
	endforeach;
	$carousels = array_values($carousels);
	foreach ($carousels as $i => &$carousel) :
		if ($carousel['slides']->have_posts()) :  ?>
		<div id="featured-carousel-<?php echo $i ?>" class="carousel carousel-component slide carousel-fade <?php echo $i == 0 ? 'active' : '' ?>">
			<!-- Carousel items -->
			<div class="carousel-inner">
				<?php while ($carousel['slides']->have_posts()) : $carousel['slides']->the_post(); $featured_post = get_field('featured_post'); ?>
				<div class="<?php echo $carousel['slides']->current_post == 0 ? 'active' : '' ?> item" data-description="#slide-<?php the_id() ?>">
					<?php 
					if (has_post_thumbnail()) : 
						the_post_thumbnail(); 
					elseif ($featured_post) :
						echo get_the_post_thumbnail($featured_post[0]->ID, 'post-thumbnail'); 
					endif; 
					?>
				</div>
				<?php endwhile; // slide loop ?>
			</div> <!-- /.carousel-inner -->
			<!-- Carousel nav -->
			<a class="carousel-control left" href="#featured-carousel-<?php echo $i ?>" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#featured-carousel-<?php echo $i ?>" data-slide="next">&rsaquo;</a>
			<!-- Carousel indicator -->
			<ul class="unstyled carousel-indicator">
				<?php for ($j = 0; $j < $carousel['slides']->post_count; $j++) : ?>
				<li class="<?php echo $j == 0 ? 'active' : '' ?>"><a href="javascript:void(0)" class="page-<?php echo $j ?>" data-slide_to="<?php echo $j ?>"></a></li>
				<?php endfor; // carousel loop ?>
			</ul>
		</div> <!-- /.carousel -->
		<?php else : unset($carousels[$i]); // slides->has_posts ?>
		<?php endif; // slides->has_posts ?>
	<?php endforeach; ?>
	</div> <!-- /.span8 -->
	<div class="span4">
		<div id="carousel-sections">
			<!-- Carousel Section Nav -->
			<ul class="unstyled" id="carousel-section-nav">
				<?php foreach($carousels as $i => &$carousel) : ?>
					<?php if ($carousel['slides']->have_posts()) : ?>
				<li class="<?php echo $i == 0 ? 'active' : '' ?>"<?php if (count($carousels) < 3) : echo ' style="width: '.((100/count($carousels))-.5).'%"'; endif; ?>>
					<a data-section="#carousel-section-<?php echo $i ?>" data-carousel="#featured-carousel-<?php echo $i ?>" class="carousel-section" href="javascript:void(0)"><?php echo $carousel['title'] ?></a>
				</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<!-- Carousel Sections -->
			<?php foreach ($carousels as $i => &$carousel) : ?>
			<div class="<?php echo $i == 0 ? 'active' : '' ?> carousel-section-content" id="carousel-section-<?php echo $i ?>">
				<?php if ($carousel['slides']->have_posts()) : ?>
				<ul class="unstyled">
					<?php while($carousel['slides']->have_posts()) : $carousel['slides']->the_post(); ?>
					<?php 
					global $post;
					$featured_post = ($carousel['type'] == 'slide_collection') ? get_field('featured_post') : array($post); ?>
					<li class="<?php echo $carousel['slides']->current_post == 0 ? 'active' : '' ?> <?php echo $featured_post ? ek_get_cat($featured_post[0], 'slug') : '' ?>" id="slide-<?php the_id() ?>">
						<?php if ($featured_post) : ?>
						<h5 class="category"><?php echo ek_get_cat($featured_post[0], 'name'); ?></h5>
						<?php endif; ?>
						<h3><?php echo get_the_title() != '' ? get_the_title() : $featured_post[0]->post_title; ?></h3>
						<?php if ($featured_post) : ?>
						<p class="postmeta"><?php echo get_the_time(get_option('date_format'), $featured_post[0]) ?> by  <?php echo get_the_author($featured_post[0]); ?></p>
						<p><?php echo wp_trim_words($featured_post[0]->post_content) ?></p>
						<?php else: ?>
						<?php echo $carousel['type'] == 'slide_collection' ? get_the_content() : '<p>'.get_the_excerpt().'</p>'; ?>
						<?php endif; ?>
						<a class="btn btn-default" href="<?php echo get_field('link') ? get_field($link) : get_permalink($featured_post[0]) ?>">View More...</a>
					</li>
					<?php endwhile; // slide loop ?>
				</ul>
				<?php endif; // slides->has_posts() ?>
			</div> <!-- /#carousel-section-0 -->
			<?php endforeach; // carousel loop ?>
		</div> <!-- /#carousel-sections -->
	</div> <!-- /.span4 -->
<?php
endif; // function_exists('ot_get_option') ?>
</div> <!-- /#feature.row -->
