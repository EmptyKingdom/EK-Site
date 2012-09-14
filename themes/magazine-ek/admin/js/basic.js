jQuery(document).ready(function() {

	value =	jQuery("input[name='uwc_site_width']:checked").val();
	if(value=='800') {
		jQuery("#leftWidth").hide();
		jQuery("#rightWidth").hide();
	}

	jQuery("a").click( function() {
		value =	jQuery("input[name='uwc_site_width']:checked").val();
		if(value=='800') {
			jQuery("#leftWidth").slideUp();
		} else {
			jQuery("#leftWidth").slideDown();
		}
	});
	
	value2 = jQuery("input[name='uwc_site_sidebars']:checked").val();
	if(value2=='1') {
		jQuery("#rightWidth").hide();
		jQuery("#twoSidebar").hide();
	} else if(value2=='2') {
		jQuery("#oneSidebar").hide();		
	}

	jQuery("a").click( function() {
		value2 = jQuery("input[name='uwc_site_sidebars']:checked").val();
		if(value=='1024' && value2=='2') {
			jQuery("#rightWidth").slideDown();
		} else {
			jQuery("#rightWidth").slideUp();
		}
		if(value2=='2') {
			jQuery("#oneSidebar").slideUp();
			jQuery("#twoSidebar").slideDown();
		} else {
			jQuery("#twoSidebar").slideUp();
			jQuery("#oneSidebar").slideDown();
		}
	});
});