<?php

function under_construction_lite_customize_register($wp_customize) {

    $wp_customize->add_section('under_construction_lite_header', array(
        'title'       => esc_html__(' Header Phone and email', 'under-construction-lite'),
        'description' => '',
        'priority'    => 30,
    ));

    $wp_customize->add_section('under_construction_lite_social', array(
        'title'       => esc_html__(' Social Link', 'under-construction-lite'),
        'description' => '',
        'priority'    => 35,
    ));

    $wp_customize->add_section('under_construction_lite_footer', array(
        'title'       => esc_html__(' Footer', 'under-construction-lite'),
        'description' => '',
        'priority'    => 37,
    ));


    //  =============================
    //  = Text Input phone number                =
    //  =============================
    $wp_customize->add_setting('under_construction_lite_phone', array(
        'default'           => '',
        'sanitize_callback' => 'under_construction_lite_sanitize_phone_number'
    ));

    $wp_customize->add_control('under_construction_lite_phone', array(
        'label'   => esc_html__('Phone Number', 'under-construction-lite'),
        'section' => 'under_construction_lite_header',
        'setting' => 'under_construction_lite_phone',
        'type'    => 'text'
    ));

    //  =============================
    //  = Text Input Email                =
    //  =============================
    $wp_customize->add_setting('under_construction_lite_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email'
    ));

    $wp_customize->add_control('under_construction_lite_email', array(
        'label'   => esc_html__('Email', 'under-construction-lite'),
        'section' => 'under_construction_lite_header',
        'setting' => 'under_construction_lite_email',
        'type'    => 'email'
    ));

    //  =============================
    //  = Text Input facebook                =
    //  =============================
    $wp_customize->add_setting('under_construction_lite_fb', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('under_construction_lite_fb', array(
        'label'   => esc_html__('Facebook', 'under-construction-lite'),
        'section' => 'under_construction_lite_social',
        'setting' => 'under_construction_lite_fb',
        'type'    => 'url'
    ));
    //  =============================
    //  = Text Input Twitter                =
    //  =============================
    $wp_customize->add_setting('under_construction_lite_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('under_construction_lite_twitter', array(
        'label'   => esc_html__('Twitter', 'under-construction-lite'),
        'section' => 'under_construction_lite_social',
        'setting' => 'under_construction_lite_twitter',
        'type'    => 'url'
    ));
    //  =============================
    //  = Text Input googleplus                =
    //  =============================
    $wp_customize->add_setting('under_construction_lite_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('under_construction_lite_youtube', array(
        'label'   => esc_html__('YouTube', 'under-construction-lite'),
        'section' => 'under_construction_lite_social',
        'setting' => 'under_construction_lite_youtube',
        'type'    => 'url'
    ));
    //  =============================
    //  = Text Input linkedin                =
    //  =============================
    $wp_customize->add_setting('under_construction_lite_in', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('under_construction_lite_in', array(
        'label'   => esc_html__('Linkedin', 'under-construction-lite'),
        'section' => 'under_construction_lite_social',
        'setting' => 'under_construction_lite_in',
        'type'    => 'url'
    ));

    //  =============================
    //  = Text Input pininterest                =
    //  =============================
    $wp_customize->add_setting('under_construction_lite_pin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('under_construction_lite_pin', array(
        'label'   => esc_html__('Pinterest', 'under-construction-lite'),
        'section' => 'under_construction_lite_social',
        'setting' => 'under_construction_lite_pin',
        'type'    => 'url'
    ));

    

    //  =============================
    //  = Footer              =
    //  =============================
    // Footer design and developed
    $wp_customize->add_setting('under_construction_lite_design', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('under_construction_lite_design', array(
        'label'   => esc_html__('Design and developed', 'under-construction-lite'),
        'section' => 'under_construction_lite_footer',
        'setting' => 'under_construction_lite_design',
        'type'    => 'textarea'
    ));
    // Footer copyright
    $wp_customize->add_setting('under_construction_lite_copyright', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('under_construction_lite_copyright', array(
        'label'   => esc_html__('Copyright', 'under-construction-lite'),
        'section' => 'under_construction_lite_footer',
        'setting' => 'under_construction_lite_copyright',
        'type'    => 'textarea'
    ));
}

add_action('customize_register', 'under_construction_lite_customize_register');