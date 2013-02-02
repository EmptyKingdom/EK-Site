<?php if ($side_captions) : ?>
	<div class="span8 has-side-captions">
<?php endif; ?>
<?php
foreach ($carousels as $i => $carousel) :
	if ($carousel->slides->have_posts()) : 
		include(locate_template('partials/carousel.php'));
	endif; // slides->has_posts
endforeach; 
?>
<?php if ($side_captions) : ?>
</div> <!-- /.span8 -->
<?php endif; ?>
<?php if ($side_captions) : ?>
<div class="span4">
	<div id="carousel-sections">
		<?php if (count($carousels) > 1) : ?>
		<!-- Carousel Section Nav -->
		<ul class="unstyled" id="carousel-section-nav">
			<?php foreach($carousels as $i => &$carousel) : ?>
				<?php if ($carousel->slides->have_posts()) : ?>
			<li class="<?php echo $i == 0 ? 'active' : '' ?>"<?php if (count($carousels) < 3) : echo ' style="width: '.((100/count($carousels))-.5).'%"'; endif; ?>>
				<a data-section="#carousel-section-<?php echo $i ?>" data-carousel="#<?php echo $class_base ?>-carousel-<?php echo $i ?>" class="carousel-section" href="javascript:void(0)"><?php echo $carousel->title ?></a>
			</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
		<?php endif; // count($carousels) > 1 ?>
		<!-- Carousel Sections -->
		<?php foreach ($carousels as $i => &$carousel) : ?>
		<div class="<?php echo $i == 0 ? 'active' : '' ?> carousel-section-content" id="carousel-section-<?php echo $i ?>">
			<?php if ($carousel->slides->have_posts()) : ?>
			<ul class="unstyled">
				<?php while($carousel->slides->have_posts()) : $carousel->slides->the_post(); global $post; ?>
				<li class="slide-description <?php echo $carousel->slides->current_post == 0 ? 'active' : '' ?> <?php echo $post->category->slug ?>" id="section-<?php echo $i ?>-slide-<?php the_id() ?>">
					<?php if ($post->category) : ?>
					<h5 class="category"><a href="<?php echo get_term_link($post->category) ?>"><?php echo $post->category->name ?></a></h5>
					<?php endif; ?>
					<h3><?php echo $post->title ?></h3>
					<?php if ($post->date || $post->author) : ?>
					<p class="postmeta"><?php echo $post->date ?> by  <?php echo $post->author ?></p>
					<?php endif; ?>
					<p><?php echo $post->excerpt ?></p>
					<?php if ($post->link) : ?>
						<a class="btn btn-default" href="<?php echo $post->link ?>">View More...</a>
					<?php endif; ?>
				</li>
				<?php endwhile; // slide loop ?>
			</ul>
			<?php endif; // slides->has_posts() ?>
		</div> <!-- /#carousel-section-0 -->
		<?php endforeach; // carousel loop ?>
	</div> <!-- /#carousel-sections -->
</div> <!-- /.span4 -->
<?php endif; // $show_captions ?>