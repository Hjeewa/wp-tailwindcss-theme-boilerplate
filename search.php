<?php
// The template for displaying search results pages.
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

	<div class="container">

		<?php get_template_part( 'templates/sidebar/left'); ?>
		<main>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post();
					get_template_part( 'templates/loop/content');
				endwhile; ?>

			<?php else :
				get_template_part( 'templates/loop/content', 'none' ); 
			endif; ?>

		</main>

		<?php vlTailwind_pagination(); ?>

		<?php get_template_part( 'templates/sidebar/right'); ?>

	</div>

<?php get_footer();
