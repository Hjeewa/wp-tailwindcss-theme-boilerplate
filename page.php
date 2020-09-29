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
}else{
	$sidebar_location = null;
}

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

		<?php while ( have_posts() ) : the_post(); ?>
			<?php include( locate_template( 'templates/loop/content-page.php', false, false ) );?>
		<?php endwhile;?>

	</main>

	<?php if($sidebar_location === 'right'):?>
		<aside class="sidebar flex-1 pl-10">
			<?php include( locate_template( 'templates/sidebar/right.php', false, false ) );?>
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
