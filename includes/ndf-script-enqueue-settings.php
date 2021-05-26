<?php
/** 
 * Add settings into front-end filtering table elements
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

/* Data Filters Heading Style */
$ndf_filters_heading_label_fontcolor = get_option( 'ndf_filters_heading_label_fontcolor', '#0c4b84' );
$ndf_filters_heading_lineheight = get_option( 'ndf_filters_heading_lineheight', '1.2' );
$ndf_filters_heading_icon = get_option( 'ndf_filters_heading_icon' );
$ndf_filters_heading_description_font_size = get_option( 'ndf_filters_heading_description_font_size', '16px' );
$ndf_filters_heading_description_lineheight = get_option( 'ndf_filters_heading_description_lineheight', '1.2' );
$ndf_filters_heading_description_font_color = get_option( 'ndf_filters_heading_description_font_color', '#0c0c0c' );

/* Data Filters Style */
$ndf_filters_table_background_color = get_option( 'ndf_filters_table_background_color', '#009ce0' );
$ndf_filters_table_category_title_font_size = get_option( 'ndf_filters_table_category_title_font_size', '18px' );
$ndf_filters_table_category_title_lineheight = get_option( 'ndf_filters_table_category_title_lineheight', '1.2' );
$ndf_filters_table_category_title_fontcolor = get_option( 'ndf_filters_table_category_title_fontcolor', '#ffffff' );
$ndf_filters_table_font_size = get_option( 'ndf_filters_table_font_size', '14px' );
$ndf_filters_table_lineheight = get_option( 'ndf_filters_table_lineheight', '1.2' );
$ndf_filters_table_font_color = get_option( 'ndf_filters_table_font_color', '#ffffff' );
$ndf_filters_table_border_width = get_option( 'ndf_filters_table_border_width', 1 );
$ndf_filters_table_border_color = get_option( 'ndf_filters_table_border_color', '#ffffff' );
$ndf_filters_table_border_radius = get_option( 'ndf_filters_table_border_radius', 10 );

$ndf_category_1_filter_accent_color = get_option( 'ndf_category_1_filter_accent_color', '#183899' );
$ndf_category_2_filter_accent_color = get_option( 'ndf_category_2_filter_accent_color', '#3fc160' );
$ndf_category_3_filter_accent_color = get_option( 'ndf_category_3_filter_accent_color', '#d32121' );
$ndf_category_4_filter_accent_color = get_option( 'ndf_category_4_filter_accent_color', '#ef8923' );
$ndf_category_5_filter_accent_color = get_option( 'ndf_category_5_filter_accent_color', '#eeee22' );


/** 
 * Data Filters Override Styles. 
 */
/* Category 1 Styles */
$ndf_category_1_filter_override = get_option( 'ndf_category_1_filter_override', 0 );
$ndf_category_1_filter_label_font_size = get_option( 'ndf_category_1_filter_label_font_size', '14px' );
$ndf_category_1_filter_label_fontcolor = get_option( 'ndf_category_1_filter_label_fontcolor', '#ffffff' );
$ndf_category_1_filter_font_size = get_option( 'ndf_category_1_filter_font_size', '14px' );
$ndf_category_1_filter_font_color = get_option( 'ndf_category_1_filter_font_color', '#000000' );
$ndf_category_1_filter_background_color = get_option( 'ndf_category_1_filter_background_color', '#FFFFFF' );

/* Category 2 Styles */
$ndf_category_2_filter_override = get_option( 'ndf_category_2_filter_override', 0 );
$ndf_category_2_filter_label_font_size = get_option( 'ndf_category_2_filter_label_font_size', '14px' );
$ndf_category_2_filter_label_fontcolor = get_option( 'ndf_category_2_filter_label_fontcolor', '#ffffff' );
$ndf_category_2_filter_font_size = get_option( 'ndf_category_2_filter_font_size', '14px' );
$ndf_category_2_filter_font_color = get_option( 'ndf_category_2_filter_font_color', '#000000' );
$ndf_category_2_filter_background_color = get_option( 'ndf_category_2_filter_background_color', '#FFFFFF' );

/* Category 3 Styles */
$ndf_category_3_filter_override = get_option( 'ndf_category_3_filter_override', 0 );
$ndf_category_3_filter_label_font_size = get_option( 'ndf_category_3_filter_label_font_size', '14px' );
$ndf_category_3_filter_label_fontcolor = get_option( 'ndf_category_3_filter_label_fontcolor', '#ffffff' );
$ndf_category_3_filter_font_size = get_option( 'ndf_category_3_filter_font_size', '14px' );
$ndf_category_3_filter_font_color = get_option( 'ndf_category_3_filter_font_color', '#000000' );
$ndf_category_3_filter_background_color = get_option( 'ndf_category_3_filter_background_color', '#FFFFFF' );

/* Category 4 Styles */
$ndf_category_4_filter_override = get_option( 'ndf_category_4_filter_override', 0 );
$ndf_category_4_filter_label_font_size = get_option( 'ndf_category_4_filter_label_font_size', '14px' );
$ndf_category_4_filter_label_fontcolor = get_option( 'ndf_category_4_filter_label_fontcolor', '#ffffff' );
$ndf_category_4_filter_font_size = get_option( 'ndf_category_4_filter_font_size', '14px' );
$ndf_category_4_filter_font_color = get_option( 'ndf_category_4_filter_font_color', '#000000' );
$ndf_category_4_filter_background_color = get_option( 'ndf_category_4_filter_background_color', '#FFFFFF' );

/* Category 5 Styles */
$ndf_category_5_filter_override = get_option( 'ndf_category_5_filter_override', 0 );
$ndf_category_5_filter_label_font_size = get_option( 'ndf_category_5_filter_label_font_size', '14px' );
$ndf_category_5_filter_label_fontcolor = get_option( 'ndf_category_5_filter_label_fontcolor', '#ffffff' );
$ndf_category_5_filter_font_size = get_option( 'ndf_category_5_filter_font_size', '14px' );
$ndf_category_5_filter_font_color = get_option( 'ndf_category_5_filter_font_color', '#000000' );
$ndf_category_5_filter_background_color = get_option( 'ndf_category_5_filter_background_color', '#FFFFFF' );

/* Reset Link */
$ndf_reset_button_font_size = get_option( 'ndf_reset_button_font_size', '16px' );
$ndf_reset_button_lineheight = get_option( 'ndf_reset_button_lineheight', '1.2' );
$ndf_reset_button_fontcolor = get_option( 'ndf_reset_button_fontcolor', '#161616' );
$ndf_reset_button_hover_fontcolor = get_option( 'ndf_reset_button_hover_fontcolor', '#161616' );
$ndf_reset_button_background_color = get_option( 'ndf_reset_button_background_color', '#FFFFFF' );
$ndf_reset_button_hover_background_color = get_option( 'ndf_reset_button_hover_background_color', '#d3d3d3' );
$ndf_reset_button_border_color = get_option( 'ndf_reset_button_border_color', '#161616' );
$ndf_reset_button_border_width = get_option( 'ndf_reset_button_border_width', 1 );
$ndf_reset_button_border_radius = get_option( 'ndf_reset_button_border_radius', 0 );
$ndf_reset_button_padding_top = get_option( 'ndf_reset_button_padding_top', 5 );
$ndf_reset_button_padding_bottom = get_option( 'ndf_reset_button_padding_bottom', 5 );
$ndf_reset_button_padding_left = get_option( 'ndf_reset_button_padding_left', 15 );
$ndf_reset_button_padding_right = get_option( 'ndf_reset_button_padding_right', 15 );
$ndf_reset_button_margin_top = get_option( 'ndf_reset_button_margin_top', 10 );
$ndf_reset_button_margin_bottom = get_option( 'ndf_reset_button_margin_bottom', 10 );

