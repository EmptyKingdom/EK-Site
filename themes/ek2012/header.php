<!DOCTYPE html> 
<html>
	<head>  
	<!-- Hello from EK -->
		<meta charset="utf-8">
	    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); if(is_home()) { echo ' | '; bloginfo('description'); } ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="keywords" content="Art, blog, empty kingdom, film, media, photography, illustration, website, artist">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="google-site-verification" content="2HSaNSKBarwC1BB_17xP84YdhQWf_T5fkNPXlypu5cI" />
<!-- 		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap-responsive.min.css" type="text/css" media="screen" charset="utf-8"> -->
		<link rel="SHORTCUT ICON" type='image/x-icon' href="http://www.emptykingdom.com/main/wp-content/uploads/2012/03/ekstar.png">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/ek.css" type="text/css" media="screen" charset="utf-8">
		<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css" type="text/css" media="screen" charset="utf-8"> -->
		<script type="text/javascript">
			ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';
			themedir = '<?php echo get_stylesheet_directory_uri() ?>';
			siteurl = '<?php echo site_url('/') ?>';
			origQuery = <?php echo json_encode($wp_query->query) ?>;
			lastFilter = <?php echo stripslashes($_COOKIE['lastFilter']) ?: '{}' ?>;
			disqus_developer = 1;
		</script>
		<script type="text/javascript" src="//use.typekit.net/jxu3qru.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<script type='text/javascript'>
		var googletag = googletag || {};
		googletag.cmd = googletag.cmd || [];
		(function() {
		var gads = document.createElement('script');
		gads.async = true;
		gads.type = 'text/javascript';
		var useSSL = 'https:' == document.location.protocol;
		gads.src = (useSSL ? 'https:' : 'http:') + 
		'//www.googletagservices.com/tag/js/gpt.js';
		var node = document.getElementsByTagName('script')[0];
		node.parentNode.insertBefore(gads, node);
		})();
		</script>

		<script type='text/javascript'>
		googletag.cmd.push(function() {
		googletag.defineSlot('/59182986/EK_ATF_Sidebar_300x250', [300, 250], 'div-gpt-ad-1358972561550-0').addService(googletag.pubads());
		googletag.defineSlot('/59182986/EK_BTF_Footer_728x90', [728, 90], 'div-gpt-ad-1358972561550-1').addService(googletag.pubads());
		googletag.pubads().enableSingleRequest();
		googletag.enableServices();
		});
		</script>

		<script type='text/javascript'>
		var googletag = googletag || {};
		googletag.cmd = googletag.cmd || [];
		(function() {
			var gads = document.createElement('script');
			gads.async = true;
			gads.type = 'text/javascript';
			var useSSL = 'https:' == document.location.protocol;
			gads.src = (useSSL ? 'https:' : 'http:') + 
			'//www.googletagservices.com/tag/js/gpt.js';
			var node = document.getElementsByTagName('script')[0];
			node.parentNode.insertBefore(gads, node);
		})();
		</script>

		<script type='text/javascript'>
		googletag.cmd.push(function() {
		googletag.defineSlot('/59182986/JonathanWongMV-300x250-EK-Q2', [300, 250], 'div-gpt-ad-1366810643930-0').addService(googletag.pubads());
		googletag.pubads().enableSingleRequest();
		googletag.enableServices();
		});
		</script>

		<?php wp_head(); ?>
		<script type="text/javascript">//<![CDATA[
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount','UA-12341947-1']);
		_gaq.push(['_trackPageview'],['_trackPageLoadTime']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		//]]></script>
		<script type="text/javascript" src="http://s3.buysellads.com/ac/adsaleswidget.js"></script>
	</head>
	

	<body <?php body_class() ?>>

		<script type="text/javascript">
(function(){
  var bsa = document.createElement('script');
     bsa.type = 'text/javascript';
     bsa.async = true;
     bsa.src = 'http://s3.buysellads.com/ac/bsa.js';
  (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
})();
</script>
<!-- Quantcast Tag -->
<script type="text/javascript">
var _qevents = _qevents || [];

(function() {
var elem = document.createElement('script');
elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
elem.async = true;
elem.type = "text/javascript";
var scpt = document.getElementsByTagName('script')[0];
scpt.parentNode.insertBefore(elem, scpt);
})();

_qevents.push({
qacct:"p-1fISEQcUeo3zs"
});
</script>

<noscript>
<div style="display:none;">
<img src="//pixel.quantserve.com/pixel/p-1fISEQcUeo3zs.gif" border="0" height="1" width="1" alt="Quantcast"/>
</div>
</noscript>
<!-- End Quantcast tag -->

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="container">
			<div id="masthead" class="row">
				<div class="span8 main">
					<h1 id="logo"><a href="<?php echo site_url('/') ?>?ref=ek_logo"><img src="<?php bloginfo('stylesheet_directory') ?>/img/logo.png" id="logo" alt="Empty Kingdom"></a></h1>
					<h2 id="tagline"><?php echo ek_get_tagline(); ?></h2>
				</div> <!-- /span8 -->
				<div class="span4 side">
					<ul class="unstyled ek-social" id="utility-menu">
						<!-- <li><span><a href="#">Register</a> | <a href="#">Login</a></span></li> -->
						<li class="tumblr icon"><a href="http://emptykingdom.tumblr.com" target="_blank">Tumblr</a></li>
						<li class="vimeo icon"><a href="http://vimeo.com/emptykingdomstudios" target="_blank">Vimeo</a></li>
						<li class="pinterest icon"><a href="http://pinterest.com/emptykingdom/" target="_blank">Pinterest</a></li>
						<li class="facebook icon"><a href="https://www.facebook.com/myemptykingdom" target="_blank">Facebook</a></li>
						<li class="twitter icon"><a href="http://twitter.com/emptykingdom" target="_blank">Twitter</a></li>
					</ul>
					<div id="basic-search">
						<form action="<?php echo site_url('/') ?>">
							<input type="text" name="s" placeholder="search">
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
					'walker' => new EK_Nav_Walker(),
				));
				?>
			</div>
