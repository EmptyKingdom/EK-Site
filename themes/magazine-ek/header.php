<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<?php if(is_home() || is_single() || is_page()) { echo '<meta name="robots" content="index,follow" />'; } else { echo '<meta name="robots" content="noindex,follow" />'; } ?>
    
    <?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <meta name="description" content="<?php metaDesc(); ?>" />
    <?php csv_tags(); ?>
    <?php endwhile; endif; elseif(is_home()) : ?>
<meta name="viewport" content="user-scalable=yes,width=device-width" />  
 <meta name="description" content="<?php if(get_option('uwc_site_description')) { echo stripslashes(get_option('uwc_site_description')); } else { bloginfo('description'); } ?>" />
    <meta name="keywords" content="<?php if(get_option('uwc_keywords')) { echo stripslashes(get_option('uwc_keywords')); } else { echo 'wordpress,c.bavota,magazine basic,custom theme,themes.bavotasan.com,premium themes'; } ?>" />
    <?php endif; ?>
    
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); if(is_home()) { echo ' | '; bloginfo('description'); } ?></title>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/iestyles.css" />
<![endif]-->
<!--[if lte IE 6]>
<script defer type="text/javascript" src="<?php bloginfo('template_url'); ?>/images/pngfix.js"></script>
<![endif]-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 
wp_enqueue_script( 'jquery' );
?>
	<?php wp_head(); ?>
<?php if(get_option('uwc_css_styles')) { echo "<style>\n".stripslashes(get_option('uwc_css_styles'))."\n</style>\n"; } ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/hoverIntent.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/supersubs.js"></script> 
<script type="text/javascript">
	jQuery(function(){
        jQuery("ul.sf-menu").supersubs({ 
            minWidth:    12,
            maxWidth:    27,
            extraWidth:  1
        }).superfish({ 
            delay:       100,
            speed:       250 
        });	});
</script>

</head>

<body>
<!-- begin header -->
<div id="header">
	<?php if (get_option('uwc_user_login') != "2") { ?>
	<div id="login">
    	<?php
			global $user_identity, $user_level;
			if (is_user_logged_in()) { ?>
            	<ul>
                <li><span style="float:left;"><?php _e("Logged in as:", "magazine-basic"); ?><strong> <?php echo $user_identity ?></strong></span></li>
				<li><a href="<?php bloginfo('url'); ?>/wp-admin"><?php _e("Control Panel", "magazine-basic"); ?></a></li>
                <?php if ( $user_level >= 1 ) { ?>
                	<li class="dot"><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><?php _e("Write", "magazine-basic"); ?></a></li>
				<?php } ?>
                <li class="dot"><a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><?php _e("Profile", "magazine-basic"); ?></a></li>
				<li class="dot"><a href="<?php echo wp_logout_url() ?>&amp;redirect_to=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>" title="<?php _e('Log Out', "magazine-basic") ?>"><?php _e('Log Out', "magazine-basic"); ?></a></li>
                </ul>
            <?php 
			} else {
				echo '<ul>';
				echo '<li><a href="'.get_bloginfo("url").'/wp-login.php">'.__('Log In', "magazine-basic").'</a></li>';
				if (get_option('users_can_register')) { ?>
					<li class="dot"><a href="<?php echo site_url('wp-login.php?action=register', 'login') ?>"><?php _e('Register', "magazine-basic") ?></a> </li>
                
            <?php 
				}
				echo "</ul>";
			} ?> 
    </div>
    <?php } ?>
    <?php if(get_option('uwc_header_ad') == 'on') { ?>
		<?php if(get_option('uwc_headerad_img')) { ?>
            <div id="headerad">
                <a href="<?php echo get_option('uwc_headerad_link'); ?>"><img src="<?php echo get_option('uwc_headerad_img'); ?>" alt="" /></a>
            </div>
        <?php } else { ?>
            <div id="headerad">
                <a href="http://themes.bavotasan.com"><img src="<?php bloginfo('template_url'); ?>/images/topbanner.png" alt="Themes by bavotasan.com" /></a>
            </div>
        <?php } ?>
    <?php } ?>
	<?php if (get_option('uwc_logo_header')) { ?>
    <div id="title">
    	<a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('uwc_logo_header'); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
    </div>    	

<div id="ek_search"><?php include 'searchform.php'; ?></div>

    <?php } else { ?>
    <div id="title">
    	<a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>
    </div>
    <?php } ?>

    </div>

    <div id="navigation">
        <ul class="sf-menu">
        <li><a href="<?php bloginfo('url'); ?>"><?php _e('Home', "magazine-basic"); ?></a></li>
        <?php 
			$cats = get_option('uwc_category_include');
			if($cats) {
				if(strtolower($cats) == "all") {
					wp_list_categories('title_li=');
				} else {
					wp_list_categories('title_li=&include='.$cats);
				}
			} else {
				wp_list_categories('title_li=&number=8');
			}
		?>
        </ul>
    </div>
    <div id="sub-navigation">
    	<ul>
        <?php 
			$pages = get_option('uwc_pages_include');
			if($pages) {
				if(strtolower($pages) == "all") {
					wp_list_pages('title_li=');
				} else {
					wp_list_pages('title_li=&include='.$pages);
				}
			} else {
				wp_list_pages('title_li=&number=8');
			}
		?>
        </ul>
        <ul>
        <li class="nodot"><a href="<?php bloginfo('url'); ?>?feed=rss2"><?php _e('Subscribe', "magazine-basic"); ?></a></li>
		<?php if(get_option('uwc_nav_date') == "1") { echo '<li class="nodot right-d">'.date(get_option('date_format')).'</li>'; } ?>
        </ul>
     </div>
</div>


<!-- end header -->


<div id="mainwrapper">
<?php
	if(get_option('uwc_site_sidebars') == "1" && get_option('uwc_sidebar_location') == "1") {   	
		get_sidebar(1);
	}
	if(get_option('uwc_site_sidebars') == "2" && get_option('uwc_sidebar_location') == "5") {   	
		get_sidebar(1);
	}	
	if(get_option('uwc_site_sidebars') == "2" && get_option('uwc_sidebar_location') == "3") {   	
		get_sidebar(1);
		include(TEMPLATEPATH.'/sidebar2.php');
	}
	if(get_option('uwc_site_sidebars') == "" && get_option('uwc_sidebar_location') == "") {   	
		get_sidebar(1);
	}
	?>
	<div id="leftcontent">
