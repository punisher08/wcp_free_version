<?php
/**
 * Registers Data Meta Boxes
 * 
 * Register Data meta box and fields and handle saving Data meta values.
 * 
 * Meta Boxes:
 * - `ndf_data_settings-data-settings` - Data Settings tab, More Info tab and More Info Fields tab settings.
 * - `ndf_data_category-data-category-contents` - Categories 1-5 tab settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

/**
 * Adds meta boxes on `ndf_data` post type.
 * @return void
 */
function ndf_data_settings_add_meta_box() {
	add_meta_box(
		'ndf_data_settings-data-settings',
		'Data Settings',
		'ndf_data_settings_html',
		'ndf_data',
		'advanced',
		'default'
	);
	add_meta_box(
		'ndf_data_category-data-category-contents',
		'Category Contents',
		'ndf_data_category_contents_html',
		'ndf_data',
		'advanced',
		'default'
	);
	add_meta_box(
		'ndf_data_more_info_shortcode-data-more-info-shortcode',
		'More Info Shortcode',
		'ndf_data_more_info_shortcode_html',
		'ndf_data',
		'side',
		'default'
	);
	add_meta_box(
		'ndf_data_settings-more-info-settings',
		'More Information Fields',
		'ndf_data_more_info_html',
		'ndf_data',
		'advanced',
		'default'
	);

	add_meta_box(
		'ndf_enquiry_details-enquiry-details',
		'Enquiry Details',
		'ndf_enquiry_details_html',
		'wcp_enquiry_entries',
		'advanced',
		'default'
	);

	add_meta_box(
		'wcp_outbound_clicks_info-outbound_clicks-info',
		'Info',
		'ndf_outbound_clicks_info_html',
		'wcp_outbound_clicks',
		'advanced',
		'default'
	);
	//Enable Request Form Meta box
		add_meta_box(
			"ndf_data_enable_request_form_meta_box",
			"Enable Request Quote Form",
		
			"ndf_data",
			"advance",
			"default"
		);
	add_meta_box(
		"wcp_timestamp",
		"Sender Request",
		// no callback , updated when outboundclicks track button is enabled
		"wcp_outbound_clicks",
		"normal",
		"low"
	);
}
add_action( 'add_meta_boxes', 'ndf_data_settings_add_meta_box' );

/**
 * Display of the Data Settings meta box.
 * @param object $post Current post info.
 * @return mixed Meta box fields.
 */
function ndf_data_settings_html( $post) {
	wp_nonce_field( '_ndf_data_settings_nonce', 'ndf_data_settings_nonce' ); 
	?>
	<div id="data-settings-navigation">
		<h2 class="nav-tab-wrapper current">
			<a class="nav-tab nav-tab-active" href="javascript:;">Data Settings</a>
			<a class="nav-tab" href="javascript:;">More Information</a>
		</h2>

		<?php
		include_once( 'meta-box-partials/data-settings.php' );
		include_once( 'meta-box-partials/more-information.php' );
		?>
	</div>
	<?php
}

/**
 * Display of the Category Contents meta box.
 * @param object $post Current post info.
 * @return mixed Meta box fields.
 */
