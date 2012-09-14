<?php get_header(); ?>

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="catheader"><?php single_cat_title(); ?></h1>
	  <?php $catdesc = category_description(); if(stristr($catdesc,'<p>')) { echo '<div class="catdesc">'.$catdesc.'</div>'; } ?>   
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
      	<h1 class="catheader"><?php printf(__("Posts Tagged &#8216; %s &#8217;", "magazine-basic"), single_tag_title('',false)); ?></h1>
        <div id="tagcloud"><?php wp_tag_cloud('smallest=8&largest=16'); ?></div>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="catheader"><?php _e("Archive for ", "magazine-basic").the_time('F jS, Y'); ?></h1>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="catheader"><?php _e("Archive for ", "magazine-basic").the_time('F, Y'); ?></h1>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="catheader"><?php _e("Archive for ", "magazine-basic").the_time('Y'); ?></h1>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="catheader"><?php _e("Author Archive", "magazine-basic"); ?></h1>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="catheader"><?php _e("Blog Archives", "magazine-basic"); ?></h1>
 	  <?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<div class="posts">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__("Permanent Link to %s", "magazine-basic"), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
		        <div class="meta">  
                    <?php if(get_option('uwc_dates_cats') == 'on') { echo '<div class="date">'; the_time(get_option('date_format')); echo '</div>'; } ?>
                    <?php if(get_option('uwc_authors_cats') == 'on') { _e("By", "magazine-basic"); echo ' '; the_author_posts_link(); } ?> 
				</div>
				<div class="storycontent">
	            	<?php resize(650,320); ?>
    	            <?php theme_excerpt('55') ?>
				</div>
				<p class="meta"><?php edit_post_link(__("Edit", "magazine-basic"), '', ' | '); ?>  <?php comments_popup_link(__( 'No Comments &#187;', "magazine-basic"), __('1 Comment &#187;', "magazine-basic"), __('% Comments &#187;', "magazine-basic")); ?></p>
										
			</div>

		<?php endwhile; ?>

	<?php
    if(function_exists('pagination')) { pagination(); }
    ?>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf(__("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", "magazine-basic"), single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			_e("<h2>Sorry, but there aren't any posts with this date.</h2>", "magazine-basic");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf(__("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", "magazine-basic"), $userdata->display_name);
		} else {
			_e("<h2 class='center'>No posts found.</h2>", "magazine-basic");
		}

	endif;
?>

<?php get_footer(); ?>
