		</div> <!-- /container -->
		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="span4" id="footer-left">
						<?php dynamic_sidebar('Footer Left') ?>
					</div> <!-- /.span4 -->
					<div class="span4" id="footer-middle">
						<div class="row">
							<div class="span2 quicklinks">
								<h4>EK Quicklinks</h4>
								<div class="footer-nav">
									<?php wp_nav_menu(array(
										'theme_location' => 'quick-links-footer',
										'container_class' => '',
										'menu_class' => '',
										'items_wrap'      => '<ul id="%1$s" class="unstyled">%3$s</ul>',
										'fallback_cb' => false,
									)) ?>
								</div> <!-- /.footer-nav -->
								<div class="footer-categories">
									<ul class="unstyled">
										<?php wp_list_categories('depth=1&exclude=1&orderby=count&order=desc&title_li=') ?>
									</ul>
								</div> <!-- /.footer-categories -->
							</div> <!-- /.span2 -->
							<div class="span2 authors">
								<h4>Authors</h4>
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
				<div id="ad-slot-2" class="ad-slot">
					<!-- EK_BTF_Footer_728x90 -->
					<div id='div-gpt-ad-1358972561550-1'>
					<script type='text/javascript'>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1358972561550-1'); });
					</script>
					</div>
				</div> <!-- /#ad-slot-1 -->

			</div> <!-- /.container -->
		</div> <!-- /#footer -->
	<?php wp_footer(); ?>
	</body>
</html>