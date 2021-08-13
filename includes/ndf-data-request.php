<?php
/**
 * Processes the AJAX requests
 * 
 * Parameters are passed through POST method.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 * @param 		string `security` Generated wordpress security token.
 * @param 		string `ndf_more` Identifier to check whether `Load More` button is clicked in making the request.
 * @param 		int `load_limit` Number of posts to display.
 * @param 		string `ndf_fc_1` Category 1 terms that will be used in filtering.
 * @param 		string `ndf_fc_2` Category 2 terms that will be used in filtering.
 * @param 		string `ndf_fc_3` Category 3 terms that will be used in filtering.
 * @param 		string `ndf_fc_4` Category 4 terms that will be used in filtering.
 * @param 		string `ndf_fc_3` Category 5 terms that will be used in filtering.
 * @return 		mixed Returns the data filtered by selected categories.
 */

//Check if field group is empty
 function save_field_groups_callback(){
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		global $wpdb;
		$ndf_table_name = $wpdb->prefix . 'ndf_data_filtering_saved_fields';

		$query = ("SELECT * FROM $ndf_table_name");
		$results = $wpdb->get_results($query);
		$field_groups_settings = array();
		$register_section_1_name = get_option( 'register_section_1_name', 'default' );
		$register_section_2_name = get_option( 'register_section_2_name', 'default' );
		$register_section_3_name = get_option( 'register_section_3_name', 'default' );
		$field_groups_settings = [
            $register_section_1_name,
            $register_section_2_name,
            $register_section_3_name
        ];
        $db_field_group_values = array();
        foreach($results as $check_if_present){
            $db_field_group_values [] = $check_if_present->field_group;
        }	
        $remove_this = array_diff($db_field_group_values , $field_groups_settings);
       foreach($remove_this as $deleted_section_title){
        $update_values = ("UPDATE `$ndf_table_name` SET `field_group` = NULL  WHERE `field_group` = '$deleted_section_title'");
        $wpdb->query($update_values);
       }
	}
 }
add_action( 'wp_ajax_save_field_groups', 'save_field_groups_callback' );
add_action( 'wp_ajax_nopriv_save_field_groups', 'save_field_groups_callback' );

//Reset ndf_data_filtering_saved_fields field groups to Null 
function reset_field_groups_callback_function(){
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		global $wpdb;
		$ndf_table_name = $wpdb->prefix . 'ndf_data_filtering_saved_fields';
		$query = ("UPDATE $ndf_table_name SET `field_group` = NULL");
		$wpdb->query($query);

		update_option('register_section_1_name','default');
		update_option('register_section_2_name','default');
		update_option('register_section_3_name','default');

		wp_send_json( $return );
	}
}
add_action( 'wp_ajax_reset_field_groups', 'reset_field_groups_callback_function' );
add_action( 'wp_ajax_nopriv_reset_field_groups', 'reset_field_groups_callback_function' );


