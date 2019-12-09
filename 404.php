<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>


<div id="error-404-wrapper" class="wrapper">

	<div class="container" id="content">

		<main class="main-content">

			<h1 class="title-404">404</h1>

			<div class="search-form">
				<p class="h3">There was nothing found here.</p>
				<?php get_search_form();?>
			</div>
					
		</main>

	</div>

</div>

<?php get_footer();
