<?php
/**
 * Loads the child theme textdomain.
 */
function elemental_child_theme_setup() {
    load_child_theme_textdomain( 'essential' );
}
add_action( 'after_setup_theme', 'elemental_child_theme_setup' );

/** Enqueue the parent and child theme stylesheets **/
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'elemental-parent-style', get_template_directory_uri().'/style.css' );
    wp_dequeue_style( 'integral_basestylesheet' );
    wp_enqueue_style( 'elemental-child-style', get_stylesheet_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style', 99 );

/**
 * Google Fonts
 */
function elemental_fonts_url() {
    $fonts_url = '';
     
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $muli = _x( 'on', 'Muli font: on or off', 'elemental' );
     
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'elemental' );
     
    if ( 'off' !== $muli || 'off' !== $lato ) {
    $font_families = array();
     
    if ( 'off' !== $muli ) {
    $font_families[] = 'Muli:100,300,400,500,600,700,800';
    }
     
    if ( 'off' !== $lato ) {
    $font_families[] = 'Lato:100,300,400,500,600,700,800';
    }
     
    $query_args = array(
    'family' => urlencode( implode( '|', $font_families ) ),
    'subset' => urlencode( 'latin,latin-ext' ),
    );
     
    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
     
    return esc_url_raw( $fonts_url );
}

function elemental_scripts_styles() {
    wp_enqueue_style( 'elemental-fonts', elemental_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'elemental_scripts_styles' );

/**
 * Change Redux Defaults
 */
if (!function_exists('change_defaults')) {
    function change_defaults($defaults) {
        $defaults['button-color'] = '#5cb85c';
        $defaults['theme-color'] = '#5cb85c';
        $defaults['footer-background'] = '#121a21';
        $defaults['hero-bg'] = array(
                'background-image' => get_stylesheet_directory_uri() . '/images/bg-welcome.jpeg',
                'background-size' => 'cover',
            );
        $defaults['hero-title'] = __('Elemental', 'elemental');
        $defaults['hero-subtitle'] = __('One-Page Business Theme', 'elemental');
        $defaults['hero-tagline'] = __('A one-page theme for freelancers, startups and professionals.
Create a stunning website in minutes.', 'elemental');
        return $defaults;
    }
}
add_filter('redux/options/integral/defaults', 'change_defaults' );

/**
 * Change arguments for Redux Option values
 */
if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {

        $args['menu_title'] = __('Elemental Options', 'elemental');
        $args['page_title'] = __('Elemental Options', 'elemental');

        return $args;
    }
}
add_filter('redux/options/integral/args', 'change_arguments' );

/**
 * Change theme option CSS output settings
 */
function elemental_options_output_css_settings() {
        global $integral;
        $color = $integral['theme-color'];
        $custom_css = ".features .feature i, .services .feature span, .contact ul.socials li a {color: {$color};}";
        wp_add_inline_style( 'elemental-child-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'elemental_options_output_css_settings', 100 );

/**
 * User notice on theme activation
 */
function elemental_admin_notice() {
    global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
    if ( ! get_user_meta($user_id, 'elemental_ignore_notice') ) { ?>
        <div class="notice notice-success elemental-theme-notice">
        <p><?php esc_html_e('Elemental is a child theme of Integral. Make sure you followed the', 'elemental'); ?> <a href="<?php echo esc_url(admin_url('themes.php?page=integral-welcome')); ?>"><?php esc_html_e('Integral Setup Instructions', 'elemental'); ?></a> <?php esc_html_e('before using Elemental. Once setup, use the', 'elemental'); ?> <a href="<?php echo esc_url(admin_url('admin.php?page=Elemental&tab=1')); ?>"><?php esc_html_e('Elemental Options Panel', 'elemental'); ?></a> <?php esc_html_e('to customize your website. Click', 'elemental'); ?> <strong><?php esc_html_e('RESET ALL', 'elemental'); ?></strong> <?php esc_html_e('to load the default settings for this theme. ', 'elemental'); ?></p>
        <a href="<?php echo esc_url( admin_url( '?elemental_nag_ignore=0' ) ); ?>" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice</span></a>
        </div>
    <?php }
}
add_action('admin_notices', 'elemental_admin_notice');

function elemental_nag_ignore() {
    global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['elemental_nag_ignore']) && '0' == $_GET['elemental_nag_ignore'] ) {
             add_user_meta($user_id, 'elemental_ignore_notice', 'true', true);
    }
}
add_action('admin_init', 'elemental_nag_ignore');

function load_elemental_wp_admin_style() {
        wp_register_style( 'elemental_wp_admin_css', get_stylesheet_directory_uri() . '/inc/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'elemental_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_elemental_wp_admin_style' );