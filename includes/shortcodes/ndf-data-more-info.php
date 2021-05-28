<?php
/**
 * Shortcode Registration Scripts
 * 
 * Registered Shortcode:
 * - `wp_comparison_more_info` - Displays the more info fields table.
 * 
 * @package 	Netseek_Data_Filter
 * @subpackage 	Netseek_Data_Filter/includes/shortcodes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

function ndf_data_more_info_shortcode( $atts ) {
	extract(shortcode_atts(
		array(
			'id' => '',
		),
		$atts
	));

	if( empty( $id ) ){
		die();
	}
	ob_start();
	$ndf_more_info_fields_table_header_background_color = get_option( 'ndf_more_info_fields_table_header_background_color', '#eff1f2' );
	$ndf_more_info_fields_heading_style = get_option( 'ndf_more_info_fields_heading_style', 'h2' );
	$ndf_more_info_fields_heading_label_fontcolor = get_option( 'ndf_more_info_fields_heading_label_fontcolor', '#000000' );
	$ndf_more_info_fields_table_background_color = get_option( 'ndf_more_info_fields_table_background_color', '#FFFFFF' );
	$ndf_more_info_fields_header_font_size = get_option( 'ndf_more_info_fields_header_font_size', '14px' );
	$ndf_more_info_fields_header_fontcolor = get_option( 'ndf_more_info_fields_header_fontcolor', '#000000' );
	$ndf_more_info_fields_table_font_size = get_option( 'ndf_more_info_fields_table_font_size', '14px' );
	$ndf_more_info_fields_table_font_color = get_option( 'ndf_more_info_fields_table_font_color', '#161616' );
	$ndf_more_info_fields_text_alignment = get_option( 'ndf_more_info_fields_text_alignment', 'center' );
	$ndf_more_info_fields_table_row_space = get_option( 'ndf_more_info_fields_table_row_space', 30 );
	$ndf_more_info_fields_table_border_width = get_option( 'ndf_more_info_fields_table_border_width', 1 );
	$ndf_more_info_fields_table_border_color = get_option( 'ndf_more_info_fields_table_border_color', '#efefef' );
	$ndf_more_info_fields_table_border_radius = get_option( 'ndf_more_info_fields_table_border_radius', 8 );
	$ndf_more_info_fields_summary_label_heading_style = get_option( 'ndf_more_info_fields_summary_label_heading_style', 'h2' );
	$ndf_more_info_fields_summary_label_lineheight = get_option( 'ndf_more_info_fields_summary_label_lineheight', '1.2' );
	$ndf_more_info_fields_summary_label_fontcolor = get_option( 'ndf_more_info_fields_summary_label_fontcolor', '#000000' );
	$ndf_more_info_fields_summary_table_header_font_size = get_option( 'ndf_more_info_fields_summary_table_header_font_size', '14px' );
	$ndf_more_info_fields_summary_table_header_fontcolor = get_option( 'ndf_more_info_fields_summary_table_header_fontcolor', '#000000' );

	$ndf_star_rating_color = get_option( 'ndf_star_rating_color', '#f9f922' );
	?>
	<style type="text/css">
	ul, ol{
		margin-bottom: 0px;
	}
	.op-page-header {
		display:none !important;
	}
	h1.the-title, .cf.post-meta-container{
		display: none;
	}
	h1.ndf_summary_title, h2.ndf_summary_title, h3.ndf_summary_title, h4.ndf_summary_title, h5.ndf_summary_title, h6.ndf_summary_title{
		font-weight: bold;
		margin: 0 0 10px;
		padding: 0px;
		display: inline;
		color: <?php echo $ndf_more_info_fields_heading_label_fontcolor; ?>;
	}
	.ndf_modal_content h1:before, .ndf_modal_content h2:before, .ndf_modal_content h3:before, .ndf_modal_content h4:before, .ndf_modal_content h5:before, .ndf_modal_content h6:before{
		display: none;
	}
	h1.ndf_summary_title{ font-size: 3em; }
	h2.ndf_summary_title{ font-size: 2em; }
	h3.ndf_summary_title{ font-size: 1.5em; }
	h4.ndf_summary_title{ font-size: 1.35em; }
	h5.ndf_summary_title{ font-size: 1.2em; }
	h6.ndf_summary_title{ font-size: 1em; }
	#ndf_more_info_fields{
		/*border-spacing: 0px <?php echo $ndf_more_info_fields_table_row_space; ?>px;
		border-collapse: separate;
		border: none;*/
	}
	#ndf_more_info_fields .title, #ndf_more_info_fields .data{
		padding: 5px;
		word-break: break-word;
	}
	#ndf_more_info_fields .title, #ndf_more_info_fields .data, .ndf_more_info_summary *{
		/*text-align: <?php //echo $ndf_more_info_fields_text_alignment; ?>;*/
	}
	#ndf_more_info_fields .title *, #ndf_more_info_fields .data *{
		text-align: left;
	}
	#ndf_more_info_fields .data{
		-webkit-border-top-right-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		-moz-border-radius-topright: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		border-top-right-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		
		-webkit-border-bottom-right-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		-moz-border-radius-bottomright: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		border-bottom-right-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;

		background-color: <?php echo $ndf_more_info_fields_table_background_color; ?>;
		border: <?php echo $ndf_more_info_fields_table_border_width.'px solid '.$ndf_more_info_fields_table_border_color ; ?>;
		border-left: none;
		/*width: 60%;*/
	}
	#ndf_more_info_fields .data, #ndf_more_info_fields .data p, #ndf_more_info_fields .data a, #ndf_more_info_fields .data p *, #ndf_more_info_fields .data li, #ndf_more_info_fields .data li div{
		color: <?php echo $ndf_more_info_fields_table_font_color; ?>;
		font-size: <?php echo $ndf_more_info_fields_table_font_size; ?>;
		-webkit-box-shadow: none;
		box-shadow: none;
	}
	#ndf_more_info_fields .title{
		-webkit-border-top-left-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		-moz-border-radius-topleft: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		border-top-left-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		
		-webkit-border-bottom-left-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		-moz-border-radius-bottomleft: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		border-bottom-left-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;

		background-color: <?php echo $ndf_more_info_fields_table_header_background_color; ?>;
		font-size: <?php echo $ndf_more_info_fields_header_font_size; ?>;
		color: <?php echo $ndf_more_info_fields_header_fontcolor; ?>;

		border: <?php echo $ndf_more_info_fields_table_border_width.'px solid '.$ndf_more_info_fields_table_border_color ; ?>;
		border-right: none;
		
		vertical-align: middle;
		/*width: 40%;*/
	}
	#ndf_more_info_fields .title.full{
		-webkit-border-top-right-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		-moz-border-radius-topright: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		border-top-right-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		
		-webkit-border-bottom-right-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		-moz-border-radius-bottomright: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		border-bottom-right-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;

		border: <?php echo $ndf_more_info_fields_table_border_width.'px solid '.$ndf_more_info_fields_table_border_color ; ?>;
	}
	#ndf_more_info_fields .title *{
		color: <?php echo $ndf_more_info_fields_header_fontcolor; ?>;
	}
	#ndf_more_info_fields .frxp-grid{
		margin-top: <?php echo $ndf_more_info_fields_table_row_space; ?>px;
		margin-left: 0px;
	}
	.ndf_more_info_summary{
		margin-bottom: 0px;
		margin-top: 20px;
	}
	.ndf_more_info_summary ul.frxp-list > li > div{
		-webkit-border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		-moz-border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		
		border: <?php echo $ndf_more_info_fields_table_border_width.'px solid '.$ndf_more_info_fields_table_border_color ; ?>;
		word-break: break-word;
	}
	.ndf_more_info_summary ul.frxp-list li div{
		word-break: break-word;
	}
	.ndf_more_info_summary li{
		line-height: 1em;
	}
	.ndf_more_info_summary ul.frxp-list > li{
		padding: 5px;
		margin: 0;
		margin-bottom: 10px;
		display: inline-block;
		vertical-align: top;
	}
	.ndf_more_info_summary ul.frxp-list li, #ndf_more_info_fields .data li{
		margin-bottom: 0px;
	}
	.ndf_more_info_summary ul.frxp-list{
		margin: 0;
	}
	.ndf_more_info_summary ul.frxp-list .icon{
		display: block;
		position: static;
		width: auto;
		height: auto;
	}
	.ndf_more_info_summary ul, .ndf_more_info_summary ol{
		margin: 0;
	}
	.ndf_more_info_summary ul.frxp-list:after{
		content: '';
		clear: both;
		display: table;
	}
	.ndf_more_info_summary ul.frxp-list li div, .ndf_more_info_summary .ndf_summary_category_content p, .ndf_more_info_summary .ndf_summary_category_content{
		padding: 5px;
		color: <?php echo $ndf_more_info_fields_table_font_color; ?>;
		font-size: <?php echo $ndf_more_info_fields_table_font_size; ?>;
		margin-bottom: 0px;
	}
	.ndf_more_info_summary ul.frxp-list li div{
		text-align: left;
		border:none;
	}
	.ndf_more_info_summary ul.frxp-list ul{
		padding-left: 10px;
	}
	.ndf_data_summary_star_rating{
		text-align: left;
		padding: 5px 0px;
	}
	.ndf_data_summary_star_rating i{
		color: <?php echo $ndf_star_rating_color; ?>;
		font-size: 2em;
	}
	img.ndf_data_summary_logo{
		max-height: 90px;
    	max-width: 170px;
		float: left;
		display:inline-block;
		padding-right: 20px;
		width: auto;
   		height: auto;
	}
	h1.ndf_summary_label, h2.ndf_summary_label, h3.ndf_summary_label, h4.ndf_summary_label, h5.ndf_summary_label{
		margin:20px 0 10px;
		padding-bottom:20px;
		border-bottom: <?php echo $ndf_more_info_fields_table_border_width.'px solid '.$ndf_more_info_fields_table_border_color ; ?>;
		color: <?php echo $ndf_more_info_fields_summary_label_fontcolor; ?>;
		line-height: <?php echo $ndf_more_info_fields_summary_label_lineheight; ?>em;
	}
	hr.ndf_summary_divider{
		background: none;
		border: none;
		border-bottom: <?php echo $ndf_more_info_fields_table_border_width.'px solid '.$ndf_more_info_fields_table_border_color ; ?>;
		max-width: 100% !important;
		margin: 10px 0px 10px !important;
	}
	#ndf_more_info_fields .ndf_clear.full{
		/*width: 100%;*/
	}
	#ndf_more_info_fields ol, #ndf_more_info_fields ul, .ndf_more_info_summary ol, .ndf_more_info_summary ul{
		margin-left: 0px;
		list-style-position: inside;
	}
	#ndf_more_info_fields .data ol, #ndf_more_info_fields .data ul{
		display: inline-block;
	}
	#ndf_more_info_fields .data ol li, #ndf_more_info_fields .data ul li{
		text-align: left;
	}
	hr.ndf_section_divider{
		background: none;
		padding: 0;
		margin: 0px 0px 0px;
		border: none;
		border-bottom: <?php echo $ndf_more_info_fields_table_border_width.'px solid '.$ndf_more_info_fields_table_border_color ; ?>;
	}
	.ndf_list_pill{
		padding-left: 0px;
	}
	.ndf_list_pill li{
		-webkit-border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		-moz-border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		border-radius: <?php echo $ndf_more_info_fields_table_border_radius; ?>px;
		
		border: <?php echo $ndf_more_info_fields_table_border_width.'px solid '.$ndf_more_info_fields_table_border_color ; ?>;
		padding: 0px 6px;
		display: inline-block;
		margin:2px;
	}
	#ndf_more_info_fields h1{
		font-size: 3em;
		line-height: 3.5em;
		font-weight: bold;
	}
	#ndf_more_info_fields h2{
		font-size: 2em;
		line-height: 2.5em;
		font-weight: bold;
	}
	#ndf_more_info_fields h3{
		font-size: 1.5em;
		line-height: 2em;
		font-weight: bold;
	}
	#ndf_more_info_fields h4{
		font-size: 1.35em;
		line-height: 1.75em;
		font-weight: bold;
	}
	#ndf_more_info_fields h5{
		font-size: 1.2em;
		line-height: 1.7em;
		font-weight: bold;
	}
	#ndf_more_info_fields h6{
		font-size: 1em;
		line-height: 1.5em;
		font-weight: bold;
	}
	h1.ndf_section_title, h2.ndf_section_title, h3.ndf_section_title, h4.ndf_section_title, h5.ndf_section_title, h6.ndf_section_title{
		margin-bottom: 0px;
	}
	a.frxp-modal-close.frxp-close{
		-webkit-box-shadow: none;
		box-shadow: none;
	}
	.ndf_modal_category_font_color{
		font-size: <?php echo $ndf_more_info_fields_summary_table_header_font_size; ?>;
		color: <?php echo $ndf_more_info_fields_summary_table_header_fontcolor; ?>;
	}
	<?php
	$ndf_button_style_configuration = get_option( 'ndf_button_style_configuration' );

	if( is_array( $ndf_button_style_configuration ) ){
		$button_css = '';
		foreach( $ndf_button_style_configuration as $style_id => $settings ){
			$button_css .= "
				a.ndf_button_style_{$style_id}{
        			background-color: ".$settings['background'].";
        			color: ".$settings['text_color']." !important;
        			-webkit-border-radius: ".$settings['border_radius']."px;
        			-moz-border-radius: ".$settings['border_radius']."px;
        			border-radius: ".$settings['border_radius']."px;
        			border: ".$settings['border_width']."px solid ".$settings['border_color'].";
        			font-size: ".$settings['font_size'].";
        			padding: ".$settings['padding_top']."px ".$settings['padding_right']."px ".$settings['padding_bottom']."px ".$settings['padding_left']."px;
        			display: inline-block;
					-webkit-box-shadow: none;
					box-shadow: none;
					text-decoration: none;
					margin-left:1px;
					margin-right:1px;
   				}
				a.ndf_button_style_{$style_id}:hover{
        			background-color: ".$settings['background_hover'].";
        			color: ".$settings['text_color_hover']." !important;
        			text-decoration: none;
					-webkit-box-shadow: none;
					box-shadow: none;
					text-decoration: none;
   				}
   			";
		}
	}
	echo $button_css;
	?>
	</style>
	<div class="frxp-flex frxp-flex-left frxp-flex-middle">
		<?php
		$data_title = esc_url( ndf_data_settings_get_meta( 'ndf_data_settings_data_heading', $id ) );
		if( $data_title ){
			$data_title = "<img src='" . $data_title . "' alt='" . esc_attr( get_the_title() ) . "' class='ndf_data_summary_logo frxp-".$ndf_more_info_fields_text_alignment."'>";
			echo '<div>' . $data_title . '</div>';
		}
		?>
		<div><<?php echo $ndf_more_info_fields_heading_style; ?> class="ndf_summary_title"><?php echo get_the_title($id); ?></<?php echo $ndf_more_info_fields_heading_style; ?>></div>
	</div>	
		<?php
		/* STAR RATINGS */
		$star_output = '';
		$ndf_data_star_rating = ndf_data_settings_get_meta( 'ndf_data_star_rating', $id );
		$ndf_data_star_rating_custom = ndf_data_settings_get_meta( 'ndf_data_star_rating_custom', $id );
		if( get_option('ndf_star_ratings_element_show', 1) == 1 && $ndf_data_star_rating ){
			if( $ndf_data_star_rating == 'custom-rating' ){
				$star = do_shortcode($ndf_data_star_rating_custom);
				$star_output .= "<div class='ndf_data_summary_star_rating'>";
				$star_output .= $star;
				$star_output .= "</div>";
			}
			else{
				if( absint( $ndf_data_star_rating ) >= 1 ){
					$ndf_star_rating_size = get_option( 'ndf_star_rating_size', '' );
					$ndf_data_star_rating = absint( $ndf_data_star_rating );
					$star = '';
					for( $i = 1; $i <= $ndf_data_star_rating; $i++ ){
						$star .= '<i class="frxp-icon-star ' . $ndf_star_rating_size . '"></i>';
					}
					$star_output .= "<div class='ndf_data_summary_star_rating'>";
					$star_output .= $star;
					$star_output .= "</div>";
				}
			}
		}
		echo $star_output;
		/* EO Star Ratings */
		?>
		<div class="frxp-clearfix"></div>
		<?php
		/* SUMMARY */
		$get_cat_1_label = get_option( 'ndf_category_1_filter_label', 'Category 1' );
		$get_cat_2_label = get_option( 'ndf_category_2_filter_label', 'Category 2' );
		$get_cat_3_label = get_option( 'ndf_category_3_filter_label', 'Category 3' );
		$get_cat_4_label = get_option( 'ndf_category_4_filter_label', 'Category 4' );
		$get_cat_5_label = get_option( 'ndf_category_5_filter_label', 'Category 5' );

		/* Filters Section */
		$get_cat_1_terms = get_terms( array( 'taxonomy' => 'ndf_category_1', 'hide_empty' => false ) );
		$get_cat_2_terms = get_terms( array( 'taxonomy' => 'ndf_category_2', 'hide_empty' => false ) );
		$get_cat_3_terms = get_terms( array( 'taxonomy' => 'ndf_category_3', 'hide_empty' => false ) );
		$get_cat_4_terms = get_terms( array( 'taxonomy' => 'ndf_category_4', 'hide_empty' => false ) );
		$get_cat_5_terms = get_terms( array( 'taxonomy' => 'ndf_category_5', 'hide_empty' => false ) );

		/* Hide/Show Category Headers and Cell | Check if taxonomy has terms */
		$show_cat_1 = ( ! empty( $get_cat_1_terms ) && ! is_wp_error( $get_cat_1_terms ) ) ? true : false;
		$show_cat_2 = ( ! empty( $get_cat_2_terms ) && ! is_wp_error( $get_cat_2_terms ) ) ? true : false;
		$show_cat_3 = ( ! empty( $get_cat_3_terms ) && ! is_wp_error( $get_cat_3_terms ) ) ? true : false;
		$show_cat_4 = ( ! empty( $get_cat_4_terms ) && ! is_wp_error( $get_cat_4_terms ) ) ? true : false;
		$show_cat_5 = ( ! empty( $get_cat_5_terms ) && ! is_wp_error( $get_cat_5_terms ) ) ? true : false;

		/* Hide/Show Category Headers and Cell | Get from settings */
		if( $show_cat_1 ){
			$show_cat_1 = ( get_option('ndf_category_1_filter_show', 1) == '1' ) ? true : false;
		}
		if( $show_cat_2 ){
			$show_cat_2 = ( get_option('ndf_category_2_filter_show', 1) == '1' ) ? true : false;
		}
		if( $show_cat_3 ){
			$show_cat_3 = ( get_option('ndf_category_3_filter_show', 1) == '1' ) ? true : false;
		}
		if( $show_cat_4 ){
			$show_cat_4 = ( get_option('ndf_category_4_filter_show', 1) == '1' ) ? true : false;
		}
		if( $show_cat_5 ){
			$show_cat_5 = ( get_option('ndf_category_5_filter_show', 1) == '1' ) ? true : false;
		}
	
		if( get_option('ndf_more_info_fields_summary_show', 1) != 1 ){
			$show_cat_1 = false;
			$show_cat_2 = false;
			$show_cat_3 = false;
			$show_cat_4 = false;
			$show_cat_5 = false;
		}

		$output = "";
		$ndf_summary_divider = '';
		
		if( $show_cat_1 ){
			/* Determine Cell value based on Content Option settings field in Data CPT */
			$data_category_1_content_option = ndf_data_settings_get_meta( 'ndf_data_category_1_content_option', $id );
			$data_category_1_type = ndf_data_settings_get_meta( 'ndf_data_category_1_content_type', $id );

			if( $data_category_1_content_option == 'custom-content' ){
				$data_cat_1_value = ndf_data_settings_get_meta( 'ndf_data_category_1_content', $id );
			}
			else{ 
				$data_cat_1 = ndf_get_terms( $id, 'ndf_category_1' );
				$data_cat_1_value = ndf_summary_cell_value_generator( $data_cat_1, 'ndf_category_1' );
				if( $data_category_1_content_option == 'both' && ndf_data_settings_get_meta( 'ndf_data_category_1_content', $id ) ){
					$data_cat_1_value .= '<div class="ndf_summary_category_content">';
					$data_cat_1_value .= ndf_data_settings_get_meta( 'ndf_data_category_1_content', $id );
					$data_cat_1_value .= '</div>';
				}
			}
			
			if( !empty( $data_cat_1_value ) ){
				if( empty( $ndf_summary_divider ) ){
					// $ndf_summary_divider = '';
					$ndf_summary_divider = '';
				}
				else{
					$output .= $ndf_summary_divider;
				}
				$output .= "<div class='frxp-grid'>";
				$output .= "<div class='ndf_modal_category_font_color frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-2-6 frxp-flex frxp-flex-middle'><strong>".$get_cat_1_label."</strong></div>";
				$output .= "<div class='frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-4-6'>".do_shortcode($data_cat_1_value)."</div>";
				$output .= "</div>";
			}
		}


		if( $show_cat_2 ){
			/* Determine Cell value based on Content Option settings field in Data CPT */
			$data_category_2_content_option = ndf_data_settings_get_meta( 'ndf_data_category_2_content_option', $id );
			$data_category_2_type = ndf_data_settings_get_meta( 'ndf_data_category_2_content_type', $id );

			if( $data_category_2_content_option == 'custom-content' ){
				$data_cat_2_value = ndf_data_settings_get_meta( 'ndf_data_category_2_content', $id );
			}
			else{ 
				$data_cat_2 = ndf_get_terms( $id, 'ndf_category_2' );
				$data_cat_2_value = ndf_summary_cell_value_generator( $data_cat_2, 'ndf_category_2' );
				if( $data_category_2_content_option == 'both' && ndf_data_settings_get_meta( 'ndf_data_category_2_content', $id ) ){
					$data_cat_2_value .= '<div class="ndf_summary_category_content">';
					$data_cat_2_value .= ndf_data_settings_get_meta( 'ndf_data_category_2_content', $id );
					$data_cat_2_value .= '</div>';
				}
			}
			if( !empty( $data_cat_2_value ) ){
				if( empty( $ndf_summary_divider ) ){
					$ndf_summary_divider = '';
				}
				else{
					$output .= $ndf_summary_divider;
				}
				$output .= "<div class='frxp-grid'>";
			
				$output .= "<div class='ndf_modal_category_font_color frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-2-6 frxp-flex frxp-flex-middle'><strong>".$get_cat_2_label."</strong></div>";
				$output .= "<div class='frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-4-6'>".do_shortcode($data_cat_2_value)."</div>";
				$output .= "</div>";
			}
		}

		if( $show_cat_3 ){
			/* Determine Cell value based on Content Option settings field in Data CPT */
			$data_category_3_content_option = ndf_data_settings_get_meta( 'ndf_data_category_3_content_option', $id );
			$data_category_3_type = ndf_data_settings_get_meta( 'ndf_data_category_3_content_type', $id );

			if( $data_category_3_content_option == 'custom-content' ){
				$data_cat_3_value = ndf_data_settings_get_meta( 'ndf_data_category_3_content', $id );
			}
			else{ 
				$data_cat_3 = ndf_get_terms( $id, 'ndf_category_3' );
				$data_cat_3_value = ndf_summary_cell_value_generator( $data_cat_3, 'ndf_category_3' );
				if( $data_category_3_content_option == 'both' && ndf_data_settings_get_meta( 'ndf_data_category_3_content', $id ) ){
					$data_cat_3_value .= '<div class="ndf_summary_category_content">';
					$data_cat_3_value .= ndf_data_settings_get_meta( 'ndf_data_category_3_content', $id );
					$data_cat_3_value .= '</div>';
				}
			}
			
			if( !empty( $data_cat_3_value ) ){
				if( empty( $ndf_summary_divider ) ){
					$ndf_summary_divider = '';
				}
				else{
					$output .= $ndf_summary_divider;
				}
				$output .= "<div class='frxp-grid'>";
				$output .= "<div class='ndf_modal_category_font_color frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-2-6 frxp-flex frxp-flex-middle'><strong>".$get_cat_3_label."</strong></div>";
				$output .= "<div class='frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-4-6'>".do_shortcode($data_cat_3_value)."</div>";
				$output .= "</div>";
			}
		}

		if( $show_cat_4 ){
			/* Determine Cell value based on Content Option settings field in Data CPT */
			$data_category_4_content_option = ndf_data_settings_get_meta( 'ndf_data_category_4_content_option', $id );
			$data_category_4_type = ndf_data_settings_get_meta( 'ndf_data_category_4_content_type', $id );

			if( $data_category_4_content_option == 'custom-content' ){
				$data_cat_4_value = ndf_data_settings_get_meta( 'ndf_data_category_4_content', $id );
			}
			else{ 
				$data_cat_4 = ndf_get_terms( $id, 'ndf_category_4' );
				$data_cat_4_value = ndf_summary_cell_value_generator( $data_cat_4, 'ndf_category_4' );
				if( $data_category_4_content_option == 'both' && ndf_data_settings_get_meta( 'ndf_data_category_4_content', $id ) ){
					$data_cat_4_value .= '<div class="ndf_summary_category_content">';
					$data_cat_4_value .= ndf_data_settings_get_meta( 'ndf_data_category_4_content', $id );
					$data_cat_4_value .= '</div>';
				}
			}
			
			if( !empty( $data_cat_4_value ) ){
				if( empty( $ndf_summary_divider ) ){
					$ndf_summary_divider = '';
				}
				else{
					$output .= $ndf_summary_divider;
				}
				$output .= "<div class='frxp-grid'>";
				$output .= "<div class='ndf_modal_category_font_color frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-2-6 frxp-flex frxp-flex-middle'><strong>".$get_cat_4_label."</strong></div>";
				$output .= "<div class='frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-4-6'>".do_shortcode($data_cat_4_value)."</div>";
				$output .= "</div>";
			}
		}

		if( $show_cat_5 ){
			/* Determine Cell value based on Content Option settings field in Data CPT */
			$data_category_5_content_option = ndf_data_settings_get_meta( 'ndf_data_category_5_content_option', $id );
			$data_category_5_type = ndf_data_settings_get_meta( 'ndf_data_category_5_content_type', $id );

			if( $data_category_5_content_option == 'custom-content' ){
				$data_cat_5_value = ndf_data_settings_get_meta( 'ndf_data_category_5_content', $id );
			}
			else{ 
				$data_cat_5 = ndf_get_terms( $id, 'ndf_category_5' );
				$data_cat_5_value = ndf_summary_cell_value_generator( $data_cat_5, 'ndf_category_5' );
				if( $data_category_5_content_option == 'both' && ndf_data_settings_get_meta( 'ndf_data_category_5_content', $id ) ){
					$data_cat_5_value .= '<div class="ndf_summary_category_content">';
					$data_cat_5_value .= ndf_data_settings_get_meta( 'ndf_data_category_5_content', $id );
					$data_cat_5_value .= '</div>';
				}
			}
			
			if( !empty( $data_cat_5_value ) ){
				if( empty( $ndf_summary_divider ) ){
					$ndf_summary_divider = '';
				}
				else{
					$output .= $ndf_summary_divider;
				}
				$output .= "<div class='frxp-grid'>";
				$output .= "<div class='ndf_modal_category_font_color frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-2-6 frxp-flex  frxp-flex-middle'><strong>".$get_cat_5_label."</strong></div>";
				$output .= "<div class='frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-4-6'>".do_shortcode($data_cat_5_value)."</div>";
				$output .= "</div>";
			}
		}
		/* EO SUMMARY */

		if( !empty( $output ) ){
			$ndf_more_info_fields_summary_label = get_option('ndf_more_info_fields_summary_label', 'Summary' );
			echo '<div class="ndf_more_info_summary">';
			if( !empty( $ndf_more_info_fields_summary_label ) ){
				echo '<'.$ndf_more_info_fields_summary_label_heading_style.' class="ndf_summary_label frxp-text-left">'.$ndf_more_info_fields_summary_label.'</'.$ndf_more_info_fields_summary_label_heading_style.'>';
			}
			echo $output;
			echo '</div>';
		}

		echo '<div id="ndf_more_info_fields">';
		global $wpdb;
		$NDFFieldGenerator = new NDFFieldGenerator();

		$ndf_data_filtering_saved_fields = $wpdb->prefix.'ndf_data_filtering_saved_fields';
		$field_rows = $wpdb->get_results( "SELECT * FROM $ndf_data_filtering_saved_fields WHERE hidden = '0' ORDER BY field_order ASC" );

		if( !empty(  $field_rows ) ){
			$section_holder = '';	
			foreach( $field_rows as $field_row ){
				$ndf_more_info_value = '';
				$fields_holder = '';
				$ndf_meta_field_data = ndf_data_settings_get_meta( 'ndf_fields_'.$field_row->ID, $id );
				// section fields checker
				if($field_row->field_group == 'section1'){
					echo $field_row->field_group;
				}
				// end section field
				if( $field_row->field_type == 'section' ){
					$section_holder .= '<div class="frxp-grid">';
						$section_holder .= '<div class="frxp-width-1-1 title full">';
							$section_holder .= $NDFFieldGenerator->generateField( 
							$field_row->field_type,  $field_row->label, $field_row->field_values, $field_row->default_value, $field_row->required, $field_row->field_values, $field_row->default_value
							);
						$section_holder .= '</div>';
					$section_holder .= '</div>';
				}

				if( $ndf_meta_field_data ){
					$name_holder = '';
					$name_fields_holder = '';
					if( $field_row->field_type == 'name' ){
						$name_holder .= '<div class="frxp-grid">';
							$name_holder .= '<div class="frxp-width-1-1 title full"><strong>'.$field_row->label.'</strong></div>';
						$name_holder .= '</div>';
						foreach( $ndf_meta_field_data as $label => $value ){
							if( !empty( $value ) ){
								$name_fields_holder .= '<div class="frxp-grid">';
								$name_fields_holder .= '<div class="frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-2-6 frxp-flex  frxp-flex-middle title"><strong>'.$label.'</strong></div>';
								$name_fields_holder .= '<div class="frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-4-6 data">'.$value.'</div>';
								$name_fields_holder .= '</div>';
							}
						}
						if( !empty( $name_fields_holder ) ){
							echo $name_holder.$name_fields_holder;
						}
					} 
					else{
						if( $field_row->field_type == 'checkbox' || $field_row->field_type == 'list' ){
							$list_class = 'ndf_list_pill';
							$ndf_meta_field_data = get_post_meta( $id, 'ndf_fields_'.$field_row->ID, false );
						}
						
						if( !empty( $ndf_meta_field_data ) ){
							if( is_array( $ndf_meta_field_data ) ){
								
								$ndf_more_info_value = '<ul class="'.$list_class.'">';
								foreach( $ndf_meta_field_data as $value ){
									$ndf_more_info_value .= "<li>$value</li>";
								}
								$ndf_more_info_value .= '</ul>';
							}
							else{
								$ndf_more_info_value = $ndf_meta_field_data;
								if( $field_row->field_type == 'image_upload' ){
									$ndf_more_info_value = '<img src="'.esc_url($ndf_meta_field_data).'">';
								}
								else if( $field_row->field_type == 'address' ){
									$ndf_more_info_value = '<address>'.$ndf_meta_field_data.'</address>';
								}
								else if( $field_row->field_type == 'dropdown' ){
									$ndf_more_info_value = $NDFFieldGenerator->generateField( 
									'dropdown_label',  $field_row->label, $field_row->field_values, $field_row->default_value, $field_row->required, $field_row->field_values, $ndf_meta_field_data
									);
								}
								else if( $field_row->field_type == 'radio_button' ){
									$ndf_more_info_value = $NDFFieldGenerator->generateField( 
									'radio_button_label',  $field_row->label, $field_row->field_values, $field_row->default_value, $field_row->required, $field_row->field_values, $ndf_meta_field_data
									);
								}
								else if( $field_row->field_type == 'website' ){
									$ndf_more_info_value = '<a href="'.esc_url( $ndf_meta_field_data ).'" target="_blank">'.$ndf_meta_field_data.'</a>';
								}
								else if( $field_row->field_type == 'text_editor' ){
									$ndf_more_info_value = do_shortcode($ndf_meta_field_data);
								}
							}
							$fields_holder .= '<div class="frxp-grid">';
								$fields_holder .= '<div class="frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-2-6 frxp-flex  frxp-flex-middle title"><strong>'.$field_row->label.'</strong></div>';
								$fields_holder .= '<div class="frxp-width-1-1 frxp-width-small-1-1 frxp-width-medium-4-6 data">'.$ndf_more_info_value.'</div>';
							$fields_holder .= '</div>';
						}
						if( !empty( $fields_holder ) ){
							echo $section_holder.$fields_holder;
							$section_holder = '';
						}
					}
				}
			}
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}