<?php

add_action('rest_api_init', function(){

	register_rest_route('university/v1', 'like', array(
		'methods' => 'POST',
		'callback' => function(){
			$returnObject->message ='POST like endpoint called';
			return $returnObject;
		}
	));

	register_rest_route('university/v1', 'like', array(
		'methods' => 'DELETE',
		'callback' => function(){
			$returnObject->message ='DELETE like endpoint called';
			return $returnObject;
		}
	));
	
});