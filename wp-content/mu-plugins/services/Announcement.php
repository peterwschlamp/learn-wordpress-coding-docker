<?php
class Announcement {

	function processAnnouncements($data) {

		$unprocessedAnnouncements = new WP_Query(array(
			'post_type' => 'announcement', 
			'meta_query' => array(
				array(
					'key' => 'processed',
					'compare' => '=',
					'value' => 'false'
				)
			)
		));

		if ($unprocessedAnnouncements->found_posts){
			$existsStatus = 'yes';
		} else {
			$existsStatus = 'no';
		}

		$returnObject->message = $existsStatus;
		return $returnObject;

	}

}