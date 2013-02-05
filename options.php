<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

}

function optionsframework_options() {


	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'options_check'),
		'type' => 'heading');


		$options[] = array(
			'name' => __('Email', 'options_check'),
			'desc' => __('Contact Email.', 'options_check'),
			'id' => '_px_email',
			'std' => '',
			'type' => 'text');

		$options[] = array(
			'name' => __('Analytics code', 'options_check'),
			'desc' => __('Google analytics code.', 'options_check'),
			'id' => '_px_analytics_code',
			'std' => '',
			'type' => 'text');

	$options[] = array(
		'name' => __('Social', 'options_check'),
		'type' => 'heading');

		$options[] = array(
			'name' => __('Twitter', 'options_check'),
			'desc' => __('Twitter account.', 'options_check'),
			'id' => '_px_twitter',
			'std' => '',
			'type' => 'text');


	return $options;
}