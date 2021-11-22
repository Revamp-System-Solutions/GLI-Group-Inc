<?php

function under_construction_lite_style() {
    wp_enqueue_style('under-construction-lite-basic-style', get_stylesheet_uri());
    wp_enqueue_style('under-construction-lite-style', get_template_directory_uri() . '/view/css/under-construction-lite-main.css');
    wp_enqueue_style('under-construction-lite-responsive', get_template_directory_uri() . '/view/css/under-construction-lite-responsive.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/view/css/font-awesome.css');
    wp_enqueue_script('under-construction-lite-customjs', get_template_directory_uri() . '/view/js/under-construction-lite-customjs.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'under_construction_lite_style');

function under_construction_lite_header_style() {
    $under_construction_lite_header_text_color = get_header_textcolor();
    if (get_theme_support('custom-header', 'default-text-color') === $under_construction_lite_header_text_color) {
        return;
    }
    echo '<style id="under-construction-lite-custom-header-styles" type="text/css">';
    if ('blank' !== $under_construction_lite_header_text_color) {
        echo '.header_top .logo a,
            .blog-post h3 a,
            .blog-post .pageheading h1
			 {
				color: #' . esc_attr($under_construction_lite_header_text_color) . '
			}';
    }
    echo '</style>';
}
