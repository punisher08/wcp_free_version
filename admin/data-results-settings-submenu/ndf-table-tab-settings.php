<?php
/**
 * Data Results Section Table Properties Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/data-results-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_data_results_table_section_register_settings');
function ndf_data_results_table_section_register_settings() {

	/* Register Table Settings Section */
	add_settings_section(
		'ndf_data_results_table_settings_section',
		'Table Settings',
		'ndf_data_results_table_settings_callback',
		'ndf_data_results_table_settings_option'
	);

	/* Initialize Table Settings Section Fields */
	add_settings_field( 
		'ndf_data_results_layout',
		'Results Table Layout',
		'ndf_data_results_layout_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section',
		array(
			'tabular' => 'Tabular View',
			'horizontal' => 'Horizontal View',
		)
	);

	add_settings_field( 
		'ndf_data_results_h_layout_options',
		'Horizontal View Layout Options',
		'ndf_data_results_h_layout_options_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section',
		array(
			'no-label' => 'Horizontal No Labels',
			'tight-view' => 'Horizontal Tight View',
			'narrow-height' => 'Horizontal Narrow Height',
		)
	);

	add_settings_field( 
		'ndf_data_results_table_header_background_color',
		'Table Header Background Color',
		'ndf_data_results_table_header_background_color_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section'
	);
	
	add_settings_field( 
		'ndf_data_results_category_font_size',
		'Category Title Font Size',
		'ndf_data_results_category_font_size_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section',
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
		'ndf_data_results_category_lineheight',
		'Category Title Line Height',
		'ndf_data_results_category_lineheight_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section',
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
		'ndf_data_results_category_fontcolor',
		'Category Title Color',
		'ndf_data_results_category_fontcolor_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section'
	);

	add_settings_field( 
		'ndf_data_results_table_title_cell_background_color',
		'Title Cell Background Color',
		'ndf_data_results_table_title_cell_background_color_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section'
	);
	
	add_settings_field( 
		'ndf_data_results_table_title_cell_font_color',
		'Title Cell Font Color',
		'ndf_data_results_table_title_cell_font_color_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section'
	);

	add_settings_field( 
		'ndf_data_results_table_background_color',
		'Background Color',
		'ndf_data_results_table_background_color_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section'
	);

	add_settings_field( 
		'ndf_data_results_table_font_size',
		'Font Size',
		'ndf_data_results_table_font_size_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section',
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
		'ndf_data_results_table_lineheight',
		'Text Line Height',
		'ndf_data_results_table_lineheight_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section',
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
		'ndf_data_results_table_font_color',
		'Font Color',
		'ndf_data_results_table_font_color_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section'
	);

	add_settings_field( 
		'ndf_data_results_table_border_color',
		'Border Color',
		'ndf_data_results_table_border_color_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section'
	);

	// add_settings_field( 
		// 'ndf_data_results_table_border_width',
		// 'Border Size',
		// 'ndf_data_results_table_border_width_callback',
		// 'ndf_data_results_table_settings_option',
		// 'ndf_data_results_table_settings_section'
	// );

	add_settings_field( 
		'ndf_data_results_table_border_radius',
		'Border Radius',
		'ndf_data_results_table_border_radius_callback',
		'ndf_data_results_table_settings_option',
		'ndf_data_results_table_settings_section'
	);

	/* Register Table Settings Section Fields */
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_layout' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_h_layout_options' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_header_background_color' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_title_cell_background_color' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_title_cell_font_color' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_background_color' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_category_font_size' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_category_lineheight' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_category_fontcolor' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_font_size' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_lineheight' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_font_color' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_border_color' );
	// register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_border_width', 'intval' );
	register_setting( 'ndf_data_results_table_settings_option', 'ndf_data_results_table_border_radius', 'intval' );

} /* end ndf_data_results_table_section_register_settings */

/**
 * Section Callbacks
 */
function ndf_data_results_table_settings_callback() {
    echo '<p>Data Results Table UI Settings</p>';
} /* end ndf_data_results_table_settings_callback */

/**
 * Field Callbacks
 */
