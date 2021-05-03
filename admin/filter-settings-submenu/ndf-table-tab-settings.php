<?php
/**
 * Filters Section Table Properties Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/filter-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_filters_table_section_register_settings');
function ndf_filters_table_section_register_settings() {

	/* Register Filters Section Table Settings Section */
	add_settings_section(
		'ndf_filters_table_settings_section',
		'Table Settings',
		'ndf_filters_table_settings_callback',
		'ndf_filters_table_settings_option'
	);

	/* Initialize Filters Section Table Settings Section Fields */
	add_settings_field( 
		'ndf_filters_table_background_color',
		'Background Color',
		'ndf_filters_table_background_color_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section'
	);
	
	add_settings_field(
		'ndf_filters_table_category_title_font_size',
		'Category Title Font Size',
		'ndf_filters_table_category_title_font_size_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section',
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
		'ndf_filters_table_category_title_lineheight',
		'Category Title Line Height',
		'ndf_filters_table_category_title_lineheight_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section',
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
		'ndf_filters_table_category_title_fontcolor',
		'Category Title Color',
		'ndf_filters_table_category_title_fontcolor_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section'
	);
	
	add_settings_field(
		'ndf_filters_table_font_size',
		'Font Size',
		'ndf_filters_table_font_size_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section',
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
		'ndf_filters_table_lineheight',
		'Filter Options Line Height',
		'ndf_filters_table_lineheight_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section',
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
		'ndf_filters_table_font_color',
		'Font Color',
		'ndf_filters_table_font_color_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section'
	);

	add_settings_field( 
		'ndf_filters_table_border_color',
		'Border Color',
		'ndf_filters_table_border_color_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section'
	);

	add_settings_field( 
		'ndf_filters_table_border_width',
		'Border Size',
		'ndf_filters_table_border_width_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section'
	);

	add_settings_field( 
		'ndf_filters_table_border_radius',
		'Border Radius',
		'ndf_filters_table_border_radius_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section'
	);

	add_settings_field( 
		'ndf_filters_table_options_limit',
		'Filter Options Limit',
		'ndf_filters_table_options_limit_callback',
		'ndf_filters_table_settings_option',
		'ndf_filters_table_settings_section'
	);

	/* Register Table Settings Section Fields */
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_background_color' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_category_title_font_size' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_category_title_lineheight' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_category_title_fontcolor' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_font_size' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_lineheight' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_font_color' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_border_color' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_border_radius', 'intval' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_border_width', 'intval' );
	register_setting( 'ndf_filters_table_settings_option', 'ndf_filters_table_options_limit', 'intval' );

} /* end ndf_filters_table_section_register_settings */

/**
 * Section Callbacks
 */
function ndf_filters_table_settings_callback() {
    echo '<p>Filters Table UI Settings</p>';
} /* end ndf_filters_table_settings_callback */

/**
 * Field Callbacks
 */
function ndf_filters_table_background_color_callback($args) {
	$ndf_filters_table_background_color = get_option( 'ndf_filters_table_background_color', '#009ce0' );

	$html = '<input type="text" id="ndf_filters_table_background_color" name="ndf_filters_table_background_color" value="'.esc_attr__( $ndf_filters_table_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_filters_table_background_color_callback */

function ndf_filters_table_category_title_font_size_callback($args) {
	$ndf_filters_table_category_title_font_size = get_option( 'ndf_filters_table_category_title_font_size', '18px' );

	$html = "<select name='ndf_filters_table_category_title_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_filters_table_category_title_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_filters_table_category_title_font_size_callback */

function ndf_filters_table_category_title_lineheight_callback($args) {
	$ndf_filters_table_category_title_lineheight = get_option( 'ndf_filters_table_category_title_lineheight', '1.2' );

	$html = "<select name='ndf_filters_table_category_title_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_filters_table_category_title_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_filters_table_category_title_lineheight_callback */

function ndf_filters_table_category_title_fontcolor_callback($args) {
	$ndf_filters_table_category_title_fontcolor = get_option( 'ndf_filters_table_category_title_fontcolor', '#ffffff' );

	$html = '<input type="text" id="ndf_filters_table_category_title_fontcolor" name="ndf_filters_table_category_title_fontcolor" value="'.esc_attr__( $ndf_filters_table_category_title_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_filters_table_category_title_fontcolor_callback */

function ndf_filters_table_font_size_callback($args) {
	$ndf_filters_table_font_size = get_option( 'ndf_filters_table_font_size', '14px' );

	$html = "<select name='ndf_filters_table_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_filters_table_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_filters_table_font_size_callback */

function ndf_filters_table_lineheight_callback($args) {
	$ndf_filters_table_lineheight = get_option( 'ndf_filters_table_lineheight', '1.2' );

	$html = "<select name='ndf_filters_table_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_filters_table_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_filters_table_lineheight_callback */

function ndf_filters_table_font_color_callback($args) {
	$ndf_filters_table_font_color = get_option( 'ndf_filters_table_font_color', '#ffffff' );

	$html = '<input type="text" id="ndf_filters_table_font_color" name="ndf_filters_table_font_color" value="'.esc_attr__( $ndf_filters_table_font_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_filters_table_font_color_callback */

function ndf_filters_table_border_color_callback($args) {
	$ndf_filters_table_border_color = get_option( 'ndf_filters_table_border_color', '#ffffff' );

	$html = '<input type="text" id="ndf_filters_table_border_color" name="ndf_filters_table_border_color" value="'.esc_attr__( $ndf_filters_table_border_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_filters_table_border_color_callback */

function ndf_filters_table_border_width_callback($args) {
	$ndf_filters_table_border_width = get_option( 'ndf_filters_table_border_width', 1 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_filters_table_border_width" name="ndf_filters_table_border_width" value="'.esc_attr__( $ndf_filters_table_border_width ).'" /> px';
	echo $html;
} /* end ndf_filters_table_border_width_callback */

function ndf_filters_table_border_radius_callback($args) {
	$ndf_filters_table_border_radius = get_option( 'ndf_filters_table_border_radius', 10 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_filters_table_border_radius" name="ndf_filters_table_border_radius" value="'.esc_attr__( $ndf_filters_table_border_radius ).'" /> px';
	echo $html;
} /* end ndf_filters_table_border_radius_callback */

function ndf_filters_table_options_limit_callback($args) {
	$ndf_filters_table_options_limit = get_option( 'ndf_filters_table_options_limit', 0 );

	$html = '<input type="number" min="0" class="small-text" id="ndf_filters_table_options_limit" name="ndf_filters_table_options_limit" value="'.esc_attr__( $ndf_filters_table_options_limit ).'" /><br><label><small><em>Set 0 for no limit.</em></small></label>';
	echo $html;
} /* end ndf_filters_table_options_limit_callback */