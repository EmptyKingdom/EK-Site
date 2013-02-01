<?php 
	$video_url = $post->featured_video;
	if (preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',$video_url, $code)) :
		$provider = 'youtube';
	elseif (preg_match('%vimeo\.com\/([0-9]*)%', $video_url, $code)) :
		$provider = 'vimeo';
	endif;
	$sharer_title = urlencode($post->post_title);
	$sharer_url = urlencode(get_permalink($post->ID));
	$sharer_img = urlencode(wp_get_attachment_url(get_post_thumbnail_id()));
	$sharer_descr = urlencode(get_the_excerpt());
 ?>
<div class="post <?php echo ek_get_cat($post, 'slug', true) ?> span4">
	<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
	<p class="author">by <?php the_author_posts_link() ?></p>
	<p class="date"><?php the_time(get_option('date_format')) ?></p>
	<div class="thumbnail"><a href="<?php the_permalink() ?>"
		<?php if ($video_url) : ?>
		class="video <?php echo $provider ?>" data-provider="<?php echo $provider ?>" data-video_ref="<?php echo $code[1] ?>"><div></div
		<?php endif; ?>
		><?php the_post_thumbnail() ?></a></div>
	<div class="clearfix">
		<h5 class="category"><?php echo ek_get_cat($post, 'name', true) ?></h5>
		<ul class="unstyled social">
			<li class="facebook"><a href="http://www.facebook.com/share.php?s=100&p[url]=<?php echo $sharer_url ?>&p[title]=<?php echo $sharer_title ?>&p[summary]=<?php echo $sharer_descr ?>&p[images][0]=<?php echo $sharer_img ?>"></a></li>
			<li class="twitter"><a href="https://twitter.com/share?url=<?php echo $sharer_url ?>"></a></li>
			<li class="pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?php echo $sharer_url ?>&media=<?php echo $sharer_img ?>&description=<?php echo $sharer_descr ?>"></a></li>
			<!-- <li class="add"><a href=""></a></li> -->
		</ul>
	</div>
	<div class="excerpt" data-orig_text="<?php echo htmlspecialchars(get_the_excerpt()); ?>"><?php the_excerpt() ?></div>
	<a class="view-more" href="<?php the_permalink() ?>">View More&hellip;</a>
</div>