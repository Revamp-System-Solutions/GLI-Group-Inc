<?php
/**
 * The template for displaying search forms
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="visually-hidden-focusable" for="s"><?php esc_html_e( 'Search', 'anzu' ); ?></label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'anzu' ); ?>" value="<?php the_search_query(); ?>">
		<input class="submit btn btn-dark" id="searchsubmit" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'anzu' ); ?>">
	</div>
</form>