function callback_send_random_email(){
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		global $wpdb;
        $recipients = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = 'ndf_data_recipient_email'" );
		$to = get_option('admin_email');
		$name = $_POST['name'];
		$client_email = $_POST['email'];
		$client_phone = $_POST['phone'];
		$client_request= $_POST['request'];
        $message = '<table>
                        <tr><td>Name:</td><td>'.$name.'</td></tr>
                        <tr><td>Email:</td><td>'.$client_email.'</td></tr><tr>
                        <td>Phone:</td><td>'.$client_phone.'</td></tr>
                        <tr><td>Request:</td><td>'.$client_request.'</td></tr>
                    </table>';
                    
        $subject = "You have received a quote request from :".get_site_url();
        $headers = array('Content-Type: text/html; charset=UTF-8');
        
          $to_send = array();
          $counter = 0;
          $count_valid_recipients = array();
          foreach($recipients as $filter_valid_recipients):
             if(!empty($filter_valid_recipients)){
				if(in_array($filter_valid_recipients,$count_valid_recipients)){

				}else{
				   $count_valid_recipients [] = $filter_valid_recipients;
				}
             }
          endforeach;
          //for sending  less than 3 emails
          if(count($count_valid_recipients ) < 3)
          {
            foreach ($count_valid_recipients as $valid_recipients) {
                $sent = wp_mail($valid_recipients, $subject,$message, $headers);
                if($sent){
                    // Save data on quotesentry posttype
                    $post_type = 'quotesentry';
                    $front_post = array(
                    'post_title'    => $client_email,
                    'post_status'   => 'publish',          
                    'post_type'     => $post_type 
                    );
                    $post_id = wp_insert_post($front_post);
                    update_post_meta($post_id, "quotes_email_subject_field", $subject);
                    update_post_meta($post_id, "quotes_sender_email_field", $client_email);
                    update_post_meta($post_id, "quotes_sent_to_field", $valid_recipients);
                    update_post_meta($post_id, "quotes_sender_phone_field", $client_phone);
                    update_post_meta($post_id, "quotes_sender_request_description_field", $client_request);
                    // end saving data
                }
            }
        
          }
          else{
                while($counter < 3):
                    $random_numbers = array_rand($recipients);
                        if(!empty($recipients[$random_numbers]))
                        {
                            if(in_array($recipients[$random_numbers],$to_send)){ /* do something */}
                            else {    $to_send [] = $recipients[$random_numbers]; $counter++; }
                        }
                        else{ /*  do something */ }
                endwhile;

                foreach($to_send as $recipient_email):
                    $sent = wp_mail($recipient_email, $subject,$message, $headers);
                    if($sent)
                    {
                                // Save data on quotesentry posttype
                                $post_type = 'quotesentry';
                                $front_post = array(
                                'post_title'    => $client_email,
                                'post_status'   => 'publish',          
                                'post_type'     => $post_type 
                                );
                                $post_id = wp_insert_post($front_post);
                                update_post_meta($post_id, "quotes_email_subject_field", $subject);
                                update_post_meta($post_id, "quotes_sender_email_field", $client_email);
                                update_post_meta($post_id, "quotes_sent_to_field", $recipient_email);
                                update_post_meta($post_id, "quotes_sender_phone_field", $client_phone);
                                update_post_meta($post_id, "quotes_sender_request_description_field", $client_request);
                                // end saving data
                    }
                    else
                    {
                        echo 'Unable to send';
                    }
                endforeach;  
                
            }
	}

}
add_action( 'wp_ajax_send_random_email', 'callback_send_random_email' );
add_action( 'wp_ajax_nopriv_send_random_email', 'callback_send_email' );
/** */
function callback_send_email(){
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
	  $recipient_id = $_POST['id'];
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
      $request= $_POST['message'];
		
	  global $wpdb;
	  $to = get_option('admin_email');
	  $message = '<table>
					  <tr><td>Name:</td><td>'.$name.'</td></tr>
					  <tr><td>Email:</td><td>'.$email.'</td></tr><tr>
					  <td>Phone:</td><td>'.$phone.'</td></tr>
					  <tr><td>Request:</td><td>'.$request.'</td></tr>
				  </table>';
				  
	  $subject = "You have received a quote request from :".get_site_url();
	  $headers = array('Content-Type: text/html; charset=UTF-8');
	  $recipient = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = $recipient_id and meta_key = 'ndf_data_recipient_email'" );
	  $sent = wp_mail($recipient[0], $subject,$message, $headers);
		if($sent)
		{
				// Save data on quotesentry posttype
				$post_type = 'quotesentry';
				$front_post = array(
				'post_title'    => $email,
				'post_status'   => 'publish',          
				'post_type'     => $post_type 
				);
				$post_id = wp_insert_post($front_post);
				update_post_meta($post_id, "quotes_email_subject_field", $subject);
				update_post_meta($post_id, "quotes_sender_email_field", $email);
				update_post_meta($post_id, "quotes_sent_to_field", $recipient[0]);
				update_post_meta($post_id, "quotes_sender_phone_field", $phone);
				update_post_meta($post_id, "quotes_sender_request_description_field", $request);
				// end saving data
				?>
				<script>
					alert('Thank you, we will get back to you as soon as posible');
				</script>
				<?php
		}
		else{

		}

	}
}
add_action( 'wp_ajax_send_email', 'callback_send_email' );
add_action( 'wp_ajax_nopriv_send_email', 'callback_send_email' );
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ndf_filter_data_request() {
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		/*ob_clean();*/

		global $wpdb;
		
		$show_cat_1 = false;
		$show_cat_2 = false;
		$show_cat_3 = false;
		$show_cat_4 = false;
		$show_cat_5 = false;
		$show_category_column_count = 0;
		$show_category_column = false;

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
		
		$ndf_order_by = get_option( 'ndf_query_results_order_by', 'date' );
		$ndf_order = get_option( 'ndf_query_results_order', 'DESC' );

		$ndf_data_results_layout = isset( $_POST['ndf_table_layout'] ) ? $_POST['ndf_table_layout'] : 'tabular';
		$nonce = $_POST['security'];
		if ( empty($_POST) || !wp_verify_nonce( $nonce, 'ndf-nonce' ) ) die('An error occurred. Please contact the Administrator.');

		$output = '';
		$ndf_max_data = 'no';
		$ndf_view_all = 'no';
		$ndf_more = sanitize_text_field( $_POST['ndf_more'] );
		$ndf_hidden_cols_in_view = isset( $_POST['ndf_hidden_cols_in_view'] ) ? $_POST['ndf_hidden_cols_in_view'] : '';

		$ndf_query_results_filter_operator = get_option( 'ndf_query_results_filter_operator', 'AND' );
		
		$category = array( 'relation'	=> "$ndf_query_results_filter_operator" );
		$load_limit = intval( $_POST['load_limit'] );
		
		if ( wcp_fs()->is_free_plan() || wcp_fs()->is_not_paying() ) {
			$load_limit = ( $load_limit >= 10 ) ? 10 : $load_limit;
		}

		$ndf_fc_1 = isset( $_POST['ndf_fc_1'] ) ? $_POST['ndf_fc_1'] : 'view-all';
		$ndf_fc_2 = isset( $_POST['ndf_fc_2'] ) ? $_POST['ndf_fc_2'] : 'view-all';
		$ndf_fc_3 = isset( $_POST['ndf_fc_3'] ) ? $_POST['ndf_fc_3'] : 'view-all';
		$ndf_fc_4 = isset( $_POST['ndf_fc_4'] ) ? $_POST['ndf_fc_4'] : 'view-all';
		$ndf_fc_5 = isset( $_POST['ndf_fc_5'] ) ? $_POST['ndf_fc_5'] : 'view-all';

		/* Handle View All */
		if( $ndf_fc_1 == 'view-all' && $ndf_fc_2 == 'view-all' && $ndf_fc_3 == 'view-all' && $ndf_fc_4 == 'view-all' && $ndf_fc_5 == 'view-all' ){
			$ndf_more = 'no';
			$ndf_view_all = 'yes';
		}

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

		if( $show_cat_1 ){ $show_category_column_count++; }
		if( $show_cat_2 ){ $show_category_column_count++; }
		if( $show_cat_3 ){ $show_category_column_count++; }
		if( $show_cat_4 ){ $show_category_column_count++; }
		if( $show_cat_5 ){ $show_category_column_count++; }

		if ( $show_cat_1 || $show_cat_2 || $show_cat_3 || $show_cat_4 || $show_cat_5 ){
			$show_category_column = true;
		}

		if ( ! empty( $get_cat_1_terms ) && ! is_wp_error( $get_cat_1_terms ) ){
			/* Add Category 1 Filter to Query */
			if( $ndf_fc_1 != 'view-all' ){
				$ndf_fc_1 = ndf_remove_term_with_child( $ndf_fc_1, 'ndf_category_1' );
				if( !empty( $ndf_fc_1 ) ){
					$category[] = array( 'taxonomy' => 'ndf_category_1', 'include_children' => false, 'field' => 'slug', 'terms' => $ndf_fc_1 );
				}
			}
		}
		if ( ! empty( $get_cat_2_terms ) && ! is_wp_error( $get_cat_2_terms ) ){
			/* Add Category 2 Filter to Query */
			if( $ndf_fc_2 != 'view-all' ){
				$ndf_fc_2 = ndf_remove_term_with_child( $ndf_fc_2, 'ndf_category_2' );
				if( !empty( $ndf_fc_2 ) ){
					$category[] = array( 'taxonomy' => 'ndf_category_2', 'include_children' => false, 'field' => 'slug', 'terms' => $ndf_fc_2 );
				}
			}
		}
		if ( ! empty( $get_cat_3_terms ) && ! is_wp_error( $get_cat_3_terms ) ){
			/* Add Category 3 Filter to Query */
			if( $ndf_fc_3 != 'view-all' ){
				$ndf_fc_3 = ndf_remove_term_with_child( $ndf_fc_3, 'ndf_category_3' );
				if( !empty( $ndf_fc_3 ) ){
					$category[] = array( 'taxonomy' => 'ndf_category_3', 'include_children' => false, 'field' => 'slug', 'terms' => $ndf_fc_3 );
				}
			}
		}
		if ( ! empty( $get_cat_4_terms ) && ! is_wp_error( $get_cat_4_terms ) ){
			/* Add Category 4 Filter to Query */
			if( $ndf_fc_4 != 'view-all' ){
				$ndf_fc_4 = ndf_remove_term_with_child( $ndf_fc_4, 'ndf_category_4' );
				if( !empty( $ndf_fc_4 ) ){
					$category[] = array( 'taxonomy' => 'ndf_category_4', 'include_children' => false, 'field' => 'slug', 'terms' => $ndf_fc_4 );
				}
			}
		} 
		if ( ! empty( $get_cat_5_terms ) && ! is_wp_error( $get_cat_5_terms ) ){
			/* Add Category 5 Filter to Query */
			if( $ndf_fc_5 != 'view-all' ){
				$ndf_fc_5 = ndf_remove_term_with_child( $ndf_fc_5, 'ndf_category_5' );
				if( !empty( $ndf_fc_5 ) ){
					$category[] = array( 'taxonomy' => 'ndf_category_5', 'include_children' => false, 'field' => 'slug', 'terms' => $ndf_fc_5 );
				}
			}
		}
		/* check if it is a free version and limit the data on search */
		if ( wcp_fs()->is_free_plan() || wcp_fs()->is_not_paying() ) {
			$total_ndf_data = wp_count_posts('ndf_data')->publish;
			$table_name = $wpdb->prefix.'posts' ;
			$query_id_results = $wpdb->get_col("SELECT * FROM $table_name WHERE post_type = 'ndf_data' AND post_status = 'publish' ORDER BY ID DESC");
			if(count($query_id_results) > 10){
				for($remove_counter = 0; $remove_counter < 10; $remove_counter++ ){
					unset($query_id_results[$remove_counter]);
				}
				$ndf_args = array( 'post_type' => array( 'ndf_data' ), 'post_status' => array( 'publish' ),'post__not_in' => $query_id_results, 'posts_per_page' => $load_limit, 'orderby' => array( 'ndf_data_settings_featured_data_' => 'DESC', 'ndf_sort_order_clause' => 'ASC', $ndf_order_by => $ndf_order, ), 'meta_key' => 'ndf_data_settings_featured_data_' );
			}
			else{
				$ndf_args = array( 'post_type' => array( 'ndf_data' ), 'post_status' => array( 'publish' ), 'posts_per_page' => $load_limit, 'orderby' => array( 'ndf_data_settings_featured_data_' => 'DESC', 'ndf_sort_order_clause' => 'ASC', $ndf_order_by => $ndf_order, ), 'meta_key' => 'ndf_data_settings_featured_data_' );
			}
		}else{
			$ndf_args = array( 'post_type' => array( 'ndf_data' ), 'post_status' => array( 'publish' ), 'posts_per_page' => $load_limit, 'orderby' => array( 'ndf_data_settings_featured_data_' => 'DESC', 'ndf_sort_order_clause' => 'ASC', $ndf_order_by => $ndf_order, ), 'meta_key' => 'ndf_data_settings_featured_data_' );
		}
		
		$ndf_args['meta_query'][] = array( 'ndf_sort_order_clause' => array( 'key' => 'ndf_data_settings_sort_order' ));

		if( $ndf_order_by == 'ratings' && ( class_exists( 'MR_Rating_Form' ) || class_exists( 'MRP_Rating_form' ) ) ){
			/* Order Rating Rank DESC, Title ASC*/
			$ndf_args = array( 'post_type' => array( 'ndf_data' ), 'post_status' => array( 'publish' ), 'posts_per_page' => $load_limit, 'orderby' => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ), 'meta_key' => 'ndf_data_mr_ratingrank' );
		}
		
		if( count( $category) >= 2 ){
			$ndf_args['tax_query'] = $category;
		}

		if( !empty( trim($_POST['ndf_keyword_filter']) ) ){
			$ndf_keyword_filter = $_POST['ndf_keyword_filter'];
			$ndf_args['s'] = "$ndf_keyword_filter";
			$ndf_args['sentence'] = true;
			$ndf_args['_WCPExcerptSearch'] = "$ndf_keyword_filter";
		}

		$ndf_af_params = isset( $_POST['ndf_af_params'] ) ? $_POST['ndf_af_params'] : array();
		if( is_array($ndf_af_params) && !empty( $ndf_af_params ) ){
			$ndf_args['meta_query'][] = array( 'relation' => 'AND' );
			foreach( $ndf_af_params as $ndf_meta_key => $ndf_meta_value ){
				$ndf_args['meta_query'][] = array(
					'key' => "$ndf_meta_key",
					'value' => "$ndf_meta_value"
				);
			}
		}

		
		$ndf_query = new WP_Query( $ndf_args );

		if( $ndf_query->have_posts() ) {
			/* Get total number of post returned by the query to add class to last row cells */
			$query_post_count = $ndf_query->post_count;
			$data_counter = 1;
			$last_data_row_class = '';

			$grid_category_column_class = '';
			$grid_moreinfo_column_class = '';

			if( $show_category_column ){
				$grid_category_column_class = 'show';
			}
			if( get_option('ndf_more_info_column_show', 1) == 1 ){
				$grid_moreinfo_column_class = 'show';
			}

			$ndf_data_results_h_layout_options = get_option( 'ndf_data_results_h_layout_options', 'no-label' );

			/* GET MORE INFO FIELDS */				
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

			if( !empty( $field_IDs ) ){
				$field_IDs = implode(',', $field_IDs);
				$get_field_name = $wpdb->get_results( "SELECT `ID`, `field_type`, `label` FROM {$ndf_data_filtering_saved_fields} WHERE  ID IN ($field_IDs)", ARRAY_A );
				foreach( $get_field_name as $key => $get_field_name_value ) {
					$field_info[$get_field_name_value['ID']] = array( 'type' => $get_field_name_value['field_type'], 'label' => $get_field_name_value['label'] );
				}
			}
			/* EO GET MORE INFO FIELDS */

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
						/**Single request Quotes function ajax */
						$ndf_data_enable_request_form_meta_box = get_post_meta($wcp_data_ID);
							$wcp_data_post_id = $post->ID;
							if(!empty($ndf_data_enable_request_form_meta_box['ndf_data_recipient_email'][0])):
								$single_email_request_quotes_form_title_button = get_option( 'single_email_request_quotes_form_title_button', 'Request A Quotes' );
								$request_quotes_form_subtitle = get_option( 'request_quotes_form_subtitle', 'Please provide some contact details' );
								$request_quotes_form_submit_button_text = get_option( 'request_quotes_form_submit_button_text', 'Submit' );
								$request_quotes_form_title = get_option( 'request_quotes_form_title', 'Get Quotes' );

								if($ndf_data_enable_request_form_meta_box['ndf_data_enable_request_form_meta_box'][0] == 1){
									//added function for email
									$output .= '<button class="request-quotes-single-horizontal" btn-title="'.$request_quotes_form_submit_button_text.'" data-title="'.$request_quotes_form_title.'" subtitle="'.$request_quotes_form_subtitle.'" id="request-quotes-single-horizontal" data-modal="'.$wcp_data_ID.'" >'.$single_email_request_quotes_form_title_button.'</button>';
									$output .= '<div id="quotes-modal">';
									$output .= '</div>';
									//end ajax email

								}
							endif;
						/* MORE INFO BUTTON */
						$output .= ndf_get_more_button_template( $wcp_data_ID );
						
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
		}
		else{
			/* No Results Found Row  */
			$output .= "no-results";
		}
		
		$query_found_posts = $ndf_query->found_posts;
		
		if ( wcp_fs()->is_free_plan() || wcp_fs()->is_not_paying() ) {
			$query_found_posts = ( $query_found_posts >= 10 ) ? 10 : $query_found_posts;
		}

		if( $load_limit >= $query_found_posts ){
			$ndf_max_data = 'reached';
			$ndf_more = 'no';
		}
		
		wp_reset_postdata();
		$return = array(
			'ndf_data'					=> $output,
			'ndf_max_data'				=> $ndf_max_data,
			'ndf_more'					=> $ndf_more,
			'ndf_results_count'			=> $ndf_query->post_count,
			'ndf_results_count_all'		=> $query_found_posts,
		);

		wp_send_json( $return );
	}
	else {
		wp_redirect( home_url() ); exit();
	}
}
add_action( 'wp_ajax_nopriv_ndf_filter_data_call', 'ndf_filter_data_request' );
add_action( 'wp_ajax_ndf_filter_data_call', 'ndf_filter_data_request' );

