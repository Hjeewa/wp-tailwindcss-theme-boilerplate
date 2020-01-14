<?php
// The template for displaying pages
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); 

// for now, just one should be true
$left_sidebar = true;
$right_sidebar = true;

?>

<div class="container flex flex-row">

    <?php if($left_sidebar === true):?>
        <aside class="w-1/4 pr-10">
            <?php get_template_part( 'templates/sidebar/left'); ?>
        </aside>
    <?php endif;?>

    <?php if ( have_posts() ) : ?>

        <?php if($left_sidebar === true or $right_sidebar === true):?>
            <main class="w-3/4">
        <?php else:?>
            <main>
        <?php endif;?>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'templates/loop/content', get_post_format() ); ?>
        <?php endwhile; ?>

    <?php else: 
        get_template_part( 'templates/loop/content', 'none' ); 
    endif; ?>

    </main>

    <?php vlTailwind_pagination(); ?>

    <?php if($right_sidebar === true):?>
        <aside class="flex-1 pl-10">
            <?php get_template_part( 'templates/sidebar/right'); ?>
        </aside>
    <?php endif;?>
		
</div>

<?php get_footer();


