<?php $categories = get_the_category() ?>
<?php foreach($categories as $category) : ?>
	<?php if (in_array($category->slug, array('illustration-art', 'film', 'photography', 'new-media', 'event', 'interview'))) : ?>
		<?php $the_category = $category;
		break; ?>		
	<?php endif; ?>
<?php endforeach; ?>
<div class="post <?php echo $the_category->slug ?> span4">
	<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
	<p class="author">by <?php the_author() ?></p>
	<p class="date"><?php the_time(get_option('date_format')) ?></p>
	<div class="thumbnail"><?php the_post_thumbnail() ?></div>
	<h5 class="category"><?php echo $the_category->name ?></h5>
	<div class="excerpt"><?php the_excerpt() ?></div>
	<a class="btn" href="<?php the_permalink() ?>">View More...</a>
</div>