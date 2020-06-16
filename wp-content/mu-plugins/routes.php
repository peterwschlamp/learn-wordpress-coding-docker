<?php

add_action('rest_api_init', function(){
	register_rest_route('university/v1', 'like', array(
		'methods' => 'POST',
		'callback' => function(){
			return 'POST manageLike endpoint called';
		}
	));
	register_rest_route('university/v1', 'like', array(
		'methods' => 'DELETE',
		'callback' => function(){
			return 'DELETE manageLike endpoint called';
		}
	));
	register_rest_route('university/v1', 'like', array(
		'methods' => 'GET',
		'callback' => function(){
			return 'GET manageLike endpoint called';
		}
	));
});