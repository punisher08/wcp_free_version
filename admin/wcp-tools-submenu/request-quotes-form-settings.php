<?php
/**
 * Request Quotes Form Settings
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.7.3.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'request_quotes_form_register_settings');
function request_quotes_form_register_settings() {
	add_settings_section(
		'request_quotes_form_settings_section',
		'Form Settings',
		'request_quotes_form_settings_callback',
		'request_quotes_form_settings_option'
	);
	add_settings_field( 
		'show_request_quotes_form',
		'Show Shortcode',
		'show_request_quotes_form_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_formbackground_color',
		'Form Background Color',
		'request_quotes_formbackground_color_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_form_text_color',
		'Text Color',
		'request_quotes_form_text_color_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'email_request_quotes_form_title_button',
		'Button title for [wcpquote type="popup"]',
		'email_request_quotes_form_title_button_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'email_request_quotes_popup_align',
		'Popup button Align',
		'email_request_quotes_popup_align_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section',
		array(
			'Left' => 'left',
			'Center' => 'center',
			'Right' => 'right',
		)
	);
	add_settings_field( 
		'single_email_request_quotes_form_title_button',
		'Button title on each wcp data',
		'single_email_request_quotes_form_title_button_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_form_title',
		'Form Title',
		'request_quotes_form_title_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_form_title_position',
		'Form Title Align',
		'request_quotes_form_title_position_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section',
		array(
			'Left' => 'left',
			'Center' => 'center',
			'Right' => 'right'
		)
	);
	add_settings_field( 
		'request_quotes_form_title_font_size',
		'Title Font Size',
		'request_quotes_form_title_font_size_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_form_title_line_height',
		'Title line height',
		'request_quotes_form_title_line_height_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field(
		'request_quotes_form_font_weight',
		'Title Font Weight',
		'request_quotes_form_font_weight_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section',
		array(
			'100' => '100',
			'200' => '200',
			'300' => '300',
			'400' => '400',
			'500' => '500',
			'600' => '600',
			'700' => '700',
			'800' => '800',
			'900' => '900',
		)
	);

	add_settings_field( 
		'request_quotes_form_subtitle',
		'Form Subtitle',
		'request_quotes_form_subtitle_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field( 
		'request_quotes_form_content_position',
		'Button Align',
		'request_quotes_form_content_position_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section',
		array(
			'Left' => 'left',
			'Center' => 'center',
			'Right' => 'right'
		)
	);
	add_settings_field( 
		'request_quotes_form_input_width',
		'Input field width',
		'request_quotes_form_input_width_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);

	add_settings_field(
		'request_quotes_form_submit_button_text',
		'Form Submit button text',
		'request_quotes_form_submit_button_text_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	
	add_settings_field(
		'request_quotes_form_submit_button_color',
		'Button Color',
		'request_quotes_form_submit_button_color_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field(
		'request_quotes_form_submit_button_width',
		'Button Width',
		'request_quotes_form_submit_button_width_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	/**
	 * Added styleing options for buttons
	 */
	add_settings_field(
		'request_quotes_form_single_popup_padding',
		'Popup Button padding',
		'request_quotes_form_single_popup_padding_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field(
		'request_quotes_form_single_popup_line_height',
		'Popup Button line height',
		'request_quotes_form_single_popup_line_height_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field(
		'request_quotes_form_single_popup_font_size',
		'Popup Button Font Size',
		'request_quotes_form_single_popup_font_size_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	add_settings_field(
		'request_quotes_form_single_popup_font_weight',
		'Popup Button Font Weight',
		'request_quotes_form_single_popup_font_weight_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section',
		array(
			'100' => '100',
			'200' => '200',
			'300' => '300',
			'400' => '400',
			'500' => '500',
			'600' => '600',
			'700' => '700',
			'800' => '800',
			'900' => '900',
		)
	);
	add_settings_field(
		'request_quotes_form_font_size',
		'Popup form font size',
		'request_quotes_form_font_size_callback',
		'request_quotes_form_settings_option',
		'request_quotes_form_settings_section'
	);
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_single_popup_padding' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_single_popup_line_height' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_single_popup_font_size' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_single_popup_font_weight' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_font_size' );
	 /**
	  * EO button stylings
	  */
		
	register_setting( 'request_quotes_form_settings_option', 'show_request_quotes_form' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_title' );
	register_setting( 'request_quotes_form_settings_option', 'email_request_quotes_form_title_button' );
	register_setting( 'request_quotes_form_settings_option', 'email_request_quotes_popup_align' );
	register_setting( 'request_quotes_form_settings_option', 'single_email_request_quotes_form_title_button' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_title_position' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_title_font_size' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_title_line_height' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_font_weight' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_text_color' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_subtitle' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_content_position' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_formbackground_color' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_input_width' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_submit_button_text' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_submit_button_color' );
	register_setting( 'request_quotes_form_settings_option', 'request_quotes_form_submit_button_width' );
} 
/**
 *  Added styleing options for buttons
 */
function request_quotes_form_single_popup_padding_callback(){
	$request_quotes_form_single_popup_padding =  get_option( 'request_quotes_form_single_popup_padding','0' );
	$html = '<input type="text" id="request_quotes_form_single_popup_padding" name="request_quotes_form_single_popup_padding" value="'.$request_quotes_form_single_popup_padding.'" />'; 
	echo $html;
}
function request_quotes_form_single_popup_line_height_callback(){
	$request_quotes_form_single_popup_line_height =  get_option( 'request_quotes_form_single_popup_line_height','0' );
	$html = '<input type="text" id="request_quotes_form_single_popup_line_height" name="request_quotes_form_single_popup_line_height" value="'.$request_quotes_form_single_popup_line_height.'" />'; 
	echo $html;
}
function request_quotes_form_single_popup_font_size_callback(){
	$request_quotes_form_single_popup_font_size =  get_option( 'request_quotes_form_single_popup_font_size','inherit' );
	$html = '<input type="text" id="request_quotes_form_single_popup_font_size" name="request_quotes_form_single_popup_font_size" value="'.$request_quotes_form_single_popup_font_size.'" />'; 
	echo $html;
}
function request_quotes_form_single_popup_font_weight_callback($args){
	$request_quotes_form_single_popup_font_weight = get_option( 'request_quotes_form_single_popup_font_weight', 'inherit' );
	$html = "<select name='request_quotes_form_single_popup_font_weight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $request_quotes_form_single_popup_font_weight, $option_key, false ).">".$option_key."</option>";
	}
	$html .= "</select>";
	echo $html;
}
function request_quotes_form_font_size_callback(){
	$request_quotes_form_font_size =  get_option( 'request_quotes_form_font_size','14px' );
	$html = '<input type="text" id="request_quotes_form_font_size" name="request_quotes_form_font_size" value="'.$request_quotes_form_font_size.'" />'; 
	echo $html;
}

