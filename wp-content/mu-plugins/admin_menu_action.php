<?php
add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	$config = include('config.php');

	remove_menu_page( 'upload.php' );                 //Media
	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'themes.php' );                 //Appearance
	remove_menu_page( 'tools.php' );                  //Tools
	remove_menu_page('edit.php?post_type=page');
	
	if ($config['hideAdminMenuPosts']) {
		remove_menu_page( 'edit.php' );
	}
	if ($config['hideAdminMenuUsers']) {
		remove_menu_page( 'users.php' ); 
	}
	if ($config['hideAdminMenuSettings']) {
		remove_menu_page( 'options-general.php' ); 
	}
	if ($config['hideAdminMenuPlugins']) {
		remove_menu_page( 'plugins.php' );
	}
}