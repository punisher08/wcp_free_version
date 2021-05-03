<?php
/**
 * Registers Term Meta Data
 * 
 * Register Term meta data and fields and handle saving of Terms meta values.
 * 
 * Category 1 Terms Meta:
 * - `ndf_category_1_display_type` - Terms display as Text or display uploaded icon.
 * - `ndf_category_1_term_image_icon` - Uploaded image icon.
 * Category 2 Terms Meta:
 * - `ndf_category_2_display_type` - Terms display as Text or display uploaded icon.
 * - `ndf_category_2_term_image_icon` - Uploaded image icon.
 * Category 3 Terms Meta:
 * - `ndf_category_3_display_type` - Terms display as Text or display uploaded icon.
 * - `ndf_category_3_term_image_icon` - Uploaded image icon.
 * Category 4 Terms Meta:
 * - `ndf_category_4_display_type` - Terms display as Text or display uploaded icon.
 * - `ndf_category_4_term_image_icon` - Uploaded image icon.
 * Category 5 Terms Meta:
 * - `ndf_category_5_display_type` - Terms display as Text or display uploaded icon.
 * - `ndf_category_5_term_image_icon` - Uploaded image icon.
 * 
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
/**
 * Registers Term meta.
 * @return void
 */
function ndf_register_term_meta() {
    register_meta( 'term', 'ndf_category_1_display_type', '' );
    register_meta( 'term', 'ndf_category_1_term_image_icon', '' );

    register_meta( 'term', 'ndf_category_2_display_type', '' );
    register_meta( 'term', 'ndf_category_2_term_image_icon', '' );

    register_meta( 'term', 'ndf_category_3_display_type', '' );
    register_meta( 'term', 'ndf_category_3_term_image_icon', '' );

    register_meta( 'term', 'ndf_category_4_display_type', '' );
    register_meta( 'term', 'ndf_category_4_term_image_icon', '' );

    register_meta( 'term', 'ndf_category_5_display_type', '' );
    register_meta( 'term', 'ndf_category_5_term_image_icon', '' );


}
add_action( 'init', 'ndf_register_term_meta' );

/**
 * Display custom meta fields on adding terms.
 * @return void
 */
function ndf_category_1_add_meta_field() {
	wp_nonce_field( '_ndf_category_1_term_nonce', 'ndf_category_1_term_nonce' ); 
	/* this will add the custom meta field to the add new term page */
	?>
	<div class="form-field">
		<label for="ndf_category_1_display_type">Display Type</label>
		<label>
			<input type="radio" name="ndf_category_1_display_type" id="ndf_category_1_display_type" value="text" checked> Text
		</label>
		<label>
			<input type="radio" name="ndf_category_1_display_type" id="ndf_category_1_display_type" value="icon"> Icon
		</label>
		<p class="description"></p>
	</div>
	<div class="form-field">
		<label for="ndf_category_1_term_image_icon">Icon</label>
		<?php
		$ndf_category_1_term_image_icon = '';
		
		$html = '<input id="ndf_category_1_term_image_icon" name="ndf_category_1_term_image_icon" type="hidden" value="" />';
		$html .= '<input id="ndf_category_1_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_1_term_image_icon_button" type="button" value="Upload Image" />';
		$html .= '<p><span class="ndf_category_1_term_image_icon_new description"></span></p>';
		if( $ndf_category_1_term_image_icon ){
			$html .= "<p id='ndf_category_1_term_image_icon_wrap'><img src='".$ndf_category_1_term_image_icon."' id='ndf_category_1_term_image_icon_image' alt='ndf_category_1_term_image_icon' class='ndf_settings_image'>";
			$html .= "<button type='button' id='ndf_category_1_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
		}

		echo $html;
		?>
		<p class="description">Ideal Image size 30x30.</p>
	</div>
<?php
}
add_action( 'ndf_category_1_add_form_fields', 'ndf_category_1_add_meta_field', 10, 2 );

