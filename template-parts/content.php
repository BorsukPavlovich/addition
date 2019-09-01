<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package addition
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php addition_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) :
			the_content( sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cropsaver' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		else :
			?>
			<a href="<?php echo post_permalink(); ?>">
			<h1><?php the_title(); ?></h1>
		<?php
			$content = get_the_content( sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cropsaver' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			));

		echo '<p>'.substr($content, 0, 485).' ...</p>';
		endif;


		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cropsaver' ),
			'after'  => '</div>',
		) );
		?>
			</a>
	</div><!-- .entry-content -->

	<?php
	if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php
			addition_posted_on();
			addition_posted_by();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php addition_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
