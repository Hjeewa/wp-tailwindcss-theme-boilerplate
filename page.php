<?php
// The template for displaying pages
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); 

$left_sidebar = false;
$right_sidebar = false;

?>

	<div class="container">
		<?php if($left_sidebar === true):?>
			<?php get_template_part( 'templates/sidebar/left'); ?>
		<?php endif;?>

		<main>

			<?php while ( have_posts() ) : the_post(); 
				get_template_part( 'templates/loop/content', 'page' );
			endwhile;?>

		</main>
		<?php if($right_sidebar === true):?>
			<?php get_template_part( 'templates/sidebar/right'); ?>
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
