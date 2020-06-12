<?php

	//user defined function that will load stylesheet
	function university_files() {
		//also have wp_enqueue_script for js files
		//loads style sheet param 1 is just a label param 2 is a wp function that loads style.css
		wp_enqueue_style('university_main_styles', get_stylesheet_uri());
	}

	//add_action calls a function (param 2) based on an event (param 1)
	// this is like a callback in node where param2 is callback
	add_action('wp_enqueue_scripts','university_files');

?>