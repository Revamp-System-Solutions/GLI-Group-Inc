<?php
/**
 * Declaring widgets
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add filter to the parameters passed to a widget's display callback.
 * The filter is evaluated on both the front and the back end!
 *
 * @link https://developer.wordpress.org/reference/hooks/dynamic_sidebar_params/
 */


add_action( 'widgets_init', 'anzu_widgets_init' );

if ( ! function_exists( 'anzu_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function anzu_widgets_init() {

		register_sidebar(
			array(
				'name'          => __( 'Right Sidebar', 'anzu' ),
				'id'            => 'right-sidebar',
				'description'   => __( 'Right sidebar widget area', 'anzu' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Left Sidebar', 'anzu' ),
				'id'            => 'left-sidebar',
				'description'   => __( 'Left sidebar widget area', 'anzu' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		$above_footer_widgets_switch = get_theme_mod( 'above_footer_widgets_switch', '' );
		$main_footer_widgets_switch = get_theme_mod( 'main_footer_widgets_switch', '' );
		$below_footer_widgets_switch = get_theme_mod( 'below_footer_widgets_switch', '' );

		if ( $above_footer_widgets_switch == '1' ) {

			$above_footer_widgets_column = get_theme_mod( 'above_footer_widgets_column', '3' );

			if ( $above_footer_widgets_column >= '1' ) {
				register_sidebar(
					array(
						'name'          => __( 'First Above Footer', 'anzu' ),
						'id'            => 'first-above-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}

			if ( $above_footer_widgets_column >= '2' ) {
				register_sidebar(
					array(
						'name'          => __( 'Second Above Footer', 'anzu' ),
						'id'            => 'second-above-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}

			if ( $above_footer_widgets_column >= '3' ) {
				register_sidebar(
					array(
						'name'          => __( 'Third Above Footer', 'anzu' ),
						'id'            => 'third-above-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}

			if ( $above_footer_widgets_column >= '4' ) {
				register_sidebar(
					array(
						'name'          => __( 'Fourth Above Footer', 'anzu' ),
						'id'            => 'fourth-above-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}

			if ( $above_footer_widgets_column >= '5' ) {
				register_sidebar(
					array(
						'name'          => __( 'Fifth Above Footer', 'anzu' ),
						'id'            => 'fifth-above-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}

			if ( $above_footer_widgets_column >= '6' ) {
				register_sidebar(
					array(
						'name'          => __( 'Sixth Above Footer', 'anzu' ),
						'id'            => 'sixth-above-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}

		}




		if ( $main_footer_widgets_switch == '1' ) {

			$main_footer_widgets_column = get_theme_mod( 'main_footer_widgets_column', '3' );
			
			if ( $main_footer_widgets_column >= '1' ) {
				register_sidebar(
					array(
						'name'          => __( 'First Main Footer', 'anzu' ),
						'id'            => 'first-main-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $main_footer_widgets_column >= '2' ) {
				register_sidebar(
					array(
						'name'          => __( 'Second Main Footer', 'anzu' ),
						'id'            => 'second-main-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $main_footer_widgets_column >= '3' ) {
				register_sidebar(
					array(
						'name'          => __( 'Third Main Footer', 'anzu' ),
						'id'            => 'third-main-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $main_footer_widgets_column >= '4' ) {
				register_sidebar(
					array(
						'name'          => __( 'Fourth Main Footer', 'anzu' ),
						'id'            => 'fourth-main-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $main_footer_widgets_column >= '5' ) {
				register_sidebar(
					array(
						'name'          => __( 'Fifth Main Footer', 'anzu' ),
						'id'            => 'fifth-main-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $main_footer_widgets_column >= '6' ) {
				register_sidebar(
					array(
						'name'          => __( 'Sixth Main Footer', 'anzu' ),
						'id'            => 'sixth-main-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
		}




		if ( $below_footer_widgets_switch == '1' ) {

			$below_footer_widgets_column = get_theme_mod( 'below_footer_widgets_column', '3' );
			
			if ( $below_footer_widgets_column >= '1' ) {
				register_sidebar(
					array(
						'name'          => __( 'First Below Footer', 'anzu' ),
						'id'            => 'first-below-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $below_footer_widgets_column >= '2' ) {
				register_sidebar(
					array(
						'name'          => __( 'Second Below Footer', 'anzu' ),
						'id'            => 'second-below-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $below_footer_widgets_column >= '3' ) {
				register_sidebar(
					array(
						'name'          => __( 'Third Below Footer', 'anzu' ),
						'id'            => 'third-below-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $below_footer_widgets_column >= '4' ) {
				register_sidebar(
					array(
						'name'          => __( 'Fourth Below Footer', 'anzu' ),
						'id'            => 'fourth-below-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $below_footer_widgets_column >= '5' ) {
				register_sidebar(
					array(
						'name'          => __( 'Fifth Below Footer', 'anzu' ),
						'id'            => 'fifth-below-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
			if ( $below_footer_widgets_column >= '6' ) {
				register_sidebar(
					array(
						'name'          => __( 'Sixth Below Footer', 'anzu' ),
						'id'            => 'sixth-below-footer',
						'description'   => __( 'Footer widget area', 'anzu' ),
						'before_widget' => '<div id="%1$s" class="anzu-footer-widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				);
			}
			
		}

	}
} // End of function_exists( 'anzu_widgets_init' ).
