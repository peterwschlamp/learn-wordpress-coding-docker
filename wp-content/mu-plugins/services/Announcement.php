<?php
class Announcement {

	private function getAnnouncementWebhooksFor($announcement){
		$announcementWebhooks = new stdClass();
		$webhooksFull = [];
		$event = new WP_Query(array(
			'post_type' => 'ev', 
			'title' => $announcement->announced_events
		));
		//print_r ($event);
		while($event->have_posts()){
			//get associated webhooks for thie single event
			$event->the_post();
			$webhooks = get_post_meta(get_the_ID(), 'webhooks');

			foreach($webhooks[0] as $webhookID) {
				$url = get_post_meta($webhookID, 'url')[0];
				$action = get_post_meta($webhookID, 'action')[0];
				array_push($webhooksFull, array(
					'announcementId' => $announcement->announcement->ID,
					'url' => $url,
					'action' => $action,
					'data' => $announcement->announcement_data
				));
			}
		}
		$announcementWebhooks->webhooks = $webhooksFull;
		return $announcementWebhooks;
	}

	private function getPostWithMeta($postId, $metaKeys) {
		$announcementWithMeta = new stdClass();
		$announcementWithMeta->announcement = get_post($postId);
		foreach($metaKeys as $metaKey){
			$announcementWithMeta->$metaKey = get_post_meta($postId, $metaKey)[0];
		}
		//$announcementWithMeta->announcementData = get_post_meta($announcementId, 'announcement_data');
		return $announcementWithMeta;
	}

	private function enqueueAnnouncement($announcementId) {
		$announcementWithMeta = $this->getPostWithMeta($announcementId, ['announcement_data', 'announced_events']);
		$webhooks = $this->getAnnouncementWebhooksFor($announcementWithMeta);
		//print_r($announcementWithMeta);
		foreach($webhooks->webhooks as $webhook) {
			$queueId = wp_insert_post(array(
				'post_type' => 'queue',
				'post_status' => 'publish',
				'post_title' => microtime(),
				'meta_input' => array(
					'url' => $webhook['url'],
					'data' => $announcementWithMeta->announcement_data,
					'processed' => 0
				)
			));
		}
		return true;
	}

	public function addAnnouncement($data) {
		$returnObject = new stdClass();

		$announcementId = wp_insert_post(array(
			'post_type' => 'announcement',
			'post_status' => 'publish',
			'post_title' => time(),
			'meta_input' => array(
				//must match field name created in ACF plugin
				//'likedprogram' => sanitize_text_field($data['programId']),
				'announced_events' => sanitize_text_field($data['announced_event']),
				'announcement_data' => $data['announcement_data']
			)
		));
		$existsStatus = $this->enqueueAnnouncement($announcementId);
		
		//$existsStatus = $this->announceAllQueuedEvents();

		$returnObject->message = $existsStatus;
		return $returnObject;

	}

	public function processQueuedAnnouncements() {
		// go through queue and process any that need processing
		$unprocessedWebhooks = new WP_Query(array(
			'post_type' => 'queue', 
			'meta_query' => array(
				array(
					'key' => 'processed',
					'compare' => '=',
					'value' => 0
				)
			)
		));

		while($unprocessedWebhooks->have_posts()) {
			$unprocessedWebhooks->the_post();
			
			$response = wp_remote_post(get_post_meta(get_the_ID(), 'url')[0], array(
				'method' => 'GET',
				'headers' => array(),
				'body' => array(
					'payload' => get_post_meta(get_the_ID(), 'data')[0]
				),
				'cookies' => array(),
				'blocking' => true
			));
		
			if ( is_wp_error( $response ) ) {
		    	//$error_message = $response->get_error_message();
		    	//echo $error_message;
		    	//log error maybe
			} else {
				//print_r($response);
		  		update_post_meta(get_the_ID(), 'processed', 1);
			}
		}
		return true;
	}

}