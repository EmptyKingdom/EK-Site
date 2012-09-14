<?php get_header(); ?>
	<?php	
    $options = get_option("widget_sideFeature");
    $posts = get_option('uwc_number_posts');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if (is_active_widget('widget_myFeature')) {
        $args = array(
           'cat'=>'-'.$options['category'],
           'showposts'=>$posts,
           'paged'=>$paged,
           );
    } else {
        $args = array(
           'showposts'=>$posts,
           'paged'=>$paged,
           );
    }
	if(!get_option('uwc_number_posts')) {
        $args = array(
           'showposts'=>6,
           'paged'=>$paged,
           );		
	}       	
    $x = 1;
    query_posts($args);
    ?>
    <?php 
	if(!stristr($_SERVER['REQUEST_URI'],'/page/')) { 
		if(get_option('uwc_latest_story') == "on") { echo '<h5 class="latest">'.__('Latest Story', "magazine-basic").'</h5>'; }
		if(get_option('uwc_post_layout') == 1) { include (TEMPLATEPATH.'/layout/option1.php'); }
		elseif(get_option('uwc_post_layout') == 2) { include (TEMPLATEPATH.'/layout/option2.php'); }
		elseif(get_option('uwc_post_layout') == 4) { include (TEMPLATEPATH.'/layout/option4.php'); }
		else { include (TEMPLATEPATH.'/layout/option3.php'); }
	} else {
		include (TEMPLATEPATH.'/layout/option1.php');
	}	
    ?>
	<?php
    if(function_exists('pagination')) { pagination(); }
    ?>
<?php get_footer(); ?>