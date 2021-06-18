<?php
/** 
 * Useful functions or snippets used in the plugin
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

/**
 * Get the terms attached in a Data item.
 * 
 * @since 		1.0.1.0
 * @param 		int `$data_id` Data custom post type ID.
 * @param 		string `$ndf_category` Taxonomy name to fetch terms.
 * @return 		array Term slug and value.
 */
function ndf_get_terms( $data_id = 0, $ndf_category = '' ){
	$output = array();
	$terms = get_the_terms( $data_id, $ndf_category );

	if ( $terms != null ){
		foreach( $terms as $term ) {
			$output[] = array( 'slug' => $term->slug, 'value' => $term->name );

			unset($term);
		} 
	}

	return $output;
}

/**
 * Get the terms attached in a Data item.
 * 
 * @since 		1.2.1.1
 * @param 		int `$data_id` Data custom post type ID.
 * @param 		string `$ndf_category` Taxonomy name to fetch terms.
 * @param 		array `$tax_hierarchy` Taxonomy terms hierarchy.
 * @return 		string.
 */
function ndf_get_terms_layout_one_line( $data_id = 0, $ndf_category = '', $tax_hierarchy = array() ){
	$output = '';
	$terms_of_post = array();

	$post_terms = get_the_terms( $data_id, $ndf_category );
	if( $post_terms ){
		foreach ( $post_terms as $key => $value) {
			$terms_of_post[] = $value->term_id;
		}

		$count_parent = 1;
		foreach ($tax_hierarchy as $index => $value ) {
			if( in_array( $index, $terms_of_post ) ){
				if( $count_parent != 1 ){
					$output .= ' | ';
				}

				$output .= $value['name'];
				if( array_key_exists( 'children', $value ) ){
					$output .= ': ';
					$count_child = 1;
					foreach( $value['children'] as $child_key => $child_value ){
						if( in_array( $child_key, $terms_of_post ) ){
							if( $count_child != 1 ){
								$output .= ', ';
							}
							$output .= $child_value['name'];
							$count_child++;		
						}
					}
				}
				
				$count_parent++;		
			}
		}
	}

	return $output;
}

/**
 * Lists the value of the terms added in a Data item.
 * 
 * @since 		1.0.1.0
 * @param 		array `$ndf_category_info` Array of terms slug and value.
 * @return 		string Unordered list of term values.
 */
function ndf_filter_cell_value_generator( $ndf_category_info = array(), $taxonomy = '' ){
	$data_cell_value = '';

	$term_slug = array();
	if( !empty( $ndf_category_info ) ){
		foreach( $ndf_category_info as $data_cat_item ){
			$term_slug[] = $data_cat_item['slug'];
		}
		$data_cell_value .= ndf_show_filters_hierarchy( $taxonomy, 0, $term_slug, 2 );
	}

	return $data_cell_value;
}

/**
 * Recursively get taxonomy and its children
 *
 * @param string $taxonomy
 * @param int $parent - parent term id
 * @return array
 */
function get_taxonomy_hierarchy( $taxonomy, $parent = 0 ) {
	// only 1 taxonomy
	$taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
	// get all direct decendants of the $parent
	$terms = get_terms( $taxonomy, array( 'parent' => $parent ) );
	// prepare a new array.  these are the children of $parent
	// we'll ultimately copy all the $terms into this new array, but only after they
	// find their own children
	$children = array();
	// go through all the direct decendants of $parent, and gather their children
	foreach ( $terms as $term ){
		// recurse to get the direct decendants of "this" term
		$term->children = get_taxonomy_hierarchy( $taxonomy, $term->term_id );
		// add the term to our new array
		if( empty( $term->children ) ){
			$children[$term->term_id] = array( 'name' => $term->name );
		}
		else{
			$children[$term->term_id] = array( 'name' => $term->name, 'children' => $term->children );
		}
	}
	// send the results back to the caller
	return $children;
}


