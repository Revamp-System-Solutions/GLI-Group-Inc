<?php
/**
 * Anzu enqueue scripts
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'anzu_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function anzu_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/css/anzu.min.css' );
		wp_enqueue_style( 'anzu-styles', get_template_directory_uri() . '/assets/css/anzu.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/js/anzu.min.js' );
		wp_enqueue_script( 'anzu-scripts', get_template_directory_uri() . '/assets/js/anzu.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'anzu_scripts' ).

add_action( 'wp_enqueue_scripts', 'anzu_scripts' );
