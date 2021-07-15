<?php
/**
 * More Info `Fields` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/more-info-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
?>
<div class="fields-row">
	<div class="fields-first-section">
		<div class="more_info_ajax_result"></div>
		<div class="more_info_fields">
	<?php
	$field_rows = $wpdb->get_results( "SELECT * FROM $ndf_data_filtering_saved_fields ORDER BY field_order ASC" );

	if( empty( $field_rows ) ){
		echo '<table class="wp-list-table widefat ndf_no_border" style="width:100%;"><tbody><tr>';
		echo '<td><em>More info settings doesn`t have any fields yet. Select the fields on the Add more info field. </em> <span class="dashicons dashicons-arrow-right-alt"></span></td>';
		echo '<tr></tbody></table>';
	}
	else{ 
	foreach( $field_rows as $field_row ){
		?>
		
		<div id="item_<?php echo $field_row->ID; ?>" class="item">
			<h3><?php echo $field_row->label; ?></h3>
			<div>
				<form method="post" action="admin.php?page=wcp-more-info-settings&tab=fields&field-updated">
				<table style="width:100%;">
					<tbody>
						<tr>
							<td style="width:20%;">Field Key</td>
							<td style="width:80%;"><input type="text" value="ndf_fields_<?php echo esc_attr__( $field_row->ID ); ?>" disabled="disabled"></td>
						</tr>
						<tr>
							<td style="width:20%;">Field Label</td>
							<td style="width:80%;"><input type="text" name="label" value="<?php echo esc_attr__( $field_row->label ); ?>" required data-msg="Please enter a field label"></td>
						</tr>
						<tr>
							<td>Field Type</td>
							<td>
							<select name="field_type" id="ndf_more_info_field_type_edit_<?php echo $field_row->ID; ?>" class="ndf_more_info_field_type_edit">
								<?php 
								$field_attributes = '';
								$field_types = $NDFFieldGenerator::fieldTypes( 'standard' );
								echo '<optgroup label="Standard">';
								foreach( $field_types as $field => $value ){
									echo '<option value="'.$field.'" '.selected( $field_row->field_type, $field, false ).'>'.$value['label'].'</option>';
									if( $value['fields'] ){
										$field_attributes .= '<tr class="" data-ndf-field-parent="'.$field.'">';
										$field_attributes .= '<td>';
										$field_attributes .= $value['fields']['label'];
										$field_attributes .= '<br>';
										$field_attributes .= $value['fields']['instructions'];
										$field_attributes .= '</td>';
										$field_attributes .= '<td style="padding-top:40px;">';
										if( isset( $value['fields']['options'] ) ){
											$field_name = 'field_values';

											if( $value['fields']['field_type'] == "section_add_field" ){
												$value['fields']['field_type'] = "section_edit_field";

												$generated_field = $NDFFieldGenerator->generateField( 
													$value['fields']['field_type'], $field_name, $value['fields']['options'], $field_row->field_values, '', $field_row->field_values, $field_row->default_value
												);
											}
											else{
												$generated_field = $NDFFieldGenerator->generateField( 
													$value['fields']['field_type'], $field_name, $value['fields']['options'], $field_row->field_values, '', $field_row->field_values, $field_row->default_value
												);
											}


										}
										else{
											if( $value['fields']['field_type'] == 'dynamic_input' || $value['fields']['field_type'] == 'dynamic_input_checkbox' ){
												$value['fields']['field_type'] = $value['fields']['field_type'].'_edit';
												$generated_field = $NDFFieldGenerator->generateField( 
													$value['fields']['field_type'], 'field_values'.'_'.$field_row->ID, '', $field_row->field_values, '', $field_row->field_values, $field_row->default_value
												);
											}
											else{
											$generated_field = $NDFFieldGenerator->generateField( 
												$value['fields']['field_type'], 'field_values', '', $field_row->field_values, '', $field_row->field_values, $field_row->default_value
											);
											}
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
									echo '<option value="'.$field.'" '.selected( $field_row->field_type, $field, false ).'>'.$value['label'].'</option>';
									if( $value['fields'] ){
										$field_attributes .= '<tr class="" data-ndf-field-parent="'.$field.'">';
										$field_attributes .= '<td>';
										$field_attributes .= $value['fields']['label'];
										$field_attributes .= '<br>';
										$field_attributes .= $value['fields']['instructions'];
										$field_attributes .= '</td>';
										$field_attributes .= '<td style="padding-top:40px;">';
										if( isset( $value['fields']['options'] ) ){
											$field_name = 'field_values';

											if( $value['fields']['field_type'] == "name_add" ){
												$value['fields']['field_type'] = "name_edit";

												$generated_field = $NDFFieldGenerator->generateField( 
													$value['fields']['field_type'], $field_name, $value['fields']['options'], '', '', $field_row->field_values, $field_row->default_value
												);
											}
											else{
												$generated_field = $NDFFieldGenerator->generateField( 
													$value['fields']['field_type'], $field_name, $value['fields']['options'], '', '', $field_row->field_values, $field_row->default_value
												);
											}
										}
										else{
											$generated_field = $NDFFieldGenerator->generateField( 
												$value['fields']['field_type'], $field_row->ID.'_field_values', '', '', $field_row->field_values, $field_row->default_value
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
								<label><input type="radio" name="hidden" value="0" <?php echo checked( $field_row->hidden, 0 ) ?>> No</label>
								<label><input type="radio" name="hidden" value="1" <?php echo checked( $field_row->hidden, 1 ) ?>> Yes</label>
							</td>
						</tr>
						<tr>
							<td>Required</td>
							<td>
								<label><input type="radio" name="required" value="0" <?php echo checked( $field_row->required, 0 ) ?>> No</label>
								<label><input type="radio" name="required" value="1" <?php echo checked( $field_row->required, 1 ) ?>> Yes</label>
							</td>
						</tr>
						<tr>	
							<?php
							// field group section
							$field_groups_settings = array();
							$register_section_1_name = get_option( 'register_section_1_name', 'default' );
							$register_section_2_name = get_option( 'register_section_2_name', 'default' );
							$register_section_3_name = get_option( 'register_section_3_name', 'default' );
			
							$val = isset($field_row->field_group) ? esc_attr($field_row->field_group) : '';

							if($register_section_1_name != 'default' && $register_section_1_name != ''){
								$field_groups_settings [] =  $register_section_1_name;
							}
							if($register_section_2_name != 'default' && $register_section_2_name != ''){
								$field_groups_settings [] =  $register_section_2_name;
							}
							if($register_section_3_name != 'default' && $register_section_3_name != ''){
								$field_groups_settings [] =  $register_section_3_name;
							}
							if(!empty($field_groups_settings))
							{
								echo '<td>Field Group</td>';
								echo '<td>';
								echo '<select name="field_group">';
								foreach($field_groups_settings as $section_id => $section_name):
								?>
									<option <?php echo (($val==$section_name)?"selected":"") ?>><?php  echo $section_name; ?></option>
								<?php
								endforeach;
								echo '</select>';
								echo '</td>';
							}
							else{
								echo '<td class="no-field-groups">Add Field Groups <a href="admin.php?page=wcp-more-info-settings&tab=fieldgroup">here</a></td>';
							}
							// end field group options
							?>
						</tr>
						<?php echo $field_attributes; ?>
					</tbody>
				</table>
				<input type="hidden" name="ID" value="<?php echo $field_row->ID; ?>">
				<?php submit_button(); ?>
				</form>
				<form action="admin.php?page=wcp-more-info-settings&tab=fields&field-deleted" method="post" class="ndf_delete_field">
					<input type="hidden" name="ID" value="<?php echo $field_row->ID; ?>">
					<button type="button" class="button-secondary alignright ndf_delete_more_info_field">Delete Field</button>
					<button type="submit" name="delete_more_info_field" class="button-primary alignright ndf_confirm_delete_more_info_field hidden">Confirm Delete</button>
				</form>
			</div>
		</div>
		<?php
	}
	}
	?>
		</div>
	</div>
