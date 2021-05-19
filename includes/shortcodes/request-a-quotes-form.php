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

    function wcp_form_shortcode() 
    { 
    ?>
    <button class="request-quotes" id="request-quotes"> Request A Quote</button>
    <div id="quotes-form-container" style="display:none;">
    <a href class="close frxp-modal-close frxp-close frxp-close-alt" id="close-form"></a>
        <h2 class="get-form-title">Get Quotes</h2>
        <p>Please provide some contact details.</p>
      
        
        <form method="post" action="">
            <input type="text" placeholder="Name" name="client-name">
            <input type="email" placeholder="Email" name="client-email" >
            <input type="text" placeholder="Phone"  name="client-phone">
            <textarea name="client-request" id="" class="text-area-form" placeholder="Request/Description" ></textarea>
                <br>
            <button class="get-quotes" name="request-quotes-btn" >Get Quotes</button><br>   
        </form>
    </div>  
    <?php    


    if(isset($_POST['request-quotes-btn']))
    {
        global $wpdb;
        $recipients = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = 'ndf_data_recipient_email'" );
      
       
        
        $to = get_option('admin_email');
        $name = $_POST['client-name'];
        $client_email = $_POST['client-emai'];
        $client_phone = $_POST['client-phone'];
        $client_request = $_POST['client-request'];


        // $to = get_option('admin_email');
        $subject = "Requesting a Quotes";
        $headers = 'From: '. $client_email . "\r\n" .
          'Reply-To: ' . $client_email . "\r\n";

        for($send_email = 0; $send_email < 3; $send_email++)
        {
            $random_numbers = array_rand($recipients);
            $sent = wp_mail($recipients[$random_numbers], $subject, strip_tags($client_request), $headers);
            if($sent){
                echo '<pre>';
                print_r('success sending  to :'.$recipients[$random_numbers]);
                echo '</pre>'; 
              
            }
            else{
                echo '<pre>';
                print_r('not success sending to :'.$recipients[$random_numbers]);
                echo '</pre>';
             
            }
        }

       
    }
} 