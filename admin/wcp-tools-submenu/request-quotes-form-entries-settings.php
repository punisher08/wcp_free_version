<?php
/**
 * Request Quotes Form Settings
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.7.3.0
 * @author 		Netseek Pty Ltd
 */


/**
 * Register Quotes Entry Post Type
 *
 * @return void
 */
function create_quotesentry_cpt() {

	$labels = array(
		'name' => _x( 'Quotes Entries', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Quotes Entry', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Quotes Entries', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Quotes Entry', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Quotes Entry Archives', 'textdomain' ),
		'attributes' => __( 'Quotes Entry Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Quotes Entry:', 'textdomain' ),
		'all_items' => __( 'All Quotes Entries', 'textdomain' ),
		'add_new_item' => __( 'Add New Quotes Entry', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Quotes Entry', 'textdomain' ),
		'edit_item' => __( 'Edit Quotes Entry', 'textdomain' ),
		'update_item' => __( 'Update Quotes Entry', 'textdomain' ),
		'view_item' => __( 'View Quotes Entry', 'textdomain' ),
		'view_items' => __( 'View Quotes Entries', 'textdomain' ),
		'search_items' => __( 'Search Quotes Entry', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Quotes Entry', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Quotes Entry', 'textdomain' ),
		'items_list' => __( 'Quotes Entries list', 'textdomain' ),
		'items_list_navigation' => __( 'Quotes Entries list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Quotes Entries list', 'textdomain' ),
	);
	$rewrite = array(
		'slug'                  => 'quotesentry',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => true,
	);
	$args = array(
		'label' => __( 'Quotes Entry', '' ),
		'description' => __( '', '' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-email-alt',
		'supports' => array(),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => false,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => false,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'rewrite'               => $rewrite,
		'capability' 			=> 'manage_options',
		'capabilities'			=> array(
			'create_posts' 	=> 'do_not_allow',
		),
        'map_meta_cap'			=> true,
	);
	register_post_type( 'quotesentry', $args );

}
add_action( 'init', 'create_quotesentry_cpt', 0 );

/**
 * Start Creating Custom Meta box for quotesentry Post
 *
 * @return void
 */
function email_subject_meta_box(){
	add_meta_box(
		"quotes_email_subject_field",
		"Email Subject",
		"quotes_email_subject_callback",
		"quotesentry",
		"normal",
		"low"
	);
}
add_action("admin_init", "email_subject_meta_box");

function sender_email_meta_box(){
	add_meta_box(
		"quotes_sender_email_field",
		"Sender Email",
		"quotes_sender_email_callback",
		"quotesentry",
		"normal",
		"low"
	);
}
add_action("admin_init", "sender_email_meta_box");


function sender_phone_meta_box(){
	add_meta_box(
		"quotes_sender_phone_field",
		"Sender Phone",
		"quotes_sender_phone_callback",
		"quotesentry",
		"normal",
		"low"
	);
}
add_action("admin_init", "sender_phone_meta_box");

function sender_request_description_meta_box(){
	add_meta_box(
		"quotes_sender_request_description_field",
		"Sender Request",
		"quotes_sender_request_description_callback",
		"quotesentry",
		"normal",
		"low"
	);
}
add_action("admin_init", "sender_request_description_meta_box");

function sent_to_meta_box(){
	add_meta_box(
		"quotes_sent_to_field",
		"Sent To",
		"quotes_sent_to_callback",
		"quotesentry",
		"normal",
		"low"
	);
}
add_action("admin_init", "sent_to_meta_box");

/**
 * Quotes Forms Entry Callbacks
 *
 * @return void
 */
function quotes_email_subject_callback(){
	global $post;

	$data = get_post_custom($post->ID);
	$val = isset($data['quotes_email_subject_field']) ? esc_attr($data['quotes_email_subject_field'][0]) : '';
	echo '<div>'.$val.'</div>';
}

function quotes_sender_email_callback(){
	global $post;

		$data = get_post_custom($post->ID);
		$val = isset($data['quotes_sender_email_field']) ? esc_attr($data['quotes_sender_email_field'][0]) : '';;
		echo '<div>'.$val.'</div>';
}

function quotes_sender_phone_callback(){
	global $post;

		$data = get_post_custom($post->ID);
		$val = isset($data['quotes_sender_phone_field']) ? esc_attr($data['quotes_sender_phone_field'][0]) : '';
		echo '<div>'.$val.'</div>';
}

function quotes_sender_request_description_callback(){
	global $post;

		$data = get_post_custom($post->ID);
		$val = isset($data['quotes_sender_request_description_field']) ? esc_attr($data['quotes_sender_request_description_field'][0]) : '';
		echo '<div>'.$val.'</div>';
}

function quotes_sent_to_callback(){
	global $post;

		$data = get_post_custom($post->ID);
		$val = isset($data['quotes_sent_to_field']) ? esc_attr($data['quotes_sent_to_field'][0]) : '';
		echo '<div>'.$val.'</div>';
}
// End Quotes Form Entry Callbacks


/**
 * Save Quotes Entry Functions
 *
 * @return void
 */
add_action('save_post', 'save_email_subject_detail');
function save_email_subject_detail(){
	global $post;
	update_post_meta($post->ID,'quotes_email_subject_field',$_POST['quotes_email_subject_field']);
}

add_action('save_post', 'save_sender_email_detail');

function save_sender_email_detail(){
	global $post;
	update_post_meta($post->ID,'quotes_sender_email_field',$_POST['quotes_sender_email_field']);
}

add_action('save_post', 'save_sender_phone_detail');

function save_sender_phone_detail(){
	global $post;
	update_post_meta($post->ID,'quotes_sender_phone_field',$_POST['quotes_sender_phone_field']);
}

add_action('save_post', 'sender_request_description_detail');

function sender_request_description_detail(){
	global $post;
	update_post_meta($post->ID,'quotes_sender_request_description_field',$_POST['quotes_sender_request_description_field']);
}

add_action('save_post', 'sent_to_detail');

function sent_to_detail(){
	global $post;
	update_post_meta($post->ID,'quotes_sent_to_field',$_POST['quotes_sent_to_field']);
}

/**
 * Replace Quotes Forms Table Headers
 *
 * @param  mixed $defaults
 * @return void
 */
function quotesentry_default_head( $defaults )
{
	$defaults['requesting'] = 'Requesting Email';
	$defaults['status'] = 'Status';
	$defaults['sent_to'] = 'Sent To';
	$defaults['date_sent'] = 'Date';
	return $defaults;
}
add_filter( 'manage_quotesentry_posts_columns', 'quotesentry_default_head' );
 
/**
 * Remove Quotes Entry Default Columns
 *
 * @param  mixed $columns
 * @return void
 */
function quotesentry_remove_column( $columns )
{
	unset( $columns['title'] );
	unset( $columns['date'] );
	return $columns;
}  
add_filter( 'manage_quotesentry_posts_columns', 'quotesentry_remove_column');

/**
 * Define the content of $defaults table headers
 *
 * @param  mixed $column_name
 * @param  mixed $post_ID
 * @return void
 */
function quotesentry_entries_columns_content( $column_name, $post_ID )
    {
        if ( $column_name == 'requesting' ) {
            echo  get_post_meta( $post_ID, 'quotes_sender_email_field', true ) ;
			echo $post_ID;
        }
		if ( $column_name == 'status' ) {
			$status = get_post_status($post_ID);
			if($status == 'publish'){
				echo 'Sent';
			}	
        }
		if ( $column_name == 'sent_to' ) {
            echo  get_post_meta( $post_ID, 'quotes_sent_to_field', true ) ;
        }
		if ( $column_name == 'date_sent' ) {
            echo get_the_date('Y-m-d h-m-s', $post_ID);
        }  
    }
    
add_action('manage_quotesentry_posts_custom_column','quotesentry_entries_columns_content',10,2);
// end Quotes Entry Functions




