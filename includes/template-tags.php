
<?php
// Custom template tags for this theme.
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'vlTailwind_posted_on' ) ) {
	function vlTailwind_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on   = apply_filters(
			'vlTailwind_posted_on', sprintf(
				'<span class="posted-on">%3$s</span>',
				esc_html_x( '', 'post date', 'vlTailwind' ),
				esc_url( get_permalink() ),
				apply_filters( 'vlTailwind_posted_on_time', $time_string )
			)
		);
		echo $posted_on; // WPCS: XSS OK.	
	}
}



/**
 * Prints HTML with meta information for the comments.
 */
if ( ! function_exists( 'vlTailwind_entry_footer' ) ) {
	function vlTailwind_entry_footer() {

		$byline      = apply_filters(
			'vlTailwind_posted_by', sprintf(
				'<span class="byline"> %1$s<span class="author vcard"><a class="url fn n" href="%2$s"> %3$s</a></span></span>',
				$posted_on ? esc_html_x( 'by', 'post author', 'vlTailwind' ) : esc_html_x( '', 'post author', 'vlTailwind' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);
		echo $byline; // WPCS: XSS OK.

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			
			$comments_icon = '<i class="far fa-comment-alt"></i>';

			echo '<span class="comments-link">';
			comments_popup_link( sprintf( $comments_icon ) . esc_html__( ' ', 'vlTailwind' ), sprintf( $comments_icon ) . esc_html__( ' 1', 'vlTailwind' ), sprintf( $comments_icon ) . esc_html__( ' %', 'vlTailwind' ) );
			echo '</span>';
		}	
	}
}

// Prints HTML with meta information for the post categories and tags
if ( ! function_exists( 'vlTailwind_entry_cats' ) ) {
	function vlTailwind_entry_cats() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'vlTailwind' ) );
			if ( $categories_list && vlTailwind_categorized_blog() ) {
				/* translators: %s: Categories of current post */
				printf( '<div class="cat-links">' . esc_html__( '%s', 'vlTailwind' ) . '</div>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ' ', 'vlTailwind' ) );
			if ( $tags_list ) {
				/* translators: %s: Tags of current post */
				printf( '<div class="tags-links">' . esc_html__( '%s', 'vlTailwind' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
}


// Returns true if a blog has more than 1 category.
if ( ! function_exists( 'vlTailwind_categorized_blog' ) ) {
	function vlTailwind_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'vlTailwind_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );
			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );
			set_transient( 'vlTailwind_categories', $all_the_cool_cats );
		}
		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so components_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so components_categorized_blog should return false.
			return false;
		}
	}
}


// Prints HTML with meta information for the taxonomies
if ( ! function_exists( 'vlTailwind_entry_tax' ) ) {
	function vlTailwind_entry_tax() {
		// Get post by post ID.
		if ( ! $post = get_post() ) {
			return '';
		}
		// Get post type by post.
		$post_type = $post->post_type;
		// Get post type taxonomies.
		$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	
		$out = array();
	
		foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
	
			// Get the terms related to post.
			$terms = get_the_terms( $post->ID, $taxonomy_slug );
	
			if ( ! empty( $terms ) ) {
				$out[] = "<div class='tax-links'>";
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%1$s" rel="taxonomy">%2$s</a> ', esc_url( get_term_link( $term->slug, $taxonomy_slug ) ), esc_html( $term->name ) );
				}
				$out[] = "</div>";
			}
		}
		echo implode( '', $out );
	}
}
