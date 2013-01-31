<?php 
global $post;
$arr = apply_filters('comments_array', array(), $post->ID);
$category = ek_get_cat($post);
$related_artists = new WP_Query(array(
	'category__in' => $category->term_id,
	'posts_per_page' => 3,
));
$p = get_adjacent_post(false,'',true);
$n = get_adjacent_post(false,'',false);
get_header(); ?>
<div class="row">
	<div class="span8" id="main">
	<?php if (have_posts()) : ?>
		<div class="post-full <?php echo $category->slug ?> clearfix">
		<?php while(have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="meta clearfix">
				<p class="author">by <?php the_author(); ?><span class="date">Published on <?php the_time(get_option('date_format')) ?></span></p>
				<h5 class="category"><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a></h5>
				<p class="posts-nav">
					<?php if ($p) : ?>
						<a class="prev" href="<?php echo get_permalink($p->ID); ?>" title="<?php echo $p->post_title ?>"></a>
					<?php else : ?>
						<a class="prev" href="javascript:void(0)" title="No previous post."></a>
					<?php endif; ?>
					<?php  if ($n) : ?>
						<a class="next" href="<?php echo get_permalink($n->ID); ?>" title="<?php echo $n->post_title ?>"></a>
					<?php else : ?>
						<a class="next" href="javascript:void(0)" title="No next post."></a>
					<?php endif; ?>
				</p>
			</div> <!-- /.meta -->
			<?php get_template_part('/partials/post', 'actions') ?>
			<div class="post-content">
				<?php the_content(); ?>
				<hr>
				<p><span class="highlight">Posted in:</span> <?php the_category(', ') ?><br>
				<span class="highlight">Tags:</span> <?php the_tags(''); ?></p>
			</div> <!-- /.post-content -->
			<?php get_template_part('/partials/post', 'actions') ?>
		<?php endwhile; // have_posts() ?>
		</div> <!-- /.post-full -->
		<div id="related-artists" class="post-addendum">
			<h2>
				More Dope
				<span class="more-posts">
					<a class="prev" href="javascript:void(0)">prev posts</a>
					<a class="next" href="javascript:void(0)">more posts</a>
				</span>
			</h2>
			<div class="post-list" data-cats="<?php echo $category->term_id ?>" data-cur_page="1" data-max_page="1" data-nonce="<?php echo wp_create_nonce('ek_load_posts') ?>" style="left: 0%">
				<div class="slide-container row active">
					<div class="span8">
						<div class="row">
							<?php 
							while ($related_artists->have_posts()) : $related_artists->the_post();
								get_template_part('/partials/loop', 'post');
							endwhile;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="comments" class="post-addendum">
			<h2>Comments</h2>
			<?php comments_template(); ?>
		</div>
		<div class="row posts-nav">
			<div class="span4 prev">
				<?php if ($p) : ?>
				<h3><a href="<?php echo get_permalink($p->ID) ?>">&laquo; <?php echo $p->post_title ?></a></h3>
				<?php endif; ?>
			</div>
			<div class="span4 next">
				<?php if ($n) : ?>
				<h3><a href="<?php echo get_permalink($n->ID); ?>"><?php echo $n->post_title ?> &raquo;</a></h3>
				<?php endif; ?>
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
<div id="img-sharer">
	<ul class="unstyled social">
		<li class="facebook"><a href="http://www.facebook.com/share.php?s=100&p[url]=~shareURL~&p[title]=~shareTitle~&p[summary]=~shareDescription~&p[images][0]=~shareImg~"></a></li>
		<li class="twitter"><a href="https://twitter.com/share?url=~shareURL~"></a></li>
		<li class="pinterest"><a href="https://pinterest.com/pin/create/button/?url=~shareURL~&media=~shareImg~&description=~shareDescription~"></a></li>
		<!-- <li class="add"><a href=""></a></li> -->
	</ul>
</div>
<?php get_footer(); ?>