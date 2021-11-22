<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Anzu
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$hero = ! empty ( get_post_meta( get_the_ID(), 'anzu_hero_hero-type-and-style', true ) ) ? get_post_meta( get_the_ID(), 'anzu_hero_hero-type-and-style', true ) : '1';

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( $hero == '1'|| is_home() ) { ?>

		<header class="entry-header">

			<?php
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>

			<?php if ( 'post' === get_post_type() ) : ?>

				<div class="entry-meta">
					<?php anzu_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->

		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<?php } ?>

	<div class="entry-content">

		<?php the_excerpt(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'anzu' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
