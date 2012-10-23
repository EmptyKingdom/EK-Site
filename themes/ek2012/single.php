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
get_header(); ?>
<div class="row">
	<div class="span8" id="main">
	<?php if (have_posts()) : ?>
		<div class="post-full <?php echo $category->slug ?>">
		<?php while(have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="meta clearfix">
				<p class="author"><?php the_author(); ?></p>
				<p class="date"><?php the_time(get_option('date_format')) ?></p>
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
			<ul class="post-share unstyled">
				<li class="facebook"><a href="javascript:void(0)">Facebook</a></li>
				<li class="twitter"><a href="javascript:void(0)">Twitter</a></li>
				<li class="stumbleupon"><a href="javascript:void(0)">StumbleUpon</a></li>
				<li class="pinterest"><a href="javascript:void(0)">Pinterest</a></li>
				<li class="email"><a href="javascript:void(0)">Email</a></li>
				<li class="permalink"><a href="javascript:void(0)">Permalink</a></li>
			</ul> <!-- /.post-share.unstyled -->
			<div class="post-content">
				<?php the_content(); ?>
			</div> <!-- /.post-content -->
		<?php endwhile; // have_posts() ?>
		</div> <!-- /.post-full -->
	<?php endif; // have_posts() ?>
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<?php get_sidebar(); ?>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>