/**
 * Lists the value of the terms added in a Data item.
 * 
 * @since 		1.0.1.0
 * @param 		array `$ndf_category_info` Array of terms slug and value.
 * @return 		string Unordered list of term values.
 */
function ndf_summary_cell_value_generator( $ndf_category_info = array(), $taxonomy = '' ){
	$data_cell_value = '';

	$term_slug = array();
	if( !empty( $ndf_category_info ) ){
		foreach( $ndf_category_info as $data_cat_item ){
			$term_slug[] = $data_cat_item['slug'];
		}
		$data_cell_value .= ndf_show_filters_hierarchy( $taxonomy, 0, $term_slug, 3 );
	}

	return $data_cell_value;
}

/**
 * Get Data Post Meta.
 * 
 * @since 		1.0.1.0
 * @param 		string `$value` meta key.
 * @return 		mixed|boolean Meta value on success, false if no meta value saved.
 */
function ndf_data_settings_get_meta( $value, $post_id = '' ) {
	global $post;

	if( empty( $post_id ) ){
		$post_id = $post->ID;
	}

	$field = get_post_meta( $post_id, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

/**
 * Display Filters as List of Categories showing hierarchy.
 * 
 * @since 		1.0.1.0
 * @param 		string `$taxonomy` Taxonomy key.
 * @param 		int `$parent` Parent term id.
 * @param 		array `$term_slug` Term slug.
 * @param 		string `$style` If style is 1, returns list of terms with checkboxes; If 2, list of terms.
 * @return 		mixed Unordered list of taxonomy terms.
 */
function ndf_show_filters_hierarchy( $taxonomy, $parent = 0, $term_slug = array(), $style = '1', $count = 0, $ndf_filters_table_options_limit = 'get_option' ){
	$identifier = str_replace( 'ndf_category_', '', $taxonomy );
	$output = '';
	$counter = 1;

	if( $ndf_filters_table_options_limit === 'get_option' ){
		$ndf_filters_table_options_limit = get_option( 'ndf_filters_table_options_limit', 0 );
	}
	
	$args = array(
		'taxonomy'     => $taxonomy,
		'hierarchical' => 1,
		'title_li'     => ''
	);

	if( !empty( $term_slug ) ){
		$args['slug'] = $term_slug;
	}

	/* Apply order to style=1 which is the filters */
	if( $style == 1 ){
		$args['orderby'] = 'id';
		$args['order'] = 'ASC';
	}

	$ndf_category_filter_options_display = get_option( 'ndf_category_'.$identifier.'_filter_options_display', 'show-all' );

	if( $ndf_category_filter_options_display == 'with-values' ){
		$args['hide_empty'] = true;
	}
	else{
		$args['hide_empty'] = false;
	}

	$terms = get_categories( $args );
	$found_term_count = count( $terms );

	if( !empty($terms) ){

		foreach( $terms as $term ){
			if( $term->parent == $parent ){
				$current_term_id = $term->term_id;

				$ndf_category_display_type = get_term_meta( $current_term_id, $taxonomy.'_display_type', true );
				if( !$ndf_category_display_type || empty( $ndf_category_display_type ) ){
					$ndf_category_display_type = 'text';
				}

				$ndf_category_term_image_icon = get_term_meta( $current_term_id, $taxonomy.'_term_image_icon', true );
				if( !$ndf_category_term_image_icon || empty( $ndf_category_term_image_icon ) ){
					$ndf_category_display_type = 'text';
				}

				if( $style == 2 ){
					/* Data Results Section List */
					$output .= '<li class="' . $ndf_category_display_type . '">';
					if( $ndf_category_display_type == 'icon' ){
						$output .= '<img src="' . esc_url( $ndf_category_term_image_icon ) . '" title="' . $term->name .'" alt="' . $term->name .'" class="ndf_category_small_image">';
					}
					else{
						$output .= $term->name;
					}
					$output .= ndf_show_filters_hierarchy( $taxonomy, $current_term_id, $term_slug, $style );
					$output .= '</li>';
				}
				else if( $style == 3 ){
					/* Data Results Section List */
					$output .= '<div class="' . $ndf_category_display_type . '"><div>';
					if( $parent != 0 ){
						if( $ndf_category_display_type == 'icon' ){
							$output .= '<img src="' . esc_url( $ndf_category_term_image_icon ) . '" title="' . $term->name .'" alt="' . $term->name .'" class="ndf_category_small_image">';
						}
						else{
							$output .= $term->name;
						}
					}
					else{
						if( $ndf_category_display_type == 'icon' ){
							$output .= '<img src="' . esc_url( $ndf_category_term_image_icon ) . '" title="' . $term->name .'" alt="' . $term->name .'" class="ndf_category_small_image">';
						}
						else{
							$output .= '<strong>'.$term->name.'</strong>';
						}
					}
					$output .= ndf_show_filters_hierarchy( $taxonomy, $current_term_id, $term_slug, $style );
					$output .= '</div></div>';
				}
				else if( $style == 4 ){
					/* Data Results Section List - New */
					$get_children = '';
					$counter++;
					//$output .= '<span class="' . $ndf_category_display_type . '">';
					if( $ndf_category_display_type == 'icon' ){
						$output .= '<img src="' . esc_url( $ndf_category_term_image_icon ) . '" title="' . $term->name .'" alt="' . $term->name .'" class="ndf_category_small_image">';
					}
					else{
						$output .= $term->name;
					}
					$get_children = ndf_show_filters_hierarchy( $taxonomy, $current_term_id, $term_slug, $style );
					if( empty( $get_children ) ){
						$separator = '| ';
					}
					else{
						$separator = ': ';
					}
					if( $parent != 0 ){
						$separator = ', ';
					}
					
					$output .= $separator;
					if( !empty( $get_children ) ){
						$output .= '<span id="c">'.trim($get_children).'</span>';
					}
					//$output .= '</span>';
				}
				else{
					$count++;

					if( $ndf_filters_table_options_limit != 0 && $count > $ndf_filters_table_options_limit ){
						$show_limit_class = 'ndf_show_option_hidden';
					}
					else{
						$show_limit_class = 'ndf_show_option';
					}

					$output .= "<li class='ndf_initial_filters " . $show_limit_class . "'><input type='checkbox' id='".$term->slug."-".$current_term_id."' class='ndf_filter' name='ndf_filter_cat_".$identifier."' data-ndf-fc-".$identifier."='" . $term->slug . "'> <label for='".$term->slug."-".$current_term_id."'>" . $term->name . '</label>';
					
					$check = ndf_show_filters_hierarchy( $taxonomy, $current_term_id, $term_slug, $style, $count, $ndf_filters_table_options_limit );

					if( is_array( $check ) ){
						$count = $check[0];
						$output .= $check[1];
					}
					else{
						$output .= $check;
					}
					$output .= '</li>';
				}
			}
		}

		if( !empty($output) ){
			if( $style == 4 ){
				$output_start = '<span>';
				$output_end = "</span>";
				$output = $output_start . $output . $output_end;
			}
			else{
				$output_start = '<ul class="frxp-list">';
				if( $parent != 0 && $style == 3 ){
					// $output_start = '<ul class="">';
					$output_start = '<ul class="">';
				}
				$output_end = "</ul>";
				$output = $output_start . $output . $output_end;

				if( $style == 1 ){
					$output = array( $count, $output );
				}
			}
		}
	}
	return $output;
}

/*
 * Removes all parent terms.
 * 
 * @since 		1.0.1.0
 * @param 		string $term_slug Term ID's.
 * @param 		string `$taxonomy` Taxonomy key.
 * @return 		array Child terms.
 */
function ndf_remove_term_with_child( $term_slug = array(), $taxonomy = '' ){
	$children_only = array();
	foreach( $term_slug as $term_to_check ){
		$term = get_term_by( 'slug', $term_to_check, $taxonomy );
		$parent_term_id = '';
		
		if( !is_wp_error( $term ) && is_object( $term ) ) {
			$parent = get_term( $term->parent, $taxonomy ); /* get parent term */
			
			$children = get_term_children( $term->term_id, $taxonomy ); /* get children */

			if( !is_wp_error( $parent ) ) {
				$parent_term_id = $parent->term_id;
			}
			
			if( ( ( $parent_term_id !="" ) && (sizeof($children)==0) ) || ( ( $parent_term_id == "" ) && (sizeof($children)==0) ) ) {
				/* has parent, no child || no parent, no child 
				ADD to query */
				$children_only[] = $term_to_check;
			}
			else{
				/* if( ($parent->term_id!="" && sizeof($children)>0) || ($parent->term_id=="") && (sizeof($children)>0) ) {
					has parent and child || no parent, has child
				}
				DO NOT ADD to query  */
			}
		}
	}
	return $children_only;
}

/*
 * 
 */
function ndf_get_more_fields_per_column( $post_id, $more_fields_category, $field_info ){
	$output = '';
	$name_fields = '';

	$ndf_data_results_h_layout_options = get_option( 'ndf_data_results_h_layout_options', 'no-label' );
	$ndf_data_results_layout = get_option( 'ndf_data_results_layout', 'tabular' );

	$field_values = array();

	foreach( $more_fields_category as $field ) {
		if( $field_info[$field['field_ID']]['type'] == 'section' ){
			$field_values[] = $field_info[$field['field_ID']]['label'];
		}
		else{
			$get_field_meta = ndf_data_settings_get_meta( $field['meta_name'], $post_id );
			if( !empty( $get_field_meta ) ){
				if( $field_info[$field['field_ID']]['type'] == 'name' ){
					$name_fields = trim( implode( ' ', $get_field_meta ) );
					if( !empty($name_fields) ){
						$field_values[] = $name_fields;
					}
				}
				else{
					if( $field_info[$field['field_ID']]['type'] == 'list' ){
						$field_values[] = implode( ', ', $get_field_meta );
					}
					else if( $field_info[$field['field_ID']]['type'] == 'checkbox' ){
						$get_field_meta = get_post_meta( $post_id, $field['meta_name'], false );
						$field_values[] = implode( ', ', $get_field_meta );
					}
					else if( $field_info[$field['field_ID']]['type'] == 'website' ){
						$field_values[] = '<a href="'.esc_url($get_field_meta).'">'.$get_field_meta.'</a>';
					}
					else if( $field_info[$field['field_ID']]['type'] == 'image_upload' ){
						$field_values[] = '<img src="'.esc_url($get_field_meta).'">';
					}
					else if( $field_info[$field['field_ID']]['type'] == 'text_editor' ){
						$field_values[] = do_shortcode($get_field_meta);
					}
					else{
						$field_values[] = $get_field_meta;
					}
				}
			}
		}
	}
	

	if( $ndf_data_results_h_layout_options == 'narrow-height' && $ndf_data_results_layout == 'horizontal' ){
		$output = implode( '<span class="wcp-more-info-separator"> | </span>', $field_values );
	}
	else{
		foreach ($field_values as $value) {
			$output .= '<p>';
			$output .= $value;
			$output .= '</p>';
			
		}
	}

	return $output;
}

/*
 *  
 */
function wcp_get_data_image_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class = '' ){
	global $post;

	$output = '';

	$data_title = ndf_data_settings_get_meta( 'ndf_data_settings_data_heading', $wcp_data_ID );
	$data_title_class = '';

	if( $ndf_data_results_layout == 'horizontal' ){

		if( $data_title ){
			$data_title = "<img src='".$data_title."' alt='".get_the_title( $wcp_data_ID )."' class='ndf_header_logo frxp-display-block'>";
		}

		if( empty( $data_title ) ){
			$data_title_class = ' ndf_no_content';
		}

		$output .= "<td class='ndf_table_cell ndf_data_title_cell " . $last_data_row_class . $data_title_class . "'>";
			$output .= "<div class='wcp_cell_wrap frxp-vertical-align'>";
				$output .= "<div class='frxp-vertical-align-middle'>";
					$output .= $data_title;
				$output .= "</div>";
			$output .= "</div>";
		$output .= "</td>";
	}
	else{		
		if( $data_title ){
			$data_title = "<img src='".$data_title."' alt='".get_the_title( $wcp_data_ID )."' class='ndf_header_logo'>";
		}
		else{
			$data_title = "<p>".get_the_title( $wcp_data_ID )."</p>";
		}

		$output .= "<td class='tablesaw-cell-persist ndf_table_cell ndf_data_title_cell frxp-text-center " . $last_data_row_class . "'>";
			$output .= $data_title;
		$output .= "</td>";
	}

	return $output;
}

function wcp_get_category_values_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class, $grid_category_column_class, $category, $show_cat, $tax_hierarchy, $more_fields_category, $field_info ){
	global $post;

	$output = '';

	if( !empty( $grid_category_column_class ) ){
		if( $show_cat ){
			/* Determine Cell value based on Content Option settings field in Data CPT */
			$data_category_1_content_option = ndf_data_settings_get_meta( 'ndf_data_'.$category.'_content_option', $wcp_data_ID );
			$data_category_1_type = ndf_data_settings_get_meta( 'ndf_data_'.$category.'_content_type', $wcp_data_ID );

			if( $data_category_1_content_option == 'custom-content' ){
				$data_cat_1_value = do_shortcode(ndf_data_settings_get_meta( 'ndf_data_'.$category.'_content', $wcp_data_ID ));
			}
			else{ 
				$data_cat_1_value = ndf_get_terms_layout_one_line( $wcp_data_ID, 'ndf_'.$category, $tax_hierarchy );
				if( $data_category_1_content_option == 'both' ){
					$data_cat_1_value .= do_shortcode(ndf_data_settings_get_meta( 'ndf_data_'.$category.'_content', $wcp_data_ID ));
				}
			}

			if( !empty( $more_fields_category ) ){
				$ndf_get_more_fields_per_column = ndf_get_more_fields_per_column( $wcp_data_ID, $more_fields_category, $field_info );
				if( !empty( $ndf_get_more_fields_per_column ) ){
					if( !empty( $data_cat_1_value) ){
						$data_cat_1_value .= '<hr>';
					}
					$data_cat_1_value .= $ndf_get_more_fields_per_column;
				}
			}
			
			/* Add class .ndf_cell_no_content if cell has no content */
			$ndf_cell_no_content = '';
			if( empty( $data_cat_1_value ) ){
				$ndf_cell_no_content = ' ndf_cell_no_content';
			}

			$output .= "<td class='" . $last_data_row_class . $ndf_cell_no_content . " ndf_table_cell'>";

			/* Determine Content Display Output Type */
			$cell_1_content_class = 'cell_width_100';
			if( $data_category_1_type == 'tooltip' && !empty( $data_cat_1_value ) ){
				$output .= "<div class='ndf_data_cell_tooltip frxp-height-1-1 frxp-flex frxp-flex-middle frxp-hidden-small'>";
				$output .= "<i class='frxp-icon-button frxp-icon-info' data-frxp-tooltip='".'{pos:"bottom"}'."' title='".$data_cat_1_value."'></i>";
				$output .= "</div>";
				$cell_1_content_class = 'cell_width_100 frxp-visible-small';
			}
			
			$output .= "<div class='".$cell_1_content_class."'>" . $data_cat_1_value . "</div>";	

			$output .= "</td>";
		}
	}

	return $output;
}

