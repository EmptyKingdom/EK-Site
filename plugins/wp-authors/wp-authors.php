<?php
/*
Plugin Name: WP Authors
Plugin URI: http://www.tsaiberspace.net/projects/wordpress/wp-authors/
Description: Sidebar widget to list all authors of a blog. Navigate to <a href="widgets.php">Presentation &rarr; Widgets</a> to add to your sidebar.
Author: Robert Tsai</a>; i18n/l10n by <a href="http://aufBlog.de/">Gerhard Lehnhoff
Author URI: http://www.tsaiberspace.net/
Version: 1.3.1
*/

$locale = get_locale();
$mofile = dirname(__FILE__) . "/locale/$locale.mo";
load_textdomain('wp-authors', $mofile);

function widget_wpauthors_init() {
	if ( !function_exists('register_sidebar_widget') )
		return;

	function wp_widget_authors($args) {
		extract($args);

		$options = get_option('widget_authors');
		$c = $options['count'] ? true : false;
		$f = $options['show_fullname'] ? true : false;
		$hide = $options['hide_empty'] ? true : false;
		$excludeadmin = $options['exclude_admin'] ? true : false;
		$title = empty($options['title']) ? __('Authors', 'wp-authors') :
			$options['title'];

		$author_args = array(
			'orderby' => 'name',
			'optioncount' => $c,
			'show_fullname' => $f,
			'hide_empty' => $hide,
			'exclude_admin' => $excludeadmin,
			'post_types' => 'post',
			);

		print <<<EOM
		$before_widget
		$before_title$title$after_title
		<ul>
EOM;

		wp_list_authors($author_args);

		print <<<EOM
		</ul>
		$after_widget
EOM;
	}

	function wp_widget_authors_control() {
		$defaults = array(
			'title' => __('Authors', 'wp-authors'),
			'count' => true,
			'show_fullname' => false,
			'hide_empty' => true,
			'exclude_admin' => true,
			);
		if (!($options = get_option('widget_authors')))
			$options = array();
		$options = array_merge($defaults, $options);
		if ( $_POST['authors-submit'] ) {
			$options['title'] = strip_tags(stripslashes($_POST['authors-title']));
			$options['count'] = isset($_POST['authors-count']);
			$options['show_fullname'] = isset($_POST['authors-show_fullname']);
			$options['hide_empty'] = isset($_POST['authors-hide_empty']);
			$options['exclude_admin'] = isset($_POST['authors-exclude_admin']);
			update_option('widget_authors', $options);
		}
		$title = attribute_escape($options['title']);
		$count = $options['count'] ? 'checked="checked"' : '';
		$show_fullname = $options['show_fullname'] ? 'checked="checked"' : '';
		$hide_empty = $options['hide_empty'] ? 'checked="checked"' : '';
		$exclude_admin = $options['exclude_admin'] ? 'checked="checked"' : '';
?>

						<p><label for="authors-title"><?php _e('Title:', 'wp-authors'); ?> <input style="width: 250px;" id="authors-title" name="authors-title" type="text" value="<?php echo $title; ?>" /></label></p>
						<p style="text-align:right;margin-right:40px;"><label for="authors-count"><?php _e('Show post counts', 'wp-authors'); ?> <input class="checkbox" type="checkbox" <?php echo $count; ?> id="authors-count" name="authors-count" /></label></p>
						<p style="text-align:right;margin-right:40px;"><label for="authors-show_fullname"><?php _e('Show full names', 'wp-authors'); ?> <input class="checkbox" type="checkbox" <?php echo $show_fullname; ?> id="authors-show_fullname" name="authors-show_fullname" /></label></p>
						<p style="text-align:right;margin-right:40px;"><label for="authors-hide_empty"><?php _e('Hide empty authors', 'wp-authors'); ?> <input class="checkbox" type="checkbox" <?php echo $hide_empty; ?> id="authors-hide_empty" name="authors-hide_empty" /></label></p>
						<p style="text-align:right;margin-right:40px;"><label for="authors-exclude_admin"><?php _e('Exclude admin', 'wp-authors'); ?> <input class="checkbox" type="checkbox" <?php echo $exclude_admin; ?> id="authors-exclude_admin" name="authors-exclude_admin" /></label></p>
						<input type="hidden" id="authors-submit" name="authors-submit" value="1" />
<?php
	}

	register_sidebar_widget(__('Authors', 'wp-authors'), 'wp_widget_authors');							
	register_widget_control(__('Authors', 'wp-authors'), 'wp_widget_authors_control', 300, 200);	
}

function widget_wpauthors_deactivate() {
	delete_option('widget_authors');
}

register_deactivation_hook(__FILE__, 'widget_wpauthors_deactivate');
add_action('plugins_loaded', 'widget_wpauthors_init');

?>
