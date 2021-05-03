<?php
/**
 * Filters Section Reset Button Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/filter-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_reset_button_register_settings');
function ndf_reset_button_register_settings() {

	/* Register Filters Section Reset Button Settings */
	add_settings_section(
		'ndf_reset_button_settings_section',
		'Reset Button UI',
		'ndf_reset_button_settings_callback',
		'ndf_reset_button_settings_option'
	);

	/* Initialize Filters Section Reset Button Settings Fields */
	add_settings_field( 
		'ndf_reset_button_show',
		'Show Reset button',
		'ndf_reset_button_show_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);

	add_settings_field( 
		'ndf_reset_button_label',
		'Button Label',
		'ndf_reset_button_label_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	
	add_settings_field(
		'ndf_reset_button_font_size',
		'Button Font Size',
		'ndf_reset_button_font_size_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section',
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
		'ndf_reset_button_lineheight',
		'Button Line Height',
		'ndf_reset_button_lineheight_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section',
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
		'ndf_reset_button_fontcolor',
		'Button Font Color',
		'ndf_reset_button_fontcolor_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	
	add_settings_field( 
		'ndf_reset_button_hover_fontcolor',
		'Button Hover Font Color',
		'ndf_reset_button_hover_fontcolor_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	
	add_settings_field(
		'ndf_reset_button_background_color',
		'Button Background Color',
		'ndf_reset_button_background_color_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	
	add_settings_field( 
		'ndf_reset_button_hover_background_color',
		'Button Hover Background Color',
		'ndf_reset_button_hover_background_color_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);

	add_settings_field( 
		'ndf_reset_button_border_color',
		'Button Border Color',
		'ndf_reset_button_border_color_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	
	add_settings_field( 
		'ndf_reset_button_border_width',
		'Button Border Size',
		'ndf_reset_button_border_width_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);

	add_settings_field( 
		'ndf_reset_button_border_radius',
		'Button Border Radius',
		'ndf_reset_button_border_radius_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);

	add_settings_field( 
		'ndf_reset_button_padding_top',
		'Button Padding Top',
		'ndf_reset_button_padding_top_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	add_settings_field( 
		'ndf_reset_button_padding_bottom',
		'Button Padding Bottom',
		'ndf_reset_button_padding_bottom_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	add_settings_field( 
		'ndf_reset_button_padding_left',
		'Button Padding Left',
		'ndf_reset_button_padding_left_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	add_settings_field( 
		'ndf_reset_button_padding_right',
		'Button Padding Right',
		'ndf_reset_button_padding_right_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);

	add_settings_field( 
		'ndf_reset_button_margin_top',
		'Button Margin Top',
		'ndf_reset_button_margin_top_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);
	add_settings_field( 
		'ndf_reset_button_margin_bottom',
		'Button Margin Bottom',
		'ndf_reset_button_margin_bottom_callback',
		'ndf_reset_button_settings_option',
		'ndf_reset_button_settings_section'
	);

	/* Register Filters Section Reset Button Settings Fields */
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_show' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_label' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_font_size' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_lineheight' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_fontcolor' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_hover_fontcolor' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_background_color' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_hover_background_color' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_border_color' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_border_width', 'intval' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_border_radius', 'intval' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_padding_top', 'intval' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_padding_bottom', 'intval' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_padding_left', 'intval' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_padding_right', 'intval' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_margin_top', 'intval' );
	register_setting( 'ndf_reset_button_settings_option', 'ndf_reset_button_margin_bottom', 'intval' );

} /* end ndf_reset_button_register_settings */

/**
* Section Callbacks
*/
function ndf_reset_button_settings_callback() {
	echo '<p></p>';
} /* end ndf_reset_button_settings_callback */

/**
* Field Callbacks
*/
function ndf_reset_button_show_callback($args) {
	$ndf_reset_button_show = get_option( 'ndf_reset_button_show', 1 );

	$html = '<input type="checkbox" id="ndf_reset_button_show" name="ndf_reset_button_show" value="1" ' . checked( 1, $ndf_reset_button_show, false ) . '/>'; 
	echo $html;
} /* end ndf_reset_button_show_callback */

function ndf_reset_button_label_callback($args) {
	$ndf_reset_button_label = get_option( 'ndf_reset_button_label', 'Reset Filters' );

	$html = '<input type="text" id="ndf_reset_button_label" name="ndf_reset_button_label" value="'.esc_attr__( $ndf_reset_button_label ).'" class="regular-text" />';
	echo $html;
} /* end ndf_reset_button_label_callback */

function ndf_reset_button_font_size_callback($args) {
	$ndf_reset_button_font_size = get_option( 'ndf_reset_button_font_size', '16px' );

	$html = "<select name='ndf_reset_button_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_reset_button_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_reset_button_font_size_callback */

function ndf_reset_button_lineheight_callback($args) {
	$ndf_reset_button_lineheight = get_option( 'ndf_reset_button_lineheight', '1.2' );

	$html = "<select name='ndf_reset_button_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_reset_button_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_reset_button_lineheight_callback */

function ndf_reset_button_fontcolor_callback($args) {
	$ndf_reset_button_fontcolor = get_option( 'ndf_reset_button_fontcolor', '#161616' );

	$html = '<input type="text" id="ndf_reset_button_fontcolor" name="ndf_reset_button_fontcolor" value="'.esc_attr__( $ndf_reset_button_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_reset_button_fontcolor_callback */

function ndf_reset_button_hover_fontcolor_callback($args) {
	$ndf_reset_button_hover_fontcolor = get_option( 'ndf_reset_button_hover_fontcolor', '#161616' );

	$html = '<input type="text" id="ndf_reset_button_hover_fontcolor" name="ndf_reset_button_hover_fontcolor" value="'.esc_attr__( $ndf_reset_button_hover_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_reset_button_hover_fontcolor_callback */

function ndf_reset_button_background_color_callback($args) {
	$ndf_reset_button_background_color = get_option( 'ndf_reset_button_background_color', '#FFFFFF' );

	$html = '<input type="text" id="ndf_reset_button_background_color" name="ndf_reset_button_background_color" value="'.esc_attr__( $ndf_reset_button_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_reset_button_background_color_callback */

function ndf_reset_button_hover_background_color_callback($args) {
	$ndf_reset_button_hover_background_color = get_option( 'ndf_reset_button_hover_background_color', '#d3d3d3' );

	$html = '<input type="text" id="ndf_reset_button_hover_background_color" name="ndf_reset_button_hover_background_color" value="'.esc_attr__( $ndf_reset_button_hover_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_reset_button_hover_background_color_callback */

function ndf_reset_button_border_color_callback($args) {
	$ndf_reset_button_border_color = get_option( 'ndf_reset_button_border_color', '#161616' );

	$html = '<input type="text" id="ndf_reset_button_border_color" name="ndf_reset_button_border_color" value="'.esc_attr__( $ndf_reset_button_border_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_reset_button_border_color_callback */

function ndf_reset_button_border_width_callback($args) {
	$ndf_reset_button_border_width = get_option( 'ndf_reset_button_border_width', 1 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_reset_button_border_width" name="ndf_reset_button_border_width" value="'.esc_attr__( $ndf_reset_button_border_width ).'" /> px';
	echo $html;
} /* end ndf_reset_button_border_width_callback */

function ndf_reset_button_border_radius_callback($args) {
	$ndf_reset_button_border_radius = get_option( 'ndf_reset_button_border_radius', 0 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_reset_button_border_radius" name="ndf_reset_button_border_radius" value="'.esc_attr__( $ndf_reset_button_border_radius ).'" /> px';
	echo $html;
} /* end ndf_reset_button_border_radius_callback */

function ndf_reset_button_padding_top_callback($args) {
	$ndf_reset_button_padding_top = get_option( 'ndf_reset_button_padding_top', 5 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_reset_button_padding_top" name="ndf_reset_button_padding_top" value="'.esc_attr__( $ndf_reset_button_padding_top ).'" /> px';
	echo $html;
} /* end ndf_reset_button_padding_top_callback */

function ndf_reset_button_padding_bottom_callback($args) {
	$ndf_reset_button_padding_bottom = get_option( 'ndf_reset_button_padding_bottom', 5 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_reset_button_padding_bottom" name="ndf_reset_button_padding_bottom" value="'.esc_attr__( $ndf_reset_button_padding_bottom ).'" /> px';
	echo $html;
} /* end ndf_reset_button_padding_bottom_callback */

function ndf_reset_button_padding_left_callback($args) {
	$ndf_reset_button_padding_left = get_option( 'ndf_reset_button_padding_left', 15 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_reset_button_padding_left" name="ndf_reset_button_padding_left" value="'.esc_attr__( $ndf_reset_button_padding_left ).'" /> px';
	echo $html;
} /* end ndf_reset_button_padding_left_callback */

function ndf_reset_button_padding_right_callback($args) {
	$ndf_reset_button_padding_right = get_option( 'ndf_reset_button_padding_right', 15 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_reset_button_padding_right" name="ndf_reset_button_padding_right" value="'.esc_attr__( $ndf_reset_button_padding_right ).'" /> px';
	echo $html;
} /* end ndf_reset_button_padding_right_callback */

function ndf_reset_button_margin_top_callback($args) {
	$ndf_reset_button_margin_top = get_option( 'ndf_reset_button_margin_top', 10 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_reset_button_margin_top" name="ndf_reset_button_margin_top" value="'.esc_attr__( $ndf_reset_button_margin_top ).'" /> px';
	echo $html;
} /* end ndf_reset_button_margin_top_callback */

function ndf_reset_button_margin_bottom_callback($args) {
	$ndf_reset_button_margin_bottom = get_option( 'ndf_reset_button_margin_bottom', 10 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_reset_button_margin_bottom" name="ndf_reset_button_margin_bottom" value="'.esc_attr__( $ndf_reset_button_margin_bottom ).'" /> px';
	echo $html;
} /* end ndf_reset_button_margin_bottom_callback */