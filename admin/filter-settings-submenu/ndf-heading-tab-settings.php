<?php
/**
 * Filters Section Heading Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/filter-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_filters_heading_section_register_settings');
function ndf_filters_heading_section_register_settings() {

	/* Register Filters Section Heading Settings Section */
	add_settings_section(
		'ndf_filters_heading_settings_section',
		'Heading',
		'ndf_filters_heading_settings_callback',
		'ndf_filters_heading_settings_option'
	);

	/* Initialize Filters Section Heading Settings Section Fields */
	add_settings_field( 
		'ndf_filters_heading_show',
		'Show Heading',
		'ndf_filters_heading_show_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section',
		array(
			'Display filter heading?'
		)
	);

	add_settings_field( 
		'ndf_filters_heading_icon',
		'Heading Icon',
		'ndf_filters_heading_icon_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section',
		array(
			'<em>Icon before the heading title. Ideal Image size 45x45.</em>'
		)
	);

	add_settings_field( 
		'ndf_filters_heading_label',
		'Heading Title',
		'ndf_filters_heading_label_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section'
	);

	add_settings_field(
		'ndf_filters_heading_style',
		'Heading Title Style',
		'ndf_filters_heading_style_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section',
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
		'ndf_filters_heading_lineheight',
		'Heading Title Line Height',
		'ndf_filters_heading_lineheight_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section',
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
		'ndf_filters_heading_label_fontcolor',
		'Heading Title Font Color',
		'ndf_filters_heading_label_fontcolor_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section'
	);

	add_settings_field(
		'ndf_filters_heading_description',
		'Supporting Text',
		'ndf_filters_heading_description_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section'
	);
	
	add_settings_field(
		'ndf_filters_heading_description_font_size',
		'Supporting Text Font Size',
		'ndf_filters_heading_description_font_size_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section',
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
		'ndf_filters_heading_description_lineheight',
		'Supporting Text Line Height',
		'ndf_filters_heading_description_lineheight_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section',
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
		'ndf_filters_heading_description_font_color',
		'Supporting Title Font Color',
		'ndf_filters_heading_description_font_color_callback',
		'ndf_filters_heading_settings_option',
		'ndf_filters_heading_settings_section'
	);

	/* Register Heading Settings Section Fields */
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_show' );
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_icon');
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_label' );
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_style' );
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_lineheight' );
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_label_fontcolor' );
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_description' );
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_description_font_size' );
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_description_lineheight' );
	register_setting( 'ndf_filters_heading_settings_option', 'ndf_filters_heading_description_font_color' );

} /* end ndf_filters_heading_section_register_settings */

/**
 * Section Callbacks
 */
function ndf_filters_heading_settings_callback() {
    echo '<p>Add heading content before filter section.</p>';
} /* end ndf_filters_heading_settings_callback */

/**
 * Field Callbacks
 */
function ndf_filters_heading_show_callback($args) {
	$ndf_filters_heading_show = get_option( 'ndf_filters_heading_show', 1 );

    $html = '<input type="checkbox" id="ndf_filters_heading_show" name="ndf_filters_heading_show" value="1" ' . checked( 1, $ndf_filters_heading_show, false ) . '/>'; 
    $html .= '<label for="ndf_filters_heading_show"> ' . $args[0] . '</label>'; 
    echo $html;
     
} /* end ndf_filters_heading_show_callback */
 
function ndf_filters_heading_label_callback($args) {
	$ndf_filters_heading_label = get_option( 'ndf_filters_heading_label', 'Filters' );

	$html = '<input type="text" id="ndf_filters_heading_label" name="ndf_filters_heading_label" value="'.esc_attr__( $ndf_filters_heading_label ).'" class="regular-text" />';
	echo $html;
} /* end ndf_filters_heading_label_callback */
 
function ndf_filters_heading_icon_callback($args) {
	$ndf_filters_heading_icon = get_option( 'ndf_filters_heading_icon' );

	$html = '<input id="ndf_filters_heading_icon" name="ndf_filters_heading_icon" type="hidden" value="'.esc_attr__( $ndf_filters_heading_icon ).'" />';
	$html .= '<input id="ndf_filters_heading_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_filters_heading_icon_button" type="button" value="Select Image" />';
	$html .= '<p><span class="ndf_filters_heading_icon_new description"></span></p>';
	if( $ndf_filters_heading_icon ){
		$html .= "<p id='ndf_filters_heading_icon_wrap'><img src='".$ndf_filters_heading_icon."' id='ndf_filters_heading_icon_image' alt='ndf_filters_heading_icon' class='ndf_settings_image'>";
		$html .= "<button type='button' id='ndf_filters_heading_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
	}
	$html .= '<label><small>' . $args[0] . '</small></label>';
	echo $html;
} /* end ndf_filters_heading_icon_callback */

function ndf_filters_heading_label_fontcolor_callback($args) {
	$ndf_filters_heading_label_fontcolor = get_option( 'ndf_filters_heading_label_fontcolor', '#0c4b84' );

    $html = '<input type="text" id="ndf_filters_heading_label_fontcolor" name="ndf_filters_heading_label_fontcolor" value="'.esc_attr__( $ndf_filters_heading_label_fontcolor ).'" class="ndf_colorpicker" />';
    echo $html;
} /* end ndf_filters_heading_label_fontcolor_callback */

function ndf_filters_heading_description_callback($args) {
	$ndf_filters_heading_description = get_option( 'ndf_filters_heading_description' );

	$html = wp_editor( 
		$ndf_filters_heading_description,
		'ndf_filters_heading_description',
		array(
			'wpautop'			=> false,
			'media_buttons'		=> true,
			'textarea_name'		=>	'ndf_filters_heading_description',
			'textarea_rows'		=>	7,
		)  
	);
	echo $html;
} /* end ndf_filters_heading_description_callback */

function ndf_filters_heading_style_callback($args) {
	$ndf_filters_heading_style = get_option( 'ndf_filters_heading_style', 'h2' );

	$html = "<select name='ndf_filters_heading_style' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_filters_heading_style, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_filters_heading_style_callback */

function ndf_filters_heading_lineheight_callback($args) {
	$ndf_filters_heading_lineheight = get_option( 'ndf_filters_heading_lineheight', '1.2' );

	$html = "<select name='ndf_filters_heading_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_filters_heading_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_filters_heading_lineheight_callback */

function ndf_filters_heading_description_font_size_callback($args) {
	$ndf_filters_heading_description_font_size = get_option( 'ndf_filters_heading_description_font_size', '16px' );

	$html = "<select name='ndf_filters_heading_description_font_size' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_filters_heading_description_font_size, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_filters_heading_description_font_size_callback */

function ndf_filters_heading_description_lineheight_callback($args) {
	$ndf_filters_heading_description_lineheight = get_option( 'ndf_filters_heading_description_lineheight', '1.2' );

	$html = "<select name='ndf_filters_heading_description_lineheight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_filters_heading_description_lineheight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_filters_heading_description_lineheight_callback */

function ndf_filters_heading_description_font_color_callback($args) {
	$ndf_filters_heading_description_font_color = get_option( 'ndf_filters_heading_description_font_color', '#0c0c0c' );

    $html = '<input type="text" id="ndf_filters_heading_description_font_color" name="ndf_filters_heading_description_font_color" value="'.esc_attr__( $ndf_filters_heading_description_font_color ).'" class="ndf_colorpicker" />';
    echo $html;
} /* end ndf_filters_heading_description_font_color_callback */