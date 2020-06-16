<?php
function postLike($data) {
	wp_insert_post(array(
		'post_type' => 'like',
		'post_status' => 'publish',
		'post_title' => '4th Test',
		'meta_input' => array(
			//must match field name created in ACF plugin
			'likedprogram' => sanitize_text_field($data['programId'])
		)
	));

	$returnObject->message ='POST like endpoint called';
	return $returnObject;
}

function deleteLike() {
	$returnObject->message ='DELETE like endpoint called';
	return $returnObject;
}