function ndf_data_results_layout_callback($args) {
	$ndf_data_results_layout = get_option( 'ndf_data_results_layout', 'tabular' );

	$html = "<select name='ndf_data_results_layout' id='ndf_data_results_layout' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_data_results_layout, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_data_results_layout_callback */

function ndf_data_results_h_layout_options_callback($args) {
	$ndf_data_results_h_layout_options = get_option( 'ndf_data_results_h_layout_options', 'no-label' );

	$html = "<select name='ndf_data_results_h_layout_options' id='ndf_data_results_h_layout_options' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_data_results_h_layout_options, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_data_results_h_layout_options_callback */

function ndf_data_results_table_header_background_color_callback($args) {
	$ndf_data_results_table_header_background_color = get_option( 'ndf_data_results_table_header_background_color', '#204095' );

	$html = '<input type="text" id="ndf_data_results_table_header_background_color" name="ndf_data_results_table_header_background_color" value="'.esc_attr__( $ndf_data_results_table_header_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_data_results_table_header_background_color_callback */

function ndf_data_results_category_font_size_callback($args) {
	$ndf_data_results_category_font_size = get_option( 'ndf_data_results_category_font_size', '16px' );

	$html = "<select name='ndf_data_results_category_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_data_results_category_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_data_results_category_font_size_callback */

function ndf_data_results_category_lineheight_callback($args) {
	$ndf_data_results_category_lineheight = get_option( 'ndf_data_results_category_lineheight', '1.2' );

	$html = "<select name='ndf_data_results_category_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_data_results_category_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_data_results_category_lineheight_callback */

function ndf_data_results_category_fontcolor_callback($args) {
	$ndf_data_results_category_fontcolor = get_option( 'ndf_data_results_category_fontcolor', '#ffffff' );

	$html = '<input type="text" id="ndf_data_results_category_fontcolor" name="ndf_data_results_category_fontcolor" value="'.esc_attr__( $ndf_data_results_category_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_data_results_category_fontcolor_callback */

function ndf_data_results_table_title_cell_background_color_callback($args) {
	$ndf_data_results_table_title_cell_background_color = get_option( 'ndf_data_results_table_title_cell_background_color', '#ffffff' );

	$html = '<input type="text" id="ndf_data_results_table_title_cell_background_color" name="ndf_data_results_table_title_cell_background_color" value="'.esc_attr__( $ndf_data_results_table_title_cell_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_data_results_table_background_color_callback */

function ndf_data_results_table_title_cell_font_color_callback($args) {
	$ndf_data_results_table_title_cell_font_color = get_option( 'ndf_data_results_table_title_cell_font_color', '#4c4c4c' );

	$html = '<input type="text" id="ndf_data_results_table_title_cell_font_color" name="ndf_data_results_table_title_cell_font_color" value="'.esc_attr__( $ndf_data_results_table_title_cell_font_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_data_results_table_title_cell_font_color_callback */

function ndf_data_results_table_background_color_callback($args) {
	$ndf_data_results_table_background_color = get_option( 'ndf_data_results_table_background_color', '#009de0' );

	$html = '<input type="text" id="ndf_data_results_table_background_color" name="ndf_data_results_table_background_color" value="'.esc_attr__( $ndf_data_results_table_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_data_results_table_background_color_callback */

function ndf_data_results_table_font_size_callback($args) {
	$ndf_data_results_table_font_size = get_option( 'ndf_data_results_table_font_size', '14px' );

	$html = "<select name='ndf_data_results_table_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_data_results_table_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_data_results_table_font_size_callback */

function ndf_data_results_table_lineheight_callback($args) {
	$ndf_data_results_table_lineheight = get_option( 'ndf_data_results_table_lineheight', '1.2' );

	$html = "<select name='ndf_data_results_table_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_data_results_table_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_data_results_table_lineheight_callback */

function ndf_data_results_table_font_color_callback($args) {
	$ndf_data_results_table_font_color = get_option( 'ndf_data_results_table_font_color', '#ffffff' );

	$html = '<input type="text" id="ndf_data_results_table_font_color" name="ndf_data_results_table_font_color" value="'.esc_attr__( $ndf_data_results_table_font_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_data_results_table_font_color_callback */

function ndf_data_results_table_border_color_callback($args) {
	$ndf_data_results_table_border_color = get_option( 'ndf_data_results_table_border_color', '#d6d6d6' );

	$html = '<input type="text" id="ndf_data_results_table_border_color" name="ndf_data_results_table_border_color" value="'.esc_attr__( $ndf_data_results_table_border_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_data_results_table_border_color_callback */

// function ndf_data_results_table_border_width_callback($args) {
	// $ndf_data_results_table_border_width = get_option( 'ndf_data_results_table_border_width', 1 );

	// $html = '<input type="number" min="0" class="small-text" id="ndf_data_results_table_border_width" name="ndf_data_results_table_border_width" value="'.$ndf_data_results_table_border_width.'" /> px';
	// echo $html;
// } /* end ndf_data_results_table_border_width_callback */

function ndf_data_results_table_border_radius_callback($args) {
	$ndf_data_results_table_border_radius = get_option( 'ndf_data_results_table_border_radius', 10 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_data_results_table_border_radius" name="ndf_data_results_table_border_radius" value="'.esc_attr__( $ndf_data_results_table_border_radius ).'" /> px';
	echo $html;
} /* end ndf_data_results_table_border_radius_callback */
