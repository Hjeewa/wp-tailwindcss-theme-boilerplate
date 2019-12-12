<?php
// The template for displaying single posts.
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>


	<div class="container">

		<?php get_template_part( 'templates/sidebar/left'); ?>

		<main class="site-main" id="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content', 'single' ); ?>


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

		<?php get_template_part( 'templates/sidebar/right'); ?>

	</div>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	<?php endwhile; // end of the loop. ?>


<?php get_footer();
