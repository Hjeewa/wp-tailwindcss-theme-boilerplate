<?php

function vlTailwind_title() {

	$post_id = get_the_ID();

	if ( is_home() ) {
		if ( get_option( 'page_for_posts', true ) ) {
			return get_the_title( get_option( 'page_for_posts', true ) );
		} else {
			return esc_html__( 'Latest Posts', 'vlTailwind' );
		}
	} elseif ( is_archive() ) {
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		if ( $term ) {
			return apply_filters( 'single_term_title', $term->name, $post_id );
		} elseif ( is_post_type_archive() ) {
			return apply_filters( 'the_title', get_queried_object()->labels->name, $post_id );
		} elseif ( is_day() ) {
			return sprintf( esc_html__( 'Daily Archives: %s', 'vlTailwind' ), get_the_date() );
		} elseif ( is_month() ) {
			return sprintf( esc_html__( 'Monthly Archives: %s', 'vlTailwind' ), get_the_date( 'F Y' ) );
		} elseif ( is_year() ) {
			return sprintf( esc_html__( 'Yearly Archives: %s', 'vlTailwind' ), get_the_date( 'Y' ) );
		} elseif ( is_author() ) {
			$author = get_queried_object();
			return sprintf( esc_html__( 'Author: %s', 'vlTailwind' ), $author->display_name );
		} else {
			return single_cat_title( '', false );
		}
	} elseif ( is_search() ) {
		return sprintf( esc_html__( 'Search Results for: %s', 'vlTailwind' ), get_search_query() );
	} elseif ( is_404() ) {
		return esc_html__( 'Oops! That page can&rsquo;t be found.', 'vlTailwind' );
	} else {
		return get_the_title();
	}
}
