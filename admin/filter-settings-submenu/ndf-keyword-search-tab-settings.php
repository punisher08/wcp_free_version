<?php
/**
 * Filters Section Keyword Search Form Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/filter-settings-submenu
 * @since 		1.5.2.4
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_keyword_search_register_settings');
function ndf_keyword_search_register_settings() {

	/* Register Filters Section Reset Button Settings */
	add_settings_section(
		'ndf_keyword_search_settings_section',
		'Keyword Search Form UI',
		'ndf_keyword_search_settings_callback',
		'ndf_keyword_search_settings_option'
	);

	/* Initialize Filters Section Reset Button Settings Fields */
	add_settings_field( 
		'ndf_keyword_search_show',
		'Show Keyword Search form',
		'ndf_keyword_search_show_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);

	add_settings_field( 
		'ndf_keyword_search_label',
		'Button Label',
		'ndf_keyword_search_label_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);
	
	add_settings_field(
		'ndf_keyword_search_font_size',
		'Button Font Size',
		'ndf_keyword_search_font_size_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section',
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
		'ndf_keyword_search_lineheight',
		'Button Line Height',
		'ndf_keyword_search_lineheight_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section',
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
		'ndf_keyword_search_fontcolor',
		'Button Font Color',
		'ndf_keyword_search_fontcolor_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);
	
	add_settings_field( 
		'ndf_keyword_search_hover_fontcolor',
		'Button Hover Font Color',
		'ndf_keyword_search_hover_fontcolor_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);
	
	add_settings_field(
		'ndf_keyword_search_background_color',
		'Button Background Color',
		'ndf_keyword_search_background_color_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);
	
	add_settings_field(
		'ndf_keyword_search_hover_background_color',
		'Button Hover Background Color',
		'ndf_keyword_search_hover_background_color_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);

	add_settings_field( 
		'ndf_keyword_search_border_radius',
		'Button Border Radius',
		'ndf_keyword_search_border_radius_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);

	add_settings_field( 
		'ndf_keyword_search_padding_top',
		'Button Padding Top',
		'ndf_keyword_search_padding_top_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);

	add_settings_field( 
		'ndf_keyword_search_padding_bottom',
		'Button Padding Bottom',
		'ndf_keyword_search_padding_bottom_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);

	add_settings_field( 
		'ndf_keyword_search_padding_left',
		'Button Padding Left',
		'ndf_keyword_search_padding_left_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);

	add_settings_field( 
		'ndf_keyword_search_padding_right',
		'Button Padding Right',
		'ndf_keyword_search_padding_right_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);
	
	add_settings_field( 
		'ndf_keyword_search_margin_top',
		'Button Margin Top',
		'ndf_keyword_search_margin_top_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);
	add_settings_field( 
		'ndf_keyword_search_margin_bottom',
		'Button Margin Bottom',
		'ndf_keyword_search_margin_bottom_callback',
		'ndf_keyword_search_settings_option',
		'ndf_keyword_search_settings_section'
	);

	/* Register Filters Section Reset Button Settings Fields */
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_show' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_label' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_font_size' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_lineheight' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_fontcolor' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_hover_fontcolor' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_background_color' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_hover_background_color' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_border_radius', 'intval' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_padding_top', 'intval' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_padding_bottom', 'intval' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_padding_left', 'intval' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_padding_right', 'intval' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_margin_top', 'intval' );
	register_setting( 'ndf_keyword_search_settings_option', 'ndf_keyword_search_margin_bottom', 'intval' );

} /* end ndf_keyword_search_register_settings */

/**
* Section Callbacks
*/
function ndf_keyword_search_settings_callback() {
	echo '<p></p>';
} /* end ndf_keyword_search_settings_callback */

/**
* Field Callbacks
*/
function ndf_keyword_search_show_callback($args) {
	$ndf_keyword_search_show = get_option( 'ndf_keyword_search_show', 1 );

	$html = '<input type="checkbox" id="ndf_keyword_search_show" name="ndf_keyword_search_show" value="1" ' . checked( 1, $ndf_keyword_search_show, false ) . '/>'; 
	echo $html;
} /* end ndf_keyword_search_show_callback */

function ndf_keyword_search_label_callback($args) {
	$ndf_keyword_search_label = get_option( 'ndf_keyword_search_label', 'Search' );

	$html = '<input type="text" id="ndf_keyword_search_label" name="ndf_keyword_search_label" value="'.esc_attr__( $ndf_keyword_search_label ).'" class="regular-text" />';
	echo $html;
} /* end ndf_keyword_search_label_callback */

function ndf_keyword_search_font_size_callback($args) {
	$ndf_keyword_search_font_size = get_option( 'ndf_keyword_search_font_size', '16px' );

	$html = "<select name='ndf_keyword_search_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_keyword_search_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_keyword_search_font_size_callback */

function ndf_keyword_search_lineheight_callback($args) {
	$ndf_keyword_search_lineheight = get_option( 'ndf_keyword_search_lineheight', '1.2' );

	$html = "<select name='ndf_keyword_search_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_keyword_search_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_keyword_search_lineheight_callback */

function ndf_keyword_search_fontcolor_callback($args) {
	$ndf_keyword_search_fontcolor = get_option( 'ndf_keyword_search_fontcolor', '#FFFFFF' );

	$html = '<input type="text" id="ndf_keyword_search_fontcolor" name="ndf_keyword_search_fontcolor" value="'.esc_attr__( $ndf_keyword_search_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_keyword_search_fontcolor_callback */

function ndf_keyword_search_hover_fontcolor_callback($args) {
	$ndf_keyword_search_hover_fontcolor = get_option( 'ndf_keyword_search_hover_fontcolor', '#161616' );

	$html = '<input type="text" id="ndf_keyword_search_hover_fontcolor" name="ndf_keyword_search_hover_fontcolor" value="'.esc_attr__( $ndf_keyword_search_hover_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_keyword_search_hover_fontcolor_callback */

function ndf_keyword_search_background_color_callback($args) {
	$ndf_keyword_search_background_color = get_option( 'ndf_keyword_search_background_color', '#161616' );

	$html = '<input type="text" id="ndf_keyword_search_background_color" name="ndf_keyword_search_background_color" value="'.esc_attr__( $ndf_keyword_search_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_keyword_search_background_color_callback */

function ndf_keyword_search_hover_background_color_callback($args) {
	$ndf_keyword_search_hover_background_color = get_option( 'ndf_keyword_search_hover_background_color', '#d3d3d3' );

	$html = '<input type="text" id="ndf_keyword_search_hover_background_color" name="ndf_keyword_search_hover_background_color" value="'.esc_attr__( $ndf_keyword_search_hover_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_keyword_search_hover_background_color_callback */

function ndf_keyword_search_border_radius_callback($args) {
	$ndf_keyword_search_border_radius = get_option( 'ndf_keyword_search_border_radius', 0 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_keyword_search_border_radius" name="ndf_keyword_search_border_radius" value="'.esc_attr__( $ndf_keyword_search_border_radius ).'" /> px';
	echo $html;
} /* end ndf_keyword_search_border_radius_callback */

function ndf_keyword_search_padding_top_callback($args) {
	$ndf_keyword_search_padding_top = get_option( 'ndf_keyword_search_padding_top', 5 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_keyword_search_padding_top" name="ndf_keyword_search_padding_top" value="'.esc_attr__( $ndf_keyword_search_padding_top ).'" /> px';
	echo $html;
} /* end ndf_keyword_search_padding_top_callback */

function ndf_keyword_search_padding_bottom_callback($args) {
	$ndf_keyword_search_padding_bottom = get_option( 'ndf_keyword_search_padding_bottom', 5 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_keyword_search_padding_bottom" name="ndf_keyword_search_padding_bottom" value="'.esc_attr__( $ndf_keyword_search_padding_bottom ).'" /> px';
	echo $html;
} /* end ndf_keyword_search_padding_bottom_callback */

function ndf_keyword_search_padding_left_callback($args) {
	$ndf_keyword_search_padding_left = get_option( 'ndf_keyword_search_padding_left', 15 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_keyword_search_padding_left" name="ndf_keyword_search_padding_left" value="'.esc_attr__( $ndf_keyword_search_padding_left ).'" /> px';
	echo $html;
} /* end ndf_keyword_search_padding_left_callback */

function ndf_keyword_search_padding_right_callback($args) {
	$ndf_keyword_search_padding_right = get_option( 'ndf_keyword_search_padding_right', 15 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_keyword_search_padding_right" name="ndf_keyword_search_padding_right" value="'.esc_attr__( $ndf_keyword_search_padding_right ).'" /> px';
	echo $html;
} /* end ndf_keyword_search_padding_right_callback */

function ndf_keyword_search_margin_top_callback($args) {
	$ndf_keyword_search_margin_top = get_option( 'ndf_keyword_search_margin_top', 10 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_keyword_search_margin_top" name="ndf_keyword_search_margin_top" value="'.esc_attr__( $ndf_keyword_search_margin_top ).'" /> px';
	echo $html;
} /* end ndf_keyword_search_margin_top_callback */

function ndf_keyword_search_margin_bottom_callback($args) {
	$ndf_keyword_search_margin_bottom = get_option( 'ndf_keyword_search_margin_bottom', 10 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_keyword_search_margin_bottom" name="ndf_keyword_search_margin_bottom" value="'.esc_attr__( $ndf_keyword_search_margin_bottom ).'" /> px';
	echo $html;
} /* end ndf_keyword_search_margin_bottom_callback */