<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Lekh
 * @since Lekh 1.0
 */


if ( ! function_exists( 'lekh_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function lekh_posted_on( $show_date = true, $show_author=true ){

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			_x( 'Posted on', 'Used before publish date.', 'lekh' ),
			esc_url( get_permalink() ),
			$time_string
		);

		if ( 'post' === get_post_type() ) {
			printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
				get_avatar( get_the_author_meta( 'user_email' ), 24 ),
				_x( 'Author', 'Used before post author name.', 'lekh' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

	}
	
endif;


if ( ! function_exists( 'lekh_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function lekh_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'lekh' ) );
			if ( $categories_list && lekh_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'lekh' ) . '</span>', $categories_list );
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'lekh' ) );
			if ( $tags_list ) {
				printf( '<span class="sep">&bull;</span><span class="tags-links">' . esc_html__( 'Tagged %1$s', 'lekh' ) . '</span>', $tags_list );
			}
		}

		if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"><span class="sep">&bull;</span>';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'lekh' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		if ( get_edit_post_link() ) :
			edit_post_link(
				sprintf(
				/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'lekh' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="sep">&bull;</span><span class="edit-link">',
				'</span>'
			);
		endif;
	}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function lekh_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'lekh_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'lekh_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so lekh_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so lekh_categorized_blog should return false.
		return false;
	}
}
