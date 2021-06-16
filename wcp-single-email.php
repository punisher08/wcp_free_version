<?php
/**
 * Shortcode Registration Scripts
 * 
 * Registered Shortcode:
 * - `wp_comparison_more_info` - Displays the more info fields table.
 * 
 * @package 	Netseek_Data_Filter
 * @subpackage 	Netseek_Data_Filter/includes/shortcodes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
//
function  request_quotes_form_single($wcp_data_ID){
		$request_quotes_form_title = get_option( 'request_quotes_form_title', 'Get Quotes' );
        $request_quotes_form_subtitle = get_option( 'request_quotes_form_subtitle', 'Please provide some contact details' );
        $request_quotes_form_submit_button_text = get_option( 'request_quotes_form_submit_button_text', 'Submit' );

		$form .= '<div  class="class-quotes-form-container-single" id="quotes-form-container-single" style="display:none">';
			$form .= ' <div class="form-box-single">';
				$form .= '<div class="close-positon"><a href class="close frxp-modal-close frxp-close frxp-close-alt" id="close-form"></a></div>';
				$form .= '<div class="get-form-title">'.$request_quotes_form_title.'</div>';
				$form .= '<p class="single-quote-subtitle">'.$request_quotes_form_subtitle.'</p>';
				$form .= '<form method="post" class="quotes-form-content">';
				$form .= '<input type="hidden" id="single-post-id" name="post_id"/>
					<input type="text" placeholder="Name" name="client-name" required><br>
					<input class="single-input" type="email" placeholder="Email" name="client-email" required><br>
					<input class="single-input" type="text" placeholder="Phone"  name="client-phone" id="client-phonne-number">
					<textarea name="client-request" id="" class="text-area-form" placeholder="Request/Description" required></textarea>
					<button class="get-quotes" id="'.$wcp_data_ID.'" name="request-single-quotes-btn" >Submit</button>
				</form>';
			$form .= ' </div>';
			$form .= ' </div>';
	return $form;
 }

 if(isset($_POST['request-single-quotes-btn'])){
	global $wpdb;
	$to = get_option('admin_email');
	$id = $_POST['post_id'];
	$name = $_POST['client-name'];
	$client_email = $_POST['client-email'];
	$client_phone = $_POST['client-phone'];
	$client_request = $_POST['client-request'];
	$message = '<table>
					<tr><td>Name:</td><td>'.$name.'</td></tr>
					<tr><td>Email:</td><td>'.$client_email.'</td></tr><tr>
					<td>Phone:</td><td>'.$client_phone.'</td></tr>
					<tr><td>Request:</td><td>'.$client_request.'</td></tr>
				</table>';
				
	$subject = "You have received a quote request from :".get_site_url();
	$headers = array('Content-Type: text/html; charset=UTF-8');
	$recipient = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = $id and meta_key = 'ndf_data_recipient_email'" );

	$sent = wp_mail($recipient[0], $subject,$message, $headers);
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
			  update_post_meta($post_id, "quotes_sent_to_field", $recipient[0]);
			  update_post_meta($post_id, "quotes_sender_phone_field", $client_phone);
			  update_post_meta($post_id, "quotes_sender_request_description_field", $client_request);
			  // end saving data
	}
	else{
		?>
		<script>
			alert('Encountered problem on previous submission: Please try again');
		</script>
		<?php
	}
	
	request_quotes_thank_you();
}