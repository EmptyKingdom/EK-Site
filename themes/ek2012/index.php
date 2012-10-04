<?php get_header(); ?>
<?php get_template_part('/partials/home', 'carousel') ?>
<div class="row">
	<div class="span8" id="main">
		<?php get_template_part('/partials/view-controls') ?>
		<div id="post-list" class="grid">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('/partials/loop', 'post') ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div> <!-- /#post-list -->
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>