<?php

use Kirki\Util\Helper;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki :: add_config ('anzu', array ( 
    'capacity' => 'edit_theme_options', 
    'option_type' => 'option', 
    'option_name' => 'anzu', 
));

/*-----------------------------------------------------------------------------------*/
/*  *.  Colors
/*-----------------------------------------------------------------------------------*/

Kirki::add_panel( 'colors', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Colors', 'anzu' ),
    'description' => esc_html__( 'The color system can help you create a color theme that reflects your brand or style.', 'anzu' ),
) );

Kirki::add_section( 'theme_colors_section', array(
    'title'          => esc_html__( 'Theme Color', 'anzu' ),
    'panel'          => 'colors',
	'description'    => esc_html__( 'The color system can help you create a color theme that reflects your brand or style.', 'anzu' ),
    'priority'       => 160,
) );

Kirki::add_section( 'light_colors_section', array(
    'title'          => esc_html__( 'Light Colors', 'anzu' ),
    'description'    => esc_html__( 'Create and apply color palettes to your UI, as well as measure the accessibility level of any color combination.', 'anzu' ),
    'panel'          => 'colors',
    'priority'       => 160,
) );

Kirki::add_section( 'dark_colors_section', array(
    'title'          => esc_html__( 'Dark Colors', 'anzu' ),
    'description'    => esc_html__( 'Create and apply color palettes to your UI, as well as measure the accessibility level of any color combination.', 'anzu' ),
    'panel'          => 'colors',
    'priority'       => 160,
) );


/*-----------------------------------------------------------------------------------*/
/*  *.  Layout
/*-----------------------------------------------------------------------------------*/

Kirki::add_section( 'layout_section', array(
    'title'          => esc_html__( 'Layout', 'anzu' ),
    'description'    => esc_html__( 'Make a big impression with this clean, modern, and mobile-friendly site.', 'anzu' ),
    'priority'       => 160,
) );


/*-----------------------------------------------------------------------------------*/
/*  *.  Typography
/*-----------------------------------------------------------------------------------*/

Kirki::add_panel( 'typography', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Typography', 'anzu' ),
    'description' => esc_html__( 'Contains sections for all Anzu controls.', 'anzu' ),
) );

