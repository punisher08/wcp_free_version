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
        if($type == "popup"){ 
   
        $output = '';
        $output .= '<div id="popup-button-holder"><button class="request-quotes get-quotes-buttons" id="request-quotes">'.$email_request_quotes_form_title_button.'</button></div>';

            $output .= '<div id="quotes-form-container" style="display:none;" class="class-quotes-form-container">';
                $output .= '<div class="form-box">';
                    $output .= '<div class="close-positon"><a href class="close frxp-modal-close frxp-close frxp-close-alt" id="close-form"></a></div>';
                    $output .= '<div class="get-form-title">'.$request_quotes_form_title.'</div>';
                    $output .= '<p id="form-subtitle">'.$request_quotes_form_subtitle.'</p>';
                    $output .= '<form method="post" action="" class="quotes-form-content" id="quotes-form-content">';
                       $output .= '<div id="form-success-message-popup" disabled style="display:none;">Request Sent</div>';
                        $output .= '<input type="text" placeholder="Name" name="client-name" id="client-name" required>';
                        $output .= '<div style="display:none;"  id="name-required">This field is required</div>';
                        $output .= '<input type="email" placeholder="Email" name="client-email" id="client-email" required>';
                        $output .= '<div  style="display:none;" id="email-required">Please Enter valid email address</div>';
                        $output .= '<input type="text" placeholder="Phone"  name="client-phone"  id="client-phonne-number">';
                        $output .= '<textarea name="client-request"  class="text-area-form" placeholder="Request/Description"  id="request-description" required></textarea>';
                        $output .= '<div  style="display:none;" id="client-message-required">This field is required</div>';
                        $output .= '<div id="button-holder"><button class="get-quotes" name="request-quotes-btn-popup" id="request-quotes-btn"  type="popup" ><span id="before-send-popup">'.$request_quotes_form_submit_button_text.'</span><span><img src="'.$ajax_image_loader.'" style="height:30px; display:none; margin:auto;" id="ajax-sumbit-loader-popup"></span></button></div>';
                    $output .= '</form>';
                $output .= '</div>';
            $output .= '</div> ';

            return $output;
         } 
        else{
          $output = '';
            $output .= '<div id="default-quotes-form-container">';
                $output .= '<div class="form-box-default">';
                $output .= '<div class="get-form-title">'.$request_quotes_form_title.'</div>';
                $output .= '<p id="form-subtitle">'.$request_quotes_form_subtitle.'</p>';
                   $output .= '<form action="" method="post" class="quotes-form-content" id="quotes-form-content-default">';
                        $output .= '<div id="form-success-message-default" disabled style="display:none;">Request Sent</div>';
                        $output .= '<input type="text" placeholder="Name" name="client-name" id="client-name-default" required>';
                        $output .= '<div  style="display:none;" id="name-required-default">This field is required</div>';
                        $output .= '<input type="email" placeholder="Email" name="client-email" id="client-email-default" required>';
                        $output .= '<div  style="display:none;"id="email-required-default">Please Enter valid email address</div>';
                        $output .= '<input type="text" placeholder="Phone"  name="client-phone"  id="client-phonne-number-default">';
                        $output .= '<textarea name="client-request"  class="text-area-form" placeholder="Request/Description"  id="request-description-default" required></textarea>';
                        $output .= '<div  style="display:none;" id="client-message-required-default">This field is required</div>';
                        $output .= '<div id="button-holder"><button class="get-quotes default-btn" name="request-quotes-btn-default" id="request-quotes-btn-default" type="default"><span id="before-send-default">'.$request_quotes_form_submit_button_text.'</span><span><img src="'.$ajax_image_loader.'" style="height:30px; display:none; margin:auto;" id="ajax-sumbit-loader-default"></span></button></div>';
                    $output .= '</form>';
                $output .= '</div>';
            $output .= '</div>';
            return $output;
        }   
} 
// Call Function to save Details
include( NDF_BASE_DIR . '/admin/wcp-tools-submenu/request-quotes-form-settings.php' );