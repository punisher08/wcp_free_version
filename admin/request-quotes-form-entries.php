<?php
/**
 * Request Form Display Entrie
 * 
 * @package 	Wordpress_Comparison_Plugin
 * @subpackage 	Wordpress_Comparison_Plugin/admin
 * @since 		1.1.2.1
 * @author 		Netseek Pty Ltd
 */
?>
<div class="navigation-bar-wcp-settings d-flex justify-content-between">
	<div class="tab-title"><?php echo esc_html( get_admin_page_title() ); ?></div>
	<?php $logo = plugin_dir_url( __FILE__ ).'assets/images/wcp-logo.png'; ?>
	<a href="https://wordpresscomparisonplugin.com/" target="_blank"><img src="<?php echo $logo;?>" alt="" class="wcp-logo"></a>
</div>
<div class="wrap">
	<?php
		global $wpdb;
		$request_form_quote_entries = $wpdb->prefix.'request_quotes_entries';
		$result = $wpdb->get_results("SELECT * FROM $request_form_quote_entries");
		echo '<pre>';
		print_r($result);
		echo '</pre>';

	?>
</div>