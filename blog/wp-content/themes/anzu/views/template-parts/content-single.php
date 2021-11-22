<?php
/**
 * Single post partial template
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$hero = ! empty ( get_post_meta( get_the_ID(), 'anzu_hero_hero-type-and-style', true ) ) ? get_post_meta( get_the_ID(), 'anzu_hero_hero-type-and-style', true ) : '1';

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( $hero == '1' || is_home() ) { ?>

		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">

				<?php anzu_posted_on(); ?>

			</div><!-- .entry-meta -->

		</header><!-- .entry-header -->

		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<?php } ?>


	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'anzu' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php anzu_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
