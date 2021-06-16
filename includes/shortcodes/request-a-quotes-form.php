<?php
/**
 * Shortcode Registration Scripts
 * 
 * Registered Shortcode:
 * - `wcpquote or wcpquote type='popup'` - Displays the request a quotes form.
 * 
 * @package 	Netseek_Data_Filter
 * @subpackage 	Netseek_Data_Filter/includes/shortcodes
 * @since 		1.7.3.0
 * @author 		Netseek Pty Ltd
 */
    function request_quotes_form_shortcode( $atts ) 
    { 
        global $post,$wpdb;
        // Get Quotes Form Settings Data to render on Front Page the style is 
        $request_quotes_form_title = get_option( 'request_quotes_form_title', 'Get Quotes' );
        $request_quotes_form_subtitle = get_option( 'request_quotes_form_subtitle', 'Please provide some contact details' );
        $request_quotes_form_submit_button_text = get_option( 'request_quotes_form_submit_button_text', 'Submit' );
        $email_request_quotes_form_title_button = get_option( 'email_request_quotes_form_title_button', 'Request A Quotes' );

        $args = shortcode_atts( array(
            'type' => 'default'
        ), $atts );
        $type = $args['type'];
        if($type == "popup"){ ?>
        <!-- Start Popup -->
            <button class="request-quotes" id="request-quotes"><?=$email_request_quotes_form_title_button;?></button>

            <div id="quotes-form-container" style="display:none;" class="class-quotes-form-container">
                <div class="form-box">
                    <div class="close-positon"><a href class="close frxp-modal-close frxp-close frxp-close-alt" id="close-form"></a></div>
                    <div class="get-form-title"><?=$request_quotes_form_title;?></div>
                    <p><?=$request_quotes_form_subtitle;?></p>    
                    <form method="post" action="" class="quotes-form-content">
                        <input type="text" placeholder="Name" name="client-name" required>
                        <input type="email" placeholder="Email" name="client-email" required>
                        <input type="text" placeholder="Phone"  name="client-phone"  id="client-phonne-number">
                        <textarea name="client-request" id="" class="text-area-form" placeholder="Request/Description" required></textarea>
                    
                        <button class="get-quotes" name="request-quotes-btn" ><?=$request_quotes_form_submit_button_text;?></button>
                    </form>
                </div>
            </div>  
        <?php } 
        else{
          ?>
            <div id="default-quotes-form-container">
                <div class="form-box-default">
                <div class="get-form-title"><?=$request_quotes_form_title;?></div>
                <p><?=$request_quotes_form_subtitle;?></p> 
                    <form action="" method="post" class="quotes-form-content">
                        <input type="text" placeholder="Name" name="client-name" required><br>
                        <input type="email" placeholder="Email" name="client-email" required><br>
                        <input type="text" placeholder="Phone"  name="client-phone"  id="client-phonne-number">
                        <textarea name="client-request" id="" class="text-area-form-default" placeholder="Request/Description" required></textarea>
                        <button class="get-quotes" name="request-quotes-btn" ><?=$request_quotes_form_submit_button_text;?></button> 
                    </form>
                </div>
            </div>
          <?php
        }
        ?>
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
                 $count_valid_recipients [] = $filter_valid_recipients;
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
            request_quotes_thank_you();
    }
} 
// Call Function to save Details
include( NDF_BASE_DIR . '/admin/wcp-tools-submenu/request-quotes-form-settings.php' );