<?php
/**
 * Data Results Section Load More Button Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/data-results-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_data_results_load_more_register_settings');
function ndf_data_results_load_more_register_settings() {

	/* Register Load More Button Settings Section */
	add_settings_section(
		'ndf_load_more_settings_section',
		'Load More Button Settings',
		'ndf_load_more_settings_callback',
		'ndf_load_more_settings_option'
	);

	/* Initialize Load More Button Settings Section Fields */
	add_settings_field( 
		'ndf_load_more_button_label',
		'Button Label',
		'ndf_load_more_button_label_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);

	add_settings_field(
		'ndf_load_more_button_font_size',
		'Button Font Size',
		'ndf_load_more_button_font_size_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section',
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
		'ndf_load_more_button_lineheight',
		'Button Line Height',
		'ndf_load_more_button_lineheight_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section',
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
		'ndf_load_more_button_fontcolor',
		'Button Font Color',
		'ndf_load_more_button_fontcolor_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);
	
	add_settings_field( 
		'ndf_load_more_button_background_color',
		'Button Background Color',
		'ndf_load_more_button_background_color_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);

	add_settings_field( 
		'ndf_load_more_button_hover_background_color',
		'Button Hover Background Color',
		'ndf_load_more_button_hover_background_color_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);

	add_settings_field( 
		'ndf_load_more_button_border_color',
		'Button Border Color',
		'ndf_load_more_button_border_color_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);
	
	add_settings_field( 
		'ndf_load_more_button_border_width',
		'Button Border Size',
		'ndf_load_more_button_border_width_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);

	add_settings_field( 
		'ndf_load_more_button_border_radius',
		'Button Border Radius',
		'ndf_load_more_button_border_radius_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);

	add_settings_field( 
		'ndf_load_more_button_padding_top',
		'Button Padding Top',
		'ndf_load_more_button_padding_top_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);
	add_settings_field( 
		'ndf_load_more_button_padding_bottom',
		'Button Padding Bottom',
		'ndf_load_more_button_padding_bottom_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);
	add_settings_field( 
		'ndf_load_more_button_padding_left',
		'Button Padding Left',
		'ndf_load_more_button_padding_left_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);
	add_settings_field( 
		'ndf_load_more_button_padding_right',
		'Button Padding Right',
		'ndf_load_more_button_padding_right_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);

	add_settings_field( 
		'ndf_load_more_button_margin_top',
		'Button Margin Top',
		'ndf_load_more_button_margin_top_callback',
		'ndf_load_more_settings_option',
		'ndf_load_more_settings_section'
	);


	/* Register Load More Button Settings Section Fields */
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_label' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_font_size' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_lineheight' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_fontcolor' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_background_color' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_hover_background_color' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_border_color' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_border_width', 'intval' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_border_radius', 'intval' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_padding_top', 'intval' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_padding_bottom', 'intval' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_padding_left', 'intval' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_padding_right', 'intval' );
	register_setting( 'ndf_load_more_settings_option', 'ndf_load_more_button_margin_top', 'intval' );

} /* end ndf_data_results_load_more_register_settings */

/**
 * Section Callbacks
 */
function ndf_load_more_settings_callback() {
    echo '<p>Load More Button UI Settings</p>';
} /* end ndf_load_more_settings_callback */

/**
 * Field Callbacks
 */
function ndf_load_more_button_label_callback($args) {
	$ndf_load_more_button_label = get_option( 'ndf_load_more_button_label', 'Load More' );

	$html = '<input type="text" id="ndf_load_more_button_label" name="ndf_load_more_button_label" value="'.esc_attr__( $ndf_load_more_button_label ).'" class="regular-text" />';
	echo $html;
} /* end ndf_load_more_button_label_callback */

function ndf_load_more_button_font_size_callback($args) {
	$ndf_load_more_button_font_size = get_option( 'ndf_load_more_button_font_size', '18px' );

	$html = "<select name='ndf_load_more_button_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_load_more_button_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_load_more_button_font_size_callback */

function ndf_load_more_button_lineheight_callback($args) {
	$ndf_load_more_button_lineheight = get_option( 'ndf_load_more_button_lineheight', '1.2' );

	$html = "<select name='ndf_load_more_button_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_load_more_button_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_load_more_button_lineheight_callback */

function ndf_load_more_button_fontcolor_callback($args) {
	$ndf_load_more_button_fontcolor = get_option( 'ndf_load_more_button_fontcolor', '#161616' );

	$html = '<input type="text" id="ndf_load_more_button_fontcolor" name="ndf_load_more_button_fontcolor" value="'.esc_attr__( $ndf_load_more_button_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_load_more_button_fontcolor_callback */

function ndf_load_more_button_background_color_callback($args) {
	$ndf_load_more_button_background_color = get_option( 'ndf_load_more_button_background_color', '#d3d3d3' );

	$html = '<input type="text" id="ndf_load_more_button_background_color" name="ndf_load_more_button_background_color" value="'.esc_attr__( $ndf_load_more_button_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_load_more_button_background_color_callback */

function ndf_load_more_button_hover_background_color_callback($args) {
	$ndf_load_more_button_hover_background_color = get_option( 'ndf_load_more_button_hover_background_color', '#C1C1C1' );

	$html = '<input type="text" id="ndf_load_more_button_hover_background_color" name="ndf_load_more_button_hover_background_color" value="'.esc_attr__( $ndf_load_more_button_hover_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_load_more_button_hover_background_color_callback */

function ndf_load_more_button_border_color_callback($args) {
	$ndf_load_more_button_border_color = get_option( 'ndf_load_more_button_border_color', '#161616' );

	$html = '<input type="text" id="ndf_load_more_button_border_color" name="ndf_load_more_button_border_color" value="'.esc_attr__( $ndf_load_more_button_border_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_load_more_button_border_color_callback */

function ndf_load_more_button_border_width_callback($args) {
	$ndf_load_more_button_border_width = get_option( 'ndf_load_more_button_border_width', 1 );

    $html = '<input type="number" min="0" class="small-text" id="ndf_load_more_button_border_width" name="ndf_load_more_button_border_width" value="'.esc_attr__( $ndf_load_more_button_border_width ).'" /> px';
    echo $html;
} /* end ndf_load_more_button_border_width_callback */

function ndf_load_more_button_border_radius_callback($args) {
	$ndf_load_more_button_border_radius = get_option( 'ndf_load_more_button_border_radius', 0 );

    $html = '<input type="number" min="0" class="small-text" id="ndf_load_more_button_border_radius" name="ndf_load_more_button_border_radius" value="'.esc_attr__( $ndf_load_more_button_border_radius ).'" /> px';
    echo $html;
} /* end ndf_load_more_button_border_radius_callback */

function ndf_load_more_button_padding_top_callback($args) {
	$ndf_load_more_button_padding_top = get_option( 'ndf_load_more_button_padding_top', 10 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_load_more_button_padding_top" name="ndf_load_more_button_padding_top" value="'.esc_attr__( $ndf_load_more_button_padding_top ).'" /> px';
	echo $html;
} /* end ndf_load_more_button_padding_top_callback */

function ndf_load_more_button_padding_bottom_callback($args) {
	$ndf_load_more_button_padding_bottom = get_option( 'ndf_load_more_button_padding_bottom', 10 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_load_more_button_padding_bottom" name="ndf_load_more_button_padding_bottom" value="'.esc_attr__( $ndf_load_more_button_padding_bottom ).'" /> px';
	echo $html;
} /* end ndf_load_more_button_padding_bottom_callback */

function ndf_load_more_button_padding_left_callback($args) {
	$ndf_load_more_button_padding_left = get_option( 'ndf_load_more_button_padding_left', 40 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_load_more_button_padding_left" name="ndf_load_more_button_padding_left" value="'.esc_attr__( $ndf_load_more_button_padding_left ).'" /> px';
	echo $html;
} /* end ndf_load_more_button_padding_left_callback */

function ndf_load_more_button_padding_right_callback($args) {
	$ndf_load_more_button_padding_right = get_option( 'ndf_load_more_button_padding_right', 40 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_load_more_button_padding_right" name="ndf_load_more_button_padding_right" value="'.esc_attr__( $ndf_load_more_button_padding_right ).'" /> px';
	echo $html;
} /* end ndf_load_more_button_padding_right_callback */

function ndf_load_more_button_margin_top_callback($args) {
	$ndf_load_more_button_margin_top = get_option( 'ndf_load_more_button_margin_top', 20 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_load_more_button_margin_top" name="ndf_load_more_button_margin_top" value="'.esc_attr__( $ndf_load_more_button_margin_top ).'" /> px';
	echo $html;
} /* end ndf_load_more_button_margin_top_callback */