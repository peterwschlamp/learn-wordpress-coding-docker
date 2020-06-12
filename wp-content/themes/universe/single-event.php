single-event.php -- replace word event with whatever post type name is


<?php 
	//blogInfo('name');
	//blogInfo('description');

	while(have_posts()){
		the_post();
		$url = get_the_permalink();
		$title = get_the_title();
		the_title();
		the_content();
	}
?>