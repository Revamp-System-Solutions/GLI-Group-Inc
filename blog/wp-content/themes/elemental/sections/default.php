<?php
/**
 * Hero section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<section id="welcome" class="hero default">

    <div class="blacklayer"></div>

    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12">
                
                <h1><?php echo esc_html(get_theme_mod( 'integral_default_header_title1', __( 'Elegant', 'elemental' ) ) ); ?></h1>
                
                <h2><?php echo esc_html(get_theme_mod( 'integral_default_header_title2', __( 'Business Theme', 'elemental' ) ) ); ?></h2>
                
                <div class="lead text-center">
                    <p><?php echo wp_kses_post(get_theme_mod( 'integral_default_header_tagline', __( 'A one-page theme for professionals, agencies and businesses.<br />Create a stunning website in minutes.', 'elemental' ) ) ); ?></p>
                </div>              
                
                <?php if ( get_theme_mod( 'integral_default_header_btn1_toggle' ) == '') { ?>
                    <a href="<?php echo esc_url(get_theme_mod( 'integral_default_header_btn1url', '#' ) ); ?>" class="btn btn-lg btn-secondary"><?php echo esc_html(get_theme_mod( 'integral_default_header_btn1', __( 'View Features', 'elemental' ) ) ); ?></a>
                <?php } ?>
                
                <?php if ( get_theme_mod( 'integral_default_header_btn2_toggle' ) == '') { ?>
                    <a href="<?php echo esc_url(get_theme_mod( 'integral_default_header_btn2url', '#' ) ); ?>" class="btn btn-lg btn-primary"><?php echo esc_html(get_theme_mod( 'integral_default_header_btn2', __( 'Download Now', 'elemental' ) ) ); ?></a>
                <?php } ?>
            
            </div>
        
        </div>
    
    </div>

</section><!--hero-->