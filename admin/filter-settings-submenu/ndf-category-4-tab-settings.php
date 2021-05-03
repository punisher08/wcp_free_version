<?php
/**
 * Filters Section Category 4 Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/filter-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_category_4_filter_section_register_settings');
function ndf_category_4_filter_section_register_settings() {

	/* Register Filters Section Category 4 Settings Section */
	add_settings_section(
		'ndf_category_4_filter_settings_section',
		'Category 4 UI',
		'ndf_category_4_filter_settings_callback',
		'ndf_category_4_filter_settings_option'
	);

	/* Initialize Filters Section Category 4 Settings Section Fields */
	add_settings_field( 
		'ndf_category_4_filter_show',
		'Show Category 4 Filters',
		'ndf_category_4_filter_show_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section'
	);

	add_settings_field( 
		'ndf_category_4_filter_icon',
		'Icon',
		'ndf_category_4_filter_icon_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section',
		array(
			'<em>Icon before the Category Title. Ideal Image size 90x90.</em>'
		)
	);
	
	add_settings_field( 
		'ndf_category_4_filter_label',
		'Filter Category Name',
		'ndf_category_4_filter_label_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section'
	);
	
	add_settings_field( 
		'ndf_category_4_results_label',
		'Results Category Name',
		'ndf_category_4_results_label_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section'
	);

	add_settings_field(
		'ndf_category_4_filter_accent_color',
		'Accent Color',
		'ndf_category_4_filter_accent_color_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section'
	);

	add_settings_field( 
		'ndf_category_4_filter_override',
		'Override Table UI Settings?',
		'ndf_category_4_filter_override_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section',
		array(
			'<em>Use the UI setting below for the filter block?</em>'
		)
	);

	add_settings_field(
		'ndf_category_4_filter_label_font_size',
		'Category Title Font Size',
		'ndf_category_4_filter_label_font_size_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section',
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
		'ndf_category_4_filter_label_fontcolor',
		'Title Font Color',
		'ndf_category_4_filter_label_fontcolor_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section'
	);

	add_settings_field(
		'ndf_category_4_filter_font_size',
		'Font Size',
		'ndf_category_4_filter_font_size_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section',
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
		'ndf_category_4_filter_font_color',
		'Font Color',
		'ndf_category_4_filter_font_color_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section'
	);

	add_settings_field( 
		'ndf_category_4_filter_background_color',
		'Background Color',
		'ndf_category_4_filter_background_color_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section'
	);

	add_settings_field( 
		'ndf_category_4_filter_options_display',
		'Options Display',
		'ndf_category_4_filter_options_display_callback',
		'ndf_category_4_filter_settings_option',
		'ndf_category_4_filter_settings_section'
	);

	/* Register Filters Section Category 4 Settings Section Fields */
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_show' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_icon' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_accent_color' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_label' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_results_label' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_override' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_label_font_size' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_label_fontcolor' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_font_size' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_font_color' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_background_color' );
	register_setting( 'ndf_category_4_filter_settings_option', 'ndf_category_4_filter_options_display' );

} /* end ndf_category_4_filter_section_register_settings */

/**
* Section Callbacks
*/
function ndf_category_4_filter_settings_callback() {
	echo '<p></p>';
} /* end ndf_category_4_filter_settings_callback */

/**
* Field Callbacks
*/
function ndf_category_4_filter_show_callback($args) {
	$ndf_category_4_filter_show = get_option( 'ndf_category_4_filter_show', 1 );

	$html = '<input type="checkbox" id="ndf_category_4_filter_show" name="ndf_category_4_filter_show" value="1" ' . checked( 1, $ndf_category_4_filter_show, false ) . '/>'; 
	echo $html;
} /* end ndf_category_4_filter_show_callback */

function ndf_category_4_filter_icon_callback($args) {
	$ndf_category_4_filter_icon = get_option( 'ndf_category_4_filter_icon' );

	$html = '<input id="ndf_category_4_filter_icon" name="ndf_category_4_filter_icon" type="hidden" value="'.esc_attr__( $ndf_category_4_filter_icon ).'" />';
	$html .= '<input id="ndf_category_4_filter_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_4_filter_icon_button" type="button" value="Select Image" />';
	$html .= '<p><span class="ndf_category_4_filter_icon_new description"></span></p>';
	if( $ndf_category_4_filter_icon ){
		$html .= "<p id='ndf_category_4_filter_icon_wrap'><img src='".$ndf_category_4_filter_icon."' id='ndf_category_4_filter_icon_image' alt='ndf_category_4_filter_icon' class='ndf_settings_image'>";
		$html .= "<button type='button' id='ndf_category_4_filter_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
	}
	$html .= '<label><small>' . $args[0] . '</small></label>'; 
	echo $html;
} /* end ndf_category_4_filter_icon_callback */

