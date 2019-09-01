<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package addition
 */

if ( ! function_exists( 'addition_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function addition_posted_on() {
		$time_string = __( 'Posted on %s' ).'<a href="'.esc_url( get_permalink() ).'" rel="bookmark"><time
		class="entry-date published updated" datetime="%1$s">%2$s</time></a>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = __( 'Posted on' ).' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><time class="entry-date published" datetime="%1$s">%2$s</time> </a> '.__('Edited on').' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><time class="updated" datetime="%3$s">%4$s</time></a>';
		}

//		echo the_weekday(),
//			 get_the_date('Y'),
//			the_date('F m'),
//			 the_date('F d');
//			esc_attr( get_the_modified_date( DATE_W3C ) ).'asd',
//			esc_html( get_the_modified_date() ).'asd';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_post_time('l F j, Y', true, get_the_ID(), true) ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( date_i18n('l F j, Y', get_post_modified_time()))
		);

		echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'addition_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function addition_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			__( 'Author %s'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'addition_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function addition_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'cropsaver' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( __('Posted in %1$s'), 'cropsaver' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'cropsaver' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cropsaver' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'cropsaver' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'addition_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function addition_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<div class="image" style="background-image: url(<?php the_post_thumbnail_url( ); ?>)"></div>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<div class="post-thumbnail">
				<div class="image" style="background-image: url(<?php the_post_thumbnail_url( ); ?>)"></div>
			</div><!-- .post-thumbnail -->

		<?php
		endif; // End is_singular().
	}
endif;
