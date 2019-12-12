<?php
// The template for displaying pages
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

	<div class="container">

		<?php get_template_part( 'templates/sidebar/left'); ?>

		<main>

			<?php while ( have_posts() ) : the_post(); 
				get_template_part( 'templates/loop/content', 'page' );
			endwhile;?>

		</main>

		<?php get_template_part( 'templates/sidebar/right'); ?>

	</div>

	<div class="container">

		<?php while ( have_posts() ) : the_post(); 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;?>

	<div>

<?php get_footer();
