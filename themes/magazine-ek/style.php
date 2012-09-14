<?php
	if (get_option('uwc_logo_header') == "yes" && function_exists('getimagesize')) {
		list($w, $h) = @getimagesize(get_option('uwc_logo'));
		$height = $h/2;
	} else {
		$height = 18;
	}
	if(get_option('uwc_site_width')) {
		$site = get_option('uwc_site_width');
		/*if($site == 1024) {
			$bg = 'bg-1024.png';
		} else {
			$bg = 'bg-800.png';
		}*/
		if($site == 800) {
			$sidebar = 180;
			$secondsidebar = 180;
		} else {
			$sidebar = get_option('uwc_sidebar_width1');	
			$secondsidebar = get_option('uwc_sidebar_width2');
		}
		$sidewidget = $sidebar - 20;
		$sidewidget2 = $secondsidebar - 20;
		if(get_option('uwc_site_sidebars') == 1) {
			$content =  get_option('uwc_site_width') - $sidebar - 65;
		} else {
			$content =  get_option('uwc_site_width') - $sidebar - $secondsidebar - 88;		
		}
	} else {
		$site = 800;
		//$bg = 'bg-800.png';
		$sidebar = 180;
		$sidewidget = 160;
		$content = 560;
	}
?>
<style type='text/css'>
	body { width: <?php echo $site; ?>px; <?php //echo 'background: url('.get_bloginfo('template_url').'/images/'.$bg.') repeat-y center;' ?> }
	#mainwrapper { width: <?php echo $site-20; ?>px; }
	#sidebar { width: <?php echo $sidebar; ?>px; }
	#sidebar .side-widget { width: <?php echo $sidewidget; ?>px; }
	#secondsidebar { width: <?php echo $secondsidebar; ?>px; }
	#secondsidebar .side-widget { width: <?php echo $sidewidget2; ?>px; }
	#leftcontent, #twocol, #threecol, #threecol2, .commentlist { width: <?php echo $content; ?>px; }
	#leftcontent img { max-width: <?php echo $content; ?>px; height: auto; }
<?php
 if (get_option('uwc_logo_location') == "3") {
	echo "	#title { text-align: center }\n";
	echo "	#description { clear: both; text-align: center; }\n";		
	echo "	#headerad { display:none; }\n";
} elseif(get_option('uwc_logo_location') == "2") {
	echo "	#title { float: right; }\n";
	echo "	#description { clear: right; float: right; text-align: right }\n";	
	echo "	#headerad { float: left; margin: ". $height . "px 0 0 15px;}\n";
} else {
	echo "	#title { float: left; }\n";
	echo "	#description { clear: left; float: left; }\n";
	echo "	#headerad { float: right; margin: ". $height . "px 15px 0 0; }\n";
}
?>
</style>
