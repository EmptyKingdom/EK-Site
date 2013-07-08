<?php get_header(); ?>
<?php if (is_home() && !is_paged()) : ?>
	<?php get_template_part('partials/home', 'carousel') ?>
<?php endif; ?>
<div class="row">
	<div class="span8" id="main">
		<?php get_template_part('partials/view-controls') ?>
		<div id="post-list" class="post-list <!--mfunc <?php echo W3TC_DYNAMIC_SECURITY ?> echo isset($_COOKIE['viewMode']) ? $_COOKIE['viewMode'] : 'list'; --><?php echo isset($_COOKIE['viewMode']) ? $_COOKIE['viewMode'] : 'list' ?><!--/mfunc <?php echo W3TC_DYNAMIC_SECURITY ?> -->">
			<?php get_template_part('partials/posts', 'listing') ?>
		</div> <!-- /#post-list -->
		<?php get_template_part('partials/posts-pagination') ?>
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<?php get_sidebar(); ?>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>