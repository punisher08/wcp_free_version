<?php
/**
 * Media Query styles
 * 
 * @package     Wordpress_Comparison_Plugin
 * @subpackage  Wordpress_Comparison_Plugin/assets/css
 * @since       1.0.1.0
 * @author      Netseek Pty Ltd
 */

echo '<style type="text/css">
@media all and (max-width: 768px) {
	.form-box-single{
		width:80% !important;
	}
	.form-box{
		width:80% !important;
	}
	.ndf_more_info_summary ul.frxp-list ul{
		display:grid !important;
	}
	.field-group-title{
		margin-top:0px !important;
	}
	.group-frxp{
		display:initial !important;
	}
	.group-frxp > .frxp-grid{
		width:100% !important;
	}
	.ndf_more_info_field_groups{
		padding:20px !important;
	}
	.col-one-half{
		width: -webkit-fill-available !important;
	}
	.cat-rows{
		display:initial !important;
	}
	.ndf_data_sections{
		display:initial !important;
	}
	.ndf_data_sections li{
		padding-bottom:10px;
	}
	.ndf_more_info_summary{
		padding:20px !important;
	}
	.ndf_table_cell, #ndf_filtered_data_content .ndf_table_cell p, #ndf_filtered_data_content .ndf_table_cell li, #ndf_filtered_data_content .ndf_data_title_cell, #ndf_filtered_data_content a.ndf_more_info_link, #ndf_filtered_data_content .label_wrapper, #ndf_plugin_html a.ndf_button_style_1, #ndf_plugin_html a.ndf_button_style_2, #ndf_plugin_html a.ndf_button_style_3, #ndf_plugin_html a.ndf_button_style_4, #ndf_plugin_html a.ndf_button_style_5{
	}
	a.ndf_more_info_link{
		padding: 2px;
	}
	#ndf_plugin_html a.ndf_button_style_1, #ndf_plugin_html a.ndf_button_style_2, #ndf_plugin_html a.ndf_button_style_3, #ndf_plugin_html a.ndf_button_style_4, #ndf_plugin_html a.ndf_button_style_5 {
		padding: 4px;
	}
	.ndf_filter_container .frxp-list li label {
	    padding-left: 30px;
	}
	.ndf_filters_wrapper .ndf_filter_container p{
	}
	.ndf_filters_wrapper .ndf_filter_container p.ndf_filters_show_more{
	    line-height: 1.3em;
	}
	.ndf_filter_container{
		border-bottom: none;
	}
	.tabular .ndf_table_cell, 
	.tablesaw-cell-persist,
	#ndf_filtered_data_content .ndf_table_header{
		min-width: 100px !important;
	}
}
@media all and (max-width:  667px) {
	.tabular .ndf_table_cell, 
	.tablesaw-cell-persist,
	#ndf_filtered_data_content .ndf_table_header{
		min-width: 150px !important;
	}
}
@media all and (max-width: 376px) {
	.ndf_filter_container .frxp-list li label {
	    line-height: 1.3em;
	    padding-left: 30px;
	}
	.ndf_filters_wrapper .ndf_filter_container p{
	}
	.ndf_filters_wrapper .ndf_filter_container p.ndf_filters_show_more{
	    line-height: 1.3em;
	}
	.tabular .ndf_table_cell, 
	.tablesaw-cell-persist,
	#ndf_filtered_data_content .ndf_table_header{
		min-width: 110px !important;
	}
}
@media all and (max-width: 321px) {
	.ndf_filter_container .frxp-list li label {
	    line-height: 1.3em;
	    padding-left: 30px;
	}
	.ndf_filters_wrapper .ndf_filter_container p{
	}
	.ndf_filters_wrapper .ndf_filter_container p.ndf_filters_show_more{
	    line-height: 1.3em;
	}
}
	</style>';
?>