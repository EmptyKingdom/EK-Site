	</div>
    <?php
		if(get_option('uwc_sidebar_location') == "2") {   	
			get_sidebar(1);
		}
		if(get_option('uwc_site_sidebars') == "2" && get_option('uwc_sidebar_location') == "5") { 
			include(TEMPLATEPATH.'/sidebar2.php'); 
		}
		if(get_option('uwc_site_sidebars') == "2" && get_option('uwc_sidebar_location') == "4") {   	
			get_sidebar(1);
			include(TEMPLATEPATH.'/sidebar2.php');
		}
	?>
</div>
<!-- begin footer -->
<div id="footer">
    <?php printf(__("Copyright &copy; %d", "magazine-basic"), date('Y')); ?> <a href="<?php bloginfo('url') ?>"><?php bloginfo('name'); ?></a>. <?php _e("All Rights Reserved", "magazine-basic"); ?>.<br />


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


</body>
</html>