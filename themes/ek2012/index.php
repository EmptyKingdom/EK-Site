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
		<!-- Ad slot -->
		<div id="ad-slot-1">
			<img src="http://www.dummyimag.es/300x250/000/fff.png&text=300x250%20AD%20UNIT">
		</div> <!-- /#ad-slot-1 -->

		<!-- Newsletter signup -->
		<div class="newsletter-signup">
			<h4><strong>Empty Kingdom</strong> Newsletter</h4>
			<form class="form-inline input-append">
				<input type="text" name="newsletter-signup">
				<button class="btn btn-inverse" type="submit">Subscribe<span class="arrow"></span></button>
			</form>
		</div> <!-- /.newsletter-signup -->

		<!-- Widget -->
		<div class="widget facebook">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			</script>
			<h4>EK Comrades</h4>
			<div class="content">
				<div class="facebookOuter">
					<div class="fb-like-box" 
					data-href="https://www.facebook.com/pages/Empty-Kingdom/151292131589404" 
					data-width="292" 
					data-show-faces="true" 
					data-border-color="#F5F5F5" 
					data-stream="false" 
					data-header="false"></div>
				</div>
			</div> <!-- /.content -->
		</div> <!-- /.widget -->

		<?php dynamic_sidebar('Sidebar 1') ?>

	</div> <!-- /#sidebar -->
</div> <!-- /.row -->
<?php get_footer(); ?>