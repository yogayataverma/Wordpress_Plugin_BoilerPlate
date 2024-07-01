<?php
/**
 * Custom Welcome Settings Public Class
 *
 * This class handles the public-facing functionality of the plugin.
 *
 * @package Custom_Welcome_Plugin
 */

/**
 * Custom_Welcome_Settings_Public Class
 *
 * Handles public-facing functionality of the plugin.
 */
class Custom_Welcome_Settings_Public {
	/**
	 * The plugin name.
	 *
	 * @var string
	 */
	private $plugin_name;

	/**
	 * The plugin version.
	 *
	 * @var string
	 */
	private $version;

	/**
	 * Custom_Welcome_Settings_Public constructor.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of the plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Enqueue styles for the public-facing side of the site.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-welcome-settings-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Display the custom welcome message.
	 */
	public function display_welcome_message() {
		$message = get_option( 'cwp_welcome_message', 'Welcome to our website!' );
		$color   = get_option( 'cwp_background_color', '#ffffff' );
		echo '<div class="custom-welcome-message" style="background-color: ' . esc_attr( $color ) . ';">' . esc_html( $message ) . '</div>';
	}
}