/* Keyword Search */
$ndf_keyword_search_font_size = get_option( 'ndf_keyword_search_font_size', '16px' );
$ndf_keyword_search_lineheight = get_option( 'ndf_keyword_search_lineheight', '1.2' );
$ndf_keyword_search_fontcolor = get_option( 'ndf_keyword_search_fontcolor', '#FFFFFF' );
$ndf_keyword_search_hover_fontcolor = get_option( 'ndf_keyword_search_hover_fontcolor', '#161616' );
$ndf_keyword_search_background_color = get_option( 'ndf_keyword_search_background_color', '#161616' );
$ndf_keyword_search_hover_background_color = get_option( 'ndf_keyword_search_hover_background_color', '#d3d3d3' );
$ndf_keyword_search_border_radius = get_option( 'ndf_keyword_search_border_radius', 0 );
$ndf_keyword_search_padding_top = get_option( 'ndf_keyword_search_padding_top', 5 );
$ndf_keyword_search_padding_bottom = get_option( 'ndf_keyword_search_padding_bottom', 5 );
$ndf_keyword_search_padding_left = get_option( 'ndf_keyword_search_padding_left', 15 );
$ndf_keyword_search_padding_right = get_option( 'ndf_keyword_search_padding_right', 15 );
$ndf_keyword_search_margin_top = get_option( 'ndf_keyword_search_margin_top', 10 );
$ndf_keyword_search_margin_bottom = get_option( 'ndf_keyword_search_margin_bottom', 10 );

/* Data Results Table Heading Style */
$ndf_data_results_heading_label_fontcolor = get_option( 'ndf_data_results_heading_label_fontcolor', '#224B84' );
$ndf_data_results_heading_lineheight = get_option( 'ndf_data_results_heading_lineheight', '1.2' );
$ndf_data_results_heading_icon = get_option( 'ndf_data_results_heading_icon' );
$ndf_data_results_heading_description_font_size = get_option( 'ndf_data_results_heading_description_font_size', '14px' );
$ndf_data_results_heading_description_lineheight = get_option( 'ndf_data_results_heading_description_lineheight', '1.2' );
$ndf_data_results_heading_description_font_color = get_option( 'ndf_data_results_heading_description_font_color', '#000000' );

/* Data Results Table Style */
$ndf_data_results_table_title_cell_background_color = get_option( 'ndf_data_results_table_title_cell_background_color', '#ffffff' );
$ndf_data_results_table_title_cell_font_color = get_option( 'ndf_data_results_table_title_cell_font_color', '#4c4c4c' );
$ndf_data_results_category_font_size = get_option( 'ndf_data_results_category_font_size', '16px' );
$ndf_data_results_category_lineheight = get_option( 'ndf_data_results_category_lineheight', '1.2' );
$ndf_data_results_category_fontcolor = get_option( 'ndf_data_results_category_fontcolor', '#ffffff' );
$ndf_data_results_table_font_size = get_option( 'ndf_data_results_table_font_size', '14px' );
$ndf_data_results_table_lineheight = get_option( 'ndf_data_results_table_lineheight', '1.2' );
$ndf_data_results_table_font_color = get_option( 'ndf_data_results_table_font_color', '#ffffff' );
$ndf_data_results_table_border_width = get_option( 'ndf_data_results_table_border_width', 1 );
$ndf_data_results_table_border_color = get_option( 'ndf_data_results_table_border_color', '#d6d6d6' );
$ndf_data_results_table_border_radius = get_option( 'ndf_data_results_table_border_radius', 10 );
$ndf_data_results_table_background_color = get_option( 'ndf_data_results_table_background_color', '#009de0' );
$ndf_data_results_table_header_background_color = get_option( 'ndf_data_results_table_header_background_color', '#204095' );

/* More Info Style */
$ndf_more_info_button_font_size = get_option( 'ndf_more_info_button_font_size','14px' );
$ndf_more_info_button_lineheight = get_option( 'ndf_more_info_button_lineheight','1.2' );
$ndf_more_info_button_fontcolor = get_option( 'ndf_more_info_button_fontcolor','#ffffff' );
$ndf_more_info_button_hover_fontcolor = get_option( 'ndf_more_info_button_hover_fontcolor', '#ffffff' );
$ndf_more_info_button_background_color = get_option( 'ndf_more_info_button_background_color','#267ba5' );
$ndf_more_info_button_hover_background_color = get_option( 'ndf_more_info_button_hover_background_color', '#33ace0' );
$ndf_more_info_button_border_color = get_option( 'ndf_more_info_button_border_color', '#267ba5' );
$ndf_more_info_button_border_width = get_option( 'ndf_more_info_button_border_width', 1 );
$ndf_more_info_button_border_radius = get_option( 'ndf_more_info_button_border_radius', 3 );
$ndf_more_info_button_padding_top = get_option( 'ndf_more_info_button_padding_top', 5 );
$ndf_more_info_button_padding_bottom = get_option( 'ndf_more_info_button_padding_bottom', 5 );
$ndf_more_info_button_padding_left = get_option( 'ndf_more_info_button_padding_left', 15 );
$ndf_more_info_button_padding_right = get_option( 'ndf_more_info_button_padding_right', 15 );

/* Star Rating */
$ndf_star_rating_color = get_option( 'ndf_star_rating_color', '#f9f922' );
$ndf_star_rating_margin_top = get_option( 'ndf_star_rating_margin_top', 5 );
$ndf_star_rating_margin_bottom = get_option( 'ndf_star_rating_margin_bottom', 5 );

/* Load More Style */
$ndf_load_more_button_font_size = get_option( 'ndf_load_more_button_font_size','18px' );
$ndf_load_more_button_fontcolor = get_option( 'ndf_load_more_button_fontcolor','#161616' );
$ndf_load_more_button_background_color = get_option( 'ndf_load_more_button_background_color','#d3d3d3' );
$ndf_load_more_button_hover_background_color = get_option( 'ndf_load_more_button_hover_background_color','#C1C1C1' );
$ndf_load_more_button_border_color = get_option( 'ndf_load_more_button_border_color', '#161616' );
$ndf_load_more_button_border_width = get_option( 'ndf_load_more_button_border_width', 1 );
$ndf_load_more_button_border_radius = get_option( 'ndf_load_more_button_border_radius', 0 );
$ndf_load_more_button_padding_top = get_option( 'ndf_load_more_button_padding_top', 10 );
$ndf_load_more_button_padding_bottom = get_option( 'ndf_load_more_button_padding_bottom', 10 );
$ndf_load_more_button_padding_left = get_option( 'ndf_load_more_button_padding_left', 40 );
$ndf_load_more_button_padding_right = get_option( 'ndf_load_more_button_padding_right', 40 );

