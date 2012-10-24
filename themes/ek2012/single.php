<?php 
function ek_hide_featured_image_from_content(){
	global $post; 
	if (strtotime($post->post_date) < strtotime('November 1, 2012'))
	{
		$thumbnail_id = get_post_thumbnail_id($post->ID);	?>
		<style type="text/css" media="screen">
			.post-content .wp-image-<?php echo $thumbnail_id ?> {display: none}
		</style>
		<?php
	}
}
add_action('wp_head', 'ek_hide_featured_image_from_content');
global $post;
$category = ek_get_cat($post);
$related_artists = new WP_Query(array(
	'category__in' => $category->term_id,
	'posts_per_page' => 3,
));
get_header(); ?>
<div class="row">
	<div class="span8" id="main">
	<?php if (have_posts()) : ?>
		<div class="post-full <?php echo $category->slug ?>">
		<?php while(have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="meta clearfix">
				<p class="author">by <?php the_author(); ?></p>
				<p class="date">Published on <?php the_time(get_option('date_format')) ?></p>
				<p class="posts-nav">
					<a class="prev" href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"></a>
					<a class="next" href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"></a>
				</p>
			</div> <!-- /.meta -->
			<div class="featured-image"><?php the_post_thumbnail('full') ?></div>
			<div class="sub-img clearfix">
				<h5 class="category"><?php echo $category->name ?></h5>
<!-- 				<p class="heart"><a href="javascript:void(0)">Add</a></p> -->
			</div> <!-- /.category -->
			<?php get_template_part('/partials/post', 'share') ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div> <!-- /.post-content -->
			<?php get_template_part('/partials/post', 'share') ?>
		<?php endwhile; // have_posts() ?>
		</div> <!-- /.post-full -->
		<div id="related-artists">
			<h2>
				Artists You Might Also Like
				<span class="more-posts">
					<a class="prev" href="javascript:void(0)">prev posts</a>
					<a class="next" href="javascript:void(0)">more posts</a>
				</span>
			</h2>
			<div class="post-list row" data-cats="<?php echo $category->term_id ?>" data-cur_page="1" data-max_page="1">
			<?php global $wp_query; $wp_query = $related_artists; 
			while (have_posts()) : the_post();
			get_template_part('/partials/loop', 'post');
			endwhile;
			?>
			</div>
		</div>
	<?php else : // have_posts() ?>
		<p>Post not found.</p>
	<?php endif; // have_posts() ?>
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<?php get_sidebar(); ?>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>