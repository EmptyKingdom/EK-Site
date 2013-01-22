			<ul class="post-share unstyled">
				<li class="facebook">
					<a href="javascript:void(0)" class="service">Facebook</a>
					<div class="action">
						<div class="fb-like" data-href="<?php echo urlencode(get_permalink()) ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true" data-font="lucida grande"></div>
					</div>
				</li>
				<li class="twitter">
					<a href="javascript:void(0)" class="service">Twitter</a>
					<div class="action">
						<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</li>
				<li class="stumbleupon">
					<a href="javascript:void(0)" class="service">StumbleUpon</a>
					<div class="action">
						<!-- Place this tag where you want the su badge to render -->
						<su:badge layout="1"></su:badge>
						
						<!-- Place this snippet wherever appropriate -->
						<script type="text/javascript">
						  (function() {
						    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
						    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
						    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
						  })();
						</script>
					</div>
				</li>
				<li class="pinterest">
					<a href="javascript:void(0)" class="service">Pinterest</a>
					<div class="action">
						<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()) ?>&media=<?php echo urlencode(wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "standard" )) ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
					</div>
				</li>
				<li class="gplus">
					<a href="javascript:void(0)" class="service">Google+</a>
					<div class="action">
						<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
						<g:plusone size="medium"></g:plusone>
					</div>
				</li>
				<li class="email">
					<a href="javascript:void(0)" class="service">Email</a>
					<div class="action">
						<a class="btn btn-inverse" href="mailto:?subject=<?php echo htmlentities(get_the_title()) ?> on Empty Kingdom&body=Check this out: <?php echo htmlentities(get_permalink()) ?>">Email Link</a>
					</div>
				</li>
			</ul> <!-- /.post-share.unstyled -->
