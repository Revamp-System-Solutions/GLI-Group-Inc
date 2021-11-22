<?php
/**
 * Hero setup
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$hero = ! empty ( get_post_meta( get_the_ID(), 'anzu_hero_hero-type-and-style', true ) ) ? get_post_meta( get_the_ID(), 'anzu_hero_hero-type-and-style', true ) : '1';

$hero_content_position =  ! empty ( get_post_meta( get_the_ID(), 'anzu_hero_hero-content-position', true ) ) ? get_post_meta( get_the_ID(), 'anzu_hero_hero-content-position', true ) : 'anzu-hero--center-center';

$hero_background_color = ! empty ( get_post_meta( get_the_ID(), 'anzu_hero_hero-background-color', true ) ) ? get_post_meta( get_the_ID(), 'anzu_hero_hero-background-color', true ) : 'anzu-no-background-color';

$hero_color_opacity = ! empty ( get_post_meta( get_the_ID(), 'anzu_hero_hero-color-opacity', true ) ) ? get_post_meta( get_the_ID(), 'anzu_hero_hero-color-opacity', true ) : 'anzu-no-opacity';

$subheading = ! empty ( get_post_meta( get_the_ID(), 'anzu_hero_subheading', true ) ) ? '<span class="anzu-hero__subheading">'.get_post_meta( get_the_ID(), 'anzu_hero_subheading', true ).'</span>' : '';

if ($hero == '2') { 
    ?>

    <div class="anzu-hero anzu-hero--featured-stretched wrapper <?php echo $hero_content_position; ?>" id="wrapper-hero" style="background-size: cover; background-repeat: no-repeat; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
        <div class="anzu-hero__background-image" style="height: 50vh;">
            <div class="anzu-hero__content container">
                <h1 class="anzu-hero__title"><?php echo get_the_title(); ?></h1>
                <?php echo $subheading; ?>
            </div>
            <div class="anzu-hero__background-color <?php echo $hero_background_color.' '.$hero_color_opacity; ?>"></div>
        </div>
    </div>

    <?php
} else if ($hero == '3') { 
    ?>

    <div class="anzu-hero anzu-hero--featured-stretched wrapper container <?php echo $hero_content_position; ?>" id="wrapper-hero" style="background-size: cover; background-repeat: no-repeat; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
        <div class="anzu-hero__background-image" style="height: 50vh;">
            <div class="anzu-hero__content container">
                <h1 class="anzu-hero__title"><?php echo get_the_title(); ?></h1>
                <?php echo $subheading; ?>
            </div>
            <div class="anzu-hero__background-color <?php echo $hero_background_color.' '.$hero_color_opacity; ?>"></div>
        </div>
    </div>

    <?php
}