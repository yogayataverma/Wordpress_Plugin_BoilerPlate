<?php
/**
 * Custom Welcome Settings Loader
 *
 * @package WordPress
 * @subpackage Custom_Welcome_Plugin
 * @since 1.0.0
 */

/**
 * Class Custom_Welcome_Settings_Loader
 *
 * A class that loads custom welcome settings.
 */
class Custom_Welcome_Settings_Loader {
	/**
	 * Array of actions to be executed.
	 *
	 * @var array
	 */
	protected $actions;

	/**
	 * Custom_Welcome_Settings_Loader constructor.
	 *
	 * Initializes the actions array.
	 */
	public function __construct() {
		$this->actions = array();
	}

	/**
	 * Add an action to the actions array.
	 *
	 * @param string   $hook      The name of the WordPress action to which the $callback is hooked.
	 * @param string   $component The component containing the callback function.
	 * @param callable $callback  The callback function to execute when the action is triggered.
	 */
	public function add_action( $hook, $component, $callback ) {
		$this->actions[] = array(
			'hook'      => $hook,
			'component' => $component,
			'callback'  => $callback,
		);
	}

	/**
	 * Run all registered actions.
	 *
	 * Loops through the actions array and adds them as WordPress actions.
	 */
	public function run() {
		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}
	}
}
