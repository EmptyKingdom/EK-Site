<!DOCTYPE html> 
<html>
	<head>  
		<meta charset="utf-8">
	    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); if(is_home()) { echo ' | '; bloginfo('description'); } ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="keywords" content="Art, blog, empty kingdom, film, media, photography, illustration, website, artist">
<!-- 		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap-responsive.min.css" type="text/css" media="screen" charset="utf-8"> -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/ek.css" type="text/css" media="screen" charset="utf-8">
		<script type="text/javascript">
			ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';
			themedir = '<?php echo get_stylesheet_directory_uri() ?>';
			origQuery = <?php echo json_encode($wp_query->query) ?>;
		</script>
		<script type="text/javascript" src="//use.typekit.net/jxu3qru.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri() ?>/js/yepnope.1.5.4-min.js"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/theme.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>
		<div class="container">
			<div id="masthead" class="row">
				<div class="span8 main">
					<h1 id="logo"><a href="<?php echo site_url('/') ?>"><img src="<?php bloginfo('stylesheet_directory') ?>/img/logo.png" id="logo" alt="Empty Kingdom"></a></h1>
					<h2 id="tagline">Tagline changes when you refresh page</h2>
				</div> <!-- /span8 -->
				<div class="span4 side">
					<ul class="unstyled ek-social" id="utility-menu">
						<li><span><a href="#">Register</a> | <a href="#">Login</a></span></li>
						<li class="vimeo icon">Vimeo</li>
						<li class="pinterest icon">Pinterest</li>
						<li class="facebook icon">Facebook</li>
						<li class="twitter icon">Twitter</li>
						<li><a href="#" class="btn btn-primary">EK Store</a></li>
					</ul>
					<div id="basic-search">
						<form action="<?php echo site_url('/') ?>">
							<input type="text" name="s" value="Search your Empty Kingdom">
						</form>
					</div>
				</div> <!-- /span4 -->
			</div> <!-- /masthead -->
			<div id="main-nav" class="">
				<?php $main_menu = wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'container_class' => '',
					'container_id' => 'main-menu-container',
					'menu_class' => '',
					'menu_id' => 'main-menu',
					'fallback_cb' => false,
					'echo' => false,
				));
				echo str_replace('sub-menu', 'sub-menu unstyled', $main_menu)
				?>
			</div>