Kirki::add_section( 'typography_body', array(
    'title'          => esc_html__( 'Body', 'anzu' ),
    'description'    => esc_html__( 'These settings control the typography for all body text.', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );

Kirki::add_section( 'typography_h1', array(
    'title'          => esc_html__( 'Heading 1 - H1', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );

Kirki::add_section( 'typography_h2', array(
    'title'          => esc_html__( 'Heading 2 - H2', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );

Kirki::add_section( 'typography_h3', array(
    'title'          => esc_html__( 'Heading 3 - H3', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );

Kirki::add_section( 'typography_h4', array(
    'title'          => esc_html__( 'Heading 4 - H4', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );

Kirki::add_section( 'typography_h5', array(
    'title'          => esc_html__( 'Heading 5 - H5', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );

Kirki::add_section( 'typography_h6', array(
    'title'          => esc_html__( 'Heading 6 - H6', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );

Kirki::add_section( 'typography_page_title_section', array(
    'title'          => esc_html__( 'Page Title', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );

Kirki::add_section( 'typography_page_title_subheading_section', array(
    'title'          => esc_html__( 'Page Title Subheading', 'anzu' ),
    'panel'          => 'typography',
    'priority'       => 160,
) );


/*-----------------------------------------------------------------------------------*/
/*  *.  Footer
/*-----------------------------------------------------------------------------------*/

Kirki::add_panel( 'footer', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Footer', 'anzu' ),
    'description' => esc_html__( 'Contains sections for all Anzu controls.', 'anzu' ),
) );

Kirki::add_section( 'above_footer_widgets_section', array(
    'title'          => esc_html__( 'Above Widgets', 'anzu' ),
    'panel'          => 'footer',
    'priority'       => 160,
) );

Kirki::add_section( 'main_footer_widgets_section', array(
    'title'          => esc_html__( 'Main Widgets', 'anzu' ),
    'panel'          => 'footer',
    'priority'       => 160,
) );

Kirki::add_section( 'below_footer_widgets_section', array(
    'title'          => esc_html__( 'Below Widgets', 'anzu' ),
    'panel'          => 'footer',
    'priority'       => 160,
) );

Kirki::add_section( 'footer_bottom_section', array(
    'title'          => esc_html__( 'Footer Bottom', 'anzu' ),
    'panel'          => 'footer',
    'priority'       => 160,
) );


/**
 * Layout Control.
 */
new \Kirki\Field\Select(
	[
		'settings'    => 'anzu_layout_type',
		'label'       => esc_html__( 'Layout Style', 'anzu' ),
		'description' => esc_html__( 'Choose the format that works best for you.', 'anzu' ),
		'section'     => 'layout_section',
		'default'     => 'container',
		'placeholder' => esc_html__( 'Select an option', 'anzu' ),
		'choices'     => [
			'container' => esc_html__( 'Boxed', 'anzu' ),
			'container-fluid' => esc_html__( 'Stretched', 'anzu' ),
		],
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'anzu_sidebar_position',
		'label'       => esc_html__( 'Sidebar Position', 'anzu' ),
		'description' => esc_html__( 'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.', 'anzu' ),
		'section'     => 'layout_section',
		'default'     => 'right',
		'placeholder' => esc_html__( 'Select an option', 'anzu' ),
		'choices'     => [
			'right' => esc_html__( 'Right sidebar', 'anzu' ),
			'left' => esc_html__( 'Left sidebar', 'anzu' ),
			'both' => esc_html__( 'Left & Right sidebars', 'anzu' ),
			'none' => esc_html__( 'No sidebar', 'anzu' ),
		],
	]
);


/**
 * Colors Control.
 */

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'anzu_header_dark_mode',
		'label'       => esc_html__( 'Header Dark Mode', 'anzu' ),
		'section'     => 'theme_colors_section',
		'default'     => false,
	]
);

/*
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'anzu_hero_dark_mode',
		'label'       => esc_html__( 'Hero Dark Mode', 'anzu' ),
		'section'     => 'theme_colors_section',
		'default'     => false,
	]
);
*/

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'anzu_content_dark_mode',
		'label'       => esc_html__( 'Content Dark Mode', 'anzu' ),
		'section'     => 'theme_colors_section',
		'default'     => false,
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'anzu_footer_dark_mode',
		'label'       => esc_html__( 'Footer Dark Mode', 'anzu' ),
		'section'     => 'theme_colors_section',
		'default'     => true,
	]
);


/**
 * Light Colors Control.
 */
new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_primary_color',
		'label'       => __( 'Primary Color', 'anzu' ),
		'description' => esc_html__( 'Pick a primary color for the theme.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#0000FF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '
				.anzu-primary-color--color, 
				.anzu-light-mode a.anzu-brand__url,
				.anzu-light-mode #main-menu .nav-item.active .nav-link, 
				.anzu-light-mode #main-menu .nav-item:not(.active):hover > .nav-link, 
				.anzu-light-mode #main-menu .dropdown .dropdown-item:hover, 
				.anzu-light-mode article.post .entry-title a:hover',
				'property' => 'color',
			),
			array(
				'element'  => '.anzu-primary-color--background-color',
				'property' => 'background-color',
			),
			array(
				'element'  => '.anzu-primary-color--border-color',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_secondary_color',
		'label'       => __( 'Secondary Color', 'anzu' ),
		'description' => esc_html__( 'Pick a secondary color for the theme.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#FF6819',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-light-mode .anzu-secondary-color--color',
				'property' => 'color',
			),
			array(
				'element'  => '.anzu-light-mode .anzu-secondary-color--background-color',
				'property' => 'background-color',
			),
			array(
				'element'  => '.anzu-light-mode .anzu-secondary-color--border-color',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_tertiary_color',
		'label'       => __( 'Tertiary Color', 'anzu' ),
		'description' => esc_html__( 'Pick a tertiary color for the theme.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#3FCC14',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-light-mode .anzu-tertiary-color--color',
				'property' => 'color',
			),
			array(
				'element'  => '.anzu-light-mode .anzu-tertiary-color--background-color',
				'property' => 'background-color',
			),
			array(
				'element'  => '.anzu-light-mode .anzu-tertiary-color--border-color',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_text_color',
		'label'       => __( 'Text', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the texts.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#333333',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => 'body .anzu-light-mode, .anzu-light-mode p, .anzu-light-mode span',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_heading_color',
		'label'       => __( 'Heading (H1 - H6)', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the headings.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '
				.anzu-light-mode h1, 
				.anzu-light-mode h2, 
				.anzu-light-mode h3, 
				.anzu-light-mode h4, 
				.anzu-light-mode h5, 
				.anzu-light-mode h6',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_link_color',
		'label'       => __( 'Link', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the links.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#0000FF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-light-mode a:not(.btn)',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_link_hover_color',
		'label'       => __( 'Link Hover', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the links.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#0D4DFF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-light-mode a:hover:not(.btn)',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_link_active_color',
		'label'       => __( 'Link Active', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the links.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#0D8CFF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-light-mode a:active:not(.btn)',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_background_header',
		'label'       => __( 'Background Header', 'anzu' ),
		'description' => esc_html__( 'Pick a background light color for the theme.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#FFFFFF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-header.anzu-light-mode',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_background_content',
		'label'       => __( 'Background Content', 'anzu' ),
		'description' => esc_html__( 'Pick a background light color for the theme.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#FFFFFF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-content.anzu-light-mode',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_light_colors_background_footer',
		'label'       => __( 'Background Footer', 'anzu' ),
		'description' => esc_html__( 'Pick a background light color for the theme.', 'anzu' ),
		'section'     => 'light_colors_section',
		'default'     => '#FFFFFF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-footer.anzu-light-mode',
				'property' => 'background-color',
			),
		),
	]
);


/**
 * Dark Colors Control.
 */
new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_primary_color',
		'label'       => __( 'Primary Color', 'anzu' ),
		'description' => esc_html__( 'Pick a primary color for the theme.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#0000FF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '
				.anzu-primary-color--color, 
				.anzu-dark-mode a.anzu-brand__url,
				.anzu-dark-mode #main-menu .nav-item.active .nav-link, 
				.anzu-dark-mode #main-menu .nav-item:not(.active):hover > .nav-link, 
				.anzu-dark-mode #main-menu .dropdown .dropdown-item:hover, 
				.anzu-dark-mode article.post .entry-title a:hover',
				'property' => 'color',
			),
			array(
				'element'  => '.anzu-primary-color--background-color',
				'property' => 'background-color',
			),
			array(
				'element'  => '.anzu-primary-color--border-color',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_secondary_color',
		'label'       => __( 'Secondary Color', 'anzu' ),
		'description' => esc_html__( 'Pick a secondary color for the theme.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#FF6819',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-dark-mode .anzu-secondary-color--color',
				'property' => 'color',
			),
			array(
				'element'  => '.anzu-dark-mode .anzu-secondary-color--background-color',
				'property' => 'background-color',
			),
			array(
				'element'  => '.anzu-dark-mode .anzu-secondary-color--border-color',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_tertiary_color',
		'label'       => __( 'Tertiary Color', 'anzu' ),
		'description' => esc_html__( 'Pick a tertiary color for the theme.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#3FCC14',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-dark-mode .anzu-tertiary-color--color',
				'property' => 'color',
			),
			array(
				'element'  => '.anzu-dark-mode .anzu-tertiary-color--background-color',
				'property' => 'background-color',
			),
			array(
				'element'  => '.anzu-dark-mode .anzu-tertiary-color--border-color',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_text_color',
		'label'       => __( 'Text', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the texts.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#cccccc',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => 'body .anzu-dark-mode, .anzu-dark-mode p, .anzu-dark-mode span',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_heading_color',
		'label'       => __( 'Heading (H1 - H6)', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the headings.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#FFFFFF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '
				.anzu-dark-mode h1, 
				.anzu-dark-mode h2, 
				.anzu-dark-mode h3, 
				.anzu-dark-mode h4, 
				.anzu-dark-mode h5, 
				.anzu-dark-mode h6',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_link_color',
		'label'       => __( 'Link', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the links.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#0000FF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-dark-mode a:not(.btn)',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_link_hover_color',
		'label'       => __( 'Link Hover', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the links.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#0D4DFF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-dark-mode a:hover:not(.btn)',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_link_active_color',
		'label'       => __( 'Link Active', 'anzu' ),
		'description' => esc_html__( 'It will apply to all the links.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#0D8CFF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-dark-mode a:active:not(.btn)',
				'property' => 'color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_background_header',
		'label'       => __( 'Background Header', 'anzu' ),
		'description' => esc_html__( 'Pick a background dark color for the theme.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-header.anzu-dark-mode',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_background_content',
		'label'       => __( 'Background Content', 'anzu' ),
		'description' => esc_html__( 'Pick a background dark color for the theme.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-content.anzu-dark-mode',
				'property' => 'background-color',
			),
		),
	]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'anzu_dark_colors_background_footer',
		'label'       => __( 'Background Footer', 'anzu' ),
		'description' => esc_html__( 'Pick a background dark color for the theme.', 'anzu' ),
		'section'     => 'dark_colors_section',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.anzu-footer.anzu-dark-mode',
				'property' => 'background-color',
			),
		),
	]
);


/**
 * Typography Control.
 */
new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_body',
		'label'       => esc_html__( 'Body', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography for all body text.', 'anzu' ),
		'section'     => 'typography_body',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => 'body, p, span',
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_heading_1',
		'label'       => esc_html__( 'Heading 1', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography for all H1 headers.', 'anzu' ),
		'section'     => 'typography_h1',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => [ 'h1' ],
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_heading_2',
		'label'       => esc_html__( 'Heading 2', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography for all H2 headers.', 'anzu' ),
		'section'     => 'typography_h2',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => [ 'h2' ],
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_heading_3',
		'label'       => esc_html__( 'Heading 3', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography for all H3 headers.', 'anzu' ),
		'section'     => 'typography_h3',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => [ 'h3' ],
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_heading_4',
		'label'       => esc_html__( 'Heading 4', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography for all H4 headers.', 'anzu' ),
		'section'     => 'typography_h4',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => [ 'h4' ],
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_heading_5',
		'label'       => esc_html__( 'Heading 5', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography for all H5 headers.', 'anzu' ),
		'section'     => 'typography_h5',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => [ 'h5' ],
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_heading_6',
		'label'       => esc_html__( 'Heading 6', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography for all H6 headers.', 'anzu' ),
		'section'     => 'typography_h6',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => [ 'h6' ],
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_page_title',
		'label'       => esc_html__( 'Page Title', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography of all page titles.', 'anzu' ),
		'section'     => 'typography_page_title_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => [ '#page .anzu-hero__title' ],
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'    => 'anzu_typography_page_title_subheading',
		'label'       => esc_html__( 'Page Title Subheading', 'anzu' ),
		'description' => esc_html__( 'These settings control the typography of all page title subheadings.', 'anzu' ),
		'section'     => 'typography_page_title_subheading_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-size'       => '',
			'font-style'      => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
			'margin-top'      => '',
			'margin-bottom'   => '',
		],
		'output'      => [
			[
				'element' => [ '#page .anzu-hero__subheading' ],
			],
		],
	]
);


/**
 * Footer Control.
 */

// Above Footer
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'above_footer_widgets_switch',
		'label'       => esc_html__( 'Enable Above Footer', 'anzu' ),
		'section'     => 'above_footer_widgets_section',
		'default'     => false,
	]
);
new \Kirki\Field\Select(
	[
		'settings'    => 'above_footer_widgets_column',
		'label'       => esc_html__( 'Select Control', 'anzu' ),
		'section'     => 'above_footer_widgets_section',
		'default'     => '3',
		'placeholder' => esc_html__( 'Select an option', 'anzu' ),
		'choices'     => [
			'1' => esc_html__( '1 Column', 'anzu' ),
			'2' => esc_html__( '2 Columns', 'anzu' ),
			'3' => esc_html__( '3 Columns', 'anzu' ),
			'4' => esc_html__( '4 Columns', 'anzu' ),
			'5' => esc_html__( '5 Columns', 'anzu' ),
			'6' => esc_html__( '6 Columns', 'anzu' ),
		],
		'active_callback' => [
			[
				'setting'  => 'above_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'above_footer_widgets_layout_1',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'above_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/12.png', 
		],
		'active_callback' => [
			[
				'setting'  => 'above_footer_widgets_column',
				'operator' => '==',
				'value'    => '1',
			],
			[
				'setting'  => 'above_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'above_footer_widgets_layout_2',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'above_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/6-6.png', 
			'2'    => ANZU_THEME_URI . '/inc/customizer./assets/img/8-4.png', 
			'3'    => ANZU_THEME_URI . '/inc/customizer./assets/img/4-8.png', 
			'4'    => ANZU_THEME_URI . '/inc/customizer./assets/img/9-3.png', 
			'5'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-9.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'above_footer_widgets_column',
				'operator' => '==',
				'value'    => '2',
			],
			[
				'setting'  => 'above_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'above_footer_widgets_layout_3',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'above_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/4-4-4.png',
			'2'   => ANZU_THEME_URI . '/inc/customizer./assets/img/6-3-3.png', 
			'3'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-3-6.png', 
			'4'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-6-3.png', 
			'5'   => ANZU_THEME_URI . '/inc/customizer./assets/img/2-8-2.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'above_footer_widgets_column',
				'operator' => '==',
				'value'    => '3',
			],
			[
				'setting'  => 'above_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);


new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'above_footer_widgets_layout_4',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'above_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/3-3-3-3.png', 
			'2'    => ANZU_THEME_URI . '/inc/customizer./assets/img/6-2-2-2.png', 
			'3'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2-2-2-6.png',   
		],
		'active_callback' => [
			[
				'setting'  => 'above_footer_widgets_column',
				'operator' => '==',
				'value'    => '4',
			],
			[
				'setting'  => 'above_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'above_footer_widgets_layout_5',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'above_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2.4-2.4-2.4-2.4-2.4.png', 
		],
		'active_callback' => [
			[
				'setting'  => 'above_footer_widgets_column',
				'operator' => '==',
				'value'    => '5',
			],
			[
				'setting'  => 'above_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'above_footer_widgets_layout_6',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'above_footer_widgets_section',
		'default'     => '1',
		'choices'     => [ 
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2-2-2-2-2-2.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'above_footer_widgets_column',
				'operator' => '==',
				'value'    => '6',
			],
			[
				'setting'  => 'above_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);


// Main Footer
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'main_footer_widgets_switch',
		'label'       => esc_html__( 'Enable Main Footer', 'anzu' ),
		'section'     => 'main_footer_widgets_section',
		'default'     => false,
	]
);
new \Kirki\Field\Select(
	[
		'settings'    => 'main_footer_widgets_column',
		'label'       => esc_html__( 'Select Control', 'anzu' ),
		'section'     => 'main_footer_widgets_section',
		'default'     => '3',
		'placeholder' => esc_html__( 'Select an option', 'anzu' ),
		'choices'     => [
			'1' => esc_html__( '1 Column', 'anzu' ),
			'2' => esc_html__( '2 Columns', 'anzu' ),
			'3' => esc_html__( '3 Columns', 'anzu' ),
			'4' => esc_html__( '4 Columns', 'anzu' ),
			'5' => esc_html__( '5 Columns', 'anzu' ),
			'6' => esc_html__( '6 Columns', 'anzu' ),
		],
		'active_callback' => [
			[
				'setting'  => 'main_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'main_footer_widgets_layout_1',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'main_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/12.png', 
		],
		'active_callback' => [
			[
				'setting'  => 'main_footer_widgets_column',
				'operator' => '==',
				'value'    => '1',
			],
			[
				'setting'  => 'main_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'main_footer_widgets_layout_2',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'main_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/6-6.png', 
			'2'    => ANZU_THEME_URI . '/inc/customizer./assets/img/8-4.png', 
			'3'    => ANZU_THEME_URI . '/inc/customizer./assets/img/4-8.png', 
			'4'    => ANZU_THEME_URI . '/inc/customizer./assets/img/9-3.png', 
			'5'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-9.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'main_footer_widgets_column',
				'operator' => '==',
				'value'    => '2',
			],
			[
				'setting'  => 'main_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'main_footer_widgets_layout_3',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'main_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/4-4-4.png',
			'2'   => ANZU_THEME_URI . '/inc/customizer./assets/img/6-3-3.png', 
			'3'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-3-6.png', 
			'4'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-6-3.png', 
			'5'   => ANZU_THEME_URI . '/inc/customizer./assets/img/2-8-2.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'main_footer_widgets_column',
				'operator' => '==',
				'value'    => '3',
			],
			[
				'setting'  => 'main_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);


new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'main_footer_widgets_layout_4',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'main_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/3-3-3-3.png', 
			'2'    => ANZU_THEME_URI . '/inc/customizer./assets/img/6-2-2-2.png', 
			'3'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2-2-2-6.png',   
		],
		'active_callback' => [
			[
				'setting'  => 'main_footer_widgets_column',
				'operator' => '==',
				'value'    => '4',
			],
			[
				'setting'  => 'main_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'main_footer_widgets_layout_5',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'main_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2.4-2.4-2.4-2.4-2.4.png', 
		],
		'active_callback' => [
			[
				'setting'  => 'main_footer_widgets_column',
				'operator' => '==',
				'value'    => '5',
			],
			[
				'setting'  => 'main_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'main_footer_widgets_layout_6',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'main_footer_widgets_section',
		'default'     => '1',
		'choices'     => [ 
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2-2-2-2-2-2.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'main_footer_widgets_column',
				'operator' => '==',
				'value'    => '6',
			],
			[
				'setting'  => 'main_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);


// Below Footer
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'below_footer_widgets_switch',
		'label'       => esc_html__( 'Enable Below Footer', 'anzu' ),
		'section'     => 'below_footer_widgets_section',
		'default'     => false,
	]
);
new \Kirki\Field\Select(
	[
		'settings'    => 'below_footer_widgets_column',
		'label'       => esc_html__( 'Select Control', 'anzu' ),
		'section'     => 'below_footer_widgets_section',
		'default'     => '3',
		'placeholder' => esc_html__( 'Select an option', 'anzu' ),
		'choices'     => [
			'1' => esc_html__( '1 Column', 'anzu' ),
			'2' => esc_html__( '2 Columns', 'anzu' ),
			'3' => esc_html__( '3 Columns', 'anzu' ),
			'4' => esc_html__( '4 Columns', 'anzu' ),
			'5' => esc_html__( '5 Columns', 'anzu' ),
			'6' => esc_html__( '6 Columns', 'anzu' ),
		],
		'active_callback' => [
			[
				'setting'  => 'below_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'below_footer_widgets_layout_1',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'below_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/12.png', 
		],
		'active_callback' => [
			[
				'setting'  => 'below_footer_widgets_column',
				'operator' => '==',
				'value'    => '1',
			],
			[
				'setting'  => 'below_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'below_footer_widgets_layout_2',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'below_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/6-6.png', 
			'2'    => ANZU_THEME_URI . '/inc/customizer./assets/img/8-4.png', 
			'3'    => ANZU_THEME_URI . '/inc/customizer./assets/img/4-8.png', 
			'4'    => ANZU_THEME_URI . '/inc/customizer./assets/img/9-3.png', 
			'5'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-9.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'below_footer_widgets_column',
				'operator' => '==',
				'value'    => '2',
			],
			[
				'setting'  => 'below_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'below_footer_widgets_layout_3',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'below_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/4-4-4.png',
			'2'   => ANZU_THEME_URI . '/inc/customizer./assets/img/6-3-3.png', 
			'3'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-3-6.png', 
			'4'   => ANZU_THEME_URI . '/inc/customizer./assets/img/3-6-3.png', 
			'5'   => ANZU_THEME_URI . '/inc/customizer./assets/img/2-8-2.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'below_footer_widgets_column',
				'operator' => '==',
				'value'    => '3',
			],
			[
				'setting'  => 'below_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);


new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'below_footer_widgets_layout_4',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'below_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/3-3-3-3.png', 
			'2'    => ANZU_THEME_URI . '/inc/customizer./assets/img/6-2-2-2.png', 
			'3'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2-2-2-6.png',   
		],
		'active_callback' => [
			[
				'setting'  => 'below_footer_widgets_column',
				'operator' => '==',
				'value'    => '4',
			],
			[
				'setting'  => 'below_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'below_footer_widgets_layout_5',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'below_footer_widgets_section',
		'default'     => '1',
		'choices'     => [
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2.4-2.4-2.4-2.4-2.4.png', 
		],
		'active_callback' => [
			[
				'setting'  => 'below_footer_widgets_column',
				'operator' => '==',
				'value'    => '5',
			],
			[
				'setting'  => 'below_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'below_footer_widgets_layout_6',
		'label'       => esc_html__( 'Layout', 'anzu' ),
		'section'     => 'below_footer_widgets_section',
		'default'     => '1',
		'choices'     => [ 
			'1'    => ANZU_THEME_URI . '/inc/customizer./assets/img/2-2-2-2-2-2.png',  
		],
		'active_callback' => [
			[
				'setting'  => 'below_footer_widgets_column',
				'operator' => '==',
				'value'    => '6',
			],
			[
				'setting'  => 'below_footer_widgets_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
);


// Copyright Footer
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'anzu_copyright_switch',
		'label'       => esc_html__( 'Enable Copyright', 'anzu' ),
		'section'     => 'footer_bottom_section',
		'default'     => true,
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'anzu_title_switch',
		'label'       => esc_html__( 'Enable Site Title', 'anzu' ),
		'section'     => 'footer_bottom_section',
		'default'     => false,
	]
);

new \Kirki\Field\Editor(
	[
		'settings'    => 'anzu_copyright',
		'label'       => esc_html__( 'Copyright', 'anzu' ),
		'section'     => 'footer_bottom_section',
		'default'     => 'Copyright [anzu_copyright] [anzu_current_year] [anzu_site_title] | Powered by [anzu_theme_author]',
		'active_callback' => [
			[
				'setting'  => 'anzu_copyright_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	],
);

new \Kirki\Field\Dimensions(
	[
		'settings'    => 'anzu_copyright_height',
		'label'       => esc_html__( 'Height', 'anzu' ),
		'section'     => 'footer_bottom_section',
		'default'     => [
			'min-height' => '80px',
		],
		'output'      => [
			[
				'element' => '.anzu-footer .site-info',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'anzu_copyright_switch',
				'operator' => '==',
				'value'    => true,
			]
		],
	]
	
);