function ndf_category_2_add_meta_field() {
	wp_nonce_field( '_ndf_category_2_term_nonce', 'ndf_category_2_term_nonce' ); 
	/* this will add the custom meta field to the add new term page */
	?>
	<div class="form-field">
		<label for="ndf_category_2_display_type">Display Type</label>
		<label>
			<input type="radio" name="ndf_category_2_display_type" id="ndf_category_2_display_type" value="text" checked> Text
		</label>
		<label>
			<input type="radio" name="ndf_category_2_display_type" id="ndf_category_2_display_type" value="icon"> Icon
		</label>
		<p class="description"></p>
	</div>
	<div class="form-field">
		<label for="ndf_category_2_term_image_icon">Icon</label>
		<?php
		$ndf_category_2_term_image_icon = '';
		
		$html = '<input id="ndf_category_2_term_image_icon" name="ndf_category_2_term_image_icon" type="hidden" value="" />';
		$html .= '<input id="ndf_category_2_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_2_term_image_icon_button" type="button" value="Upload Image" />';
		$html .= '<p><span class="ndf_category_2_term_image_icon_new description"></span></p>';
		if( $ndf_category_2_term_image_icon ){
			$html .= "<p id='ndf_category_2_term_image_icon_wrap'><img src='".$ndf_category_2_term_image_icon."' id='ndf_category_2_term_image_icon_image' alt='ndf_category_2_term_image_icon' class='ndf_settings_image'>";
			$html .= "<button type='button' id='ndf_category_2_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
		}

		echo $html;
		?>
		<p class="description">Ideal Image size 30x30.</p>
	</div>
<?php
}
add_action( 'ndf_category_2_add_form_fields', 'ndf_category_2_add_meta_field', 10, 2 );

function ndf_category_3_add_meta_field() {
	wp_nonce_field( '_ndf_category_3_term_nonce', 'ndf_category_3_term_nonce' ); 
	/* this will add the custom meta field to the add new term page */
	?>
	<div class="form-field">
		<label for="ndf_category_3_display_type">Display Type</label>
		<label>
			<input type="radio" name="ndf_category_3_display_type" id="ndf_category_3_display_type" value="text" checked> Text
		</label>
		<label>
			<input type="radio" name="ndf_category_3_display_type" id="ndf_category_3_display_type" value="icon"> Icon
		</label>
		<p class="description"></p>
	</div>
	<div class="form-field">
		<label for="ndf_category_3_term_image_icon">Icon</label>
		<?php
		$ndf_category_3_term_image_icon = '';
		
		$html = '<input id="ndf_category_3_term_image_icon" name="ndf_category_3_term_image_icon" type="hidden" value="" />';
		$html .= '<input id="ndf_category_3_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_3_term_image_icon_button" type="button" value="Upload Image" />';
		$html .= '<p><span class="ndf_category_3_term_image_icon_new description"></span></p>';
		if( $ndf_category_3_term_image_icon ){
			$html .= "<p id='ndf_category_3_term_image_icon_wrap'><img src='".$ndf_category_3_term_image_icon."' id='ndf_category_3_term_image_icon_image' alt='ndf_category_3_term_image_icon' class='ndf_settings_image'>";
			$html .= "<button type='button' id='ndf_category_3_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
		}

		echo $html;
		?>
		<p class="description">Ideal Image size 30x30.</p>
	</div>
<?php
}
add_action( 'ndf_category_3_add_form_fields', 'ndf_category_3_add_meta_field', 10, 2 );

function ndf_category_4_add_meta_field() {
	wp_nonce_field( '_ndf_category_4_term_nonce', 'ndf_category_4_term_nonce' ); 
	/* this will add the custom meta field to the add new term page */
	?>
	<div class="form-field">
		<label for="ndf_category_4_display_type">Display Type</label>
		<label>
			<input type="radio" name="ndf_category_4_display_type" id="ndf_category_4_display_type" value="text" checked> Text
		</label>
		<label>
			<input type="radio" name="ndf_category_4_display_type" id="ndf_category_4_display_type" value="icon"> Icon
		</label>
		<p class="description"></p>
	</div>
	<div class="form-field">
		<label for="ndf_category_4_term_image_icon">Icon</label>
		<?php
		$ndf_category_4_term_image_icon = '';
		
		$html = '<input id="ndf_category_4_term_image_icon" name="ndf_category_4_term_image_icon" type="hidden" value="" />';
		$html .= '<input id="ndf_category_4_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_4_term_image_icon_button" type="button" value="Upload Image" />';
		$html .= '<p><span class="ndf_category_4_term_image_icon_new description"></span></p>';
		if( $ndf_category_4_term_image_icon ){
			$html .= "<p id='ndf_category_4_term_image_icon_wrap'><img src='".$ndf_category_4_term_image_icon."' id='ndf_category_4_term_image_icon_image' alt='ndf_category_4_term_image_icon' class='ndf_settings_image'>";
			$html .= "<button type='button' id='ndf_category_4_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
		}

		echo $html;
		?>
		<p class="description">Ideal Image size 30x30.</p>
	</div>
<?php
}
add_action( 'ndf_category_4_add_form_fields', 'ndf_category_4_add_meta_field', 10, 2 );

