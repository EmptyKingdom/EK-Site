<?php 

add_theme_support('menus');
add_theme_support('post-thumbnails');
set_post_thumbnail_size('770', '395', true);

register_nav_menu('main-menu', 'Main Menu');
register_nav_menu('quick-links-footer', 'Footer Quick Links');

$widgets = glob(dirname(__FILE__).'/widgets/*');
foreach($widgets as $widget_file) 
{
	include($widget_file);	
}

register_sidebar(array(
	'name'          => 'Right Sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>' ));
register_sidebar(array(
	'name'          => 'Footer Left',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>' ));
register_sidebar(array(
	'name'          => 'Footer Right',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>' ));
