<?php
function postLike($data) {
	if (is_user_logged_in()) {
		wp_insert_post(array(
			'post_type' => 'like',
			'post_status' => 'publish',
			'post_title' => '5th Test',
			'meta_input' => array(
				//must match field name created in ACF plugin
				'likedprogram' => sanitize_text_field($data['programId'])
			)
		));
	} else {
		die('Only logged in users can create a like');
	}

	$returnObject->message ='POST like endpoint called';
	return $returnObject;
}

function deleteLike() {
	$returnObject->message ='DELETE like endpoint called';
	return $returnObject;
}