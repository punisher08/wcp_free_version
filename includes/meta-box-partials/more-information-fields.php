<?php
/**
 * Provides the `More Information Fields` view for the corresponding tab in the Data Item Data Settings Meta Box.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes/meta-box-partials
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
?>
<div class="inside hidden">
	<table class="wp-list-table widefat ndf_no_border">
		<?php
		global $wpdb;
		$NDFFieldGenerator = new NDFFieldGenerator();

		$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
		$field_rows = $wpdb->get_results( "SELECT * FROM $ndf_data_filtering_saved_fields WHERE hidden = '0' ORDER BY field_order ASC" );

		if( empty(  $field_rows ) ){
			?>
			<tr>
				<!-- <td><em><a href="< ?php echo admin_url('admin.php?page=ndf-more-info-settings'); ?>">Add fields here</a></em></td> -->
				<td><em><a href="<?php echo admin_url('admin.php?page=wcp-more-info-settings'); ?>">Add fields here</a></em></td>
			</tr>
			<?php
		}
		else{
			foreach( $field_rows as $field_row ){
				$field_values = $field_row->field_values;
				$ndf_meta_field_data = ndf_data_settings_get_meta( 'ndf_fields_'.$field_row->ID );

				if( $field_row->field_type == 'section' ){
					$field_values = $field_row->field_values;
					echo '<tr>';
						echo '<td colspan="2">';
						echo $generated_field = $NDFFieldGenerator->generateField( 
						$field_row->field_type,  $field_row->label, $field_values, $field_row->default_value, $field_row->required, $field_values, $field_row->default_value
					);
						echo '</td>';
					echo '</tr>';
				}
				else{
					$required_field = '';
					if( $field_row->required == 1 ){
						$required_field = '<span class="ndf_required">* </span>';
					}
					?>
					<tr>
						<td style="width:25%;"><strong><?php echo $required_field . '' . $field_row->label; ?></strong></td>
						<td style="width:75%;">
							<?php 
							if( $field_row->field_type == 'name' ){
								echo $generated_field = $NDFFieldGenerator->generateField( 
									'name',  'ndf_fields_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $ndf_meta_field_data, $ndf_meta_field_data
								);
							}
							else{
								echo $generated_field = $NDFFieldGenerator->generateField( 
									$field_row->field_type,  'ndf_fields_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $ndf_meta_field_data, $ndf_meta_field_data
								);
							}
							?>
						</td>
					</tr>
					<?php
				}
			}
		}
		?>
	</table>
</div>