/* Tooltip Style */
$ndf_tooltip_icon_color = get_option( 'ndf_tooltip_icon_color', '#444444' );
$ndf_tooltip_icon_background_color = get_option( 'ndf_tooltip_icon_background_color', '#EEEEEE' );
$ndf_tooltip_background_color = get_option( 'ndf_tooltip_background_color','#FFFFFF' );
$ndf_tooltip_border_color = get_option( 'ndf_tooltip_border_color', '#161616' );
$ndf_tooltip_border_radius = get_option( 'ndf_tooltip_border_radius', 0 );
$ndf_tooltip_font_size = get_option( 'ndf_tooltip_font_size', '14px' );
$ndf_tooltip_lineheight = get_option( 'ndf_tooltip_lineheight', '1.2' );
$ndf_tooltip_font_color = get_option( 'ndf_tooltip_font_color', '#161616' );

/* Modal Close Button Style */
$ndf_more_info_fields_table_header_background_color = get_option( 'ndf_more_info_fields_table_header_background_color', '#eff1f2' );
$ndf_more_info_fields_header_fontcolor = get_option( 'ndf_more_info_fields_header_fontcolor', '#000000' );

$ndf_more_info_fields_modal_background_color = get_option( 'ndf_more_info_fields_modal_background_color', '#FFFFFF' );

/* Enquiry Form Style */
$ndf_more_info_fields_heading_label_fontcolor = get_option( 'ndf_more_info_fields_heading_label_fontcolor', '#000000' );
$ndf_more_info_fields_header_font_size = get_option( 'ndf_more_info_fields_header_font_size', '14px' );
$ndf_more_info_fields_table_border_color = get_option( 'ndf_more_info_fields_table_border_color', '#efefef' );
$ndf_more_info_fields_table_border_radius = get_option( 'ndf_more_info_fields_table_border_radius', 8 );
$ndf_more_info_fields_table_background_color = get_option( 'ndf_more_info_fields_table_background_color', '#FFFFFF' );
$ndf_more_info_fields_table_font_color = get_option( 'ndf_more_info_fields_table_font_color', '#161616' );
$ndf_more_info_fields_summary_label_fontcolor = get_option( 'ndf_more_info_fields_summary_label_fontcolor', '#000000' );

// for logo postion
$ndf_data_logo_position = get_option( 'ndf_data_results_table_logo_position','left');
// Request Quotes Forms Display Settngs
$request_quotes_formbackground_color = get_option( 'request_quotes_formbackground_color', '#fff' );
$request_quotes_form_text_color = get_option( 'request_quotes_form_text_color', '#fff' );
$request_quotes_form_title_font_size = get_option( 'request_quotes_form_title_font_size', '25px' );
$request_quotes_form_font_weight = get_option( 'request_quotes_form_font_weight', '400' );
$request_quotes_form_submit_button_color = get_option( 'request_quotes_form_submit_button_color', '#fff' );
$request_quotes_form_input_width = get_option( 'request_quotes_form_input_width', '100%' );
$request_quotes_form_submit_button_width = get_option( 'request_quotes_form_submit_button_width', 'auto' );
$request_quotes_form_title_position = get_option( 'request_quotes_form_title_position', 'center' );
$request_quotes_form_content_position = get_option( 'request_quotes_form_content_position', 'center' );
$request_quotes_form_title_line_height = get_option( 'request_quotes_form_title_line_height', '' );
// 
$ndf_filters_show_filter_table = get_option( 'ndf_filters_show_filter_table', 0 );

if($ndf_filters_show_filter_table == 1 ){
	$ndf_filters_show_filter_table_settings = "none";
}
else{
	$ndf_filters_show_filter_table_settings = "block";
}



?>
<style type="text/css">
.ndf_filters_wrapper{
	display:<?=$ndf_filters_show_filter_table_settings;?> !important;
}
.ndf_filters_heading{
	display:<?=$ndf_filters_show_filter_table_settings;?> !important;
}


.quotes-form-content{
	text-align:<?=$request_quotes_form_content_position;?>
}
#default-quotes-form-container input,.text-area-form-default{
	width:<?=$request_quotes_form_input_width;?>;
}
#default-quotes-form-container p{
	color:<?=$request_quotes_form_text_color;?>;
	text-align:<?=$request_quotes_form_title_position;?>;
}

.get-quotes{
	background-color:<?=$request_quotes_form_submit_button_color;?>;
	width:<?=$request_quotes_form_submit_button_width?>;
}
#quotes-form-container input,.text-area-form{
	width:<?=$request_quotes_form_input_width;?>;
}
#quotes-form-container p{
	color:<?=$request_quotes_form_text_color;?>;
	text-align:<?=$request_quotes_form_title_position;?>;
}
.get-form-title{
	color:<?=$request_quotes_form_text_color;?>;
	font-size:<?=$request_quotes_form_title_font_size;?>;
	font-weight:<?=$request_quotes_form_font_weight;?>;
	text-align:<?=$request_quotes_form_title_position;?>;
}
.form-box{
	background-color:<?=$request_quotes_formbackground_color;?>;
}
.ndf_data_title_cell {
	text-align:<?=$ndf_data_logo_position;?>;
}
/* Data Filters Heading Style */
h1.ndf_filters_heading, h2.ndf_filters_heading, h3.ndf_filters_heading, h4.ndf_filters_heading, h5.ndf_filters_heading, h6.ndf_filters_heading{
	color: <?php echo $ndf_filters_heading_label_fontcolor; ?>;
	display: inline-block;
	line-height: <?php echo $ndf_filters_heading_lineheight; ?>em;
	margin: 0px;
	padding:10px 0px 10px 0px;
	text-shadow: rgba(0,0,0,.0) 0 0 1px;
}

