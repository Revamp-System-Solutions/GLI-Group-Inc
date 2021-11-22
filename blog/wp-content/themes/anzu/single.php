<?php
/**
 * The template for displaying all single posts
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'anzu_layout_type', 'container' );
$anzu_content_dark_mode = get_theme_mod( 'anzu_content_dark_mode', '' ) ? 'anzu-dark-mode' : 'anzu-light-mode';
$hero = ! empty ( get_post_meta( get_the_ID(), 'anzu_hero_hero-type-and-style', true ) ) ? get_post_meta( get_the_ID(), 'anzu_hero_hero-type-and-style', true ) : '1';
?>

<?php if ($hero != '1') { echo get_template_part( 'views/global-templates/hero' ); } ?>

<div class="anzu-content wrapper <?php echo esc_attr( $anzu_content_dark_mode ); ?>" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'views/global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'views/template-parts/content', 'single' );
					anzu_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'views/global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
