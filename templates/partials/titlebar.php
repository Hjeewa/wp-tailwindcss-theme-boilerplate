<?php 


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

$page_subtitle =  get_field( 'page_subtitle' );

?>

<?php if ($show_page_title == 'show' || $show_breadcrumbs == 'show' ): ?>

<div>
    <div class="container">

        <?php if ($show_page_title == 'show'): ?>
            <h1><?php echo vlTailwind_title();?></h1>
        <?php endif;?>

        <?php if ($show_breadcrumbs == 'show'): ?>
            <?php vlTailwind_breadcrumb_trail();?>
        <?php endif;?>
    </div>
</div>

<?php endif;?>