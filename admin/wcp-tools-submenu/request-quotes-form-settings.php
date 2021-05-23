<?php
/**
 * Request Quotes Form Settings
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.1.2.1
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'request_quotes_form_register_settings');
function request_quotes_form_register_settings() {

	/* Register Request Quotes Settings */
	add_settings_section(
		'request_quotes_form_settings_section',
		'',
		'request_quotes_form_settings_callback',
		'request_quotes_form_settings_option'
	);
	add_settings_field( 
		'show_request_quotes_form',
		'Show  Request Quotes Shortcode',
		'show_request_quotes_form_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	/* Register Request Quotes Settings */
	register_setting( 'request_quotes_form_settings_option', 'show_request_quotes_form' );
} 

/**
 * Register Request Quotes Setting Callbacks
 *
 * @param  mixed $args
 * @return void
 */
function request_quotes_form_settings_callback($args) {
    echo '<p></p>';
} /* end request_quotes_form_settings_callback */

function show_request_quotes_form_callback($args) {
	$show_request_quotes_form = get_option( 'show_request_quotes_form', 0 );

	$html = '<input type="checkbox" id="show_request_quotes_form" name="show_request_quotes_form" value="1" ' . checked( 1, $show_request_quotes_form, false ) . '/>'; 
	echo $html;
} /* end show_request_quotes_form_callback */

function request_quotes_thank_you(){
	echo '<pre>';
	print_r('thank you, We will Get back to you soon');
	echo '</pre>';
}


