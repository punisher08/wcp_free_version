/** 
 * Admin JS scripts on Adding and Editing of Data CPT
 *
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin/js
 * @since       1.0.1.0
 * @author 		Netseek Pty Ltd
 */
jQuery(document).ready( function($) {
    window.ndf_tmce_getContent = function(editor_id, textarea_id) {
        if ( typeof editor_id == "undefined" ) editor_id = wpActiveEditor;
        if ( typeof textarea_id == "undefined" ) textarea_id = editor_id;

        if ( jQuery("#wp-"+editor_id+"-wrap").hasClass("tmce-active") && tinyMCE.get(editor_id) ) {
            return tinyMCE.get(editor_id).getContent();
        }else{
            return jQuery("#"+textarea_id).val();
        }
    }
    $("#post").validate();

    $( 'body' ).on( 'submit.edit-post', '#post', function () {
        if ( $( "#title" ).val().replace( / /g, '' ).length === 0 ) {
            window.alert( 'A title is required.' );
            $( '#major-publishing-actions .spinner' ).hide();
            $( '#major-publishing-actions' ).find( ':button, :submit, a.submitdelete, #post-preview' ).removeClass( 'disabled' );

            $( "#title" ).focus();

            return false;
        }
    });

    $('.categorychecklist').find('input').each(function(index, input) {
        $(input).bind('change', function() {
            var checkbox = $(this);
            var is_checked = $(checkbox).is(':checked');
            if(is_checked) {
                $(checkbox).parents('li').children('label').children('input').attr('checked', 'checked');
            } else {
                $(checkbox).parentsUntil('ul').find('input').removeAttr('checked');
            }
        });
    });

    /* Data Category Navigation Tabs */
    var navTabs = $( '#data-category-contents-navigation').children( '.nav-tab-wrapper' ),
    tabIndex = null;

    navTabs.children().each(function() {
        $( this ).on( 'click', function( evt ) {

            evt.preventDefault();

            if ( ! $( this ).hasClass( 'nav-tab-active' ) ) {
                /* Unmark the current tab and mark the new one as active */
                $( '.nav-tab-active' ).removeClass( 'nav-tab-active' );
                $( this ).addClass( 'nav-tab-active' );

                tabIndex = $( this ).index();

                /* Hide the old active content */
                $( '#data-category-contents-navigation' )
                .children( 'div:not( .inside.hidden )' )
                .addClass( 'hidden' );

                $( '#data-category-contents-navigation' )
                .children( 'div:nth-child(' + ( tabIndex ) + ')' )
                .addClass( 'hidden' );

                /* And display the new content */
                $( '#data-category-contents-navigation' )
                .children( 'div:nth-child( ' + ( tabIndex + 2 ) + ')' )
                .removeClass( 'hidden' );
            }
        });
    });

    /* Data Settings Navigation Tabs */
    var dataSettings_navTabs = $( '#data-settings-navigation').children( '.nav-tab-wrapper' ),
    tabIndex = null;

    dataSettings_navTabs.children().each(function() {
        $( this ).on( 'click', function( evt ) {

            evt.preventDefault();

            if ( ! $( this ).hasClass( 'nav-tab-active' ) ) {
                /* Unmark the current tab and mark the new one as active */
                $( '.nav-tab-active' ).removeClass( 'nav-tab-active' );
                $( this ).addClass( 'nav-tab-active' );

                tabIndex = $( this ).index();

                /* Hide the old active content */
                $( '#data-settings-navigation' )
                .children( 'div:not( .inside.hidden )' )
                .addClass( 'hidden' );

                $( '#data-settings-navigation' )
                .children( 'div:nth-child(' + ( tabIndex ) + ')' )
                .addClass( 'hidden' );

                /* And display the new content */
                $( '#data-settings-navigation' )
                .children( 'div:nth-child( ' + ( tabIndex + 2 ) + ')' )
                .removeClass( 'hidden' );
            }
        });
    });
});