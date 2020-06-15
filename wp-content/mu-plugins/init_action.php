<?php
add_action('init', 'my_init');

// using show_in_rest to create an endpoint for cpts
// get w/ http://localhost:8000/wp-json/wp/v2/program/27 or just http://localhost:8000/wp-json/wp/v2/program/
function my_init() {

	register_post_type('event', array(
		'capability_type' => 'event',
		'map_meta_cap' => true,
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
		'show_in_rest' => true,
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
		'capability_type' => 'program',
		'map_meta_cap' => true,
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
		'show_in_rest' => true,
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
