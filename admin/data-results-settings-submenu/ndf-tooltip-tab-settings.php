<?php
/**
 * Data Results Section Tooltip Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/data-results-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_data_results_tooltip_register_settings');
function ndf_data_results_tooltip_register_settings() {

	/* Register Load More Button Settings Section */
	add_settings_section(
		'ndf_tooltip_settings_section',
		'Tooltip Settings',
		'ndf_tooltip_settings_callback',
		'ndf_tooltip_settings_option'
	);

	/* Initialize Load More Button Settings Section Fields */	
	add_settings_field( 
		'ndf_tooltip_icon_color',
		'Icon Color',
		'ndf_tooltip_icon_color_callback',
		'ndf_tooltip_settings_option',
		'ndf_tooltip_settings_section'
	);

	add_settings_field( 
		'ndf_tooltip_icon_background_color',
		'Icon Background Color',
		'ndf_tooltip_icon_background_color_callback',
		'ndf_tooltip_settings_option',
		'ndf_tooltip_settings_section'
	);

	add_settings_field( 
		'ndf_tooltip_background_color',
		'Background Color',
		'ndf_tooltip_background_color_callback',
		'ndf_tooltip_settings_option',
		'ndf_tooltip_settings_section'
	);

	add_settings_field( 
		'ndf_tooltip_border_color',
		'Border Color',
		'ndf_tooltip_border_color_callback',
		'ndf_tooltip_settings_option',
		'ndf_tooltip_settings_section'
	);

	add_settings_field( 
		'ndf_tooltip_border_radius',
		'Border Radius',
		'ndf_tooltip_border_radius_callback',
		'ndf_tooltip_settings_option',
		'ndf_tooltip_settings_section'
	);
	
	add_settings_field(
		'ndf_tooltip_font_size',
		'Font Size',
		'ndf_tooltip_font_size_callback',
		'ndf_tooltip_settings_option',
		'ndf_tooltip_settings_section',
		array(
			'8px' => '8px',
			'10px' => '10px',
			'12px' => '12px',
			'14px' => '14px',
			'16px' => '16px',
			'18px' => '18px',
			'20px' => '20px',
			'22px' => '22px',
			'24px' => '24px',
			'26px' => '26px',
			'28px' => '28px',
			'30px' => '30px',
		)
	);
	
	add_settings_field(
		'ndf_tooltip_lineheight',
		'Text Line Height',
		'ndf_tooltip_lineheight_callback',
		'ndf_tooltip_settings_option',
		'ndf_tooltip_settings_section',
		array(
			'1'   => '1 em',
			'1.2' => '1.2 em',
			'1.4' => '1.4 em',
			'1.6' => '1.6 em',
			'1.8' => '1.8 em',
			'2'   => '2 em',
			'2.2' => '2.2 em',
			'2.4' => '2.4 em',
			'2.6' => '2.6 em',
			'2.8' => '2.8 em',
			'3'   => '3 em',
		)
	);
	
	add_settings_field( 
		'ndf_tooltip_font_color',
		'Font Color',
		'ndf_tooltip_font_color_callback',
		'ndf_tooltip_settings_option',
		'ndf_tooltip_settings_section'
	);
	
	/* Register Load More Button Settings Section Fields */
	register_setting( 'ndf_tooltip_settings_option', 'ndf_tooltip_icon_color' );
	register_setting( 'ndf_tooltip_settings_option', 'ndf_tooltip_icon_background_color' );
	register_setting( 'ndf_tooltip_settings_option', 'ndf_tooltip_background_color' );
	register_setting( 'ndf_tooltip_settings_option', 'ndf_tooltip_border_color' );
	register_setting( 'ndf_tooltip_settings_option', 'ndf_tooltip_border_radius', 'intval' );
	register_setting( 'ndf_tooltip_settings_option', 'ndf_tooltip_font_size' );
	register_setting( 'ndf_tooltip_settings_option', 'ndf_tooltip_lineheight' );
	register_setting( 'ndf_tooltip_settings_option', 'ndf_tooltip_font_color' );

} /* end ndf_data_results_tooltip_register_settings */

/**
 * Section Callbacks
 */
function ndf_tooltip_settings_callback() {
    echo '<p>Tooltip UI Settings</p>';
} /* end ndf_tooltip_settings_callback */

/**
 * Field Callbacks
 */
function ndf_tooltip_icon_color_callback($args) {
	$ndf_tooltip_icon_color = get_option( 'ndf_tooltip_icon_color', '#444444' );

	$html = '<input type="text" id="ndf_tooltip_icon_color" name="ndf_tooltip_icon_color" value="'.esc_attr__( $ndf_tooltip_icon_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_tooltip_icon_color_callback */

function ndf_tooltip_icon_background_color_callback($args) {
	$ndf_tooltip_icon_background_color = get_option( 'ndf_tooltip_icon_background_color', '#EEEEEE' );

	$html = '<input type="text" id="ndf_tooltip_icon_background_color" name="ndf_tooltip_icon_background_color" value="'.esc_attr__( $ndf_tooltip_icon_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_tooltip_icon_background_color_callback */

function ndf_tooltip_background_color_callback($args) {
	$ndf_tooltip_background_color = get_option( 'ndf_tooltip_background_color', '#FFFFFF' );

	$html = '<input type="text" id="ndf_tooltip_background_color" name="ndf_tooltip_background_color" value="'.esc_attr__( $ndf_tooltip_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_tooltip_background_color_callback */

function ndf_tooltip_border_color_callback($args) {
	$ndf_tooltip_border_color = get_option( 'ndf_tooltip_border_color', '#161616' );

	$html = '<input type="text" id="ndf_tooltip_border_color" name="ndf_tooltip_border_color" value="'.esc_attr__( $ndf_tooltip_border_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_tooltip_border_color_callback */

function ndf_tooltip_border_radius_callback($args) {
	$ndf_tooltip_border_radius = get_option( 'ndf_tooltip_border_radius', 0 );

    $html = '<input type="number" min="0" class="small-text" id="ndf_tooltip_border_radius" name="ndf_tooltip_border_radius" value="'.esc_attr__( $ndf_tooltip_border_radius ).'" /> px';
    echo $html;
} /* end ndf_tooltip_border_radius_callback */

function ndf_tooltip_font_size_callback($args) {
	$ndf_tooltip_font_size = get_option( 'ndf_tooltip_font_size', '14px' );

	$html = "<select name='ndf_tooltip_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_tooltip_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_tooltip_font_size_callback */

function ndf_tooltip_lineheight_callback($args) {
	$ndf_tooltip_lineheight = get_option( 'ndf_tooltip_lineheight', '1.2' );

	$html = "<select name='ndf_tooltip_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_tooltip_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_tooltip_lineheight_callback */

function ndf_tooltip_font_color_callback($args) {
	$ndf_tooltip_font_color = get_option( 'ndf_tooltip_font_color', '#161616' );

	$html = '<input type="text" id="ndf_tooltip_font_color" name="ndf_tooltip_font_color" value="'.esc_attr__( $ndf_tooltip_font_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_tooltip_font_color_callback */