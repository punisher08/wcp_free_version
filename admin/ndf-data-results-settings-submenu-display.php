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
<div class="navigation-bar-wcp-settings d-flex justify-content-between">
	<div class="tab-title"><?php echo esc_html( get_admin_page_title() ); ?></div>
	<?php $logo = plugin_dir_url( __FILE__ ).'assets/images/wcp-logo.png'; ?>
	<a href="https://wordpresscomparisonplugin.com/" target="_blank"><img src="<?php echo $logo;?>" alt="" class="wcp-logo"></a>
</div>
<div class="wrap">

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
	<div class="custom-card">
		<div class="sidebar">
			<!-- <h2 class="nav-tab-wrapper"> -->
			<h2 class="sidenav">
				<a href="?page=wcp-data-results-settings&tab=heading" class="nav-tab-new <?php echo $active_tab == 'heading' ? 'nav-tab-active-set' : ''; ?>">Heading</a>
				<a href="?page=wcp-data-results-settings&tab=tables" class="nav-tab-new <?php echo $active_tab == 'tables' ? 'nav-tab-active-set' : ''; ?>">Table Properties</a>
				<a href="?page=wcp-data-results-settings&tab=more-information" class="nav-tab-new <?php echo $active_tab == 'more-information' ? 'nav-tab-active-set' : ''; ?>">More Information</a>
				<a href="?page=wcp-data-results-settings&tab=more-info-fields" class="nav-tab-new <?php echo $active_tab == 'more-info-fields' ? 'nav-tab-active-set' : ''; ?>">More Info Fields Settings</a>
				<a href="?page=wcp-data-results-settings&tab=star-rating" class="nav-tab-new <?php echo $active_tab == 'star-rating' ? 'nav-tab-active-set' : ''; ?>">Star Rating</a>
				<a href="?page=wcp-data-results-settings&tab=load-more-button" class="nav-tab-new <?php echo $active_tab == 'load-more-button' ? 'nav-tab-active-set' : ''; ?>">Load More Button</a>
				<a href="?page=wcp-data-results-settings&tab=tooltip" class="nav-tab-new <?php echo $active_tab == 'tooltip' ? 'nav-tab-active-set' : ''; ?>">Tooltip</a>
				<a href="?page=wcp-data-results-settings&tab=query-results" class="nav-tab-new <?php echo $active_tab == 'query-results' ? 'nav-tab-active-set' : ''; ?>">Query Results</a>
				<a href="?page=wcp-data-results-settings&tab=table-visual-presets" class="nav-tab-new <?php echo $active_tab == 'table-visual-presets' ? 'nav-tab-active-set' : ''; ?>">Table Visual Presets</a>
			</h2>
		</div>
	<div class="scroll">
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
			submit_button('Save Changes', 'primary custom-btn');
			?>
		</form>
		<?php
	}
	?>
		</div>
	</div>
</div>