function wcp_get_more_info_template( $wcp_data_ID, $ndf_data_results_layout, $last_data_row_class, $grid_moreinfo_column_class, $more_fields_more_info, $field_info ){
	global $post;

	$output = '';

	if( !empty( $grid_moreinfo_column_class ) ){
		$ndf_data_more_info_link = '#';
		$more_info_content = ndf_data_settings_get_meta( 'ndf_data_more_info_content', $wcp_data_ID );

		$output .= "<td class='" . $last_data_row_class . " ndf_table_cell'>";
		$output .= "<div class='ndf_more_info_cell'>";

		/* STAR RATINGS */
		$ndf_star = '';
		$ndf_data_star_rating = ndf_data_settings_get_meta( 'ndf_data_star_rating', $wcp_data_ID );
		$ndf_data_star_rating_custom = ndf_data_settings_get_meta( 'ndf_data_star_rating_custom', $wcp_data_ID );
		if( get_option('ndf_star_ratings_element_show', 1) == 1 && $ndf_data_star_rating ){
			if( $ndf_data_star_rating == 'custom-rating' ){
				$output .= "<div class='ndf_data_star_rating'>";
				$output .= do_shortcode($ndf_data_star_rating_custom);
				$output .= "</div>";
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
				$output .= "<div class='ndf_data_star_rating'>";
				$output .= $ndf_star;
				$output .= "</div>";
			}
		}
		/* EO Star Ratings */
		//QUOTES FORM BUTTON
		$output .= '<div id="single-modal-'.$wcp_data_ID.'">'.request_quotes_button($wcp_data_ID).'</div>';
		//QUOTES FORM BUTTON
		// /* MORE INFO BUTTON */
		$output .= ndf_get_more_button_template( $wcp_data_ID );
		/* MORE INFO BUTTON */

		/* ENQUIRY FORM BUTTON */ 
		$ndf_show_enquiry_form = get_option( 'ndf_show_enquiry_form', 0 );
		$ndf_enquiry_button_style = get_option( 'ndf_enquiry_button_style', 1 );
		$ndf_data_enquiry_form = ndf_data_settings_get_meta( 'ndf_data_enquiry_form', $wcp_data_ID );
		$ndf_data_recipient_email = sanitize_email( ndf_data_settings_get_meta( 'ndf_data_recipient_email', $wcp_data_ID ) );

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
		
		if( !empty( $more_info_content ) ){
			$output .= '<div class="ndf_more_info_text">'.do_shortcode($more_info_content).'</div>';
		}

		if( !empty( $more_fields_more_info ) ){
			$ndf_get_more_fields_per_column = ndf_get_more_fields_per_column( $wcp_data_ID, $more_fields_more_info, $field_info );
			if( !empty($ndf_get_more_fields_per_column)){
				$output .= '<hr>';
				$output .= $ndf_get_more_fields_per_column;
			}
		}

		$output .= "</div>";
		$output .= "</td>";
	}

	return $output;
}

