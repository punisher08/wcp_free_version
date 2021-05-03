<?php
/**
 * Shortcode Registration Scripts
 * 
 * Registered Shortcode:
 * - `ndf_data_filter` - Displays the filters and data table.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes/shortcodes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

function ndf_data_filter_shortcode( $atts ) {
	global $wpdb;
	$output = '';

	$ndf_order_by = get_option( 'ndf_query_results_order_by', 'date' );
	$ndf_order = get_option( 'ndf_query_results_order', 'DESC' );
	$ndf_query_results_limit = get_option( 'ndf_query_results_limit', 5 );
	$ndf_query_results_step = get_option( 'ndf_query_results_step', 5 );
	$load_limit = $ndf_query_results_limit;
	$show_category_column_count = 0;
	$show_category_column = false;
	$ndf_hide_filters = false;
	$category_1_param = '';
	$category_2_param = '';
	$category_3_param = '';
	$category_4_param = '';
	$category_5_param = '';
	$ndf_table_filtered = '';

	$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
	$shortcode_atts = array(
		'category-1' => '', // Category 1 filters
		'category-2' => '', // Category 2 filters
		'category-3' => '', // Category 3 filters
		'category-4' => '', // Category 4 filters
		'category-5' => '', // Category 5 filters
		'step' => '', // Load more step
		'initial' => '', // Number of initial results
		'total-count' => 'false', // Display total results count
	);

	$field_rows = $wpdb->get_results( "SELECT ID, label, field_type FROM $ndf_data_filtering_saved_fields WHERE $ndf_data_filtering_saved_fields.field_type = 'simple_text_field' OR $ndf_data_filtering_saved_fields.field_type = 'dropdown' OR $ndf_data_filtering_saved_fields.field_type = 'radio_button' OR $ndf_data_filtering_saved_fields.field_type = 'checkbox' ORDER BY field_order ASC", ARRAY_A );

	if( !empty( $field_rows ) ){
		foreach($field_rows as $value){
			$field_ID = 'ndf_fields_'.$value['ID'];
			$shortcode_atts[$field_ID] = '';
		}
	}
	
	$attributes = shortcode_atts( $shortcode_atts, $atts );

	$additional_field_filters = array();
	$additional_field_filters_temp = $attributes;
	unset($additional_field_filters_temp['category-1']);
	unset($additional_field_filters_temp['category-2']);
	unset($additional_field_filters_temp['category-3']);
	unset($additional_field_filters_temp['category-4']);
	unset($additional_field_filters_temp['category-5']);
	unset($additional_field_filters_temp['step']);
	unset($additional_field_filters_temp['initial']);
	unset($additional_field_filters_temp['total-count']);

	foreach( $additional_field_filters_temp as $key => $value ){
		if( !empty( $value ) ){
			$additional_field_filters[$key] = $value;
		}
	}

	if( !empty( $attributes['initial'] ) ){
		$load_limit = $attributes['initial'];
	}
	if( !empty( $attributes['step'] ) ){
		$ndf_query_results_step = $attributes['step'];
	}
	
	if ( wcp_fs()->is_free_plan() || wcp_fs()->is_not_paying() ) {
		$load_limit = ( $load_limit >= 10 ) ? 10 : $load_limit;
	}

	$get_cat_1_label = get_option( 'ndf_category_1_filter_label', 'Category 1' );
	$get_cat_2_label = get_option( 'ndf_category_2_filter_label', 'Category 2' );
	$get_cat_3_label = get_option( 'ndf_category_3_filter_label', 'Category 3' );
	$get_cat_4_label = get_option( 'ndf_category_4_filter_label', 'Category 4' );
	$get_cat_5_label = get_option( 'ndf_category_5_filter_label', 'Category 5' );

	$tax_hierarchy_1 = get_taxonomy_hierarchy('ndf_category_1');
	$tax_hierarchy_2 = get_taxonomy_hierarchy('ndf_category_2');
	$tax_hierarchy_3 = get_taxonomy_hierarchy('ndf_category_3');
	$tax_hierarchy_4 = get_taxonomy_hierarchy('ndf_category_4');
	$tax_hierarchy_5 = get_taxonomy_hierarchy('ndf_category_5');

	/* Handle URL parameters */
	$URL_param_values = array();
	$use_url_value_1 = 'no';
	$use_url_value_2 = 'no';
	$use_url_value_3 = 'no';
	$use_url_value_4 = 'no';
	$use_url_value_5 = 'no';
	$valid_url_params = array( sanitize_title_with_dashes( $get_cat_1_label ) => '1', sanitize_title_with_dashes( $get_cat_2_label ) => '2', sanitize_title_with_dashes( $get_cat_3_label ) => '3', sanitize_title_with_dashes( $get_cat_4_label ) => '4', sanitize_title_with_dashes( $get_cat_5_label ) => '5' );
	
	if( isset( $_GET ) ){
		foreach( $_GET as $URL_key => $URL_value ){
			if( !empty( $URL_value ) ){
				if( array_key_exists( $URL_key, $valid_url_params ) ){
					$URL_value = urldecode($URL_value);
					$URL_value = explode(',', $URL_value);
					$category_id = $valid_url_params[$URL_key];
					$URL_param_values[$category_id] = $URL_value;
					${"use_url_value_$category_id"} = 'yes';
					$attributes["category-$category_id"] = $URL_value;
					$ndf_hide_filters = true;
					$ndf_table_filtered = " data-ndf-table-filtered='true' ";
				}
			}
		}
	}
	/* EO Handle URL parameters */

	$ndf_args = array( 'post_type' => array( 'ndf_data' ), 'post_status' => array( 'publish' ), 'posts_per_page' => $load_limit, 'orderby' => array( 'ndf_data_settings_featured_data_' => 'DESC', 'ndf_sort_order_clause' => 'ASC', $ndf_order_by => $ndf_order, ), 'meta_key' => 'ndf_data_settings_featured_data_' );
	$ndf_args['meta_query'][] = array( 'ndf_sort_order_clause' => array( 'key' => 'ndf_data_settings_sort_order' ));

	if( $ndf_order_by == 'ratings' && ( class_exists( 'MR_Rating_Form' ) || class_exists( 'MRP_Rating_form' ) ) ){
		/* Order Rating Rank DESC, Title ASC*/
		$ndf_args = array( 'post_type' => array( 'ndf_data' ), 'post_status' => array( 'publish' ), 'posts_per_page' => $load_limit, 'orderby' => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ), 'meta_key' => 'ndf_data_mr_ratingrank' );
	}

	if( !empty( $attributes['category-1'] ) || !empty( $attributes['category-2'] ) || !empty( $attributes['category-3'] ) || !empty( $attributes['category-4'] ) || !empty( $attributes['category-5'] ) ){
		$ndf_query_results_filter_operator = get_option( 'ndf_query_results_filter_operator', 'AND' );

		$ndf_args['tax_query'] = array( 'relation' => "$ndf_query_results_filter_operator" );
		$ndf_hide_filters = true;
	}
	
	$category_array = array(1, 2, 3, 4, 5);
	foreach( $category_array as $number ){
		if( !empty( $attributes["category-$number"] ) || array_key_exists( "$number", $URL_param_values ) ){
			if( ${"use_url_value_$number"} == 'yes' ){
				${"category_{$number}_values"} = $URL_param_values["{$number}"];
				${"category_{$number}_values"} = $attributes["category-{$number}"];
				${"category_{$number}_values"} = ndf_remove_term_with_child( ${"category_{$number}_values"}, "ndf_category_{$number}" );
				${"category_{$number}_param"} = 'data-ndf-category-'.$number.'-param="'.implode(',', $attributes["category-{$number}"]).'"';
			}
			else{
				${"category_{$number}_values"} = explode( ',', $attributes["category-{$number}"] );
				${"category_{$number}_values"} = ndf_remove_term_with_child( ${"category_{$number}_values"}, "ndf_category_{$number}" );
				${"category_{$number}_param"} = 'data-ndf-category-'.$number.'-param="'.$attributes["category-{$number}"].'"';
			}
			$ndf_args['tax_query'][] = array(
				'taxonomy' => "ndf_category_{$number}",
				'terms' => ${"category_{$number}_values"},
				'field' => 'slug'
			);
		}
	}
	
	$ndf_args['meta_query'][] = array( 'relation' => 'AND' );
	$additional_fields_param_temp = '';
	$additional_fields_param = '';
	foreach( $additional_field_filters as $ndf_meta_key => $ndf_meta_value ){
		$ndf_args['meta_query'][] = array(
			'key' => "$ndf_meta_key",
			'value' => "$ndf_meta_value",
			'compare' => "="
		);

		$additional_fields_param_temp .= empty( $additional_fields_param_temp ) ? '"'.$ndf_meta_key.'":"'.$ndf_meta_value.'"' : ',"'.$ndf_meta_key.'":"'.$ndf_meta_value.'"';
	}

	if( !empty( $additional_fields_param_temp ) ){
		$additional_fields_param = " data-ndf-additional-fields-param='{".$additional_fields_param_temp."}'";
		$ndf_hide_filters = true;
	}
	
	//print_r( $ndf_args, false );
	$ndf_query = new WP_Query( $ndf_args );

	if( $ndf_query->have_posts() ) {
		/* Get total number of post returned by the query to add class to last row cells */
		$query_found_posts = $ndf_query->found_posts;
		
		if ( wcp_fs()->is_free_plan() || wcp_fs()->is_not_paying() ) {
			$query_found_posts = ( $query_found_posts >= 10 ) ? 10 : $query_found_posts;
		}
		
		$query_post_count = $ndf_query->post_count;
		$data_counter = 1;
		$last_data_row_class = '';

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

		/* Hide/Show Category Headers and Cell | Get from settings */
		if( $show_cat_1 ){
			$show_cat_1 = ( get_option('ndf_category_1_filter_show', 1) == '1' ) ? true : false;
		}
		if( $show_cat_2 ){
			$show_cat_2 = ( get_option('ndf_category_2_filter_show', 1) == '1' ) ? true : false;
		}
		if( $show_cat_3 ){
			$show_cat_3 = ( get_option('ndf_category_3_filter_show', 1) == '1' ) ? true : false;
		}
		if( $show_cat_4 ){
			$show_cat_4 = ( get_option('ndf_category_4_filter_show', 1) == '1' ) ? true : false;
		}
		if( $show_cat_5 ){
			$show_cat_5 = ( get_option('ndf_category_5_filter_show', 1) == '1' ) ? true : false;
		}
		
		/* Main Plugin Wrapper */
		$output .= "<div id='ndf_plugin_html'>";

		/* Determine number of categories */
		if( $show_cat_1 ){ $show_category_column_count++; }
		if( $show_cat_2 ){ $show_category_column_count++; }
		if( $show_cat_3 ){ $show_category_column_count++; }
		if( $show_cat_4 ){ $show_category_column_count++; }
		if( $show_cat_5 ){ $show_category_column_count++; }
		
		if ( $show_cat_1 || $show_cat_2 || $show_cat_3 || $show_cat_4 || $show_cat_5 ){
			$slider_output = '';
			$grid_output = '';
			$cat_1_filter_contents = '';
			$cat_2_filter_contents = '';
			$cat_3_filter_contents = '';
			$cat_4_filter_contents = '';
			$cat_5_filter_contents = '';
			
			/* Filter Column Wrapper Start */
			if( get_option('ndf_filters_heading_show', 1) ){
				$output .= "<div class='ndf_filters_heading'>";
				$output .= "<".get_option('ndf_filters_heading_style', 'h2')." class='ndf_filters_heading'>";
				$ndf_filters_heading_icon = get_option( 'ndf_filters_heading_icon', '' );
				if( !empty( $ndf_filters_heading_icon ) ){
					$output .= "<img src='". esc_url( get_option( 'ndf_filters_heading_icon', '' ) ) ."' alt='' class='frxp-vertical-align-middle'>";
				}
				$output .= get_option('ndf_filters_heading_label', 'Filters');
				$output .= "</".get_option('ndf_filters_heading_style', 'h2').">";
				$output .= "</div>";
				
				$output .= "<div class='ndf_filters_heading_description'>";
				$output .= get_option( 'ndf_filters_heading_description', '' );
				$output .= "</div>";
			}
			
			$slider_output .= "<div class='ndf_slider_navigation frxp-hidden-medium frxp-hidden-large'></div>";
			$slider_output .= "<div class='ndf_slider_output frxp-hidden ndf_filters_wrapper' id='filters_slider'>";

			$grid_output .= "<div class='ndf_grid_output ndf_filters_wrapper frxp-flex frxp-flex-space-between frxp-grid frxp-grid-collapse frxp-hidden'  data-frxp-grid-match='".'{target:".ndf_filter_container"}'."'>";
		}

		$ndf_filters_table_options_limit = get_option( 'ndf_filters_table_options_limit', 0 );

		$category_array = array(1, 2, 3, 4, 5);
		foreach( $category_array as $number ){
			if( ${"show_cat_{$number}"} ){
				/* Show Category {$number} Filter Column */
				$slider_output .= "<div class='ndf_filter_container cat_".$number."_slider_output' id='ndf_filter_cat_".$number."'></div>";
				$grid_output .= "<div class='ndf_filter_container frxp-width-medium-1-".$show_category_column_count." cat_".$number."_grid_output' id='ndf_filter_grid_cat_".$number."'></div>";
				
				${"cat_{$number}_filter_contents"} .= "<div class='cat_".$number."_filter_contents frxp-hidden'>";
					${"cat_{$number}_filter_contents"} .= "<hr class='ndf_filter_top_accent'>";
					${"ndf_category_{$number}_filter_icon"} = get_option( 'ndf_category_'.$number.'_filter_icon' );
					if( ${"ndf_category_{$number}_filter_icon"} ){
						${"cat_{$number}_filter_contents"} .= "<img src='". esc_url( ${"ndf_category_{$number}_filter_icon"} ) ."' alt='' class='ndf_filter_cat_icon'>";
					}
					${"cat_{$number}_filter_contents"} .= "<p class='ndf_category_label'>";
					${"cat_{$number}_filter_contents"} .= ${"get_cat_{$number}_label"};
					${"cat_{$number}_filter_contents"} .= "</p>";
					${"cat_{$number}_filter_contents"} .= "<hr class='ndf_filter_accent'>";
					${"cat_{$number}_filter_contents"} .= "<div class='ndf_category_".$number."_content'>";
						${"ndf_show_filters_hierarchy_{$number}"} = ndf_show_filters_hierarchy( 'ndf_category_'.$number );
						${"cat_{$number}_filter_contents"} .= ${"ndf_show_filters_hierarchy_{$number}"}[1];
						if( ${"ndf_show_filters_hierarchy_{$number}"}[0] > $ndf_filters_table_options_limit && $ndf_filters_table_options_limit != 0 ){
							${"cat_{$number}_filter_contents"} .= '<p class="ndf_filters_show_more cat_'.$number.'" data-ndf-filter-set="'.$number.'">Show More <i class="frxp-icon-chevron-down"></i></p>';
						}
					${"cat_{$number}_filter_contents"} .= "</div>";
				${"cat_{$number}_filter_contents"} .= "</div>";
			}
		}

		if ( $show_cat_1 || $show_cat_2 || $show_cat_3 || $show_cat_4 || $show_cat_5 ){
			/* Filter Column Wrapper End */
			$grid_output .= "</div>";
 
			$slider_output .= "</div>";

			/* EO .ndf_filters_wrapper_scroll */
			$show_category_column = true;
		}
		
		$output .= $cat_1_filter_contents;
		$output .= $cat_2_filter_contents;
		$output .= $cat_3_filter_contents;
		$output .= $cat_4_filter_contents;
		$output .= $cat_5_filter_contents;
		$output .= $grid_output;
		$output .= $slider_output;
		
		$output .= "<div class='frxp-grid'>";

			/* Keyword Search */
			$output .= "<div class='frxp-width-medium-3-5 frxp-width-small-2-3'>";
			$keyword_search_show = ( get_option('ndf_keyword_search_show', 1) == '1' ) ? true : false;
			if( $keyword_search_show  ){
				$ndf_keyword_search_label = get_option( 'ndf_keyword_search_label', 'Search' );

				$output .= "<p id='wcp_keyword_search_p'><span class='stretch'><input type='text' name='wcp_keyword_search' id='wcp_keyword_search' placeholder='Keyword Search'></span><span class='normal'><a href='#' id='wcp_keyword_search_button'>".$ndf_keyword_search_label."</a></span></p>";
			}
			$output .= "</div>";

			/* Reset Link */
			$output .= "<div class='frxp-width-medium-2-5 frxp-width-small-1-3'>";
			if( get_option('ndf_reset_button_show', 1) ){
				$output .= "<p id='ndf_reset_filter_wrapper'><a href='#' id='ndf_reset_filters'>".get_option('ndf_reset_button_label', 'Reset Filters')."</a></p>";	
			}
			$output .= "</div>";

		$output .= "</div>";
		
		/* GET MORE INFO FIELDS */
		$ndf_data_results_layout = get_option( 'ndf_data_results_layout', 'tabular' );
			
		$ndf_get_more_fields_tabular = get_option( 'ndf_data_results_table_more_fields', array() );
		$more_fields_category_1 = array();
		$more_fields_category_2 = array();
		$more_fields_category_3 = array();
		$more_fields_category_4 = array();
		$more_fields_category_5 = array();
		$more_fields_more_info = array();
		$all_more_info_fields = array();
		$field_IDs = array();
		$field_info = array();

		foreach( $ndf_get_more_fields_tabular as $field_value ){
			$field_IDs[] = $field_value['field_ID'];
			switch ($field_value['column']) {
				case 'category-1':
					$more_fields_category_1[] = array( 'field_ID' => $field_value['field_ID'], 'meta_name' => 'ndf_fields_'.$field_value['field_ID'] );
					break;

				case 'category-2':
					$more_fields_category_2[] = array( 'field_ID' => $field_value['field_ID'], 'meta_name' => 'ndf_fields_'.$field_value['field_ID'] );
					break;

				case 'category-3':
					$more_fields_category_3[] = array( 'field_ID' => $field_value['field_ID'], 'meta_name' => 'ndf_fields_'.$field_value['field_ID'] );
					break;

				case 'category-4':
					$more_fields_category_4[] = array( 'field_ID' => $field_value['field_ID'], 'meta_name' => 'ndf_fields_'.$field_value['field_ID'] );
					break;

				case 'category-5':
					$more_fields_category_5[] = array( 'field_ID' => $field_value['field_ID'], 'meta_name' => 'ndf_fields_'.$field_value['field_ID'] );
					break;
				
				default:
					$more_fields_more_info[] = array( 'field_ID' => $field_value['field_ID'], 'meta_name' => 'ndf_fields_'.$field_value['field_ID'] );
					break;
			}
			$all_more_info_fields[] = array( 'field_ID' => $field_value['field_ID'], 'meta_name' => 'ndf_fields_'.$field_value['field_ID'] );
		}
		$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
		$field_IDs = implode(',', $field_IDs);
		$get_field_name = '';

		if( !empty( $field_IDs ) ){
			$get_field_name = $wpdb->get_results( "SELECT `ID`, `field_type`, `label` FROM {$ndf_data_filtering_saved_fields} WHERE  ID IN ($field_IDs)", ARRAY_A );
		}

		if( !empty( $get_field_name ) ){
			foreach( $get_field_name as $key => $get_field_name_value ) {
				$field_info[$get_field_name_value['ID']] = array( 'type' => $get_field_name_value['field_type'], 'label' => $get_field_name_value['label'] );
			}
		}

		/* EO GET MORE INFO FIELDS */

		if( $ndf_hide_filters ){
			$output = "<div id='ndf_plugin_html'>";
		}
		/* EO Filters Section */
		
		/* DATA Table Section */
		if( get_option('ndf_data_results_heading_show', 1) && $ndf_hide_filters == false ){
			$output .= "<div class='ndf_data_results_heading'>";
			$output .= "<".get_option('ndf_data_results_heading_style', 'h2')." class='ndf_data_results_heading'>";
			$ndf_data_results_heading_icon = get_option( 'ndf_data_results_heading_icon', '' );
				if( !empty( $ndf_data_results_heading_icon ) ){
					$output .= "<img src='". esc_url( get_option( 'ndf_data_results_heading_icon', '' ) ) ."' alt='' class='frxp-vertical-align-middle'>";
				}
			$output .= get_option('ndf_data_results_heading_label', 'Data Results');
			$output .= "</".get_option('ndf_data_results_heading_style', 'h2').">";
			$output .= "</div>";
			
			$output .= "<div class='ndf_data_results_heading_description'>";
			$output .= get_option( 'ndf_data_results_heading_description', '' );
			$output .= "</div>";
		}
		
		if( $attributes['total-count'] != "false" ){
			$output .= '<p class="frxp-text-right ndf_total_count_label">Showing ';
			$output .= '<strong class="ndf_results_count">'.$ndf_query->post_count.'</strong>';
			$output .= ' of ';
			$output .= '<strong class="ndf_results_count_all">'.$query_found_posts.'</strong>';
			$output .= ' items</p>';
		}
		
		$output .= "<div id='ndf_image_wrapper'><div class='ndf_loading'></div>";

		
		$grid_category_column_class = '';
		$grid_moreinfo_column_class = '';

		if( $show_category_column ){
			$grid_category_column_class = 'show';
		}
		if( get_option('ndf_more_info_column_show', 1) == 1 ){
			$grid_moreinfo_column_class = 'show';
		}

		$output .= "<div id='ndf-no-results' class='frxp-text-center ndf_table_cell'>No Results Found.</div>";
		
		if( $ndf_hide_filters ){
			$ndf_table_filtered = " data-ndf-table-filtered='true' ";
		}

		if( $ndf_data_results_layout == 'horizontal' ){
			$ndf_data_results_h_layout_options = get_option( 'ndf_data_results_h_layout_options', 'no-label' );
			$ndf_data_results_h_view = 'horizontal';
			if( $ndf_data_results_h_layout_options == 'tight-view' ){
				$ndf_data_results_h_view = 'horizontal horizontal_tight_view"';
			}

			$output .= "<table class='" . $ndf_data_results_h_view . "' data-ndf-limit='".$load_limit."' data-ndf-step='".$ndf_query_results_step."' ".$category_1_param." ".$category_2_param." ".$category_3_param." ".$category_4_param." ".$category_5_param." ".$additional_fields_param." ".$ndf_table_filtered." id='ndf_filtered_data_content' data-ndf-layout='".$ndf_data_results_layout."'>";
			$output .= "<tbody>";
		}
		else{
			/* Table#ndf_filtered_data_content */
			$output .= "<table class='tablesaw tablesaw-swipe tabular' data-tablesaw-mode='swipe' data-tablesaw-minimap='' data-ndf-limit='".$load_limit."' data-ndf-step='".$ndf_query_results_step."' ".$category_1_param." ".$category_2_param." ".$category_3_param." ".$category_4_param." ".$category_5_param." ".$additional_fields_param." ".$ndf_table_filtered." id='ndf_filtered_data_content' data-ndf-layout='".$ndf_data_results_layout."'>";
			$output .= "<thead>";
			$output .= "<tr data-frxp-grid-match='".'{target:".ndf_table_header"}'."'>";
				$output .= "<th scope='col' data-tablesaw-priority='persist' class='tablesaw-cell-persist ndf_table_header ndf_table_header_title' id='first_col_width'></th>";

				
				if( !empty( $grid_category_column_class ) ){
					$category_array = array(1, 2, 3, 4, 5);
					foreach( $category_array as $number ){
						${"get_cat_{$number}_results_label"} = get_option( 'ndf_category_'.$number.'_results_label', ${"get_cat_{$number}_label"} );
						${"get_cat_{$number}_results_label"} = (empty(${"get_cat_{$number}_results_label"})) ? ${"get_cat_{$number}_label"} : ${"get_cat_{$number}_results_label"};

						if( ${"show_cat_{$number}"} ){ $output .= "<th scope='col' data-tablesaw-priority='1' id='ndf_hide_cat_".$number."' class='ndf_table_header'><div class='label_wrapper frxp-text-middle frxp-flex-center'>".${"get_cat_{$number}_results_label"}."</div></th>"; }
					}
				}

				if( !empty( $grid_moreinfo_column_class ) ){
					$output .= "<th scope='col' data-tablesaw-priority='5' id='ndf_hide_cat_6'  class='ndf_table_header'><div class='label_wrapper frxp-text-middle frxp-flex-center'>More Info</div></th>";
				}
			$output .= "</tr>";
			$output .= "</thead>";
			$output .= "<tbody>";
		}

		while ( $ndf_query->have_posts() ) {
			$ndf_query->the_post();
			$wcp_data_ID = get_the_ID();

			$output .= "<tr>";

			if( $query_post_count == $data_counter ){
				$last_data_row_class = ' ndf_last_row';
			}


			$output .= wcp_get_data_image_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class );

			if( $ndf_data_results_layout == 'horizontal' ){

				$output .= "<td class='ndf_table_cell " . $last_data_row_class . "'>";
				$output .= "<div class='wcp_cell_wrap'>";

				/* STAR RATINGS */
				$ndf_star = '';
				$ndf_data_star_rating = ndf_data_settings_get_meta( 'ndf_data_star_rating', $wcp_data_ID );
				$ndf_data_star_rating_custom = ndf_data_settings_get_meta( 'ndf_data_star_rating_custom', $wcp_data_ID );
				if( get_option('ndf_star_ratings_element_show', 1) == 1 && $ndf_data_star_rating ){
					if( $ndf_data_star_rating == 'custom-rating' ){
						$ndf_star = do_shortcode($ndf_data_star_rating_custom);
					}
					else{
						if( absint( $ndf_data_star_rating ) >= 1 ){
							$ndf_star_rating_size = get_option( 'ndf_star_rating_size', '' );
							$ndf_data_star_rating = absint( $ndf_data_star_rating );
							$star = '';
							for( $i = 1; $i <= $ndf_data_star_rating; $i++ ){
								$star .= '<i class="frxp-icon-star ' . $ndf_star_rating_size . '"></i>';
							}
							$ndf_star .= "<span class='ndf_data_star_rating'>";
							$ndf_star .= $star;
							$ndf_star .= "</span>";
						}
					}
				}
				/* EO Star Ratings */

				/* Data Title */
				$output .= '<p><strong class="ndf_data_results_heading_color">';
					/* Get title link */
					$ndf_get_tags = ndf_get_more_button_template( $wcp_data_ID, 'link-only' );
					if( !empty( $ndf_get_tags['start_tag'] ) ){ $output .= $ndf_get_tags['start_tag']; }
					$output .= get_the_title( $wcp_data_ID ).'</strong>'.$ndf_star;
					if( !empty( $ndf_get_tags['start_tag'] ) ){ $output .= $ndf_get_tags['end_tag']; }
				$output .= '</p>';

				/* Get categories */
				$get_data_categories_1 = ndf_get_terms_layout_one_line( $wcp_data_ID, 'ndf_category_1', $tax_hierarchy_1 );
				$get_data_categories_2 = ndf_get_terms_layout_one_line( $wcp_data_ID, 'ndf_category_2', $tax_hierarchy_2 );
				$get_data_categories_3 = ndf_get_terms_layout_one_line( $wcp_data_ID, 'ndf_category_3', $tax_hierarchy_3 );
				$get_data_categories_4 = ndf_get_terms_layout_one_line( $wcp_data_ID, 'ndf_category_4', $tax_hierarchy_4 );
				$get_data_categories_5 = ndf_get_terms_layout_one_line( $wcp_data_ID, 'ndf_category_5', $tax_hierarchy_5 );

				$get_data_categories_temp = array();
				$category_array = array(1, 2, 3, 4, 5);
				foreach( $category_array as $number ){
					if( ${"show_cat_{$number}"} ){
						$get_data_categories_temp[${"get_cat_{$number}_label"}] = ${"get_data_categories_{$number}"};
					}
				}

				$get_data_categories = array();

				foreach( $get_data_categories_temp as $category_label => $wcp_category ){
					if( !empty( $wcp_category ) ){
						$wcp_category = str_replace('|', ' ', $wcp_category);
						$wcp_category = $category_label.': '.str_replace(':', '', $wcp_category);

						$get_data_categories[] = $wcp_category;
					}
				}

				if( !empty( $get_data_categories ) ){
					$output .= '<p>'.implode( ' | ', $get_data_categories ).'</p>';
				}
				
				/* Categories additional custom content - hidden on Horizontal layout
				$output .= ndf_data_settings_get_meta( 'ndf_data_category_1_content', $wcp_data_ID );
				$output .= ndf_data_settings_get_meta( 'ndf_data_category_2_content', $wcp_data_ID );
				$output .= ndf_data_settings_get_meta( 'ndf_data_category_3_content', $wcp_data_ID );
				$output .= ndf_data_settings_get_meta( 'ndf_data_category_4_content', $wcp_data_ID );
				$output .= ndf_data_settings_get_meta( 'ndf_data_category_5_content', $wcp_data_ID );
				*/

				/* More Info fields */
				if( !empty( $all_more_info_fields ) ){
					$ndf_get_more_fields_per_column = ndf_get_more_fields_per_column( $wcp_data_ID, $all_more_info_fields, $field_info );
					if( !empty( $ndf_get_more_fields_per_column ) ){
						if( $ndf_data_results_h_layout_options == 'no-label' ){
							$output .= '<hr>';
						}
						$output .= $ndf_get_more_fields_per_column;
					}
				}

				$more_info_content = ndf_data_settings_get_meta( 'ndf_data_more_info_content', $wcp_data_ID );
				if( !empty( $more_info_content ) ){
					$output .= '<div class="ndf_more_info_text">'.do_shortcode($more_info_content).'</div>';
				}

				if( !empty( $grid_moreinfo_column_class ) ){
					$output .= "<div class='ndf_more_info_section'>";
					/* MORE INFO BUTTON */
					$output .= ndf_get_more_button_template( $wcp_data_ID );
					/* MORE INFO BUTTON */

					/* ENQUIRY FORM BUTTON */ 
					$ndf_show_enquiry_form = get_option( 'ndf_show_enquiry_form', 0 );
					$ndf_enquiry_button_style = get_option( 'ndf_enquiry_button_style', 1 );
					$ndf_data_recipient_email = sanitize_email( ndf_data_settings_get_meta( 'ndf_data_recipient_email', $wcp_data_ID ) );
					$ndf_data_enquiry_form = ndf_data_settings_get_meta( 'ndf_data_enquiry_form', $wcp_data_ID );

					$ndf_outbound_clicks_track = get_option( 'ndf_outbound_clicks_track', 0 );

					$ndf_outbound_clicks_data_attribute = '';
					if( $ndf_outbound_clicks_track == 1){
						$wcp_default_source_tags = get_option( 'wcp_default_source_tags', array() );
						$ndf_outbound_clicks_data_attribute .= "data-wcp-track";
						$ndf_outbound_clicks_data_attribute .= " data-wcp-track-enquiry-button='yes'";
						$ndf_outbound_clicks_data_attribute .= " data-wcp-track-href='".get_the_permalink($wcp_data_ID)."'";
						$ndf_outbound_clicks_data_attribute .= " data-wcp-linked-data='".$wcp_data_ID."'";
						$ndf_outbound_clicks_data_attribute .= " data-wcp-source-tag='".$wcp_default_source_tags['enquiry_button_click']."'";
						$ndf_outbound_clicks_data_attribute .= " data-wcp-source-tag-submit='".$wcp_default_source_tags['enquiry_form_submit']."'";
					}

					/* Check Enquiry Form global settings */ 
					if( $ndf_show_enquiry_form == 1 ){
						/* Check Data Item Enquiry Form settings */ 
						if( $ndf_data_enquiry_form != 'hide' ){
							/* Check Data Item Recipient Email settings */ 
							if( !empty( $ndf_data_recipient_email ) && is_email( $ndf_data_recipient_email ) ){
								$output .= "<a href='#' data-modal-id='".$wcp_data_ID."' data-button-style='".$ndf_enquiry_button_style."' class='ndf_more_info_enquiry ndf_more_info_enquiry_modal ndf_button_style_".$ndf_enquiry_button_style."' ".$ndf_outbound_clicks_data_attribute.">";
								$output .= get_option( 'ndf_enquiry_button_label', 'Request Info' );
								$output .= "</a>";
							}
						}
					}
					/* ENQUIRY FORM BUTTON */

					$output .= "</div>";
				}

				$output .= "</div>";
				$output .= "</td>";
				/* EO horizontal layout */
			}
			else{
				/* TABULAR COLUMNS */
				$output .= wcp_get_category_values_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class, $grid_category_column_class, 'category_1', $show_cat_1, $tax_hierarchy_1, $more_fields_category_1, $field_info );

				$output .= wcp_get_category_values_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class, $grid_category_column_class, 'category_2', $show_cat_2, $tax_hierarchy_2, $more_fields_category_2, $field_info );

				$output .= wcp_get_category_values_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class, $grid_category_column_class, 'category_3', $show_cat_3, $tax_hierarchy_3, $more_fields_category_3, $field_info );

				$output .= wcp_get_category_values_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class, $grid_category_column_class, 'category_4', $show_cat_4, $tax_hierarchy_4, $more_fields_category_4, $field_info );

				$output .= wcp_get_category_values_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class, $grid_category_column_class, 'category_5', $show_cat_5, $tax_hierarchy_5, $more_fields_category_5, $field_info );

				/* More Info Cell */
				$output .= wcp_get_more_info_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class, $grid_moreinfo_column_class, $more_fields_more_info, $field_info );
			}
			
			$output .= "</tr>";
			$data_counter++;
		} /* EO While */
		
		if( $ndf_data_results_layout == 'horizontal' ){
			$output .= "</tbody>";
			$output .= '</table>';
		}
		else{
			$output .= "</tbody>";
			$output .= '</table>';
			/* EO table#ndf_filtered_data_content */
		}
		
		if( $query_found_posts >= ($load_limit+1) ){
			$output .= "<p class='frxp-text-center'><button id='ndf_load_more' data-ndf-more='no'>".get_option( 'ndf_load_more_button_label', 'Load More' )."</button></p>";
		}
		
		/* EO Main Plugin Wrapper */
		$output .= "</div>";
		$output .= "</div>";
	}
	else{
		$output .= "<div id='ndf-no-results' class='frxp-text-center ndf_table_cell frxp-display-block'>No Results Found.</div>";
	}
	wp_reset_postdata();
	/* EO DATA Table Section */

	$output .= '
	<div id="modal-spinner" class="frxp-modal" aria-hidden="true" style="display: none; overflow-y: scroll;">
		<div class="frxp-modal-dialog frxp-modal-dialog-large ndf_modal_content">
			<div class="frxp-modal-spinner"></div>
		</div>
	</div>';
	return $output;
}