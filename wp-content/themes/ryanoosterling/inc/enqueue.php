<?php 

/*
	========================
	ADMIN ENQUEUE
	========================
*/

function sm_load_admin_scripts($hook){

	if ('toplevel_page_starving_monsters' != $hook) {
		return;
	}
	wp_register_style('sm_admin', get_template_directory_uri() . '/css/sm.admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style('sm_admin');
}

add_action('admin_enqueue_scripts', 'sm_load_admin_scripts');