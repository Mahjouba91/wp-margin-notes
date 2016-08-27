<?php
namespace BEA\WPMN;

/**
 * The purpose of the main class is to init all the plugin base code like :
 *  - Taxonomies
 *  - Post types
 *  - Shortcodes
 *  - Posts to posts relations etc.
 *  - Loading the text domain
 *
 * Class Main
 * @package BEA\WPMN
 */
class Main {
	/**
	 * Use the trait
	 */
	use Singleton;

	protected function init() {
		add_action( 'init', array( $this, 'init_translations' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_marginotes_lib' ) );
	}

	/**
	 * Load the plugin translation
	 */
	public static function init_translations() {
		// Load translations
		load_plugin_textdomain( 'bea-wp-margin-notes', false, BEA_WPMN_DIR . 'languages' );
	}

	/**
	 * Load margin notes script on singular tpl
	 */
	public function enqueue_marginotes_lib() {
		$script_registration = wp_register_script( 'margin-notes', BEA_WPMN_DIR . 'assets/js/vendor/marginotes.js', array( 'jquery' ), false, true);
		if ( false === $script_registration ) {
			trigger_error( __( 'BEA WP Margin Notes : wp_register_script fails to register assets/js/vendor/marginotes.js', 'bea-wp-margin-notes' ) );
		}

		// Load the script only in singular tpl (pages, posts, cpts)
		if ( is_singular() ) {
			wp_enqueue_script( 'margin-notes' );
		}
	}

}