<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package Anzu
 */

add_action( 'tgmpa_register', 'anzu_tgmpa_register' );

function anzu_tgmpa_register() {
	
	// Get array of recommended plugins.
	$plugins = array(

		array(
			'name'      => 'Borderless',
			'slug'      => 'borderless',
			'required'  => false,
			'force_activation'	=> false,
		),

	);
	
	$config = array(
		'id'           => 'anzu',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'is_automatic' => true,  
	);

	tgmpa( $plugins, $config );
}
