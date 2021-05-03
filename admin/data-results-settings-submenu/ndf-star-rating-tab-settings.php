<?php
/**
 * Data Results Section More Information Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/data-results-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_data_results_star_rating_register_settings');
function ndf_data_results_star_rating_register_settings() {

	/* Register Star Rating Settings Section */
	add_settings_section(
		'ndf_star_rating_settings_section',
		'Star Rating Settings',
		'ndf_star_rating_settings_callback',
		'ndf_star_rating_settings_option'
	);

	/* Initialize Star Rating Settings Section Fields */
	add_settings_field( 
		'ndf_star_ratings_element_show',
		'Show Ratings',
		'ndf_star_ratings_element_show_callback',
		'ndf_star_rating_settings_option',
		'ndf_star_rating_settings_section',
		array(
			'Display data star ratings on More Info column in Data Results table.'
		)
	);

	add_settings_field( 
		'ndf_star_rating_color',
		'Star Color',
		'ndf_star_rating_color_callback',
		'ndf_star_rating_settings_option',
		'ndf_star_rating_settings_section'
	);
	add_settings_field( 
		'ndf_star_rating_size',
		'Size',
		'ndf_star_rating_size_callback',
		'ndf_star_rating_settings_option',
		'ndf_star_rating_settings_section',
		array(
			'' => 'Default',
			'frxp-icon-small' => 'Small',
			'frxp-icon-medium' => 'Medium',
			'frxp-icon-large' => 'Large',
		)
	);
	add_settings_field( 
		'ndf_star_rating_margin_top',
		'Margin Top',
		'ndf_star_rating_margin_top_callback',
		'ndf_star_rating_settings_option',
		'ndf_star_rating_settings_section'
	);
	add_settings_field( 
		'ndf_star_rating_margin_bottom',
		'Margin Bottom',
		'ndf_star_rating_margin_bottom_callback',
		'ndf_star_rating_settings_option',
		'ndf_star_rating_settings_section'
	);

	/* Register Star Rating Settings Section Fields */
	register_setting( 'ndf_star_rating_settings_option', 'ndf_star_ratings_element_show' );
	register_setting( 'ndf_star_rating_settings_option', 'ndf_star_rating_color' );
	register_setting( 'ndf_star_rating_settings_option', 'ndf_star_rating_size' );
	register_setting( 'ndf_star_rating_settings_option', 'ndf_star_rating_margin_top', 'intval' );
	register_setting( 'ndf_star_rating_settings_option', 'ndf_star_rating_margin_bottom', 'intval' );

} /* end ndf_data_results_star_rating_register_settings */

/**
 * Section Callbacks
 */
function ndf_star_rating_settings_callback() {
    echo '<p>Star Rating UI.</p>';
} /* end ndf_star_rating_settings_callback */

/**
 * Field Callbacks
 */
function ndf_star_ratings_element_show_callback($args) {
	$ndf_star_ratings_element_show = get_option( 'ndf_star_ratings_element_show', 1 );

	$html = '<input type="checkbox" id="ndf_star_ratings_element_show" name="ndf_star_ratings_element_show" value="1" ' . checked( 1, $ndf_star_ratings_element_show, false ) . '/>'; 
	$html .= '<label for="ndf_star_ratings_element_show"> ' . $args[0] . '</label>'; 
	echo $html;
} /* end ndf_star_ratings_element_show_callback */

function ndf_star_rating_color_callback($args) {
	$ndf_star_rating_color = get_option( 'ndf_star_rating_color', '#f9f922' );

	$html = '<input type="text" id="ndf_star_rating_color" name="ndf_star_rating_color" value="'.esc_attr__( $ndf_star_rating_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_star_rating_color_callback */

function ndf_star_rating_size_callback($args) {
	$ndf_star_rating_size = get_option( 'ndf_star_rating_size', '' );

	$html = "<select name='ndf_star_rating_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_star_rating_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_star_rating_size_callback */

function ndf_star_rating_margin_top_callback($args) {
	$ndf_star_rating_margin_top = get_option( 'ndf_star_rating_margin_top', 5 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_star_rating_margin_top" name="ndf_star_rating_margin_top" value="'.esc_attr__( $ndf_star_rating_margin_top ).'" /> px';
	echo $html;
} /* end ndf_star_rating_margin_top_callback */

function ndf_star_rating_margin_bottom_callback($args) {
	$ndf_star_rating_margin_bottom = get_option( 'ndf_star_rating_margin_bottom', 5 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_star_rating_margin_bottom" name="ndf_star_rating_margin_bottom" value="'.esc_attr__( $ndf_star_rating_margin_bottom ).'" /> px';
	echo $html;
} /* end ndf_star_rating_margin_bottom_callback */