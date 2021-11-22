<?php

/**
 * @package under construction lite
 */
require_once get_template_directory() . "/pub/under-construction-lite-setup-functions.php";
require_once get_template_directory() . "/lib/under-construction-lite-customization.php";
require_once get_template_directory() . "/pub/under-construction-lite-style-functions.php";
require_once get_template_directory() . "/pub/under-construction-lite-page-functions.php";
if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        do_action('wp_body_open');
    }

}

function under_construction_lite_embed_html($html) {
    return '<div class="video-container">' . $html . '</div>';
}

add_filter('embed_oembed_html', 'under_construction_lite_embed_html', 10, 3);
add_filter('video_embed_html', 'under_construction_lite_embed_html');


function under_construction_lite_sanitize_phone_number($phone) {
    return preg_replace('/[^\d+]/', '', $phone);
}

function under_construction_lite_widgets_init() {

    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'under-construction-lite'),
        'description'   => esc_html__('Appears on sidebar', 'under-construction-lite'),
        'id'            => 'sidebar-1',
        'before_widget' => '',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    ));
}

add_action('widgets_init', 'under_construction_lite_widgets_init');
