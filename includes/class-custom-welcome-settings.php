<?php
/**
 * Custom Welcome Settings Plugin main file.
 *
 * This file defines the Custom_Welcome_Settings class, which handles the main functionality
 * of the Custom Welcome Settings plugin.
 *
 * @package Custom_Welcome_Settings
 * @since   1.0.0
 */

/**
 * Custom Welcome Settings Plugin main file.
 *
 * This file defines the Custom_Welcome_Settings class, which handles the main functionality
 * of the Custom Welcome Settings plugin.
 *
 * @package    Custom_Welcome_Settings
 * @subpackage Custom_Welcome_Settings/includes
 * @author     Yogayata Verma <yogayatajugnu@gmail.com>
 * @since      1.0.0
 */
class Custom_Welcome_Settings {
	/**
	 * Instance of the plugin loader.
	 *
	 * @var Custom_Welcome_Settings_Loader
	 */
	protected $loader;

	/**
	 * Name of the plugin.
	 *
	 * @var string
	 */
	protected $plugin_name;

	/**
	 * Version of the plugin.
	 *
	 * @var string
	 */
	protected $version;

	/**
	 * Constructor for the Custom_Welcome_Settings class.
	 */
	public function __construct() {
		$this->plugin_name = 'custom-welcome-settings';
		$this->version     = '1.0.0';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Loads required dependency classes.
	 */
	private function load_dependencies() {
		// Require necessary files.
		require_once plugin_dir_path( __DIR__ ) . 'includes/class-custom-welcome-settings-loader.php';
		require_once plugin_dir_path( __DIR__ ) . 'admin/class-custom-welcome-settings-admin.php';
		require_once plugin_dir_path( __DIR__ ) . 'public/class-custom-welcome-settings-public.php';

		// Initialize loader.
		$this->loader = new Custom_Welcome_Settings_Loader();
	}

	/**
	 * Defines hooks for admin-specific actions.
	 */
	private function define_admin_hooks() {
		// Create admin instance.
		$plugin_admin = new Custom_Welcome_Settings_Admin( $this->get_plugin_name(), $this->get_version() );

		// Add settings page.
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_settings_page' );

		// Register settings.
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
	}

	/**
	 * Defines hooks for public-facing actions.
	 */
	private function define_public_hooks() {
		// Create public instance.
		$plugin_public = new Custom_Welcome_Settings_Public( $this->get_plugin_name(), $this->get_version() );

		// Enqueue styles.
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );

		// Display welcome message.
		$this->loader->add_action( 'wp_footer', $plugin_public, 'display_welcome_message' );
	}

	/**
	 * Runs the plugin.
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Retrieves the plugin name.
	 *
	 * @return string Plugin name.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieves the plugin version.
	 *
	 * @return string Plugin version.
	 */
	public function get_version() {
		return $this->version;
	}
}
