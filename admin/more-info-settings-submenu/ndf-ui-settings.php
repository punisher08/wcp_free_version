<?php
/**
 * More Info `UI Settings` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/more-info-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_more_info_fields_ui_settings_register_settings');
function ndf_more_info_fields_ui_settings_register_settings() {

	/* Register More Info Fields UI Settings */
	add_settings_section(
		'ndf_more_info_fields_ui_settings_section',
		'More Info Fields Table',	
		'ndf_more_info_fields_ui_settings_callback',
		'ndf_more_info_fields_ui_settings_option'
	);

	/* Initialize More Info Fields UI Settings Fields */
	add_settings_field(
		'ndf_more_info_fields_heading_style',
		'Heading Label Style',
		'ndf_more_info_fields_heading_style_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section',
		array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		)
	);
	add_settings_field(
		'ndf_more_info_fields_logo_width',
		'Logo width',
		'ndf_more_info_fields_logo_width_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field( 
		'ndf_more_info_fields_heading_label_fontcolor',
		'Heading Label Font Color',
		'ndf_more_info_fields_heading_label_fontcolor_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field(
		'ndf_more_info_fields_summary_label_heading_style',
		'Summary Label Heading Style',
		'ndf_more_info_fields_summary_label_heading_style_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section',
		array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		)
	);

	add_settings_field(
		'ndf_more_info_fields_summary_label_lineheight',
		'Summary Label Line Height',
		'ndf_more_info_fields_summary_label_lineheight_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section',
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
		'ndf_more_info_fields_summary_label_fontcolor',
		'Summary Label Font Color',
		'ndf_more_info_fields_summary_label_fontcolor_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field( 
		'ndf_more_info_fields_summary_table_header_font_size',
		'Summary Table Header Font Size',
		'ndf_more_info_fields_summary_table_header_font_size_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section',
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
		'ndf_more_info_fields_summary_table_header_fontcolor',
		'Summary Table Header Font Color',
		'ndf_more_info_fields_summary_table_header_fontcolor_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field( 
		'ndf_more_info_fields_table_header_background_color',
		'Table Header Background Color',
		'ndf_more_info_fields_table_header_background_color_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);
	
	add_settings_field( 
		'ndf_more_info_fields_header_font_size',
		'Table Header Title Font Size',
		'ndf_more_info_fields_header_font_size_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section',
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
		'ndf_more_info_fields_header_fontcolor',
		'Table Header Title Color',
		'ndf_more_info_fields_header_fontcolor_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field( 
		'ndf_more_info_fields_table_background_color',
		'Background Color',
		'ndf_more_info_fields_table_background_color_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field( 
		'ndf_more_info_fields_table_font_size',
		'Font Size',
		'ndf_more_info_fields_table_font_size_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section',
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
		'ndf_more_info_fields_table_font_color',
		'Font Color',
		'ndf_more_info_fields_table_font_color_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);
	
	add_settings_field( 
		'ndf_more_info_fields_text_alignment',
		'Text Alignment',
		'ndf_more_info_fields_text_alignment_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section',
		array(
			'left' => 'Left',
			'center' => 'Center',
			'right' => 'Right',
			'justify' => 'Justify',
		)
	);

	add_settings_field( 
		'ndf_more_info_fields_table_row_space',
		'Table Row Space',
		'ndf_more_info_fields_table_row_space_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field( 
		'ndf_more_info_fields_table_border_color',
		'Border Color',
		'ndf_more_info_fields_table_border_color_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field( 
		'ndf_more_info_fields_table_border_width',
		'Border Size',
		'ndf_more_info_fields_table_border_width_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	add_settings_field( 
		'ndf_more_info_fields_table_border_radius',
		'Border Radius',
		'ndf_more_info_fields_table_border_radius_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);
	
	add_settings_field( 
		'ndf_more_info_fields_modal_background_color',
		'Modal Background Color',
		'ndf_more_info_fields_modal_background_color_callback',
		'ndf_more_info_fields_ui_settings_option',
		'ndf_more_info_fields_ui_settings_section'
	);

	/* Register Table Settings Section Fields */
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_heading_style' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_logo_width' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_heading_label_fontcolor' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_summary_label_heading_style' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_summary_label_lineheight' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_summary_label_fontcolor' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_summary_table_header_font_size' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_summary_table_header_fontcolor' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_table_header_background_color' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_table_background_color' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_header_font_size' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_header_fontcolor' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_table_font_size' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_table_font_color' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_text_alignment' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_table_row_space', 'intval' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_table_border_color' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_table_border_width', 'intval' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_table_border_radius', 'intval' );
	register_setting( 'ndf_more_info_fields_ui_settings_option', 'ndf_more_info_fields_modal_background_color' );
} /* end ndf_more_info_fields_ui_settings_register_settings */

/**
* Section Callbacks
*/
function ndf_more_info_fields_ui_settings_callback() {
	echo '<p></p>';
} /* end ndf_more_info_fields_ui_settings_callback */

/**
* Field Callbacks
*/
function ndf_more_info_fields_heading_style_callback($args) {
	$ndf_more_info_fields_heading_style = get_option( 'ndf_more_info_fields_heading_style', 'h2' );

	$html = "<select name='ndf_more_info_fields_heading_style' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_more_info_fields_heading_style, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_more_info_fields_heading_style_callback */

function ndf_more_info_fields_logo_width_callback($args) {
	$ndf_more_info_fields_logo_width = get_option( 'ndf_more_info_fields_logo_width', 'auto' );
	$html = '<input type="text" id="ndf_more_info_fields_logo_width" name="ndf_more_info_fields_logo_width" value="'.esc_attr__( $ndf_more_info_fields_logo_width ).'"  />';
    echo $html;
} /* end ndf_more_info_fields_logo_width_callback */


function ndf_more_info_fields_heading_label_fontcolor_callback($args) {
	$ndf_more_info_fields_heading_label_fontcolor = get_option( 'ndf_more_info_fields_heading_label_fontcolor', '#000000' );

    $html = '<input type="text" id="ndf_more_info_fields_heading_label_fontcolor" name="ndf_more_info_fields_heading_label_fontcolor" value="'.esc_attr__( $ndf_more_info_fields_heading_label_fontcolor ).'" class="ndf_colorpicker" />';
    echo $html;
} /* end ndf_more_info_fields_heading_label_fontcolor_callback */

function ndf_more_info_fields_summary_label_heading_style_callback($args) {
	$ndf_more_info_fields_summary_label_heading_style = get_option( 'ndf_more_info_fields_summary_label_heading_style', 'h2' );

	$html = "<select name='ndf_more_info_fields_summary_label_heading_style' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_more_info_fields_summary_label_heading_style, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_more_info_fields_summary_label_heading_style_callback */

function ndf_more_info_fields_summary_label_lineheight_callback($args) {
	$ndf_more_info_fields_summary_label_lineheight = get_option( 'ndf_more_info_fields_summary_label_lineheight', '1.2' );

	$html = "<select name='ndf_more_info_fields_summary_label_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_more_info_fields_summary_label_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_more_info_fields_summary_label_lineheight_callback */

function ndf_more_info_fields_summary_label_fontcolor_callback($args) {
	$ndf_more_info_fields_summary_label_fontcolor = get_option( 'ndf_more_info_fields_summary_label_fontcolor', '#000000' );

    $html = '<input type="text" id="ndf_more_info_fields_summary_label_fontcolor" name="ndf_more_info_fields_summary_label_fontcolor" value="'.esc_attr__( $ndf_more_info_fields_summary_label_fontcolor ).'" class="ndf_colorpicker" />';
    echo $html;
} /* end ndf_more_info_fields_summary_label_fontcolor_callback */

function ndf_more_info_fields_summary_table_header_font_size_callback($args) {
	$ndf_more_info_fields_summary_table_header_font_size = get_option( 'ndf_more_info_fields_summary_table_header_font_size', '14px' );
	
	$html = "<select name='ndf_more_info_fields_summary_table_header_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_more_info_fields_summary_table_header_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_more_info_fields_summary_table_header_font_size_callback */

function ndf_more_info_fields_summary_table_header_fontcolor_callback($args) {
	$ndf_more_info_fields_summary_table_header_fontcolor = get_option( 'ndf_more_info_fields_summary_table_header_fontcolor', '#000000' );

    $html = '<input type="text" id="ndf_more_info_fields_summary_table_header_fontcolor" name="ndf_more_info_fields_summary_table_header_fontcolor" value="'.esc_attr__( $ndf_more_info_fields_summary_table_header_fontcolor ).'" class="ndf_colorpicker" />';
    echo $html;
} /* end ndf_more_info_fields_summary_table_header_fontcolor_callback */

function ndf_more_info_fields_table_header_background_color_callback($args) {
	$ndf_more_info_fields_table_header_background_color = get_option( 'ndf_more_info_fields_table_header_background_color', '#ffffff' );

	$html = '<input type="text" id="ndf_more_info_fields_table_header_background_color" name="ndf_more_info_fields_table_header_background_color" value="'.esc_attr__( $ndf_more_info_fields_table_header_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_more_info_fields_table_header_background_color_callback */

function ndf_more_info_fields_header_font_size_callback($args) {
	$ndf_more_info_fields_header_font_size = get_option( 'ndf_more_info_fields_header_font_size', '14px' );

	$html = "<select name='ndf_more_info_fields_header_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_more_info_fields_header_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_more_info_fields_header_font_size_callback */

function ndf_more_info_fields_table_background_color_callback($args) {
	$ndf_more_info_fields_table_background_color = get_option( 'ndf_more_info_fields_table_background_color', 'inherit' );

	$html = '<input type="text" id="ndf_more_info_fields_table_background_color" name="ndf_more_info_fields_table_background_color" value="'.esc_attr__( $ndf_more_info_fields_table_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_more_info_fields_table_background_color_callback */

function ndf_more_info_fields_header_fontcolor_callback($args) {
	$ndf_more_info_fields_header_fontcolor = get_option( 'ndf_more_info_fields_header_fontcolor', '#000000' );

	$html = '<input type="text" id="ndf_more_info_fields_header_fontcolor" name="ndf_more_info_fields_header_fontcolor" value="'.esc_attr__( $ndf_more_info_fields_header_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_more_info_fields_header_fontcolor_callback */

function ndf_more_info_fields_table_font_size_callback($args) {
	$ndf_more_info_fields_table_font_size = get_option( 'ndf_more_info_fields_table_font_size', '14px' );

	$html = "<select name='ndf_more_info_fields_table_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_more_info_fields_table_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_more_info_fields_table_font_size_callback */

function ndf_more_info_fields_table_font_color_callback($args) {
	$ndf_more_info_fields_table_font_color = get_option( 'ndf_more_info_fields_table_font_color', '#161616' );

	$html = '<input type="text" id="ndf_more_info_fields_table_font_color" name="ndf_more_info_fields_table_font_color" value="'.esc_attr__( $ndf_more_info_fields_table_font_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_more_info_fields_table_font_color_callback */

function ndf_more_info_fields_text_alignment_callback($args) {
	$ndf_more_info_fields_text_alignment = get_option( 'ndf_more_info_fields_text_alignment', 'center' );

	$html = "<select name='ndf_more_info_fields_text_alignment' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_more_info_fields_text_alignment, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_more_info_fields_text_alignment_callback */

function ndf_more_info_fields_table_row_space_callback($args) {
	$ndf_more_info_fields_table_row_space = get_option( 'ndf_more_info_fields_table_row_space', 30 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_more_info_fields_table_row_space" name="ndf_more_info_fields_table_row_space" value="'.esc_attr__( $ndf_more_info_fields_table_row_space ).'" /> px';
	echo $html;
} /* end ndf_more_info_fields_table_row_space_callback */

function ndf_more_info_fields_table_border_color_callback($args) {
	$ndf_more_info_fields_table_border_color = get_option( 'ndf_more_info_fields_table_border_color', 'inherit' );

	$html = '<input type="text" id="ndf_more_info_fields_table_border_color" name="ndf_more_info_fields_table_border_color" value="'.esc_attr__( $ndf_more_info_fields_table_border_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_more_info_fields_table_border_color_callback */

function ndf_more_info_fields_table_border_width_callback($args) {
	$ndf_more_info_fields_table_border_width = get_option( 'ndf_more_info_fields_table_border_width', 0 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_more_info_fields_table_border_width" name="ndf_more_info_fields_table_border_width" value="'.esc_attr__( $ndf_more_info_fields_table_border_width ).'" /> px';
	echo $html;
} /* end ndf_more_info_fields_table_border_width_callback */

function ndf_more_info_fields_table_border_radius_callback($args) {
	$ndf_more_info_fields_table_border_radius = get_option( 'ndf_more_info_fields_table_border_radius', 0 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_more_info_fields_table_border_radius" name="ndf_more_info_fields_table_border_radius" value="'.esc_attr__( $ndf_more_info_fields_table_border_radius ).'" /> px';
	echo $html;
} /* end ndf_more_info_fields_table_border_radius_callback */

function ndf_more_info_fields_modal_background_color_callback($args) {
	$ndf_more_info_fields_modal_background_color = get_option( 'ndf_more_info_fields_modal_background_color', '#FFFFFF' );

	$html = '<input type="text" id="ndf_more_info_fields_modal_background_color" name="ndf_more_info_fields_modal_background_color" value="'.esc_attr__( $ndf_more_info_fields_modal_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_more_info_fields_modal_background_color_callback */