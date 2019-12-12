<?php

// Main template file

get_header();?>

<div class="container">

    <?php get_template_part( 'templates/sidebar/left'); ?>

    <?php if ( have_posts() ) : ?>

        <main>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'templates/loop/content', get_post_format() ); ?>
            <?php endwhile; ?>
        </main>

    <?php else: 
        get_template_part( 'templates/loop/content', 'none' ); 
    endif; ?>
        
    <?php get_template_part( 'templates/sidebar/right'); ?>
    
</div>

<?php get_footer();