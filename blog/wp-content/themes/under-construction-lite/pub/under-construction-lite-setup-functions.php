<?php 
 if ( ! function_exists( 'under_construction_lite_setup' ) ) :
function under_construction_lite_setup() {   
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background', array(
		'default-color' => '000000'
	) );	

		$defaults = array(
		'default-image'          => '',
		'default-text-color' => '0065b3',
		'width'                  => 1400,
		'height'                 => 500,
		'uploads'                => true,
		'wp-head-callback'   => 'under_construction_lite_header_style',			
		);
		add_theme_support( 'custom-header', $defaults );

		//custom logo
		 $under_construction_lite_custom_logo = array(
 		'height'      => 56,
 		'width'       => 224,
 		'flex-height' => true,
 		'flex-width'  => true,
 		'header-text' => array( 'site-title', 'site-description' ),
 		);
 	add_theme_support( 'custom-logo', $under_construction_lite_custom_logo );
        add_image_size('under-construction-lite-home-box-size', 400, 250, true); 	
} 
endif; // under_construction_lite_setup
add_action( 'after_setup_theme', 'under_construction_lite_setup' );

if ( ! function_exists( 'under_construction_lite_the_custom_logo' ) ) :
function under_construction_lite_the_custom_logo() {
    the_custom_logo();
}
endif;