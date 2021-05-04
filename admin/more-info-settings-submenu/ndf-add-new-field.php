<?php
/**
 * More Info `Add Field` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/more-info-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 * 
 */
?>
<div class="errorText"></div>
<form id="ndf_more_info_fields_add" method="post" action="admin.php?page=wcp-more-info-settings&tab=fields&field-saved">
<table style="width:800px;">
<tbody>
	<tr>
		<td style="width:20%;">Field Label</td>
		<td style="width:80%;"><input type="text" name="label" value=""></td>
	</tr>
	<tr>
		<td>Field Type</td>
		<td>
			<select name="field_type" id="ndf_more_info_field_type">
			<?php 
			$field_attributes = '';
			$field_types = $NDFFieldGenerator::fieldTypes( 'standard' );
			echo '<optgroup label="Standard">';
			foreach( $field_types as $field => $value ){
				echo '<option value="'.$field.'">'.$value['label'].'</option>';
				if( $value['fields'] ){
					$field_attributes .= '<tr class="hidden" data-ndf-field-parent="'.$field.'">';
					$field_attributes .= '<td>';
					$field_attributes .= $value['fields']['label'];
					$field_attributes .= '<br>';
					$field_attributes .= $value['fields']['instructions'];
					$field_attributes .= '</td>';
					$field_attributes .= '<td>';
					if( isset( $value['fields']['options'] ) ){
						if( $value['fields']['field_type'] == 'checkbox' ){
							$field_name = 'field_values[]';
						}
						else{
							$field_name = 'field_values';
						}
						$generated_field = $NDFFieldGenerator->generateField( 
							$value['fields']['field_type'], $field_name, $value['fields']['options']
						);
					}
					else{
						$generated_field = $NDFFieldGenerator->generateField( 
							$value['fields']['field_type'], 'field_values'
						);
					}
					$field_attributes .= $generated_field;
					$field_attributes .= '</td>';
					$field_attributes .= '</tr>';
				}
			}
			echo '</optgroup>';

			$field_types = $NDFFieldGenerator::fieldTypes( 'advanced' );
			echo '<optgroup label="Advanced">';
			foreach( $field_types as $field => $value ){
				echo '<option value="'.$field.'">'.$value['label'].'</option>';
				if( $value['fields'] ){
					$field_attributes .= '<tr class="hidden" data-ndf-field-parent="'.$field.'">';
					$field_attributes .= '<td>';
					$field_attributes .= $value['fields']['label'];
					$field_attributes .= '<br>';
					$field_attributes .= $value['fields']['instructions'];
					$field_attributes .= '</td>';
					$field_attributes .= '<td>';
					if( isset( $value['fields']['options'] ) ){
						$field_name = 'field_values';
						
						$generated_field = $NDFFieldGenerator->generateField( 
							$value['fields']['field_type'], $field_name, $value['fields']['options']
						);
					}
					else{
						$generated_field = $NDFFieldGenerator->generateField( 
							$value['fields']['field_type'], 'field_values'
						);
					}
					$field_attributes .= $generated_field;
					$field_attributes .= '</td>';
					$field_attributes .= '</tr>';
				}
			}
			echo '</optgroup>';
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Hidden</td>
		<td>
			<label><input type="radio" name="hidden" value="0" checked> No</label>
			<label><input type="radio" name="hidden" value="1"> Yes</label>
		</td>
	</tr>
	<tr class="ndf_required_field">
		<td>Required</td>
		<td>
			<label><input type="radio" name="required" value="0" checked> No</label>
			<label><input type="radio" name="required" value="1"> Yes</label>
		</td>
	</tr>
	<?php echo $field_attributes; ?>
</tbody>
</table>
<input type="hidden" name="field_order" value="<?php echo $get_max_order; ?>">
<?php submit_button( 'Add Field', 'primary', 'add_fields' ); ?>
</form>