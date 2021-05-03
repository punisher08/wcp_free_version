<?php
/**
 * More Info `Preview` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/more-info-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
?>
<table class="wp-list-table widefat ndf_no_border" style="width:800px;">
<?php
$field_rows = $wpdb->get_results( "SELECT * FROM $ndf_data_filtering_saved_fields ORDER BY field_order ASC" );

if( empty( $field_rows ) ){
	echo '<tr>';
	echo '<td><em>No fields added.</em></td>';
	echo '<tr>';
}
else{
	foreach( $field_rows as $field_row ){
		if( $field_row->hidden == 0 ){
			$required_field = '';
			if( $field_row->required == 1 ){
				$required_field = '<span class="ndf_required">* </span>';
			}

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
			else if( $field_row->field_type == 'radio_button' ){
				$field_values = $field_row->field_values;
				echo '<tr>';
				echo '<td><strong>' . $required_field . '' . $field_row->label . '</strong></td>';
				echo '<td>';
				echo $generated_field = $NDFFieldGenerator->generateField( 
					$field_row->field_type,  $field_row->field_type.'_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $field_values, ''
				);
				echo '</td>';
				echo '</tr>';
			}
			else if( $field_row->field_type == 'dropdown' ){
				$field_values = $field_row->field_values;
				echo '<tr>';
				echo '<td><strong>' . $required_field . '' . $field_row->label . '</strong></td>';
				echo '<td>';
				echo $generated_field = $NDFFieldGenerator->generateField( 
					$field_row->field_type,  $field_row->field_type.'_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, $field_values, ''
				);
				echo '</td>';
				echo '</tr>';
			}
			else{
				$field_values = $field_row->field_values;
				echo '<tr>';
				echo '<td><strong>' . $required_field . '' . $field_row->label . '</strong></td>';
				echo '<td>';
				echo $generated_field = $NDFFieldGenerator->generateField( 
					$field_row->field_type,  $field_row->field_type.'_'.$field_row->ID, $field_values, $field_row->default_value, $field_row->required, '', $field_row->default_value
				);
				echo '</td>';
				echo '</tr>';
			}
		}
	}
}
?>
</table>