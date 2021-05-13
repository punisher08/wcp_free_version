<?php
/**
 * Settings for the More Info Settings page.
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
	$active_tab = 'fields';
	if( isset( $_GET[ 'tab' ] ) ) {
		$active_tab = $_GET[ 'tab' ];
	}

	global $wpdb;
	$NDFFieldGenerator = new NDFFieldGenerator();

	$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
	$get_max_order = $wpdb->get_var( "SELECT MAX(field_order)+1 FROM $ndf_data_filtering_saved_fields" );

	$field_updated = false;
	$field_saved = false;
	$field_deleted = false;

	if( isset( $_POST['submit'] ) ){
		$update_field_row = array();
		$update_field_row_format = array();
		if( $_POST['field_type'] == 'radio_button' || $_POST['field_type'] == 'checkbox' || $_POST['field_type'] == 'dropdown' || $_POST['field_type'] == 'name' ){
			$field_values = array();
		}

		if( isset( $_POST['ID'] ) ){
			foreach( $_POST as $key => $value ){
				if( $key != 'submit' && $key != 'ID' ){
					/* Handles multiple `default_value` name; Removes the random number in the field name; */
					if( strpos($key, 'default_value') !== false ){
						$key = substr($key, 0, -5);
					}

					if( $key == 'option_label' || $key == 'field_values_name' ){
						$field_values['label'] = serialize( stripslashes_deep( array_map('trim', $value ) ) );
					}
					else if( $key == 'option_value' ){
						$field_values['value'] = serialize( stripslashes_deep( array_map('trim', $value ) ) );
					}
					else{
						if( is_array($value) ){
							$value = serialize( stripslashes_deep( array_map('trim', $value ) ) );
						}
						else{
							$value = stripslashes_deep( trim( $value ) );
						}
						$update_field_row[$key] = $value;
						$update_field_row_format[] = '%s';
					}
				}
				else if( $key != 'submit' && $key == 'ID' ){
					$update_field_row_where = array( 'ID' => $value );
				}
			}
			if( !empty( $field_values ) ){
				$update_field_row['field_values'] = serialize( stripslashes_deep( array_map('trim', $field_values ) ) );
				$update_field_row_format[] = '%s';
			}

			$wpdb->update( $ndf_data_filtering_saved_fields, $update_field_row, $update_field_row_where, $update_field_row_format, array( '%d' ) );
			$field_updated = true;
		}
	}
	if( isset( $_POST['add_fields'] ) ){
		$add_field_row = array();
		$add_field_row_format = array();
		if( $_POST['field_type'] == 'radio_button' || $_POST['field_type'] == 'checkbox' || $_POST['field_type'] == 'dropdown' || $_POST['field_type'] == 'name' ){
			$field_values = array();
		}

		foreach( $_POST as $key => $value ){
			if( $key != 'add_fields' ){
				if( $key == 'option_label' || $key == 'field_values_name' ){
					$field_values['label'] = serialize( stripslashes_deep( array_map('trim', $value ) ) );
				}
				else if( $key == 'option_value' ){
					$field_values['value'] = serialize( stripslashes_deep( array_map('trim', $value ) ) );
				}
				else{
					if( is_array($value) ){
						$value = serialize( stripslashes_deep( array_map('trim', $value ) ) );
					}
					else{
						$value = stripslashes_deep( trim( $value ) );
					}
					$add_field_row[$key] = $value;
					$add_field_row_format[] = '%s';
				}
			}
		}

		if( !empty( $field_values ) ){
			$add_field_row['field_values'] = serialize( stripslashes_deep( array_map('trim', $field_values ) ) );
			$add_field_row_format[] = '%s';
		}

		$wpdb->insert( $ndf_data_filtering_saved_fields, $add_field_row, $add_field_row_format );
		$field_saved = true;
		$get_max_order++;
	}
	if( isset( $_POST['delete_more_info_field'] ) ){
		$wpdb->delete( $ndf_data_filtering_saved_fields, array( 'ID' => $_POST['ID'] ), array( '%d') );
		$field_deleted = true;
	}
	?>
	<?php if( $field_saved ) { ?>
		<div id="message" class="updated">
		<p><strong><?php _e('Field saved.') ?></strong></p>
		</div>
	<?php } ?>
	<?php if( $field_updated ) { ?>
		<div id="message" class="updated">
		<p><strong><?php _e('Field updated.') ?></strong></p>
		</div>
	<?php } ?>
	<?php if( $field_deleted ) { ?>
		<div id="message" class="updated">
		<p><strong><?php _e('Field deleted.') ?></strong></p>
		</div>
	<?php } ?>
