<?php
/**
 * Display the custom welcome settings admin page
 *
 * This file is responsible for displaying the admin interface for
 * the Custom Welcome Plugin settings.
 *
 * @package Custom_Welcome_Plugin
 */

?>

<div class="wrap">
	<h1>Custom Welcome Settings</h1>
	<form method="post" action="options.php">
		<?php
		settings_fields( 'cwp_settings_group' );
		do_settings_sections( 'custom-welcome-settings' );
		submit_button();
		?>
	</form>
</div>
