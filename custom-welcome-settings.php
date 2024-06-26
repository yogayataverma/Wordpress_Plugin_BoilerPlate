<?php
/*
Plugin Name: Custom Welcome Plugin
Description: A plugin to set a custom welcome message and background color.
Version: 1.0
Author: Yogayata Verma
*/

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/class-custom-welcome-settings-activator.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-custom-welcome-settings-deactivator.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-custom-welcome-settings.php';

// Activation and deactivation hooks
register_activation_hook(__FILE__, array('Custom_Welcome_Settings_Activator', 'activate'));
register_deactivation_hook(__FILE__, array('Custom_Welcome_Settings_Deactivator', 'deactivate'));

// Initialize the plugin
function run_custom_welcome_settings() {
    $plugin = new Custom_Welcome_Settings();
    $plugin->run();
}
run_custom_welcome_settings();
