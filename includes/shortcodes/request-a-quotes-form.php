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
        $ajax_image_loader =  NDF_BASE_URL . '/assets/images/ajax-loader.gif';

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
                    <form method="post" action="" class="quotes-form-content" id="quotes-form-content">
                        <div id="form-success-message-popup" disabled style="display:none;">Request Sent</div>
                        <input type="text" placeholder="Name" name="client-name" id="client-name" required>
                        <div for="client-name" id="name-required" style="font-family: inherit; font-size:10px; text-align:left; margin:auto; display:none; width:80%;">This field is required</div>
                        <input type="email" placeholder="Email" name="client-email" id="client-email" required>
                        <div for="email" id="email-required" style="font-family: inherit; font-size:10px; text-align:left; margin:auto; display:none; width:80%;">Please Enter valid email address</div>
                        <input type="text" placeholder="Phone"  name="client-phone"  id="client-phonne-number">
                        <textarea name="client-request"  class="text-area-form" placeholder="Request/Description"  id="request-description" required></textarea>
                        <div for="client-message" id="client-message-required" style="font-family: inherit; font-size:10px; text-align:left; margin:auto; display:none; width:80%;">This field is required</div>
                        <button class="get-quotes" name="request-quotes-btn-popup" id="request-quotes-btn"  type="popup" ><span id="before-send-popup"><?=$request_quotes_form_submit_button_text;?></span><span><img src="<?=$ajax_image_loader;?>" style="height:30px; display:none; margin:auto;" id="ajax-sumbit-loader-popup"></span></button>
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
                    <form action="" method="post" class="quotes-form-content" id="quotes-form-content-default">
                        <div id="form-success-message-default" disabled style="display:none;">Request Sent</div>
                        <input type="text" placeholder="Name" name="client-name" id="client-name-default" required>
                        <div for="client-name" id="name-required-default" style="font-family: inherit; font-size:10px; text-align:left; margin:auto; display:none; width:80%;">This field is required</div>
                        <input type="email" placeholder="Email" name="client-email" id="client-email-default" required>
                        <div for="email" id="email-required-default" style="font-family: inherit; font-size:10px; text-align:left; margin:auto; display:none; width:80%;">Please Enter valid email address</div>
                        <input type="text" placeholder="Phone"  name="client-phone"  id="client-phonne-number-default">
                        <textarea name="client-request"  class="text-area-form" placeholder="Request/Description"  id="request-description-default" required></textarea>
                        <div for="client-message" id="client-message-required-default" style="font-family: inherit; font-size:10px; text-align:left; margin:auto; display:none; width:80%;">This field is required</div>
                        <button class="get-quotes" name="request-quotes-btn-default" id="request-quotes-btn-default" type="default"><span id="before-send-default"><?=$request_quotes_form_submit_button_text;?></span><span><img src="<?=$ajax_image_loader;?>" style="height:30px; display:none; margin:auto;" id="ajax-sumbit-loader-default"></span></button> 
                    </form>
                </div>
            </div>
          <?php
        }
        ?>
    <?php    
} 
// Call Function to save Details
include( NDF_BASE_DIR . '/admin/wcp-tools-submenu/request-quotes-form-settings.php' );