function ndf_data_category_contents_html( $post) {
	wp_nonce_field( '_ndf_data_category_contents_settings_nonce', 'ndf_data_category_contents_settings_nonce' ); 
	?>
	<div id="data-category-contents-navigation">
		<h2 class="nav-tab-wrapper current">
			<?php
			$nav_tab_active = '';
			$nav_tab_active_content = 1;
			if( get_option( 'ndf_category_1_filter_show', 1 ) == 1 ){
				?>
				<a class="nav-tab <?php if( empty( $nav_tab_active ) ) { echo $nav_tab_active = 'nav-tab-active'; $nav_tab_active = 1; } ?>" href="javascript:;"><?php echo get_option( 'ndf_category_1_filter_label', 'Category 1' ); ?></a>
				<?php
			}
			if( get_option( 'ndf_category_2_filter_show', 1 ) == 1 ){
				?>
				<a class="nav-tab <?php if( empty( $nav_tab_active ) ) { echo $nav_tab_active = 'nav-tab-active'; $nav_tab_active = 2; } ?>" href="javascript:;"><?php echo get_option( 'ndf_category_2_filter_label', 'Category 2' ); ?></a>
				<?php
			}
			if( get_option( 'ndf_category_3_filter_show', 1 ) == 1 ){
				?>
				<a class="nav-tab <?php if( empty( $nav_tab_active ) ) { echo $nav_tab_active = 'nav-tab-active'; $nav_tab_active = 3; } ?>" href="javascript:;"><?php echo get_option( 'ndf_category_3_filter_label', 'Category 3' ); ?></a>
				<?php
			}
			if( get_option( 'ndf_category_4_filter_show', 1 ) == 1 ){
				?>
				<a class="nav-tab <?php if( empty( $nav_tab_active ) ) { echo $nav_tab_active = 'nav-tab-active'; $nav_tab_active = 4; } ?>" href="javascript:;"><?php echo get_option( 'ndf_category_4_filter_label', 'Category 4' ); ?></a>
				<?php
			}
			if( get_option( 'ndf_category_5_filter_show', 1 ) == 1 ){
				?>
				<a class="nav-tab <?php if( empty( $nav_tab_active ) ) { echo $nav_tab_active = 'nav-tab-active'; $nav_tab_active = 5; } ?>" href="javascript:;"><?php echo get_option( 'ndf_category_5_filter_label', 'Category 5' ); ?></a>
				<?php
			}
			?>
		</h2>

		<?php
		if( get_option( 'ndf_category_1_filter_show', 1 ) == 1 ){
			include_once( 'meta-box-partials/category-1.php' );
		}
		if( get_option( 'ndf_category_2_filter_show', 1 ) == 1 ){
			include_once( 'meta-box-partials/category-2.php' );
		}
		if( get_option( 'ndf_category_3_filter_show', 1 ) == 1 ){
			include_once( 'meta-box-partials/category-3.php' );
		}
		if( get_option( 'ndf_category_4_filter_show', 1 ) == 1 ){
			include_once( 'meta-box-partials/category-4.php' );
		}
		if( get_option( 'ndf_category_5_filter_show', 1 ) == 1 ){
			include_once( 'meta-box-partials/category-5.php' );
		}
		?>
	</div>
	<?php
}

/**
 * Display of the More Info Shortcode meta box.
 * @param object $post Current post info.
 * @return mixed Meta box fields.
 */
function ndf_data_more_info_shortcode_html( $post) {
	echo '[wp_comparison_more_info id='.$post->ID.']';
}

/**
 * Display of the More Info Fields.
 * @param object $post Current post info.
 * @return mixed Meta box fields.
 */
function ndf_data_more_info_html( $post) {
	?>
	<table class="wp-list-table widefat ndf_no_border">
		<?php
		global $wpdb;
		$NDFFieldGenerator = new NDFFieldGenerator();
		$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
		// $field_rows = $wpdb->get_results( "SELECT * FROM $ndf_data_filtering_saved_fields WHERE hidden = '0' ORDER BY field_order ASC" );
		$field_rows = $wpdb->get_results( "SELECT * FROM $ndf_data_filtering_saved_fields  ORDER BY field_order ASC" );

		if( empty(  $field_rows ) ){
			?>
			<tr>
				<!-- <td><em><a href="< ?php echo admin_url('admin.php?page=ndf-more-info-settings'); ?>">Add fields here</a></em></td> -->
				<td><em><a href="<?php echo admin_url('admin.php?page=wcp-more-info-settings'); ?>">Add fields here</a></em></td>
			</tr>
			<?php
		}
		else{
			foreach( $field_rows as $field_row ){
				$field_values = $field_row->field_values;
				$ndf_meta_field_data = ndf_data_settings_get_meta( 'ndf_fields_'.$field_row->ID );

				if( $field_row->field_type == 'section' ){
					$field_values = $field_row->field_values;
					echo '<tr>';
						echo '<td colspan="2">';
						echo $generated_field = $NDFFieldGenerator->generateField( 
						$field_row->field_type,  $field_row->label, $field_values, $field_row->default_value, $field_row->required, $field_values, $field_row->default_value
					);
						echo '</td>';
					echo '</tr>';
				}
				else{
					$required_field = '';
					if( $field_row->required == 1 ){
						$required_field = '<span class="ndf_required">* </span>';
					}
					?>
					<tr>
						<td style="width:25%;"><strong><?php echo $required_field . '' . $field_row->label; ?></strong></td>
						<td style="width:75%;">
							<?php 
							if( $field_row->field_type == 'name' ){
								echo $generated_field = $NDFFieldGenerator->generateField( 
									'name',  'ndf_fields_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $ndf_meta_field_data, $ndf_meta_field_data
								);
								// print_r($generated_field)
							}
							/*else if( $field_row->field_type == 'list' ){
								echo $generated_field = $NDFFieldGenerator->generateField( 
									'list',  'ndf_fields_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $ndf_meta_field_data, $ndf_meta_field_data
								);
							}*/
							else if( $field_row->field_type == 'checkbox' ){
								$ndf_meta_field_data = get_post_meta( $post->ID, 'ndf_fields_'.$field_row->ID, false );
								
								echo $generated_field = $NDFFieldGenerator->generateField( 
									$field_row->field_type,  'ndf_fields_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $ndf_meta_field_data, $ndf_meta_field_data
								);
							}
							else if( $field_row->field_type == 'list' ){
								$ndf_meta_field_data = get_post_meta( $post->ID, 'ndf_fields_'.$field_row->ID, false );
								
								echo $generated_field = $NDFFieldGenerator->generateField( 
									$field_row->field_type,  'ndf_fields_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $ndf_meta_field_data, $ndf_meta_field_data
								);
							}
							else{
								echo $generated_field = $NDFFieldGenerator->generateField( 
									$field_row->field_type,  'ndf_fields_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $ndf_meta_field_data, $ndf_meta_field_data
								);
							}
							?>
						</td>
					</tr>
					<?php
				}
			}
		}
		?>
	</table>
	<?php
}

