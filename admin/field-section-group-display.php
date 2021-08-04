<?php
/**
 * Field Group Section Settings
 * Settings data /admin/more-info-settings-submenu
 * @package 1.7.3.8
 */

?>
<div class="wrap">
	<form method="post" action="options.php" enctype="multipart/form-data"> 
        <?php
		/**
		 * Reset Field Groups if gets duplicated 
		 */
		$register_section_1_name = get_option( 'register_section_1_name', 'default' );
		$register_section_2_name = get_option( 'register_section_2_name', 'default' );
		$register_section_3_name = get_option( 'register_section_3_name', 'default' );
		$check = [
			'section1' => $register_section_1_name ,
			'section2' => $register_section_2_name ,
			'section3' => $register_section_3_name ,
		];
		$has_duplicate = array_diff_key( $check , array_unique( $check ) );
		foreach($has_duplicate as $key => $value){
			if($value != 'default'){
				switch ($key){
					case 'section1':
						update_option('register_section_1_name', 'default');
						break;
					case 'section2':
						update_option('register_section_2_name', 'default');
						break;
					case 'section3':
						update_option('register_section_3_name', 'default');
						break;
				}
			}
		}
		//EO RESET FIELD GROUP

		settings_fields( 'register_field_groups_option' );
		do_settings_sections( 'register_field_groups_option' );
		submit_button();
		?>
	</form>
</div>