function ndf_update_saved_fields_order(){
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		ob_clean();

		$nonce = $_POST['security'];

		if ( empty($_POST) || !wp_verify_nonce( $nonce, 'ndf-nonce' ) ) die('An error occurred. Please contact the Administrator.');
			global $wpdb;

			$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
			$new_order = $_POST['order'];
			$new_order_array = explode('&', $new_order);
			$new_list = array();

			$i = 1;
			foreach( $new_order_array as $v ){
				$field_id = str_replace('item[]=', '', $v);
				$wpdb->update( $ndf_data_filtering_saved_fields, array('field_order' => $i), array('ID' => $field_id), array('%d'), array('%d') );
				$i++;
			}
			die();

		/*$return = array(
			'ndf_data'		=> $output,
			'ndf_max_data'	=> $ndf_max_data,
			'ndf_more'		=> $ndf_more,
		);

		wp_send_json( $return );*/
	}
	else {
		wp_redirect( home_url() ); exit();
	}
}
add_action( 'wp_ajax_ndf_update_saved_fields_order', 'ndf_update_saved_fields_order' );


function ndf_get_more_info_fields_request() {
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		ob_clean();
		$output = '';
		$nonce = $_POST['security'];

		if ( empty($_POST) || !wp_verify_nonce( $nonce, 'ndf-nonce' ) ) die('An error occurred. Please contact the Administrator.');

		$post_id = $_POST['post_id'];

		$output .= do_shortcode('[wp_comparison_more_info id='.$post_id.']');

		$return = array(
			'ndf_data'		=> $output,
		);

		wp_send_json( $return );
	}
	else {
		wp_redirect( home_url() ); exit();
	}
}
add_action( 'wp_ajax_nopriv_ndf_get_more_info_fields_call', 'ndf_get_more_info_fields_request' );
add_action( 'wp_ajax_ndf_get_more_info_fields_call', 'ndf_get_more_info_fields_request' );

