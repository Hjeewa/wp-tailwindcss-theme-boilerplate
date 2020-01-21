<?php 


$title = false;
$breadcrumbs = false;

?>

<div>
    <div class="container">
        <?php if ( function_exists( 'vlTailwind_title' ) && ($title === true)): ?>
            <h1><?php echo vlTailwind_title();?></h1>
        <?php endif;?>

        <?php if ( function_exists( 'vlTailwind_breadcrumb_trail' ) && ($breadcrumbs === true)): ?>
            <?php vlTailwind_breadcrumb_trail();?>
        <?php endif;?>
    </div>
</div>
