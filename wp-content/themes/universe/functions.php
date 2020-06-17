<?php

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
  wp_localize_script('main-university-js', 'universityData', array(
 	'root_url' => get_site_url(),
 	'nonce' => wp_create_nonce('wp_rest')
  ));
});




add_action('admin_init', function() {
	$ourCurrentUser = wp_get_current_user();
	if (count($ourCurrentUser->roles) === 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
		wp_redirect(site_url('/'));
		exit;
	}
});


add_action('wp_loaded', function() {
	$ourCurrentUser = wp_get_current_user();
	if (count($ourCurrentUser->roles) === 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
		show_admin_bar(false);
	}
});


add_filter('login_headerurl', 'ourHeaderUrl');
function ourHeaderUrl(){
	return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', function(){
	wp_enqueue_style('university_main_styles', get_stylesheet_uri());
	wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
});


add_filter('login_headertitle', function(){
	return get_bloginfo('name');
});