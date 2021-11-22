<?php
/**
 * Right sidebar check
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

</div><!-- #closing the primary container from /views/global-templates/left-sidebar-check.php -->

<?php
$sidebar_pos = get_theme_mod( 'anzu_sidebar_position' );

if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) {
	get_template_part( 'views/sidebar-templates/sidebar', 'right' );
}