function ndf_get_filters_show_more(){
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		ob_clean();
		$output = '';
		$nonce = $_POST['security'];

		if ( empty($_POST) || !wp_verify_nonce( $nonce, 'ndf-nonce' ) ) die('An error occurred. Please contact the Administrator.');

		$taxonomy = $_POST['taxonomy'];

		echo ndf_show_filters_hierarchy( $taxonomy, 0, array(), '1', 0, 0 )[1];
		die();

		/*$return = array(
			'ndf_data'		=> $output,
		);

		wp_send_json( $return );*/
	}
	else {
		wp_redirect( home_url() ); exit();
	}
}
add_action( 'wp_ajax_nopriv_ndf_get_filters_show_more_call', 'ndf_get_filters_show_more' );
add_action( 'wp_ajax_ndf_get_filters_show_more_call', 'ndf_get_filters_show_more' );

function ndf_enquiry_form_submit(){
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		$output = '';
		$message = '';
		$mail_status = 'failed';
		$resend = '';
		$nonce = $_POST['security'];

		if ( empty($_POST) || !wp_verify_nonce( $nonce, 'ndf-nonce' ) ) die('An error occurred. Please contact the Administrator.');

		$post_id = $_POST['post_id'];
		if( isset( $_POST['resend'] ) ){
			$resend = ' (resend)';
			$ndf_enquiry_to_id = ndf_data_settings_get_meta( 'ndf_enquiry_to_id', $post_id );
			
			$ndf_enquiry_name = ndf_data_settings_get_meta( 'ndf_enquiry_details_name', $post_id );
			$ndf_enquiry_email = ndf_data_settings_get_meta( 'ndf_enquiry_details_email', $post_id );
			$ndf_enquiry_phone = ndf_data_settings_get_meta( 'ndf_enquiry_details_phone', $post_id );
			$ndf_enquiry_content = '';
			$ndf_get_post_obj = get_post($post_id);
			if( $ndf_get_post_obj ){
				$ndf_enquiry_content = $ndf_get_post_obj->post_content;
			}
		}
		else{
			$ndf_enquiry_to_id = $post_id;
			
			$ndf_enquiry_name = $_POST['ndf_enquiry_name'];
			$ndf_enquiry_email = $_POST['ndf_enquiry_email'];
			$ndf_enquiry_phone = $_POST['ndf_enquiry_phone'];
			$ndf_enquiry_content = $_POST['ndf_enquiry_content'];
		}

		$ndf_data_recipient_email = sanitize_email( ndf_data_settings_get_meta( 'ndf_data_recipient_email', $ndf_enquiry_to_id ) );
		$ndf_enquiry_form_email_subject = get_option( 'ndf_enquiry_form_email_subject', 'WCP Enquiry Form' );

		$headers = array( 'Content-Type: text/html; charset=UTF-8','From: '.get_bloginfo( 'name' ).' | WCP Enquiry <'.$ndf_enquiry_email.'>','Bcc: '.get_bloginfo( 'name' ).' Admin <'.get_option('admin_email').'>');
		$message .= '<h3>'.$ndf_enquiry_form_email_subject.'</h3>';
		$message .= '<p><strong>Name:</strong> '.$ndf_enquiry_name.'</p>';
		$message .= '<p><strong>Email:</strong> '.$ndf_enquiry_email.'</p>';
		if( !empty( $ndf_enquiry_phone ) ){
			$message .= '<p><strong>Phone:</strong> '.$ndf_enquiry_phone.'</p>';
		}
		$message .= '<p><strong>Request</strong></p>';
		$message .= '<p>'.nl2br( $ndf_enquiry_content ).'</p>';

		$record_mail = array(
		  'post_title'		=> wp_strip_all_tags( 'WPC Enquiry to #'.$ndf_enquiry_to_id.$resend ),
		  'post_content'	=> $ndf_enquiry_content,
		  'post_status'		=> 'private',
		  'post_type'		=> 'wcp_enquiry_entries',
		);
		$mail_ID = wp_insert_post( $record_mail );

		if( is_wp_error( $mail_ID ) ) {
			$mail_status = 'failed';
		    $output = $return->get_error_message();
		}
		else{			
			add_post_meta( $mail_ID, 'ndf_enquiry_details_email_status', $mail_status );
			add_post_meta( $mail_ID, 'ndf_enquiry_to_id', $ndf_enquiry_to_id );
			add_post_meta( $mail_ID, 'ndf_enquiry_to_recipient', $ndf_data_recipient_email );
			add_post_meta( $mail_ID, 'ndf_enquiry_details_name', $ndf_enquiry_name );
			add_post_meta( $mail_ID, 'ndf_enquiry_details_email', $ndf_enquiry_email );
			add_post_meta( $mail_ID, 'ndf_enquiry_details_phone', $ndf_enquiry_phone );
		}

		if( wp_mail( $ndf_data_recipient_email, $ndf_enquiry_form_email_subject, $message, $headers ) ){
			$mail_status = 'sent';
			$output = 'Enquiry Sent.';

			update_post_meta( $mail_ID, 'ndf_enquiry_details_email_status', $mail_status );
		}
		else{
			$mail_status = 'failed';
			$output = 'Sending Enquiry Failed.';
		}
		
		$return = array(
			'ndf_data'		=> $output,
			'mail_status'	=> $mail_status,
		);

		wp_send_json( $return );
	}
	else {
		wp_redirect( home_url() ); exit();
	}
}
add_action( 'wp_ajax_nopriv_ndf_enquiry_form_submit_call', 'ndf_enquiry_form_submit' );
add_action( 'wp_ajax_ndf_enquiry_form_submit_call', 'ndf_enquiry_form_submit' );