p#wcp_keyword_search_p{
	margin-top: <?php echo $ndf_keyword_search_margin_top; ?>px;
	margin-bottom: <?php echo $ndf_keyword_search_margin_bottom; ?>px;
}
#wcp_keyword_search_button{
	color: <?php echo $ndf_keyword_search_fontcolor; ?>;
	font-size: <?php echo $ndf_keyword_search_font_size; ?>;
	line-height: <?php echo $ndf_keyword_search_lineheight; ?>em;
	background-color: <?php echo $ndf_keyword_search_background_color; ?>;
	border: 1px solid <?php echo $ndf_keyword_search_background_color; ?>;
	-webkit-border-top-right-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	-moz-border-top-right-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	border-top-right-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	-webkit-border-bottom-right-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	-moz-border-bottom-right-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	border-bottom-right-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	-webkit-border-top-left-radius: 0px;
	-moz-border-top-left-radius: 0px;
	border-top-left-radius: 0px;
	-webkit-border-bottom-left-radius: 0px;
	-moz-border-bottom-left-radius: 0px;
	border-bottom-left-radius: 0px;
	padding-top: <?php echo $ndf_keyword_search_padding_top; ?>px;
	padding-bottom: <?php echo $ndf_keyword_search_padding_bottom; ?>px;
	padding-left: <?php echo $ndf_keyword_search_padding_left; ?>px;
	padding-right: <?php echo $ndf_keyword_search_padding_right; ?>px;
	text-decoration: none;
}
#wcp_keyword_search_button:hover{
	color: <?php echo $ndf_keyword_search_hover_fontcolor; ?>;
	background-color: <?php echo $ndf_keyword_search_hover_background_color; ?>;
	text-decoration: none;
}
#wcp_keyword_search{
	font-size: <?php echo $ndf_keyword_search_font_size; ?>;
	border: 1px solid <?php echo $ndf_keyword_search_background_color; ?>;
	background-color: #FFF;
	-webkit-border-top-left-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	-moz-border-top-left-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	border-top-left-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	-webkit-border-bottom-left-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	-moz-border-bottom-left-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	border-bottom-left-radius: <?php echo $ndf_keyword_search_border_radius; ?>px;
	-webkit-border-top-right-radius: 0px;
	-moz-border-top-right-radius: 0px;
	border-top-right-radius: 0px;
	-webkit-border-bottom-right-radius: 0px;
	-moz-border-bottom-right-radius: 0px;
	border-bottom-right-radius: 0px;
}

/* Data Filters Style */
.ndf_filters_wrapper{
	background-color: <?php echo $ndf_filters_table_background_color; ?>;
	-webkit-border-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-moz-border-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	border-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	overflow: hidden;
	

}
.ndf_filter_container p{
	font-size: <?php echo $ndf_filters_table_category_title_font_size; ?>;
	line-height: <?php echo $ndf_filters_table_category_title_lineheight; ?>em;
	color: <?php echo $ndf_filters_table_category_title_fontcolor; ?>;
}
.ndf_filter_container div label, .ndf_filter_container .ndf_filters_show_more {
	font-size: <?php echo $ndf_filters_table_font_size; ?>;
	color: <?php echo $ndf_filters_table_font_color; ?>;
	-webkit-box-shadow: none;
	box-shadow: none;
	text-shadow: rgba(0,0,0,.0) 0 0 1px;
}
.ndf_filter_container{
	border: <?php echo $ndf_filters_table_border_width; ?>px solid <?php echo $ndf_filters_table_border_color; ?>;
	border-left: none;
}
.ndf_filter_container:first-child{
	border-left: <?php echo $ndf_filters_table_border_width; ?>px solid <?php echo $ndf_filters_table_border_color; ?>;
	-webkit-border-bottom-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-moz-border-bottom-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	border-bottom-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-webkit-border-top-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-moz-border-top-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	border-top-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
}
.ndf_filter_container:first-child hr{
	-webkit-border-top-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-moz-border-top-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	border-top-left-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
}
.ndf_filters_wrapper .ndf_filter_container.ndf_last_filter{
	-webkit-border-bottom-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-moz-border-bottom-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	border-bottom-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-webkit-border-top-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-moz-border-top-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	border-top-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
}
.ndf_filters_wrapper .ndf_filter_container.ndf_last_filter hr{
	-webkit-border-top-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	-moz-border-top-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
	border-top-right-radius: <?php echo $ndf_filters_table_border_radius; ?>px;
}
#ndf_plugin_html .frxp-list li{
	line-height: <?php echo $ndf_filters_table_lineheight; ?>em;
}

@media all and (max-width: 768px) {
.form-box{
	width:90% !important;
	top:50px !important;
	line-height:<?=$request_quotes_form_title_line_height;?>;
}
.ndf_filter_container{
		border: <?php echo $ndf_filters_table_border_width; ?>px solid <?php echo $ndf_filters_table_border_color; ?>;
	}
}

.ndf_filters_wrapper{
	background-color: <?php echo $ndf_filters_table_background_color; ?>;
}
#ndf_plugin_html #ndf_filter_grid_cat_1 ul,
#ndf_plugin_html #ndf_filter_grid_cat_2 ul,
#ndf_plugin_html #ndf_filter_grid_cat_3 ul,
#ndf_plugin_html #ndf_filter_grid_cat_4 ul,
#ndf_plugin_html #ndf_filter_grid_cat_5 ul,
#ndf_plugin_html #ndf_filter_cat_1 ul,
#ndf_plugin_html #ndf_filter_cat_2 ul,
#ndf_plugin_html #ndf_filter_cat_3 ul,
#ndf_plugin_html #ndf_filter_cat_4 ul,
#ndf_plugin_html #ndf_filter_cat_5 ul{
	margin-left: 0px;
}

#ndf_plugin_html #ndf_filter_cat_1 hr.ndf_filter_top_accent, #ndf_plugin_html #ndf_filter_grid_cat_1 hr.ndf_filter_top_accent{
	border-top-color: <?php echo $ndf_category_1_filter_accent_color; ?>;	
}
#ndf_plugin_html #ndf_filter_cat_2 hr.ndf_filter_top_accent, #ndf_plugin_html #ndf_filter_grid_cat_2 hr.ndf_filter_top_accent{
	border-top-color: <?php echo $ndf_category_2_filter_accent_color; ?>;	
}
#ndf_plugin_html #ndf_filter_cat_3 hr.ndf_filter_top_accent, #ndf_plugin_html #ndf_filter_grid_cat_3 hr.ndf_filter_top_accent{
	border-top-color: <?php echo $ndf_category_3_filter_accent_color; ?>;	
}
#ndf_plugin_html #ndf_filter_cat_4 hr.ndf_filter_top_accent, #ndf_plugin_html #ndf_filter_grid_cat_4 hr.ndf_filter_top_accent{
	border-top-color: <?php echo $ndf_category_4_filter_accent_color; ?>;	
}
#ndf_plugin_html #ndf_filter_cat_5 hr.ndf_filter_top_accent, #ndf_plugin_html #ndf_filter_grid_cat_5 hr.ndf_filter_top_accent{
	border-top-color: <?php echo $ndf_category_5_filter_accent_color; ?>;	
}
#ndf_plugin_html #ndf_filter_cat_1 hr.ndf_filter_accent, #ndf_plugin_html #ndf_filter_grid_cat_1 hr.ndf_filter_accent{
	border-top-color: <?php echo $ndf_category_1_filter_accent_color; ?>;
}
#ndf_plugin_html #ndf_filter_cat_2 hr.ndf_filter_accent, #ndf_plugin_html #ndf_filter_grid_cat_2 hr.ndf_filter_accent{
	border-top-color: <?php echo $ndf_category_2_filter_accent_color; ?>;
}
#ndf_plugin_html #ndf_filter_cat_3 hr.ndf_filter_accent, #ndf_plugin_html #ndf_filter_grid_cat_3 hr.ndf_filter_accent{
	border-top-color: <?php echo $ndf_category_3_filter_accent_color; ?>;
}
#ndf_plugin_html #ndf_filter_cat_4 hr.ndf_filter_accent, #ndf_plugin_html #ndf_filter_grid_cat_4 hr.ndf_filter_accent{
	border-top-color: <?php echo $ndf_category_4_filter_accent_color; ?>;
}
#ndf_plugin_html #ndf_filter_cat_5 hr.ndf_filter_accent, #ndf_plugin_html #ndf_filter_grid_cat_5 hr.ndf_filter_accent{
	border-top-color: <?php echo $ndf_category_5_filter_accent_color; ?>;
}