function ndf_category_5_add_meta_field() {
	wp_nonce_field( '_ndf_category_5_term_nonce', 'ndf_category_5_term_nonce' ); 
	/* this will add the custom meta field to the add new term page */
	?>
	<div class="form-field">
		<label for="ndf_category_5_display_type">Display Type</label>
		<label>
			<input type="radio" name="ndf_category_5_display_type" id="ndf_category_5_display_type" value="text" checked> Text
		</label>
		<label>
			<input type="radio" name="ndf_category_5_display_type" id="ndf_category_5_display_type" value="icon"> Icon
		</label>
		<p class="description"></p>
	</div>
	<div class="form-field">
		<label for="ndf_category_5_term_image_icon">Icon</label>
		<?php
		$ndf_category_5_term_image_icon = '';
		
		$html = '<input id="ndf_category_5_term_image_icon" name="ndf_category_5_term_image_icon" type="hidden" value="" />';
		$html .= '<input id="ndf_category_5_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_5_term_image_icon_button" type="button" value="Upload Image" />';
		$html .= '<p><span class="ndf_category_5_term_image_icon_new description"></span></p>';
		if( $ndf_category_5_term_image_icon ){
			$html .= "<p id='ndf_category_5_term_image_icon_wrap'><img src='".$ndf_category_5_term_image_icon."' id='ndf_category_5_term_image_icon_image' alt='ndf_category_5_term_image_icon' class='ndf_settings_image'>";
			$html .= "<button type='button' id='ndf_category_5_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
		}

		echo $html;
		?>
		<p class="description">Ideal Image size 30x30.</p>
	</div>
<?php
}
add_action( 'ndf_category_5_add_form_fields', 'ndf_category_5_add_meta_field', 10, 2 );

/**
 * Display custom meta fields on editing terms.
 * @return void
 */
function ndf_category_1_edit_meta_field( $term ) {
	$term_id = $term->term_id;

	wp_nonce_field( '_ndf_category_1_term_nonce', 'ndf_category_1_term_nonce' ); 
	$ndf_category_1_display_type = get_term_meta( $term_id, 'ndf_category_1_display_type', true );
	$ndf_category_1_term_image_icon = get_term_meta( $term_id, 'ndf_category_1_term_image_icon', true );
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_1_display_type">Display Type</label></th>
		<td>
			<label style="margin-right:30px;">
				<input type="radio" name="ndf_category_1_display_type" id="ndf_category_1_display_type" value="text" <?php echo ( esc_attr( $ndf_category_1_display_type ) != 'icon' ) ? 'checked' : ''; ?>> Text
			</label>
			<label>
				<input type="radio" name="ndf_category_1_display_type" id="ndf_category_1_display_type" value="icon" <?php echo ( esc_attr( $ndf_category_1_display_type ) === 'icon' ) ? 'checked' : ''; ?>> Icon
			</label>
			<p class="description"></p>
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_1_display_type">Icon</label></th>
		<td>
			<?php			
			$html = '<input id="ndf_category_1_term_image_icon" name="ndf_category_1_term_image_icon" type="hidden" value="' . esc_attr( $ndf_category_1_term_image_icon ) . '" />';
			$html .= '<input id="ndf_category_1_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_1_term_image_icon_button" type="button" value="Upload Image" />';
			$html .= '<p><span class="ndf_category_1_term_image_icon_new description"></span></p>';
			if( $ndf_category_1_term_image_icon ){
				$html .= "<p id='ndf_category_1_term_image_icon_wrap'><img src='".$ndf_category_1_term_image_icon."' id='ndf_category_1_term_image_icon_image' alt='ndf_category_1_term_image_icon' class='ndf_settings_image'>";
				$html .= "<button type='button' id='ndf_category_1_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
			}

			echo $html;
			?>
		</td>
	</tr>
<?php
}
add_action( 'ndf_category_1_edit_form_fields', 'ndf_category_1_edit_meta_field', 10, 2 );

