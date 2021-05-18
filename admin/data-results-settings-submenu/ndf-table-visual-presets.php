<?php
/**
 * Data Results Section `Table Visual Presets` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/data-results-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 * 
 */

if( isset( $_POST['ndf_save_preset'] ) ){
	$ndf_preset = $_POST['ndf_preset'];

	if( $ndf_preset == 2 ){
		update_option('ndf_data_results_heading_show', 1 );
		update_option('ndf_data_results_heading_style', 'h2' );
		update_option('ndf_data_results_heading_label_fontcolor', '#000000' );
		update_option('ndf_data_results_heading_description_font_size', '14px' );
		update_option('ndf_data_results_heading_description_font_color', '#000000' );

		update_option( 'ndf_data_results_table_header_background_color', '#00b5b5' );
		update_option( 'ndf_data_results_category_font_size', '18px' );
		update_option( 'ndf_data_results_category_fontcolor', '#ffffff' );
		update_option( 'ndf_data_results_table_title_cell_background_color', '#ffffff' );
		update_option( 'ndf_data_results_table_title_cell_font_color', '#4c4c4c' );
		update_option( 'ndf_data_results_table_background_color', '#d4d4d4' );
		update_option( 'ndf_data_results_table_font_size', '14px' );
		update_option( 'ndf_data_results_table_font_color', '#3e4651' );
		update_option( 'ndf_data_results_table_border_color', '#bfbfbf' );
		update_option( 'ndf_data_results_table_border_width', 1 );
		update_option( 'ndf_data_results_table_border_radius', 10 );

		update_option( 'ndf_more_info_column_show', 1 );
		update_option( 'ndf_more_info_button_font_size', '14px' );
		update_option( 'ndf_more_info_button_fontcolor', '#ffffff' );
		update_option( 'ndf_more_info_button_background_color', '#f1654c' );
		update_option( 'ndf_more_info_button_hover_background_color', '#e0573e' );
		update_option( 'ndf_more_info_button_border_color', '#e0573e' );
		update_option( 'ndf_more_info_button_border_width', 1 );
		update_option( 'ndf_more_info_button_border_radius', 3 );
		update_option( 'ndf_more_info_button_padding_top', 5 );
		update_option( 'ndf_more_info_button_padding_bottom', 5 );
		update_option( 'ndf_more_info_button_padding_left', 15 );
		update_option( 'ndf_more_info_button_padding_right', 15 );

		update_option( 'ndf_star_rating_color', '#3E4661' );
		update_option( 'ndf_star_rating_size', '' );
		update_option( 'ndf_star_rating_margin_top', 5 );
		update_option( 'ndf_star_rating_margin_bottom', 5 );

		update_option( 'ndf_load_more_button_font_size', '18px' );
		update_option( 'ndf_load_more_button_fontcolor', '#161616' );
		update_option( 'ndf_load_more_button_background_color', '#d3d3d3' );
		update_option( 'ndf_load_more_button_hover_background_color', '#C1C1C1' );
		update_option( 'ndf_load_more_button_border_color', '#161616' );
		update_option( 'ndf_load_more_button_border_width', 1 );
		update_option( 'ndf_load_more_button_border_radius', 0 );
		update_option( 'ndf_load_more_button_padding_top', 10 );
		update_option( 'ndf_load_more_button_padding_bottom', 10 );
		update_option( 'ndf_load_more_button_padding_left', 40 );
		update_option( 'ndf_load_more_button_padding_right', 40 );

		update_option( 'ndf_tooltip_icon_color', '#444444' );
		update_option( 'ndf_tooltip_icon_background_color', '#EEEEEE' );
		update_option( 'ndf_tooltip_background_color', '#FFFFFF' );
		update_option( 'ndf_tooltip_border_color', '#161616' );
		update_option( 'ndf_tooltip_border_radius', 0 );
		update_option( 'ndf_tooltip_font_size', '14px' );
		update_option( 'ndf_tooltip_font_color', '#161616' );

		update_option( 'ndf_more_info_fields_table_header_background_color', '#0FB8B5' );
		update_option( 'ndf_more_info_fields_table_background_color', '#D4D4D4' );
		update_option( 'ndf_more_info_fields_header_fontcolor', '#fff' );
		update_option( 'ndf_more_info_fields_table_font_color', '#000' );
		
		update_option( 'ndf_more_info_fields_modal_background_color', '#D4D4D4' );
	}
	else if( $ndf_preset == 3 ){
		update_option('ndf_data_results_heading_show', 1 );
		update_option('ndf_data_results_heading_style', 'h2' );
		update_option('ndf_data_results_heading_label_fontcolor', '#224B84' );
		update_option('ndf_data_results_heading_description_font_size', '14px' );
		update_option('ndf_data_results_heading_description_font_color', '#000000' );

		update_option( 'ndf_data_results_table_header_background_color', '#a64e88' );
		update_option( 'ndf_data_results_category_font_size', '16px' );
		update_option( 'ndf_data_results_category_fontcolor', '#ffffff' );
		update_option( 'ndf_data_results_table_title_cell_background_color', '#FFFFFF' );
		update_option( 'ndf_data_results_table_title_cell_font_color', '#4c4c4c' );
		update_option( 'ndf_data_results_table_background_color', '#ec6667' );
		update_option( 'ndf_data_results_table_font_size', '14px' );
		update_option( 'ndf_data_results_table_font_color', '#ffffff' );
		update_option( 'ndf_data_results_table_border_color', '#d6d6d6' );
		update_option( 'ndf_data_results_table_border_width', 1 );
		update_option( 'ndf_data_results_table_border_radius', 10 );

		update_option( 'ndf_more_info_column_show', 1 );
		update_option( 'ndf_more_info_button_font_size', '14px' );
		update_option( 'ndf_more_info_button_fontcolor', '#ffffff' );
		update_option( 'ndf_more_info_button_background_color', '#36d6be' );
		update_option( 'ndf_more_info_button_hover_background_color', '#2fbfa7' );
		update_option( 'ndf_more_info_button_border_color', '#2fbfa7' );
		update_option( 'ndf_more_info_button_border_width', 1 );
		update_option( 'ndf_more_info_button_border_radius', 3 );
		update_option( 'ndf_more_info_button_padding_top', 5 );
		update_option( 'ndf_more_info_button_padding_bottom', 5 );
		update_option( 'ndf_more_info_button_padding_left', 15 );
		update_option( 'ndf_more_info_button_padding_right', 15 );

		update_option( 'ndf_star_rating_color', '#f9f922' );
		update_option( 'ndf_star_rating_size', '' );
		update_option( 'ndf_star_rating_margin_top', 5 );
		update_option( 'ndf_star_rating_margin_bottom', 5 );

		update_option( 'ndf_load_more_button_font_size', '18px' );
		update_option( 'ndf_load_more_button_fontcolor', '#161616' );
		update_option( 'ndf_load_more_button_background_color', '#d3d3d3' );
		update_option( 'ndf_load_more_button_hover_background_color', '#C1C1C1' );
		update_option( 'ndf_load_more_button_border_color', '#161616' );
		update_option( 'ndf_load_more_button_border_width', 1 );
		update_option( 'ndf_load_more_button_border_radius', 0 );
		update_option( 'ndf_load_more_button_padding_top', 10 );
		update_option( 'ndf_load_more_button_padding_bottom', 10 );
		update_option( 'ndf_load_more_button_padding_left', 40 );
		update_option( 'ndf_load_more_button_padding_right', 40 );

		update_option( 'ndf_tooltip_icon_color', '#444444' );
		update_option( 'ndf_tooltip_icon_background_color', '#EEEEEE' );
		update_option( 'ndf_tooltip_background_color', '#FFFFFF' );
		update_option( 'ndf_tooltip_border_color', '#161616' );
		update_option( 'ndf_tooltip_border_radius', 0 );
		update_option( 'ndf_tooltip_font_size', '14px' );
		update_option( 'ndf_tooltip_font_color', '#161616' );

		update_option( 'ndf_more_info_fields_table_header_background_color', '#A64E88' );
		update_option( 'ndf_more_info_fields_table_background_color', '#efefef' );
		update_option( 'ndf_more_info_fields_header_fontcolor', '#fff' );
		update_option( 'ndf_more_info_fields_table_font_color', '#000' );
		
		update_option( 'ndf_more_info_fields_modal_background_color', '#efefef' );
	}
	else{
		update_option('ndf_data_results_heading_show', 1 );
		update_option('ndf_data_results_heading_style', 'h2' );
		update_option('ndf_data_results_heading_label_fontcolor', '#224B84' );
		update_option('ndf_data_results_heading_description_font_size', '14px' );
		update_option('ndf_data_results_heading_description_font_color', '#000000' );

		update_option( 'ndf_data_results_table_header_background_color', '#204095' );
		update_option( 'ndf_data_results_category_font_size', '16px' );
		update_option( 'ndf_data_results_category_fontcolor', '#ffffff' );
		update_option( 'ndf_data_results_table_title_cell_background_color', '#ffffff' );
		update_option( 'ndf_data_results_table_title_cell_font_color', '#4c4c4c' );
		update_option( 'ndf_data_results_table_background_color', '#009de0' );
		update_option( 'ndf_data_results_table_font_size', '14px' );
		update_option( 'ndf_data_results_table_font_color', '#ffffff' );
		update_option( 'ndf_data_results_table_border_color', '#d6d6d6' );
		update_option( 'ndf_data_results_table_border_width', 1 );
		update_option( 'ndf_data_results_table_border_radius', 10 );

		update_option( 'ndf_more_info_column_show', 1 );
		update_option( 'ndf_more_info_button_font_size', '14px' );
		update_option( 'ndf_more_info_button_fontcolor', '#ffffff' );
		update_option( 'ndf_more_info_button_background_color', '#267ba5' );
		update_option( 'ndf_more_info_button_hover_background_color', '#33ace0' );
		update_option( 'ndf_more_info_button_border_color', '#267ba5' );
		update_option( 'ndf_more_info_button_border_width', 1 );
		update_option( 'ndf_more_info_button_border_radius', 3 );
		update_option( 'ndf_more_info_button_padding_top', 5 );
		update_option( 'ndf_more_info_button_padding_bottom', 5 );
		update_option( 'ndf_more_info_button_padding_left', 15 );
		update_option( 'ndf_more_info_button_padding_right', 15 );

		update_option( 'ndf_star_rating_color', '#f9f922' );
		update_option( 'ndf_star_rating_size', '' );
		update_option( 'ndf_star_rating_margin_top', 5 );
		update_option( 'ndf_star_rating_margin_bottom', 5 );

		update_option( 'ndf_load_more_button_font_size', '18px' );
		update_option( 'ndf_load_more_button_fontcolor', '#161616' );
		update_option( 'ndf_load_more_button_background_color', '#d3d3d3' );
		update_option( 'ndf_load_more_button_hover_background_color', '#C1C1C1' );
		update_option( 'ndf_load_more_button_border_color', '#161616' );
		update_option( 'ndf_load_more_button_border_width', 1 );
		update_option( 'ndf_load_more_button_border_radius', 0 );
		update_option( 'ndf_load_more_button_padding_top', 10 );
		update_option( 'ndf_load_more_button_padding_bottom', 10 );
		update_option( 'ndf_load_more_button_padding_left', 40 );
		update_option( 'ndf_load_more_button_padding_right', 40 );

		update_option( 'ndf_tooltip_icon_color', '#444444' );
		update_option( 'ndf_tooltip_icon_background_color', '#EEEEEE' );
		update_option( 'ndf_tooltip_background_color', '#FFFFFF' );
		update_option( 'ndf_tooltip_border_color', '#161616' );
		update_option( 'ndf_tooltip_border_radius', 0 );
		update_option( 'ndf_tooltip_font_size', '14px' );
		update_option( 'ndf_tooltip_font_color', '#161616' );

		update_option( 'ndf_more_info_fields_table_header_background_color', '#204095' );
		update_option( 'ndf_more_info_fields_table_background_color', '#ffffff' );
		update_option( 'ndf_more_info_fields_header_fontcolor', '#fff' );
		update_option( 'ndf_more_info_fields_table_font_color', '#000' );
		
		update_option( 'ndf_more_info_fields_modal_background_color', '#ffffff' );		
	}
}
?>
<h2>Table Visual Presets</h2>
<p>Select from the presets below to implement theme in the results table.</p>
<div class="ndf_grid_row">
	<div class="ndf_grid_col_1_3">
		<img src="<?php echo NDF_BASE_URL . '/admin/assets/images'; ?>/presets-results-table-screens-1.jpg" alt="">
		<form class="preset-btn"  action="" method="post">
			<input type="hidden" name="ndf_preset" value="1">
			<input type="submit" name="ndf_save_preset" value="Set Preset 1">
		</form>
	</div>
	<div class="ndf_grid_col_1_3">
		<img src="<?php echo NDF_BASE_URL . '/admin/assets/images'; ?>/presets-results-table-screens-2.jpg" alt="">
		<form class="preset-btn"  action="" method="post">
			<input type="hidden" name="ndf_preset" value="2">
			<input type="submit" name="ndf_save_preset" value="Set Preset 2">
		</form>
	</div>
	<div class="ndf_grid_col_1_3">
		<img src="<?php echo NDF_BASE_URL . '/admin/assets/images'; ?>/presets-results-table-screens-3.jpg" alt="">
		<form class="preset-btn" action="" method="post">
			<input type="hidden" name="ndf_preset" value="3">
			<input type="submit" name="ndf_save_preset" value="Set Preset 3">
		</form>
	</div>
</div>
