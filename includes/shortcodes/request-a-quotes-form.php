<?php
/**
 * Shortcode Registration Scripts
 * 
 * Registered Shortcode:
 * - `get_quotes` - Displays the request a quotes form.
 * 
 * @package 	Netseek_Data_Filter
 * @subpackage 	Netseek_Data_Filter/includes/shortcodes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
 // $ndf_data_recipient_email = sanitize_email( ndf_data_settings_get_meta( 'ndf_data_recipient_email','1006' ) );

    function request_quotes_form_shortcode() 
    { 
    ?>
    <button class="request-quotes" id="request-quotes"> Request A Quote</button>
    <div id="quotes-form-container" style="display:none;" class="class-quotes-form-container">
        <div class="form-box">
            <div class="close-positon"><a href class="close frxp-modal-close frxp-close frxp-close-alt" id="close-form"></a></div>
            <div class="get-form-title">Get Quotes</div>
            <p>Please provide some contact details.</p>    
            <form method="post" action="">
                <input type="text" placeholder="Name" name="client-name" required>
                <input type="email" placeholder="Email" name="client-email" required>
                <input type="text" placeholder="Phone"  name="client-phone">
                <textarea name="client-request" id="" class="text-area-form" placeholder="Request/Description" required></textarea>
                    <br>
                <button class="get-quotes" name="request-quotes-btn" >Submit</button><br>   
            </form>
        </div>
    </div>  
    <?php    

    if(isset($_POST['request-quotes-btn']))
    {
        global $wpdb;
        $recipients = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = 'ndf_data_recipient_email'" );
      
        $to = get_option('admin_email');
        $name = $_POST['client-name'];
        $client_email = $_POST['client-email'];
        $client_phone = $_POST['client-phone'];
        $client_request = $_POST['client-request'];
        $subject = "Requesting a Quotes";
        $headers = 'From: '. $client_email . "\r\n" .
          'Reply-To: ' . $client_email . "\r\n";
        
          $to_send = array();
          $counter = 0;
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
              $sent = wp_mail($recipient_email, $subject, strip_tags($client_request), $headers);
              if($sent)
              {
                        $post_type = 'quotesentry';
                        $front_post = array(
                        'post_title'    => $subject,
                        'post_status'   => 'publish',          
                        'post_type'     => $post_type 
                        );
                        $post_id = wp_insert_post($front_post);
                        update_post_meta($post_id, "quotes_email_subject_field", $subject);
                        update_post_meta($post_id, "quotes_sender_email_field", $client_email);
                        update_post_meta($post_id, "quotes_sent_to_field", $recipient_email);
                        update_post_meta($post_id, "quotes_sender_phone_field", $client_phone);
                        update_post_meta($post_id, "quotes_sender_request_description_field", $client_request);
              }
              else
              {
                  echo 'Unable to send';
              }
          endforeach;  
          request_quotes_thank_you();
    }
} 
// Call Function to save Details
include( NDF_BASE_DIR . '/admin/wcp-tools-submenu/request-quotes-form-settings.php' );