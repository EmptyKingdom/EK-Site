<?php get_header(); ?>
<?php if (is_home() && !is_paged()) : ?>
	<?php get_template_part('/partials/home', 'carousel') ?>
<?php endif; ?>
<div class="row">
	<div class="span8" id="main">
		<?php get_template_part('/partials/view-controls') ?>
		<div id="post-list" class="post-list grid">
			<?php get_template_part('/partials/posts', 'listing') ?>
		</div> <!-- /#post-list -->
		<div class="row" id="posts-pagination">
			<div class="offset4 span4">
				<div class="row">
					<h4 class="span2 prev"><?php previous_posts_link('Previous') ?></h4>
					<h4 class="span2 next"><?php next_posts_link('Next') ?></h4>
				</div>
			</div>
		</div>
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<?php get_sidebar(); ?>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>