function ndf_get_more_button_template( $wcp_data_ID, $return = 'button' ){
	global $post;

	$output = '';
	$start = '';
	$end = '</a>';
	$ndf_data_more_info_link = '#';
	$more_info_content = ndf_data_settings_get_meta( 'ndf_data_more_info_content', $wcp_data_ID );

	$check_more_info_tracking = ndf_check_more_info_tracking();
	$more_info_tracking = '';

	if( $check_more_info_tracking ){
		$wcp_default_source_tags = get_option( 'wcp_default_source_tags', array() );
		$more_info_button_click = (int)$wcp_default_source_tags['more_info_button_click'];
		if( $more_info_button_click != 0 ){
			$more_info_tracking = 'data-wcp-track data-wcp-track-href="'.get_the_permalink($wcp_data_ID).'" data-wcp-track-more-info-button="yes" data-wcp-linked-data="'.$wcp_data_ID.'" data-wcp-source-tag="'.$more_info_button_click.'"';
		}
	}

	$ndf_data_more_info_button_action = '';
	$ndf_data_more_info_button_target = '';
	$ndf_button_target = '';
	$ndf_data_more_info_link = '#';

	if( ndf_data_settings_get_meta( 'ndf_data_more_info_link', $wcp_data_ID ) ){
		$ndf_data_more_info_link = ndf_data_settings_get_meta( 'ndf_data_more_info_link', $wcp_data_ID );
	}

	if( ndf_data_settings_get_meta( 'ndf_data_more_info_button_action', $wcp_data_ID ) ){
		$ndf_data_more_info_button_action = ndf_data_settings_get_meta( 'ndf_data_more_info_button_action', $wcp_data_ID );
	}

	if( ndf_data_settings_get_meta( 'ndf_data_more_info_button_target', $wcp_data_ID ) ){
		$ndf_data_more_info_button_target = ndf_data_settings_get_meta( 'ndf_data_more_info_button_target', $wcp_data_ID );
	}

	if( $ndf_data_more_info_button_action == 'more-info-page' ){
		if( $check_more_info_tracking ){
			$ndf_button_target = 'target="_blank" ';
		}
		$start = "<a href='".get_permalink($wcp_data_ID)."' ".$ndf_button_target." class='ndf_more_info_link frxp-flex frxp-flex-center' ".$more_info_tracking.">";
		if( $return == 'link-only' ){
			$start = "<a href='".get_permalink($wcp_data_ID)."' ".$ndf_button_target." ".$more_info_tracking.">";
		}
		$output .= $start;
		$output .= get_option('ndf_more_info_button_label', 'More Info');
		$output .= "</a>";
	}
	else if( $ndf_data_more_info_button_action == 'external-link' ){
		if( $ndf_data_more_info_button_target == '' || $check_more_info_tracking ){
			$ndf_button_target = 'target="_blank" ';
		}
		$start = "<a href='".$ndf_data_more_info_link."' ".$ndf_button_target." class='ndf_more_info_link frxp-flex frxp-flex-center' ".$more_info_tracking.">";
		if( $return == 'link-only' ){
			$start = "<a href='".$ndf_data_more_info_link."' ".$ndf_button_target." ".$more_info_tracking.">";
		}
		$output .= $start;
		$output .= get_option('ndf_more_info_button_label', 'More Info');
		$output .= "</a>";
	}
	else{					
		$ndf_data_more_info_link = '#';

		$start = "<a href='".$ndf_data_more_info_link."' data-modal-id='".$wcp_data_ID."' class='ndf_more_info_link frxp-flex frxp-flex-center ndf_more_info_fields_modal' ".$more_info_tracking.">";
		if( $return == 'link-only' ){
			$start = "<a href='".$ndf_data_more_info_link."' data-modal-id='".$wcp_data_ID."' class='ndf_more_info_fields_modal' ".$more_info_tracking.">";
		}
		$output .= $start;
		$output .= get_option('ndf_more_info_button_label', 'More Info');
		$output .= "</a>";
	}
	
	if( $return == 'link-only' ){
		return array( 'start_tag' => $start, 'end_tag' => $end );
	}
	return $output;
}