function ndf_category_2_edit_meta_field( $term ) {
	$term_id = $term->term_id;

	wp_nonce_field( '_ndf_category_2_term_nonce', 'ndf_category_2_term_nonce' ); 
	$ndf_category_2_display_type = get_term_meta( $term_id, 'ndf_category_2_display_type', true );
	$ndf_category_2_term_image_icon = get_term_meta( $term_id, 'ndf_category_2_term_image_icon', true );
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_2_display_type">Display Type</label></th>
		<td>
			<label style="margin-right:30px;">
				<input type="radio" name="ndf_category_2_display_type" id="ndf_category_2_display_type" value="text" <?php echo ( esc_attr( $ndf_category_2_display_type ) != 'icon' ) ? 'checked' : ''; ?>> Text
			</label>
			<label>
				<input type="radio" name="ndf_category_2_display_type" id="ndf_category_2_display_type" value="icon" <?php echo ( esc_attr( $ndf_category_2_display_type ) === 'icon' ) ? 'checked' : ''; ?>> Icon
			</label>
			<p class="description"></p>
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_2_display_type">Icon</label></th>
		<td>
			<?php			
			$html = '<input id="ndf_category_2_term_image_icon" name="ndf_category_2_term_image_icon" type="hidden" value="' . esc_attr( $ndf_category_2_term_image_icon ) . '" />';
			$html .= '<input id="ndf_category_2_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_2_term_image_icon_button" type="button" value="Upload Image" />';
			$html .= '<p><span class="ndf_category_2_term_image_icon_new description"></span></p>';
			if( $ndf_category_2_term_image_icon ){
				$html .= "<p id='ndf_category_2_term_image_icon_wrap'><img src='".$ndf_category_2_term_image_icon."' id='ndf_category_2_term_image_icon_image' alt='ndf_category_2_term_image_icon' class='ndf_settings_image'>";
				$html .= "<button type='button' id='ndf_category_2_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
			}

			echo $html;
			?>
		</td>
	</tr>
<?php
}
add_action( 'ndf_category_2_edit_form_fields', 'ndf_category_2_edit_meta_field', 10, 2 );

function ndf_category_3_edit_meta_field( $term ) {
	$term_id = $term->term_id;

	wp_nonce_field( '_ndf_category_3_term_nonce', 'ndf_category_3_term_nonce' ); 
	$ndf_category_3_display_type = get_term_meta( $term_id, 'ndf_category_3_display_type', true );
	$ndf_category_3_term_image_icon = get_term_meta( $term_id, 'ndf_category_3_term_image_icon', true );
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_3_display_type">Display Type</label></th>
		<td>
			<label style="margin-right:30px;">
				<input type="radio" name="ndf_category_3_display_type" id="ndf_category_3_display_type" value="text" <?php echo ( esc_attr( $ndf_category_3_display_type ) != 'icon' ) ? 'checked' : ''; ?>> Text
			</label>
			<label>
				<input type="radio" name="ndf_category_3_display_type" id="ndf_category_3_display_type" value="icon" <?php echo ( esc_attr( $ndf_category_3_display_type ) === 'icon' ) ? 'checked' : ''; ?>> Icon
			</label>
			<p class="description"></p>
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_3_display_type">Icon</label></th>
		<td>
			<?php			
			$html = '<input id="ndf_category_3_term_image_icon" name="ndf_category_3_term_image_icon" type="hidden" value="' . esc_attr( $ndf_category_3_term_image_icon ) . '" />';
			$html .= '<input id="ndf_category_3_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_3_term_image_icon_button" type="button" value="Upload Image" />';
			$html .= '<p><span class="ndf_category_3_term_image_icon_new description"></span></p>';
			if( $ndf_category_3_term_image_icon ){
				$html .= "<p id='ndf_category_3_term_image_icon_wrap'><img src='".$ndf_category_3_term_image_icon."' id='ndf_category_3_term_image_icon_image' alt='ndf_category_3_term_image_icon' class='ndf_settings_image'>";
				$html .= "<button type='button' id='ndf_category_3_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
			}

			echo $html;
			?>
		</td>
	</tr>
<?php
}
add_action( 'ndf_category_3_edit_form_fields', 'ndf_category_3_edit_meta_field', 10, 2 );