<?php 
/**
 * Override Conditions 
 */
/* Category 1 Overrides */
if( $ndf_category_1_filter_override == 1 ){
	?>
	#ndf_filter_cat_1 p.ndf_category_label, #ndf_filter_grid_cat_1 p.ndf_category_label{
		color: <?php echo $ndf_category_1_filter_label_fontcolor; ?>;
		font-size: <?php echo $ndf_category_1_filter_label_font_size; ?>;
	}
	#ndf_filter_cat_1 div label, #ndf_filter_grid_cat_1 div label{
		color: <?php echo $ndf_category_1_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_1_filter_font_size; ?>;
	}
	#ndf_filter_cat_1, #ndf_filter_grid_cat_1{
		background-color: <?php echo $ndf_category_1_filter_background_color; ?>;
	}
	.ndf_filter_container #ndf_filter_cat_1 div label, .ndf_filter_container #ndf_filter_cat_1 .ndf_filters_show_more {
		color: <?php echo $ndf_category_1_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_1_filter_font_size; ?>;
	}
	<?php
}
/* Category 2 Overrides */
if( $ndf_category_2_filter_override == 1 ){
	?>
	#ndf_filter_cat_2 p.ndf_category_label, #ndf_filter_grid_cat_2 p.ndf_category_label{
		color: <?php echo $ndf_category_2_filter_label_fontcolor; ?>;
		font-size: <?php echo $ndf_category_2_filter_label_font_size; ?>;
	}
	#ndf_filter_cat_2 div label, #ndf_filter_grid_cat_2 div label{
		color: <?php echo $ndf_category_2_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_2_filter_font_size; ?>;
	}
	#ndf_filter_cat_2, #ndf_filter_grid_cat_2{
		background-color: <?php echo $ndf_category_2_filter_background_color; ?>;
	}
	.ndf_filter_container #ndf_filter_cat_2 div label, .ndf_filter_container #ndf_filter_cat_2 .ndf_filters_show_more {
		color: <?php echo $ndf_category_2_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_2_filter_font_size; ?>;
	}
	<?php
}
/* Category 3 Overrides */
if( $ndf_category_3_filter_override == 1 ){
	?>
	#ndf_filter_cat_3 p.ndf_category_label, #ndf_filter_grid_cat_3 p.ndf_category_label{
		color: <?php echo $ndf_category_3_filter_label_fontcolor; ?>;
		font-size: <?php echo $ndf_category_3_filter_label_font_size; ?>;
	}
	#ndf_filter_cat_3 div label, #ndf_filter_grid_cat_3 div label{
		color: <?php echo $ndf_category_3_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_3_filter_font_size; ?>;
	}
	#ndf_filter_cat_3, #ndf_filter_grid_cat_3{
		background-color: <?php echo $ndf_category_3_filter_background_color; ?>;
	}
	.ndf_filter_container #ndf_filter_cat_3 div label, .ndf_filter_container #ndf_filter_cat_3 .ndf_filters_show_more {
		color: <?php echo $ndf_category_3_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_3_filter_font_size; ?>;
	}
	<?php
}
/* Category 4 Overrides */
if( $ndf_category_4_filter_override == 1 ){
	?>
	#ndf_filter_cat_4 p.ndf_category_label, #ndf_filter_grid_cat_4 p.ndf_category_label{
		color: <?php echo $ndf_category_4_filter_label_fontcolor; ?>;
		font-size: <?php echo $ndf_category_4_filter_label_font_size; ?>;
	}
	#ndf_filter_cat_4 div label, #ndf_filter_grid_cat_4 div label{
		color: <?php echo $ndf_category_4_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_4_filter_font_size; ?>;
	}
	#ndf_filter_cat_4, #ndf_filter_grid_cat_4{
		background-color: <?php echo $ndf_category_4_filter_background_color; ?>;
	}
	.ndf_filter_container #ndf_filter_cat_4 div label, .ndf_filter_container #ndf_filter_cat_4 .ndf_filters_show_more {
		color: <?php echo $ndf_category_4_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_4_filter_font_size; ?>;
	}
	<?php
}
/* Category 5 Overrides */
if( $ndf_category_5_filter_override == 1 ){
	?>
	#ndf_filter_cat_5 p.ndf_category_label, #ndf_filter_grid_cat_5 p.ndf_category_label{
		color: <?php echo $ndf_category_5_filter_label_fontcolor; ?>;
		font-size: <?php echo $ndf_category_5_filter_label_font_size; ?>;
	}
	#ndf_filter_cat_5 div label, #ndf_filter_grid_cat_5 div label{
		color: <?php echo $ndf_category_5_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_5_filter_font_size; ?>;
	}
	#ndf_filter_cat_5, #ndf_filter_grid_cat_5{
		background-color: <?php echo $ndf_category_5_filter_background_color; ?>;
	}
	.ndf_filter_container #ndf_filter_cat_5 div label, .ndf_filter_container #ndf_filter_cat_5 .ndf_filters_show_more {
		color: <?php echo $ndf_category_5_filter_font_color; ?>;
		font-size: <?php echo $ndf_category_5_filter_font_size; ?>;
	}
	<?php
}
?>
/* Reset Link */
#ndf_reset_filters{
	color: <?php echo $ndf_reset_button_fontcolor; ?>;
	font-size: <?php echo $ndf_reset_button_font_size; ?>;
	line-height: <?php echo $ndf_reset_button_lineheight; ?>em;
	background: <?php echo $ndf_reset_button_background_color; ?>;
	border: <?php echo $ndf_reset_button_border_width; ?>px solid <?php echo $ndf_reset_button_border_color; ?>;
	-webkit-border-radius: <?php echo $ndf_reset_button_border_radius; ?>px;
	-moz-border-radius: <?php echo $ndf_reset_button_border_radius; ?>px;
	border-radius: <?php echo $ndf_reset_button_border_radius; ?>px;
	padding-top: <?php echo $ndf_reset_button_padding_top; ?>px;
	padding-bottom: <?php echo $ndf_reset_button_padding_bottom; ?>px;
	padding-left: <?php echo $ndf_reset_button_padding_left; ?>px;
	padding-right: <?php echo $ndf_reset_button_padding_right; ?>px;
	display: inline-block;
	margin-top: <?php echo $ndf_reset_button_margin_top; ?>px;
	margin-bottom: <?php echo $ndf_reset_button_margin_bottom; ?>px;
}
#ndf_reset_filters:hover{
	color: <?php echo $ndf_reset_button_hover_fontcolor; ?>;
	background: <?php echo $ndf_reset_button_hover_background_color; ?>;
}

