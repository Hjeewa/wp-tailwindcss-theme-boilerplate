<?php
// Partial template for page content
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<?php if (is_user_logged_in()):?>
		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
		</footer>
	<?php endif;?>	

</article>
