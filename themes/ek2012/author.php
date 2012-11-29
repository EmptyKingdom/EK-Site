<?php
global $wp_query;
$curauth = $wp_query->get_queried_object();
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
					<div class="social pull-right">
						<p>Stalk me here: </p>
						<ul class="unstyled ek-social" id="utility-menu">
							<li class="pinterest icon">Pinterest</li>
							<li class="facebook icon">Facebook</li>
							<li class="twitter icon">Twitter</li>
						</ul>
					</div> <!-- /.social.pull-right -->
				</div> <!-- /.span6.bio -->
			</div> <!-- /.row -->
		</div> <!-- /.span9.author-general -->
		<div class="span3 author-details">
			<h3>Location:</h3>
			<p>Somewhere U.S.A.</p>
		</div> <!-- /.span3.author-details -->
	</div> <!-- /.row -->
</div> <!-- /#author-panel -->
<div class="row">
	<div class="span8 <?php echo ek_get_cat(false, 'slug', true) ?>" id="main">
		<?php if (is_category()) : ?>
			<?php get_template_part('/partials/category', 'carousel') ?>
		<?php endif; ?>
		<?php get_template_part('/partials/view-controls') ?>
		<div id="post-list" class="post-list grid">
			<?php get_template_part('/partials/posts', 'listing') ?>
		</div> <!-- /#post-list -->
		<div class="row">
			<div class="prev span4">
				<h4><?php previous_posts_link('&laquo; Previous') ?></h4>
			</div>
			<div class="next span4">
				<h4><?php next_posts_link('Next &raquo;') ?></h4>
			</div>
		</div>
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<?php get_sidebar(); ?>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>