/* Data Results Table Heading Style */
h1.ndf_section_title, h2.ndf_section_title, h3.ndf_section_title, h4.ndf_section_title, h5.ndf_section_title, h6.ndf_section_title,
#modal-spinner h1.ndf_section_title, #modal-spinner h2.ndf_section_title, #modal-spinner h3.ndf_section_title, #modal-spinner h4.ndf_section_title, #modal-spinner h5.ndf_section_title, #modal-spinner h6.ndf_section_title{
	padding: 0;
	margin: 0;
	text-shadow: rgba(0,0,0,.0) 0 0 1px;
}

h1.ndf_data_results_heading, h2.ndf_data_results_heading, h3.ndf_data_results_heading, h4.ndf_data_results_heading,h5.ndf_data_results_heading, h6.ndf_data_results_heading{
	color: <?php echo $ndf_data_results_heading_label_fontcolor; ?>;
	display: inline-block;
	margin: 0px;
	padding: 10px 0px 10px 0px;
	line-height: <?php echo $ndf_data_results_heading_lineheight; ?>em;
	text-shadow: rgba(0,0,0,.0) 0 0 1px;
}
.ndf_data_results_heading_color{
	color: <?php echo $ndf_data_results_category_fontcolor; ?>;
	font-size: <?php echo $ndf_data_results_category_font_size; ?>;
	line-height: <?php echo $ndf_data_results_category_lineheight; ?>em;
	padding-right: 5px;
}
#ndf_plugin_html .ndf_data_results_heading_color a,
#ndf_plugin_html .ndf_data_results_heading_color a:link,
#ndf_plugin_html .ndf_data_results_heading_color a:visited,
#ndf_plugin_html .ndf_data_results_heading_color a:hover,
#ndf_plugin_html .ndf_data_results_heading_color a:active{
	color: <?php echo $ndf_data_results_category_fontcolor; ?>;
	text-decoration: none;
}
#ndf_plugin_html .ndf_data_results_heading_color a:hover{
	cursor: pointer;
	text-decoration: underline;
}

/*
 * Data Results Table Style 
 */
#ndf_plugin_html .ndf_table_header p{
	margin: 0;
}
#ndf_filtered_data_content .frxp-list > li.text,
#ndf_filtered_data_content .frxp-list > li.icon,
.frxp-tooltip .frxp-list > li.text,
.frxp-tooltip .frxp-list > li.icon{
	border-top: 1px dotted <?php echo $ndf_data_results_table_border_color; ?>;
}
.label_wrapper{
	border: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
	border-bottom: none;
	-webkit-border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-webkit-border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	background-color: <?php echo $ndf_data_results_table_header_background_color; ?>;
	padding: 5px 2px;
	color: <?php echo $ndf_data_results_category_fontcolor; ?>;
	font-size: <?php echo $ndf_data_results_category_font_size; ?>;
	line-height: <?php echo $ndf_data_results_category_lineheight; ?>em;
}
/*
.horizontal tr:first-child .ndf_table_cell.ndf_data_title_cell:first-child{
	-webkit-border-top-left-radius: <?php //echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-top-left-radius: <?php //echo $ndf_data_results_table_border_radius; ?>px;
	border-top-left-radius: <?php //echo $ndf_data_results_table_border_radius; ?>px;
}*/
.tablesaw-cell-persist.ndf_table_cell{
	border: 1px solid <?php echo $ndf_data_results_table_border_color; ?> !important;
	border-bottom: none !important;

}
.tablesaw-cell-persist.ndf_table_cell.ndf_last_row, .ndf_table_cell.ndf_last_row{
	border-bottom: 1px solid <?php echo $ndf_data_results_table_border_color; ?> !important;

}
.ndf_table_cell{
	border-bottom: none !important;
	color: <?php echo $ndf_data_results_table_font_color; ?>;
}
#ndf_plugin_html #ndf-no-results.ndf_table_cell, 
#ndf-no-results.ndf_table_cell{
	color: <?php echo $ndf_data_results_heading_description_font_color; ?>;
}
.tabular .ndf_table_cell{
	border: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
	background-color: <?php echo $ndf_data_results_table_background_color; ?>;
}
.horizontal .ndf_table_cell:not(.ndf_data_title_cell) .wcp_cell_wrap{
	background-color: <?php echo $ndf_data_results_table_background_color; ?>;
}
.horizontal .ndf_table_cell.ndf_data_title_cell .wcp_cell_wrap{
	background-color: <?php echo $ndf_data_results_table_title_cell_background_color; ?>;
}
#ndf_plugin_html .horizontal .ndf_table_cell{
	padding: 0;
}
#ndf_plugin_html tr{
	border: 0;
}
.horizontal .ndf_table_cell .wcp_cell_wrap{
	height: auto;
	padding: 14px;
	border-left: 0px;
	border-top: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
	border-right: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
	border-left: 0px;
}
.horizontal tr:first-child .ndf_table_cell .wcp_cell_wrap{
	-webkit-border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
}
.horizontal .ndf_table_cell.ndf_data_title_cell .wcp_cell_wrap{
	border-top: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
	border-left: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
	border-right: 0px;
	padding: 4px;
}
.horizontal tr:first-child .ndf_table_cell.ndf_data_title_cell .wcp_cell_wrap{
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-border-radius: 0;
	-webkit-border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
}
.horizontal .ndf_table_cell.ndf_last_row .wcp_cell_wrap{
	-webkit-border-bottom-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-bottom-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-bottom-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-bottom: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
}
.horizontal .ndf_table_cell.ndf_data_title_cell.ndf_last_row .wcp_cell_wrap,
.horizontal tr:first-child .ndf_table_cell.ndf_data_title_cell.ndf_last_row .wcp_cell_wrap{
	-webkit-border-bottom-right-radius: 0;
	-moz-border-bottom-right-radius: 0;
	border-bottom-right-radius: 0;
	-webkit-border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-bottom: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
}
.horizontal tr:first-child .ndf_table_cell img.ndf_header_logo{
	-webkit-border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-top-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
}
.horizontal tr:first-child .ndf_table_cell.ndf_last_row img.ndf_header_logo,
.horizontal tr .ndf_table_cell.ndf_last_row img.ndf_header_logo{
	-webkit-border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	-moz-border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
}
#ndf_plugin_html .horizontal .ndf_last_row{
	border-bottom: 0px !important;
}
<?php
$ndf_data_results_h_layout_options = get_option( 'ndf_data_results_h_layout_options', 'no-label' );
if( $ndf_data_results_h_layout_options == 'tight-view' ){
	?>
	#ndf_filtered_data_content.horizontal{
		table-layout:fixed;
	    border-collapse: collapse;
		width: 100%;
	}
	#ndf_filtered_data_content.horizontal .ndf_table_cell.ndf_data_title_cell{
	  width: 190px;
	}
	#ndf_filtered_data_content.horizontal .ndf_table_cell:not(.ndf_data_title_cell){
	  width: 100%;
	}
	<?php
}
?>
@media all and (max-width: 768px) {
	.horizontal tr:first-child .ndf_table_cell.ndf_data_title_cell .wcp_cell_wrap,
	.horizontal tr:first-child .ndf_table_cell img.ndf_header_logo{
		-webkit-border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
		-moz-border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
		border-top-right-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	}
	.horizontal tr:first-child .ndf_table_cell .wcp_cell_wrap{
		-webkit-border-top-right-radius: 0px;
		-moz-border-top-right-radius: 0px;
		border-top-right-radius: 0px;
	}
	.horizontal .ndf_table_cell.ndf_last_row .wcp_cell_wrap{
		-webkit-border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
		-moz-border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
		border-bottom-left-radius: <?php echo $ndf_data_results_table_border_radius; ?>px;
	}
	.horizontal .ndf_table_cell.ndf_data_title_cell.ndf_last_row .wcp_cell_wrap, 
	.horizontal tr:first-child .ndf_table_cell.ndf_data_title_cell.ndf_last_row .wcp_cell_wrap,
	.horizontal tr:first-child .ndf_table_cell.ndf_last_row img.ndf_header_logo, 
	.horizontal tr .ndf_table_cell.ndf_last_row img.ndf_header_logo {
		-webkit-border-bottom-left-radius: 0px;
		-moz-border-bottom-left-radius: 0px;
		border-bottom-left-radius: 0px;
		border-bottom: 0px;
	}
	.horizontal .ndf_table_cell .wcp_cell_wrap,
	.horizontal .ndf_table_cell.ndf_data_title_cell .wcp_cell_wrap{
		border-left: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
		border-right: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
	}
	.horizontal .ndf_table_cell.ndf_no_content, .horizontal .ndf_table_cell.ndf_no_content .wcp_cell_wrap{
		display: none;
		height: 0px;
	}
	.ndf_table_cell{
		min-height: 0px !important;
	}
}
#ndf_plugin_html .ndf_table_cell{
	padding: 4px;
}
.tabular .ndf_table_cell{
	/*border-left: none !important;*/
}
#ndf_filtered_data_content .ndf_table_cell p, #ndf_filtered_data_content .ndf_table_cell li, .ndf_table_cell{
	color: <?php echo $ndf_data_results_table_font_color; ?>;
	font-size: <?php echo $ndf_data_results_table_font_size; ?>;
	line-height: <?php echo $ndf_data_results_table_lineheight; ?>em;
}
#ndf_filtered_data_content .ndf_table_cell a, #ndf_filtered_data_content .ndf_table_cell a:hover{
	color: <?php echo $ndf_data_results_table_font_color; ?>;
}
.tabular .ndf_table_cell.ndf_data_title_cell{
	background-color: <?php echo $ndf_data_results_table_title_cell_background_color; ?>;
}
#ndf_filtered_data_content .ndf_table_cell.ndf_data_title_cell p{
	color: <?php echo $ndf_data_results_table_title_cell_font_color; ?>;
}
.ndf_table_cell .ndf_title_wrap{
	border: <?php echo $ndf_data_results_table_border_width; ?>px solid <?php echo $ndf_data_results_table_border_color; ?>;
}
.ndf_filters_navigation, .ndf_filters_navigation:visited{
	background-color: <?php echo $ndf_data_results_table_header_background_color; ?>;
	border: 1px solid <?php echo $ndf_data_results_table_border_color; ?>;
	color: <?php echo $ndf_data_results_category_fontcolor; ?> !important;
}
.ndf_filters_navigation:hover{
	background-color: <?php echo $ndf_data_results_category_fontcolor; ?>;
	color: <?php echo $ndf_data_results_table_header_background_color; ?> !important;
}

