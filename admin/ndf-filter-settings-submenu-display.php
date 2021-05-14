<?php
/**
 * Settings for the Filtering Section 
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
	<div class="row custom-card">
		<div class="sidebar">
			<!-- <h2 class="nav-tab-wrapper"> -->
			<h2 class="sidenav">
				<a href="?page=wcp-filters-settings&tab=heading" class="nav-tab-new <?php echo $active_tab == 'heading' ? 'nav-tab-active-set' : ''; ?>">Heading</a>
				<a href="?page=wcp-filters-settings&tab=tables" class="nav-tab-new <?php echo $active_tab == 'tables' ? 'nav-tab-active-set' : ''; ?>">Table Properties</a>
				<a href="?page=wcp-filters-settings&tab=category-1" class="nav-tab-new <?php echo $active_tab == 'category-1' ? 'nav-tab-active-set' : ''; ?>">Category 1</a>
				<a href="?page=wcp-filters-settings&tab=category-2" class="nav-tab-new <?php echo $active_tab == 'category-2' ? 'nav-tab-active-set' : ''; ?>">Category 2</a>
				<a href="?page=wcp-filters-settings&tab=category-3" class="nav-tab-new <?php echo $active_tab == 'category-3' ? 'nav-tab-active-set' : ''; ?>">Category 3</a>
				<a href="?page=wcp-filters-settings&tab=category-4" class="nav-tab-new <?php echo $active_tab == 'category-4' ? 'nav-tab-active-set' : ''; ?>">Category 4</a>
				<a href="?page=wcp-filters-settings&tab=category-5" class="nav-tab-new <?php echo $active_tab == 'category-5' ? 'nav-tab-active-set' : ''; ?>">Category 5</a>
				<a href="?page=wcp-filters-settings&tab=reset" class="nav-tab-new <?php echo $active_tab == 'reset' ? 'nav-tab-active-set' : ''; ?>">Reset</a>
				<a href="?page=wcp-filters-settings&tab=keyword-search" class="nav-tab-new <?php echo $active_tab == 'keyword-search' ? 'nav-tab-active-set' : ''; ?>">Keyword Search</a>
				<a href="?page=wcp-filters-settings&tab=table-visual-presets" class="nav-tab-new <?php echo $active_tab == 'table-visual-presets' ? 'nav-tab-active-set' : ''; ?>">Table Visual Presets</a>
			</h2>
		</div>
		<div class="scroll">
	<?php
	if( $active_tab == 'table-visual-presets' ) {
		include NDF_BASE_DIR . '/admin/filter-settings-submenu/ndf-table-visual-presets.php';
	}
	else{
		?>
		<form method="post" action="options.php" enctype="multipart/form-data"> 
			<?php
			if( $active_tab == 'tables' ) {
				settings_fields( 'ndf_filters_table_settings_option' );
				do_settings_sections( 'ndf_filters_table_settings_option' );
			}
			else if( $active_tab == 'category-1' ) {
				settings_fields( 'ndf_category_1_filter_settings_option' );
				do_settings_sections( 'ndf_category_1_filter_settings_option' );
			}
			else if( $active_tab == 'category-2' ) {
				settings_fields( 'ndf_category_2_filter_settings_option' );
				do_settings_sections( 'ndf_category_2_filter_settings_option' );
			}
			else if( $active_tab == 'category-3' ) {
				settings_fields( 'ndf_category_3_filter_settings_option' );
				do_settings_sections( 'ndf_category_3_filter_settings_option' );
			}
			else if( $active_tab == 'category-4' ) {
				settings_fields( 'ndf_category_4_filter_settings_option' );
				do_settings_sections( 'ndf_category_4_filter_settings_option' );
			}
			else if( $active_tab == 'category-5' ) {
				settings_fields( 'ndf_category_5_filter_settings_option' );
				do_settings_sections( 'ndf_category_5_filter_settings_option' );
			}
			else if( $active_tab == 'keyword-search' ) {
				settings_fields( 'ndf_keyword_search_settings_option' );
				do_settings_sections( 'ndf_keyword_search_settings_option' );
			}
			else if( $active_tab == 'reset' ) {
				settings_fields( 'ndf_reset_button_settings_option' );
				do_settings_sections( 'ndf_reset_button_settings_option' );
			}
			else {
				settings_fields( 'ndf_filters_heading_settings_option' );
				do_settings_sections( 'ndf_filters_heading_settings_option' );
			}
			submit_button();
			?>
		</form>
		<?php
	}
	?>
		</div>
	</div>
</div>