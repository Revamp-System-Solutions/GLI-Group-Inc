<?php

// don't load directly
defined( 'ABSPATH' ) || exit;

final class Borderless_Elementor {

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );

	}

	public function on_plugins_loaded() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}

	public function is_compatible() {

		return true;

	}

	public function init() {

		wp_register_style(
			'font-awesome-5',
			ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css',
			false,
			BORDERLESS__VERSION
		);

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		//add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_borderless_elementor_category' ] );

	}

	public function init_widgets() {

		// Include Widget files
		require_once('helper.php');
        require_once('widgets/contact-form-7.php');
		//require_once('widgets/posts.php');
		require_once('widgets/team-member.php');
		require_once('widgets/testimonial.php');

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Contact_Form_7() );
		//\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Posts() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Team_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Testimonial() );

	}

	/*
	public function init_controls() {

		// Include Control files
		require_once( __DIR__ . '/controls/test-control.php' );

		// Register control
		\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );

	}
	*/

	public function register_borderless_elementor_category( $elements_manager ) {
		$elements_manager->add_category(
			'borderless',
			[
				'title' => __( 'Borderless', 'borderless' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

}

Borderless_Elementor::instance();