/* More Info Style */
#ndf_plugin_html a.ndf_more_info_link{
	font-size: <?php echo $ndf_more_info_button_font_size; ?>;
	line-height: <?php echo $ndf_more_info_button_lineheight; ?>em;
	color: <?php echo $ndf_more_info_button_fontcolor; ?>;
	background-color: <?php echo $ndf_more_info_button_background_color; ?>;
	-webkit-border-radius: <?php echo $ndf_more_info_button_border_radius; ?>px;
	-moz-border-radius: <?php echo $ndf_more_info_button_border_radius; ?>px;
	border-radius: <?php echo $ndf_more_info_button_border_radius; ?>px;
	border: <?php echo $ndf_more_info_button_border_width; ?>px solid <?php echo $ndf_more_info_button_border_color; ?>;
	padding-top: <?php echo $ndf_more_info_button_padding_top; ?>px;
	padding-bottom: <?php echo $ndf_more_info_button_padding_bottom; ?>px;
	padding-left: <?php echo $ndf_more_info_button_padding_left; ?>px;
	padding-right: <?php echo $ndf_more_info_button_padding_right; ?>px;
	text-decoration: none;
}
#ndf_plugin_html .tabular a.ndf_more_info_link{
	margin-left: 1px;
	margin-right: 1px;
	width: 100%;
}
#ndf_plugin_html .horizontal a.ndf_more_info_link, #ndf_plugin_html .horizontal a.ndf_more_info_enquiry{
	margin-right: 4px;
}
#ndf_plugin_html a.ndf_more_info_link:hover{
	color: <?php echo $ndf_more_info_button_hover_fontcolor; ?>;
	background-color: <?php echo $ndf_more_info_button_hover_background_color; ?>;
}

.ndf_data_star_rating{
	margin-top: <?php echo $ndf_star_rating_margin_top; ?>px;
	margin-bottom: <?php echo $ndf_star_rating_margin_bottom; ?>px;
}
.ndf_data_star_rating i{
	color: <?php echo $ndf_star_rating_color; ?>;
}

/* Load More Style */
#ndf_load_more{
	font-size: <?php echo $ndf_load_more_button_font_size; ?>;
	color: <?php echo $ndf_load_more_button_fontcolor; ?>;
	background-color: <?php echo $ndf_load_more_button_background_color; ?>;
	-webkit-border-radius: <?php echo $ndf_load_more_button_border_radius; ?>px;
	-moz-border-radius: <?php echo $ndf_load_more_button_border_radius; ?>px;
	border-radius: <?php echo $ndf_load_more_button_border_radius; ?>px;
	border: <?php echo $ndf_load_more_button_border_width; ?>px solid <?php echo $ndf_load_more_button_border_color; ?>;
	padding-top: <?php echo $ndf_load_more_button_padding_top; ?>px;
	padding-bottom: <?php echo $ndf_load_more_button_padding_bottom; ?>px;
	padding-left: <?php echo $ndf_load_more_button_padding_left; ?>px;
	padding-right: <?php echo $ndf_load_more_button_padding_right; ?>px;
}
#ndf_load_more:hover{
	background-color: <?php echo $ndf_load_more_button_hover_background_color; ?>;
}

