<?php
/**
 * Provides the `More Information` view for the corresponding tab in the Data Item Data Settings Meta Box.
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
		if ( class_exists( 'MR_Rating_Form' ) || class_exists( 'MRP_Rating_Form' ) ) {
			$ndf_data_mr_ratingrank = ndf_data_settings_get_meta( 'ndf_data_mr_ratingrank' );

			if( $ndf_data_mr_ratingrank == false || empty($ndf_data_mr_ratingrank) ){
				$ndf_data_mr_ratingrank = 0;
			}
			?>
			<tr>
				<td colspan="2"><strong>Rating Rank: <?php echo floatval($ndf_data_mr_ratingrank); ?></strong></td>
			</tr>
			<?php
		}
		?>
		<?php
		$ndf_star_rating_style = 'style="display: none;"';
		if( get_option('ndf_star_ratings_element_show', 1) == 1 ){
			$ndf_star_rating_style = '';
		}
		?>
		<tr <?php echo $ndf_star_rating_style; ?>>
			<?php
			$ndf_data_star_rating = ndf_data_settings_get_meta( 'ndf_data_star_rating' );
			$ndf_data_star_rating_custom = ndf_data_settings_get_meta( 'ndf_data_star_rating_custom' );

			$ndf_data_star_rating_stars = array(
				'no-rating' => 'No Rating',
				5 => 5,
				4 => 4,
				3 => 3,
				2 => 2,
				1 => 1,
				'custom-rating' => 'Custom Rating',
			);
			?>
			<td><strong>Star Rating</strong></td>
			<td>
				<select name='ndf_data_star_rating' id='ndf_data_star_rating' class='ndf_dropdown'>
				<?php
				foreach( $ndf_data_star_rating_stars as $option_key => $option_value ){
					echo "<option value='".$option_key."' ".selected( $ndf_data_star_rating, $option_key, false ).">".$option_value."</option>";
				}
				?>
				</select>
			</td>
		</tr>
		<tr id="ndf_data_star_rating_custom_wrap">
			<td><strong>Custom Star Rating</strong></td>
			<td>
				<input type="text" class="widefat" name="ndf_data_star_rating_custom" id="ndf_data_star_rating_custom" value="<?php echo esc_attr__($ndf_data_star_rating_custom); ?>">
			</td>
		</tr>
		<tr>
			<td><strong>More Information Button Action</strong></td>
			<td>
				<?php
				$ndf_data_more_info_button_action = ndf_data_settings_get_meta( 'ndf_data_more_info_button_action' );
				?>
				<select name="ndf_data_more_info_button_action" id="ndf_data_more_info_button_action">
					<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_more_info_button_action' ) === '' ) ? 'selected' : '' ?> value="">More Info pop-up</option>
					<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_more_info_button_action' ) === 'more-info-page' ) ? 'selected' : '' ?> value="more-info-page">More Info page</option>
					<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_more_info_button_action' ) === 'external-link' ) ? 'selected' : '' ?> value="external-link">External Link</option>
				</select>
			</td>
		</tr>
		<tr id="ndf_data_moreinfo_external_link_wrap">
			<td><strong>External Link</strong></td>
			<td>
				<input type="text" class="widefat" name="ndf_data_more_info_link" id="ndf_data_more_info_link" value="<?php echo esc_attr__(ndf_data_settings_get_meta( 'ndf_data_more_info_link' )); ?>">
			</td>
		</tr>
		<tr id="ndf_data_moreinfo_external_link_target_wrap">
			<td><strong>External Link Target</strong></td>
			<td>
				<?php
				$ndf_data_more_info_button_target = ndf_data_settings_get_meta( 'ndf_data_more_info_button_target' );
				?>
				<select name="ndf_data_more_info_button_target" id="ndf_data_more_info_button_target">
					<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_more_info_button_target' ) === '' ) ? 'selected' : '' ?> value="">Open in New Window</option>
					<option <?php echo (ndf_data_settings_get_meta( 'ndf_data_more_info_button_target' ) === 'same-window' ) ? 'selected' : '' ?> value="same-window">Open in Same Window</option>
				</select>
			</td>
		</tr>
		</tr>
			<td><strong>Content</strong></td>
			<td>
				<?php
				$ndf_data_more_info_content = ndf_data_settings_get_meta( 'ndf_data_more_info_content' );

				$html = wp_editor( 
					$ndf_data_more_info_content,
					'ndf_data_more_info_content',
					array(
						'wpautop'			=> false,
						'media_buttons'		=> true,
						'textarea_name'		=>	'ndf_data_more_info_content',
						'textarea_rows'		=>	7,
						'tinymce'			=> true,
						'quicktags' 		=> true,
					)  
				);
				echo $html;
				?>
			</td>
		</tr>
		<?php
		$ndf_show_enquiry_form = get_option( 'ndf_show_enquiry_form', 0 );

		if( $ndf_show_enquiry_form == 1){
			$ndf_data_enquiry_form = ndf_data_settings_get_meta( 'ndf_data_enquiry_form' );
			$ndf_data_recipient_email = ndf_data_settings_get_meta( 'ndf_data_recipient_email' );
			?>
			<tr>
				<td><strong>Enquiry Form</strong></td>
				<td>
					<select name='ndf_data_enquiry_form' id="ndf_data_enquiry_form" class='ndf_dropdown'>
					<?php
					echo "<option value='show' ".selected( $ndf_data_enquiry_form, 'show', false ).">Show</option>";
					echo "<option value='hide' ".selected( $ndf_data_enquiry_form, 'hide', false ).">Hide</option>";
					?>
					</select>
				</td>
			</tr>
			<tr id="ndf_data_recipient_email_wrap">
				<td><strong>Recipient Email</strong></td>
				<td>
					<input type="text" class="widefat" name="ndf_data_recipient_email" id="ndf_data_recipient_email" value="<?php echo esc_attr__(sanitize_email($ndf_data_recipient_email)); ?>">
				</td>
			</tr>
			<tr id="ndf_data_recipient_email_wrap">
				<td><strong>Enable Request Form</strong></td>
				<td>
					<?php
						// Checkbox to enable request quotes
						global $post;
						$ndf_data_enable_request_form_meta_box = get_post_meta($post->ID);
						$html = '<input type="checkbox" id="ndf_data_enable_request_form_meta_box" name="ndf_data_enable_request_form_meta_box" value="1" ' . checked( 1, $ndf_data_enable_request_form_meta_box['ndf_data_enable_request_form_meta_box'][0], false ) . '/>'; 
						echo $html;
					?>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>