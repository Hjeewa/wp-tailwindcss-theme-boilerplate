<?php
// The template for displaying pages
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); 

// for now, just one should be true
$left_sidebar = true;
$right_sidebar = false;

?>

	<div class="container flex flex-row">

		<?php if($left_sidebar === true):?>
			<aside class="w-1/4 pr-10">
				<?php get_template_part( 'templates/sidebar/left'); ?>
			</aside>
		<?php endif;?>


		<?php while ( have_posts() ) : the_post(); 
			
			if($left_sidebar === true or $right_sidebar === true):?>
				<main class="w-3/4">
					<?php get_template_part( 'templates/loop/content', 'page' );?>
				</main>
			<?php else:?>
				<main>
					<?php get_template_part( 'templates/loop/content', 'page' );?>
				</main>
			<?php endif;

		endwhile;?>


		<?php if($right_sidebar === true):?>
			<aside class="flex-1 pl-10">
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
