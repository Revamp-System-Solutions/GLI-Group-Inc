<?php

use Kirki\Compatibility\Init;
use Kirki\Compatibility\Modules;
use Kirki\Compatibility\Framework;
use Kirki\Compatibility\Kirki;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// No need to proceed if Kirki already exists.
if ( class_exists( 'Kirki' ) ) {
	return;
}

if ( ! defined( 'KIRKI_PLUGIN_FILE' ) ) {
	define( 'KIRKI_PLUGIN_FILE', __FILE__ );
}

require_once __DIR__ . '/lib/class-aricolor.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude
require_once __DIR__ . '/lib/class-kirki-color.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude
require_once __DIR__ . '/packages/autoload.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude
require_once __DIR__ . '/inc/bootstrap.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude

// Define the KIRKI_VERSION constant.
if ( ! defined( 'KIRKI_VERSION' ) ) {
	define( 'KIRKI_VERSION', '4.0-dev' );
}

if ( ! function_exists( 'Kirki' ) ) {
	/**
	 * Returns an instance of the Kirki object.
	 */
	function kirki() {
		$kirki = Framework::get_instance();
		return $kirki;
	}
}

// Start Kirki.
global $kirki;
$kirki = kirki();

// Instantiate the modules.
$kirki->modules = new Modules();

// Include the ariColor library.
require_once wp_normalize_path( dirname( __FILE__ ) . '/lib/class-aricolor.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude

// Add an empty config for global fields.
Kirki::add_config( '' );

$custom_config_path = dirname( __FILE__ ) . '/custom-config.php';
$custom_config_path = wp_normalize_path( $custom_config_path );
if ( file_exists( $custom_config_path ) ) {
	require_once $custom_config_path; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude
}
