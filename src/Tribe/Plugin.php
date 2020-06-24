<?php
namespace Tribe\Extensions\User_Timezone;

/**
 * Class Plugin
 *
 * @since 0.1
 *
 * @package Tribe\Extensions\User_Timezone
 */
class Plugin extends \tad_DI52_ServiceProvider {
	/**
	 * Stores the version for the plugin.
	 *
	 * @since 0.1
	 *
	 * @var string
	 */
	const VERSION = '0.1';

	/**
	 * Stores the base slug for the plugin.
	 *
	 * @since 0.1
	 *
	 * @var string
	 */
	const SLUG = 'user_timezone';

	/**
	 * Stores the base slug for the extension.
	 *
	 * @since 0.1
	 *
	 * @var string
	 */
	const FILE = TRIBE_EXTENSION_USER_TIMEZONE_FILE;

	/**
	 * @since 0.1
	 *
	 * @var string Plugin Directory.
	 */
	public $plugin_dir;

	/**
	 * @since 0.1
	 *
	 * @var string Plugin path.
	 */
	public $plugin_path;

	/**
	 * @since 0.1
	 *
	 * @var string Plugin URL.
	 */
	public $plugin_url;

	/**
	 * Setup the Extension's properties.
	 *
	 * This always executes even if the required plugins are not present.
	 *
	 * @since 0.1
	 */
	public function register() {
		// Set up the plugin provider properties.
		$this->plugin_path = trailingslashit( dirname( static::FILE ) );
		$this->plugin_dir  = trailingslashit( basename( $this->plugin_path ) );
		$this->plugin_url  = plugins_url( $this->plugin_dir, $this->plugin_path );

		// Register this provider as the main one and use a bunch of aliases.
		$this->container->singleton( static::class, $this );
		$this->container->singleton( 'extension.user_timezone', $this );
		$this->container->singleton( 'extension.user_timezone.plugin', $this );

		if ( ! $this->check_plugin_dependencies() ) {
			// If the plugin dependency manifest is not met, then bail and stop here.
			return;
		}

		// Start binds.



		// End binds.

		$this->container->register( Hooks::class );
		$this->container->register( Assets::class );
	}

	/**
	 * Checks whether the plugin dependency manifest is satisfied or not.
	 *
	 * @since 0.1
	 *
	 * @return bool Whether the plugin dependency manifest is satisfied or not.
	 */
	protected function check_plugin_dependencies() {
		$this->register_plugin_dependencies();

		if ( ! tribe_check_plugin( static::class ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Registers the plugin and dependency manifest among those managed by Tribe Common.
	 *
	 * @since 0.1
	 */
	protected function register_plugin_dependencies() {
		$plugin_register = new Plugin_Register();
		$plugin_register->register_plugin();

		$this->container->singleton( Plugin_Register::class, $plugin_register );
		$this->container->singleton( 'extension.user_timezone', $plugin_register );
	}
}
