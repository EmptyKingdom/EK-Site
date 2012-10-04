<?php get_header(); ?>
<?php get_template_part('/partials/home', 'carousel') ?>
<?php get_template_part('/partials/view-controls') ?>
<div class="row">
	<div class="span8" id="main">
		<div id="post-list" class="grid">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('/partials/loop', 'post') ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div> <!-- /#post-list -->
	</div> <!-- /#main -->
	<div class="span4" id="sidebar">
		<!-- Ad slot -->
		<div id="ad-slot-1">
			<img src="http://www.dummyimag.es/300x250/000/fff.png&text=300x250%20AD%20UNIT">
		</div> <!-- /#ad-slot-1 -->
		<!-- Newsletter signup -->
		<div class="newsletter-signup">
			<h4><strong>Empty Kingdom</strong> Newsletter</h4>
			<form class="form-inline input-append">
				<input type="text" name="newsletter-signup">
				<button class="btn btn-inverse" type="submit">Subscribe</button>
			</form>
		</div>
	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>