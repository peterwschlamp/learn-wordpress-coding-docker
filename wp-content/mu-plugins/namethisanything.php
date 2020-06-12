<?php

add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	remove_menu_page( 'edit.php' );                   //Posts
	remove_menu_page( 'upload.php' );                 //Media
	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'themes.php' );                 //Appearance
	//remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
	remove_menu_page('edit.php?post_type=page');
	
	//add the below when in production
	//remove_menu_page( 'options-general.php' );        //Settings
	//remove_menu_page( 'plugins.php' );
}


function my_init() {

	register_post_type('event', array(
		'rewrite' => array(
			'slug' => 'events'
		),
		'has_archive' => true,
		'public' => true,
		'supports' => array(
			'title',
			'editor',
			'custom-fields'
		),
		'labels' => array(
			'name' => 'Events',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'all_items' => 'All Events',
			'singular_name' => 'Event'
		),
		'menu_icon' => 'dashicons-calendar'
	));

	register_post_type('program', array(
		'rewrite' => array(
			'slug' => 'programs'
		),
		'has_archive' => true,
		'public' => true,
		'supports' => array(
			'title',
			'editor',
			'custom-fields'
		),
		'labels' => array(
			'name' => 'Programs',
			'add_new_item' => 'Add New Program',
			'edit_item' => 'Edit Program',
			'all_items' => 'All Programs',
			'singular_name' => 'Program'
		),
		'menu_icon' => 'dashicons-awards'
	));
}



add_action('init', 'my_init')

?>