/**
 * Display of the Data Settings meta box.
 * @param object $post Current post info.
 * @return mixed Meta box fields.
 */
function ndf_enquiry_details_html( $post) {
	wp_nonce_field( '_ndf_enquiry_details_nonce', 'ndf_enquiry_details_nonce' );

	//update_post_meta( get_the_ID(), 'ndf_enquiry_details_email_status', 'failed' );
	$ndf_enquiry_details_email_status = ndf_data_settings_get_meta( 'ndf_enquiry_details_email_status' );
	if( $ndf_enquiry_details_email_status != 'sent' ){
		echo '<div class="ndf_enquiry_notification"></div>';
	}
	?>
	<table class="wp-list-table widefat ndf_no_border">
		<tr>
			<td><strong>Email Status</strong></td>
			<td>
				<select name='ndf_enquiry_details_email_status' id="ndf_enquiry_details_email_status" class='ndf_dropdown'>
				<?php
				echo "<option value='sent' ".selected( $ndf_enquiry_details_email_status, 'sent', false ).">Sent</option>";
				echo "<option value='failed' ".selected( $ndf_enquiry_details_email_status, 'failed', false ).">Failed</option>";
				?>
				</select>
				<?php
				if( $ndf_enquiry_details_email_status != 'sent' ){
					echo '<input type="button" value="Resend Mail" class="button button-secondary" id="wcp_enquiry_resend_mail" data-modal-id="'.get_the_ID().'">';
				}
				?><div class="spinner" style="float:none;width:auto;height:auto;padding:10px 0 10px 50px;background-position:0px;margin: 0 0 0 4px;"></div>
			</td>
		</tr>
		<tr>
			<td><strong>Enquiry To</strong></td>
			<td>
				<?php
				$ndf_enquiry_to_id = ndf_data_settings_get_meta( 'ndf_enquiry_to_id' );
				$ndf_enquiry_to_recipient = ndf_data_settings_get_meta( 'ndf_enquiry_to_recipient' );
				
				$ndf_data_title = '';
				
				$ndf_get_post_title = get_post($ndf_enquiry_to_id);
				if( $ndf_get_post_title ){
					$ndf_data_title = $ndf_get_post_title->post_title;
				}
				?>
				<p><strong>ID:</strong> <?php echo $ndf_enquiry_to_id; ?></p>
				<p><?php echo $ndf_data_title; ?></p>
				<p><?php echo $ndf_enquiry_to_recipient; ?></p>
			</td>
		</tr>
		<tr>
			<td><strong>Name</strong></td>
			<td>
				<input type="text" class="widefat" name="ndf_enquiry_details_name" id="ndf_enquiry_details_name" value="<?php echo ndf_data_settings_get_meta( 'ndf_enquiry_details_name' ); ?>">
			</td>
		</tr>
		<tr>
			<td><strong>Email</strong></td>
			<td>
				<input type="text" class="widefat" name="ndf_enquiry_details_email" id="ndf_enquiry_details_email" value="<?php echo ndf_data_settings_get_meta( 'ndf_enquiry_details_email' ); ?>">
			</td>
		</tr>
		<tr>
			<td><strong>Phone</strong></td>
			<td>
				<input type="text" class="widefat" name="ndf_enquiry_details_phone" id="ndf_enquiry_details_phone" value="<?php echo ndf_data_settings_get_meta( 'ndf_enquiry_details_phone' ); ?>">
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Display of the Outbound Clicks Info meta box.
 * @param object $post Current post info.
 * @return mixed Meta box fields.
 */
function ndf_outbound_clicks_info_html( $post) {
	wp_nonce_field( '_ndf_outbound_clicks_info_nonce', 'ndf_outbound_clicks_info_nonce' );

	?>
	<table class="wp-list-table widefat ndf_no_border">
		<tr>
			<td><strong>URL</strong></td>
			<td>
				<input type="text" class="widefat" name="wcp_url" id="wcp_url" value="<?php echo ndf_data_settings_get_meta( 'wcp_url' ); ?>">
			</td>
		</tr>
		<tr>
			<td><strong>WCP Data ID</strong></td>
			<td>
				<input type="text" class="widefat" name="wcp_data_ID" id="wcp_data_ID" value="<?php echo ndf_data_settings_get_meta( 'wcp_data_ID' ); ?>">
			</td>
		</tr>
		<tr>
		<td><strong>Timestamp</strong></td>
			<td>
				<?php
				$wcp_timestamp = ndf_data_settings_get_meta( 'wcp_timestamp' );
				if( $wcp_timestamp ){
					echo '<ul>';
					$wcp_timestamp = array_reverse( $wcp_timestamp );
					foreach( $wcp_timestamp as $timestamp ){
						echo '<li>'.date( 'd-m-Y H:i', $timestamp ).'</li>';
					}
					echo '</ul>';
				}
				?>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Saving Data Settings meta box fields value.
 * @param object $post Current post info.
 * @return void
 */
function ndf_data_settings_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if( ! get_post_meta( $post_id, 'ndf_data_settings_featured_data_', true ) ) {
		update_post_meta( $post_id, 'ndf_data_settings_featured_data_', null );
	}
	if( ! get_post_meta( $post_id, 'ndf_data_settings_sort_order', true ) ) {
		update_post_meta( $post_id, 'ndf_data_settings_sort_order', 'ZZZZ' );
	}
	if( ! get_post_meta( $post_id, 'ndf_data_mr_ratingrank', true ) ) {
		update_post_meta( $post_id, 'ndf_data_mr_ratingrank', 0 );
	}

	if ( ! isset( $_POST['ndf_data_settings_nonce'] ) || ! wp_verify_nonce( $_POST['ndf_data_settings_nonce'], '_ndf_data_settings_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	$ndf_data_more_info_button_action = '';

	/*
	 * Data Settings tab fields
	 */

	if ( isset( $_POST['ndf_data_settings_featured_data_'] ) ){
		update_post_meta( $post_id, 'ndf_data_settings_featured_data_', esc_attr( $_POST['ndf_data_settings_featured_data_'] ) );
	}
	else{
		update_post_meta( $post_id, 'ndf_data_settings_featured_data_', null );
	}

	if ( isset( $_POST['ndf_data_settings_sort_order'] ) ){
		$ndf_sort_order_value = substr( sanitize_text_field( $_POST['ndf_data_settings_sort_order'] ), 0, 3 );
		if( empty( $ndf_sort_order_value ) ){
			$ndf_sort_order_value = 'ZZZZ';
		}

		update_post_meta( $post_id, 'ndf_data_settings_sort_order', $ndf_sort_order_value );
	}
	else{
		update_post_meta( $post_id, 'ndf_data_settings_sort_order', 'ZZZZ' );
	}

	if ( isset( $_POST['ndf_data_settings_data_heading'] ) ){
		update_post_meta( $post_id, 'ndf_data_settings_data_heading', trim( $_POST['ndf_data_settings_data_heading'] ) );
	}

	/*
	 * More Information tab fields
	 */
	if ( isset( $_POST['ndf_data_star_rating'] ) ){
		update_post_meta( $post_id, 'ndf_data_star_rating', $_POST['ndf_data_star_rating'] );
	}
	if ( isset( $_POST['ndf_data_star_rating_custom'] ) ){
		update_post_meta( $post_id, 'ndf_data_star_rating_custom', trim( $_POST['ndf_data_star_rating_custom'] ) );
	}

	if ( isset( $_POST['ndf_data_more_info_button_action'] ) ){
		$ndf_data_more_info_button_action = $_POST['ndf_data_more_info_button_action'];
		update_post_meta( $post_id, 'ndf_data_more_info_button_action', $ndf_data_more_info_button_action );
	}

	if ( isset( $_POST['ndf_data_more_info_link'] ) ){
		update_post_meta( $post_id, 'ndf_data_more_info_link', esc_url( $_POST['ndf_data_more_info_link'] ) );
	}

	if ( isset( $_POST['ndf_data_more_info_button_target'] ) ){
		if( $ndf_data_more_info_button_action == 'external-link' ){
			update_post_meta( $post_id, 'ndf_data_more_info_button_target', $_POST['ndf_data_more_info_button_target'] );
		}
		else{
			update_post_meta( $post_id, 'ndf_data_more_info_button_target', '' );
		}
	}
	
	if ( isset( $_POST['ndf_data_more_info_content'] ) ){
		update_post_meta( $post_id, 'ndf_data_more_info_content', $_POST['ndf_data_more_info_content'] );
	}

	if ( isset( $_POST['ndf_data_enquiry_form'] ) ){
		update_post_meta( $post_id, 'ndf_data_enquiry_form', trim( $_POST['ndf_data_enquiry_form'] ) );
	}
	
	if ( isset( $_POST['ndf_data_recipient_email'] ) ){
		update_post_meta( $post_id, 'ndf_data_recipient_email', sanitize_email( $_POST['ndf_data_recipient_email'] ) );
	}
	//check box enable email request on each wcp data
	if ( isset( $_POST['ndf_data_enable_request_form_meta_box'] ) ){
		update_post_meta( $post_id, 'ndf_data_enable_request_form_meta_box',1 );
		// update_post_meta($post->ID,'ndf_data_enable_request_form_meta_box',$_POST['ndf_data_enable_request_form_meta_box']);
	}
	else{
		// $check_box = $_POST['ndf_data_enable_request_form_meta_box'] ;
		update_post_meta( $post_id, 'ndf_data_enable_request_form_meta_box',0);
	}

	/*
	 * More Information Fields tab fields
	 */
}
add_action( 'save_post', 'ndf_data_settings_save' );


/**
 * Saving Category Contents meta box fields value.
 * @param object $post Current post info.
 * @return void
 */
function ndf_data_category_contents_settings_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['ndf_data_category_contents_settings_nonce'] ) || ! wp_verify_nonce( $_POST['ndf_data_category_contents_settings_nonce'], '_ndf_data_category_contents_settings_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	/*
	 * Category 1 tab fields
	 */
	if ( isset( $_POST['ndf_data_category_1_content_option'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_1_content_option', esc_attr( $_POST['ndf_data_category_1_content_option'] ) );
	}
	if ( isset( $_POST['ndf_data_category_1_content_type'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_1_content_type', esc_attr( $_POST['ndf_data_category_1_content_type'] ) );
	}
	if ( isset( $_POST['ndf_data_category_1_content'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_1_content', $_POST['ndf_data_category_1_content'] );
	}

	/*
	 * Category 2 tab fields
	 */
	if ( isset( $_POST['ndf_data_category_2_content_option'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_2_content_option', esc_attr( $_POST['ndf_data_category_2_content_option'] ) );
	}
	if ( isset( $_POST['ndf_data_category_2_content_type'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_2_content_type', esc_attr( $_POST['ndf_data_category_2_content_type'] ) );
	}
	if ( isset( $_POST['ndf_data_category_2_content'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_2_content', $_POST['ndf_data_category_2_content'] );
	}

	/*
	 * Category 3 tab fields
	 */
	if ( isset( $_POST['ndf_data_category_3_content_option'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_3_content_option', esc_attr( $_POST['ndf_data_category_3_content_option'] ) );
	}
	if ( isset( $_POST['ndf_data_category_3_content_type'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_3_content_type', esc_attr( $_POST['ndf_data_category_3_content_type'] ) );
	}
	if ( isset( $_POST['ndf_data_category_3_content'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_3_content', $_POST['ndf_data_category_3_content'] );
	}

	/*
	 * Category 4 tab fields
	 */
	if ( isset( $_POST['ndf_data_category_4_content_option'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_4_content_option', esc_attr( $_POST['ndf_data_category_4_content_option'] ) );
	}
	if ( isset( $_POST['ndf_data_category_4_content_type'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_4_content_type', esc_attr( $_POST['ndf_data_category_4_content_type'] ) );
	}
	if ( isset( $_POST['ndf_data_category_4_content'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_4_content', $_POST['ndf_data_category_4_content'] );
	}

	/*
	 * Category 5 tab fields
	 */
	if ( isset( $_POST['ndf_data_category_5_content_option'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_5_content_option', esc_attr( $_POST['ndf_data_category_5_content_option'] ) );
	}
	if ( isset( $_POST['ndf_data_category_5_content_type'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_5_content_type', esc_attr( $_POST['ndf_data_category_5_content_type'] ) );
	}
	if ( isset( $_POST['ndf_data_category_5_content'] ) ){
		update_post_meta( $post_id, 'ndf_data_category_5_content', $_POST['ndf_data_category_5_content'] );
	}
	
	// get all assigned terms
	global $post;
	$array_of_taxonomies = array( 'ndf_category_1', 'ndf_category_2', 'ndf_category_3', 'ndf_category_4', 'ndf_category_5' );
	foreach( $array_of_taxonomies as $wcp_tax ){
		$terms = wp_get_post_terms($post_id, $wcp_tax );
		foreach($terms as $term){
			while($term->parent != 0 && !has_term( $term->parent, $wcp_tax, $post )){
				// move upward until we get to 0 level terms
				wp_set_post_terms($post_id, array($term->parent), $wcp_tax, true);
				$term = get_term($term->parent, $wcp_tax);
			}
		}
	}
}
add_action( 'save_post', 'ndf_data_category_contents_settings_save' );

function ndf_data_more_info_field_settings_save( $post_id ){
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['ndf_data_category_contents_settings_nonce'] ) || ! wp_verify_nonce( $_POST['ndf_data_category_contents_settings_nonce'], '_ndf_data_category_contents_settings_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	global $wpdb;

	$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
	$field_rows = $wpdb->get_results( "SELECT ID, field_type FROM $ndf_data_filtering_saved_fields WHERE hidden = '0'" );

	foreach( $field_rows as $field_row ){
		$ndf_meta_field_data = 'ndf_fields_'.$field_row->ID;

		$meta_value = '';
		if( isset($_POST[$ndf_meta_field_data]) ){
			$meta_value = $_POST[$ndf_meta_field_data];
		}

		if( $field_row->field_type == 'checkbox' || $field_row->field_type == 'list' ){
			delete_post_meta( $post_id, $ndf_meta_field_data );
			if( is_array( $meta_value )){
				foreach( $meta_value as $field_value ){
					add_post_meta( $post_id, $ndf_meta_field_data, trim( $field_value ) );
				}
			}
			else{
				add_post_meta( $post_id, $ndf_meta_field_data, trim( $meta_value ) );
			}
		}
		else if( $field_row->field_type == 'name' ){
			if( is_array( $meta_value )){
				foreach( $meta_value as $field_value ){
				
					// add_post_meta( $post_id, $ndf_meta_field_data, trim( $field_value ) );
					update_post_meta($post_id,$ndf_meta_field_data,serialize($meta_value));
				}
				
			}
			else{
				// $meta_value = json_decode($meta_value, true);
				// add_post_meta( $post_id, $ndf_meta_field_data, $meta_value );
				echo '<pre>';
				print_r($meta_value);
				echo '<pre>';
				die();
			}
		}
		else{
			if( is_array( $meta_value )){
				$meta_value = array_map('trim', $meta_value);
				update_post_meta( $post_id, $ndf_meta_field_data, $meta_value );
			}
			else{
				update_post_meta( $post_id, $ndf_meta_field_data, trim( $meta_value ) );
			}
		}
	}
}
add_action( 'save_post', 'ndf_data_more_info_field_settings_save' );

/**
 * Set order of meta boxes.
 * @param array $order Order of meta boxes.
 * @return void
 */
function metabox_order( $order ) {
    return array(
        'advanced' => join( 
            ",", 
            array(
                'ndf_data_settings-data-settings',
                'ndf_data_settings-more-info-settings',
                'ndf_data_category-data-category-contents',
            )
        ),
		'side' => join( 
            ",", 
            array(
                'submitdiv',
                'ndf_data_more_info_shortcode-data-more-info-shortcode',
                'ndf_category_1div',
                'ndf_category_2div',
                'ndf_category_3div',
                'ndf_category_4div',
                'ndf_category_5div',
            )
        ),
    );
}
add_filter( 'get_user_option_meta-box-order_ndf_data', 'metabox_order' );