<?php

if ( !function_exists( 'wcp_fs' ) ) {
    if ( !defined( 'NDF_BASE_DIR' ) ) {
        define( 'NDF_BASE_DIR', dirname( __FILE__ ) );
    }
    if ( !defined( 'NDF_BASE_URL' ) ) {
        define( 'NDF_BASE_URL', plugins_url( '', NDF_BASE_DIR . '/wordpress-comparison-plugin.php' ) );
    }
    if ( !defined( 'NDF_PLUGIN_BASENAME' ) ) {
        define( 'NDF_PLUGIN_BASENAME', plugin_basename( NDF_BASE_DIR . '/wordpress-comparison-plugin.php' ) );
    }
    if ( !defined( 'NDF_PLUGIN_VERSION' ) ) {
        define( 'NDF_PLUGIN_VERSION', '' );
    }
    /**
     * Create a helper function for easy SDK access.
     * 
     * @since 1.8.2.0
     */
    function wcp_fs()
    {
        global  $wcp_fs ;
        
        if ( !isset( $wcp_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $wcp_fs = fs_dynamic_init( array(
                'id'               => '2211',
                'slug'             => 'wordpress-comparison-plugin',
                'type'             => 'plugin',
                'public_key'       => 'pk_3ef938903638f2e11ed8a09e5ba2a',
                'is_premium'       => false,
                'has_addons'       => false,
                'has_paid_plans'   => true,
                'is_org_compliant' => false,
                'menu'             => array(
                'slug'    => 'wcp-settings',
                'support' => false,
            ),
                'is_live'          => true,
            ) );
        }
        
        return $wcp_fs;
    }
    // Init Freemius.
    wcp_fs();
    // Signal that SDK was initiated.
    do_action( 'wcp_fs_loaded' );
    /*
     * Enqueue Scripts and Styles.
     */
    require_once NDF_BASE_DIR . '/includes/ndf-script-enqueue.php';
    /* 
     * Useful functions or snippets used in the plugin.
     */
    require_once NDF_BASE_DIR . '/includes/ndf-utility-functions.php';
    /*
     * More Info fields generator.
     */
    require_once NDF_BASE_DIR . '/includes/class-field-generator.php';
    /* 
     * Registers Custom Post Type and Taxonomies.
     */
    require_once NDF_BASE_DIR . '/includes/ndf-data-registration.php';
    /*
     * Shortcode Registration Scripts.
     */
    require_once NDF_BASE_DIR . '/includes/ndf-shortcode.php';
    /*
     * Processes the AJAX requests.
     */
    require_once NDF_BASE_DIR . '/includes/ndf-data-request.php';
    /*
     * Registers admin Menu and Submenu.
     */
    require_once NDF_BASE_DIR . '/includes/ndf-menu-registration.php';
    /*
     * Registers Data Meta Boxes.
     */
    require_once NDF_BASE_DIR . '/includes/ndf-data-meta-box.php';
    /*
     * Registers Category Terms Meta Boxes.
     */
    require_once NDF_BASE_DIR . '/includes/ndf-term-meta.php';
    /*
     * Rating Rank.
     */
    require_once NDF_BASE_DIR . '/includes/class-rating-rank.php';
    require_once NDF_BASE_DIR . '/includes/class-mrp-rating-rank.php';
    /**
     * Hide Category submenu and category meta box if Show filter category is unchecked.
     * 
     * @since 1.0.1.0
     */
    function ndf_remove_tax_submenu()
    {
        add_action( 'current_screen', 'ndf_count_all_outbound_clicks' );
        
        if ( get_option( 'ndf_category_1_filter_show', 1 ) != 1 ) {
            remove_submenu_page( 'edit.php?post_type=ndf_data', 'edit-tags.php?taxonomy=ndf_category_1&amp;post_type=ndf_data' );
            remove_meta_box( 'ndf_category_1div', 'ndf_data', 'side' );
        }
        
        
        if ( get_option( 'ndf_category_2_filter_show', 1 ) != 1 ) {
            remove_submenu_page( 'edit.php?post_type=ndf_data', 'edit-tags.php?taxonomy=ndf_category_2&amp;post_type=ndf_data' );
            remove_meta_box( 'ndf_category_2div', 'ndf_data', 'side' );
        }
        
        
        if ( get_option( 'ndf_category_3_filter_show', 1 ) != 1 ) {
            remove_submenu_page( 'edit.php?post_type=ndf_data', 'edit-tags.php?taxonomy=ndf_category_3&amp;post_type=ndf_data' );
            remove_meta_box( 'ndf_category_3div', 'ndf_data', 'side' );
        }
        
        
        if ( get_option( 'ndf_category_4_filter_show', 1 ) != 1 ) {
            remove_submenu_page( 'edit.php?post_type=ndf_data', 'edit-tags.php?taxonomy=ndf_category_4&amp;post_type=ndf_data' );
            remove_meta_box( 'ndf_category_4div', 'ndf_data', 'side' );
        }
        
        
        if ( get_option( 'ndf_category_5_filter_show', 1 ) != 1 ) {
            remove_submenu_page( 'edit.php?post_type=ndf_data', 'edit-tags.php?taxonomy=ndf_category_5&amp;post_type=ndf_data' );
            remove_meta_box( 'ndf_category_5div', 'ndf_data', 'side' );
        }
        
        if ( get_role( 'wcp_data_role' ) ) {
            remove_role( 'wcp_data_role' );
        }
        /* Add WCP Data Editor role */
        $ndf_custom_capabilities = array(
            'edit_ndf_data'              => true,
            'read_ndf_data'              => true,
            'delete_ndf_data'            => true,
            'edit_ndf_datas'             => true,
            'edit_others_ndf_datas'      => true,
            'publish_ndf_datas'          => true,
            'read_private_ndf_datas'     => true,
            'delete_ndf_datas'           => true,
            'delete_private_ndf_datas'   => true,
            'delete_published_ndf_datas' => true,
            'delete_others_ndf_datas'    => true,
            'edit_private_ndf_datas'     => true,
            'edit_published_ndf_datas'   => true,
            'read'                       => true,
            'ndf_comparison_admin'       => true,
            'manage_ndf_category'        => true,
            'edit_ndf_category'          => true,
            'delete_ndf_category'        => true,
            'assign_ndf_category'        => true,
        );
        if ( get_role( 'wcp_data_role' ) === NULL ) {
            add_role( 'wcp_data_role', 'WCP Data Editor', $ndf_custom_capabilities );
        }
    }
    
    add_action( 'admin_init', 'ndf_remove_tax_submenu', 9 );
    /**
     * Hide Category content meta box if Show filter category is unchecked.
     * 
     * @since 1.0.1.0
     */
    function ndf_remove_plugin_metaboxes()
    {
        if ( get_option( 'ndf_category_1_filter_show', 1 ) != 1 && get_option( 'ndf_category_2_filter_show', 1 ) != 1 && get_option( 'ndf_category_3_filter_show', 1 ) != 1 && get_option( 'ndf_category_4_filter_show', 1 ) != 1 && get_option( 'ndf_category_5_filter_show', 1 ) != 1 ) {
            remove_meta_box( 'ndf_data_category-data-category-contents', 'ndf_data', 'default' );
        }
    }
    
    add_action( 'do_meta_boxes', 'ndf_remove_plugin_metaboxes' );
    /**
     * Enable font size & font family selects in the editor.
     * 
     * @since 1.0.1.0
     */
    function ndf_mce_buttons( $buttons )
    {
        array_unshift( $buttons, 'fontsizeselect' );
        /* Add Font Size Select */
        return $buttons;
    }
    
    add_filter( 'mce_buttons_2', 'ndf_mce_buttons' );
    /**
     * Customize mce editor font sizes.
     * 
     * @since 1.0.1.0
     */
    function ndf_mce_text_sizes( $initArray )
    {
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
        return $initArray;
    }
    
    add_filter( 'tiny_mce_before_init', 'ndf_mce_text_sizes' );
    /**
     * Retain Parent-Child term hierarchy in post edit screen.
     * 
     * @since 1.0.1.0
     */
    function ndf_wp_terms_checklist_args( $args, $post_id )
    {
        $args['checked_ontop'] = false;
        return $args;
    }
    
    add_filter(
        'wp_terms_checklist_args',
        'ndf_wp_terms_checklist_args',
        1,
        2
    );
    /**
     * Append Shortcode to content in data item view.
     * 
     * @since 1.0.1.0
     */
    function ndf_add_shortcode_to_content( $content )
    {
        $output = '';
        $output .= $content;
        if ( get_post_type() == 'ndf_data' ) {
            $output .= do_shortcode( '[wp_comparison_more_info id=' . get_the_ID() . ']' );
        }
        return $output;
    }
    
    add_filter( 'the_content', 'ndf_add_shortcode_to_content' );
    /**
     * Plugin install hook that creates the Data Filtering More Info Fields table.
     * 
     * @since 1.0.1.0
     */
    function ndf_install()
    {
        global  $wpdb ;
        $ndf_table_name = $wpdb->prefix . 'ndf_data_filtering_saved_fields';
        $wp_charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS {$ndf_table_name} (\r\n\t\t`ID` bigint(20) NOT NULL AUTO_INCREMENT,\r\n\t\t`field_type` varchar(200) DEFAULT NULL,\r\n\t\t`label` varchar(200) DEFAULT NULL,\r\n\t\t`field_order` int(9) NOT NULL DEFAULT '0',\r\n\t\t`hidden` int(1) NOT NULL DEFAULT '0',\r\n\t\t`required` int(1) NOT NULL DEFAULT '0',\r\n\t\t`field_values` text,\r\n\t\t`default_value` text,\r\n\t\tPRIMARY KEY (`ID`)\r\n\t) {$wp_charset_collate};";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );

        // For Request Quotes Entries
        $request_form_quote_entries = $wpdb->prefix .'request_quotes_entries';
        $wp_charset_collate = $wpdb->get_charset_collate();
        $create_table_query = "
            CREATE TABLE IF NOT EXISTS `{$request_form_quote_entries}` (
                `ID` INT AUTO_INCREMENT PRIMARY KEY,
                `subject_title` VARCHAR(255) NOT NULL,
                `sender` VARCHAR(255) NOT NULL,
                `sent_to` VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            dbDelta( $create_table_query );
        //End For Request Quotes Table 

        $ndf_button_style_configuration = array(
            1 => array(
            'label'            => 'Style 1',
            'background'       => '#09263d',
            'background_hover' => '#114575',
            'text_color'       => '#cedbff',
            'text_color_hover' => '#ffffff',
            'border_radius'    => '4',
            'border_width'     => '1',
            'border_color'     => '#09263d',
            'font_size'        => '10px',
            'padding_top'      => '3',
            'padding_bottom'   => '3',
            'padding_left'     => '40',
            'padding_right'    => '40',
        ),
            2 => array(
            'label'            => 'Style 2',
            'background'       => '#750303',
            'background_hover' => '#ffffff',
            'text_color'       => '#ffffff',
            'text_color_hover' => '#750303',
            'border_radius'    => '10',
            'border_width'     => '1',
            'border_color'     => '#750303',
            'font_size'        => '12px',
            'padding_top'      => '6',
            'padding_bottom'   => '6',
            'padding_left'     => '20',
            'padding_right'    => '20',
        ),
            3 => array(
            'label'            => 'Style 3',
            'background'       => '#212121',
            'background_hover' => '#262626',
            'text_color'       => '#ffffff',
            'text_color_hover' => '#ffffff',
            'border_radius'    => '4',
            'border_width'     => '1',
            'border_color'     => '#262626',
            'font_size'        => '14px',
            'padding_top'      => '4',
            'padding_bottom'   => '4',
            'padding_left'     => '30',
            'padding_right'    => '30',
        ),
            4 => array(
            'label'            => 'Style 4',
            'background'       => '#04436b',
            'background_hover' => '#04436b',
            'text_color'       => '#ffffff',
            'text_color_hover' => '#eaeaea',
            'border_radius'    => '8',
            'border_width'     => '1',
            'border_color'     => '#04436b',
            'font_size'        => '16px',
            'padding_top'      => '6',
            'padding_bottom'   => '6',
            'padding_left'     => '20',
            'padding_right'    => '20',
        ),
            5 => array(
            'label'            => 'Style 5',
            'background'       => '#d3d3d3',
            'background_hover' => '#c4c4c4',
            'text_color'       => '#2d2d2d',
            'text_color_hover' => '#2d2d2d',
            'border_radius'    => '4',
            'border_width'     => '1',
            'border_color'     => '#1c1c1c',
            'font_size'        => '18px',
            'padding_top'      => '6',
            'padding_bottom'   => '6',
            'padding_left'     => '30',
            'padding_right'    => '30',
        ),
        );
        add_option( 'ndf_button_style_configuration', $ndf_button_style_configuration );
        $ndf_custom_capabilities = array(
            'edit_ndf_data'              => true,
            'read_ndf_data'              => true,
            'delete_ndf_data'            => true,
            'edit_ndf_datas'             => true,
            'edit_others_ndf_datas'      => true,
            'publish_ndf_datas'          => true,
            'read_private_ndf_datas'     => true,
            'delete_ndf_datas'           => true,
            'delete_private_ndf_datas'   => true,
            'delete_published_ndf_datas' => true,
            'delete_others_ndf_datas'    => true,
            'edit_private_ndf_datas'     => true,
            'edit_published_ndf_datas'   => true,
            'read'                       => true,
            'ndf_comparison_admin'       => true,
            'manage_ndf_category'        => true,
            'edit_ndf_category'          => true,
            'delete_ndf_category'        => true,
            'assign_ndf_category'        => true,
        );
        if ( get_role( 'ndf_admin_role' ) ) {
            remove_role( 'ndf_admin_role' );
        }
        add_role( 'ndf_admin_role', 'NDF Admin', $ndf_custom_capabilities );
        $users = get_users( 'role=administrator' );
        foreach ( $users as $user ) {
            if ( !empty($user) && $user ) {
                if ( in_array( 'administrator', $user->roles ) ) {
                    $user->add_role( 'ndf_admin_role' );
                }
            }
        }
        /* Add WCP Data Editor role */
        $ndf_custom_capabilities = array(
            'edit_ndf_data'              => true,
            'read_ndf_data'              => true,
            'delete_ndf_data'            => true,
            'edit_ndf_datas'             => true,
            'edit_others_ndf_datas'      => true,
            'publish_ndf_datas'          => true,
            'read_private_ndf_datas'     => true,
            'delete_ndf_datas'           => true,
            'delete_private_ndf_datas'   => true,
            'delete_published_ndf_datas' => true,
            'delete_others_ndf_datas'    => true,
            'edit_private_ndf_datas'     => true,
            'edit_published_ndf_datas'   => true,
            'read'                       => true,
            'ndf_comparison_admin'       => true,
            'manage_ndf_category'        => true,
            'edit_ndf_category'          => true,
            'delete_ndf_category'        => true,
            'assign_ndf_category'        => true,
            'upload_files'               => true,
            'edit_attachments'           => true,
            'delete_attachments'         => true,
        );
        if ( get_role( 'wcp_data_role' ) ) {
            remove_role( 'wcp_data_role' );
        }
        if ( get_role( 'wcp_data_role' ) === NULL ) {
            add_role( 'wcp_data_role', 'WCP Data Editor', $ndf_custom_capabilities );
        }
        $labels_outbound_source = array(
            'name'                       => "Source Tag",
            'singular_name'              => "Source Tag",
            'menu_name'                  => "Source Tag",
            'all_items'                  => 'All Items',
            'parent_item'                => 'Parent Item',
            'parent_item_colon'          => 'Parent Item:',
            'new_item_name'              => 'New Item Name',
            'add_new_item'               => 'Add New Item',
            'edit_item'                  => 'Edit Item',
            'update_item'                => 'Update Item',
            'view_item'                  => 'View Item',
            'separate_items_with_commas' => 'Separate items with commas',
            'add_or_remove_items'        => 'Add or remove items',
            'choose_from_most_used'      => 'Choose from the most used',
            'popular_items'              => 'Popular Items',
            'search_items'               => 'Search Items',
            'not_found'                  => 'Not Found',
            'no_terms'                   => 'No items',
            'items_list'                 => 'Items list',
            'items_list_navigation'      => 'Items list navigation',
        );
        $rewrite_outbound_source = array(
            'slug'         => 'wcp-outbound-source',
            'with_front'   => true,
            'hierarchical' => false,
        );
        $args_outbound_source = array(
            'labels'            => $labels_outbound_source,
            'hierarchical'      => true,
            'public'            => false,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud'     => false,
            'rewrite'           => $rewrite_outbound_source,
            'capabilities'      => array(
            'manage_categories' => 'manage_ndf_category',
            'manage_terms'      => 'manage_ndf_category',
            'edit_terms'        => 'manage_ndf_category',
            'delete_terms'      => 'manage_ndf_category',
            'assign_terms'      => 'edit_posts',
        ),
        );
        register_taxonomy( 'wcp_outbound_source', array( 'wcp_outbound_clicks' ), $args_outbound_source );
        $wcp_default_source_tags = array();
        $check_enquiry_button_click = term_exists( 'Enquiry Button Click', 'wcp_outbound_source' );
        
        if ( $check_enquiry_button_click == 0 || $check_enquiry_button_click == null ) {
            $term_info = wp_insert_term( 'Enquiry Button Click', 'wcp_outbound_source', array(
                'slug' => 'wcp-enquiry-button-click',
            ) );
            if ( is_array( $term_info ) ) {
                $wcp_default_source_tags['enquiry_button_click'] = $term_info['term_id'];
            }
        } else {
            if ( is_array( $check_enquiry_button_click ) && array_key_exists( 'term_id', $check_enquiry_button_click ) ) {
                $wcp_default_source_tags['enquiry_button_click'] = $check_enquiry_button_click['term_id'];
            }
        }
        
        $check_enquiry_form_submit = term_exists( 'Enquiry Form Submit', 'wcp_outbound_source' );
        
        if ( $check_enquiry_form_submit == 0 || $check_enquiry_form_submit == null ) {
            $term_info = wp_insert_term( 'Enquiry Form Submit', 'wcp_outbound_source', array(
                'slug' => 'wcp-enquiry-form-submit',
            ) );
            if ( is_array( $term_info ) ) {
                $wcp_default_source_tags['enquiry_form_submit'] = $term_info['term_id'];
            }
        } else {
            $wcp_default_source_tags['enquiry_form_submit'] = $check_enquiry_form_submit['term_id'];
        }
        
        $check_more_info_button_click = term_exists( 'More Info Button Click', 'wcp_outbound_source' );
        
        if ( $check_more_info_button_click == 0 || $check_more_info_button_click == null ) {
            $term_info = wp_insert_term( 'More Info Button Click', 'wcp_outbound_source', array(
                'slug' => 'wcp-more-info-button-click',
            ) );
            if ( is_array( $term_info ) ) {
                $wcp_default_source_tags['more_info_button_click'] = $term_info['term_id'];
            }
        } else {
            $wcp_default_source_tags['more_info_button_click'] = $check_more_info_button_click['term_id'];
        }
        
        update_option( 'wcp_default_source_tags', $wcp_default_source_tags );
    }
    
    register_activation_hook( NDF_BASE_DIR . '/wordpress-comparison-plugin.php', 'ndf_install' );
    /**
     * Plugin admin notice hook.
     * 
     * @since 1.1.2.0
     */
    function ndf_admin_license_notices()
    {
        $get_current_user_id = get_current_user_id();
        /* More Info Fields Notice */
        
        if ( $notices = get_option( 'ndf_data_result_more_info_fields_notices_' . $get_current_user_id ) ) {
            echo  "<div class='" . $notices[0] . "'>" . $notices[1] . "</div>" ;
            delete_option( 'ndf_data_result_more_info_fields_notices_' . $get_current_user_id );
        }
    
    }
    
    add_action( 'admin_notices', 'ndf_admin_license_notices' );
    /**
     * Plugin Data Results | Add Info fields hook.
     * 
     * @since 1.1.2.1
     */
    function ndf_data_results_more_info_fields_add()
    {
        if ( !isset( $_POST['ndf_more_info_add_field_nonce'] ) || !wp_verify_nonce( $_POST['ndf_more_info_add_field_nonce'], '_ndf_more_info_add_field_nonce' ) ) {
            wp_redirect( admin_url( 'admin.php?page=wcp-data-results-settings&tab=more-info-fields&error' ) );
        }
        $ndf_field = $_POST['ndf_field'];
        $ndf_add_to_column = $_POST['ndf_add_to_column'];
        $message = '';
        $type = '';
        $get_current_user_id = get_current_user_id();
        $ndf_data_results_table_more_fields_old = get_option( 'ndf_data_results_table_more_fields', array() );
        $count_options = 1;
        if ( !empty($ndf_data_results_table_more_fields_old) ) {
            $count_options = max( array_keys( $ndf_data_results_table_more_fields_old ) ) + 1;
        }
        $ndf_data_results_table_more_fields_old[$count_options] = array(
            'field_ID' => (int) $ndf_field,
            'column'   => $ndf_add_to_column,
        );
        
        if ( update_option( 'ndf_data_results_table_more_fields', (array) $ndf_data_results_table_more_fields_old ) !== false ) {
            $message = '<p>More Info Fields succesfully updated.</p>';
            $type = 'notice notice-success is-dismissible wcp-notices';
        } else {
            $message = '<p>Updating more info fields failed. Please contact the <a href="http://www.netseek.com.au/">plugin developer</a>.</p>';
            $type = 'notice notice-error is-dismissible wcp-notices';
        }
        
        update_option( 'ndf_data_result_more_info_fields_notices_' . $get_current_user_id, array( $type, $message ) );
        wp_redirect( admin_url( 'admin.php?page=wcp-data-results-settings&tab=more-info-fields' ) );
    }
    
    add_action( 'admin_post_ndf_data_results_more_info_fields_add', 'ndf_data_results_more_info_fields_add' );
    /**
     * Plugin Data Results | Update More Info fields hook.
     * 
     * @since 1.1.2.1
     */
    function ndf_data_results_more_info_fields_update()
    {
        if ( !isset( $_POST['ndf_more_info_fields_nonce'] ) || !wp_verify_nonce( $_POST['ndf_more_info_fields_nonce'], '_ndf_more_info_fields_nonce' ) ) {
            wp_redirect( admin_url( 'admin.php?page=wcp-data-results-settings&tab=more-info-fields&error' ) );
        }
        $fields = $_POST['field'];
        $remove_fields = array();
        if ( isset( $_POST['ndf_remove_field'] ) ) {
            $remove_fields = (array) $_POST['ndf_remove_field'];
        }
        $ndf_data_results_table_more_fields = array();
        $counter = 1;
        $message = '';
        $type = '';
        $get_current_user_id = get_current_user_id();
        foreach ( $fields as $field_ID => $value ) {
            $column = $value['ndf_add_to_column'];
            if ( !in_array( $field_ID, $remove_fields ) ) {
                $ndf_data_results_table_more_fields[$counter] = array(
                    'field_ID' => $field_ID,
                    'column'   => $column,
                );
            }
            $counter++;
        }
        
        if ( update_option( 'ndf_data_results_table_more_fields', (array) $ndf_data_results_table_more_fields ) !== false ) {
            $message = '<p>More Info Fields succesfully updated.</p>';
            $type = 'notice notice-success is-dismissible wcp-notices';
        } else {
            $message = '<p>Updating more info fields failed. Please contact the <a href="http://www.netseek.com.au/">plugin developer</a>.</p>';
            $type = 'notice notice-error is-dismissible wcp-notices';
        }
        
        update_option( 'ndf_data_result_more_info_fields_notices_' . $get_current_user_id, array( $type, $message ) );
        wp_redirect( admin_url( 'admin.php?page=wcp-data-results-settings&tab=more-info-fields' ) );
    }
    
    add_action( 'admin_post_ndf_data_results_more_info_fields_update', 'ndf_data_results_more_info_fields_update' );
    /**
     * Update WCP Enquiry Entries table header columns.
     * 
     * @since 1.2.2.0
     */
    function ndf_enquiry_entries_columns_head( $defaults )
    {
        $defaults['from_name'] = 'From Name';
        $defaults['data_title'] = 'WCP Data Title';
        $defaults['email_status'] = 'Email Status';
        $defaults['date_sent'] = 'Date';
        return $defaults;
    }
    
    add_filter( 'manage_wcp_enquiry_entries_posts_columns', 'ndf_enquiry_entries_columns_head' );
    /**
     * Update WCP Enquiry Entries table columns values.
     * 
     * @since 1.2.2.0
     */
    function ndf_enquiry_entries_columns_content( $column_name, $post_ID )
    {
        
        if ( $column_name == 'from_name' ) {
            echo  get_post_meta( $post_ID, 'ndf_enquiry_details_name', true ) ;
            echo  '<br>' ;
            echo  get_post_meta( $post_ID, 'ndf_enquiry_details_email', true ) ;
        }
        
        
        if ( $column_name == 'data_title' ) {
            $ndf_enquiry_to_id = get_post_meta( $post_ID, 'ndf_enquiry_to_id', true );
            $ndf_post_title = 'WCP Data ID ' . $ndf_enquiry_to_id;
            if ( empty($ndf_enquiry_to_id) ) {
                $ndf_post_title = '<em>n/a</em>';
            }
            $ndf_get_post_title = get_post( $ndf_enquiry_to_id );
            if ( $ndf_get_post_title ) {
                if ( $ndf_get_post_title->post_type == 'ndf_data' ) {
                    $ndf_post_title = $ndf_get_post_title->post_title;
                }
            }
            echo  $ndf_post_title ;
        }
        
        if ( $column_name == 'email_status' ) {
            echo  ucfirst( get_post_meta( $post_ID, 'ndf_enquiry_details_email_status', true ) ) ;
        }
        if ( $column_name == 'date_sent' ) {
            echo  get_the_date( 'F j, Y H:i', $post_ID ) ;
        }
    }
    
    add_action(
        'manage_wcp_enquiry_entries_posts_custom_column',
        'ndf_enquiry_entries_columns_content',
        10,
        2
    );
    /**
     * Remove Date and Title columns in WCP Enquiry Entries table.
     * 
     * @since 1.2.2.0
     */
    function ndf_enquiry_entries_remove_column( $defaults )
    {
        unset( $defaults['title'] );
        unset( $defaults['date'] );
        return $defaults;
    }
    
    add_filter( 'manage_wcp_enquiry_entries_posts_columns', 'ndf_enquiry_entries_remove_column' );
    /**
     * Update WCP Enquiry Entries table header columns.
     * 
     * @since 1.2.2.0
     */
    function ndf_change_entries_sortable_columns( $columns )
    {
        $columns['from_name'] = 'From Name';
        $columns['data_title'] = 'WCP Data Title';
        $columns['date_sent'] = 'Date';
        return $columns;
    }
    
    add_filter( 'manage_edit-wcp_enquiry_entries_sortable_columns', 'ndf_change_entries_sortable_columns' );
    /**
     * WCP Data Filter on WCP Enquiry Entries list.
     * 
     * @since 1.2.2.0
     */
    function ndf_filter_manage_entries()
    {
        global  $typenow, $post, $post_id ;
        
        if ( $typenow == "wcp_enquiry_entries" ) {
            global  $wpdb ;
            $data_IDs = $wpdb->get_col( "\r\n\t        SELECT DISTINCT meta_value\r\n\t        FROM " . $wpdb->postmeta . "\r\n\t        WHERE meta_key = 'ndf_enquiry_to_id'\r\n\t        ORDER BY meta_value\r\n\t    " );
            
            if ( !empty($data_IDs) ) {
                $select_output = '';
                $selected_data_entry = ( isset( $_GET['ndf_data_restrict_entries'] ) ? $_GET['ndf_data_restrict_entries'] : '' );
                foreach ( $data_IDs as $data_ID ) {
                    $title = get_the_title( $data_ID );
                    if ( empty($title) ) {
                        $title = 'WCP Data ID ' . $data_ID;
                    }
                    wp_reset_postdata();
                    $select_output .= '<option value="' . esc_attr( $data_ID ) . '" ' . selected( $selected_data_entry, $data_ID, false ) . '>' . $title . '</option>';
                }
                if ( !empty($select_output) ) {
                    echo  ' <select name="ndf_data_restrict_entries" id="ndf_data_restrict_entries"><option value="">Show all WCP Data</option>' . $select_output . '</select>' ;
                }
            }
        
        }
    
    }
    
    add_action( 'restrict_manage_posts', 'ndf_filter_manage_entries' );
    /**
     * Date Range filter on WCP Enquiry Entries list.
     * 
     * @since 1.2.2.0
     */
    function ndf_date_filter_manage_entries()
    {
        global  $typenow, $post, $post_id ;
        
        if ( $typenow == "wcp_enquiry_entries" ) {
            $from = ( isset( $_GET['wcp_enquiry_entries_date_start'] ) && $_GET['wcp_enquiry_entries_date_start'] ? $_GET['wcp_enquiry_entries_date_start'] : '' );
            $to = ( isset( $_GET['wcp_enquiry_entries_date_end'] ) && $_GET['wcp_enquiry_entries_date_end'] ? $_GET['wcp_enquiry_entries_date_end'] : '' );
            echo  '<input type="text" name="wcp_enquiry_entries_date_start" placeholder="Date From" value="' . $from . '" />
		<input type="text" name="wcp_enquiry_entries_date_end" placeholder="Date To" value="' . $to . '" />' ;
        }
    
    }
    
    add_action( 'restrict_manage_posts', 'ndf_date_filter_manage_entries' );
    /**
     * WCP Enquiry Entries filtering query.
     * 
     * @since 1.2.2.0
     */
    function ndf_enquiry_entries_posts_where( $where )
    {
        
        if ( is_admin() ) {
            global  $wpdb ;
            /* WCP Data Filter on Enquiry Entries list */
            
            if ( isset( $_GET['ndf_data_restrict_entries'] ) && !empty($_GET['ndf_data_restrict_entries']) && intval( $_GET['ndf_data_restrict_entries'] ) != 0 ) {
                $ndf_data_restrict_entries = intval( $_GET['ndf_data_restrict_entries'] );
                $where .= " AND ID IN (SELECT post_id FROM " . $wpdb->postmeta . " WHERE meta_key='ndf_enquiry_to_id' AND meta_value={$ndf_data_restrict_entries} )";
            }
            
            /* Date Range filter on Enquiry Entries list */
            
            if ( isset( $_GET['wcp_enquiry_entries_date_start'] ) && !empty($_GET['wcp_enquiry_entries_date_start']) || isset( $_GET['wcp_enquiry_entries_date_end'] ) && !empty($_GET['wcp_enquiry_entries_date_end']) ) {
                $wcp_enquiry_entries_date_start = $_GET['wcp_enquiry_entries_date_start'];
                $wcp_enquiry_entries_date_end = $_GET['wcp_enquiry_entries_date_end'];
                if ( empty($wcp_enquiry_entries_date_start) && !empty($wcp_enquiry_entries_date_end) ) {
                    $wcp_enquiry_entries_date_start = $wcp_enquiry_entries_date_end;
                }
                if ( empty($wcp_enquiry_entries_date_end) && !empty($wcp_enquiry_entries_date_start) ) {
                    $wcp_enquiry_entries_date_end = $wcp_enquiry_entries_date_start;
                }
                $where .= " AND ID IN (SELECT ID FROM " . $wpdb->posts . " WHERE DATE_FORMAT(`post_date`, '%Y-%m-%d') BETWEEN '{$wcp_enquiry_entries_date_start}' AND '{$wcp_enquiry_entries_date_end}' )";
            }
        
        }
        
        return $where;
    }
    
    add_filter( 'posts_where', 'ndf_enquiry_entries_posts_where' );
    /**
     * Remove the default Date field in the WCP Outbound Clicks and WCP Enquiry Entries.
     * 
     * @since 1.2.2.0
     */
    function ndf_remove_date_drop()
    {
        $screen = get_current_screen();
        if ( 'wcp_enquiry_entries' == $screen->post_type || 'wcp_outbound_clicks' == $screen->post_type ) {
            add_filter( 'months_dropdown_results', '__return_empty_array' );
        }
    }
    
    add_action( 'admin_head', 'ndf_remove_date_drop' );
    /**
     * Update WCP Outbound clicks table header columns.
     * 
     * @since 1.2.2.0
     */
    function ndf_outbound_clicks_columns_head( $defaults )
    {
        $defaults['wcp_url'] = 'Events';
        $defaults['wcp_data_ID'] = 'WCP Data Title';
        $defaults['count'] = 'Total Events';
        $defaults['percent_total_events'] = '% Total Events';
        $defaults['timestamp'] = 'Timestamp';
        $new = array();
        $tags = $defaults['taxonomy-wcp_outbound_source'];
        unset( $defaults['taxonomy-wcp_outbound_source'] );
        foreach ( $defaults as $key => $value ) {
            $new[$key] = $value;
            if ( $key == 'wcp_url' ) {
                $new['taxonomy-wcp_outbound_source'] = $tags;
            }
        }
        return $new;
    }
    
    add_filter( 'manage_wcp_outbound_clicks_posts_columns', 'ndf_outbound_clicks_columns_head' );
    /**
     * Update WCP Outbound clicks table columns values.
     * 
     * @since 1.2.2.0
     */
    function ndf_outbound_clicks_columns_content( $column_name, $post_ID )
    {
        if ( $column_name == 'wcp_url' ) {
            echo  get_post_meta( $post_ID, 'wcp_url', true ) ;
        }
        
        if ( $column_name == 'wcp_data_ID' ) {
            $wcp_data_ID = get_post_meta( $post_ID, 'wcp_data_ID', true );
            $ndf_post_title = 'WCP Data ID ' . $wcp_data_ID;
            if ( empty($wcp_data_ID) ) {
                $ndf_post_title = '<em>n/a</em>';
            }
            $ndf_get_post_title = get_post( $wcp_data_ID );
            if ( $ndf_get_post_title ) {
                if ( $ndf_get_post_title->post_type == 'ndf_data' ) {
                    $ndf_post_title = $ndf_get_post_title->post_title;
                }
            }
            echo  $ndf_post_title ;
        }
        
        if ( $column_name == 'count' ) {
            echo  count( get_post_meta( $post_ID, 'wcp_timestamp', true ) ) ;
        }
        
        if ( $column_name == 'percent_total_events' ) {
            $post_count = count( get_post_meta( $post_ID, 'wcp_timestamp', true ) );
            $all_count = $GLOBALS['wcp_outbound_clicks_count'];
            echo  number_format( $post_count / $all_count * 100, 2 ) ;
            echo  '%' ;
        }
        
        if ( $column_name == 'timestamp' ) {
            echo  get_the_modified_date( 'd-m-Y H:i', $post_ID ) ;
        }
    }
    
    add_action(
        'manage_wcp_outbound_clicks_posts_custom_column',
        'ndf_outbound_clicks_columns_content',
        10,
        2
    );
    /**
     * Remove Date and Title columns in WCP Outbound clicks table.
     * 
     * @since 1.2.2.0
     */
    function ndf_outbound_clicks_remove_column( $defaults )
    {
        unset( $defaults['date'] );
        unset( $defaults['title'] );
        return $defaults;
    }
    
    add_filter( 'manage_wcp_outbound_clicks_posts_columns', 'ndf_outbound_clicks_remove_column' );
    /**
     * Remove the Quick Edit link.
     * 
     * @since 1.2.2.0
     */
    function ndf_disable_quick_edit( $actions = array(), $post = null )
    {
        if ( !is_post_type_archive( 'wcp_outbound_clicks' ) && !is_post_type_archive( 'wcp_enquiry_entries' ) ) {
            return $actions;
        }
        if ( isset( $actions['inline hide-if-no-js'] ) ) {
            unset( $actions['inline hide-if-no-js'] );
        }
        if ( isset( $actions['view'] ) ) {
            unset( $actions['view'] );
        }
        return $actions;
    }
    
    add_filter(
        'post_row_actions',
        'ndf_disable_quick_edit',
        10,
        2
    );
    add_filter(
        'page_row_actions',
        'ndf_disable_quick_edit',
        10,
        2
    );
    /**
     * Change Outbound Clicks table header order.
     * 
     * @since 1.2.2.0
     */
    function ndf_change_sortable_columns( $columns )
    {
        $columns['wcp_data_ID'] = 'WCP Data Title';
        $columns['count'] = 'Total Events';
        $columns['timestamp'] = 'Timestamp	';
        return $columns;
    }
    
    add_filter( 'manage_edit-wcp_outbound_clicks_sortable_columns', 'ndf_change_sortable_columns' );
    /**
     * WCP Data Filter on Enquiry Entries list.
     * 
     * @since 1.2.2.0
     */
    function ndf_data_title_filter_manage_entries()
    {
        global  $typenow, $post, $post_id ;
        
        if ( $typenow == "wcp_outbound_clicks" ) {
            echo  '<label style="float:left;padding: 6px 20px 4px 0px; font-weight: bold;">OVERALL EVENTS</label><label style="float:left;padding: 6px 40px 4px 0px; font-weight: bold;">' . $GLOBALS['wcp_outbound_clicks_count'] . '</label>' ;
            global  $wpdb ;
            $source_tag_args = array(
                'taxonomy'     => 'wcp_outbound_source',
                'hierarchical' => 1,
                'title_li'     => '',
                'hide_empty'   => 0,
                'orderby'      => 'id',
                'order'        => 'ASC',
            );
            $terms = get_categories( $source_tag_args );
            
            if ( !empty($terms) ) {
                $selected_source_tag = ( isset( $_GET['wcp_outbound_source'] ) ? $_GET['wcp_outbound_source'] : '' );
                echo  '<select id="wcp_outbound_source" name="wcp_outbound_source">' ;
                echo  '<option value="">Show all Source Tag</option>' ;
                foreach ( $terms as $term ) {
                    echo  '<option value="' . $term->slug . '" ' . selected( $selected_source_tag, $term->slug, false ) . '>' . $term->name . '</option>' ;
                }
                echo  '</select>' ;
            }
            
            $data_IDs = $wpdb->get_col( "\r\n\t        SELECT DISTINCT meta_value\r\n\t        FROM " . $wpdb->postmeta . "\r\n\t        WHERE meta_key = 'wcp_data_ID'\r\n\t        ORDER BY meta_value\r\n\t    " );
            
            if ( !empty($data_IDs) ) {
                $select_output = '';
                $selected_data_entry = ( isset( $_GET['ndf_linked_data_id'] ) ? $_GET['ndf_linked_data_id'] : '' );
                foreach ( $data_IDs as $data_ID ) {
                    $title = get_the_title( $data_ID );
                    wp_reset_postdata();
                    $select_output .= '<option value="' . esc_attr( $data_ID ) . '" ' . selected( $selected_data_entry, $data_ID, false ) . '>' . $title . '</option>';
                }
                if ( !empty($select_output) ) {
                    echo  ' <select name="ndf_linked_data_id" id="ndf_linked_data_id"><option value="">Show all WCP Data</option>' . $select_output . '</select>' ;
                }
            }
        
        }
    
    }
    
    add_action( 'restrict_manage_posts', 'ndf_data_title_filter_manage_entries' );
    /**
     * Date Range filter on Enquiry Entries list.
     * 
     * @since 1.2.2.0
     */
    function ndf_outbound_clicks_date_filter()
    {
        global  $typenow, $post, $post_id ;
        
        if ( $typenow == "wcp_outbound_clicks" ) {
            $from = ( isset( $_GET['wcp_outbound_clicks_date_start'] ) && $_GET['wcp_outbound_clicks_date_start'] ? $_GET['wcp_outbound_clicks_date_start'] : '' );
            $to = ( isset( $_GET['wcp_outbound_clicks_date_end'] ) && $_GET['wcp_outbound_clicks_date_end'] ? $_GET['wcp_outbound_clicks_date_end'] : '' );
            echo  '<input type="text" name="wcp_outbound_clicks_date_start" placeholder="Date From" value="' . $from . '" />
		<input type="text" name="wcp_outbound_clicks_date_end" placeholder="Date To" value="' . $to . '" />' ;
        }
    
    }
    
    add_action( 'restrict_manage_posts', 'ndf_outbound_clicks_date_filter' );
    /**
     * Outbound Clicks filtering query.
     * 
     * @since 1.2.2.0
     */
    function ndf_outbound_clicks_posts_where( $where )
    {
        
        if ( is_admin() ) {
            global  $wpdb ;
            /* WCP Data Filter on Enquiry Entries list */
            
            if ( isset( $_GET['ndf_linked_data_id'] ) && !empty($_GET['ndf_linked_data_id']) && intval( $_GET['ndf_linked_data_id'] ) != 0 ) {
                $ndf_linked_data_id = intval( $_GET['ndf_linked_data_id'] );
                $where .= " AND ID IN (SELECT post_id FROM " . $wpdb->postmeta . " WHERE meta_key='wcp_data_ID' AND meta_value={$ndf_linked_data_id} )";
            }
            
            /* Date Range filter on Enquiry Entries list */
            
            if ( isset( $_GET['wcp_outbound_clicks_date_start'] ) && !empty($_GET['wcp_outbound_clicks_date_start']) || isset( $_GET['wcp_outbound_clicks_date_end'] ) && !empty($_GET['wcp_outbound_clicks_date_end']) ) {
                $wcp_outbound_clicks_date_start = $_GET['wcp_outbound_clicks_date_start'];
                $wcp_outbound_clicks_date_end = $_GET['wcp_outbound_clicks_date_end'];
                if ( empty($wcp_outbound_clicks_date_start) && !empty($wcp_outbound_clicks_date_end) ) {
                    $wcp_outbound_clicks_date_start = $wcp_outbound_clicks_date_end;
                }
                if ( empty($wcp_outbound_clicks_date_end) && !empty($wcp_outbound_clicks_date_start) ) {
                    $wcp_outbound_clicks_date_end = $wcp_outbound_clicks_date_start;
                }
                $where .= " AND ID IN (SELECT ID FROM " . $wpdb->posts . " WHERE DATE_FORMAT(`post_modified`, '%Y-%m-%d') BETWEEN '{$wcp_outbound_clicks_date_start}' AND '{$wcp_outbound_clicks_date_end}' )";
            }
        
        }
        
        return $where;
    }
    
    add_filter( 'posts_where', 'ndf_outbound_clicks_posts_where' );
    /**
     * Get all Outbound Clicks count when on Outbound Clicks list page.
     * 
     * @since 1.2.2.0
     */
    function ndf_count_all_outbound_clicks()
    {
        $current_screen = get_current_screen();
        
        if ( $current_screen->id === "edit-wcp_outbound_clicks" ) {
            global  $wpdb ;
            global  $wcp_outbound_clicks_count ;
            $r = $wpdb->get_col( $wpdb->prepare(
                "\r\n\t        SELECT pm.meta_value FROM {$wpdb->postmeta} pm\r\n\t        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id\r\n\t        WHERE pm.meta_key = '%s' \r\n\t        AND p.post_status = '%s' \r\n\t        AND p.post_type = '%s'\r\n\t    ",
                'wcp_timestamp',
                'private',
                'wcp_outbound_clicks'
            ) );
            foreach ( $r as $key => $value ) {
                $wcp_outbound_clicks_count += count( unserialize( $value ) );
            }
        }
    
    }
    
    /**
     * Add excerpt field to data results query.
     * 
     * @since 1.5.2.2
     */
    function ndf_excerptSearch( $sql )
    {
        global  $wpdb ;
        $WCPExcerptSearch = get_query_var( '_WCPExcerptSearch' );
        if ( $WCPExcerptSearch ) {
            $sql .= $wpdb->prepare( " AND {$wpdb->posts}.post_excerpt LIKE %%s%", $WCPExcerptSearch );
        }
        return $sql;
    }
    
    add_action( 'posts_where', 'ndf_excerptSearch' );
    /**
     * Add Rating Rank class override on MR_Rating_Form class.
     * 
     * @since 1.5.2.9
     */
    function ndf_remove_MR_save_rating_action()
    {
        
        if ( class_exists( 'MR_Rating_Form' ) ) {
            remove_action( 'wp_ajax_save_rating', array( 'MR_Rating_Form', 'save_rating' ) );
            remove_action( 'wp_ajax_nopriv_save_rating', array( 'MR_Rating_Form', 'save_rating' ) );
            add_action( 'wp_ajax_save_rating', array( 'WCP_MR_RatingRank', 'save_ratingrank' ), 999 );
            add_action( 'wp_ajax_nopriv_save_rating', array( 'WCP_MR_RatingRank', 'save_ratingrank' ), 999 );
        }
        
        
        if ( class_exists( 'MRP_Rating_form' ) ) {
            remove_action( 'wp_ajax_save_rating', array( 'MRP_Rating_form', 'save_rating' ), 10 );
            remove_action( 'wp_ajax_nopriv_save_rating', array( 'MRP_Rating_form', 'save_rating' ), 10 );
            remove_action( 'wp_ajax_delete_rating', array( 'MRP_Rating_form', 'delete_rating' ), 10 );
            remove_action( 'wp_ajax_nopriv_delete_rating', array( 'MRP_Rating_form', 'delete_rating' ), 10 );
            remove_action( 'wp_ajax_get_rating_form', array( 'MRP_Rating_form', 'get_rating_form' ), 10 );
            remove_action( 'wp_ajax_nopriv_get_rating_form', array( 'MRP_Rating_form', 'get_rating_form' ), 10 );
            add_action( 'wp_ajax_save_rating', array( 'WCP_MRP_RatingRank', 'save_rating' ), 11 );
            add_action( 'wp_ajax_nopriv_save_rating', array( 'WCP_MRP_RatingRank', 'save_rating' ), 11 );
            add_action( 'wp_ajax_delete_rating', array( 'WCP_MRP_RatingRank', 'delete_rating' ), 11 );
            add_action( 'wp_ajax_nopriv_delete_rating', array( 'WCP_MRP_RatingRank', 'delete_rating' ), 11 );
            add_action( 'wp_ajax_get_rating_form', array( 'WCP_MRP_RatingRank', 'get_rating_form' ), 11 );
            add_action( 'wp_ajax_nopriv_get_rating_form', array( 'WCP_MRP_RatingRank', 'get_rating_form' ), 11 );
        }
    
    }
    
    add_action( 'init', 'ndf_remove_MR_save_rating_action', 999 );
    /**
     * Add WCP Data Editor role to authors field.
     * 
     * @since 1.6.2.5
     */
    function wcp_data_role_add_to_authors( $query_args, $r )
    {
        $query_args['role__in'] = array( 'administrator', 'author', 'wcp_data_role' );
        // Unset the 'who' as this defaults to the 'author' role
        unset( $query_args['who'] );
        return $query_args;
    }
    
    add_filter(
        'wp_dropdown_users_args',
        'wcp_data_role_add_to_authors',
        10,
        2
    );
    /**
     * Add new WCP Data Restrictions.
     * 
     * @since 1.8.2.0
     */
    function wcp_fix_capability_create()
    {
        $current_user = wp_get_current_user();
        $role = (array) $current_user->roles;
        
        if ( in_array( 'wcp_data_role', $role ) ) {
            
            if ( $role_object = get_role( 'wcp_data_role' ) ) {
                $caps = array( 'upload_files', 'edit_attachments', 'delete_attachments' );
                foreach ( $caps as $cap ) {
                    if ( !$role_object->has_cap( $cap ) ) {
                        $role_object->add_cap( $cap );
                    }
                }
            }
            
            $post_type = get_post_type_object( 'ndf_data' );
            $cap = "create_ndf_data";
            $post_type->cap->create_posts = $cap;
            map_meta_cap( $cap, 1 );
        }
        
        
        if ( wcp_fs()->is_free_plan() || wcp_fs()->is_not_paying() ) {
            $args = array(
                'post_type' => 'ndf_data',
            );
            $query = new WP_Query( $args );
            $post_count = $query->post_count;
            
            if ( $post_count >= 10 ) {
                $post_type = get_post_type_object( 'ndf_data' );
                $cap = "create_ndf_data";
                $post_type->cap->create_posts = $cap;
                map_meta_cap( $cap, 1 );
                remove_submenu_page( 'edit.php?post_type=ndf_data', 'post-new.php?post_type=ndf_data' );
            }
        
        }
    
    }
    
    add_action( 'admin_init', 'wcp_fix_capability_create', 100 );
    /**
     * Show only WCP Data menu if license is active.
     * 
     * @since 1.6.2.4
     */
    function wcp_data_role_remove_admin_submenus()
    {
        $current_screen = get_current_screen();
        $id = get_current_user_id();
        if ( current_user_can( 'manage_options' ) ) {
            return;
        }
        remove_submenu_page( 'edit.php?post_type=ndf_data', 'post-new.php?post_type=ndf_data' );
        remove_menu_page( 'edit.php?post_type=wcp_outbound_clicks' );
        if ( current_user_can( 'wcp_data_role' ) && $current_screen->id == 'ndf_data' ) {
            
            if ( isset( $_GET['post'] ) ) {
                $post = get_post( $_GET['post'] );
                $author_id = $post->post_author;
                if ( $author_id != $id ) {
                    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
                }
            }
        
        }
    }
    
    add_action( 'current_screen', 'wcp_data_role_remove_admin_submenus' );
    /**
     * Show only own items in media uploader.
     * 
     * @since 1.6.2.4
     */
    function wcp_editor_my_attachments_only( $query )
    {
        if ( $user_id = get_current_user_id() ) {
            if ( current_user_can( 'wcp_data_role' ) ) {
                $query['author'] = $user_id;
            }
        }
        return $query;
    }
    
    add_filter( 'ajax_query_attachments_args', 'wcp_editor_my_attachments_only' );
    function wcp_editor_filter_my_attachments( $wp_query )
    {
        $current_user_id = get_current_user_id();
        if ( current_user_can( 'wcp_data_role' ) ) {
            /* Show only own items in media uploader and WCP Data. */
            if ( is_admin() && is_main_query() && ($wp_query->query_vars['post_type'] == 'attachment' || $wp_query->query_vars['post_type'] == 'ndf_data') ) {
                $wp_query->set( 'author', $current_user_id );
            }
        }
    }
    
    add_filter( 'parse_query', 'wcp_editor_filter_my_attachments' );
    /**
     * Save More Info's Name field type as serialized array.
     * 
     * @since 1.6.2.7
     */
    function wcp_save_name_field_type_value_as_array( $entry, $form )
    {
        if ( $form["wcp_more_info_settings"] != "Yes" ) {
            return;
        }
        global  $wpdb ;
        $ndf_data_filtering_saved_fields = $wpdb->prefix . 'ndf_data_filtering_saved_fields';
        $field_rows = $wpdb->get_results( "SELECT ID, field_type FROM {$ndf_data_filtering_saved_fields} WHERE hidden = '0' AND field_type = 'name'" );
        foreach ( $field_rows as $field_row ) {
            $ndf_meta_field_data = 'ndf_fields_' . $field_row->ID;
            $meta = get_post_meta( $entry["post_id"], $ndf_meta_field_data, true );
            $meta = preg_split( '/\\r\\n|[\\r\\n]/', $meta );
            $meta_value = array();
            foreach ( $meta as $value ) {
                $meta_temp = explode( ':', $value );
                $meta_temp = array_map( 'trim', $meta_temp );
                $meta_value[$meta_temp[0]] = $meta_temp[1];
            }
            update_post_meta( $entry["post_id"], $ndf_meta_field_data, $meta_value );
        }
    }
    
    add_action(
        "gform_post_submission",
        "wcp_save_name_field_type_value_as_array",
        10,
        2
    );
    /**
     * Plugin uninstall.
     * 
     * @since 1.5.1.0
     */
    function wcp_fs_uninstall_cleanup()
    {
        if ( is_plugin_active( 'wordpress-comparison-plugin/wordpress-comparison-plugin.php' ) ) {
            return;
        }
        /**
         * Remove Data Results Section Heading Settings
         */
        delete_option( 'ndf_data_results_heading_show' );
        delete_option( 'ndf_data_results_heading_icon' );
        delete_option( 'ndf_data_results_heading_label' );
        delete_option( 'ndf_data_results_heading_style' );
        delete_option( 'ndf_data_results_heading_label_fontcolor' );
        delete_option( 'ndf_data_results_heading_description' );
        delete_option( 'ndf_data_results_heading_description_font_size' );
        delete_option( 'ndf_data_results_heading_description_font_color' );
        /**
         * Remove Data Results Section Load More Button Settings
         */
        delete_option( 'ndf_load_more_button_label' );
        delete_option( 'ndf_load_more_button_font_size' );
        delete_option( 'ndf_load_more_button_fontcolor' );
        delete_option( 'ndf_load_more_button_background_color' );
        delete_option( 'ndf_load_more_button_hover_background_color' );
        delete_option( 'ndf_load_more_button_border_color' );
        delete_option( 'ndf_load_more_button_border_width' );
        delete_option( 'ndf_load_more_button_border_radius' );
        delete_option( 'ndf_load_more_button_padding_top' );
        delete_option( 'ndf_load_more_button_padding_bottom' );
        delete_option( 'ndf_load_more_button_padding_left' );
        delete_option( 'ndf_load_more_button_padding_right' );
        /**
         * Remove Data Results Section More Information Settings
         */
        delete_option( 'ndf_more_info_column_show' );
        delete_option( 'ndf_more_info_button_label' );
        delete_option( 'ndf_more_info_button_font_size' );
        delete_option( 'ndf_more_info_button_fontcolor' );
        delete_option( 'ndf_more_info_button_background_color' );
        delete_option( 'ndf_more_info_button_hover_background_color' );
        delete_option( 'ndf_more_info_button_border_color' );
        delete_option( 'ndf_more_info_button_border_width' );
        delete_option( 'ndf_more_info_button_border_radius' );
        delete_option( 'ndf_more_info_button_padding_top' );
        delete_option( 'ndf_more_info_button_padding_bottom' );
        delete_option( 'ndf_more_info_button_padding_left' );
        delete_option( 'ndf_more_info_button_padding_right' );
        /**
         * Remove Data Results Section Star Rating Settings
         */
        delete_option( 'ndf_star_ratings_element_show' );
        delete_option( 'ndf_star_rating_color' );
        delete_option( 'ndf_star_rating_size' );
        delete_option( 'ndf_star_rating_margin_top' );
        delete_option( 'ndf_star_rating_margin_bottom' );
        /**
         * Remove Data Results Query Results Settings
         */
        delete_option( 'ndf_query_results_order_by' );
        delete_option( 'ndf_query_results_order' );
        delete_option( 'ndf_query_results_limit' );
        delete_option( 'ndf_query_results_step' );
        /**
         * Remove Data Results Section Table Properties Settings
         */
        delete_option( 'ndf_data_results_table_header_background_color' );
        delete_option( 'ndf_data_results_table_background_color' );
        delete_option( 'ndf_data_results_category_font_size' );
        delete_option( 'ndf_data_results_category_fontcolor' );
        delete_option( 'ndf_data_results_table_font_size' );
        delete_option( 'ndf_data_results_table_font_color' );
        delete_option( 'ndf_data_results_table_border_color' );
        delete_option( 'ndf_data_results_table_border_width' );
        delete_option( 'ndf_data_results_table_border_radius' );
        delete_option( 'ndf_data_results_table_title_cell_background_color' );
        delete_option( 'ndf_data_results_table_title_cell_font_color' );
        /**
         * Remove Data Results Section Tooltip Settings
         */
        delete_option( 'ndf_tooltip_icon_color' );
        delete_option( 'ndf_tooltip_icon_background_color' );
        delete_option( 'ndf_tooltip_background_color' );
        delete_option( 'ndf_tooltip_border_color' );
        delete_option( 'ndf_tooltip_border_radius' );
        delete_option( 'ndf_tooltip_font_size' );
        delete_option( 'ndf_tooltip_font_color' );
        /**
         * Remove Filters Section Category 1 Settings
         */
        delete_option( 'ndf_category_1_filter_show' );
        delete_option( 'ndf_category_1_filter_icon' );
        delete_option( 'ndf_category_1_filter_label' );
        delete_option( 'ndf_category_1_filter_accent_color' );
        delete_option( 'ndf_category_1_filter_override' );
        delete_option( 'ndf_category_1_filter_label_font_size' );
        delete_option( 'ndf_category_1_filter_label_fontcolor' );
        delete_option( 'ndf_category_1_filter_font_size' );
        delete_option( 'ndf_category_1_filter_font_color' );
        delete_option( 'ndf_category_1_filter_background_color' );
        /**
         * Remove Filters Section Category 2 Settings
         */
        delete_option( 'ndf_category_2_filter_show' );
        delete_option( 'ndf_category_2_filter_icon' );
        delete_option( 'ndf_category_2_filter_accent_color' );
        delete_option( 'ndf_category_2_filter_label' );
        delete_option( 'ndf_category_2_filter_override' );
        delete_option( 'ndf_category_2_filter_label_font_size' );
        delete_option( 'ndf_category_2_filter_label_fontcolor' );
        delete_option( 'ndf_category_2_filter_font_size' );
        delete_option( 'ndf_category_2_filter_font_color' );
        delete_option( 'ndf_category_2_filter_background_color' );
        /**
         * Remove Filters Section Category 3 Settings
         */
        delete_option( 'ndf_category_3_filter_show' );
        delete_option( 'ndf_category_3_filter_icon' );
        delete_option( 'ndf_category_3_filter_accent_color' );
        delete_option( 'ndf_category_3_filter_label' );
        delete_option( 'ndf_category_3_filter_override' );
        delete_option( 'ndf_category_3_filter_label_font_size' );
        delete_option( 'ndf_category_3_filter_label_fontcolor' );
        delete_option( 'ndf_category_3_filter_font_size' );
        delete_option( 'ndf_category_3_filter_font_color' );
        delete_option( 'ndf_category_3_filter_background_color' );
        /**
         * Remove Filters Section Category 4 Settings
         */
        delete_option( 'ndf_category_4_filter_show' );
        delete_option( 'ndf_category_4_filter_icon' );
        delete_option( 'ndf_category_4_filter_accent_color' );
        delete_option( 'ndf_category_4_filter_label' );
        delete_option( 'ndf_category_4_filter_override' );
        delete_option( 'ndf_category_4_filter_label_font_size' );
        delete_option( 'ndf_category_4_filter_label_fontcolor' );
        delete_option( 'ndf_category_4_filter_font_size' );
        delete_option( 'ndf_category_4_filter_font_color' );
        delete_option( 'ndf_category_4_filter_background_color' );
        /**
         * Remove Filters Section Category 5 Settings
         */
        delete_option( 'ndf_category_5_filter_show' );
        delete_option( 'ndf_category_5_filter_icon' );
        delete_option( 'ndf_category_5_filter_accent_color' );
        delete_option( 'ndf_category_5_filter_label' );
        delete_option( 'ndf_category_5_filter_override' );
        delete_option( 'ndf_category_5_filter_label_font_size' );
        delete_option( 'ndf_category_5_filter_label_fontcolor' );
        delete_option( 'ndf_category_5_filter_font_size' );
        delete_option( 'ndf_category_5_filter_font_color' );
        delete_option( 'ndf_category_5_filter_background_color' );
        /**
         * Remove Filters Section Heading Settings
         */
        delete_option( 'ndf_filters_heading_show' );
        delete_option( 'ndf_filters_heading_icon' );
        delete_option( 'ndf_filters_heading_label' );
        delete_option( 'ndf_filters_heading_style' );
        delete_option( 'ndf_filters_heading_label_fontcolor' );
        delete_option( 'ndf_filters_heading_description' );
        delete_option( 'ndf_filters_heading_description_font_size' );
        delete_option( 'ndf_filters_heading_description_font_color' );
        /**
         * Remove Filters Section Reset Button Settings
         */
        delete_option( 'ndf_reset_button_show' );
        delete_option( 'ndf_reset_button_label' );
        delete_option( 'ndf_reset_button_font_size' );
        delete_option( 'ndf_reset_button_fontcolor' );
        delete_option( 'ndf_reset_button_background_color' );
        delete_option( 'ndf_reset_button_hover_background_color' );
        delete_option( 'ndf_reset_button_border_color' );
        delete_option( 'ndf_reset_button_border_width' );
        delete_option( 'ndf_reset_button_border_radius' );
        delete_option( 'ndf_reset_button_padding_top' );
        delete_option( 'ndf_reset_button_padding_bottom' );
        delete_option( 'ndf_reset_button_padding_left' );
        delete_option( 'ndf_reset_button_padding_right' );
        /**
         * Remove Filters Section Table Properties Settings
         */
        delete_option( 'ndf_filters_table_background_color' );
        delete_option( 'ndf_filters_table_category_title_font_size' );
        delete_option( 'ndf_filters_table_category_title_fontcolor' );
        delete_option( 'ndf_filters_table_font_size' );
        delete_option( 'ndf_filters_table_font_color' );
        delete_option( 'ndf_filters_table_border_color' );
        delete_option( 'ndf_filters_table_border_radius' );
        delete_option( 'ndf_filters_table_border_width' );
        /**
         * Remove More Information Fields UI Settings
         */
        delete_option( 'ndf_more_info_fields_heading_style' );
        delete_option( 'ndf_more_info_fields_heading_label_fontcolor' );
        delete_option( 'ndf_more_info_fields_table_header_background_color' );
        delete_option( 'ndf_more_info_fields_table_background_color' );
        delete_option( 'ndf_more_info_fields_header_font_size' );
        delete_option( 'ndf_more_info_fields_header_fontcolor' );
        delete_option( 'ndf_more_info_fields_table_font_size' );
        delete_option( 'ndf_more_info_fields_table_font_color' );
        delete_option( 'ndf_more_info_fields_text_alignment' );
        delete_option( 'ndf_more_info_fields_table_row_space' );
        delete_option( 'ndf_more_info_fields_table_border_color' );
        delete_option( 'ndf_more_info_fields_table_border_width' );
        delete_option( 'ndf_more_info_fields_table_border_radius' );
        $args = array(
            'role' => 'administrator',
        );
        $users = get_users( $args );
        foreach ( $users as $user ) {
            $user->remove_role( 'ndf_admin_role' );
        }
        remove_role( 'wcp_data_role' );
    }
    
    wcp_fs()->add_action( 'after_uninstall', 'wcp_fs_uninstall_cleanup' );
}
