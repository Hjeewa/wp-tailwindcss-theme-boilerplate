<?php
// The template that loads when no content
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if ( is_search() ) : ?>

    <p>
        <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try searching again.', 'vlTailwind' ); ?>
    </p>
    <?php get_search_form();
    
else : ?>

    <p>
        <?php esc_html_e( 'We can&rsquo;t find what you are looking for. Why not try searching?.', 'vlTailwind' ); ?>
    </p>
    <?php get_search_form();
    
endif; ?>