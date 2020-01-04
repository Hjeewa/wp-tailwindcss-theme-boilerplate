<?php 

function theme_sidebars() {
    register_sidebar(
        array (
            'name' => __( 'Left Sidebar', 'vlTailwind' ),
            'id' => 'left_sidebar',
        )
    );

    register_sidebar(
        array (
            'name' => __( 'Right Sidebar', 'vlTailwind' ),
            'id' => 'right_sidebar',
        )
    );
}
add_action( 'widgets_init', 'theme_sidebars' );