<div class="row custom-card">
	<div class="col-lg-3 col-md-3 sidebar">
		<!-- <h2 class="nav-tab-wrapper"> -->
		<h2 class="sidenav">
			<a href="?page=wcp-more-info-settings&tab=fields" class="nav-tab-new <?php echo $active_tab == 'fields' ? 'nav-tab-active' : ''; ?>">Fields</a>
			<a href="?page=wcp-more-info-settings&tab=preview" class="nav-tab-new <?php echo $active_tab == 'preview' ? 'nav-tab-active' : ''; ?>">Preview</a>
			<a href="?page=wcp-more-info-settings&tab=summary" class="nav-tab-new <?php echo $active_tab == 'summary' ? 'nav-tab-active' : ''; ?>">Summary</a>
			<a href="?page=wcp-more-info-settings&tab=ui-settings" class="nav-tab-new <?php echo $active_tab == 'ui-settings' ? 'nav-tab-active' : ''; ?>">UI Settings</a>
			<a href="?page=wcp-more-info-settings&tab=slug-settings" class="nav-tab-new <?php echo $active_tab == 'slug-settings' ? 'nav-tab-active' : ''; ?>">Slug Settings</a>
			<a href="?page=wcp-more-info-settings&tab=button-generator" class="nav-tab-new <?php echo $active_tab == 'button-generator' ? 'nav-tab-active' : ''; ?>">Button Generator</a>
		</h2>
	</div>	
	<br>
	<div class="col-lg-9 col-md-9 scroll">
	<?php
	if( $active_tab == 'fields' ) {
		include NDF_BASE_DIR . '/admin/more-info-settings-submenu/ndf-add-new-field.php';
		include NDF_BASE_DIR . '/admin/more-info-settings-submenu/ndf-fields.php';
	}
	else if( $active_tab == 'summary' ){
		?>
		<form method="post" action="options.php" enctype="multipart/form-data"> 
			<?php
			settings_fields( 'ndf_more_info_fields_summary_settings_option' );
			do_settings_sections( 'ndf_more_info_fields_summary_settings_option' );
			submit_button();
			?>
		</form>
		<?php
	}
	else if( $active_tab == 'ui-settings' ){
		?>
		<form method="post" action="options.php" enctype="multipart/form-data"> 
			<?php
			settings_fields( 'ndf_more_info_fields_ui_settings_option' );
			do_settings_sections( 'ndf_more_info_fields_ui_settings_option' );
			submit_button();
			?>
		</form>
		<?php
	}
	else if( $active_tab == 'slug-settings' ){
		?>
		<form method="post" action="options.php" enctype="multipart/form-data"> 
			<?php
			settings_fields( 'ndf_more_info_fields_slug_settings_option' );
			do_settings_sections( 'ndf_more_info_fields_slug_settings_option' );
			submit_button();
			?>
		</form>
		<?php
	}
	else if( $active_tab == 'button-generator' ){
		include NDF_BASE_DIR . '/admin/more-info-settings-submenu/ndf-button-generator.php';
	}
	else{
		include NDF_BASE_DIR . '/admin/more-info-settings-submenu/ndf-preview.php';
	}
	?>
		</div>
	</div>
</div>