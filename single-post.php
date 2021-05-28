<?php
/**
 * Shortcode Registration Scripts
 * 
 * Registered Shortcode:
 * - `wp_comparison_more_info` - Displays the more info fields table.
 * 
 * @package 	Netseek_Data_Filter
 * @subpackage 	Netseek_Data_Filter/includes/shortcodes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
// echo get_the_ID();
// echo do_shortcode( '[wp_comparison_more_info id=' . get_the_ID() . ']' );
		echo '<div id="ndf_more_info_fields">';
		global $wpdb;
		$NDFFieldGenerator = new NDFFieldGenerator();

		$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
		$field_rows = $wpdb->get_results( "SELECT * FROM $ndf_data_filtering_saved_fields WHERE hidden = '0' ORDER BY field_order ASC" );
		echo '<pre>';
		print_r($field_rows);
		echo '</pre>';