function ndf_category_4_edit_meta_field( $term ) {
	$term_id = $term->term_id;

	wp_nonce_field( '_ndf_category_4_term_nonce', 'ndf_category_4_term_nonce' ); 
	$ndf_category_4_display_type = get_term_meta( $term_id, 'ndf_category_4_display_type', true );
	$ndf_category_4_term_image_icon = get_term_meta( $term_id, 'ndf_category_4_term_image_icon', true );
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_4_display_type">Display Type</label></th>
		<td>
			<label style="margin-right:30px;">
				<input type="radio" name="ndf_category_4_display_type" id="ndf_category_4_display_type" value="text" <?php echo ( esc_attr( $ndf_category_4_display_type ) != 'icon' ) ? 'checked' : ''; ?>> Text
			</label>
			<label>
				<input type="radio" name="ndf_category_4_display_type" id="ndf_category_4_display_type" value="icon" <?php echo ( esc_attr( $ndf_category_4_display_type ) === 'icon' ) ? 'checked' : ''; ?>> Icon
			</label>
			<p class="description"></p>
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_4_display_type">Icon</label></th>
		<td>
			<?php			
			$html = '<input id="ndf_category_4_term_image_icon" name="ndf_category_4_term_image_icon" type="hidden" value="' . esc_attr( $ndf_category_4_term_image_icon ) . '" />';
			$html .= '<input id="ndf_category_4_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_4_term_image_icon_button" type="button" value="Upload Image" />';
			$html .= '<p><span class="ndf_category_4_term_image_icon_new description"></span></p>';
			if( $ndf_category_4_term_image_icon ){
				$html .= "<p id='ndf_category_4_term_image_icon_wrap'><img src='".$ndf_category_4_term_image_icon."' id='ndf_category_4_term_image_icon_image' alt='ndf_category_4_term_image_icon' class='ndf_settings_image'>";
				$html .= "<button type='button' id='ndf_category_4_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
			}

			echo $html;
			?>
		</td>
	</tr>
<?php
}
add_action( 'ndf_category_4_edit_form_fields', 'ndf_category_4_edit_meta_field', 10, 2 );

function ndf_category_5_edit_meta_field( $term ) {
	$term_id = $term->term_id;

	wp_nonce_field( '_ndf_category_5_term_nonce', 'ndf_category_5_term_nonce' ); 
	$ndf_category_5_display_type = get_term_meta( $term_id, 'ndf_category_5_display_type', true );
	$ndf_category_5_term_image_icon = get_term_meta( $term_id, 'ndf_category_5_term_image_icon', true );
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_5_display_type">Display Type</label></th>
		<td>
			<label style="margin-right:30px;">
				<input type="radio" name="ndf_category_5_display_type" id="ndf_category_5_display_type" value="text" <?php echo ( esc_attr( $ndf_category_5_display_type ) != 'icon' ) ? 'checked' : ''; ?>> Text
			</label>
			<label>
				<input type="radio" name="ndf_category_5_display_type" id="ndf_category_5_display_type" value="icon" <?php echo ( esc_attr( $ndf_category_5_display_type ) === 'icon' ) ? 'checked' : ''; ?>> Icon
			</label>
			<p class="description"></p>
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="ndf_category_5_display_type">Icon</label></th>
		<td>
			<?php			
			$html = '<input id="ndf_category_5_term_image_icon" name="ndf_category_5_term_image_icon" type="hidden" value="' . esc_attr( $ndf_category_5_term_image_icon ) . '" />';
			$html .= '<input id="ndf_category_5_term_image_icon_button" class="button-secondary button ndf_media_file_upload" name="ndf_category_5_term_image_icon_button" type="button" value="Upload Image" />';
			$html .= '<p><span class="ndf_category_5_term_image_icon_new description"></span></p>';
			if( $ndf_category_5_term_image_icon ){
				$html .= "<p id='ndf_category_5_term_image_icon_wrap'><img src='".$ndf_category_5_term_image_icon."' id='ndf_category_5_term_image_icon_image' alt='ndf_category_5_term_image_icon' class='ndf_settings_image'>";
				$html .= "<button type='button' id='ndf_category_5_term_image_icon_remove' class='button button-secondary ndf_remove_saved_image' title='Remove Image'><span class='dashicons dashicons-no'></span></button></p>";
			}

			echo $html;
			?>
		</td>
	</tr>
<?php
}
add_action( 'ndf_category_5_edit_form_fields', 'ndf_category_5_edit_meta_field', 10, 2 );


