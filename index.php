<?php
// The template for displaying pages
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="container flex flex-row">

        <?php if( get_theme_mod( 'vl_sidebar_display') == 'left' ) : ?>
            <aside class="sidebar w-1/4 pr-10">
                <?php get_template_part( 'templates/sidebar/left'); ?>
            </aside>
        <?php endif ?>


    <?php if ( have_posts() ) : ?>

        <?php if( get_theme_mod( 'vl_sidebar_display') == 'left' || get_theme_mod( 'vl_sidebar_display') == 'right' ) : ?>
            <main class="w-3/4 flex flex-wrap row">
        <?php else:?>
            <main class="flex flex-wrap row">
        <?php endif;?>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'templates/loop/content', get_post_format() ); ?>
        <?php endwhile; ?>

    <?php else: 
        get_template_part( 'templates/loop/content', 'none' ); 
    endif; ?>

    </main>

    <?php vlTailwind_pagination(); ?>

    <?php if( get_theme_mod( 'vl_sidebar_display') == 'right' ) : ?>
        <aside class="sidebar flex-1 pl-10">
            <?php get_template_part( 'templates/sidebar/right'); ?>
        </aside>
    <?php endif;?>

</div>

<?php get_footer();


