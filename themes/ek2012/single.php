<?php 
global $post;
$arr = apply_filters('comments_array', array(), $post->ID);
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
			<?php get_template_part('/partials/post', 'actions') ?>
			<h5 class="category"><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a></h5>
			<div class="post-content">
				<?php the_content(); ?>
			</div> <!-- /.post-content -->
			<?php get_template_part('/partials/post', 'actions') ?>
		<?php endwhile; // have_posts() ?>
		</div> <!-- /.post-full -->
		<div id="related-artists" class="post-addendum">
			<h2>
				Artists You Might Also Like
				<span class="more-posts">
					<a class="prev" href="javascript:void(0)">prev posts</a>
					<a class="next" href="javascript:void(0)">more posts</a>
				</span>
			</h2>
			<div class="post-list row" data-cats="<?php echo $category->term_id ?>" data-cur_page="1" data-max_page="1" data-nonce="<?php echo wp_create_nonce('ek_load_posts') ?>">
			<?php 
			while ($related_artists->have_posts()) : $related_artists->the_post();
			get_template_part('/partials/loop', 'post');
			endwhile;
			?>
			</div>
		</div>
		<div id="comments" class="post-addendum">
			<h2>Comments</h2>
			<?php comments_template(); ?>
		</div>
		<p><?php the_tags(); ?></p>
	<?php else : // have_posts() ?>
		<p>Post not found.</p>
	<?php endif; // have_posts() ?>
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<?php get_sidebar(); ?>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>