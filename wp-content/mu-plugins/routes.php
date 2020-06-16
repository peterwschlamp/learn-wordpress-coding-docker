<?php

require('handlers/likes.php');

add_action('rest_api_init', function(){

	register_rest_route('university/v1', 'like', array(
		'methods' => 'POST',
		'callback' => 'postLike'
	));

	register_rest_route('university/v1', 'like', array(
		'methods' => 'DELETE',
		'callback' => 'deleteLike'
	));

});