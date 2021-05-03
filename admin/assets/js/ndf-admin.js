/** 
 * Admin JS scripts
 *
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/js
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
jQuery(function($){
    jQuery('.wrap .more_info_fields')
    .accordion({
        header: "> div > h3",
        active: false,
        collapsible: true,
        heightStyle: "content",
        beforeActivate: function(event, ui) {
            if (ui.newHeader[0]) {
                var currHeader  = ui.newHeader;
                var currContent = currHeader.next('.ui-accordion-content');
            } else {
                var currHeader  = ui.oldHeader;
                var currContent = currHeader.next('.ui-accordion-content');
            }
            var isPanelSelected = currHeader.attr('aria-selected') == 'true';
            currHeader.toggleClass('ui-corner-all',isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));
            
            currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e',isPanelSelected).toggleClass('ui-icon-triangle-1-s',!isPanelSelected);
            
            currContent.toggleClass('accordion-content-active',!isPanelSelected)    
            if (isPanelSelected) { currContent.slideUp(); }  else { currContent.slideDown(); }

            return false;
        }
    })
    .sortable({
        items: '.item',
        opacity: 0.5,
        cursor: 'pointer',
        axis: 'y',
        update: function( event, ui ) {
            var new_order = jQuery(this).sortable('serialize');
            jQuery.post(ndf_data_filter_vars.ndf_ajax, { action: 'ndf_update_saved_fields_order', security: ndf_data_filter_vars.ndf_nonce, order: new_order }, function(response){
                jQuery('.more_info_ajax_result').html(response);
            });
        }
    });
    jQuery(".wrap .more_info_fields").show();
})
jQuery(document).ready( function($) {
	$('.ndf_colorpicker').wpColorPicker();

	var ndf_image_uploader; 
 
    $('.ndf_media_file_upload').click(function(e) {
        e.preventDefault();

        var button = $(this);
        var id = button.attr('id').replace('_button', '');

        if (ndf_image_uploader) { ndf_image_uploader.open(); return; }

        ndf_image_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
               text: 'Choose Image'
            },
            multiple: false
        });

        ndf_image_uploader.on('select', function() {
            attachment = ndf_image_uploader.state().get('selection').first().toJSON();
            $('#'+id).val(attachment.url);
            $('span.'+id+'_new').html(attachment.url);
        });

        ndf_image_uploader.open();
    });

    $('.ndf_remove_saved_image').click(function(e) {
        var id = $(this).attr('id').replace('_remove', '');
        $('#'+id).val('');
        $('#'+id+'_wrap').fadeOut();
    });
	
	/* Disable dragging of meta boxes */
	$('#poststuff').on('sortstart', function(event) {
		_triggerAllEditors(event, false);
	}).on('sortstop', function(event) {
		_triggerAllEditors(event, true);
	});
	$('.meta-box-sortables').sortable({
        disabled: true
    });
    $('.postbox .hndle').css('cursor', 'pointer');

    /* Hide/Show of Data Meta Box based on Data Content Option */
    $(document).on('change', '#ndf_data_category_1_content_option, #ndf_data_category_2_content_option, #ndf_data_category_3_content_option, #ndf_data_category_4_content_option, #ndf_data_category_5_content_option', function(){
        var temp_id = $(this).attr('id').replace('ndf_data_category_', '');
        var row_id = temp_id.replace('_content_option', '');
        if( $(this).val() === "" ){
            $('#wp-ndf_data_category_'+row_id+'_content-wrap').parent().parent().hide();
        }
        else{
            $('#wp-ndf_data_category_'+row_id+'_content-wrap').parent().parent().show();
        }
    });
    $(document).on('change', '#ndf_data_more_info_button_action', function(){
        if( $(this).val() == "external-link" ){
            $('#ndf_data_moreinfo_external_link_wrap').show();
            $('#ndf_data_moreinfo_external_link_target_wrap').show();
        }
        else{
            $('#ndf_data_moreinfo_external_link_wrap').hide();
            $('#ndf_data_moreinfo_external_link_target_wrap').hide();
        }
    });
    $(document).on('change', '#ndf_data_enquiry_form', function(){
        if( $(this).val() == "show" ){
            $('#ndf_data_recipient_email_wrap').show();
        }
        else{
            $('#ndf_data_recipient_email_wrap').hide();
        }
    });
    $(document).on('change', '#ndf_data_star_rating', function(){
        if( $(this).val() == "custom-rating" ){
            $('#ndf_data_star_rating_custom_wrap').show();
        }
        else{
            $('#ndf_data_star_rating_custom_wrap').hide();
        }
    });
    $(document).on('change', '#ndf_data_results_layout', function(){
        if( $(this).val() == "horizontal" ){
            $('#ndf_data_results_h_layout_options').parent().parent().show();
        }
        else{
            $('#ndf_data_results_h_layout_options').parent().parent().hide();
        }
    });

    $('#ndf_data_category_1_content_option').change();
    $('#ndf_data_category_2_content_option').change();
    $('#ndf_data_category_3_content_option').change();
    $('#ndf_data_category_4_content_option').change();
    $('#ndf_data_category_5_content_option').change();
    $('#ndf_data_more_info_button_action').change();
    $('#ndf_data_results_layout').change();
    $('#ndf_data_enquiry_form').change();
    $('#ndf_data_star_rating').change();

    /* Code runs when an ajax request succeeds */
    jQuery( document ).ajaxSuccess(function( event, xhr, settings ) {
        var data_string = settings.data;
        if( (data_string.indexOf('action=add-tag&screen=edit-ndf_category_1&taxonomy=ndf_category_1') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_2&taxonomy=ndf_category_2') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_3&taxonomy=ndf_category_3') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_4&taxonomy=ndf_category_4') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_5&taxonomy=ndf_category_5') != -1) ){
            location.reload(true);
        }
        if( (data_string.indexOf('action=add-tag&screen=edit-ndf_category_2&taxonomy=ndf_category_2') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_2&taxonomy=ndf_category_2') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_3&taxonomy=ndf_category_3') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_4&taxonomy=ndf_category_4') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_5&taxonomy=ndf_category_5') != -1) ){
            location.reload(true);
        }
        if( (data_string.indexOf('action=add-tag&screen=edit-ndf_category_3&taxonomy=ndf_category_3') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_2&taxonomy=ndf_category_2') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_3&taxonomy=ndf_category_3') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_4&taxonomy=ndf_category_4') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_5&taxonomy=ndf_category_5') != -1) ){
            location.reload(true);
        }
        if( (data_string.indexOf('action=add-tag&screen=edit-ndf_category_4&taxonomy=ndf_category_4') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_2&taxonomy=ndf_category_2') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_3&taxonomy=ndf_category_3') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_4&taxonomy=ndf_category_4') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_5&taxonomy=ndf_category_5') != -1) ){
            location.reload(true);
        }        if( (data_string.indexOf('action=add-tag&screen=edit-ndf_category_5&taxonomy=ndf_category_5') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_2&taxonomy=ndf_category_2') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_3&taxonomy=ndf_category_3') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_4&taxonomy=ndf_category_4') != -1) || (data_string.indexOf('action=add-tag&screen=edit-ndf_category_5&taxonomy=ndf_category_5') != -1) ){
            location.reload(true);
        }

    });

    jQuery(document).on('change', '#ndf_more_info_field_type', function(){
        if( jQuery('.wrap').find("[data-ndf-field-parent='" + jQuery(this).val() + "']") ){
            jQuery('[data-ndf-field-parent]').addClass('hidden');
            jQuery('[data-ndf-field-parent="'+jQuery(this).val()+'"]').removeClass('hidden');
            jQuery('[data-ndf-field-parent] textarea, [data-ndf-field-parent] input, [data-ndf-field-parent] select').attr('disabled', 'disabled')
            jQuery('[data-ndf-field-parent="'+jQuery(this).val()+'"] textarea, [data-ndf-field-parent="'+jQuery(
                this).val()+'"] input, [data-ndf-field-parent="'+jQuery(this).val()+'"] select').removeAttr('disabled');

            if( jQuery(this).val() == 'section' ){
                jQuery('.ndf_required_field').addClass('hidden');
                jQuery('.ndf_required_field input').attr('disabled', true);
            }
            else{
                jQuery('.ndf_required_field').removeClass('hidden');
                jQuery('.ndf_required_field input').removeAttr('disabled');
            }

            if( $('.ndf_more_info_fields_options_remove').length <= 1 ){
                $('.ndf_more_info_fields_options_remove').attr('disabled',true);
            }
            else{
                $('.ndf_more_info_fields_options_remove').each(function(){
                    $(this).removeAttr('disabled');
                });
            }

            if( $('.ndf_more_info_fields_options_remove_checkbox').length <= 1 ){
                $('.ndf_more_info_fields_options_remove_checkbox').attr('disabled',true);
            }
            else{
                $('.ndf_more_info_fields_options_remove_checkbox').each(function(){
                    $(this).removeAttr('disabled');
                });
            }
        }
    });
    $('#ndf_more_info_field_type').change();

    jQuery(document).on('change', '.ndf_more_info_field_type_edit', function(){
        var item_id = $(this).attr('id').replace('ndf_more_info_field_type_edit_', '');

        if( jQuery('#item_'+item_id).find("[data-ndf-field-parent='" + jQuery(this).val() + "']") ){
            jQuery('#item_'+item_id+' [data-ndf-field-parent]').addClass('hidden');
            jQuery('#item_'+item_id+' [data-ndf-field-parent="'+jQuery(this).val()+'"]').removeClass('hidden');
            jQuery('#item_'+item_id+' [data-ndf-field-parent] textarea, #item_'+item_id+' [data-ndf-field-parent] input, #item_'+item_id+' [data-ndf-field-parent] select').attr('disabled', 'disabled');
            jQuery('#item_'+item_id+' [data-ndf-field-parent="'+jQuery(this).val()+'"] textarea, #item_'+item_id+' [data-ndf-field-parent="'+jQuery(this).val()+'"] input, #item_'+item_id+' [data-ndf-field-parent="'+jQuery(this).val()+'"] select').removeAttr('disabled');
        }
    });
    $('.ndf_more_info_field_type_edit').change();

    /* Form Validation */
    $("#ndf_more_info_fields_add").validate({
        success: function(label,element) {
            label.parent().removeClass('error');
            label.remove(); 
        },
        rules: {
            label: "required",
            field_values: "required",
            'field_values[]' : {
                required: true,
                minlength: 1
            },
            'field_values_name[]' : {
                required: true,
                minlength: 1
            }
        },
        messages: {
            label: "Please enter a field label",
            field_values: {
                required: "Please enter one or more options"
            },
            'field_values_name[]': {
                required: "Please select one or more options"
            }
        },
        errorElement : 'div',
        errorLabelContainer: '.errorText'
    });

    /* Radio Button & Dropdown Dynamic Input */
    var field_option_count = 0;
    jQuery(document).on('click', '.ndf_more_info_fields_options_add', function(){
        field_option_count++;
        var field = '';
        field += '<tr>';
        field += '<td><input type="radio" name="default_value" value="'+field_option_count+'"></td>';
        field += '<td>';
        field += '<input type="text" name="option_label['+field_option_count+']" required data-msg="Please enter option label" class="widefat" value="" aria-required="true">';
        field += '</td>';
        field += '<td>';
        field += '<input type="text" name="option_value['+field_option_count+']" class="widefat">';
        field += '</td>';
        field += '<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus"></span></button></td>';
        field += '</tr>';
        jQuery('.ndf_more_info_fields_options:visible').append(field);

        if( $('.ndf_more_info_fields_options_remove').length <= 1 ){
            $('.ndf_more_info_fields_options_remove').attr('disabled',true);
        }
        else{
            $('.ndf_more_info_fields_options_remove').each(function(){
                $(this).removeAttr('disabled');
            });
        }
    });

    jQuery(document).on('click', '.ndf_more_info_fields_options_remove', function(){
        if( $('.ndf_more_info_fields_options_remove').length >= 2 ){
            $(this).parent().parent().remove();
            if( $('.ndf_more_info_fields_options_remove').length <= 1 ){
                $('.ndf_more_info_fields_options_remove').attr('disabled',true);
            }
        }
        else{
            $(this).attr('disabled',true);
        }
    });
    /* EO Radio Button & Dropdown Dynamic Input */

    /* Checkbox Dynamic Input */
    var field_option_count_checkbox = 0;
    jQuery(document).on('click', '.ndf_more_info_fields_options_add_checkbox', function(){
        field_option_count_checkbox++;
        var field = '';
        field += '<tr>';
        field += '<td>';
        field += '<input type="text" name="option_label['+field_option_count_checkbox+']" required data-msg="Please enter option label" class="widefat">';
        field += '</td>';
        field += '<td>';
        field += '<input type="text" name="option_value['+field_option_count_checkbox+']" class="widefat">';
        field += '</td>';
        field += '<td><button type="button" class="ndf_more_info_fields_options_remove"><span class="dashicons dashicons-minus"></span></button></td>';
        field += '</tr>';
        jQuery('.ndf_more_info_fields_options_checkbox:visible').append(field);

        if( $('.ndf_more_info_fields_options_remove_checkbox').length <= 1 ){
            $('.ndf_more_info_fields_options_remove_checkbox').attr('disabled',true);
        }
        else{
            $('.ndf_more_info_fields_options_remove_checkbox').each(function(){
                $(this).removeAttr('disabled');
            });
        }
    });

    jQuery(document).on('click', '.ndf_more_info_fields_options_remove_checkbox', function(){
        if( $('.ndf_more_info_fields_options_remove_checkbox').length >= 2 ){
            $(this).parent().parent().remove();
            if( $('.ndf_more_info_fields_options_remove_checkbox').length <= 1 ){
                $('.ndf_more_info_fields_options_remove_checkbox').attr('disabled',true);
            }
        }
        else{
            $(this).attr('disabled',true);
        }
    });
    /* EO Checkbox Dynamic Input */

    /* Delete button confirmation button */
    jQuery(document).on('click', '.ndf_delete_more_info_field', function(){
        $(this).css('display', 'none');
        $(this).next('.ndf_confirm_delete_more_info_field').css('display', 'block');
    });

    /* Button Generator */
    $(document).on('click', '#button_generator_submit', function(){
        var button_generator_style = $('#button_generator_style').val();
        var button_generator_text = $.trim($('#button_generator_text').val());
        var button_generator_link = $.trim($('#button_generator_link').val());
        var button_generator_target = $('input[name="button_generator_target"]:checked').val();
        var target = '';
        if( button_generator_target == 'new' ){
            target = ' target="_blank"';
        }

        var track = '';
        var button_generator_linked_data = '', linked_data = '';
        var button_generator_source_tag = '', source_tag = '';

        if( $('input[name="button_generator_track_oc"]:checked').length ){
            var button_generator_track_oc = $('input[name="button_generator_track_oc"]:checked').val();
            if( button_generator_track_oc == 'yes' ){
                track = ' data-wcp-track';
                $('#button_generator_new').prop("checked", true);
               
                linked_data = $('#button_generator_oc_linked_data').val();
                if( linked_data != 'select' ){
                    button_generator_linked_data = ' data-wcp-linked-data="'+linked_data+'"';
                }
                if( $('#button_generator_oc_source_tag').length ){
                    source_tag = $('#button_generator_oc_source_tag').val();
                }
                if( source_tag == 'select' ){
                    source_tag = '';
                }
                button_generator_source_tag = ' data-wcp-source-tag="'+source_tag+'"';
            }
        }

        if( button_generator_text.length === 0 || button_generator_target.length === 0 ){
            alert('Please fill the required fields.');
        }
        else{
            $('.ndf_generated_button').hide();
            $('.ndf_button_style_'+button_generator_style).show();
            $('#ndf_generated_button_preview_label').show();
            $('.ndf_button_style_1').text(button_generator_text);
            $('.ndf_button_style_2').text(button_generator_text);
            $('.ndf_button_style_3').text(button_generator_text);
            $('.ndf_button_style_4').text(button_generator_text);
            $('.ndf_button_style_5').text(button_generator_text);
            $('#ndf_generated_button_code').html('<a href="'+button_generator_link+'"'+target+' role="button" class="ndf_button_style_'+button_generator_style+'"'+track+button_generator_linked_data+button_generator_source_tag+'>'+button_generator_text+'</a>');
        }
    });

    $(document).on('change', 'input[name="button_generator_track_oc"]:checked', function(){
        var track = $(this).val();
        if( track == 'yes' ){
            $('#button_generator_new').attr('checked', 'checked');
        }
    });

    $(document).on('change', '#button_generator_style, #button_generator_text, #button_generator_link, #button_generator_new, #button_generator_same, #button_generator_track_oc_yes, button_generator_track_oc_no, #button_generator_oc_linked_data, #button_generator_oc_source_tag', function(){
            $('.ndf_generated_button').hide();
            $('#ndf_generated_button_preview_label').hide();
            $('#ndf_generated_button_code').html('');
    });
    /* Button Generator */
    
    /* Shortcode Generator */
	$(document).on( 'change', '.wrap .ndf_shortcode_initial, .wrap .ndf_shortcode_step, .wrap .ndf_shortcode_moreinfo', function(e){
		$(this).ndfShortcodeGenerator();
	});
    $(document).on( 'click', '.wrap .ndf_filter_container ul.frxp-list li input[type=checkbox]', function(e){       
        if( this.checked ){
            $( this ).parents( 'li' ).children( 'input[type=checkbox]' ).attr( 'checked', true );
        }
        $( this ).parent().find( 'input[type=checkbox]' ).attr( 'checked', this.checked );
        
        $(this).ndfShortcodeGenerator();
    });

	$(document).on( 'keyup', '.wrap .ndf_filter_container .ndf_fields_text', function(e){
        $(this).ndfShortcodeGenerator();
    });	
	
	$.fn.ndfShortcodeGenerator = function(){
		var attributes = '';
		var category_1 = '';
		var category_2 = '';
		var category_3 = '';
		var category_4 = '';
		var category_5 = '';
        var field = '';
		
		$( '.wrap .ndf_filter_container ul.frxp-list li input[type=checkbox]' ).each(function(){
			if( this.checked ){
				if( $( this ).attr('data-ndf-fc-1') ){
					if( category_1 == '' ){
						category_1 += $( this ).data('ndf-fc-1');
					}
					else{
						category_1 += ','+$( this ).data('ndf-fc-1');
					}
				}
				if( $( this ).attr('data-ndf-fc-2') ){
					if( category_2 == '' ){
						category_2 += $( this ).data('ndf-fc-2');
					}
					else{
						category_2 += ','+$( this ).data('ndf-fc-2');
					}
				}
				if( $( this ).attr('data-ndf-fc-3') ){
					if( category_3 == '' ){
						category_3 += $( this ).data('ndf-fc-3');
					}
					else{
						category_3 += ','+$( this ).data('ndf-fc-3');
					}
				}
				if( $( this ).attr('data-ndf-fc-4') ){
					if( category_4 == '' ){
						category_4 += $( this ).data('ndf-fc-4');
					}
					else{
						category_4 += ','+$( this ).data('ndf-fc-4');
					}
				}
                if( $( this ).attr('data-ndf-fc-5') ){
                    if( category_5 == '' ){
                        category_5 += $( this ).data('ndf-fc-5');
                    }
                    else{
                        category_5 += ','+$( this ).data('ndf-fc-5');
                    }
                }
                if( $( this ).attr('data-ndf-moreinfo-filter') ){
                    field = $( this ).data('ndf-moreinfo-filter');
                    //console.log(field);
                    $('#options_'+field).css('display', 'block');
                    var field_value = $('#options_'+field).val();
                    attributes += ' '+field+'="'+field_value+'"';
                }
            }
            else{
                if( $( this ).attr('data-ndf-moreinfo-filter') ){
                    field = $( this ).data('ndf-moreinfo-filter');
                    //console.log(field);
                    $('#options_'+field).css('display', 'none');
                }
            }
        });
        if( category_1 != '' ){
			attributes += ' category-1="'+category_1+'"';
		}
		if( category_2 != '' ){
			attributes += ' category-2="'+category_2+'"';
		}
		if( category_3 != '' ){
			attributes += ' category-3="'+category_3+'"';
		}
		if( category_4 != '' ){
			attributes += ' category-4="'+category_4+'"';
		}
		if( category_5 != '' ){
			attributes += ' category-5="'+category_5+'"';
		}
		
		if( $('input[type=checkbox].ndf_shortcode_count:checked').length > 0 ){
			attributes += ' total-count="true"';
		}
		if( $('.ndf_shortcode_initial').val() >= 1 ){
			attributes += ' initial="'+parseInt( $('.ndf_shortcode_initial').val() )+'"';
		}
		if( $('.ndf_shortcode_step').val() >= 1 ){
			attributes += ' step="'+parseInt( $('.ndf_shortcode_step').val() )+'"';
		}
		
		$( '.ndf_shortcode' ).val( '[wp_comparison'+attributes+']' );
	}

	$( document ).on('click', '.ndf_shortcode_clear_filter', function() {
		$( '.wrap .ndf_filter_container input[type=checkbox]' ).each(function(){
			$( this ).attr( 'checked', false );
		});
		$( '.wrap .ndf_shortcode_initial' ).val('0');
		$( '.wrap .ndf_shortcode_step' ).val('0');
		$(this).ndfShortcodeGenerator();
	});
	
	$( document ).on('click', '[data-clipboard-target]', function() {
		var $target, $msg;
		$target = $('#' + $(this).attr('data-clipboard-target'));
		if (!$target.length) {
			return;
		}
		$target.css('background', '#8ED5F5');

		// create textarea to use select and execCommand
		$('body').append('<textarea id="ndf-shortcodes">' + $target.val() + '</textarea>');
		$('#ndf-shortcodes').select();
		if (document.execCommand('copy')) {
			if( $('.clipboard-message').length < 1 ){
				$msg = $('<p><span class="clipboard-message alert alert-success">Copied to clipboard</span></p>');
			}
		} else {
			$msg = $('<p><span class="clipboard-message alert alert-danger">Copy error</span></p>');
		}
		$('#ndf-shortcodes').remove();
		$('.ndf-code-block').append($msg);

		setTimeout(function() {
			if( $msg ){
				$msg.fadeOut(function() {
					$(this).remove();
					$target.css('background', '#FFF').css({'transition':'background-color 0.5s ease', });
				});
			}
		}, 3000);
	});

    $( "#ndf_results_section_more_info tbody" ).sortable();

    $("#wcp_data_results_add_field").validate({
        rules: {
            ndf_field: "required",
        }
    });

    var from = $('input[name="wcp_enquiry_entries_date_start"]'), to = $('input[name="wcp_enquiry_entries_date_end"]');
    $( 'input[name="wcp_enquiry_entries_date_start"], input[name="wcp_enquiry_entries_date_end"]' ).datepicker({ dateFormat: 'yy-mm-dd' }); 

    from.on( 'change', function() {
        to.datepicker( 'option', 'minDate', from.val() ); 
    }); 

    to.on( 'change', function() { 
        from.datepicker( 'option', 'maxDate', to.val() ); 
    }); 

    var outbound_clicks_from = $('input[name="wcp_outbound_clicks_date_start"]'), outbound_clicks_to = $('input[name="wcp_outbound_clicks_date_end"]');
    $( 'input[name="wcp_outbound_clicks_date_start"], input[name="wcp_outbound_clicks_date_end"]' ).datepicker({ dateFormat: 'yy-mm-dd' }); 

    outbound_clicks_from.on( 'change', function() {
        outbound_clicks_to.datepicker( 'option', 'minDate', outbound_clicks_from.val() ); 
    }); 

    outbound_clicks_to.on( 'change', function() { 
        outbound_clicks_from.datepicker( 'option', 'maxDate', outbound_clicks_to.val() ); 
    }); 

    $(document).on('click', '#ndf_enquiry_details-enquiry-details #wcp_enquiry_resend_mail', function(e){
        e.preventDefault();
        var modal_id = $(this).data('modal-id');
        var enquiry_field_error = 0;

        $.ajax({
            type : "post",
            dataType : "json",
            url : ndf_data_filter_vars.ndf_ajax,
            data : {
                action: "ndf_enquiry_form_submit_call", 
                post_id : modal_id,
                resend : 'yes',
                security : ndf_data_filter_vars.ndf_nonce
            },
            beforeSend: function () {
                $('#ndf_enquiry_details-enquiry-details .spinner').addClass('is-active');
                $('#ndf_enquiry_details-enquiry-details .spinner').fadeIn();
                $('#ndf_enquiry_details-enquiry-details .ndf_enquiry_notification').hide();
                $('#ndf_enquiry_details-enquiry-details .ndf_enquiry_notification').html('');
            },
            success: function(response) {
                $('#ndf_enquiry_details-enquiry-details .spinner').removeClass('is-active');
                $('#ndf_enquiry_details-enquiry-details .ndf_enquiry_form_loading').fadeOut();
                $('#ndf_enquiry_details-enquiry-details .ndf_enquiry_notification').html(response.ndf_data);
                $('#ndf_enquiry_details-enquiry-details .ndf_enquiry_notification').fadeIn();
                $('#ndf_enquiry_details-enquiry-details .ndf_enquiry_notification').addClass(response.mail_status);
            }
        });
    });
});