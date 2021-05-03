<?php
/**
 * Field Generator for the Data More Info fields.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */

if( !class_exists('NDFFieldGenerator') ){

class NDFFieldGenerator{

	public static $field_types;

	function __construct() {
		$this::$field_types = $this::fieldTypes();
	}

	/**
	 * Field Types Definition.
	 * @return array
	 */
	public static function fieldTypes( $getType = 'all' ){
		$field_types = array();
		$standard = array(
			'simple_text_field' => array(
				'label' => 'Simple Text Field',
				'fields' => false,
			),
			'paragraph' => array(
				'label' => 'Paragraph',
				'fields' => false,
			),
			'radio_button' => array(
				'label' => 'Radio Button',
				'fields' => array(
					'label' => 'Options',
					'field_type' => 'dynamic_input',
					'instructions' => '',
				),
			),
			'checkbox' => array(
				'label' => 'Checkbox',
				'fields' => array(
					'label' => 'Options',
					'field_type' => 'dynamic_input_checkbox',
					'instructions' => '',
				),
			),
			'dropdown' => array(
				'label' => 'Dropdown',
				'fields' => array(
					'label' => 'Options',
					'field_type' => 'dynamic_input',
					'instructions' => '',
				),
			),
			'section' => array(
				'label' => 'Section',
				'fields' => array(
					'label' => 'Section Settings',
					'field_type' => 'section_add_field',
					'instructions' => '',
					'options' => array(
						'H1',
						'H2',
						'H3',
						'H4',
						'H5',
						'H6',
						'p',
					)
				),
			),
		);
		$advanced = array(
			'image_upload' => array(
				'label' => 'Image Upload',
				'fields' => false,
			),
			'text_editor' => array(
				'label' => 'Text Block',
				'fields' => false,
			),
			'address' => array(
				'label' => 'Address',
				'fields' => false,
			),
			'website' => array(
				'label' => 'Website',
				'fields' => false,
			),
			'list' => array(
				'label' => 'List',
				'fields' => false,
			),
			'email' => array(
				'label' => 'Email',
				'fields' => false,
			),
			'name' => array(
				'label' => 'Name',
				'fields' => array(
					'label' => 'Name Options',
					'field_type' => 'name_add',
					'instructions' => '',
					'options' => array('Prefix', 'First Name', 'Middle Name', 'Middle Initial', 'Last Name', 'Suffix' ),
				),
			),

		);
		switch ( $getType ) {
			case 'standard':
				$field_types = $standard;
				break;

			case 'advanced':
				$field_types = $advanced;
				break;

			default:
				$field_types = array_merge( $standard, $advanced );
				break;
		}
		return $field_types;
	}

	public function generateField( $type, $name, $options = '', $default_value = '', $required = false, $from_db_field_values = '', $from_db_default_value = '' ){
		$output = '';
		$required_field = '';
		if( $required == 1 ){
			$required_field = 'required';
		}

		switch ( $type ) {
			case 'paragraph':
				$output .= '<textarea name="'.esc_attr__($name).'" '.$required_field.' rows="5" cols="50">'.$from_db_field_values.'</textarea>';
				$output .= '<br><label for="'.esc_attr__($name).'" class="error" style="display: none;">This field is required.</label>';
				break;
			
			case 'radio_button':
				$option_label = @unserialize(@unserialize($options)['label']);
				$option_value = @unserialize(@unserialize($options)['value']);

				if( !empty( $option_label ) && is_array( $option_label ) ){
					/*Create array of dropdown value and label*/
					foreach( $option_label as $key => $label ){
						$dropdown_key = $label;
						if( !empty( $option_value[$key] ) ){
							$dropdown_key = $option_value[$key];
						}
						$dropdown[$dropdown_key] = $label;
					}
					
					/*Define default selected value*/
					if( !empty($from_db_default_value) ){
						$default_value = $from_db_default_value;
					}
					else{
						$default_value_key = $default_value;
						if( array_key_exists( $default_value_key, $option_label ) ){
							$default_value = $option_label[$default_value_key];
							if( in_array( $default_value, $dropdown ) ){
								$default_value = array_search ($default_value, $dropdown);
							}
						}
					}

					foreach( $dropdown as $value => $label ){
						$output .= '<p><label><input type="radio" name="'.esc_attr__($name).'" value="'.esc_attr($value).'" '.checked( $default_value, $value, false ).' '.$required_field.'>'.$label.'</label></p>'; 
					}
					$output .= '<label for="'.esc_attr__($name).'" class="error" style="display: none;">This field is required.</label>';
				}
				break;

			case 'radio_button_label':
				$option_label = @unserialize(@unserialize($options)['label']);
				$option_value = @unserialize(@unserialize($options)['value']);

				if( !empty( $option_label ) && is_array( $option_label ) ){
					/*Create array of dropdown value and label*/
					foreach( $option_label as $key => $label ){
						$dropdown_key = $label;
						if( !empty( $option_value[$key] ) ){
							$dropdown_key = $option_value[$key];
						}
						$dropdown[$dropdown_key] = $label;
					}
					
					/*Define default selected value*/
					if( !empty($from_db_default_value) ){
						$default_value = $from_db_default_value;
					}
					else{
						$default_value_key = $default_value;
						if( array_key_exists( $default_value_key, $dropdown ) ){
							$default_value = $dropdown[$default_value_key];
						}
					}

					foreach( $dropdown as $value => $label ){
						if( $default_value == $value ){
							$output .= $label;
						}
					}
				}
				break;

			case 'checkbox':
				$option_label = @unserialize(@unserialize($options)['label']);
				$option_value = @unserialize(@unserialize($options)['value']);
				if( $from_db_default_value ){
					$default_value_key = $from_db_default_value;
					if( in_array( $default_value_key, $option_label ) ){
						$default_value = $option_label[$default_value_key];
					}
				}
				else{
					$default_value = $default_value;
					if( in_array( $default_value, $option_label ) ){
						$default_value = $option_label[$default_value_key];
					}
				}

				if( !empty( $option_label ) && is_array( $option_label ) ){
					foreach( $option_label as $key => $label ){
						$value = $label;
						$checked = '';

						if( !empty( $option_value[$key] ) ){
							$value = $option_value[$key];
						}

						if( in_array( $value, (array) $from_db_field_values ) ){
							$checked = 'checked';
						}

						$output .= '<p><label><input type="checkbox" name="'.esc_attr__($name).'[]" data-msg="Please select at least one" value="'.esc_attr__($value).'" '.$checked.' '.$required_field.'>'.$label.'</label></p>'; 
					}
					$output .= '<label for="'.esc_attr__($name).'[]" class="error" style="display: none;">This field is required.</label>';
				}
				break;

			case 'dynamic_input':
				$output .= '<table class="ndf_more_info_fields_options" style="width:100%;">';
				$output .= '<tr>';
				$output .= '<td class="title">Default</td>';
				$output .= '<td class="title">Label</td>';
				$output .= '<td class="title">Value</td>';
				$output .= '<td></td>';
				$output .= '</tr>';
				/*FIRST ROW - EMPTY*/
				$output .= '<tr>';
				$output .= '<td><input type="radio" name="default_value" value="0"></td>';
				$output .= '<td>';
				$output .= '<input type="text" name="option_label[0]" required data-msg="Please enter option label" class="widefat">';
				$output .= '</td>';
				$output .= '<td>';
				$output .= '<input type="text" name="option_value[0]" class="widefat">';
				$output .= '</td>';
				$output .= '<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus" disabled></span></button></td>';
				$output .= '</tr>';
				/*FIRST ROW - EMPTY*/
				$output .= '</table>';
				$output .= '<p class="add_option"><button type="button" class="ndf_more_info_fields_options_add alignright"><span class="dashicons dashicons-plus"></span> Add Option</button></p>';
				break;

			case 'dynamic_input_edit':
				$random = rand(1111, 9999);
		        
				$output .= '<table class="ndf_more_info_fields_options ndf_more_info_fields_options_edit'.$random.'" style="width:100%;">';
				$output .= '<tr>';
		        $output .= '<td class="title">Default</td>';
		        $output .= '<td class="title">Label</td>';
		        $output .= '<td class="title">Value</td>';
		        $output .= '<td></td>';
		        $output .= '</tr>';
	       		/*OPTIONS ADDED*/
	       		$option_label = @unserialize(@unserialize($from_db_field_values)['label']);
				$option_value = @unserialize(@unserialize($from_db_field_values)['value']);
				$default_value = '';

				if( !empty( $from_db_default_value ) ){
					$default_value_key = $from_db_default_value;
					$default_value = $option_label[$default_value_key];
				}

				if( !empty( $option_label ) && is_array( $option_label ) ){
					$default_value = 'default_value_'.$random;
					foreach( $option_label as $key => $label ){
						echo $label;
						$value = $label;
						if( !empty( $option_value[$key] ) ){
							$value = $option_value[$key];
						}
				        $output .= '<tr>';
						 $output .= '<td><input type="radio" name="'.esc_attr__($default_value).'" value="'.esc_attr__($key).'" '.checked( $from_db_default_value, $key, false ).' '.$required_field.'></td>';
				        $output .= '<td>';
				        $output .= '<input type="text" name="option_label['.esc_attr__($key).']" required data-msg="Please enter option label" class="widefat" value="'.esc_attr__($label).'">';
				        $output .= '</td>';
				        $output .= '<td>';
				        $output .= '<input type="text" name="option_value['.esc_attr__($key).']" class="widefat" value="'.esc_attr__(stripslashes_deep($option_value[$key])).'">';
				        $output .= '</td>';
				        $output .= '<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus"></span></button></td>';
						$output .= '</tr>';
					}
				}
				else{
					$key = 0;
					/*FIRST ROW - EMPTY*/
					$output .= '<tr>';
					 $output .= '<td><input type="radio" name="" value="'.esc_attr__($key).'" '.$required_field.'></td>';
			        $output .= '<td>';
			        $output .= '<input type="text" name="option_label['.esc_attr__($key).']" required data-msg="Please enter option label" class="widefat" value="">';
			        $output .= '</td>';
			        $output .= '<td>';
			        $output .= '<input type="text" name="option_value['.esc_attr__($key).']" class="widefat" value="">';
			        $output .= '</td>';
			        $output .= '<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus"></span></button></td>';
					$output .= '</tr>';
					/*FIRST ROW - EMPTY*/
				}
				$max_key = $key++;
				$output .= '<script type="text/javascript">jQuery(document).ready( function($) {
					var field_option_count'.$random.' = '.$max_key.';
				    jQuery(document).on(\'click\', \'.ndf_more_info_fields_options_add'.$random.'\', function(){
				        field_option_count'.$random.'++;
				        var field = \'\';
				        field += \'<tr>\';
				        field += \'<td><input type="radio" name="'.esc_attr__($default_value).'" value="\'+field_option_count'.$random.'+\'"></td>\';
				        field += \'<td>\';
				        field += \'<input type="text" name="option_label[\'+field_option_count'.$random.'+\']" required data-msg="Please enter option label" class="widefat" value="" aria-required="true">\';
				        field += \'</td>\';
				        field += \'<td>\';
				        field += \'<input type="text" name="option_value[\'+field_option_count'.$random.'+\']" class="widefat">\';
				        field += \'</td>\';
				        field += \'<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus"></span></button></td>\';
				        field += \'</tr>\';
				        jQuery(\'.ndf_more_info_fields_options_edit'.$random.':visible\').append(field);

				        if( $(\'.ndf_more_info_fields_options_remove\').length <= 1 ){
				            $(\'.ndf_more_info_fields_options_remove\').attr(\'disabled\',true);
				        }
				        else{
				            $(\'.ndf_more_info_fields_options_remove\').each(function(){
				                $(this).removeAttr(\'disabled\');
				            });
				        }
				    });
			    });</script>';
				$output .= '</table>';
				$output .= '<p class="add_option"><button type="button" class="ndf_more_info_fields_options_add'.$random.' alignright"><span class="dashicons dashicons-plus"></span> Add Option</button></p>';
				break;
			
			case 'dynamic_input_checkbox':
				$output .= '<table class="ndf_more_info_fields_options_checkbox" style="width:100%;">';
				$output .= '<tr>';
				$output .= '<td class="title">Label</td>';
				$output .= '<td class="title">Value</td>';
				$output .= '<td></td>';
				$output .= '</tr>';
				$output .= '<tr>';
				$output .= '<td>';
				$output .= '<input type="text" name="option_label[0]" required data-msg="Please enter option label" class="widefat">';
				$output .= '</td>';
				$output .= '<td>';
				$output .= '<input type="text" name="option_value[0]" class="widefat">';
				$output .= '</td>';
				$output .= '<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus"></span></button></td>';
				$output .= '</tr>';
				$output .= '</table>';
				
				$output .= '<p class="add_option"><button type="button" class="ndf_more_info_fields_options_add_checkbox alignright"><span class="dashicons dashicons-plus"></span> Add Option</button></p>';
				break;

			case 'dynamic_input_checkbox_edit':
				$random = rand(1111, 9999);

				$output .= '<table class="ndf_more_info_fields_options_checkbox ndf_more_info_fields_options_checkbox'.$random.'" style="width:100%;">';
				$output .= '<tr>';
				$output .= '<td class="title">Label</td>';
				$output .= '<td class="title">Value</td>';
				$output .= '<td></td>';
				$output .= '</tr>';
				/*OPTIONS ADDED*/
	       		$option_label = @unserialize(@unserialize($from_db_field_values)['label']);
				$option_value = @unserialize(@unserialize($from_db_field_values)['value']);
				$default_value = '';
				
				if( !empty( $from_db_default_value ) ){
					$default_value_key = $from_db_default_value;
					$default_value = $option_label[$default_value_key];
				}
				
				if( !empty( $option_label ) && is_array( $option_label ) ){
					$default_value = 'default_value_'.$random;
					foreach( $option_label as $key => $label ){
						echo $label;
						$value = $label;
						if( !empty( $option_value[$key] ) ){
							$value = $option_value[$key];
						}

						$output .= '<tr>';
				        $output .= '<td>';
				        $output .= '<input type="text" name="option_label['.esc_attr__($key).']" required data-msg="Please enter option label" class="widefat" value="'.esc_attr__($label).'">';
				        $output .= '</td>';
				        $output .= '<td>';
				        $output .= '<input type="text" name="option_value['.esc_attr__($key).']" class="widefat" value="'.esc_attr__($option_value[$key]).'">';
				        $output .= '</td>';
				        $output .= '<td><button type="button" class="ndf_more_info_fields_options_remove_checkbox"><span class="dashicons dashicons-minus"></span></button></td>';
				        $output .= '</tr>';
					}
				}
				else{
					$key = 0;
			        $output .= '</tr>';
			        $output .= '<tr>';
			        $output .= '<td>';
			        $output .= '<input type="text" name="option_label['.esc_attr__($key).']" required data-msg="Please enter option label" class="widefat">';
			        $output .= '</td>';
			        $output .= '<td>';
			        $output .= '<input type="text" name="option_value['.esc_attr__($key).']" class="widefat">';
			        $output .= '</td>';
			        $output .= '<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus"></span></button></td>';
			        $output .= '</tr>';
				}
				$max_key = $key++;
				$output .= '<script type="text/javascript">jQuery(document).ready( function($) {
				var field_option_count_checkbox'.$random.' = '.$max_key.';
				jQuery(document).on(\'click\', \'.ndf_more_info_fields_options_add_checkbox'.$random.'\', function(){
					field_option_count_checkbox'.$random.'++;
					var field = \'\';
					field += \'<tr>\';
					field += \'<td>\';
					field += \'<input type="text" name="option_label[\'+field_option_count_checkbox'.$random.'+\']" required data-msg="Please enter option label" class="widefat">\';
					field += \'</td>\';
					field += \'<td>\';
					field += \'<input type="text" name="option_value[\'+field_option_count_checkbox'.$random.'+\']" class="widefat">\';
					field += \'</td>\';
					field += \'<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus"></span></button></td>\';
					field += \'</tr>\';
					jQuery(\'.ndf_more_info_fields_options_checkbox'.$random.':visible\').append(field);

					if( $(\'.ndf_more_info_fields_options_remove_checkbox\').length <= 1 ){
					    $(\'.ndf_more_info_fields_options_remove_checkbox\').attr(\'disabled\',true);
					}
					else{
					    $(\'.ndf_more_info_fields_options_remove_checkbox\').each(function(){
					        $(this).removeAttr(\'disabled\');
					    });
					}
					});
				});</script>';
				$output .= '</table>';
				$output .= '<p class="add_option"><p><button type="button" class="ndf_more_info_fields_options_add_checkbox'.$random.' alignright"><span class="dashicons dashicons-plus"></span> Add Option</button></p></p>';
				break;

			case 'dropdown':
				$option_label = @unserialize(@unserialize($options)['label']);
				$option_value = @unserialize(@unserialize($options)['value']);

				if( !empty( $option_label ) && is_array( $option_label ) ){
					/*Create array of dropdown value and label*/
					foreach( $option_label as $key => $label ){
						$dropdown_key = $label;
						if( !empty( $option_value[$key] ) ){
							$dropdown_key = $option_value[$key];
						}
						$dropdown[$dropdown_key] = $label;
					}
					
					/*Define default selected value*/
					if( !empty($from_db_default_value) ){
						$default_value = $from_db_default_value;
					}
					else{
						$default_value_key = $default_value;
						if( array_key_exists( $default_value_key, $option_label ) ){
							$default_value = $option_label[$default_value_key];
							if( in_array( $default_value, $dropdown ) ){
								$default_value = array_search ($default_value, $dropdown);
							}
						}
					}

					$output .= '<select name="'.esc_attr__($name).'" '.$required_field.'>'; 
					foreach( $dropdown as $value => $label ){
						$output .= '<option value="'.esc_attr($value).'"'.selected( $default_value, $value, false ).'>'.$label.'</option>'; 
					}
					$output .= '</select>'; 
				}
				break;

			case 'dropdown_label':
				$option_label = @unserialize(@unserialize($options)['label']);
				$option_value = @unserialize(@unserialize($options)['value']);

				if( !empty( $option_label ) && is_array( $option_label ) ){
					/*Create array of dropdown value and label*/
					foreach( $option_label as $key => $label ){
						$dropdown_key = $label;
						if( !empty( $option_value[$key] ) ){
							$dropdown_key = $option_value[$key];
						}
						$dropdown[$dropdown_key] = $label;
					}
					
					/*Define default selected value*/
					if( !empty($from_db_default_value) ){
						$default_value = $from_db_default_value;
					}
					else{
						$default_value_key = $default_value;
						if( array_key_exists( $default_value_key, $option_label ) ){
							$default_value = $option_label[$default_value_key];
						}
					}

					foreach( $dropdown as $value => $label ){
						if( $default_value == $value ){
							$output .= $label;
						}
					}
				}
				break;

			case 'section':
				$tag = $from_db_field_values;

				$output .= '<'.$tag.' class="ndf_section_title">'.$name.'</'.$tag.'>';
				$output .= $from_db_default_value;
				break;

			case 'section_meta_field':
				$output .= '<strong>Title</strong><br><input type="text" name="'.esc_attr__($name).'[title]" '.$required_field.' value="'.esc_attr__($from_db_field_values['title']).'" class="widefat"><br><br>';
				$output .= '<strong>Text</strong><br>';
				$output .= '<textarea name="'.esc_attr__($name).'[text]" '.$required_field.' rows="5" cols="50">'.$from_db_field_values['text'].'</textarea>';
				break;

			case 'section_add_field':
				$select_options = array( 'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'p' );
				$output .= '<strong>Title Heading Style</strong><br>';
				$output .= '<select name="field_values">';
				foreach( $select_options as $option ){
					$output .= '<option value="'.esc_attr__($option).'">'.$option.'</option>';
				}
				$output .= '</select>';
				$output .= '<br><br><strong>Text</strong><br>';
				$output .= $this->generateField( 'text_editor', 'default_value' );
				break;

			case 'section_edit_field':
				$random = rand(11111, 99999);
				$select_options = array( 'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'p' );
				$output .= '<strong>Title Heading Style</strong><br>';
				$output .= '<select name="field_values">';
				foreach( $select_options as $option ){
					$output .= '<option value="'.esc_attr__($option).'" '.selected( $from_db_field_values, $option, false ).'>'.$option.'</option>';
				}
				$output .= '</select>';
				$output .= '<br><br><strong>Text</strong><br>';
				$output .= $this->generateField( 'text_editor', 'default_value'.$random, '', '', '', $from_db_default_value );
				break;

			case 'section_display':
				$tag = $from_db_field_values['value'];
				$title = $from_db_field_values['label'];
				$from_db_default_value;
				$output .= '<'.$tag.'>'.$title.'</'.$tag.'>';
				$output .= $from_db_default_value;
				break;

			case 'address':
				$output .= '<address>'; 
				$output .= '<textarea name="'.esc_attr__($name).'" '.$required_field.' rows="5" cols="50">'.$from_db_field_values.'</textarea>';
				$output .= '</address>';
				$output .= '<label for="'.esc_attr__($name).'" class="error" style="display: none;">This field is required.</label>';
				break;

			case 'website':
				$output .= '<input type="url" name="'.esc_attr__($name).'" '.$required_field.' class="widefat" value="'.esc_attr__($from_db_field_values).'">';
				break;

			case 'list':
				$random = rand(1111, 9999);

				$output .= '<table class="ndf_more_info_fields_options_list'.$random.'" style="width:100%;">';
				if( empty($from_db_field_values) ){
					if( !empty( $required_field ) ){
						$output .= '<tr>';
						$output .= '<td>';
							$output .= '<input type="text" name="'.esc_attr__($name).'[]" required data-msg="Please enter list value" class="widefat">';
				        $output .= '</td>';
				        $output .= '<td><button type="button" class="ndf_more_info_fields_options_remove_list"><span class="dashicons dashicons-minus"></span></button></td>';
				        $output .= '</tr>';
					}
				}
				else{
			        foreach( (array) $from_db_field_values as $list_value ){
						$output .= '<tr>';
						$output .= '<td>';
						if( !empty( $required_field ) ){
							$output .= '<input type="text" name="'.esc_attr__($name).'[]" required data-msg="Please enter list value" class="widefat" value="'.esc_attr__($list_value).'">';
						}
						else{
							$output .= '<input type="text" name="'.esc_attr__($name).'[]" class="widefat" value="'.esc_attr__($list_value).'">';

						}
				        $output .= '</td>';
				        $output .= '<td><button type="button" class="ndf_more_info_fields_options_remove_list"><span class="dashicons dashicons-minus"></span></button></td>';
				        $output .= '</tr>';
			        }
				}
				$output .= '</table>';
				$output .= '<p class="add_option alignright"><button type="button" class="ndf_more_info_fields_options_add_list'.$random.' alignright"><span class="dashicons dashicons-plus"></span> Add Option</button></p>';

				$output .= '<script type="text/javascript">jQuery(document).ready( function($) {
					var field_option_count_list = 0;
				    jQuery(document).on(\'click\', \'.ndf_more_info_fields_options_add_list'.$random.'\', function(){
				        field_option_count_list++;
				        var field = \'\';
				        field += \'<tr>\';
				        field += \'<td>\';
				        field += \'<input type="text" name="'.esc_attr__($name).'[]" '.$required_field.' data-msg="" class="widefat">\';
				        field += \'</td>\';
				        field += \'<td><button type="button" class="ndf_more_info_fields_options_remove_list"><span class="dashicons dashicons-minus"></span></button></td>\';
				        field += \'</tr>\';
				        jQuery(\'.ndf_more_info_fields_options_list'.$random.'\').append(field);

				        if( $(\'.ndf_more_info_fields_options_remove_list\').length <= 1 ){
				            $(\'.ndf_more_info_fields_options_remove_list\').attr(\'disabled\',true);
				        }
				        else{
				            $(\'.ndf_more_info_fields_options_remove_list\').each(function(){
				                $(this).removeAttr(\'disabled\');
				            });
				        }
				    });';
				if( !empty( $required ) ){
					$output .= '
					jQuery(document).on(\'click\', \'.ndf_more_info_fields_options_remove_list\', function(){
					    if( $(\'.ndf_more_info_fields_options_remove_list\').length >= 2 ){
					        $(this).parent().parent().remove();
					        if( $(\'.ndf_more_info_fields_options_remove_list\').length <= 1 ){
					            $(\'.ndf_more_info_fields_options_remove_list\').attr(\'disabled\',true);
					        }
					    }
					    else{
					        $(this).attr(\'disabled\',true);
					    }
					});';
				}
				else{
					$output .= '
				    jQuery(document).on(\'click\', \'.ndf_more_info_fields_options_remove_list\', function(){
				        $(this).parent().parent().remove();
				    });';
				}
				$output .= '});</script>';
				break;

			case 'email':
				$output .= '<input type="email" name="'.esc_attr__($name).'" '.$required_field.' class="widefat" value="'.esc_attr__($from_db_field_values).'">';
				break;

			case 'name':
				$name_fields = @unserialize(@unserialize($options)['label']);


				if( is_array( $name_fields ) ){
					foreach( $name_fields as $value ){
						if( !empty( $value ) ){
							$input_value = '';
							if( is_array( $from_db_field_values ) ){
								$input_value = $from_db_field_values[$value];
							}

							$output .= '<p><strong>'.$value.' </strong><input type="text" name="'.esc_attr__($name).'['.esc_attr__($value).']" '.$required_field.' value="'.esc_attr__($input_value).'" class="widefat"></p>';
						}
					}
				}
				break;
			
			case 'name_add':
				$option_label = $options;

				if( !empty( $option_label ) && is_array( $option_label ) ){
					foreach( $option_label as $key => $label ){
						$value = $label;
						if( !empty( $option_value[$key] ) ){
							$value = $option_value[$key];
						}

						$output .= '<p><label><input type="checkbox" name="field_values_name[]" value="'.esc_attr__($value).'" '.$required_field.'>'.$label.'</label></p>'; 
					}
				}
				break;

			case 'name_edit':
				$option_label = $options;
				$option_name_checked = @unserialize(@unserialize($from_db_field_values)['label']);

				if( !empty( $option_label ) && is_array( $option_label ) ){
					foreach( $option_label as $key => $label ){
						$checked = '';
						
						$value = $label;
						if( !empty( $option_value[$key] ) ){
							$value = $option_value[$key];
						}

						if( in_array( $value, (array) $option_name_checked ) ){
							$checked = 'checked';
						}

						$output .= '<p><label><input type="checkbox" name="field_values_name[]" value="'.esc_attr__($value).'" '.$required_field.' '.$checked.'>'.$label.'</label></p>'; 
					}
				}
				break;
			
			case 'name_meta_field':
				$name_fields = @unserialize($options[0]);

				if( is_array( $name_fields ) ){
					foreach( $name_fields as $value ){
						if( !empty( $value ) ){
							$output .= '<p><strong>'.$value.' </strong><input type="text" name="'.esc_attr__($name).'['.esc_attr__($value).']" '.$required_field.' value="'.esc_attr__($from_db_field_values[$value]).'" class="widefat"></p>';
						}
					}
				}
				break;
			
			case 'image_upload':
				$name = esc_attr__($name);
				$output .= '<input id="'.$name.'_button" class="button-secondary button ndf_media_file_upload'.$name.'" name="'.$name.'_button" type="button" value="Select Image" />';
				$output .= '<p><span class="'.$name.'_new description"></span></p>';
				$output .= '<label for="'.$name.'" class="error" style="display: none;">This field is required.</label>';
				$output .= '<input id="'.$name.'" name="'.$name.'" type="text" style="visibility:hidden;" '.$required_field.' value="'.esc_attr__($from_db_field_values).'" />';
				if( $from_db_field_values ){
					$output .= '<p id="'.$name.'_wrap"><img src="'.esc_attr__($from_db_field_values).'" id="'.$name.'_image" alt="'.$name.'" class="ndf_settings_image">';
					$output .= '<button type="button" id="'.$name.'_remove" class="button button-secondary ndf_remove_saved_image" title="Remove Image"><span class="dashicons dashicons-no"></span></button></p>';
				}

				$output .= '<script type="">jQuery(document).ready( function($) {
				var ndf_image_uploader'.$name.'; 
 
			    $(\'.ndf_media_file_upload'.$name.'\').click(function(e) {
			        e.preventDefault();

			        var button = $(this);
			        var id = button.attr(\'id\').replace(\'_button\', \'\');

			        if (ndf_image_uploader'.$name.') { ndf_image_uploader'.$name.'.open(); return; }

			        ndf_image_uploader'.$name.' = wp.media.frames.file_frame = wp.media({
			            title: \'Choose Image\',
			            button: {
			               text: \'Choose Image\'
			            },
			            multiple: false
			        });

			        ndf_image_uploader'.$name.'.on(\'select\', function() {
			            attachment = ndf_image_uploader'.$name.'.state().get(\'selection\').first().toJSON();
			            $(\'#\'+id).val(attachment.url);
			            $(\'span.\'+id+\'_new\').html(attachment.url);
			        });

			        ndf_image_uploader'.$name.'.open();
			    });

			    $(\'.ndf_remove_saved_image'.$name.'\').click(function(e) {
			        var id = $(this).attr(\'id\').replace(\'_remove\', \'\');
			        $(\'#\'+id).val(\'\');
			        $(\'#\'+id+\'_wrap\').fadeOut();
			    });  });</script>';
				break;

			case 'text_editor':
				$content = $from_db_field_values;
				$random_number = rand(1111, 9999);
				ob_start();
				wp_editor( 
					$content,
					'ndf_editor_'.$random_number,
					array(
						'wpautop'			=> false,
						'media_buttons'		=> true,
						'textarea_name'		=> $name,
						'textarea_rows'		=> 7,
					)  
				);
				$output .= ob_get_clean();
				if( !empty($required_field) ){
					$output .= '<script type="text/javascript">
					jQuery(document).ready( function($) {
						$( document ).on( "submit.edit-post", "#post", function () {
							var content;
							content = ndf_tmce_getContent( "ndf_editor_'.$random_number.'" );

							if( content.length <= 0 || content.length == null ){
								$("#label_ndf_editor_'.$random_number.'").html("This field is required.");
								$("#label_ndf_editor_'.$random_number.'").css("display", "block");
								$( "#major-publishing-actions .spinner" ).hide();
								$( "#major-publishing-actions" ).find( ":button, :submit, a.submitdelete, #post-preview" ).removeClass( "disabled" );
								$( "html, body" ).animate({
									scrollTop: $( "#label_ndf_editor_'.$random_number.'" ).offset().top - 200
								}, 100);
								return false;
							}
							else{
								$("#label_ndf_editor_'.$random_number.'").hide();
							}

						});
					});</script>';
				}
				$output .= '<br><label for="ndf_editor_'.$random_number.'" id="label_ndf_editor_'.$random_number.'" class="error ndf_editor_'.$random_number.'" style="display: none;">This field is required.</label>';
				break;

			default:
				if( empty( $from_db_field_values ) ){
					$output .= '<input type="text" name="'.esc_attr__($name).'" '.$required_field.' class="widefat">';
				}
				else{
					$output .= '<input type="text" name="'.esc_attr__($name).'" '.$required_field.' value="'.esc_attr__( $from_db_field_values ).'" class="widefat">';
				}
				break;
		}
		return $output;
	}
}
}
?>