/**
 * Register Request Quotes Setting Callbacks
 *
 * @param  mixed $args
 * @return void
 */
function request_quotes_form_settings_callback($args) {
    echo '<p></p>';
} 
function show_request_quotes_form_callback($args) {
	$show_request_quotes_form = get_option( 'show_request_quotes_form', 0 );
	$html = '<input type="checkbox" id="show_request_quotes_form" name="show_request_quotes_form" value="1" ' . checked( 1, $show_request_quotes_form, false ) . '/>'; 
	echo $html;
	?>
<div id="show-shortcode" class="quotes_shortcode">
	<label for="male"> Use the shortcode below to show  Request Quotes Form</label><br><br>
	<input style="width:20%;" type="text" name="gender" disabled id="male" value="[wcpquote]">
	<input style="width:20%;" type="text" name="gender" disabled id="male" value="[wcpquote type='popup']">
</div>
<?php
} 
function request_quotes_form_title_callback($args){
	$request_quotes_form_title = get_option( 'request_quotes_form_title', 'Get Quotes' );
	$html = '<input style="width:50%" type="text" id="request_quotes_form_title" name="request_quotes_form_title" value="'.$request_quotes_form_title.'" />'; 
	echo $html;
}
function email_request_quotes_form_title_button_callback($args){
	$email_request_quotes_form_title_button = get_option( 'email_request_quotes_form_title_button', 'Get Quotes' );
	$html = '<input type="text" id="email_request_quotes_form_title_button" name="email_request_quotes_form_title_button" value="'.$email_request_quotes_form_title_button.'" />'; 
	echo $html;
}
//////////////////////////////////////
function email_request_quotes_popup_align_callback($args){
	$email_request_quotes_popup_align = get_option( 'email_request_quotes_popup_align', 'center' );
	$html = "<select name='email_request_quotes_popup_align' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $email_request_quotes_popup_align, $option_key, false ).">".$option_key."</option>";
	}
	$html .= "</select>";
	echo $html;
}
//////////////////////////////////////
function single_email_request_quotes_form_title_button_callback($args){
	$single_email_request_quotes_form_title_button = get_option( 'single_email_request_quotes_form_title_button', 'Request A Quotes' );
	$html = '<input type="text" id="single_email_request_quotes_form_title_button" name="single_email_request_quotes_form_title_button" value="'.$single_email_request_quotes_form_title_button.'" />'; 
	echo $html;
}
function request_quotes_form_title_position_callback($args){
	$request_quotes_form_title_position = get_option( 'request_quotes_form_title_position', 'center' );
	$html = "<select name='request_quotes_form_title_position' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $request_quotes_form_title_position, $option_key, false ).">".$option_key."</option>";
	}
	$html .= "</select>";
	echo $html;;
}
function request_quotes_form_title_font_size_callback($args){
	$request_quotes_form_title_font_size = get_option( 'request_quotes_form_title_font_size', '30px' );
	$html = '<input type="text" id="request_quotes_form_title_font_size" name="request_quotes_form_title_font_size" value="'.$request_quotes_form_title_font_size.'" />'; 
	echo $html;;
}
function request_quotes_form_title_line_height_callback($args){
	$request_quotes_form_title_line_height = get_option( 'request_quotes_form_title_line_height', '30px' );
	$html = '<input type="text" id="request_quotes_form_title_line_height" name="request_quotes_form_title_line_height" value="'.$request_quotes_form_title_line_height.'" />'; 
	echo $html;;
}
function request_quotes_form_font_weight_callback($args){
	$request_quotes_form_font_weight = get_option( 'request_quotes_form_font_weight', '400' );
	$html = "<select name='request_quotes_form_font_weight' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $request_quotes_form_font_weight, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;;
}
function request_quotes_form_text_color_callback($args){

	$request_quotes_form_text_color = get_option( 'request_quotes_form_text_color', '#000' );
	$html = '<input type="text" id="request_quotes_form_text_color" name="request_quotes_form_text_color" value="'.esc_attr__( $request_quotes_form_text_color ).'" class="ndf_colorpicker" />';
	echo $html;
}

