<?php
/**
 * Request Quotes Form Settings
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.7.3.0
 * @author 		Netseek Pty Ltd
 */

add_action('admin_init', 'register_field_groups_settings');

function register_field_groups_settings() {

    add_settings_section(
		'register_field_groups_section',
		'Register Field Groups',
		'register_field_groups_section_callback',
		'register_field_groups_option'
	);
    add_settings_field( 
		'register_section_1_name',
		'Section 1',
		'register_section_1_name_callback',
		'register_field_groups_option',
		'register_field_groups_section'
	);
    add_settings_field( 
		'register_section_2_name',
		'Section 2',
		'register_section_2_name_callback',
		'register_field_groups_option',
		'register_field_groups_section'
	);
	add_settings_field( 
		'register_section_3_name',
		'Section 3',
		'register_section_3_name_callback',
		'register_field_groups_option',
		'register_field_groups_section'
	);
	add_settings_field( 
		'register_section_4_name',
		'Section 4',
		'register_section_4_name_callback',
		'register_field_groups_option',
		'register_field_groups_section'
	);
	add_settings_field( 
		'register_section_5_name',
		'Section 5',
		'register_section_5_name_callback',
		'register_field_groups_option',
		'register_field_groups_section'
	);
    register_setting( 'register_field_groups_option', 'register_section_1_name' );
    register_setting( 'register_field_groups_option', 'register_section_2_name' );
    register_setting( 'register_field_groups_option', 'register_section_3_name' );
    register_setting( 'register_field_groups_option', 'register_section_4_name' );
    register_setting( 'register_field_groups_option', 'register_section_5_name' );


function register_field_groups_section_callback(){
    echo '<p></p>';
}
function register_section_1_name_callback(){
    $register_section_1_name = get_option( 'register_section_1_name', 'Section 1' );

	$html = '<input type="text" id="register_section_1_name" name="register_section_1_name" value="'.$register_section_1_name.'" />'; 
	echo $html;
}
function register_section_2_name_callback(){
    $register_section_2_name = get_option( 'register_section_2_name', 'Section 2' );
	$html = '<input type="text" id="register_section_2_name" name="register_section_2_name" value="'.$register_section_2_name.'" />'; 
	echo $html;
}
function register_section_3_name_callback(){
    $register_section_3_name = get_option( 'register_section_3_name', 'Section 3' );
	$html = '<input type="text" id="register_section_3_name" name="register_section_3_name" value="'.$register_section_3_name.'" />'; 
	echo $html;
}
function register_section_4_name_callback(){
    $register_section_4_name = get_option( 'register_section_4_name', 'Section 4' );
	$html = '<input type="text" id="register_section_4_name" name="register_section_4_name" value="'.$register_section_4_name.'" />'; 
	echo $html;
}
function register_section_5_name_callback(){
    $register_section_5_name = get_option( 'register_section_5_name', 'Section 5' );
	$html = '<input type="text" id="register_section_5_name" name="register_section_5_name" value="'.$register_section_5_name.'" />'; 
	echo $html;
}

}