<?php
/**
 * Plugin uninstallation script.
 *
 * This file is used to uninstall the plugin and delete stored options.
 *
 * @package Custom Welcome Plugin With Code Sniffer
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear stored options.
delete_option( 'cwp_welcome_message' );
delete_option( 'cwp_background_color' );