function request_quotes_form_subtitle_callback($args){
	$request_quotes_form_subtitle = get_option( 'request_quotes_form_subtitle', 'Please provide some contact details' );
	$html = '<input  style="width:50%"  type="text" id="request_quotes_form_subtitle" name="request_quotes_form_subtitle" value="'.$request_quotes_form_subtitle.'" />'; 
	echo $html;
}

function request_quotes_form_content_position_callback($args){
	$request_quotes_form_content_position = get_option( 'request_quotes_form_content_position', 'center' );
	$html = "<select name='request_quotes_form_content_position' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $request_quotes_form_content_position, $option_key, false ).">".$option_key."</option>";
	}
	$html .= "</select>";
	echo $html;;
}
function request_quotes_form_input_width_callback($args){
	$request_quotes_form_input_width = get_option( 'request_quotes_form_input_width', '80%' );
	$html = '<input type="text" id="request_quotes_form_input_width" name="request_quotes_form_input_width" value="'.$request_quotes_form_input_width.'" />'; 
	echo $html;
}
function request_quotes_formbackground_color_callback($args){
	$request_quotes_formbackground_color = get_option( 'request_quotes_formbackground_color', '#fff' );
	$html = '<input type="text" id="request_quotes_formbackground_color" name="request_quotes_formbackground_color" value="'.esc_attr__( $request_quotes_formbackground_color ).'" class="ndf_colorpicker" />';
	echo $html;
}

function request_quotes_form_submit_button_text_callback($args){
	$request_quotes_form_submit_button_text = get_option( 'request_quotes_form_submit_button_text', 'Submit' );
	$html = '<input  type="text" id="request_quotes_form_submit_button_text" name="request_quotes_form_submit_button_text" value="'.$request_quotes_form_submit_button_text.'" />'; 
	echo $html;
}
function request_quotes_form_submit_button_color_callback($args){
	$request_quotes_form_submit_button_color = get_option( 'request_quotes_form_submit_button_color', '#0366d6' );
	$html = '<input  type="text" id="request_quotes_form_submit_button_color" name="request_quotes_form_submit_button_color" value="'.$request_quotes_form_submit_button_color.'"  class="ndf_colorpicker"/>'; 
	echo $html;
}
function request_quotes_form_submit_button_width_callback($args){
	$request_quotes_form_submit_button_width = get_option( 'request_quotes_form_submit_button_width', '80%' );
	$html = '<input  type="text" id="request_quotes_form_submit_button_width" name="request_quotes_form_submit_button_width" value="'.$request_quotes_form_submit_button_width.'" "/>'; 
	echo $html;
}


// Callback Function When success sending Form Email
function request_quotes_thank_you(){ ?>
	<script>
		alert('Thank you. We will get back to you as soon as posible!');
	</script>
<?php
}