/**
 * Saving Category 1 custom meta fields.
 * @param object $term_id Current term info.
 * @return void
 */
function ndf_save_category_1_custom_meta( $term_id ) {
	if ( ! isset( $_POST['ndf_category_1_term_nonce'] ) || ! wp_verify_nonce( $_POST['ndf_category_1_term_nonce'], '_ndf_category_1_term_nonce' ) ) return;

	update_term_meta( $term_id, 'ndf_category_1_display_type', $_POST['ndf_category_1_display_type'] );
	update_term_meta( $term_id, 'ndf_category_1_term_image_icon', $_POST['ndf_category_1_term_image_icon'] );
}  
add_action( 'edited_ndf_category_1', 'ndf_save_category_1_custom_meta', 10, 2 );  
add_action( 'create_ndf_category_1', 'ndf_save_category_1_custom_meta', 10, 2 );

/**
 * Saving Category 2 custom meta fields.
 * @param object $term_id Current term info.
 * @return void
 */
function ndf_save_category_2_custom_meta( $term_id ) {
	if ( ! isset( $_POST['ndf_category_2_term_nonce'] ) || ! wp_verify_nonce( $_POST['ndf_category_2_term_nonce'], '_ndf_category_2_term_nonce' ) ) return;

	update_term_meta( $term_id, 'ndf_category_2_display_type', $_POST['ndf_category_2_display_type'] );
	update_term_meta( $term_id, 'ndf_category_2_term_image_icon', $_POST['ndf_category_2_term_image_icon'] );
}  
add_action( 'edited_ndf_category_2', 'ndf_save_category_2_custom_meta', 10, 2 );  
add_action( 'create_ndf_category_2', 'ndf_save_category_2_custom_meta', 10, 2 );

/**
 * Saving Category 3 custom meta fields.
 * @param object $term_id Current term info.
 * @return void
 */
function ndf_save_category_3_custom_meta( $term_id ) {
	if ( ! isset( $_POST['ndf_category_3_term_nonce'] ) || ! wp_verify_nonce( $_POST['ndf_category_3_term_nonce'], '_ndf_category_3_term_nonce' ) ) return;

	update_term_meta( $term_id, 'ndf_category_3_display_type', $_POST['ndf_category_3_display_type'] );
	update_term_meta( $term_id, 'ndf_category_3_term_image_icon', $_POST['ndf_category_3_term_image_icon'] );
}  
add_action( 'edited_ndf_category_3', 'ndf_save_category_3_custom_meta', 10, 2 );  
add_action( 'create_ndf_category_3', 'ndf_save_category_3_custom_meta', 10, 2 );

/**
 * Saving Category 4 custom meta fields.
 * @param object $term_id Current term info.
 * @return void
 */
function ndf_save_category_4_custom_meta( $term_id ) {
	if ( ! isset( $_POST['ndf_category_4_term_nonce'] ) || ! wp_verify_nonce( $_POST['ndf_category_4_term_nonce'], '_ndf_category_4_term_nonce' ) ) return;

	update_term_meta( $term_id, 'ndf_category_4_display_type', $_POST['ndf_category_4_display_type'] );
	update_term_meta( $term_id, 'ndf_category_4_term_image_icon', $_POST['ndf_category_4_term_image_icon'] );
}  
add_action( 'edited_ndf_category_4', 'ndf_save_category_4_custom_meta', 10, 2 );  
add_action( 'create_ndf_category_4', 'ndf_save_category_4_custom_meta', 10, 2 );

/**
 * Saving Category 5 custom meta fields.
 * @param object $term_id Current term info.
 * @return void
 */
function ndf_save_category_5_custom_meta( $term_id ) {
	if ( ! isset( $_POST['ndf_category_5_term_nonce'] ) || ! wp_verify_nonce( $_POST['ndf_category_5_term_nonce'], '_ndf_category_5_term_nonce' ) ) return;

	update_term_meta( $term_id, 'ndf_category_5_display_type', $_POST['ndf_category_5_display_type'] );
	update_term_meta( $term_id, 'ndf_category_5_term_image_icon', $_POST['ndf_category_5_term_image_icon'] );
}  
add_action( 'edited_ndf_category_5', 'ndf_save_category_5_custom_meta', 10, 2 );  
add_action( 'create_ndf_category_5', 'ndf_save_category_5_custom_meta', 10, 2 );

