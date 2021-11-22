<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'anzu_layout_type', 'container' );

$anzu_footer_dark_mode = get_theme_mod( 'anzu_footer_dark_mode', '1' ) ? 'anzu-dark-mode' : 'anzu-light-mode';

$anzu_title_switch = get_theme_mod( 'anzu_title_switch', '' );

$anzu_copyright_switch = get_theme_mod( 'anzu_copyright_switch', '1' );

$site_info_align = $anzu_title_switch != '1' || $anzu_copyright_switch !='1' ? 'justify-content-center' :  'justify-content-between';

/**
 * Footer Copyright
 */
function anzu_footer_copyright() {

	$theme_author = anzu_get_theme_author_details();

	$anzu_copyright = ! empty ( get_theme_mod( 'anzu_copyright' ) ) ? get_theme_mod( 'anzu_copyright' ) : 'Copyright [anzu_copyright] [anzu_current_year] [anzu_site_title] | Powered by [anzu_theme_author]' ;
	
	if ( $anzu_copyright || is_customize_preview() ) {
		echo '<div class="anzu-footer__copyright">';
			$anzu_copyright = str_replace( '[anzu_copyright]', '&copy;', $anzu_copyright );
			$anzu_copyright = str_replace( '[anzu_current_year]', gmdate( 'Y' ), $anzu_copyright );
			$anzu_copyright = str_replace( '[anzu_site_title]', get_bloginfo( 'name' ), $anzu_copyright );
			$anzu_copyright = str_replace( '[anzu_theme_author]', '<a href=" ' . esc_url( $theme_author['anzu_theme_author_url'] ) . '" target="_blank">' . $theme_author['anzu_theme_name'] . '</a>', $anzu_copyright );
				echo do_shortcode( wpautop( $anzu_copyright ) );
		echo '</div>';
	}

}

?>

<footer class="anzu-footer wrapper <?php echo esc_attr( $anzu_footer_dark_mode ); ?>" id="wrapper-footer">

	<?php get_template_part( 'views/sidebar-templates/sidebar', 'footer' ); ?>

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info <?php echo $site_info_align; ?>">

						<?php if ( $anzu_title_switch == '1' ) { ?>
							<div class="anzu-footer__site-name">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>  
							</div>
						<?php } ?>
						
						<?php if ( $anzu_copyright_switch == '1' ) {
							anzu_footer_copyright();
						} ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div>
			<!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

					</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>