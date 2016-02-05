<?php 

/*
	========================
	ADMIN PAGE
	========================
*/


function sm_add_admin_page(){
	//Vars
	$capability = 'manage_options';
	$parent_slug = 'starving_monsters';

	//Generate Admin Page
	add_menu_page('Starving Monsters General', 'SM options' , $capability, $parent_slug, 'sm_theme_create_page', '', 100);

	//Generate Admin Sub Pages
	add_submenu_page( $parent_slug, 'Starving Monsters General', 'General', $capability, $parent_slug, 'sm_theme_create_page' );
	add_submenu_page( $parent_slug, 'Starving Monsters Options', 'Settings', $capability, $parent_slug . '_settings', 'sm_theme_settings_page' );

	//Active custom settings
	add_action('admin_init', 'sm_custom_settings' );
}
add_action('admin_menu', 'sm_add_admin_page');

function sm_custom_settings(){

	add_settings_section('sm-slider-options', 'Slider options', 'sm_slider_options', 'starving_monsters');
		register_setting('sm-settings-group', 'slider_speed');
			add_settings_field('slider-speed', 'Slider speed', 'sm_slider_speed', 'starving_monsters', 'sm-slider-options');

	add_settings_section('sm-social-options', 'Social options', 'sm_social_options', 'starving_monsters');
		register_setting('sm-settings-group', 'facebook_url');
			add_settings_field('facebook-url', 'Facebook url', 'sm_facebook_url', 'starving_monsters', 'sm-social-options');
		register_setting('sm-settings-group', 'instagram_url');
			add_settings_field('instagram-url', 'Instagram url', 'sm_instagram_url', 'starving_monsters', 'sm-social-options');
}

function sm_slider_options(){
	// Section title
}

function sm_slider_speed(){
	$sliderSpeed = esc_attr(get_option('slider_speed'));
	echo '<input type="text" name="slider_speed" value="'.$sliderSpeed.'" placeholder="0-10000" class="regular-text"/><p class="description">Value must be a number in milliseconds. 1000 milliseconds is equeal to 1 second</p>';
}

function sm_social_options(){
	// Section title
}

function sm_facebook_url(){
	$facebookUrl = esc_attr(get_option('facebook_url'));
	echo '<input type="text" name="facebook_url" value="'.$facebookUrl.'" placeholder="" class="regular-text"/>';
}

function sm_instagram_url(){
	$instagramUrl = esc_attr(get_option('instagram_url'));
	echo '<input type="text" name="instagram_url" value="'.$instagramUrl.'" placeholder="" class="regular-text"/>';
}


function sm_theme_create_page(){
	require_once( get_template_directory() . '/inc/templates/starving-monsters-admin.php');
}

function sm_theme_settings_page(){
	echo '<h1>Startving Monsters settings</h1>';
}