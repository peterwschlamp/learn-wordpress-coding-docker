<?php

require('services/Announcement.php');
require('handlers/likes.php');

add_action('rest_api_init', function() {

	register_rest_route('event-hook/v1', 'announcement', array(
		'methods' => 'POST',
		'callback' => function($data) {
			$announcement = new Announcement();
			return $announcement->addAnnouncement($data);
		}
	));

	register_rest_route('event-hook/v1', 'queue', array(
		'methods' => 'POST',
		'callback' => function($data) {
			$announcement = new Announcement();
			return $announcement->processQueuedAnnouncements();
		}
	));


	/////////////////////////////////////////////////////////

	register_rest_route('university/v1', 'like', array(
		'methods' => 'POST',
		'callback' => 'postLike'
	));

	register_rest_route('university/v1', 'like', array(
		'methods' => 'DELETE',
		'callback' => 'deleteLike'
	));

});