/*
 * Check outbound clicks tracking settings on more info button.
 * 
 * @since 		1.7.2.0
 */
function ndf_check_more_info_tracking(){
	$ndf_outbound_clicks_track = get_option( 'ndf_outbound_clicks_track', 0 );
	$ndf_outbound_clicks_more_info_track = get_option( 'ndf_outbound_clicks_more_info_track', 0 );

	if( $ndf_outbound_clicks_track == '1' && $ndf_outbound_clicks_more_info_track == '1' ){
		return true;
	}
	return false;
}
//
function request_quotes_button($wcp_data_ID){

	$output = '';
	$ndf_data_enable_request_form_meta_box = get_post_meta($wcp_data_ID);
	$wcp_data_post_id = $post->ID;
	if(!empty($ndf_data_enable_request_form_meta_box['ndf_data_recipient_email'][0])):
		$single_email_request_quotes_form_title_button = get_option( 'single_email_request_quotes_form_title_button', 'Request A Quotes' );
		if($ndf_data_enable_request_form_meta_box['ndf_data_enable_request_form_meta_box'][0] == 1){
			$output .= '<button class="request-quotes-single" id="request-quotes-single" data-modal="'.$wcp_data_ID.'" >'.$single_email_request_quotes_form_title_button.'</button>';
			require_once NDF_BASE_DIR . '/wcp-single-email.php';
			$output .= request_quotes_form_single($wcp_data_ID);
			return $output;
		}
		return $output;
	endif;
}
