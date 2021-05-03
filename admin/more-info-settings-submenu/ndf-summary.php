<?php
/**
 * More Info `Summary` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/more-info-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_more_info_fields_summary_settings_section_register_settings');
function ndf_more_info_fields_summary_settings_section_register_settings() {

	/* Register Filters Section Category 1 Settings Section */
	add_settings_section(
		'ndf_more_info_fields_summary_settings_section',
		'Summary',
		'ndf_more_info_fields_summary_settings_callback',
		'ndf_more_info_fields_summary_settings_option'
	);

	/* Initialize Filters Section Category 1 Settings Section Fields */
	add_settings_field( 
		'ndf_more_info_fields_summary_show',
		'Show Summary in More Info page',
		'ndf_more_info_fields_summary_show_callback',
		'ndf_more_info_fields_summary_settings_option',
		'ndf_more_info_fields_summary_settings_section'
	);
	
	add_settings_field( 
		'ndf_more_info_fields_summary_label',
		'Label',
		'ndf_more_info_fields_summary_label_callback',
		'ndf_more_info_fields_summary_settings_option',
		'ndf_more_info_fields_summary_settings_section'
	);

	/* Register Filters Section Category 1 Settings Section Fields */
	register_setting( 'ndf_more_info_fields_summary_settings_option', 'ndf_more_info_fields_summary_show' );
	register_setting( 'ndf_more_info_fields_summary_settings_option', 'ndf_more_info_fields_summary_label' );
} /* end ndf_more_info_fields_summary_settings_section_register_settings */

/**
* Section Callbacks
*/
function ndf_more_info_fields_summary_settings_callback() {
	echo '<p></p>';
} /* end ndf_more_info_fields_summary_settings_callback */

/**
* Field Callbacks
*/
function ndf_more_info_fields_summary_show_callback($args) {
	$ndf_more_info_fields_summary_show = get_option( 'ndf_more_info_fields_summary_show', 1 );

	$html = '<input type="checkbox" id="ndf_more_info_fields_summary_show" name="ndf_more_info_fields_summary_show" value="1" ' . checked( 1, $ndf_more_info_fields_summary_show, false ) . '/>'; 
	echo $html;
} /* end ndf_more_info_fields_summary_show_callback */

function ndf_more_info_fields_summary_label_callback($args) {
	$ndf_more_info_fields_summary_label = get_option( 'ndf_more_info_fields_summary_label', 'Summary' );

	$html = '<input type="text" id="ndf_more_info_fields_summary_label" name="ndf_more_info_fields_summary_label" value="'.esc_attr__( $ndf_more_info_fields_summary_label ).'" class="regular-text" />';
	echo $html;
} /* end ndf_more_info_fields_summary_label_callback */