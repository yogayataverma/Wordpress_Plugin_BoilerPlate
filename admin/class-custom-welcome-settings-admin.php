<?php
/**
 * Custom Welcome Settings Admin Class
 *
 * @package Custom_Welcome_Plugin
 */

/**
 * Class Custom_Welcome_Settings_Admin
 *
 * Handles the admin settings page for the Custom Welcome Plugin.
 */
class Custom_Welcome_Settings_Admin {
	/**
	 * The name of the plugin.
	 *
	 * @var string
	 */
	private $plugin_name;

	/**
	 * The version of the plugin.
	 *
	 * @var string
	 */
	private $version;

	/**
	 * Constructor.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of the plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Add settings page to the admin menu.
	 */
	public function add_settings_page() {
		add_menu_page( 'Custom Welcome Settings', 'Welcome Settings', 'manage_options', 'custom-welcome-settings', array( $this, 'render_settings_page' ) );
	}

	/**
	 * Render the settings page.
	 */
	public function render_settings_page() {
		include_once 'partials/custom-welcome-settings-admin-display.php';
	}

	/**
	 * Register settings, sections, and fields.
	 */
	public function register_settings() {
		register_setting( 'cwp_settings_group', 'cwp_welcome_message' );
		register_setting( 'cwp_settings_group', 'cwp_background_color' );

		add_settings_section( 'cwp_main_section', 'Main Settings', array( $this, 'section_text' ), 'custom-welcome-settings' );

		add_settings_field( 'cwp_welcome_message', 'Welcome Message', array( $this, 'welcome_message_field' ), 'custom-welcome-settings', 'cwp_main_section' );
		add_settings_field( 'cwp_background_color', 'Background Color', array( $this, 'background_color_field' ), 'custom-welcome-settings', 'cwp_main_section' );
	}

	/**
	 * Display section text.
	 */
	public function section_text() {
		echo '<p>Enter your custom welcome message and select a background color.</p>';
	}

	/**
	 * Display welcome message field.
	 */
	public function welcome_message_field() {
		$message = get_option( 'cwp_welcome_message', '' );
		echo '<input type="text" name="cwp_welcome_message" value="' . esc_attr( $message ) . '" />';
	}

	/**
	 * Display background color field.
	 */
	public function background_color_field() {
		$color = get_option( 'cwp_background_color', '#ffffff' );
		echo '<input type="color" name="cwp_background_color" value="' . esc_attr( $color ) . '" />';
	}
}
