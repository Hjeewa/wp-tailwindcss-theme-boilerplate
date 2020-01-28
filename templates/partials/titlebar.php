<?php 

// conditionals to see where the page title and breadcrumbs are get from.max-h-full
// with possibility of overriding locally
if(get_field('show_page_title_local') != 'global' ){
	$show_page_title = get_field('show_page_title_local');
}
else{
	$show_page_title = get_field('show_page_title_global','option');
};

if(get_field('show_breadcrumbs_local') != 'global' ){
	$show_breadcrumbs = get_field('show_breadcrumbs_local');
}
else{
	$show_breadcrumbs = get_field('show_breadcrumbs_global','option');
};

// get the page subtitle
$page_subtitle =  get_field( 'page_subtitle' );

// get the titlebar background image
$img = get_field( 'titlebar_image');
$titlebar_image = wp_get_attachment_image_url( $img, 'full');

?>

<?php if ($show_page_title == 'show' || $show_breadcrumbs == 'show' ): ?>

<div class="<?php if($titlebar_image):?> bg-center bg-no-repeat bg-cover <?php endif;?>" style="background-image:url('<?php echo $titlebar_image; ?>');">
    <div class="container">

        <?php if ($show_page_title == 'show'): ?>
            <h1><?php echo vlTailwind_title();?></h1>
        <?php endif;?>

        <?php if ($show_breadcrumbs == 'show'): ?>
            <?php vlTailwind_breadcrumb_trail();?>
        <?php endif;?>

        <?php echo $page_subtitle;?>

    </div>
</div>

<?php endif;?>