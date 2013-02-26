<?php
/*
Plugin Name: Simple Optimizer
Plugin URI: http://MyWebsiteAdvisor.com/tools/wordpress-plugins/simple-optimizer/
Description: Check, Repair and Optimize WordPress Database. Delete Spam, Revisions, Auto Drafts, Pending Comments and Transient Options.
Version: 1.2.2
Author: MyWebsiteAdvisor
Author URI: http://MyWebsiteAdvisor.com
*/


register_activation_hook(__FILE__, 'simple_optimizer_activate');


function simple_optimizer_activate() {

	// display error message to users
	if ($_GET['action'] == 'error_scrape') {                                                                                                   
		die("Sorry, Simple Optimizer Plugin requires PHP 5.0 or higher. Please deactivate Simple Optimzer Plugin.");                                 
	}

	if ( version_compare( phpversion(), '5.0', '<' ) ) {
		trigger_error('', E_USER_ERROR);
	}
	
}



// require simple optimizer Plugin if PHP 5 installed
if ( version_compare( phpversion(), '5.0', '>=') ) {

	define('SO_LOADER', __FILE__);
	
	require_once(dirname(__FILE__) . '/simple-optimizer-settings-page.php');
	
	require_once(dirname(__FILE__) . '/simple-optimizer-tools.php');
	
	require_once(dirname(__FILE__) . '/simple-optimizer-plugin.php');
	
	
	$simple_optimizer = new Simple_Optimizer_Plugin();

}
?>