<?php
/**
 * Outbound Clicks Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/outbound-clicks-settings-submenu
 * @since 		1.1.2.1
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_outbound_clicks_track_register_settings');
function ndf_outbound_clicks_track_register_settings() {

	/* Register Outbound Clicks Settings Section */
	add_settings_section(
		'ndf_outbound_clicks_settings_section',
		'Outbound Clicks Settings',
		'ndf_outbound_clicks_settings_callback',
		'ndf_outbound_clicks_settings_option'
	);

	/* Initialize Outbound Clicks Settings Fields */
	add_settings_field( 
		'ndf_outbound_clicks_track',
		'Track Outbound Clicks',
		'ndf_outbound_clicks_track_callback',
		'ndf_outbound_clicks_settings_option',
		'ndf_outbound_clicks_settings_section'
	);

	$ndf_outbound_clicks_track = get_option( 'ndf_outbound_clicks_track', 0 );

	if( $ndf_outbound_clicks_track == '1' ){
		add_settings_field( 
			'ndf_outbound_clicks_more_info_track',
			'Track More Info Buttons',
			'ndf_outbound_clicks_more_info_track_callback',
			'ndf_outbound_clicks_settings_option',
			'ndf_outbound_clicks_settings_section'
		);
	}

	/* Register Outbound Clicks Settings Fields */
	register_setting( 'ndf_outbound_clicks_settings_option', 'ndf_outbound_clicks_track' );
	if( $ndf_outbound_clicks_track == '1' ){
		register_setting( 'ndf_outbound_clicks_settings_option', 'ndf_outbound_clicks_more_info_track' );
	}

} /* end ndf_outbound_clicks_track_register_settings */

/**
* Section Callbacks
*/
function ndf_outbound_clicks_settings_callback() {
	echo '<p></p>';
} /* end ndf_outbound_clicks_settings_callback */

/**
* Field Callbacks
*/
function ndf_outbound_clicks_track_callback($args) {
	$ndf_outbound_clicks_track = get_option( 'ndf_outbound_clicks_track', 0 );

	$html = '<input type="checkbox" id="ndf_outbound_clicks_track" name="ndf_outbound_clicks_track" value="1" ' . checked( 1, $ndf_outbound_clicks_track, false ) . '/>'; 
	echo $html;
} /* end ndf_outbound_clicks_track_callback */

function ndf_outbound_clicks_more_info_track_callback($args) {
	$ndf_outbound_clicks_track = get_option( 'ndf_outbound_clicks_track', 0 );

	if( $ndf_outbound_clicks_track == '1' ){
		$ndf_outbound_clicks_more_info_track = get_option( 'ndf_outbound_clicks_more_info_track', 0 );

		$html = '<input type="checkbox" id="ndf_outbound_clicks_more_info_track" name="ndf_outbound_clicks_more_info_track" value="1" ' . checked( 1, $ndf_outbound_clicks_more_info_track, false ) . '/>'; 
		echo $html;
	}
} /* end ndf_outbound_clicks_more_info_track_callback */