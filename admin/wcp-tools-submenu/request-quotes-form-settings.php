<?php
/**
 * Request Quotes Form Settings
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.7.3.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'request_quotes_form_register_settings');
function request_quotes_form_register_settings() {
	add_settings_section(
		'request_quotes_form_settings_section',
		'Form Settings',
		'request_quotes_form_settings_callback',
		'request_quotes_form_settings_option'
	);
	add_settings_field( 
		'show_request_quotes_form',
		'Show Shortcode',
		'show_request_quotes_form_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_form_title',
		'Form Title',
		'request_quotes_form_title_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_formbackground_color',
		'Form Background Color',
		'request_quotes_formbackground_color_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_form_text_color',
		'Text Color',
		'request_quotes_form_text_color_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
		

	register_setting( 'request_quotes_form_settings_option', 'show_request_quotes_form' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_title' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_formbackground_color' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_text_color' );
} 

/**
 * Register Request Quotes Setting Callbacks
 *
 * @param  mixed $args
 * @return void
 */
function request_quotes_form_settings_callback($args) {
    echo '<p></p>';
} 
function show_request_quotes_form_callback($args) {
	$show_request_quotes_form = get_option( 'show_request_quotes_form', 0 );
	$html = '<input type="checkbox" id="show_request_quotes_form" name="show_request_quotes_form" value="1" ' . checked( 1, $show_request_quotes_form, false ) . '/>'; 
	echo $html;
} 
function request_quotes_form_title_callback($args){
	$request_quotes_form_title = get_option( 'request_quotes_form_title', 'Get Quotes' );
	$html = '<input type="text" id="request_quotes_form_title" name="request_quotes_form_title" value="'.$request_quotes_form_title.'" />'; 
	echo $html;
}
function request_quotes_formbackground_color_callback($args){
	$request_quotes_formbackground_color = get_option( 'request_quotes_formbackground_color', '#fff' );
	$html = '<input type="text" id="request_quotes_formbackground_color" name="request_quotes_formbackground_color" value="'.esc_attr__( $request_quotes_formbackground_color ).'" class="ndf_colorpicker" />';
	echo $html;
}
function request_quotes_form_text_color_callback($args){

	$request_quotes_form_text_color = get_option( 'request_quotes_form_text_color', '#fff' );
	$html = '<input type="text" id="request_quotes_form_text_color" name="request_quotes_form_text_color" value="'.esc_attr__( $request_quotes_form_text_color ).'" class="ndf_colorpicker" />';
	echo $html;

}

/**
 * request_quotes_thank_you
 * Callback Function after sending Request Quotes Email
 *
 * @return void
 */
function request_quotes_thank_you(){
	echo '<pre>';
	print_r('thank you, We will Get back to you soon');
	echo '</pre>';
	// $ndf_filters_table_background_color = get_option( 'ndf_filters_table_background_color', '#009ce0' );

	// $html = '<input type="text" id="ndf_filters_table_background_color" name="ndf_filters_table_background_color" value="'.esc_attr__( $ndf_filters_table_background_color ).'" class="ndf_colorpicker" />';
	// echo $html;
}


