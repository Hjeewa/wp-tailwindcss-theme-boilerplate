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
            <?php include( locate_template( 'templates/sidebar/left.php', false, false ) );?>
        </aside>
    <?php endif;?>

    <?php if($sidebar_location === 'right' or $sidebar_location === 'left'):?>
    <main class="w-3/4 flex flex-wrap">
    <?php else:?>
    <main class="flex flex-wrap">
    <?php endif;?>

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php include( locate_template( 'templates/loop/content.php', false, false ) );?>
            <?php endwhile; ?>

        <?php else: 
            include( locate_template( 'templates/loop/content-none.php', false, false ) );
        endif; ?>

        <?php vlTailwind_pagination(); ?>

    </main>


    <?php if($sidebar_location === 'right'):?>
        <aside class="sidebar flex-1 pl-10">
            <?php include( locate_template( 'templates/sidebar/right.php', false, false ) );?>
        </aside>
    <?php endif;?>
		
</div>

<?php get_footer();


