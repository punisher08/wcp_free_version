<?php
/**
 * Settings for the Data Results Section 
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
?>
<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<?php if( isset($_GET['settings-updated']) ) { ?>
		<div id="message" class="updated">
		<p><strong><?php _e('Settings saved.') ?></strong></p>
		</div>
	<?php } ?>

	<?php
	$active_tab = 'heading';
	if( isset( $_GET[ 'tab' ] ) ) {
		$active_tab = $_GET[ 'tab' ];
	}
	?>

	<h2 class="nav-tab-wrapper">
		<a href="?page=wcp-data-results-settings&tab=heading" class="nav-tab <?php echo $active_tab == 'heading' ? 'nav-tab-active' : ''; ?>">Heading</a>
		<a href="?page=wcp-data-results-settings&tab=tables" class="nav-tab <?php echo $active_tab == 'tables' ? 'nav-tab-active' : ''; ?>">Table Properties</a>
		<a href="?page=wcp-data-results-settings&tab=more-information" class="nav-tab <?php echo $active_tab == 'more-information' ? 'nav-tab-active' : ''; ?>">More Information</a>
		<a href="?page=wcp-data-results-settings&tab=more-info-fields" class="nav-tab <?php echo $active_tab == 'more-info-fields' ? 'nav-tab-active' : ''; ?>">More Info Fields Settings</a>
		<a href="?page=wcp-data-results-settings&tab=star-rating" class="nav-tab <?php echo $active_tab == 'star-rating' ? 'nav-tab-active' : ''; ?>">Star Rating</a>
		<a href="?page=wcp-data-results-settings&tab=load-more-button" class="nav-tab <?php echo $active_tab == 'load-more-button' ? 'nav-tab-active' : ''; ?>">Load More Button</a>
		<a href="?page=wcp-data-results-settings&tab=tooltip" class="nav-tab <?php echo $active_tab == 'tooltip' ? 'nav-tab-active' : ''; ?>">Tooltip</a>
		<a href="?page=wcp-data-results-settings&tab=query-results" class="nav-tab <?php echo $active_tab == 'query-results' ? 'nav-tab-active' : ''; ?>">Query Results</a>
		<a href="?page=wcp-data-results-settings&tab=table-visual-presets" class="nav-tab <?php echo $active_tab == 'table-visual-presets' ? 'nav-tab-active' : ''; ?>">Table Visual Presets</a>
	</h2>

	<?php
	if( $active_tab == 'table-visual-presets' ) {
		include NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-table-visual-presets.php';
	}
	else if( $active_tab == 'more-info-fields' ) {
		include NDF_BASE_DIR . '/admin/data-results-settings-submenu/ndf-more-info-fields-settings.php';
	}
	else{
		?>
		<form method="post" action="options.php" enctype="multipart/form-data"> 
			<?php
			if( $active_tab == 'tables' ) {
				settings_fields( 'ndf_data_results_table_settings_option' );
				do_settings_sections( 'ndf_data_results_table_settings_option' );
			}
			else if( $active_tab == 'more-information' ) {
				settings_fields( 'ndf_more_info_settings_option' );
				do_settings_sections( 'ndf_more_info_settings_option' );
			}
			else if( $active_tab == 'star-rating' ) {
				settings_fields( 'ndf_star_rating_settings_option' );
				do_settings_sections( 'ndf_star_rating_settings_option' );
			}
			else if( $active_tab == 'load-more-button' ) {
				settings_fields( 'ndf_load_more_settings_option' );
				do_settings_sections( 'ndf_load_more_settings_option' );
			}
			else if( $active_tab == 'tooltip' ) {
				settings_fields( 'ndf_tooltip_settings_option' );
				do_settings_sections( 'ndf_tooltip_settings_option' );
			}
			else if( $active_tab == 'query-results' ) {
				settings_fields( 'ndf_query_results_option' );
				do_settings_sections( 'ndf_query_results_option' );
			}
			else {
				settings_fields( 'ndf_data_results_heading_settings_option' );
				do_settings_sections( 'ndf_data_results_heading_settings_option' );
			}
			submit_button();
			?>
		</form>
		<?php
	}
	?>
</div>