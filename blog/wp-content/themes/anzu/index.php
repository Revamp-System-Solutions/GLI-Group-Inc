<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'anzu_layout_type', 'container' );
$anzu_content_dark_mode = get_theme_mod( 'anzu_content_dark_mode', '' ) ? 'anzu-dark-mode' : 'anzu-light-mode';
?>

<div class="anzu-content wrapper <?php echo esc_attr( $anzu_content_dark_mode ); ?>" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'views/global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				if ( have_posts() ) {
					// Start the Loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'views/template-parts/content', get_post_format() );
					}
				} else {
					get_template_part( 'views/template-parts/content', 'none' );
				}
				?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php anzu_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'views/global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
