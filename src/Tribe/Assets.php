<?php
/**
 * Handles registering all Assets for the Events Virtual Plugin.
 *
 * To remove a Asset you can use the global assets handler:
 *
 * ```php
 *  tribe( 'assets' )->remove( 'asset-name' );
 * ```
 *
 * @since 0.1
 *
 * @package Tribe\Events\Virtual
 */
namespace Tribe\Extensions\User_Timezone;

/**
 * Register Assets.
 *
 * @since 0.1
 *
 * @package Tribe\Extensions\User_Timezone
 */
class Assets extends \tad_DI52_ServiceProvider {
	/**
	 * Binds and sets up implementations.
	 *
	 * @since 0.1
	 */
	public function register() {
		$this->container->singleton( static::class, $this );
		$this->container->singleton( 'extension.user_timezone.assets', $this );

		$plugin = tribe( Plugin::class );

	}

	/**
	 * Enqueue assets and localize scripts.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function enqueue() {
		tribe_asset(
			tribe( 'tec.main' ),
			'tribe_ext_user_timezone_script',
			plugins_url( '/src/resources/js/tribe-ext-user-timezone.js', __FILE__ ),
			['jquery' ],
			'init'
		);

		tribe_asset(
			tribe( 'tec.main' ),
			'tribe_ext_user_timezone_style',
			plugins_url( '/src/resources/css/tribe-ext-user-timezone.css', __FILE__ ),
			[],
			'init'
		);
	}
}
