<?php
/** 
 * Enqueue Scripts and Styles
 * 
 * - `ndf-style` - main plugin styles.
 * - `ndf-uikit` - uikit core styles.
 * - `ndf-data-filter` - main plugin JS scripts.
 * - `ndf_data_filter_vars`	- localized variables used in AJAX.
 * 
 * Admin Scripts
 * - `ndf-admin-css` - Admin stylesheet.
 * - `ndf-admin-js` - Admin JS script.
 * - `wp-color-picker` - Add color picker support.
 * - `media-upload` - Add media upload support.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
function ndf_enqueue(){
	wp_deregister_script( 'jquery' );
    // // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery', "http://code.jquery.com/jquery-1.12.4.js", array(), '3.3.2' );
    wp_register_script( 'jquery', "http://code.jquery.com/jquery-migrate-1.4.1.js", array(), '3.3.2' );
	// // this loaded on plugin only

	wp_register_style( 'ndf-uikit-tooltip-style',  NDF_BASE_URL . '/vendor/uikit/css/components/tooltip.min.css', array(), '2.27.2', 'all' );
	wp_enqueue_style( 'ndf-uikit-tooltip-style' );
	wp_register_style( 'ndf-slick-style',  NDF_BASE_URL . '/vendor/slick/slick.css', array(), '1.6', 'all' );
	wp_enqueue_style( 'ndf-slick-style' );
	wp_register_style( 'ndf-uikit-slidenav-style',  NDF_BASE_URL . '/vendor/uikit/css/components/slidenav.min.css', array(), '2.27.2', 'all' );
	wp_enqueue_style( 'ndf-uikit-slidenav-style' );
	wp_register_style( 'ndf-tablesaw-style',  NDF_BASE_URL . '/vendor/tablesaw/tablesaw.css', array(), 'v3.0.0-beta.3', 'all' );
	wp_enqueue_style( 'ndf-tablesaw-style' );
	wp_enqueue_script('ndf-uikit-main-js', NDF_BASE_URL . '/vendor/uikit/js/uikit.min.js', array( 'jquery' ) );
	wp_enqueue_script('ndf-uikit-tooltip-js', NDF_BASE_URL . '/vendor/uikit/js/components/tooltip.min.js', array( 'jquery' ) );
	wp_enqueue_script('ndf-slick-js', NDF_BASE_URL . '/vendor/slick/slick.min.js', array( 'jquery' ) );
	wp_enqueue_script('ndf-tablesaw-js', NDF_BASE_URL . '/vendor/tablesaw/tablesaw.jquery.js', array( 'jquery' ), 'v3.0.0-beta.3', true );
	wp_enqueue_script('ndf-jquery-match-height', NDF_BASE_URL . '/vendor/jquery-match-height/jquery.matchHeight-min.js', array( 'jquery' ), '0.7.0', true );
	wp_enqueue_script('ndf-jquery-cookie', NDF_BASE_URL . '/vendor/js.cookie/js.cookie-2.1.4.min.js', array( 'jquery' ), '2.1.4', true );

	wp_enqueue_script('ndf-validation-js', NDF_BASE_URL . '/vendor/jquery.validation/jquery.validate.min.js', array( 'jquery' ), '1.15.0' );

	wp_register_style( 'ndf-uikit',  NDF_BASE_URL . '/vendor/uikit/css/uikit.min.css', array(), '2.27.2', 'all' );
	wp_enqueue_style( 'ndf-uikit' );
	wp_register_style( 'ndf-uikit-grid-addon',  NDF_BASE_URL . '/vendor/uikit-grid-addon/uikit-grid-addon.css', array(), '2.27.2', 'all' );
	wp_enqueue_style( 'ndf-uikit-grid-addon' );

	wp_register_style( 'ndf-style',  NDF_BASE_URL . '/assets/css/ndf_style.css', array(), '1', 'all' );
	wp_enqueue_style( 'ndf-style' );

	$styles_settings = include( NDF_BASE_DIR . '/includes/ndf-script-enqueue-settings.php' );
	$styles_settings .= include( NDF_BASE_DIR . '/assets/css/ndf_style_media_queries.php' );
	wp_add_inline_style( 'ndf-style', $styles_settings );
	
	$load_limit = get_option( 'ndf_query_results_limit', 5 );
	if ( wcp_fs()->is_free_plan() || wcp_fs()->is_not_paying() ) {
		$load_limit = ( $load_limit >= 10 ) ? 10 : $load_limit;
	}
	
	wp_enqueue_script('ndf-data-filter', NDF_BASE_URL . '/assets/js/ndf-data-filter.js', array( 'jquery' ) );
	wp_localize_script( 'ndf-data-filter', 'ndf_data_filter_vars', 
		array( 
			'ndf_ajax' => admin_url( 'admin-ajax.php' ),
			'ndf_nonce' => wp_create_nonce('ndf-nonce'),
			'ndf_out' => NDF_BASE_URL,
			'ndf_error_message' => __('Sorry, there was a problem processing your request.', ''),
			'ndf_limit_results' => $load_limit,
			'ndf_limit_results_step' => get_option( 'ndf_query_results_step', 5 )
		) 
	);

	$ndf_outbound_clicks_track = get_option( 'ndf_outbound_clicks_track', 0 );

	if( $ndf_outbound_clicks_track == 1){
		wp_enqueue_script('ndf-outbound-clicks', NDF_BASE_URL . '/assets/js/ndf-outbound-clicks.js', array( 'jquery' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'ndf_enqueue');

function ndf_admin_enqueue( $hook ) {
	global $post;

	wp_register_style( 'ndf-jquery-css', '//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css', array(), '1.10.4', 'all' ); 
	wp_enqueue_style( 'ndf-jquery-css' );

	wp_register_style( 'ndf-admin-css', NDF_BASE_URL . '/admin/assets/css/ndf-admin.css', array(), '1', 'all' ); 
	wp_enqueue_style( 'ndf-admin-css' );

	wp_enqueue_script( 'ndf-admin-js', NDF_BASE_URL . '/admin/assets/js/ndf-admin.js', array( 'wp-color-picker' ), false, true );
	wp_localize_script( 'ndf-admin-js', 'ndf_data_filter_vars', 
		array( 
			'ndf_ajax' => admin_url( 'admin-ajax.php' ),
			'ndf_nonce' => wp_create_nonce('ndf-nonce'),
			'ndf_error_message' => __('Sorry, there was a problem processing your request.', '')
		) 
	);

	wp_enqueue_script('ndf-validation-js', NDF_BASE_URL . '/vendor/jquery.validation/jquery.validate.min.js', array( 'jquery' ), '1.15.0' );

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'ndf_data' === $post->post_type ) {
			wp_enqueue_script( 'ndf-admin-ndf_data-js', NDF_BASE_URL . '/admin/assets/js/ndf-admin-ndf_data.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'jquery-ui-accordion' ), false, true ); 
        }
    }
	
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script('media-upload');
	wp_enqueue_media();
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_style('wp-pointer');
    wp_enqueue_script('wp-pointer');
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui-datepicker');

	$ndf_button_style_configuration = get_option( 'ndf_button_style_configuration' );

	$button_css = "";
	if( is_array( $ndf_button_style_configuration ) ){
		foreach( $ndf_button_style_configuration as $style_id => $settings ){
			$button_css .= "
				a.ndf_button_style_{$style_id}{
        			background-color: ".$settings['background'].";
        			color: ".$settings['text_color']." !important;
        			-webkit-border-radius: ".$settings['border_radius']."px;
        			-moz-border-radius: ".$settings['border_radius']."px;
        			border-radius: ".$settings['border_radius']."px;
        			border: ".$settings['border_width']."px solid ".$settings['border_color'].";
        			font-size: ".$settings['font_size'].";
        			padding: ".$settings['padding_top']."px ".$settings['padding_right']."px ".$settings['padding_bottom']."px ".$settings['padding_left']."px;
        			display: inline-block;
					line-height: 1em;
					margin-left:1px;
					margin-right:1px;
   				}
				a.ndf_button_style_{$style_id}:hover{
        			background-color: ".$settings['background_hover'].";
        			color: ".$settings['text_color_hover']." !important;
        			text-decoration: none;
   				}
   			";
		}
	}
    wp_add_inline_style( 'ndf-admin-css', $button_css );
	
	// Pointer Hook 
    add_action('admin_print_footer_scripts', 'ndf_admin_print_footer_scripts' );
}
add_action( 'admin_enqueue_scripts', 'ndf_admin_enqueue' );

function ndf_admin_print_footer_scripts(){
	$ndf_shortcode_step_tooltip = '<h3>Step field</h3>';
	$ndf_shortcode_step_tooltip .= '<p>Number of results when load more button is clicked.</p>';
	$ndf_shortcode_initial_tooltip = '<h3>Initial field</h3>';
	$ndf_shortcode_initial_tooltip .= '<p>Number of results on initial load.</p>';
	?>
   <script type="text/javascript">
   //<![CDATA[
   jQuery(document).ready( function($) {
		//jQuery selector to point to 
		$( document ).on('hover', '.wrap .ndf_shortcode_step_tooltip', function(){
			$('.ndf_shortcode_step_tooltip').pointer({
				content: '<?php echo $ndf_shortcode_step_tooltip; ?>',
				position: {
					edge: 'left',
					align: 'middle'
				}
			}).pointer('open');
		});
		$( document ).on('hover', '.wrap .ndf_shortcode_initial_tooltip', function(){
			$('.ndf_shortcode_initial_tooltip').pointer({
				content: '<?php echo $ndf_shortcode_initial_tooltip; ?>',
				position: {
					edge: 'left',
					align: 'middle'
				}
			}).pointer('open');
		});
	});
   //]]>
   </script>
   <?php
}