<?php

class Custom_Welcome_Settings_Public {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/custom-welcome-settings-public.css', array(), $this->version, 'all');
    }

    public function display_welcome_message() {
        $message = get_option('cwp_welcome_message', 'Welcome to our website!');
        $color = get_option('cwp_background_color', '#ffffff');
        echo '<div class="custom-welcome-message" style="background-color: ' . esc_attr($color) . ';">' . esc_html($message) . '</div>';
    }
}
