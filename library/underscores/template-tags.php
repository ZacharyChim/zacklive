<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package zacklive
 */

if ( ! function_exists( 'zacklive_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */

function zacklive_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		'<span class="author vcard" itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on"><span class="glyphicon glyphicon-calendar" aria-
 hidden="true"></span>' . $posted_on . '</span><span class="byline"><span class="glyphicon glyphicon-user" aria-
 hidden="true"></span>' . $byline . '</span>';
}
endif; // ends check for zacklive_posted_on()

if ( ! function_exists( 'zacklive_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function zacklive_entry_footer() {
	zacklive_posted_on();
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'zacklive' ) );
		if ( $categories_list && zacklive_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="glyphicon glyphicon-folder-open" aria-
 hidden="true"></span>%1$s' . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'zacklive' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="glyphicon glyphicon-tags" aria-
 hidden="true"></span>%1$s' . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><span class="glyphicon glyphicon-comment" aria-
 hidden="true"></span>';
		comments_popup_link( __( 'Leave a comment', 'zacklive' ), __( '1 Comment', 'zacklive' ), __( '% Comments', 'zacklive' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'zacklive' ), '<span class="edit-link"><span class="glyphicon glyphicon-edit" aria-
 hidden="true"></span>', '</span>' );
}
endif; // ends check for zacklive_entry_footer()

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'zacklive' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'zacklive' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'zacklive' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'zacklive' ), get_the_date( _x( 'Y', 'yearly archives date format', 'zacklive' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'zacklive' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'zacklive' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'zacklive' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'zacklive' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'zacklive' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'zacklive' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'zacklive' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'zacklive' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'zacklive' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'zacklive' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'zacklive' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'zacklive' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'zacklive' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'zacklive' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'zacklive' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'zacklive' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif; // ends check for the_archive_title()

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif; // ends check for the_archive_description()

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function zacklive_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'zacklive_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'zacklive_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so zacklive_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so zacklive_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in zacklive_categorized_blog
 */
function zacklive_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'zacklive_categories' );
}
add_action( 'edit_category', 'zacklive_category_transient_flusher' );
add_action( 'save_post',     'zacklive_category_transient_flusher' );
?>