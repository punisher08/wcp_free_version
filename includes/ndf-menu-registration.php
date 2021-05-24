<?php
/** 
 * Registers Admin Menu and Sub Menus
 * 
 * Registered Menus:
 * - `ndf-settings` - Data Filtering main menu. Displays information on how to use the plugin with shortcode details.
 * - `ndf-settings` - General Settings sub-menu. Same info with Data Filtering menu.
 * - `ndf-filters-settings` - Filters Section Settings sub-menu. UI settings for the filtering section.
 * - `ndf-data-results-settings` - Data Results Section Settings sub-menu. UI settings for the data results section.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

/**
 * ndf_menu_registration
 *
 * @return void
 */
function ndf_menu_registration(){
	add_menu_page(
        'WCP Settings',
        'WCP Settings',
        'manage_options',
        'wcp-settings',
        'ndf_settings_menu_display',
        'dashicons-index-card',
        11
    );
    add_submenu_page( 'wcp-settings', 'Shortcode', 'Shortcode', 'manage_options', 'wcp-settings', 'ndf_settings_menu_display');
    add_submenu_page( 'wcp-settings', 'Filter Section', 'Filter Section', 'manage_options', 'wcp-filters-settings', 'ndf_filter_settings_submenu_display');
    add_submenu_page( 'wcp-settings', 'Results Section', 'Results Section', 'manage_options', 'wcp-data-results-settings', 'ndf_data_results_settings_submenu_display');
    add_submenu_page( 'wcp-settings', 'More Info Settings', 'More Info Settings', 'manage_options', 'wcp-more-info-settings', 'ndf_more_info_settings_submenu_display');
    
    add_submenu_page( 'edit.php?post_type=wcp_outbound_clicks', 'Outbound Clicks Settings', 'Outbound Clicks Settings', 'manage_options', 'wcp-outbound-clicks-settings', 'ndf_outbound_clicks_settings_submenu_display');
    add_submenu_page( 'edit.php?post_type=wcp_outbound_clicks', 'Enquiry Form Entries', 'Enquiry Form Entries', 'manage_options', 'edit.php?post_type=wcp_enquiry_entries', NULL);
    add_submenu_page( 'edit.php?post_type=wcp_outbound_clicks', 'Enquiry Form Settings', 'Enquiry Form Settings', 'manage_options', 'wcp-enquiry-form-settings', 'ndf_enquiry_form_settings_submenu_display');
	// Request Quotes Form Settings
    add_submenu_page( 'edit.php?post_type=wcp_outbound_clicks', 'Request Quotes', 'Quotes Form Settings', 'manage_options', 'request_quotes_form_settings', 'request_quotes_form_settings_submenu_display');
	// redirect to quotesentry post type
	add_submenu_page( 'edit.php?post_type=wcp_outbound_clicks', 'Enquiry Form Entries', 'Quotes Form Entries', 'manage_options', 'edit.php?post_type=quotesentry', NULL);

}
add_action( 'admin_menu', 'ndf_menu_registration' );

function ndf_settings_menu_display(){
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	include( NDF_BASE_DIR . '/admin/ndf-settings-menu-display.php' );
}

function ndf_filter_settings_submenu_display(){
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	include( NDF_BASE_DIR . '/admin/ndf-filter-settings-submenu-display.php' );
}

function ndf_data_results_settings_submenu_display(){
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	include( NDF_BASE_DIR . '/admin/ndf-data-results-settings-submenu-display.php' );
}

function ndf_more_info_settings_submenu_display(){
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	include( NDF_BASE_DIR . '/admin/ndf-more-info-settings-submenu-display.php' );
}

function ndf_outbound_clicks_settings_submenu_display() {
	if( !current_user_can('manage_options') ) {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	include( NDF_BASE_DIR . '/admin/ndf-outbound-clicks-settings-submenu-display.php' );
}

function ndf_enquiry_form_settings_submenu_display() {
	if( !current_user_can('manage_options') ) {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	include( NDF_BASE_DIR . '/admin/ndf-enquiry-form-settings-submenu-display.php' );
}

function request_quotes_form_settings_submenu_display() {
	if( !current_user_can('manage_options') ) {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	include( NDF_BASE_DIR . '/admin/request-quotes-form-display.php' );
}

/* Settings Registration Scripts */
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-heading-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-table-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-category-1-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-category-2-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-category-3-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-category-4-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-category-5-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-keyword-search-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-reset-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-heading-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-table-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-more-information-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-star-rating-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-load-more-button-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-tooltip-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-query-results-tab-settings.php' );
include( NDF_BASE_DIR . '/admin/more-info-settings-submenu/ndf-summary.php' );
include( NDF_BASE_DIR . '/admin/more-info-settings-submenu/ndf-ui-settings.php' );
include( NDF_BASE_DIR . '/admin/more-info-settings-submenu/ndf-slug-settings.php' );
include( NDF_BASE_DIR . '/admin/outbound-clicks-settings-submenu/ndf-outbound-clicks-settings.php' );
include( NDF_BASE_DIR . '/admin/wcp-tools-submenu/ndf-enquiry-form-settings.php' );
// Request Quotes Scripts
include( NDF_BASE_DIR . '/admin/wcp-tools-submenu/request-quotes-form-entries-settings.php' );