function ndf_category_4_filter_accent_color_callback($args) {
	$ndf_category_4_filter_accent_color = get_option( 'ndf_category_4_filter_accent_color', '#ef8923' );

	$html = '<input type="text" id="ndf_category_4_filter_accent_color" name="ndf_category_4_filter_accent_color" value="'.esc_attr__( $ndf_category_4_filter_accent_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_category_4_filter_accent_color_callback */

function ndf_category_4_filter_label_callback($args) {
	$ndf_category_4_filter_label = get_option( 'ndf_category_4_filter_label', 'Category 4' );

	$html = '<input type="text" id="ndf_category_4_filter_label" name="ndf_category_4_filter_label" value="'.esc_attr__( $ndf_category_4_filter_label ).'" class="regular-text" />';
	echo $html;
} /* end ndf_category_4_filter_label_callback */

function ndf_category_4_results_label_callback($args) {
	$ndf_category_4_filter_label = get_option( 'ndf_category_4_filter_label', 'Category 4' );
	$ndf_category_4_results_label = get_option( 'ndf_category_4_results_label', $ndf_category_4_filter_label );
	$ndf_category_4_results_label = (empty($ndf_category_4_results_label)) ? $ndf_category_4_filter_label : $ndf_category_4_results_label;

	$html = '<input type="text" id="ndf_category_4_results_label" name="ndf_category_4_results_label" value="'.esc_attr__( $ndf_category_4_results_label ).'" class="regular-text" />';
	echo $html;
} /* end ndf_category_4_results_label_callback */

function ndf_category_4_filter_override_callback($args) {
	$ndf_category_4_filter_override = get_option( 'ndf_category_4_filter_override', 0 );

	$html = '<input type="checkbox" id="ndf_category_4_filter_override" name="ndf_category_4_filter_override" value="1" ' . checked( 1, $ndf_category_4_filter_override, false ) . '/>'; 
	$html .= '<label for="ndf_category_4_filter_override"> ' . $args[0] . '</label>';
	echo $html;
} /* end ndf_category_4_filter_override_callback */

function ndf_category_4_filter_label_font_size_callback($args) {
	$ndf_category_4_filter_label_font_size = get_option( 'ndf_category_4_filter_label_font_size', '14px' );

	$html = "<select name='ndf_category_4_filter_label_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_category_4_filter_label_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_category_4_filter_label_font_size_callback */

function ndf_category_4_filter_label_fontcolor_callback($args) {
	$ndf_category_4_filter_label_fontcolor = get_option( 'ndf_category_4_filter_label_fontcolor', '#ffffff' );

	$html = '<input type="text" id="ndf_category_4_filter_label_fontcolor" name="ndf_category_4_filter_label_fontcolor" value="'.esc_attr__( $ndf_category_4_filter_label_fontcolor ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_category_4_filter_label_fontcolor_callback */

function ndf_category_4_filter_font_size_callback($args) {
	$ndf_category_4_filter_font_size = get_option( 'ndf_category_4_filter_font_size', '14px' );

	$html = "<select name='ndf_category_4_filter_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_category_4_filter_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_category_4_filter_font_size_callback */

function ndf_category_4_filter_font_color_callback($args) {
	$ndf_category_4_filter_font_color = get_option( 'ndf_category_4_filter_font_color', '#000000' );

	$html = '<input type="text" id="ndf_category_4_filter_font_color" name="ndf_category_4_filter_font_color" value="'.esc_attr__( $ndf_category_4_filter_font_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_category_4_filter_font_color_callback */

function ndf_category_4_filter_background_color_callback($args) {
	$ndf_category_4_filter_background_color = get_option( 'ndf_category_4_filter_background_color', '#ffffff' );

	$html = '<input type="text" id="ndf_category_4_filter_background_color" name="ndf_category_4_filter_background_color" value="'.esc_attr__( $ndf_category_4_filter_background_color ).'" class="ndf_colorpicker" />';
	echo $html;
} /* end ndf_category_4_filter_background_color_callback */

function ndf_category_4_filter_options_display_callback($args) {
	$ndf_category_4_filter_options_display = get_option( 'ndf_category_4_filter_options_display', 'show-all' );

	$html = "<select name='ndf_category_4_filter_options_display' class='ndf_dropdown'>";
		$html .= "<option value='show-all' ".selected( $ndf_category_4_filter_options_display, 'show-all', false ).">Show All</option>";
		$html .= "<option value='with-values' ".selected( $ndf_category_4_filter_options_display, 'with-values', false ).">Show Only With Data Counts</option>";
	$html .= "</select>";
	echo $html;
} /* end ndf_category_4_filter_options_display_callback */