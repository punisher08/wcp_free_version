<?php

?>
<div class="wrap">
	<form method="post" action="options.php" enctype="multipart/form-data"> 
        <?php
		settings_fields( 'register_field_groups_option' );
		do_settings_sections( 'register_field_groups_option' );
		submit_button();
		?>
	</form>
</div>