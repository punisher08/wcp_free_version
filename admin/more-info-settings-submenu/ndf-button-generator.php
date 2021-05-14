<?php
/**
 * More Info `Button Generator` tab contents
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/more-info-settings-submenu
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 * 
 */
?>
<div class="errorText"></div>
<?php
$active_generator_page = '';
if( isset( $_GET[ 'generator-page' ] ) ) {
	$active_generator_page = $_GET[ 'generator-page' ];
}
?>
<ul class="subsubsub">
	<li class="button-generator"><a href="?page=wcp-more-info-settings&tab=button-generator" class="<?php echo $active_generator_page == '' ? 'current' : ''; ?>">Button Generator</a> |</li>
	<li class="button-style-configuration"><a href="?page=wcp-more-info-settings&tab=button-generator&generator-page=style-configuration" class="<?php echo $active_generator_page == 'style-configuration' ? 'current' : ''; ?>">Button Style Configuration</a></li>
</ul>
<br><br><br>
<div class="">
<!-- <div class="more_info_fields"> -->

<?php
$field_saved = false;
if( $active_generator_page == 'style-configuration' ){
	if( isset( $_POST['save_styles'] ) ){
		$style_id = $_POST['style_id'];
		$label = $_POST['label'];
		$background = $_POST['background'];
		$background_hover = $_POST['background_hover'];
		$text_color = $_POST['text_color'];
		$text_color_hover = $_POST['text_color_hover'];
		$border_radius = $_POST['border_radius'];
		$border_width = $_POST['border_width'];
		$border_color = $_POST['border_color'];
		$font_size = $_POST['font_size'];
		$padding_top = $_POST['padding_top'];
		$padding_bottom = $_POST['padding_bottom'];
		$padding_left = $_POST['padding_left'];
		$padding_right = $_POST['padding_right'];
		
		$old = get_option( 'ndf_button_style_configuration' );
		$old[$style_id] = array(
			'label' => $label,
			'background' => $background,
			'background_hover' => $background_hover,
			'text_color' => $text_color,
			'text_color_hover' => $text_color_hover,
			'border_radius' => $border_radius,
			'border_width' => $border_width,
			'border_color' => $border_color,
			'font_size' => $font_size,
			'padding_top' => $padding_top,
			'padding_bottom' => $padding_bottom,
			'padding_left' => $padding_left,
			'padding_right' => $padding_right
		);
		$new = $old;

		update_option('ndf_button_style_configuration', $new);
		$field_saved = true;
		$get_max_order++;
	}

	if( $field_saved ) { ?>
		<div id="message" class="updated">
		<p><strong><?php _e('Style saved.') ?></strong></p>
		</div>
		<?php
	}

	$ndf_button_style_configuration = get_option( 'ndf_button_style_configuration' );

	if( is_array( $ndf_button_style_configuration ) ){
		foreach( $ndf_button_style_configuration as $style_id => $settings ){
			?>
			<div id="item_<?php echo $style_id; ?>" class="item">
				<h3><?php echo $settings['label']; ?></h3>
				<div>
					<form action="" method="post">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td style="width:20%;">Style Label</td>
									<td style="width:80%;"><input type="text" name="label" value="<?php echo $settings['label']; ?>"></td>
								</tr>
								<tr>
									<td style="width:20%;">Background Color</td>
									<td style="width:80%;"><input type="text" name="background" value="<?php echo $settings['background']; ?>" class="ndf_colorpicker"></td>
								</tr>
								<tr>
									<td style="width:20%;">Hover Background Color</td>
									<td style="width:80%;"><input type="text" name="background_hover" value="<?php echo $settings['background_hover']; ?>" class="ndf_colorpicker"></td>
								</tr>
								<tr>
									<td style="width:20%;">Text Color</td>
									<td style="width:80%;"><input type="text" name="text_color" value="<?php echo $settings['text_color']; ?>" class="ndf_colorpicker"></td>
								</tr>
								<tr>
									<td style="width:20%;">Hover Text Color</td>
									<td style="width:80%;"><input type="text" name="text_color_hover" value="<?php echo $settings['text_color_hover']; ?>" class="ndf_colorpicker"></td>
								</tr>
								<tr>
									<td style="width:20%;">Border Radius</td>
									<td style="width:80%;"><input type="number" min="0" class="small-text" name="border_radius" value="<?php echo $settings['border_radius']; ?>" /> px</td>
								</tr>
								<tr>
									<td style="width:20%;">Border Width</td>
									<td style="width:80%;"><input type="number" min="0" class="small-text" name="border_width" value="<?php echo $settings['border_width']; ?>" /> px</td>
								</tr>
								<tr>
									<td style="width:20%;">Border Color</td>
									<td style="width:80%;"><input type="text" name="border_color" value="<?php echo $settings['border_color']; ?>" class="ndf_colorpicker"></td>
								</tr>
								<tr>
									<td style="width:20%;">Font Size</td>
									<td style="width:80%;">
										<select name='font_size' class='ndf_dropdown'>
											<?php
											$source_tag_args = array(
												'8px' => '8px',
												'10px' => '10px',
												'12px' => '12px',
												'14px' => '14px',
												'16px' => '16px',
												'18px' => '18px',
												'20px' => '20px',
												'22px' => '22px',
												'24px' => '24px',
												'26px' => '26px',
												'28px' => '28px',
												'30px' => '30px'
											);
											foreach( $source_tag_args as $option_key => $option_value ){
												echo "<option value='".$option_key."' ".selected( $settings['font_size'], $option_key, false ).">".$option_value."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:20%;">Padding Top</td>
									<td style="width:80%;"><input type="number" min="0" class="small-text" name="padding_top" value="<?php echo $settings['padding_top']; ?>" /> px</td>
								</tr>
								<tr>
									<td style="width:20%;">Padding Bottom</td>
									<td style="width:80%;"><input type="number" min="0" class="small-text" name="padding_bottom" value="<?php echo $settings['padding_bottom']; ?>" /> px</td>
								</tr>
								<tr>
									<td style="width:20%;">Padding Left</td>
									<td style="width:80%;"><input type="number" min="0" class="small-text" name="padding_left" value="<?php echo $settings['padding_left']; ?>" /> px</td>
								</tr>
								<tr>
									<td style="width:20%;">Padding Right</td>
									<td style="width:80%;"><input type="number" min="0" class="small-text" name="padding_right" value="<?php echo $settings['padding_right']; ?>" /> px</td>
								</tr>
								<tr>
									<td style="width:20%;"><input type="hidden" name="style_id" value="<?php echo $style_id; ?>"></td>
									<td style="width:20%;" colspan="2"><input type="submit" name="save_styles" value="Submit"></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
			<?php
		}
	}
}
else{
	/*Button Generator*/
	?>
	<table width="100%">
		<tr>
			<td style="vertical-align: top;width: 60%;">
				<div id="button_generator_form">
					<div class="button_generator_label">
						<p>Select Style</p>
					</div>
					<div class="button_generator_fields">
						<?php
						$ndf_button_style_configuration = get_option( 'ndf_button_style_configuration' );

						if( is_array( $ndf_button_style_configuration ) ){
							echo "<select name='font_size' id='button_generator_style' class='ndf_dropdown'>";
							foreach( $ndf_button_style_configuration as $style_id => $settings ){
								echo "<option value='".$style_id."'>".$settings['label']."</option>";
							}
							echo "</select>";
						}
						?>
					</div>

					<div class="button_generator_label">
						<p>Text<span class="ndf_required">*</span></p>
					</div>
					<div class="button_generator_fields">
						<input type="text" id="button_generator_text">
					</div>

					<div class="button_generator_label">
						<p>Link<span class="ndf_required">*</span></p>
					</div>
					<div class="button_generator_fields">
						<input type="text" id="button_generator_link">
					</div>

					<div class="button_generator_label">
						<p class="button_generator_radio_label">Target</p>
					</div>
					<div class="button_generator_fields">
						<label for="button_generator_new"><input type="radio" id="button_generator_new" value="new" name="button_generator_target"> Open in New Window</label>
						<label for="button_generator_same"><input type="radio" id="button_generator_same" value="same" name="button_generator_target" checked> Open in Same Window</label>
					</div>

					<?php
					$ndf_outbound_clicks_track = get_option( 'ndf_outbound_clicks_track', 0 );
					if( !is_wp_error( $ndf_outbound_clicks_track ) && $ndf_outbound_clicks_track == 1 ){
						?>
						<div class="button_generator_label">
							<p class="button_generator_radio_label">Track Outbound Click</p>
						</div>
						<div class="button_generator_fields">
							<label for="button_generator_track_oc_yes"><input type="radio" id="button_generator_track_oc_yes" value="yes" name="button_generator_track_oc"> Yes</label>
							<label for="button_generator_track_oc_no"><input type="radio" id="button_generator_track_oc_no" value="no" name="button_generator_track_oc" checked> No</label>
						</div>
						<div class="button_generator_label">
							<p>Linked Filter Data</p>
						</div>
						<div class="button_generator_fields">
							<?php
							$get_wcp_data_source_tag_args = array( 'post_type' => array( 'ndf_data' ), 'post_status' => array( 'publish' ), 'posts_per_page' => -1, 'orderby' => array( 'meta_value_num' => 'DESC', 'date' => 'ASC', ), 'meta_key' => 'ndf_data_settings_featured_data_' );

							$get_wcp_data_query = new WP_Query( $get_wcp_data_source_tag_args );
							if( $get_wcp_data_query->have_posts() ) {
								echo '<select id="button_generator_oc_linked_data">';
								echo '<option value="select">Select</option>';
								while ( $get_wcp_data_query->have_posts() ) {
									$get_wcp_data_query->the_post();
									echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';
								}
								echo '</select>';
							}
							wp_reset_postdata();
							?>
						</div>
							<?php
							/* Get term ID to exclude */
							$exclude = array();

							$wcp_default_source_tags = get_option( 'wcp_default_source_tags', array() );
							if( is_array($wcp_default_source_tags) ){
								$exclude[] = (int)$wcp_default_source_tags['enquiry_button_click'];
								$exclude[] = (int)$wcp_default_source_tags['enquiry_form_submit'];
								$exclude[] = (int)$wcp_default_source_tags['more_info_button_click'];
							}

							$source_tag_args = array(
								'taxonomy'		=> 'wcp_outbound_source',
								'exclude'		=> $exclude,
								'hierarchical'	=> 1,
								'title_li'		=> '',
								'hide_empty'	=> 0,
								'orderby'		=> 'id',
								'order'			=> 'ASC',
							);
							
							$terms = get_categories( $source_tag_args );

							if( !empty($terms) ){
								?>
								<div class="button_generator_label">
									<p>Source Tag</p>
								</div>
								<div class="button_generator_fields">
									<?php
									echo '<select id="button_generator_oc_source_tag">';
									echo '<option value="select">Select</option>';
									foreach( $terms as $term ){
										echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
									}
									echo '</select>';
									?>
								</div>
								<?php
							}
					}
					?>

					<div class="button_generator_label">&nbsp;</div>
					<div class="button_generator_fields">
						<input type="button" id="button_generator_submit" class="button button-secondary" value="Generate">
					</div>
				</div>
			</td>
			<td style="vertical-align: top;">
				<p><strong>Code:</strong></p>
				<textarea style="width: 100%" rows="3" id="ndf_generated_button_code"></textarea>
				
				<p id="ndf_generated_button_preview_label"><strong>Preview:</strong></p>
				<div id="ndf_generated_button">
					<a role="button" class="ndf_generated_button ndf_button_style_1">Button</a>
					<a role="button" class="ndf_generated_button ndf_button_style_2">Button</a>
					<a role="button" class="ndf_generated_button ndf_button_style_3">Button</a>
					<a role="button" class="ndf_generated_button ndf_button_style_4">Button</a>
					<a role="button" class="ndf_generated_button ndf_button_style_5">Button</a>
				</div>
			</td>
		</tr>
	</table>
	<?php
}
?>
</div>