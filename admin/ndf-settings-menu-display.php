<?php
/**
 * Displays information on how to use the plugin with shortcode
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
?>
<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<p>Use the shortcode below to show the data filtering table on your posts/pages.</p>
	<?php
	global $wpdb;

	$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';

	$output = '';
	$output .= '<div class="ndf-code-block">
				<p><strong>Shortcode:</strong>
				<input style="width: 400px" rows="1" class="ndf_shortcode" id="ndf-shortcode" data-clipboard-target="ndf-shortcode" value="[wp_comparison]">
				<span class="ndf-icon dashicons dashicons-clipboard" data-clipboard-target="ndf-shortcode"></span><span class="ndf-icon" data-clipboard-target="ndf-shortcode"> Copy</span>
				<input type="button" class="alignright button button-secondary ndf_shortcode_clear_filter" value="Clear Selection">
				</p>
				</div>';
				
	$get_cat_1_label = get_option( 'ndf_category_1_filter_label', 'Category 1' );
	$get_cat_2_label = get_option( 'ndf_category_2_filter_label', 'Category 2' );
	$get_cat_3_label = get_option( 'ndf_category_3_filter_label', 'Category 3' );
	$get_cat_4_label = get_option( 'ndf_category_4_filter_label', 'Category 4' );
	$get_cat_5_label = get_option( 'ndf_category_5_filter_label', 'Category 5' );
	
	/* Filters Section */
	$get_cat_1_terms = get_terms( array( 'taxonomy' => 'ndf_category_1', 'hide_empty' => false ) );
	$get_cat_2_terms = get_terms( array( 'taxonomy' => 'ndf_category_2', 'hide_empty' => false ) );
	$get_cat_3_terms = get_terms( array( 'taxonomy' => 'ndf_category_3', 'hide_empty' => false ) );
	$get_cat_4_terms = get_terms( array( 'taxonomy' => 'ndf_category_4', 'hide_empty' => false ) );
	$get_cat_5_terms = get_terms( array( 'taxonomy' => 'ndf_category_5', 'hide_empty' => false ) );
	
	/* Hide/Show Category Headers and Cell | Check if taxonomy has terms */
	$show_cat_1 = ( ! empty( $get_cat_1_terms ) && ! is_wp_error( $get_cat_1_terms ) ) ? true : false;
	$show_cat_2 = ( ! empty( $get_cat_2_terms ) && ! is_wp_error( $get_cat_2_terms ) ) ? true : false;
	$show_cat_3 = ( ! empty( $get_cat_3_terms ) && ! is_wp_error( $get_cat_3_terms ) ) ? true : false;
	$show_cat_4 = ( ! empty( $get_cat_4_terms ) && ! is_wp_error( $get_cat_4_terms ) ) ? true : false;
	$show_cat_5 = ( ! empty( $get_cat_5_terms ) && ! is_wp_error( $get_cat_5_terms ) ) ? true : false;
	
	$output .= "<div class='ndf_filter_container ndf_more_info_filter_container' id=''>";
		$output .= "<div class='ndf_more_info_fields_filters'>";
			$output .= "<hr class='ndf_filter_top_accent'>";
			$output .= "<p class='ndf_category_label'>";
			$output .= "More Info Fields Filter";
			$output .= "</p>";
			$output .= "<hr class='ndf_filter_accent'>";
			$field_rows = $wpdb->get_results( "SELECT ID, label, field_type, field_values FROM $ndf_data_filtering_saved_fields WHERE $ndf_data_filtering_saved_fields.field_type = 'simple_text_field' OR $ndf_data_filtering_saved_fields.field_type = 'dropdown' OR $ndf_data_filtering_saved_fields.field_type = 'radio_button' OR $ndf_data_filtering_saved_fields.field_type = 'checkbox' ORDER BY field_order ASC", ARRAY_A );

			if( !empty( $field_rows ) ){
				$output .= "<ul class='frxp-list'>";
				foreach($field_rows as $value){
					$field_ID = $value['ID'];
					$field_label = $value['label'];
					$field_type = $value['field_type'];
					$field_values = unserialize( $value['field_values'] );

					$output .= '<li class="ndf_filter_container"><input type="checkbox" class="ndf_fields_'.$field_ID.'" id="ndf_fields_'.$field_ID.'" data-ndf-moreinfo-filter="ndf_fields_'.$field_ID.'"> <label for="ndf_fields_'.$field_ID.'">'.$field_label.'</label>';

					if( $field_type == 'simple_text_field' ){
						$output .= '<p><input type="text" class="ndf_shortcode_moreinfo ndf_fields_text" id="options_ndf_fields_'.$field_ID.'"></p>';
					}
					else{
						if( is_array( $field_values ) ){
							$field_label = unserialize( $field_values['label'] );
							$field_value = unserialize( $field_values['value'] );
							if( is_array( $field_label ) ){
								$output .= '<p><select class="ndf_shortcode_moreinfo" id="options_ndf_fields_'.$field_ID.'">';
								foreach( $field_label as $field_key => $v ){
									if( empty( $field_value[$field_key] ) ){
										$output .= '<option>'.$v.'</option>';
									}
									else{
										$output .= '<option value="'.$field_value[$field_key].'">'.$v.'</option>';
									}
								}
								$output .= '</select></p>';
							}
						}
					}
					$output .= '</li>';

				}
				$output .= "</ul>";
			}
			$output .= "</div>";
	$output .= "</div>";

	$output .= '<div style="clear:both;"></div>';

	$output .= "<div class='ndf_filter_container' id='ndf_shortcode_parameter'>";
		$output .= "<div class='ndf_shortcode_parameter'>";
			$output .= "<hr class='ndf_filter_top_accent'>";
			$output .= "<p class='ndf_category_label'>";
			$output .= "Other Options";
			$output .= "</p>";
			$output .= "<hr class='ndf_filter_top_accent'>";
			$output .= "<ul class='frxp-list'>";
			$output .= '<li><label class="ndf-shortcode-label">Initial</label><input type="number" min="0" class="small-text ndf_shortcode_initial" value="0"> <span class="dashicons dashicons-info ndf_shortcode_initial_tooltip"></span></li>';
			$output .= '<li><label class="ndf-shortcode-label">Step</label><input type="number" min="0" class="small-text ndf_shortcode_step" value="0"> <span class="dashicons dashicons-info ndf_shortcode_step_tooltip"></span></li>';
			$output .= '<li><input type="checkbox" class="ndf_shortcode_count" id="ndf_shortcode_count"> <label for="ndf_shortcode_count">Display Total Count</label></li>';
			$output .= "</ul>";
		$output .= "</div>";
	$output .= "</div>";
	
	/* Show Category 1 Filter Column */
	if( $show_cat_1 ){
		$output .= "<div class='ndf_filter_container' id='ndf_filter_cat_1'>";
			$output .= "<div class='cat_1_filter_contents'>";
				$output .= "<hr class='ndf_filter_top_accent'>";
				$output .= "<p class='ndf_category_label'>";
				$output .= $get_cat_1_label;
				$output .= "</p>";
				$output .= "<hr class='ndf_filter_accent'>";
				$output .= ndf_show_filters_hierarchy( 'ndf_category_1' )[1];
			$output .= "</div>";
		$output .= "</div>";
	}
	
	/* Show Category 2 Filter Column */
	if( $show_cat_2 ){
		$output .= "<div class='ndf_filter_container' id='ndf_filter_cat_2'>";
			$output .= "<div class='cat_2_filter_contents'>";
				$output .= "<hr class='ndf_filter_top_accent'>";
				$output .= "<p class='ndf_category_label'>";
				$output .= $get_cat_2_label;
				$output .= "</p>";
				$output .= "<hr class='ndf_filter_accent'>";
				$output .= ndf_show_filters_hierarchy( 'ndf_category_2' )[1];
			$output .= "</div>";
		$output .= "</div>";
	}
	
	/* Show Category 3 Filter Column */
	if( $show_cat_3 ){
		$output .= "<div class='ndf_filter_container' id='ndf_filter_cat_3'>";
			$output .= "<div class='cat_3_filter_contents'>";
				$output .= "<hr class='ndf_filter_top_accent'>";
				$output .= "<p class='ndf_category_label'>";
				$output .= $get_cat_3_label;
				$output .= "</p>";
				$output .= "<hr class='ndf_filter_accent'>";
				$output .= ndf_show_filters_hierarchy( 'ndf_category_3' )[1];
			$output .= "</div>";
		$output .= "</div>";
	}
	
	/* Show Category 4 Filter Column */
	if( $show_cat_4 ){
		$output .= "<div class='ndf_filter_container' id='ndf_filter_cat_4'>";
			$output .= "<div class='cat_4_filter_contents'>";
				$output .= "<hr class='ndf_filter_top_accent'>";
				$output .= "<p class='ndf_category_label'>";
				$output .= $get_cat_4_label;
				$output .= "</p>";
				$output .= "<hr class='ndf_filter_accent'>";
				$output .= ndf_show_filters_hierarchy( 'ndf_category_4' )[1];
			$output .= "</div>";
		$output .= "</div>";
	}
	
	/* Show Category 5 Filter Column */
	if( $show_cat_5 ){
		$output .= "<div class='ndf_filter_container' id='ndf_filter_cat_5'>";
			$output .= "<div class='cat_5_filter_contents'>";
				$output .= "<hr class='ndf_filter_top_accent'>";
				$output .= "<p class='ndf_category_label'>";
				$output .= $get_cat_5_label;
				$output .= "</p>";
				$output .= "<hr class='ndf_filter_accent'>";
				$output .= ndf_show_filters_hierarchy( 'ndf_category_5' )[1];
			$output .= "</div>";
		$output .= "</div>";
	}	
	
	$output .= '<div class="clearfix"></div>';
	echo $output;
	?>
</div>