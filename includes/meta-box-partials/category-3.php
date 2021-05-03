<?php
/**
 * Provides the `Category 3` view for the corresponding tab in the Data Item Category Contents Meta Box.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes/meta-box-partials
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
?>
<?php 
if( $nav_tab_active == 3 ) {
	$nav_tab_active_content_class = 'inside';	
}
else{
	$nav_tab_active_content_class = 'inside hidden'; 
}
?>
<div class="<?php echo $nav_tab_active_content_class; ?>">
	<table class="wp-list-table widefat ndf_no_border">
	<tr>
		<td style="width:25%;"><label for="ndf_data_category_3_content_option"><strong>Content Option</strong></label></td>
		<td>
			<select name="ndf_data_category_3_content_option" id="ndf_data_category_3_content_option">
				<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_category_3_content_option' ) === '' ) ? 'selected' : '' ?> value="">Display Category Value</option>
				<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_category_3_content_option' ) === 'custom-content' ) ? 'selected' : '' ?> value="custom-content">Display Custom Content</option>
				<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_category_3_content_option' ) === 'both' ) ? 'selected' : '' ?> value="both">Display Both</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label for="ndf_data_category_3_content_type"><strong>Content Type</strong></label></td>
		<td>
			<select name="ndf_data_category_3_content_type" id="ndf_data_category_3_content_type">
				<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_category_3_content_type' ) === 'simple content' ) ? 'selected' : '' ?>>Simple Content</option>
				<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_category_3_content_type' ) === 'tooltip' ) ? 'selected' : '' ?> value="tooltip">Tooltip</option>
			</select>
		</td>
	</tr>
	<tr class='ndf_custom_content_meta'>
		<td><strong>Content</strong></td>
		<td>
			<?php
			$ndf_data_category_3_content = ndf_data_settings_get_meta( 'ndf_data_category_3_content' );

			$html = wp_editor( 
				$ndf_data_category_3_content,
				'ndf_data_category_3_content',
				array(
					'wpautop'			=> false,
					'media_buttons'		=> true,
					'textarea_name'		=>	'ndf_data_category_3_content',
					'textarea_rows'		=>	7,
					'tinymce'			=> true,
					'quicktags' 		=> true,
				)  
			);
			echo $html;
			?>
		</td>
	</tr>
	</table>
</div>