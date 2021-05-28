<?php
/** 
 * Registers Custom Post Type and Taxonomies
 * 
 * Registered Custom Post Type:
 * - `ndf_data` - Post type that is filtered by the registered taxonomies.
 * 
 * Registered Taxonomies:
 * - `ndf_category_1` - Used in filtering data post type.
 * - `ndf_category_2` - Used in filtering data post type.
 * - `ndf_category_3` - Used in filtering data post type.
 * - `ndf_category_4` - Used in filtering data post type.
 * - `ndf_category_5` - Used in filtering data post type.
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/includes
 * @since 		1.0.1.0
 * @author 		Netseek Pty Ltd
 */
function ndf_register_data() {

	$labels = array(
		'name'                  => 'WCP Data',
		'singular_name'         => 'WCP Data',
		'menu_name'             => 'WCP Data',
		'name_admin_bar'        => 'WCP Data',
		'archives'              => 'WCP Data Archives',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'WCP Data items list',
	);
	$rewrite = array(
		'slug'                  => get_option( 'ndf_more_info_fields_slug', 'ndf-data' ),
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'WCP Data',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'excerpt', 'author' ),
		'taxonomies'            => array( 'ndf_category_1', ' ndf_category_2', ' ndf_category_3', ' ndf_category_4', ' ndf_category_5' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-media-text',//NDF_BASE_URL.'/admin/assets/images/icon-wcp-data.png',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type' 		=> array( 
			'ndf_data',
			'ndf_datas',
		),
        'map_meta_cap'			=> true,
	);
	register_post_type( 'ndf_data', $args );
	
	$labels_cat_1 = array(
		'name'                       => get_option( 'ndf_category_1_filter_label', 'Category 1' ),
		'singular_name'              => get_option( 'ndf_category_1_filter_label', 'Category 1' ),
		'menu_name'                  => get_option( 'ndf_category_1_filter_label', 'Category 1' ),
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
	$rewrite_cat_1 = array(
		'slug'                       => 'ndf-category-1',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args_cat_1 = array(
		'labels'                     => $labels_cat_1,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite_cat_1,
		'capabilities'				 => array(
			'manage_categories' 	 => 'manage_ndf_category',
			'manage_terms'			 => 'manage_ndf_category',
			'edit_terms'			 => 'manage_ndf_category',
			'delete_terms'			 => 'manage_ndf_category',
			'assign_terms'			 => 'edit_ndf_datas',
		),
	);
	register_taxonomy( 'ndf_category_1', array( 'ndf_data' ), $args_cat_1 );
	
	$labels_cat_2 = array(
		'name'                       => get_option( 'ndf_category_2_filter_label', 'Category 2' ),
		'singular_name'              => get_option( 'ndf_category_2_filter_label', 'Category 2' ),
		'menu_name'                  => get_option( 'ndf_category_2_filter_label', 'Category 2' ),
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
	$rewrite_cat_2 = array(
		'slug'                       => 'ndf-category-2',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args_cat_2 = array(
		'labels'                     => $labels_cat_2,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite_cat_2,
		'capabilities'				 => array(
			'manage_categories' 	 => 'manage_ndf_category',
			'manage_terms'			 => 'manage_ndf_category',
			'edit_terms'			 => 'manage_ndf_category',
			'delete_terms'			 => 'manage_ndf_category',
			'assign_terms'			 => 'edit_ndf_datas',
		),
	);
	register_taxonomy( 'ndf_category_2', array( 'ndf_data' ), $args_cat_2 );

	$labels_cat_3 = array(
		'name'                       => get_option( 'ndf_category_3_filter_label', 'Category 3' ),
		'singular_name'              => get_option( 'ndf_category_3_filter_label', 'Category 3' ),
		'menu_name'                  => get_option( 'ndf_category_3_filter_label', 'Category 3' ),
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
	$rewrite_cat_3 = array(
		'slug'                       => 'ndf-category-3',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args_cat_3 = array(
		'labels'                     => $labels_cat_3,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite_cat_3,
		'capabilities'				 => array(
			'manage_categories' 	 => 'manage_ndf_category',
			'manage_terms'			 => 'manage_ndf_category',
			'edit_terms'			 => 'manage_ndf_category',
			'delete_terms'			 => 'manage_ndf_category',
			'assign_terms'			 => 'edit_ndf_datas',
		),
	);
	register_taxonomy( 'ndf_category_3', array( 'ndf_data' ), $args_cat_3 );

	$labels_cat_4 = array(
		'name'                       => get_option( 'ndf_category_4_filter_label', 'Category 4' ),
		'singular_name'              => get_option( 'ndf_category_4_filter_label', 'Category 4' ),
		'menu_name'                  => get_option( 'ndf_category_4_filter_label', 'Category 4' ),
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
	$rewrite_cat_4 = array(
		'slug'                       => 'ndf-category-4',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args_cat_4 = array(
		'labels'                     => $labels_cat_4,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite_cat_4,
		'capabilities'				 => array(
			'manage_categories' 	 => 'manage_ndf_category',
			'manage_terms'			 => 'manage_ndf_category',
			'edit_terms'			 => 'manage_ndf_category',
			'delete_terms'			 => 'manage_ndf_category',
			'assign_terms'			 => 'edit_ndf_datas',
		),
	);
	register_taxonomy( 'ndf_category_4', array( 'ndf_data' ), $args_cat_4 );

	$labels_cat_5 = array(
		'name'                       => get_option( 'ndf_category_5_filter_label', 'Category 5' ),
		'singular_name'              => get_option( 'ndf_category_5_filter_label', 'Category 5' ),
		'menu_name'                  => get_option( 'ndf_category_5_filter_label', 'Category 5' ),
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
	$rewrite_cat_5 = array(
		'slug'                       => 'ndf-category-5',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args_cat_5 = array(
		'labels'                     => $labels_cat_5,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite_cat_5,
		'capabilities'				 => array(
			'manage_categories' 	 => 'manage_ndf_category',
			'manage_terms'			 => 'manage_ndf_category',
			'edit_terms'			 => 'manage_ndf_category',
			'delete_terms'			 => 'manage_ndf_category',
			'assign_terms'			 => 'edit_ndf_datas',
		),
	);
	register_taxonomy( 'ndf_category_5', array( 'ndf_data' ), $args_cat_5 );

	$labels = array(
		'name'                  => 'Outbound Clicks',
		'singular_name'         => 'Outbound Clicks',
		'menu_name'             => 'WCP Tools',
		'name_admin_bar'        => 'Outbound Clicks',
		'archives'              => 'Outbound Clicks Archives',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'Outbound Clicks',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$rewrite = array(
		'slug'                  => 'wcp-outbound-clicks',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Outbound Clicks',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'wcp_outbound_source' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability' 			=> 'manage_options',
		'capabilities'			=> array(
			'create_posts'		=> 'do_not_allow',
		),
        'map_meta_cap'			=> true,
	);
	register_post_type( 'wcp_outbound_clicks', $args );

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
		'slug'                       => 'wcp-outbound-source',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args_outbound_source = array(
		'labels'                     => $labels_outbound_source,
		'hierarchical'               => true,
		'public'                     => false,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite_outbound_source,
		'capability' 				 => 'manage_options',
	);
	register_taxonomy( 'wcp_outbound_source', array( 'wcp_outbound_clicks' ), $args_outbound_source );

	$labels = array(
		'name'                  => 'Enquiry Form Entries',
		'singular_name'         => 'Enquiry Form Entries',
		'menu_name'             => 'Enquiry Form Entries',
		'name_admin_bar'        => 'Enquiry Form Entries',
		'archives'              => 'Enquiry Form Entries Archives',
		'parent_item_colon'     => 'Parent Entry:',
		'all_items'             => 'Enquiry Form Entries',
		'add_new_item'          => 'Add New Entry',
		'add_new'               => 'Add New',
		'new_item'              => 'New Entry',
		'edit_item'             => 'Edit Entry',
		'update_item'           => 'Update Entry',
		'view_item'             => 'View Entry',
		'search_items'          => 'Search Entry',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$rewrite = array(
		'slug'                  => 'wcp-enquiry-form-entries',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Enquiry Form Entries',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => false,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-email-alt',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability' 			=> 'manage_options',
		'capabilities'			=> array(
			'create_posts' 	=> 'do_not_allow',
		),
        'map_meta_cap'			=> true,
	);
	register_post_type( 'wcp_enquiry_entries', $args );
}
add_action( 'init', 'ndf_register_data', 0 );


// NDF SINGLE POST TEMPLATES
function load_quotesentry_template( $template ) {
    global $post;
    if ( $post->post_type == 'test'   ) {
		if ( file_exists( NDF_BASE_DIR . '/single-post.php' ) ) {
			return NDF_BASE_DIR. '/single-post.php';
        }
    }
    return $template;
}
add_filter( 'single_template', 'load_quotesentry_template' );