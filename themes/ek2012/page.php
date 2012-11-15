<?php 
function ek_hide_featured_image_from_content(){
	global $post; 
	{
		$thumbnail_id = get_post_thumbnail_id($post->ID);	?>
		<style type="text/css" media="screen">
			.post-content .wp-image-<?php echo $thumbnail_id ?> {display: none}
		</style>
		<?php
	}
}
add_action('wp_head', 'ek_hide_featured_image_from_content');
get_header(); ?>
<div class="row">
	<div class="span8" id="main">
	<?php if (have_posts()) : ?>
		<div class="post-full">
		<?php while(have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="featured-image"><?php the_post_thumbnail('full') ?></div>
			<?php get_template_part('/partials/post', 'share') ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div> <!-- /.post-content -->
			<?php get_template_part('/partials/post', 'share') ?>
		<?php endwhile; // have_posts() ?>
		</div> <!-- /.post-full -->
	<?php else : // have_posts() ?>
		<p>Post not found.</p>
	<?php endif; // have_posts() ?>
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<?php get_sidebar(); ?>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>