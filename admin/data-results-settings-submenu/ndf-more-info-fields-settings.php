<?php
/**
 * Data Results Section `More Info Fields Settings` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/data-results-settings-submenu
 * @since 		1.2.1.1
 * @author 		Netseek Pty Ltd
 * 
 */
?>
<div class="wrap">
<h2>More Info Fields</h2>
<p></p>
<?php
global $wpdb;

$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
$get_cat_1_label = get_option( 'ndf_category_1_filter_label', 'Category 1' );
$get_cat_2_label = get_option( 'ndf_category_2_filter_label', 'Category 2' );
$get_cat_3_label = get_option( 'ndf_category_3_filter_label', 'Category 3' );
$get_cat_4_label = get_option( 'ndf_category_4_filter_label', 'Category 4' );
$get_cat_5_label = get_option( 'ndf_category_5_filter_label', 'Category 5' );
$field_options = '';
$excluded_fields = array();

$ndf_get_more_fields = get_option( 'ndf_data_results_table_more_fields', array() );
foreach( $ndf_get_more_fields as $field_key => $exclude ){
	array_push( $excluded_fields, $exclude['field_ID'] );
}
$field_rows = $wpdb->get_results( "SELECT ID, label FROM $ndf_data_filtering_saved_fields ORDER BY field_order ASC", ARRAY_A );

if( !empty( $field_rows ) ){
	foreach($field_rows as $value){
		if( !in_array( $value['ID'], $excluded_fields ) ){
			$field_options .= '<option value="'.$value['ID'].'">'.$value['label'].'</option>';
		}
		$field_values[$value['ID']] = $value['label'];
	}
	?>
	<form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post" id="wcp_data_results_add_field">
		<?php wp_nonce_field( '_ndf_more_info_add_field_nonce', 'ndf_more_info_add_field_nonce' ); ?>
		<input type="hidden" name="action" value="ndf_data_results_more_info_fields_add">
		<table style="width:800px;">
		<tbody>
			<tr>
				<td style="width:20%;">Select Field</td>
				<td style="width:80%;">
					<select name="ndf_field">
						<option value="">-Select-</option>
						<?php echo $field_options; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="width:20%;">Visible in Column</td>
				<td style="width:80%;">
					<select name="ndf_add_to_column">
						<option value="more-info">More Info</option>
						<option value="category-1"><?php echo $get_cat_1_label; ?></option>
						<option value="category-2"><?php echo $get_cat_2_label; ?></option>
						<option value="category-3"><?php echo $get_cat_3_label; ?></option>
						<option value="category-4"><?php echo $get_cat_4_label; ?></option>
						<option value="category-5"><?php echo $get_cat_5_label; ?></option>
					</select>
					<small><em>(Applicable on Tabular View only)</em></small>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add" name="wcp_add_field" class="button button-primary"></td>
			</tr>
		</tbody>
	</table>
	</form>
	<?php
}

if( !empty( $ndf_get_more_fields ) ){
	?>
	<form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post">
		<?php wp_nonce_field( '_ndf_more_info_fields_nonce', 'ndf_more_info_fields_nonce' ); ?>
		<input type="hidden" name="action" value="ndf_data_results_more_info_fields_update">
		<table class="wp-list-table widefat ndf_no_border" id="ndf_results_section_more_info">
		<thead>
			<tr>
				<th style="width:5%"></th>
				<th style="width:55%">Field Name</th>
				<th style="width:35%">Visible in Column<br>(Applicable on Tabular View only)</th>
				<th style="width:5%">Remove<br>to list</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach( $ndf_get_more_fields as $key => $more_fields ){
				?>
				<tr>
					<td style="width:5%"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></td>
					<td style="width:55%"><?php echo $field_values[$more_fields['field_ID']]; ?></td>
					<td style="width:35%" class="ndf_field">
						<select name="field[<?php echo $more_fields['field_ID']; ?>][ndf_add_to_column]">
							<option value="more-info" <?php selected( $more_fields['column'], 'more-info' ); ?>>More Info</option>
							<option value="category-1" <?php selected( $more_fields['column'], 'category-1' ); ?>><?php echo $get_cat_1_label; ?></option>
							<option value="category-2" <?php selected( $more_fields['column'], 'category-2' ); ?>><?php echo $get_cat_2_label; ?></option>
							<option value="category-3" <?php selected( $more_fields['column'], 'category-3' ); ?>><?php echo $get_cat_3_label; ?></option>
							<option value="category-4" <?php selected( $more_fields['column'], 'category-4' ); ?>><?php echo $get_cat_4_label; ?></option>
							<option value="category-5" <?php selected( $more_fields['column'], 'category-5' ); ?>><?php echo $get_cat_5_label; ?></option>
						</select>
					</td>
					<td style="width:5%" class="ndf_field">
						<input type="checkbox" name="ndf_remove_field[]" value="<?php echo $more_fields['field_ID']; ?>">
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
		<tfoot>
			<tr class="">
				<td colspan="4"><input type="submit" value="Update" class="button button-primary alignright" name="wcp_submit"></td>
			</tr>
		</tfoot>
		</table>
	</form>
	<?php
}
?>
</div>