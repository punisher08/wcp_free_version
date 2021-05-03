<?php
/**
 * Data Results Section Query Results Settings Registration
 * 
 * Initializes the submenu options page by registering the Sections, Fields, and Settings.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/data-results-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'ndf_query_results_register_settings');
function ndf_query_results_register_settings() {

	/* Register Query Results Settings */
	add_settings_section(
		'ndf_query_results_section',
		'Query Results Settings',
		'ndf_query_results_callback',
		'ndf_query_results_option'
	);

	/* Initialize Query Results Settings Fields */
	add_settings_field(
		'ndf_query_results_order_by',
		'Order Results By',
		'ndf_query_results_order_by_callback',
		'ndf_query_results_option',
		'ndf_query_results_section',
		array(
			'date' => 'Date Added',
			'title' => 'Data Title',
		)
	);
	
	add_settings_field(
		'ndf_query_results_order',
		'Order',
		'ndf_query_results_order_callback',
		'ndf_query_results_option',
		'ndf_query_results_section',
		array(
			'DESC' => 'Descending',
			'ASC' => 'Ascending',
		)
	);

	add_settings_field(
		'ndf_query_results_filter_operator',
		'Query Filter Operator',
		'ndf_query_results_filter_operator_callback',
		'ndf_query_results_option',
		'ndf_query_results_section',
		array(
			'AND' => 'AND',
			'OR' => 'OR',
		)
	);

	add_settings_field( 
		'ndf_query_results_limit',
		'Initial Number of Results',
		'ndf_query_results_limit_callback',
		'ndf_query_results_option',
		'ndf_query_results_section'
	);
	add_settings_field( 
		'ndf_query_results_step',
		'Load More Step',
		'ndf_query_results_step_callback',
		'ndf_query_results_option',
		'ndf_query_results_section'
	);


	/* Register Query Results Settings Fields */
	register_setting( 'ndf_query_results_option', 'ndf_query_results_order_by' );
	register_setting( 'ndf_query_results_option', 'ndf_query_results_order' );
	register_setting( 'ndf_query_results_option', 'ndf_query_results_filter_operator' );
	register_setting( 'ndf_query_results_option', 'ndf_query_results_limit' );
	register_setting( 'ndf_query_results_option', 'ndf_query_results_step' );

} /* end ndf_query_results_register_settings */

/**
 * Section Callbacks
 */
function ndf_query_results_callback() {
    echo '<p></p>';
} /* end ndf_query_results_callback */

/**
 * Field Callbacks
 */
function ndf_query_results_order_by_callback($args) {
	$ndf_query_results_order_by = get_option( 'ndf_query_results_order_by', 'date' );

	$html = "<select name='ndf_query_results_order_by' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_query_results_order_by, $option_key, false ).">".$option_value."</option>";
	}
	if ( class_exists( 'MR_Rating_Form' ) || class_exists( 'MRP_Rating_form' ) ) {
		$html .= "<option value='ratings' ".selected( $ndf_query_results_order_by, 'ratings', false ).">Ratings</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_query_results_order_by_callback */

function ndf_query_results_order_callback($args) {
	$ndf_query_results_order = get_option( 'ndf_query_results_order', 'DESC' );

	$html = "<select name='ndf_query_results_order' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_query_results_order, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_query_results_order_callback */

function ndf_query_results_filter_operator_callback($args) {
	$ndf_query_results_filter_operator = get_option( 'ndf_query_results_filter_operator', 'AND' );

	$html = "<select name='ndf_query_results_filter_operator' class='ndf_dropdown'>";
	foreach( $args as $option_key => $option_value ){
		$html .= "<option value='".$option_key."' ".selected( $ndf_query_results_filter_operator, $option_key, false ).">".$option_value."</option>";
	}
	$html .= "</select>";
	echo $html;
} /* end ndf_query_results_filter_operator_callback */

function ndf_query_results_limit_callback($args) {
	$ndf_query_results_limit = get_option( 'ndf_query_results_limit', 5 );

	$html = '<input type="number" min="1" class="small-text" id="ndf_query_results_limit" name="ndf_query_results_limit" value="'.esc_attr__( $ndf_query_results_limit ).'" />';
	echo $html;
} /* end ndf_query_results_limit_callback */

function ndf_query_results_step_callback($args) {
	$ndf_query_results_step = get_option( 'ndf_query_results_step', 5 );

	$html = '<input type="number" min="1" class="small-text" id="ndf_query_results_step" name="ndf_query_results_step" value="'.esc_attr__( $ndf_query_results_step ).'" />';
	echo $html;
} /* end ndf_query_results_step_callback */