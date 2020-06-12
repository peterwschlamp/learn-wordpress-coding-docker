<?php
add_action('admin_init', 'remove_plugin_menu_pages');
function remove_plugin_menu_pages() {
	$config = include('config.php');
	if ($config['hideAdminMenuCustomFields']) {
		remove_menu_page('edit.php?post_type=acf-field-group');
	}
}