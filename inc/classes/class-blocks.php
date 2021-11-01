<?php
/**
 * Registers assets for all blocks, and additional global functionality for gutenberg blocks.
 *
 * @package unlock-protocol
 */

namespace Unlock_Protocol\Inc;

use Unlock_Protocol\Inc\Traits\Singleton;
use Unlock_Protocol\Inc\Blocks\Example_Dynamic_Block;

/**
 * Class Blocks
 *
 * @since 3.0.0
 */
class Blocks {

	use Singleton;

	/**
	 * Construct method.
	 *
	 * @since 3.0.0
	 */
	protected function __construct() {

		$this->setup_hooks();

	}

	/**
	 * Setup hooks.
	 *
	 * @since 3.0.0
	 *
	 * @return void
	 */
	public function setup_hooks() {
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 3.0.0
	 *
	 * @return void
	 */
	public function enqueue_scripts() {

		wp_register_script(
			'unlock-protocol-blocks',
			UNLOCK_PROTOCOL_URL . '/assets/build/js/blocks.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ],
			filemtime( UNLOCK_PROTOCOL_PATH . '/assets/build/js/blocks.js' ),
			true
		);

		wp_enqueue_script( 'unlock-protocol-blocks' );
	}
}
