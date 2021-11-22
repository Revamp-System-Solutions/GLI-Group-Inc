<?php
/**
 * Left sidebar check
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sidebar_pos = get_theme_mod( 'anzu_sidebar_position' );

if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) {
	get_template_part( 'views/sidebar-templates/sidebar', 'left' );
}
?>

<div class="col-md content-area" id="primary">
