<?php
global $wp_query;
$curauth = $wp_query->get_queried_object();
$pinterest = get_field('pinterest', 'user_'.$curauth->ID);
$facebook = get_field('facebook', 'user_'.$curauth->ID);
$twitter = get_field('twitter', 'user_'.$curauth->ID);
$location = get_field('location', 'user_'.$curauth->ID);
get_header(); ?>
<div id="author-panel" class="container">
	<div class="row">
		<div class="span9 author-general">
			<div class="row">
				<div class="span3 avatar">
					<?php echo get_avatar($curauth->ID, 210) ?>
				</div>
				<div class="span6 bio">
					<h1><?php echo $curauth->display_name ?></h1>
					<h2>Spy Name: <span><?php echo $curauth->first_name ?> <?php echo $curauth->last_name ?></span></h2>
					<p><?php echo $curauth->description ?></p>
					<?php if ($pinterest || $facebook || $twitter) : ?>
					<div class="social-links pull-right">
						<p>Stalk me here: </p>
						<ul class="unstyled ek-social" id="utility-menu">
							<?php if ($pinterest) : ?><li class="pinterest icon"><a href="<?php echo $pinterest ?>" target="_blank">Pinterest</a></li><?php endif; ?>
							<?php if ($facebook) : ?><li class="facebook icon"><a href="<?php echo $facebook ?>" target="_blank">Facebook</a></li><?php endif; ?>
							<?php if ($twitter) : ?><li class="twitter icon"><a href="<?php echo $twitter ?>" target="_blank">Twitter</a></li><?php endif; ?>
						</ul>
					</div> <!-- /.social-links.pull-right -->
					<?php endif; ?>
				</div> <!-- /.span6.bio -->
			</div> <!-- /.row -->
		</div> <!-- /.span9.author-general -->
		<div class="span3 author-details">
			<h3>Location:</h3>
			<p><?php echo $location ?></p>
		</div> <!-- /.span3.author-details -->
	</div> <!-- /.row -->
</div> <!-- /#author-panel -->
<h3 class="recent">Recent Posts By: <span><?php echo $curauth->display_name ?></span></h2>
<div class="row">
	<div class="span8" id="main">
		<?php if (is_category()) : ?>
			<?php get_template_part('/partials/category', 'carousel') ?>
		<?php endif; ?>
		<?php get_template_part('/partials/view-controls') ?>
		<div id="post-list" class="post-list grid">
			<?php get_template_part('/partials/posts', 'listing') ?>
		</div> <!-- /#post-list -->
		<?php get_template_part('partials/posts-pagination') ?>
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<?php get_sidebar(); ?>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>