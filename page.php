<?php
// The template for displaying pages
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); 

// check if local sidebar exists otherwise load global

if(get_field('show_sidebar_local') == 1 ){
	$sidebar_location = get_field('sidebar_location_local');
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

	<?php while ( have_posts() ) : the_post(); 
		
		if($sidebar_location === 'right' or $sidebar_location === 'left'):?>
            <main class="w-3/4 flex flex-wrap row">
				<?php get_template_part( 'templates/loop/content', 'page' );?>
			</main>
		<?php else:?>
            <main class="flex flex-wrap row">
				<?php get_template_part( 'templates/loop/content', 'page' );?>
			</main>
		<?php endif;

	endwhile;?>


	<?php if($sidebar_location === 'right'):?>
		<aside class="sidebar flex-1 pl-10">
			<?php get_template_part( 'templates/sidebar/right'); ?>
		</aside>
	<?php endif;?>
	
</div>

<div class="container">

	<?php while ( have_posts() ) : the_post(); 
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile;?>

</div>

<?php get_footer();
