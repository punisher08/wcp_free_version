<?php
/**
 * Provides the 'Data Settings' view for the corresponding tab in the Data Item Data Settings Meta Box.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes/meta-box-partials
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
?>
<div class="inside">
	<table class="wp-list-table widefat ndf_no_border">
		<tr>
			<td colspan="2">
				<p>
					<input type="checkbox" name="ndf_data_settings_featured_data_" id="ndf_data_settings_featured_data_" value="1" <?php echo ( ndf_data_settings_get_meta( 'ndf_data_settings_featured_data_' ) === '1' ) ? 'checked' : ''; ?>>
					<label for="ndf_data_settings_featured_data_">Set as featured?</label>
				</p>
			</td>
		</tr>
		<tr>
			<td><p>Sort Order</p></td>
			<td>
				<p>
					<?php $ndf_sort_order_value = ndf_data_settings_get_meta( 'ndf_data_settings_sort_order' ); ?>
					<input type="text" name="ndf_data_settings_sort_order" id="ndf_data_settings_sort_order" size="3" maxlength="3" value="<?php echo ($ndf_sort_order_value == '' || $ndf_sort_order_value == 'ZZZZ') ? '' : $ndf_sort_order_value; ?>">
				</p>
			</td>
		</tr>
		<tr>
			<td><strong>Heading logo</strong></td>
			<td>
				<?php
				$ndf_data_settings_data_heading = ndf_data_settings_get_meta( 'ndf_data_settings_data_heading' );
				
				$html = '<input id="ndf_data_settings_data_heading" name="ndf_data_settings_data_heading" type="hidden" value="'.$ndf_data_settings_data_heading.'" />';
				$html .= '<input id="ndf_data_settings_data_heading_button" class="button-secondary button ndf_media_file_upload" name="ndf_data_settings_data_heading_button" type="button" value="Select Image" />';
				$html .= '<p><span class="ndf_data_settings_data_heading_new description"></span></p>';
				if( $ndf_data_settings_data_heading ){
					$html .= "<p id='ndf_data_settings_data_heading_wrap'><img src='".$ndf_data_settings_data_heading."' id='ndf_data_settings_data_heading_image' alt='ndf_data_settings_data_heading' class='ndf_settings_image'>";
					$html .= "<button type='button' id='ndf_data_settings_data_heading_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
				}

				echo $html;
				?>
			</td>
		</tr>
	</table>
</div>