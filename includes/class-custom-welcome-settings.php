<?php

class Custom_Welcome_Settings {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'custom-welcome-settings';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-custom-welcome-settings-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-custom-welcome-settings-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-custom-welcome-settings-public.php';

        $this->loader = new Custom_Welcome_Settings_Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new Custom_Welcome_Settings_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_menu', $plugin_admin, 'add_settings_page');
        $this->loader->add_action('admin_init', $plugin_admin, 'register_settings');
    }

    private function define_public_hooks() {
        $plugin_public = new Custom_Welcome_Settings_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_footer', $plugin_public, 'display_welcome_message');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }
}
