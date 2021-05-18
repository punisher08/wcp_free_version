<?php
/**
 * Filters Section `Table Visual Presets` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/filter-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 * 
 */


if( isset( $_POST['ndf_save_preset'] ) ){
	$ndf_preset = $_POST['ndf_preset'];

	if( $ndf_preset == 2 ){
		update_option( 'ndf_filters_heading_show', 1 );
		update_option( 'ndf_filters_heading_style', 'h2' );
		update_option( 'ndf_filters_heading_label_fontcolor', '#000000' );
		update_option( 'ndf_filters_heading_description_font_size', '16px' );
		update_option( 'ndf_filters_heading_description_font_color', '#0c0c0c' );

		update_option( 'ndf_filters_table_background_color', '#3E4651' );
		update_option( 'ndf_filters_table_category_title_font_size', '18px' );
		update_option( 'ndf_filters_table_category_title_fontcolor', '#ffffff' );
		update_option( 'ndf_filters_table_font_size', '14px' );
		update_option( 'ndf_filters_table_font_color', '#ffffff' );
		update_option( 'ndf_filters_table_border_color', '#bfbfbf' );
		update_option( 'ndf_filters_table_border_radius', 10 );
		update_option( 'ndf_filters_table_border_width', 1 );

		update_option( 'ndf_category_1_filter_show', 1 );
		update_option( 'ndf_category_1_filter_accent_color', '#F1654C' );
		update_option( 'ndf_category_1_filter_override', 0 );
		update_option( 'ndf_category_1_filter_label_font_size', '14px' );
		update_option( 'ndf_category_1_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_1_filter_font_size', '14px' );
		update_option( 'ndf_category_1_filter_font_color', '#000000' );
		update_option( 'ndf_category_1_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_2_filter_show', 1 );
		update_option( 'ndf_category_2_filter_accent_color', '#00B5B5' );
		update_option( 'ndf_category_2_filter_override', 1 );
		update_option( 'ndf_category_2_filter_label_font_size', '18px' );
		update_option( 'ndf_category_2_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_2_filter_font_size', '14px' );
		update_option( 'ndf_category_2_filter_font_color', '#ffffff' );
		update_option( 'ndf_category_2_filter_background_color', '#2c3137' );

		update_option( 'ndf_category_3_filter_show', 1 );
		update_option( 'ndf_category_3_filter_accent_color', '#F1654C' );
		update_option( 'ndf_category_3_filter_override', 0 );
		update_option( 'ndf_category_3_filter_label_font_size', '14px' );
		update_option( 'ndf_category_3_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_3_filter_font_size', '14px' );
		update_option( 'ndf_category_3_filter_font_color', '#000000' );
		update_option( 'ndf_category_3_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_4_filter_show', 1 );
		update_option( 'ndf_category_4_filter_accent_color', '#00B5B5' );
		update_option( 'ndf_category_4_filter_override', 1 );
		update_option( 'ndf_category_4_filter_label_font_size', '18px' );
		update_option( 'ndf_category_4_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_4_filter_font_size', '14px' );
		update_option( 'ndf_category_4_filter_font_color', '#ffffff' );
		update_option( 'ndf_category_4_filter_background_color', '#2c3137' );

		update_option( 'ndf_category_5_filter_show', 1 );
		update_option( 'ndf_category_5_filter_accent_color', '#F1654C' );
		update_option( 'ndf_category_5_filter_override', 0 );
		update_option( 'ndf_category_5_filter_label_font_size', '14px' );
		update_option( 'ndf_category_5_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_5_filter_font_size', '14px' );
		update_option( 'ndf_category_5_filter_font_color', '#000000' );
		update_option( 'ndf_category_5_filter_background_color', '#ffffff' );

		update_option( 'ndf_keyword_search_font_size', '14px' );
		update_option( 'ndf_keyword_search_lineheight', '1.6' );
		update_option( 'ndf_keyword_search_fontcolor', '#ffffff' );
		update_option( 'ndf_keyword_search_hover_fontcolor', '#ffffff' );
		update_option( 'ndf_keyword_search_background_color', '#3E4651' );
		update_option( 'ndf_keyword_search_hover_background_color', '#2c3137' );
		update_option( 'ndf_keyword_search_border_radius', 6 );
		update_option( 'ndf_keyword_search_padding_top', 5 );
		update_option( 'ndf_keyword_search_padding_bottom', 5 );
		update_option( 'ndf_keyword_search_padding_left', 15 );
		update_option( 'ndf_keyword_search_padding_right', 15 );

		update_option( 'ndf_reset_button_font_size', '14px' );
		update_option( 'ndf_reset_button_lineheight', '1.6' );
		update_option( 'ndf_reset_button_fontcolor', '#ffffff' );
		update_option( 'ndf_reset_button_hover_fontcolor', '#ffffff' );
		update_option( 'ndf_reset_button_border_color', '#3E4651' );
		update_option( 'ndf_reset_button_background_color', '#3E4651' );
		update_option( 'ndf_reset_button_hover_background_color', '#2c3137' );
		update_option( 'ndf_reset_button_border_width', 1 );
		update_option( 'ndf_reset_button_border_radius', 6 );
		update_option( 'ndf_reset_button_padding_top', 5 );
		update_option( 'ndf_reset_button_padding_bottom', 5 );
		update_option( 'ndf_reset_button_padding_left', 15 );
		update_option( 'ndf_reset_button_padding_right', 15 );
	}
	else if( $ndf_preset == 3 ){
		update_option( 'ndf_filters_heading_show', 1 );
		update_option( 'ndf_filters_heading_style', 'h2' );
		update_option( 'ndf_filters_heading_label_fontcolor', '#000000' );
		update_option( 'ndf_filters_heading_description_font_size', '16px' );
		update_option( 'ndf_filters_heading_description_font_color', '#0c0c0c' );

		update_option( 'ndf_filters_table_background_color', '#e96666' );
		update_option( 'ndf_filters_table_category_title_font_size', '16px' );
		update_option( 'ndf_filters_table_category_title_fontcolor', '#ffffff' );
		update_option( 'ndf_filters_table_font_size', '14px' );
		update_option( 'ndf_filters_table_font_color', '#ffffff' );
		update_option( 'ndf_filters_table_border_color', '#bfbfbf' );
		update_option( 'ndf_filters_table_border_radius', 10 );
		update_option( 'ndf_filters_table_border_width', 1 );

		update_option( 'ndf_category_1_filter_show', 1 );
		update_option( 'ndf_category_1_filter_accent_color', '#a34f85' );
		update_option( 'ndf_category_1_filter_override', '' );
		update_option( 'ndf_category_1_filter_label_font_size', '14px' );
		update_option( 'ndf_category_1_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_1_filter_font_size', '14px' );
		update_option( 'ndf_category_1_filter_font_color', '#000000' );
		update_option( 'ndf_category_1_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_2_filter_show', 1 );
		update_option( 'ndf_category_2_filter_accent_color', '#4FA390' );
		update_option( 'ndf_category_2_filter_override', '' );
		update_option( 'ndf_category_2_filter_label_font_size', '14px' );
		update_option( 'ndf_category_2_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_2_filter_font_size', '14px' );
		update_option( 'ndf_category_2_filter_font_color', '#000000' );
		update_option( 'ndf_category_2_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_3_filter_show', 1 );
		update_option( 'ndf_category_3_filter_accent_color', '#F59268' );
		update_option( 'ndf_category_3_filter_override', '' );
		update_option( 'ndf_category_3_filter_label_font_size', '14px' );
		update_option( 'ndf_category_3_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_3_filter_font_size', '14px' );
		update_option( 'ndf_category_3_filter_font_color', '#000000' );
		update_option( 'ndf_category_3_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_4_filter_show', 1 );
		update_option( 'ndf_category_4_filter_accent_color', '#36D6BE' );
		update_option( 'ndf_category_4_filter_override', '' );
		update_option( 'ndf_category_4_filter_label_font_size', '14px' );
		update_option( 'ndf_category_4_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_4_filter_font_size', '14px' );
		update_option( 'ndf_category_4_filter_font_color', '#000000' );
		update_option( 'ndf_category_4_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_5_filter_show', 1 );
		update_option( 'ndf_category_5_filter_accent_color', '#E4EA6E' );
		update_option( 'ndf_category_5_filter_override', '' );
		update_option( 'ndf_category_5_filter_label_font_size', '14px' );
		update_option( 'ndf_category_5_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_5_filter_font_size', '14px' );
		update_option( 'ndf_category_5_filter_font_color', '#000000' );
		update_option( 'ndf_category_5_filter_background_color', '#ffffff' );

		update_option( 'ndf_keyword_search_font_size', '14px' );
		update_option( 'ndf_keyword_search_lineheight', '1.6' );
		update_option( 'ndf_keyword_search_fontcolor', '#ffffff' );
		update_option( 'ndf_keyword_search_hover_fontcolor', '#e96666' );
		update_option( 'ndf_keyword_search_background_color', '#e96666' );
		update_option( 'ndf_keyword_search_hover_background_color', '#ffffff' );
		update_option( 'ndf_keyword_search_border_radius', 6 );
		update_option( 'ndf_keyword_search_padding_top', 5 );
		update_option( 'ndf_keyword_search_padding_bottom', 5 );
		update_option( 'ndf_keyword_search_padding_left', 15 );
		update_option( 'ndf_keyword_search_padding_right', 15 );

		update_option( 'ndf_reset_button_font_size', '14px' );
		update_option( 'ndf_reset_button_lineheight', '1.6' );
		update_option( 'ndf_reset_button_fontcolor', '#ffffff' );
		update_option( 'ndf_reset_button_hover_fontcolor', '#e96666' );
		update_option( 'ndf_reset_button_border_color', '#e96666' );
		update_option( 'ndf_reset_button_background_color', '#e96666' );
		update_option( 'ndf_reset_button_hover_background_color', '#ffffff' );
		update_option( 'ndf_reset_button_border_width', 1 );
		update_option( 'ndf_reset_button_border_radius', 6 );
		update_option( 'ndf_reset_button_padding_top', 5 );
		update_option( 'ndf_reset_button_padding_bottom', 5 );
		update_option( 'ndf_reset_button_padding_left', 15 );
		update_option( 'ndf_reset_button_padding_right', 15 );
	}
	else{
		update_option( 'ndf_filters_heading_show', 1 );
		update_option( 'ndf_filters_heading_style', 'h2' );
		update_option( 'ndf_filters_heading_label_fontcolor', '#0c4b84' );
		update_option( 'ndf_filters_heading_description_font_size', '16px' );
		update_option( 'ndf_filters_heading_description_font_color', '#0c0c0c' );

		update_option( 'ndf_filters_table_background_color', '#009ce0' );
		update_option( 'ndf_filters_table_category_title_font_size', '18px' );
		update_option( 'ndf_filters_table_category_title_fontcolor', '#ffffff' );
		update_option( 'ndf_filters_table_font_size', '14px' );
		update_option( 'ndf_filters_table_font_color', '#ffffff' );
		update_option( 'ndf_filters_table_border_color', '#ffffff' );
		update_option( 'ndf_filters_table_border_radius', 10 );
		update_option( 'ndf_filters_table_border_width', 1 );

		update_option( 'ndf_category_1_filter_show', 1 );
		update_option( 'ndf_category_1_filter_accent_color', '#183899' );
		update_option( 'ndf_category_1_filter_override', 0 );
		update_option( 'ndf_category_1_filter_label_font_size', '14px' );
		update_option( 'ndf_category_1_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_1_filter_font_size', '14px' );
		update_option( 'ndf_category_1_filter_font_color', '#000000' );
		update_option( 'ndf_category_1_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_2_filter_show', 1 );
		update_option( 'ndf_category_2_filter_accent_color', '#3fc160' );
		update_option( 'ndf_category_2_filter_override', 0 );
		update_option( 'ndf_category_2_filter_label_font_size', '14px' );
		update_option( 'ndf_category_2_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_2_filter_font_size', '14px' );
		update_option( 'ndf_category_2_filter_font_color', '#000000' );
		update_option( 'ndf_category_2_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_3_filter_show', 1 );
		update_option( 'ndf_category_3_filter_accent_color', '#d32121' );
		update_option( 'ndf_category_3_filter_override', 0 );
		update_option( 'ndf_category_3_filter_label_font_size', '14px' );
		update_option( 'ndf_category_3_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_3_filter_font_size', '14px' );
		update_option( 'ndf_category_3_filter_font_color', '#000000' );
		update_option( 'ndf_category_3_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_4_filter_show', 1 );
		update_option( 'ndf_category_4_filter_accent_color', '#ef8923' );
		update_option( 'ndf_category_4_filter_override', 0 );
		update_option( 'ndf_category_4_filter_label_font_size', '14px' );
		update_option( 'ndf_category_4_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_4_filter_font_size', '14px' );
		update_option( 'ndf_category_4_filter_font_color', '#000000' );
		update_option( 'ndf_category_4_filter_background_color', '#ffffff' );

		update_option( 'ndf_category_5_filter_show', 1 );
		update_option( 'ndf_category_5_filter_accent_color', '#eeee22' );
		update_option( 'ndf_category_5_filter_override', 0 );
		update_option( 'ndf_category_5_filter_label_font_size', '14px' );
		update_option( 'ndf_category_5_filter_label_fontcolor', '#ffffff' );
		update_option( 'ndf_category_5_filter_font_size', '14px' );
		update_option( 'ndf_category_5_filter_font_color', '#000000' );
		update_option( 'ndf_category_5_filter_background_color', '#ffffff' );

		update_option( 'ndf_keyword_search_font_size', '14px' );
		update_option( 'ndf_keyword_search_lineheight', '1.6' );
		update_option( 'ndf_keyword_search_fontcolor', '#ffffff' );
		update_option( 'ndf_keyword_search_hover_fontcolor', '#ffffff' );
		update_option( 'ndf_keyword_search_background_color', '#009ce0' );
		update_option( 'ndf_keyword_search_hover_background_color', '#0c4b84' );
		update_option( 'ndf_keyword_search_border_radius', 6 );
		update_option( 'ndf_keyword_search_padding_top', 5 );
		update_option( 'ndf_keyword_search_padding_bottom', 5 );
		update_option( 'ndf_keyword_search_padding_left', 15 );
		update_option( 'ndf_keyword_search_padding_right', 15 );

		update_option( 'ndf_reset_button_font_size', '14px' );
		update_option( 'ndf_reset_button_lineheight', '1.6' );
		update_option( 'ndf_reset_button_fontcolor', '#ffffff' );
		update_option( 'ndf_reset_button_hover_fontcolor', '#ffffff' );
		update_option( 'ndf_reset_button_border_color', '#009ce0' );
		update_option( 'ndf_reset_button_background_color', '#009ce0' );
		update_option( 'ndf_reset_button_hover_background_color', '#0c4b84' );
		update_option( 'ndf_reset_button_border_width', 1 );
		update_option( 'ndf_reset_button_border_radius', 6 );
		update_option( 'ndf_reset_button_padding_top', 5 );
		update_option( 'ndf_reset_button_padding_bottom', 5 );
		update_option( 'ndf_reset_button_padding_left', 15 );
		update_option( 'ndf_reset_button_padding_right', 15 );
	}
}
?>
<h2>Table Visual Presets</h2>
<p>Select from the presets below to implement theme in the filters table.</p>
<div class="ndf_grid_row">
	<div class="ndf_grid_col_1_3">
	<img src="<?php echo NDF_BASE_URL . '/admin/assets/images'; ?>/presets-filter-table-screens-1.jpg" alt="">
		<form class="preset-btn" action="" method="post">
			<input type="hidden" name="ndf_preset" value="1">
			<input type="submit" name="ndf_save_preset" value="Set Preset 1">
		</form>
	</div>
	<div class="ndf_grid_col_1_3">
	<img src="<?php echo NDF_BASE_URL . '/admin/assets/images'; ?>/presets-filter-table-screens-2.jpg" alt="">
		<form class="preset-btn" action="" method="post">
			<input type="hidden" name="ndf_preset" value="2">
			<input type="submit" name="ndf_save_preset" value="Set Preset 2">
		</form>
	</div>
	<div class="ndf_grid_col_1_3">
	<img src="<?php echo NDF_BASE_URL . '/admin/assets/images'; ?>/presets-filter-table-screens-3.jpg" alt="">
		<form class="preset-btn" action="" method="post">
			<input type="hidden" name="ndf_preset" value="3">
			<input type="submit" name="ndf_save_preset" value="Set Preset 3">
		</form>
	</div>
</div>
