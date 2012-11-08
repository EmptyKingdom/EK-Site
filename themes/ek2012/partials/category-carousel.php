<?php 
if (function_exists('ot_get_option')) :
	$category = ek_get_cat(); ?>
	<?php
	$option_str = str_replace('-', '_', $category->slug).'_cat';
	$carousel['type'] = ot_get_option($option_str.'_carousel_type');
	$carousel['slide_collection'] = ot_get_option($option_str.'_carousel_slide_collection');
	$carousel['max_num'] = ot_get_option($option_str.'_carousel_max_num');
	$carousel['post_type'] = ot_get_option($option_str.'_carousel_post_type');
	$carousel['category'] = ot_get_option($option_str.'_carousel_category');
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
			'posts_per_page' => $carousel['max_num'] ? $carousel['max_num'] : 10,
			'order' => 'asc',
		));
	} 
	
	else if ($carousel['type'] == 'recent_posts')
	{
		$carousel['slides'] = new WP_Query(array(
			'post_type' => $carousel['post_type'],
			'posts_per_page' => $carousel['max_num'] ? $carousel['max_num'] : 10,
			'cat' => $carousel['category'] ? $carousel['category'] : '',
			'tag_id' => $carousel['tag'] ? $carousel['tag'] : '',
		));
	}
	
	if ( ! $carousel['slides']->post_count)
	{
		return;
	}
	if ($carousel['slides']->have_posts()) :  ?>
		<div id="category-carousel" class="carousel carousel-component slide carousel-fade <?php echo ek_get_cat($post, 'slug') ?>">
			<!-- Carousel items -->
			<div class="carousel-inner">
				<?php while ($carousel['slides']->have_posts()) : $carousel['slides']->the_post(); 
				$featured_post = get_field('featured_post');
				$featured_post = $featured_post ? $featured_post[0] : $carousel['type'] == 'recent_posts' ? $post : false; ?>
				<div class="<?php echo $carousel['slides']->current_post == 0 ? 'active' : '' ?> item" data-description="#slide-<?php the_id() ?>">
					<h3><?php echo get_the_title() != '' ? get_the_title() : $featured_post->post_title; ?></h3>
					<div class="postmeta clearfix">
						<p class="author">by <?php the_author() ?></p>
						<p class="date"><?php the_time(get_option('date_format')) ?></p>
					</div> <!-- /.postmeta -->
					<div class="img"><?php 
					if (has_post_thumbnail()) : 
						the_post_thumbnail(); 
					elseif ($featured_post) :
						echo get_the_post_thumbnail($featured_post->ID, 'post-thumbnail'); 
					endif; 
					?>
					</div> <!-- /.img -->
					<div class="caption">
						<?php if ($featured_post) : ?>
						<h5 class="category"><?php echo ek_get_cat($featured_post, 'name'); ?></h5>
						<p><?php echo wp_trim_words($featured_post->post_content) ?></p>
						<?php else: ?>
						<?php echo $carousel['type'] == 'slide_collection' ? '<p>'.get_the_content().'</p>' : ''; ?>
						<?php endif; ?>
						<a class="btn" href="<?php echo get_field('link') ? get_field($link) : get_permalink($featured_post) ?>">View More...</a>
					</div> <!-- /.caption -->
				</div> <!-- /.item -->
				<?php endwhile; // slide loop ?>
			</div> <!-- /.carousel-inner -->
			<!-- Carousel nav -->
			<a class="carousel-control left" href="#category-carousel" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#category-carousel" data-slide="next">&rsaquo;</a>
			<!-- Carousel indicator -->
			<ul class="unstyled carousel-indicator">
				<?php for ($j = 0; $j < $carousel['slides']->post_count; $j++) : ?>
				<li class="<?php echo $j == 0 ? 'active' : '' ?>"><a href="javascript:void(0)" class="page-<?php echo $j ?>" data-slide_to="<?php echo $j ?>"></a></li>
				<?php endfor; // carousel loop ?>
			</ul>
		</div> <!-- /.carousel -->
	<?php endif; // slides->has_posts ?>
<?php endif; // function_exists('ot_get_option') ?>
