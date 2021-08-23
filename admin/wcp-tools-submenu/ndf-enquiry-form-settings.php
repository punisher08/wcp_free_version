<?php
/**
 * More Info `Enquiry Form Settings` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/more-info-settings-submenu
 * @since 		1.2.1.1
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_enquiry_form_register_settings');
function ndf_enquiry_form_register_settings() {

	/* Register Filters Section Category 1 Settings Section */
	add_settings_section(
		'ndf_enquiry_form_settings_section',
		'',
		'ndf_enquiry_form_settings_callback',
		'ndf_enquiry_form_settings_option'
	);

	/* Initialize Filters Section Category 1 Settings Section Fields */
	add_settings_field( 
		'ndf_show_enquiry_form',
		'Show Enquiry Form',
		'ndf_show_enquiry_form_callback',
		'ndf_enquiry_form_settings_option',
		'ndf_enquiry_form_settings_section'
	);

	add_settings_field( 
		'ndf_enquiry_form_email_subject',
		'Email Subject',
		'ndf_enquiry_form_email_subject_callback',
		'ndf_enquiry_form_settings_option',
		'ndf_enquiry_form_settings_section'
	);

	add_settings_field( 
		'ndf_enquiry_button_label',
		'Enquiry Button Label',
		'ndf_enquiry_button_label_callback',
		'ndf_enquiry_form_settings_option',
		'ndf_enquiry_form_settings_section'
	);

	add_settings_field(
		'ndf_enquiry_button_style',
		'Enquiry Button Style',
		'ndf_enquiry_button_style_callback',
		'ndf_enquiry_form_settings_option',
		'ndf_enquiry_form_settings_section'
	);
	/**
	 * @since 1.7.3.8 
	*/
	add_settings_field(
		'ndf_enquiry_submit_button_padding',
		'Enquiry Submit Button Padding',
		'ndf_enquiry_submit_button_padding_callback',
		'ndf_enquiry_form_settings_option',
		'ndf_enquiry_form_settings_section'
	);
	add_settings_field(
		'ndf_enquiry_submit_button_font_size',
		'Enquiry Submit Button Font size',
		'ndf_enquiry_submit_button_font_size_callback',
		'ndf_enquiry_form_settings_option',
		'ndf_enquiry_form_settings_section'
	);
	add_settings_field(
		'ndf_enquiry_submit_button_font_border_radius',
		'Enquiry Submit Button Border Radius',
		'ndf_enquiry_submit_button_font_border_radius_callback',
		'ndf_enquiry_form_settings_option',
		'ndf_enquiry_form_settings_section'
	);
	/**Button style options */
	register_setting( 'ndf_enquiry_form_settings_option', 'ndf_enquiry_submit_button_padding' );
	register_setting( 'ndf_enquiry_form_settings_option', 'ndf_enquiry_submit_button_font_size' );
	register_setting( 'ndf_enquiry_form_settings_option', 'ndf_enquiry_submit_button_font_border_radius' );
	/* Register Filters Section Category 1 Settings Section Fields */
	register_setting( 'ndf_enquiry_form_settings_option', 'ndf_show_enquiry_form' );
	register_setting( 'ndf_enquiry_form_settings_option', 'ndf_enquiry_form_email_subject' );
	register_setting( 'ndf_enquiry_form_settings_option', 'ndf_enquiry_button_label' );
	register_setting( 'ndf_enquiry_form_settings_option', 'ndf_enquiry_button_style' );

} /* end ndf_enquiry_form_register_settings */

/**
* Section Callbacks
*/
function ndf_enquiry_form_settings_callback() {
	echo '<p></p>';
} /* end ndf_enquiry_form_settings_callback */

/**
* Field Callbacks
*/
function ndf_show_enquiry_form_callback($args) {
	$ndf_show_enquiry_form = get_option( 'ndf_show_enquiry_form', 0 );

	$html = '<input type="checkbox" id="ndf_show_enquiry_form" name="ndf_show_enquiry_form" value="1" ' . checked( 1, $ndf_show_enquiry_form, false ) . '/>'; 
	echo $html;
} /* end ndf_show_enquiry_form_callback */

function ndf_enquiry_form_email_subject_callback($args) {
	$ndf_enquiry_form_email_subject = get_option( 'ndf_enquiry_form_email_subject', 'WCP Enquiry Form' );

	if( empty($ndf_enquiry_form_email_subject) ){ $ndf_enquiry_form_email_subject = 'WCP Enquiry Form'; }

	$html = '<input type="text" class="regular-text" id="ndf_enquiry_form_email_subject" name="ndf_enquiry_form_email_subject" value="'.esc_attr__( $ndf_enquiry_form_email_subject ).'" />';
	echo $html;
} /* end ndf_enquiry_form_email_subject_callback */

function ndf_enquiry_button_label_callback($args) {
	$ndf_enquiry_button_label = get_option( 'ndf_enquiry_button_label', 'Request Info' );

	if( empty($ndf_enquiry_button_label) ){ $ndf_enquiry_button_label = 'Request Info'; }

	$html = '<input type="text" class="regular-text" id="ndf_enquiry_button_label" name="ndf_enquiry_button_label" value="'.esc_attr__( $ndf_enquiry_button_label ).'" />';
	echo $html;
} /* end ndf_enquiry_button_label_callback */

function ndf_enquiry_button_style_callback($args) {
	$ndf_enquiry_button_style = get_option( 'ndf_enquiry_button_style', 1 );

	$ndf_button_style_configuration = get_option( 'ndf_button_style_configuration' );

	$html = '';
	if( is_array( $ndf_button_style_configuration ) ){
		$html .= "<select name='ndf_enquiry_button_style' id='ndf_enquiry_button_style' class='ndf_dropdown'>";
		foreach( $ndf_button_style_configuration as $style_id => $settings ){
			$html .= "<option value='".$style_id."' ".selected( $ndf_enquiry_button_style, $style_id, false ).">".$settings['label']."</option>";
		}
		$html .= "</select>";
	}
	echo $html;
} /* end ndf_enquiry_button_style_callback */
function ndf_enquiry_submit_button_padding_callback($args){
	$ndf_enquiry_submit_button_padding = get_option( 'ndf_enquiry_submit_button_padding', '10' );
	$html = '<input type="number" style="width:8%;" id="ndf_enquiry_submit_button_padding" name="ndf_enquiry_submit_button_padding" value="'.esc_attr__( $ndf_enquiry_submit_button_padding ).'" />px';
	echo $html;

}// EO ndf_enquiry_submitbutton_padding_callback
function ndf_enquiry_submit_button_font_size_callback($args){
	$ndf_enquiry_submit_button_font_size = get_option( 'ndf_enquiry_submit_button_font_size', '10' );
	$html = '<input type="number" style="width:8%;" id="ndf_enquiry_submit_button_font_size" name="ndf_enquiry_submit_button_font_size" value="'.esc_attr__( $ndf_enquiry_submit_button_font_size ).'" />px';
	echo $html;

}// EO ndf_enquiry_submit_button_font_size_callback
function ndf_enquiry_submit_button_font_border_radius_callback($args){
	$ndf_enquiry_submit_button_font_border_radius = get_option( 'ndf_enquiry_submit_button_font_border_radius', '0' );
	$html = '<input type="number" style="width:8%;" id="ndf_enquiry_submit_button_font_border_radius" name="ndf_enquiry_submit_button_font_border_radius" value="'.esc_attr__( $ndf_enquiry_submit_button_font_border_radius ).'" />px';
	echo $html;

}// EO ndf_enquiry_submit_button_font_border_radius_callback
