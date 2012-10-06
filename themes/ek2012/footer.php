		</div> <!-- /container -->
		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="span4" id="footer-left">
						<?php dynamic_sidebar('Footer Left') ?>
					</div> <!-- /.span4 -->
					<div class="span4" id="footer-middle">
						<div class="row">
							<div class="span2">
								<h4>EK Quicklinks</h4>
							</div>
							<div class="span1">
								<h4>Authors</h4>
							</div>
						</div>
						<div class="row">
							<div class="span1">
							<?php wp_nav_menu(array(
								'theme_location' => 'quick-links-footer',
								'container_class' => '',
								'menu_class' => '',
								'items_wrap'      => '<ul id="%1$s" class="unstyled">%3$s</ul>',
								'fallback_cb' => false,
							)) ?>
							</div> <!-- /.span1 -->
							<div class="span1">
								<ul class="unstyled">
									<?php wp_list_categories('depth=1&title_li=') ?>
								</ul>
							</div> <!-- /.span1 -->
							<div class="span2">
								<ul class="unstyled">
									<?php wp_list_authors('depth=1&title_li=') ?>
								</ul>
							</div> <!-- /.span1 -->
						</div> <!-- /.row -->
					</div> <!-- /.span4 --> 
					<div class="span4" id="footer-right">
						<?php dynamic_sidebar('Footer Right') ?>
					</div> <!-- /.span4 -->
				</div> <!-- /.row -->

			</div> <!-- /.container -->
		</div> <!-- /#footer -->
	<?php wp_footer(); ?>
	</body>
</html>