function ndf_outbound_clicks_record(){
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		$output = '';
		$message = '';
		$nonce = $_POST['security'];

		if ( empty($_POST) || !wp_verify_nonce( $nonce, 'ndf-nonce' ) ) die('An error occurred. Please contact the Administrator.');

		$url = $_POST['request_url'];
		$ID = $_POST['post_id'];
		$source_tag = $_POST['source_tag'];
		$action = $_POST['button_action'];

		global $wpdb;

		$current_timestamp = time();


		$check_slug = $ID.'-'.$action.'-'.sanitize_title( $url );
		$args = array(
		  'name'        => $check_slug,
		  'post_type'   => 'wcp_outbound_clicks',
		  'post_status' => 'private',
		  'numberposts' => 1
		);
		$wcp_get_post = get_posts($args);
		if( $wcp_get_post ) :
			/* Get ID */
			$outbound_clicks_ID = $wcp_get_post[0]->ID;
			$datetime = date("Y-m-d H:i:s", $current_timestamp);

			$query = "UPDATE $wpdb->posts SET post_modified = '$datetime' WHERE ID = '$outbound_clicks_ID'";
			$wpdb->query( $query );
		else:
			$record_click = array(
				'post_title'		=> wp_strip_all_tags( $ID.'-'.$action.'-'.sanitize_title( $url ) ),
				'post_status'		=> 'private',
				'post_type'		=> 'wcp_outbound_clicks',
			);
			
			$outbound_clicks_ID = wp_insert_post( $record_click );
			
			if( !empty( $source_tag ) ){
				$source_tag = (int)$source_tag;
				wp_set_object_terms( $outbound_clicks_ID, $source_tag, 'wcp_outbound_source' );
			}
			
			update_post_meta( $outbound_clicks_ID, 'wcp_url', $url );
			update_post_meta( $outbound_clicks_ID, 'wcp_data_ID', $ID );
			update_post_meta( $outbound_clicks_ID, 'wcp_source_tag', $source_tag );
		endif;
		$table_name = $wpdb->prefix.'postmeta' ;
		$check_timestamp =$wpdb->get_results("SELECT * FROM $table_name WHERE `meta_key` = 'wcp_timestamp' AND post_id = '$outbound_clicks_ID'");
		$existed = count($check_timestamp);
		if($existed != 1){
			$add_timestamp = array(
				$current_timestamp,
			);
			update_post_meta( $outbound_clicks_ID, 'wcp_timestamp',$add_timestamp);
		}
		else{
			$timestamp = get_post_meta( $outbound_clicks_ID, 'wcp_timestamp', true );
			$timestamp[] = $current_timestamp;
			update_post_meta( $outbound_clicks_ID, 'wcp_timestamp', $timestamp );
		}
		// $timestamp = get_post_meta( $outbound_clicks_ID, 'wcp_timestamp', true );
		// $timestamp[] = $current_timestamp;
		// update_post_meta( $outbound_clicks_ID, 'wcp_timestamp', $timestamp );

		$return = array();

		wp_send_json( $return );
	}
	else {
		wp_redirect( home_url() ); exit();
	}
}
add_action( 'wp_ajax_nopriv_ndf_outbound_clicks_call', 'ndf_outbound_clicks_record' );
add_action( 'wp_ajax_ndf_outbound_clicks_call', 'ndf_outbound_clicks_record' );
