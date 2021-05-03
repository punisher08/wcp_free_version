/** 
 * Outbound Clicks JS scripts
 *
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/assets/js
 * @since 		1.2.1.1
 * @author 		Netseek Pty Ltd
 */
var $ = jQuery.noConflict();

$(document).ready( function($) {
	$(document).on('click', '[data-wcp-track]', function(){
		var wcp_linked_data = $(this).data('wcp-linked-data');
		var wcp_source_tag = $(this).data('wcp-source-tag');
		var go_to_link = $(this).attr("href");
		var action = '';

		if ( $(this).attr('data-wcp-track-enquiry-button') ) {
			go_to_link = $(this).data('wcp-track-href');
			action = 'enquiry-click';
		}
		else if( $(this).attr('data-wcp-track-more-info-button') ){
			go_to_link = $(this).data('wcp-track-href');
			action = 'more-info-click';
		}

		$(this).ndfOutboundClicks( go_to_link, wcp_linked_data, wcp_source_tag, action );
	});

	$.fn.ndfOutboundClicks = function( link, ID, source, button_action ){
		$.ajax({
			type : "post",
			dataType : "json",
			url : ndf_data_filter_vars.ndf_ajax,
			data : {
				action: "ndf_outbound_clicks_call", 
				request_url : link,
				post_id : ID,
				source_tag : source,
				button_action : button_action,
				security : ndf_data_filter_vars.ndf_nonce
			},
			beforeSend: function () {
            },
			success: function(response) {
			}
		});
	};
});