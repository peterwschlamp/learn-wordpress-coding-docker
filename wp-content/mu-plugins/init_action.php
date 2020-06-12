<?php
add_action('init', 'my_init');
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
