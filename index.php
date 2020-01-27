<?php
// The template for displaying pages
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 

// check if local sidebar exists otherwise load global

if(get_field('show_sidebar_local', get_option('page_for_posts')) == 1 ){
	$sidebar_location = get_field('sidebar_location_local', get_option('page_for_posts'));
}
elseif(get_field('show_sidebar_global','option') == 1 ){
	$sidebar_location = get_field('sidebar_location_global','option');
};

?>

<div class="container flex flex-row">

    <?php if($sidebar_location === 'left'):?>
        <aside class="sidebar w-1/4 pr-10">
            <?php get_template_part( 'templates/sidebar/left'); ?>
        </aside>
    <?php endif;?>

    <?php if ( have_posts() ) : ?>

        <?php if($sidebar_location === 'right' or $sidebar_location === 'left'):?>
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
    
    <?php vlTailwind_pagination(); ?>

    </main>


    <?php if($sidebar_location === 'right'):?>
        <aside class="sidebar flex-1 pl-10">
            <?php get_template_part( 'templates/sidebar/right'); ?>
        </aside>
    <?php endif;?>
		
</div>

<?php get_footer();


