<?php 
function widget_login() { ?>
        <?php global $user_ID, $user_identity, $user_level ?>
        <?php if ( $user_ID ) : ?>
        <h2><?php _e('Control Panel', "magazine-basic"); ?></h2>
        <ul>
            <li><?php _e('Logged in as:', "magazine-basic"); ?><strong> <?php echo $user_identity ?></strong></li>
            <li><a href="<?php bloginfo('url') ?>/wp-admin/"><?php _e('Dashboard', "magazine-basic"); ?></a></li>

            <?php if ( $user_level >= 1 ) : ?>
            <li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><?php _e('Write', "magazine-basic"); ?></a></li>
            <?php endif // $user_level >= 1 ?>

            <li><a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><?php _e('Profile', "magazine-basic"); ?></a></li>
            <li><a href="<?php echo wp_logout_url() ?>&amp;redirect_to=<?php echo urlencode(curPageURL()); ?>"><?php _e('Log Out', "magazine-basic"); ?></a></li>
        </ul>

        <?php else : ?>

        <h2><?php _e('User Login', "magazine-basic"); ?></h2>
            <form action="<?php bloginfo('url') ?>/wp-login.php" method="post">
                <p>
                <label for="log"><?php _e('User', "magazine-basic"); ?></label><br /><input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" style="margin-bottom: 5px;" /><br />
                <label for="pwd"><?php _e('Password', "magazine-basic"); ?></label><br /><input type="password" name="pwd" id="pwd" size="20" style="margin-bottom: 5px;" /><br />
                <input type="submit" name="submit" value="<?php _e('Send', "magazine-basic"); ?>" class="button" />
                <label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /><?php _e(' Remember me', "magazine-basic"); ?></label><br />
                </p>
                <input type="hidden" name="redirect_to" value="<?php echo curPageURL(); ?>"/>
            </form>
        <ul>
            <?php if ( get_option('users_can_register') ) { ?><li><a href="<?php bloginfo('url') ?>/wp-register.php"><?php _e('Register', "magazine-basic"); ?></a></li><?php } ?>
            <li><a href="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword"><?php _e('Lost your password', "magazine-basic"); ?></a></li>
        </ul>
        <?php endif // get_option('users_can_register') ?>
<?php
}

function widget_myLogin($args) {
	extract($args); 
	echo $before_widget;
	widget_login();
	echo $after_widget; 
}

register_sidebar_widget(__('User Login', "magazine-basic"), 'widget_myLogin');

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

?>