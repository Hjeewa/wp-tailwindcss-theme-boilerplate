<?php 

if( get_theme_mod( 'vl_title_display') == 'true' || get_theme_mod( 'vl_creadcrumbs_display') == 'true') : ?>

    <div>
        <div class="container">
            <?php if( get_theme_mod( 'vl_title_display') == 'true' ) : ?>
                <h1 class="titlebar-title"><?php echo vlTailwind_title();?></h1>
            <?php endif;?>

            <?php if( get_theme_mod( 'vl_breadcrumbs_display') == 'true' ) : ?>
                <?php vlTailwind_breadcrumb_trail();?>
            <?php endif;?>
        </div>
    </div>

<?php endif;?>