/* Tooltip Style */
.ndf_data_cell_tooltip i.frxp-icon-button{
	background: <?php echo $ndf_tooltip_icon_background_color; ?>;
    color: <?php echo $ndf_tooltip_icon_color; ?>;
}
.frxp-tooltip.frxp-active {
	background: <?php echo $ndf_tooltip_background_color; ?>;
	border-color: <?php echo $ndf_tooltip_border_color; ?>;
	-webkit-border-radius: <?php echo $ndf_tooltip_border_radius; ?>px;
	-moz-border-radius: <?php echo $ndf_tooltip_border_radius; ?>px;
	border-radius: <?php echo $ndf_tooltip_border_radius; ?>px;
}
.frxp-tooltip .frxp-tooltip-inner p, .frxp-tooltip .frxp-tooltip-inner *{
	font-size: <?php echo $ndf_tooltip_font_size; ?>;
	line-height: <?php echo $ndf_tooltip_lineheight; ?>em;
	color: <?php echo $ndf_tooltip_font_color; ?>;
}
.frxp-tooltip-top:after,
.frxp-tooltip-top-left:after,
.frxp-tooltip-top-right:after {
  bottom: -5px;
  border-top-style: solid;
  border-bottom: none;
  border-left-color: transparent;
  border-right-color: transparent;
  border-top-color: <?php echo $ndf_tooltip_border_color; ?>;
}
.frxp-tooltip-bottom:after,
.frxp-tooltip-bottom-left:after,
.frxp-tooltip-bottom-right:after {
  top: -5px;
  border-bottom-style: solid;
  border-top: none;
  border-left-color: transparent;
  border-right-color: transparent;
  border-bottom-color: <?php echo $ndf_tooltip_border_color; ?>;
}
.frxp-tooltip-top:after,
.frxp-tooltip-bottom:after {
  left: 50%;
  margin-left: -5px;
}

/* Font Sizes Fix */
#ndf_plugin_html h1,
h1.ndf_filters_heading, h1.ndf_data_results_heading, .ndf_table_cell h1{
	font-size: 3em;
	font-weight: bold;
}
#ndf_plugin_html h2,
h2.ndf_filters_heading, h2.ndf_data_results_heading, .ndf_table_cell h2{
	font-size: 2em;
	font-weight: bold;
}
#ndf_plugin_html h3,
h3.ndf_filters_heading, h3.ndf_data_results_heading, .ndf_table_cell h3{
	font-size: 1.5em;
	font-weight: bold;
}
#ndf_plugin_html h4,
h4.ndf_filters_heading, h4.ndf_data_results_heading, .ndf_table_cell h4{
	font-size: 1.35em;
	font-weight: bold;
}
#ndf_plugin_html h5,
h5.ndf_filters_heading, h5.ndf_data_results_heading, .ndf_table_cell h5{
	font-size: 1.2em;
	font-weight: bold;
}
#ndf_plugin_html h6,
h6.ndf_filters_heading, h6.ndf_data_results_heading, .ndf_table_cell h6{
	font-size: 1em;
	font-weight: bold;
}
.ndf_filters_heading_description, .ndf_filters_heading_description p{
	font-size: <?php echo $ndf_filters_heading_description_font_size; ?>;
	line-height: <?php echo $ndf_filters_heading_description_lineheight; ?>em;
	color: <?php echo $ndf_filters_heading_description_font_color; ?>;
	margin-bottom: 0px;
}
.ndf_data_results_heading_description p{
	font-size: <?php echo $ndf_data_results_heading_description_font_size; ?>;
	line-height: <?php echo $ndf_data_results_heading_description_lineheight; ?>em;
	color: <?php echo $ndf_data_results_heading_description_font_color; ?>;
	margin: 0;
}
.frxp-modal-close.frxp-close{
	background-color: <?php echo $ndf_more_info_fields_table_header_background_color; ?>;
	color: <?php echo $ndf_more_info_fields_header_fontcolor; ?> !important;
	margin: 0px;
	-webkit-box-shadow: none;
	box-shadow: none;
	text-decoration: none;
}
.frxp-open .frxp-modal-dialog{
	background-color: <?php echo $ndf_more_info_fields_modal_background_color; ?>;
}
/* Enquiry Form Style */
.frxp-modal .frxp-modal-dialog.ndf_modal_content .ndf_enquiry_fields label{
	color: <?php echo $ndf_more_info_fields_summary_label_fontcolor; ?>;
	font-size: <?php echo $ndf_more_info_fields_header_font_size; ?>;
}
.frxp-modal .frxp-modal-dialog.ndf_modal_content .ndf_enquiry_fields input,
.frxp-modal .frxp-modal-dialog.ndf_modal_content .ndf_enquiry_fields textarea{
	color: <?php echo $ndf_more_info_fields_table_font_color; ?>;
	border: 1px solid <?php echo $ndf_more_info_fields_table_border_color; ?>;
	-webkit-border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
	-moz-border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
	border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
	background-color: #FFFFFF;
	padding: 8px 10px;
	width: 100%;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
.frxp-modal .frxp-modal-dialog.ndf_modal_content .ndf_enquiry_fields input.ndf_enquiry_submit{
	color: <?php echo $ndf_more_info_fields_heading_label_fontcolor; ?>;
	padding: 8px 30px;
	width: auto;
}

#ndf_plugin_html .tabular .ndf_button_style_1,
#ndf_plugin_html .tabular .ndf_button_style_2,
#ndf_plugin_html .tabular .ndf_button_style_3,
#ndf_plugin_html .tabular .ndf_button_style_4,
#ndf_plugin_html .tabular .ndf_button_style_5{
	display: block;
	width: 100%;
}
<?php
$ndf_button_style_configuration = get_option( 'ndf_button_style_configuration' );

$button_css = "";
if( is_array( $ndf_button_style_configuration ) ){
	foreach( $ndf_button_style_configuration as $style_id => $settings ){
		$button_css .= "
			#ndf_plugin_html a.ndf_button_style_{$style_id},
			.frxp-modal .frxp-modal-dialog a.ndf_button_style_{$style_id}{
    			background-color: ".$settings['background'].";
    			color: ".$settings['text_color']." !important;
    			-webkit-border-radius: ".$settings['border_radius']."px;
    			-moz-border-radius: ".$settings['border_radius']."px;
    			border-radius: ".$settings['border_radius']."px;
    			border: ".$settings['border_width']."px solid ".$settings['border_color'].";
    			font-size: ".$settings['font_size'].";
    			padding: ".$settings['padding_top']."px ".$settings['padding_right']."px ".$settings['padding_bottom']."px ".$settings['padding_left']."px;
    			display: inline-block;
    			margin-bottom: 5px;
				line-height: ".$ndf_more_info_button_lineheight."em;
				-webkit-box-shadow: none;
				box-shadow: none;
				text-decoration: none;
				margin-left:1px;
				margin-right:1px;
			}
			#ndf_plugin_html a.ndf_button_style_{$style_id}:hover,
			.frxp-modal .frxp-modal-dialog a.ndf_button_style_{$style_id}:hover{
    			background-color: ".$settings['background_hover'].";
    			color: ".$settings['text_color_hover']." !important;
    			text-decoration: none;
    			-webkit-box-shadow: none;
				box-shadow: none;
			}
			";
	}
}
echo $button_css;
?>
</style>