<?php
// Pagination layout.
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'vlTailwind_pagination' ) ) {

	function vlTailwind_pagination( $args = array(), $class = 'pagination' ) {

		if ( $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 2,
				'prev_next'          => true,
				'prev_text'          => __( '&laquo;', 'vlTailwind' ),
				'next_text'          => __( '&raquo;', 'vlTailwind' ),
				'screen_reader_text' => __( 'Posts navigation', 'vlTailwind' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
			)
		);

		$links = paginate_links( $args );

		?>

		<nav aria-label="<?php echo $args['screen_reader_text']; ?>">

			<ul>

				<?php
				foreach ( $links as $key => $link ) {
					?>
					<li class="<?php echo strpos( $link, 'current' ) ? 'active' : ''; ?>">
						<?php echo str_replace( 'page-numbers', '', $link ); ?>
					</li>
					<?php
				}
				?>

			</ul>

		</nav>

		<?php
	}
}


