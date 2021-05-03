<?php
/**
 * More Info `Slug Settings` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/more-info-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_more_info_fields_slug_settings_register_settings');
function ndf_more_info_fields_slug_settings_register_settings() {

	/* Register More Info Fields UI Settings */
	add_settings_section(
		'ndf_more_info_fields_slug_settings_section',
		'More Info Slug Settings',	
		'ndf_more_info_fields_slug_settings_callback',
		'ndf_more_info_fields_slug_settings_option'
	);

	/* Initialize More Info Fields UI Settings Fields */
	add_settings_field( 
		'ndf_more_info_fields_slug',
		'Slug',
		'ndf_more_info_fields_slug_callback',
		'ndf_more_info_fields_slug_settings_option',
		'ndf_more_info_fields_slug_settings_section'
	);

	/* Register Table Settings Section Fields */
	register_setting( 'ndf_more_info_fields_slug_settings_option', 'ndf_more_info_fields_slug' );
} /* end ndf_more_info_fields_slug_settings_register_settings */

/**
* Section Callbacks
*/
function ndf_more_info_fields_slug_settings_callback() {
	echo '<p></p>';
} /* end ndf_more_info_fields_slug_settings_callback */

/**
* Field Callbacks
*/
function ndf_more_info_fields_slug_callback($args) {
	$ndf_more_info_fields_slug = get_option( 'ndf_more_info_fields_slug', 'ndf-data' );

	if( empty($ndf_more_info_fields_slug) ){ $ndf_more_info_fields_slug = 'ndf-data'; }

	$html = '<input type="text" class="regular-text" id="ndf_more_info_fields_slug" name="ndf_more_info_fields_slug" value="'.esc_attr__( $ndf_more_info_fields_slug ).'" />';
	$args = get_post_type_object("ndf_data");
	$args->rewrite["slug"] = $ndf_more_info_fields_slug;
	register_post_type($args->name, $args);
	flush_rewrite_rules();
	echo $html;
} /* end ndf_more_info_fields_slug_callback */