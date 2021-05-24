<?php
/**
 * Request Form Settings
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.7.3.0
 * @author 		Netseek Pty Ltd
 */
?>
<div class="navigation-bar-wcp-settings d-flex justify-content-between">
	<div class="tab-title"><?php echo esc_html( get_admin_page_title() ); ?></div>
	<?php $logo = plugin_dir_url( __FILE__ ).'assets/images/wcp-logo.png'; ?>
	<a href="https://wordpresscomparisonplugin.com/" target="_blank"><img src="<?php echo $logo;?>" alt="" class="wcp-logo"></a>
</div>
<div class="wrap">
	<form method="post" action="options.php" enctype="multipart/form-data"> 
        <div id="show-shortcode" class="quotes_shortcode">
            <label for="male"> Use the shortcode below to show button for Request Quotes</label><br><br>
            <input type="text" name="gender" disabled id="male" value="[get_quotes]">
        </div>
        <?php
		settings_fields( 'request_quotes_form_settings_option' );
		do_settings_sections( 'request_quotes_form_settings_option' );
		submit_button();
		?>
	</form>
</div>

