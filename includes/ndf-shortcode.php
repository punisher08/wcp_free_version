<?php
/**
 * Shortcode Registration Scripts
 * 
 * Registered Shortcode:
 * - `wp_comparison` - Displays the filters and data table.
 * - `wp_comparison_more_info` - Displays the filters and data table.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

/**
 * Register Shortcodes on wordpress init hook.
 * 
 * @since 		1.0.1.0
 * @return mixed|void If there are posts under Data CPT, returns the table to be Filtered. 
 * If there are terms added in Category 1, Category 2, Category 3, Category 4, Category 5 Taxonomy, 
 * the corresponding filter block is displayed. If no posts and categories, returns void.
 */
include( NDF_BASE_DIR . '/includes/shortcodes/ndf-data-filter.php' );
include( NDF_BASE_DIR . '/includes/shortcodes/ndf-data-more-info.php' );
include( NDF_BASE_DIR . '/includes/shortcodes/request-a-quotes-form.php' );


/**
 * Register Shortcodes on wordpress init hook.
 * 
 * @since 		1.0.1.0
 */
function ndf_register_shortcodes(){
	add_shortcode( 'wp_comparison', 'ndf_data_filter_shortcode' );
	add_shortcode( 'wp_comparison_more_info', 'ndf_data_more_info_shortcode' );
	add_shortcode( 'get_quotes', 'request_quotes_form_shortcode' );
}
add_action('init', 'ndf_register_shortcodes');

