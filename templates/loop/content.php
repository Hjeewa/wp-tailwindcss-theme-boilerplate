<?php
// Post rendering content according to caller of get_template_part.
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$classes = array('w-full');

?>

<article <?php post_class($classes); ?> id="post-<?php the_ID(); ?>">

	<header class="post-header">
		<?php the_title(sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h2>');?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php vlTailwind_entry_cats();?>
			</div>
		<?php endif; ?>
	</header>

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="post-content">
		<?php the_excerpt(); ?>
	</div>

	<footer class="post-footer">
		<?php vlTailwind_posted_on(); ?>
		<?php vlTailwind_entry_footer(); ?>
	</footer>

</article>
