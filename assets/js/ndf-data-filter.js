/** 
 * Main plugin JS scripts
 *
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/assets/js
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
 
var $ = jQuery.noConflict();

// $(document).ready( function($) {}
$(function($) {
	

	$( ".ndf_filters_wrapper .ndf_filter_container:last-child" ).addClass('ndf_last_filter');

	var load_limit_original = ndf_data_filter_vars.ndf_limit_results;
	var load_limit = load_limit_original;
	var load_limit_step = ndf_data_filter_vars.ndf_limit_results_step;
	
	
	if( parseInt( $( "#ndf_filtered_data_content" ).data('ndf-step') ) >= 1 ){
		load_limit_step = parseInt( $( "#ndf_filtered_data_content" ).data('ndf-step') );
		
	}
	if( parseInt( $( "#ndf_filtered_data_content" ).data('ndf-limit') ) >= 1 ){
		load_limit_original = parseInt( $( "#ndf_filtered_data_content" ).data('ndf-limit') );
		load_limit = load_limit_original;
	
	}

	var ndf_table_layout = $( "#ndf_filtered_data_content" ).attr('data-ndf-layout');


	if( ndf_table_layout == 'tabular' ){
		$( "#ndf_filtered_data_content.tabular" ).tablesaw();
	}

	if( $( "#wcp_keyword_search_p" ).length ){
		$( "#wcp_keyword_search" ).css('height', $( "#wcp_keyword_search_button" ).css('height') );
		$( "#wcp_keyword_search_button" ).css('height', $( "#wcp_keyword_search" ).css('height') );
	}

	$("#wcp_keyword_search").keyup(function(event){
		if(event.keyCode == 13){
			$("#wcp_keyword_search_button").click();
		}
	})


	var viewportWidth = $(window).width();
	

	var ndf_cookie_fc_1 = '';
	var ndf_cookie_fc_2 = '';
	var ndf_cookie_fc_3 = '';
	var ndf_cookie_fc_4 = '';
	var ndf_cookie_fc_5 = '';
	
	var last_width = '';

	var ndf_set_cookies = 'no';
	var ndf_reset = 'no';

	ndf_current_path = window.location.href;
	var current_cookie = (Cookies.get(ndf_current_path) || "null");

	ndf_cookie_current_path = JSON.parse(current_cookie);

	if( ndf_cookie_current_path != null ){
		ndf_cookie_fc_1 = ndf_cookie_current_path[1];
		ndf_cookie_fc_2 = ndf_cookie_current_path[2];
		ndf_cookie_fc_3 = ndf_cookie_current_path[3];
		ndf_cookie_fc_4 = ndf_cookie_current_path[4];
		ndf_cookie_fc_5 = ndf_cookie_current_path[5];
		results_count = ndf_cookie_current_path["results_count"];

		if( ndf_cookie_fc_1 != null ){
			$.each( ndf_cookie_fc_1, function( index, value ){
				$("[data-ndf-fc-1='"+value+"']").attr('checked', 'checked');				
			});
		}
		if( ndf_cookie_fc_2 != null ){
			$.each( ndf_cookie_fc_2, function( index, value ){
				$("[data-ndf-fc-2='"+value+"']").attr('checked', 'checked');
			});
		}
		if( ndf_cookie_fc_3 != null ){
			$.each( ndf_cookie_fc_3, function( index, value ){
				$("[data-ndf-fc-3='"+value+"']").attr('checked', 'checked');
			});
		}
		if( ndf_cookie_fc_4 != null ){
			$.each( ndf_cookie_fc_4, function( index, value ){
				$("[data-ndf-fc-4='"+value+"']").attr('checked', 'checked');
			});
		}
		if( ndf_cookie_fc_5 != null ){
			$.each( ndf_cookie_fc_5, function( index, value ){
				$("[data-ndf-fc-5='"+value+"']").attr('checked', 'checked');
			});
		}
		if( results_count != null ){
			load_limit = results_count;
		}
	}
	else{
		ndf_cookie_current_path = '';
		ndf_reset = 'yes';
	}

	$.fn.ndfLoadData = function(){
		if( $('#ndf_plugin_html') ){
			/* Do AJAX Request */

			var ndf_keyword_filter = '';
			if( $( "#wcp_keyword_search_p" ).length ){
				ndf_keyword_filter = $('#wcp_keyword_search').val();
			}

			/* Get checked filters */
			var ndf_more = $('#ndf_load_more').data('ndf-more');
			var ndf_fc_1 = [];
			var ndf_fc_2 = [];
			var ndf_fc_3 = [];
			var ndf_fc_4 = [];
			var ndf_fc_5 = [];
			var ndf_af_params = [];
			var ndf_hidden_cols_in_view = [];
			
			$('th.ndf_table_header.tablesaw-cell-hidden').each( function(){
				ndf_hidden_cols_in_view.push( $(this).attr('id') );
			});

			$('input[type=checkbox][name=ndf_filter_cat_1]:checked').each( function(){
				ndf_fc_1.push( $(this).data('ndf-fc-1') );
			});
			$('input[type=checkbox][name=ndf_filter_cat_2]:checked').each( function(){
				ndf_fc_2.push( $(this).data('ndf-fc-2') );
			});
			$('input[type=checkbox][name=ndf_filter_cat_3]:checked').each( function(){
				ndf_fc_3.push( $(this).data('ndf-fc-3') );
			});
			$('input[type=checkbox][name=ndf_filter_cat_4]:checked').each( function(){
				ndf_fc_4.push( $(this).data('ndf-fc-4') );
			});
			$('input[type=checkbox][name=ndf_filter_cat_5]:checked').each( function(){
				ndf_fc_5.push( $(this).data('ndf-fc-5') );
			});
			
			if( $( "#ndf_filtered_data_content" ).attr('data-ndf-table-filtered') ){
				if( $( "#ndf_filtered_data_content" ).attr('data-ndf-category-1-param') ){
					ndf_fc_1 = $( "#ndf_filtered_data_content" ).data('ndf-category-1-param').toString().replace(/\s+/g, '').split(',');
					ndf_fc_1 = jQuery.grep(ndf_fc_1, function(n, i){
						return (n !== "" && n != null);
					});
				}
				if( $( "#ndf_filtered_data_content" ).attr('data-ndf-category-2-param') ){
					ndf_fc_2 = $( "#ndf_filtered_data_content" ).data('ndf-category-2-param').toString().replace(/\s+/g, '').split(',');
					ndf_fc_2 = jQuery.grep(ndf_fc_2, function(n, i){
						return (n !== "" && n != null);
					});
				}
				if( $( "#ndf_filtered_data_content" ).attr('data-ndf-category-3-param') ){
					ndf_fc_3 = $( "#ndf_filtered_data_content" ).data('ndf-category-3-param').toString().replace(/\s+/g, '').split(',');
					ndf_fc_3 = jQuery.grep(ndf_fc_3, function(n, i){
						return (n !== "" && n != null);
					});
				}
				if( $( "#ndf_filtered_data_content" ).attr('data-ndf-category-4-param') ){
					ndf_fc_4 = $( "#ndf_filtered_data_content" ).data('ndf-category-4-param').toString().replace(/\s+/g, '').split(',');
					ndf_fc_4 = jQuery.grep(ndf_fc_4, function(n, i){
						return (n !== "" && n != null);
					});
				}
				if( $( "#ndf_filtered_data_content" ).attr('data-ndf-category-5-param') ){
					ndf_fc_5 = $( "#ndf_filtered_data_content" ).data('ndf-category-5-param').toString().replace(/\s+/g, '').split(',');
					ndf_fc_5 = jQuery.grep(ndf_fc_5, function(n, i){
						return (n !== "" && n != null);
					});
				}
				if( $( "#ndf_filtered_data_content" ).attr('data-ndf-additional-fields-param') ){
					ndf_af_params = $( "#ndf_filtered_data_content" ).data('ndf-additional-fields-param');
				}
			}


			if( ndf_more != 'more' ){
				/* Determine if Load More button is clicked to load request */
				/*if( ndf_cookie_current_path != null && ndf_cookie_current_path.results_count >= load_limit ){*/
				if( ndf_cookie_current_path != null ){
					load_limit_original = ndf_cookie_current_path.results_count;
				}
				load_limit = load_limit_original;
				ndf_more = 'no';
				$('#ndf_load_more').data('ndf-more', ndf_more);
			}
			if( ndf_reset == 'yes' ){
				load_limit_original = ndf_data_filter_vars.ndf_limit_results;

				if( parseInt( $( "#ndf_filtered_data_content" ).data('ndf-limit') ) >= 1 ){
					load_limit_original = parseInt( $( "#ndf_filtered_data_content" ).data('ndf-limit') );
				}

				load_limit = load_limit_original;
			}
			//console.log(ndf_reset);
			//console.log(load_limit);
			ndf_reset = 'no';

			if( ndf_set_cookies == 'yes' ){
				var ndf_current_path_value = {1 : ndf_fc_1, 2: ndf_fc_2, 3: ndf_fc_3, 4: ndf_fc_4, 5: ndf_fc_5, "results_count": load_limit};
				var date = new Date();
				var minutes = 30;
				date.setTime(date.getTime() + (minutes * 60 * 1000));
				Cookies.set(ndf_current_path, ndf_current_path_value, { expires: date });
			}
			ndf_set_cookies = 'yes';
		
			$.ajax({
				type : "post",
				dataType : "json",
				url : ndf_data_filter_vars.ndf_ajax,
				data : {
					action: "ndf_filter_data_call", 
					ndf_fc_1 : ndf_fc_1, 
					ndf_fc_2 : ndf_fc_2, 
					ndf_fc_3 : ndf_fc_3, 
					ndf_fc_4 : ndf_fc_4, 
					ndf_fc_5 : ndf_fc_5, 
					ndf_keyword_filter : ndf_keyword_filter, 
					ndf_af_params : ndf_af_params, 
					ndf_table_layout : ndf_table_layout, 
					ndf_hidden_cols_in_view : ndf_hidden_cols_in_view, 
					load_limit : load_limit, 
					ndf_more : ndf_more, 
					security : ndf_data_filter_vars.ndf_nonce
				},
				beforeSend: function () {
					$('#ndf_image_wrapper .ndf_loading').fadeIn();
	            },
				success: function(response) {
					$('#ndf_image_wrapper .ndf_loading').fadeOut();
					if( response.ndf_data == 'no-results' ){
						$('#ndf-no-results').show();
						$('.tablesaw-bar.tablesaw-mode-swipe').hide();
						$('#ndf_filtered_data_content').hide();
						$('#ndf_load_more').hide();
						$( ".ndf_total_count_label" ).hide();
						$( ".ndf_results_count" ).html( response.ndf_results_count );
						$( ".ndf_results_count_all" ).html( response.ndf_results_count_all );
					}
					else{
						$('#ndf-no-results').hide();
						$('.tablesaw-bar.tablesaw-mode-swipe').show();
						$('#ndf_filtered_data_content').show();
						$('#ndf_filtered_data_content tbody').html( response.ndf_data );
						$('#ndf_load_more').data('ndf-more', response.ndf_more);

						if( response.ndf_max_data == 'reached' ){
							$('#ndf_load_more').hide();
						}
						else{
							$('#ndf_load_more').fadeIn();
						}

						if( ndf_table_layout == 'tabular' ){
							$( "#ndf_filtered_data_content.tabular" ).tablesaw().data( "tablesaw" ).refresh();
						}
						else if( ndf_table_layout == 'horizontal' ){
							if( viewportWidth <= 768 ){
								$('#ndf_plugin_html table.horizontal tr').addClass('frxp-flex frxp-flex-column');								
							}
							$('.horizontal .wcp_cell_wrap').matchHeight();
							// $('.ndf_header_logo').load(function(){
							$('.ndf_header_logo').on("load",function(){
								$('.horizontal .wcp_cell_wrap').matchHeight();
							});
						}
						
						$( ".ndf_total_count_label" ).show();
						$( ".ndf_results_count" ).html( response.ndf_results_count );
						$( ".ndf_results_count_all" ).html( response.ndf_results_count_all );
						$(this).ndfMatchHeight();
					}
				},
                complete: function (data) {
                    //  $('#ndf_filtered_data_content *').load(function(){
                     $('#ndf_filtered_data_content *').on("load",function(){
                         //if( last_width == '' ){
    						last_width = parseInt( $('#ndf_filtered_data_content thead th:not(.tablesaw-cell-hidden):last .label_wrapper').parent().css('width') );
    						
    						$('#ndf_filtered_data_content thead th:not(.tablesaw-cell-hidden):last .label_wrapper').css('width', last_width+'px');
    					//} 
                     });
                }
			});
		}
	};

	if( !$( "#ndf-no-results" ).hasClass("frxp-display-block") ){
		$('#ndf_plugin_html').ndfLoadData();
	}

	$(document).on('click', '#ndf_load_more', function() {
		/* If Load More button is clicked, add limit to return data then call AJAX Request */
		load_limit = parseInt(load_limit) + parseInt(load_limit_step);
		$(this).data('ndf-more', 'more');
		$(this).ndfLoadData();
	});	
	
	$(document).on('click', '#wcp_keyword_search_button', function(e) {
		e.preventDefault();
		$('#ndf_load_more').data('ndf-more', 'no');
		load_limit = load_limit_original;
		ndf_reset = 'yes';
		$(this).ndfLoadData();
	});	

	var cat_1_filter_contents = $( ".cat_1_filter_contents" ).html();
	var cat_1_filter_contents = $( ".cat_1_filter_contents" ).html();
	var cat_2_filter_contents = $( ".cat_2_filter_contents" ).html();
	var cat_3_filter_contents = $( ".cat_3_filter_contents" ).html();
	var cat_4_filter_contents = $( ".cat_4_filter_contents" ).html();
	var cat_5_filter_contents = $( ".cat_5_filter_contents" ).html();
	
	$( ".cat_1_filter_contents" ).html('');
	$( ".cat_2_filter_contents" ).html('');
	$( ".cat_3_filter_contents" ).html('');
	$( ".cat_4_filter_contents" ).html('');
	$( ".cat_5_filter_contents" ).html('');

	$.fn.ndfcheckwidth = function(){
		
		if( viewportWidth <= 768 ){
			$( ".cat_1_grid_output" ).html('');
			$( ".cat_2_grid_output" ).html('');
			$( ".cat_3_grid_output" ).html('');
			$( ".cat_4_grid_output" ).html('');
			$( ".cat_5_grid_output" ).html('');
			
			$( ".cat_1_slider_output" ).html(cat_1_filter_contents);
			$( ".cat_2_slider_output" ).html(cat_2_filter_contents);
			$( ".cat_3_slider_output" ).html(cat_3_filter_contents);
			$( ".cat_4_slider_output" ).html(cat_4_filter_contents);
			$( ".cat_5_slider_output" ).html(cat_5_filter_contents);
			
			$('.ndf_slider_output').addClass('frxp-visible');
			$('.ndf_slider_output').removeClass('frxp-hidden');
			$('.ndf_grid_output').addClass('frxp-hidden');
		}
		else{
			$( ".cat_1_grid_output" ).html(cat_1_filter_contents);
			$( ".cat_2_grid_output" ).html(cat_2_filter_contents);
			$( ".cat_3_grid_output" ).html(cat_3_filter_contents);
			$( ".cat_4_grid_output" ).html(cat_4_filter_contents);
			$( ".cat_5_grid_output" ).html(cat_5_filter_contents);
			
			$( ".cat_1_slider_output" ).html('');
			$( ".cat_2_slider_output" ).html('');
			$( ".cat_3_slider_output" ).html('');
			$( ".cat_4_slider_output" ).html('');
			$( ".cat_5_slider_output" ).html('');
			
			$('.ndf_slider_output').addClass('frxp-hidden');
			$('.ndf_grid_output').removeClass('frxp-hidden');
			$('.ndf_grid_output').addClass('frxp-visible');
		}
	}

	if( ndf_table_layout == 'horizontal' ){
		$('.horizontal .wcp_cell_wrap').matchHeight();
	}

	$.fn.ndfMatchHeight = function(){
		var maxHeight = 0;
		$(".label_wrapper").css("min-height", maxHeight);

		$(".label_wrapper").each(function(){
		   if ($(this).height() > maxHeight) { maxHeight = $(this).height() + 10; }
		});
		
		$(".label_wrapper").css("min-height", maxHeight);

		viewportWidth = $(window).width();
		if( ndf_table_layout == 'horizontal' ){
			if( viewportWidth <= 768 ){
				$('#ndf_plugin_html table.horizontal tr').addClass('frxp-flex frxp-flex-column');	
				
				$('#ndf_plugin_html table.horizontal tbody tr').addClass('frxp-flex frxp-flex-column');
				$('#ndf_plugin_html table.horizontal td.ndf_table_cell').css('width', '100%');
				$('#ndf_plugin_html table.horizontal td.ndf_table_cell.ndf_data_title_cell').each(function(){
					var ndf_table_width = $(this).next('.ndf_table_cell ').css('width');
					
					$(this).css('width', ndf_table_width);
					$(this).find('.wcp_cell_wrap').css('width', ndf_table_width);
				});
			}
			else{
				$('#ndf_plugin_html table.horizontal td.ndf_table_cell.ndf_data_title_cell').each(function(){
					$(this).css('width', '30%');
					$(this).find('.wcp_cell_wrap').css('width', '100%');
				});
				$('#ndf_plugin_html table.horizontal tr').removeClass('frxp-flex frxp-flex-column');
			}
		}
	}

	$(this).ndfMatchHeight();
	
	$(window).on("load",function(){
		$(this).ndfcheckwidth();
		$(this).ndfMatchHeight();
		$( "#ndf_filtered_data_content.tabular" ).trigger( "enhance.tablesaw" );
	});
	$(window).resize(function(){
		$(this).ndfMatchHeight();
		$( "#ndf_filtered_data_content.tabular" ).trigger( "enhance.tablesaw" );
	});
	
	$(document).on('click', '#ndf_reset_filters', function(e) {
		e.preventDefault();
		$('.ndf_filter').each(function(){
			$(this).prop('checked', false);
		});
		ndf_reset = 'yes';
		$('#wcp_keyword_search').val('');
		$(this).ndfLoadData();
	});

	$(document).on( 'click', '.ndf_filter_container ul.frxp-list li input[type=checkbox]', function(e){
	    if(this.checked){
	        $(this).parents( 'li' ).children( 'input[type=checkbox]' ).attr( 'checked',true );
	    }
	    $(this).parent().find( 'input[type=checkbox]' ).attr( 'checked',this.checked ); 
		
	    /* Filter Data AJAX Request */
		$(this).data('ndf-more', 'no');
		load_limit = load_limit_original;
		ndf_reset = 'yes';
		$(this).ndfLoadData();
	});

	$(document).on( 'click', '.ndf_more_info_fields_modal', function(e){
		e.preventDefault();
		var modal_id = $(this).data('modal-id');

		if( $('.frxp-modal-dialog.ndf_modal_content:not(.frxp-modal-dialog-large)') ){
			$('.frxp-modal-dialog.ndf_modal_content').addClass('frxp-modal-dialog-large');
		}

		$.ajax({
			type : "post",
			dataType : "json",
			url : ndf_data_filter_vars.ndf_ajax,
			data : {
				action: "ndf_get_more_info_fields_call", 
				post_id : modal_id,
				security : ndf_data_filter_vars.ndf_nonce
			},
			beforeSend: function () {
				$('.ndf_modal_content').html('<a href="" class="frxp-modal-close frxp-close frxp-close-alt"></a><div class="frxp-modal-spinner"></div>');

				var ndf_data_modal = UIkit.modal("#modal-spinner");
				ndf_data_modal.show();
            },
			success: function(response) {
				$('.ndf_modal_content').html('<a href="" class="frxp-modal-close frxp-close frxp-close-alt"></a>'+response.ndf_data+'<div class="frxp-modal-footer frxp-text-right"><strong><span href="" class="frxp-modal-close ndf_close_modal">Close</span> or Esc Key</strong></div>');
				
				var ratingForms = jQuery(".ndf_modal_content .rating-form form");
				jQuery.each(ratingForms, function(key, value) {
					var parts = value.id.split("-"); // e.g. rating-form-2-1-0
					var id = parts[2] + "-" + parts[3] + "-" + parts[4];
					bindRatingFormEvents(id);

				});
			}
		});
	});

	$(document).on( 'click', '.ndf_more_info_enquiry_modal', function(e){
		e.preventDefault();
		var modal_id = $(this).data('modal-id');
		var button_style = $(this).data('button-style');

		/**/
		var data_track = '';
		if ( $(this).attr('data-wcp-track-enquiry-button') ) {
			var go_to_link = $(this).data('wcp-track-href');
			var wcp_source_tag = $(this).data('wcp-source-tag-submit');
			data_track = ' data-wcp-track-enquiry-submit="yes" data-wcp-track-href="'+go_to_link+'" data-wcp-source-tag="'+wcp_source_tag+'"';
		}

		var ndf_enquiry_form = '<a href="" class="frxp-modal-close frxp-close frxp-close-alt"></a>';
		ndf_enquiry_form += '<div class="ndf_enquiry_fields">';
		ndf_enquiry_form += '<div class="ndf_enquiry_notification">';
		ndf_enquiry_form += '</div>';
		ndf_enquiry_form += '<form id="ndf_enquiry_form">';
		ndf_enquiry_form += '<p class="ndf_enquiry_label"><label><strong>Name<span>*</span></strong></label></p><p><input type="text" required name="ndf_enquiry_name" class="ndf_enquiry_name"></p>';
		ndf_enquiry_form += '<span class="ndf_enquiry_name_error"></span>';
		ndf_enquiry_form += '<p class="ndf_enquiry_label"><label><strong>Email<span>*</span></strong></label></p><p><input type="email" required name="ndf_enquiry_email" class="ndf_enquiry_email"></p>';
		ndf_enquiry_form += '<span class="ndf_enquiry_email_error"></span>';
		ndf_enquiry_form += '<p class="ndf_enquiry_label"><label><strong>Phone</strong></label></p><p><input type="text" class="ndf_enquiry_phone"></p>';
		ndf_enquiry_form += '<p class="ndf_enquiry_label"><label><strong>Enquiry<span>*</span></strong></label></p><p><textarea required name="ndf_enquiry_content" class="ndf_enquiry_content"></textarea></p>';
		ndf_enquiry_form += '<span class="ndf_enquiry_content_error"></span>';
		ndf_enquiry_form += '<p class="ndf_enquiry_label"><a class="ndf_enquiry_submit ndf_button_style_'+button_style+'" data-modal-id="'+modal_id+'" '+data_track+'>Submit</a><span class="ndf_enquiry_form_loading"><i class="frxp-icon-spinner frxp-icon-spin"></i> Sending enquiry... </span></p>';
		ndf_enquiry_form += '</form>';
		ndf_enquiry_form += '</div>';
		ndf_enquiry_form += '<div class="frxp-modal-footer frxp-text-right"><strong><span href="" class="frxp-modal-close ndf_close_modal">Close</span> or Esc Key</strong></div>';

		$('.ndf_modal_content').html(ndf_enquiry_form);

		$('.frxp-modal-dialog.ndf_modal_content').removeClass('frxp-modal-dialog-large');
		var ndf_data_modal = UIkit.modal("#modal-spinner");
		ndf_data_modal.show();
	});

	$(document).on('click', '.frxp-modal .ndf_enquiry_fields .ndf_enquiry_submit', function(e){
		e.preventDefault();
		var modal_id = $(this).data('modal-id');
	    var enquiry_field_error = 0;

		if( $('.frxp-modal .ndf_enquiry_name').valid({ wrapper: '.frxp-modal .ndf_enquiry_name_error' }) ){
			enquiry_field_error++;
		}
		if( $('.frxp-modal .ndf_enquiry_email').valid() ){
			enquiry_field_error++;
		}
		if( $('.frxp-modal .ndf_enquiry_content').valid() ){
			enquiry_field_error++;
		}

		if( enquiry_field_error == 3 ){
			if ( $(this).attr('data-wcp-track-enquiry-submit') ) {
				var go_to_link = $(this).data('wcp-track-href');
				var wcp_source_tag = $(this).data('wcp-source-tag');

				if( $.fn.ndfOutboundClicks !== undefined ) {
					//console.log('call func');
					$(this).ndfOutboundClicks( go_to_link, modal_id, wcp_source_tag, 'enquiry-submit' );
				}
				else{
					//console.log('func not found');
				}
				//console.log('track submit');
			}
			else{
				//console.log('don\'t track submit');
			}

			var ndf_enquiry_name = $('.frxp-modal .ndf_enquiry_name').val();
			var ndf_enquiry_email = $('.frxp-modal .ndf_enquiry_email').val();
			var ndf_enquiry_phone = $('.frxp-modal .ndf_enquiry_phone').val();
			var ndf_enquiry_content = $('.frxp-modal .ndf_enquiry_content').val();

			$.ajax({
				type : "post",
				dataType : "json",
				url : ndf_data_filter_vars.ndf_ajax,
				data : {
					action: "ndf_enquiry_form_submit_call", 
					post_id : modal_id,
					ndf_enquiry_name : ndf_enquiry_name,
					ndf_enquiry_email : ndf_enquiry_email,
					ndf_enquiry_phone : ndf_enquiry_phone,
					ndf_enquiry_content : ndf_enquiry_content,
					security : ndf_data_filter_vars.ndf_nonce
				},
				beforeSend: function () {
					$('.frxp-modal .ndf_enquiry_form_loading').fadeIn();
					$('.frxp-modal .ndf_enquiry_notification').hide();
					$('.frxp-modal .ndf_enquiry_notification').html('');
	            },
				success: function(response) {
					$('.frxp-modal .ndf_enquiry_form_loading').fadeOut();
					$('.frxp-modal .ndf_enquiry_notification').html(response.ndf_data);
					$('.frxp-modal .ndf_enquiry_notification').fadeIn();
					$('.frxp-modal .ndf_enquiry_notification').addClass(response.mail_status);

					$('.frxp-modal .ndf_enquiry_name').val('');
					$('.frxp-modal .ndf_enquiry_email').val('');
					$('.frxp-modal .ndf_enquiry_phone').val('');
					$('.frxp-modal .ndf_enquiry_content').val('');
				}
			});
		}
		else{
			$('.frxp-modal .ndf_enquiry_form_loading').fadeOut();
		}
	});

	$(document).on('click', '.tablesaw-nav-btn', function(){
		$(this).ndfMatchHeight();
		$('#ndf_filtered_data_content thead th .label_wrapper').each(function(){
			last_width = parseInt( $(this).parent().css('width') ) + parseInt( 1 );
			$(this).css('width', last_width+'px');
		});
	});

	$(document).on('click', '.ndf_filters_show_more_ajax', function(e){
		e.preventDefault();
		var ndf_taxonomy = $(this).data('ndf-filter-set');

		$.ajax({
			type : "post",
			dataType : "html",
			url : ndf_data_filter_vars.ndf_ajax,
			data : {
				action: "ndf_get_filters_show_more_call", 
				taxonomy : ndf_taxonomy,
				security : ndf_data_filter_vars.ndf_nonce
			},
			beforeSend: function () {
				$('.'+ndf_taxonomy+'_content').html('<div class="ndf_filters_show_more_loader"><i class="frxp-icon-spinner frxp-icon-small frxp-icon-spin"></i></div>');
            },
			success: function(response) {
				$('.'+ndf_taxonomy+'_content').html( response );
			}
		});
	});
	$(document).on('click', '.ndf_filters_show_more', function(e){
		e.stopPropagation();
		e.preventDefault();
		var ndf_taxonomy = $(this).data('ndf-filter-set');

		$('.ndf_category_'+ndf_taxonomy+'_content .ndf_show_option_hidden').each( function(){
			if( $(this).hasClass('show') ){
				$(this).removeClass('show');
				$('.ndf_filters_show_more.cat_'+ndf_taxonomy).html('Show More <i class="frxp-icon-chevron-down"></i>');
			}
			else{
				$(this).addClass('show');
				$('.ndf_filters_show_more.cat_'+ndf_taxonomy).html('Show Less <i class="frxp-icon-chevron-up"></i>');
			}
		});

		$('#filters_slider .slick-slide').css('height', 'auto');
		
		var ndf_height = [];
		$('.slick-slide').each( function(){
			ndf_height.push( parseInt( $( this ).css('height') ) );
		});
		var max_ndf_height = Math.max.apply(Math,ndf_height);
		
		$('.slick-slide').each( function(){
			$( this ).css( 'height', max_ndf_height );
		});
	});

	$('#filters_slider').slick({
		appendArrows: $('.ndf_slider_navigation'),
		prevArrow: '<button class="uk-button ndf-slider-nav"><i class="frxp-icon-caret-left"></i></button>',
		nextArrow: '<button class="uk-button ndf-slider-nav"><i class="frxp-icon-caret-right"></i></button>',
		arrows: true,
		infinite: false,
		adaptiveHeight: false,
		touchThreshold: 99999,
		useTransform: true,
		touchMove: false,
		draggable: false,
		swipeToSlide: true,
		swipe: true,
	});

	$('#filters_slider').on('afterChange', function(event, slick, currentSlide){
		$('#filters_slider .slick-slide').css('height', 'auto');
		
		var ndf_height = [];
		$('.slick-slide').each( function(){
			ndf_height.push( parseInt( $( this ).css('height') ) );
		});
		var max_ndf_height = Math.max.apply(Math,ndf_height);
		
		$('.slick-slide').each( function(){
			$( this ).css( 'height', max_ndf_height );
		});
	});
	// for request-form-quotes Default
	$(document).on('click', '#request-quotes-single', function(e) {
	e.preventDefault();
	var data_modal = $(this).attr('data-modal');
	$('#single-post-id').val(data_modal)

	$("#quotes-form-container-single").css("display","block");

	});	

	$(document).on('click', '#request-quotes', function(e) {
		e.preventDefault();
		$("#quotes-form-container").css("display","block");
		$("html").css("background-color","black");
	});	
	$(document).on('click', '#close-form', function(e) {
		e.preventDefault();
		$("#quotes-form-container").css("display","none");
		$("#quotes-form-container-single").css("display","none")
	});	
	// end request form-quotes

	$('.tabs-nav a').click(function() {
		$('.tabs-nav li').removeClass('active');
		$(this).parent().addClass('active');
		$('html').css("scroll-behavior","smooth");
		// html { scroll-behavior: smooth !important; }

	  });
	//   end tab content function
	// for generating 2 columns on fields
	var tabscontent2 = $('#tab2 >.frxp-grid');
	for (var i = 0; i < tabscontent2.length; i += 2) {
    tabscontent2.slice(i, i + 2).wrapAll('<div class="group-frxp" />');
	}
	var tabscontent3 = $('#tab3 >.frxp-grid');
	for (var i = 0; i < tabscontent3.length; i += 2) {
    tabscontent3.slice(i, i + 2).wrapAll('<div class="group-frxp" />');
	}
	var tabscontent4 = $('#tab4 >.frxp-grid');
	for (var i = 0; i < tabscontent4.length; i += 2) {
    tabscontent4.slice(i, i + 2).wrapAll('<div class="group-frxp" />');
	}
	var defaultContent = $('#default >.frxp-grid');
	for (var i = 0; i < defaultContent.length; i += 2) {
    defaultContent.slice(i, i + 2).wrapAll('<div class="group-frxp" />');
	}
	/**EO NDF MORE INFO PAGE LAYOUT */

	/**AJAX FOR SINGLE EMAIL QUOTES */
	$(document).on('click', '#request-quotes-single-horizontal', function(e) {
		e.preventDefault();
		var ajaxloader_path = ndf_data_image_loader.ndf_out+'/assets/images/ajax-loader.gif';
		var data_modal = $(this).attr('data-modal');
		var data_title = $(this).attr('data-title');
		var subtitle = $(this).attr('subtitle');
		var form = '';
		form += '<div class="modal-horizontal id-'+data_modal+'">';
			form += '<div class="form-box-single horizontal-form">';
				form += '<div class="close-positon"><a href class="close-horizontal close frxp-modal-close frxp-close frxp-close-alt" id="close-form"></a></div>';
				form += '<div class="get-form-title">'+data_title+'</div>';
				form += '<p class="single-quote-subtitle">'+subtitle+'</p>';
				form += '<form class="quotes-form-content" id="form-horizontal-submit" method="post">';
				form += '<div id="success-email-sent"></div>';
				form += '<input type="hidden" value="'+data_modal+'" id="recipient_id"><br>';
				form += '<input type="text" placeholder="Name*" id="client-name-single" name="client-name" required><br>';
				form += '<div for="client-name" id="name-required-single" style="font-size:10px; text-align:left; margin:auto; display:none; width:80%;">This field is required</div>';
				form += '<input type="email" placeholder="Email*" name="email" id="client-email-single" required><br>';
				form += '<div for="email" id="email-required-single" style="font-size:10px; text-align:left; margin:auto; display:none; width:80%;">Please Enter valid email address</div>';
				form += '<input type="text" placeholder="Phone" id="client-phone-number-single"><br>';
				form += '<textarea class="text-area-form-horizontal" name="client-message" placeholder="Request/Description*" id="message-single" required></textarea><br>';
				form += '<div for="client-message" id="client-message-required-single" style="font-size:10px;  text-align:left; margin:auto; display:none; width:80%;">This field is required</div>';
				form += '<button class="get-quotes" id="horizontal-form-submit" name="request-single-quotes-btn" ><span id="before-submit">Submit</span><span><img src="'+ajaxloader_path+'" style="height:30px; display:none; margin:auto;" id="ajax-sumbit-loader-single"></span></button>'
				// form += '<img src="'+ajaxloader_path+'" style="height:30px; display:none;" id="ajax-sumbit-loader">';
				form += '</form>';
			form += '</div>';
		form += '</div>';
		$("#quotes-modal").html(form);
		});	

	$(document).on('keypress', '#client-phone-number-single', function(evt) {
		var ASCIICode = (evt.which) ? evt.which : evt.keyCode
		if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
			return false;
		return true;
	});	
	$(document).on('click', '#horizontal-form-submit', function(e) {
		e.preventDefault();
		var success_message = 'Thank you we will get back to you soon';
		var url = ndf_data_filter_vars.ndf_ajax;
		var id =  $('#recipient_id').val();
		var name =  $('#client-name-single').val();
		if(name != ''){
			var validated_name = true;
		}
		else{
			$('#name-required-single').css('display','block');
			$('#name-required-single').css('color','red');
		}
		var email =  $('#client-email-single').val();
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if (testEmail.test(email)){
			var validated_email = true;
		}
		else {
			$('#email-required-single').css('display','block');
			$('#email-required-single').css('color','red');
			var validated_email = false;
		}
		var phone =  $('#client-phone-number-single').val();
		var message =  $('#message-single').val();	
		if(message !=''){
			
			var validated_message = true;
		}
		else{
			$('#client-message-required-single').css('display','block');
			$('#client-message-required-single').css('color','red');
		}
		if(validated_name == true && validated_email == true && validated_message == true){

			jQuery.ajax({
				url: url,
				type: "POST",
				cache: false,
				data:{ 
				action: 'send_email', 
				id:id,
				name: name,
				email: email,
				phone:phone,
				message: message
				},
				beforeSend: function(){
					$('#ajax-sumbit-loader-single').css("display", "block");
					$("#before-submit").css('display','none');
				  },
				success:function(res){
					$("#horizontal-form-submit").html("your request has been sent");
					$("#form-horizontal-submit > input[type=text],input[type=email],textarea").val("");
					},
				complete: function(){
					$('#ajax-sumbit-loader-single').css("display", "none");
					  }
				}); 
		}
		else{
			if(validated_name == true){
				$('#name-required-single').css('display','none');
			}
			if(validated_email == true){
				$('#email-required-single').css('display','none');
			}
			if(validated_message == true){
				$('#client-message-required-single').css('display','none');
			}
		}	
	});
	$(document).on('click', '.close-horizontal', function(e) {
		e.preventDefault();
		$(".modal-horizontal").css("display","none");
	});	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	/**AJAX FOR SENDING # RANDOM EMAILS */
	$(document).on('keypress', '#client-phonne-number', function(evt) {
		var ASCIICode = (evt.which) ? evt.which : evt.keyCode
		if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
			return false;
		return true;
	});	
	$(document).on('click', '#request-quotes-btn', function(e) {
		e.preventDefault();
		var url = ndf_data_filter_vars.ndf_ajax;
		var name =  $('#client-name').val();
		var email =  $('#client-email').val();
		var phone =  $('#client-phonne-number').val();
		var request =  $('#request-description').val();
		// var type = $(this).attr("type");
		
		
			if(name != ''){
				var validated_name = true;
			}
			else{
				$('#name-required').css('display','block');
				$('#name-required').css('color','red');
			}
			
			var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (testEmail.test(email)){
				var validated_email = true;
			}
			else {
				$('#email-required').css('display','block');
				$('#email-required').css('color','red');
				var validated_email = false;
			}
			if(request !=''){
				
				var validated_message = true;
			}
			else{
				$('#client-message-required').css('display','block');
				$('#client-message-required').css('color','red');
			}
		
		
		
		if(validated_name == true && validated_email == true && validated_message == true){
			console.log('test');
			jQuery.ajax({
				url: url,
				type: "POST",
				cache: false,
				data:{ 
					action: 'send_random_email', 
					name: name,
					email: email,
					phone:phone,
					request:request
				},
				beforeSend: function(){
					$('#ajax-sumbit-loader').css("display", "block");
					$("#before-send").css('display','none');
				  },
				success:function(res){
						// $("#request-quotes-btn-popup").html("your request has been sent in popup");
						// $("#quotes-form-container").css("display","none");
						$("#quotes-form-content > input[type=text],input[type=email],textarea").val("");
				},
				complete: function(){
					$('#ajax-sumbit-loader').css("display", "none");
					$("#request-quotes-btn").html("your request has been sent");
					  }
			});
		}
		else{
			if(validated_name == true){
				$('#name-required').css('display','none');
				$('#name-required-default').css('display','none');
			}
			if(validated_email == true){
				$('#email-required').css('display','none');
				$('#email-required-default').css('display','none');
			}
			if(validated_message == true){
				('#client-message-required').css('display','none');
				('#client-message-required-default').css('display','none');
			}
		}	
	});	
	/**FOR POPUP BUTTON */
	$(document).on('keypress', '#client-phonne-number-default', function(evt) {
		var ASCIICode = (evt.which) ? evt.which : evt.keyCode
		if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
			return false;
		return true;
	});	
	$(document).on('click', '#request-quotes-btn-default', function(e) {
		e.preventDefault();
		var url = ndf_data_filter_vars.ndf_ajax;
		var name =  $('#client-name-default').val();
		var email =  $('#client-email-default').val();
		var phone =  $('#client-phonne-number-default').val();
		var request =  $('#request-description-default').val();
		
		
		if(name != ''){
			var validated_name = true;
		
		
		}
		else{
			$('#name-required-default').css('display','block');
			$('#name-required-default').css('color','red');
			
		}
		
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if (testEmail.test(email)){
			var validated_email = true;
		
		}
		else {
			$('#email-required-default').css('display','block');
			$('#email-required-default').css('color','red');
			var validated_email = false;
		}
		if(request !=''){
			
			var validated_message = true;
			console.log(request);
		}
		else{
			$('#client-message-required-default').css('display','block');
			$('#client-message-required-default').css('color','red');
		}

		if(validated_name == true && validated_email == true && validated_message == true){
			jQuery.ajax({
				url: url,
				type: "POST",
				cache: false,
				data:{ 
					action: 'send_random_email', 
					name: name,
					email: email,
					phone:phone,
					request:request
				},
				beforeSend: function(){
					$('#ajax-sumbit-loader').css("display", "block");
					$("#before-send").css('display','none');
				  },
				success:function(res){
						// $("#request-quotes-btn-popup").html("your request has been sent in popup");
						// $("#quotes-form-container").css("display","none");
						$("#quotes-form-content-default > input[type=text],input[type=email],textarea").val("");
						$('#client-message-required-default').css('display','none');
						$('#email-required-default').css('display','none');
						$('#name-required-default').css('display','none');
				},
				complete: function(){
					$('#ajax-sumbit-loader').css("display", "none");
					$("#request-quotes-btn-default").html("your request has been sent");
					  }
			});
		}
		else{
			if(validated_name == true){
				$('#name-required-default').css('display','none');
			}
			if(validated_email == true){
				$('#email-required-default').css('display','none');
			}
			if(validated_message == true){
				('#client-message-required-default').css('display','none');
			}
		}	
	});	

    $(".cat-values > .frxp-list > .text > div > ul > .text > div").append("<span id='appended-el'> |</span>");
});