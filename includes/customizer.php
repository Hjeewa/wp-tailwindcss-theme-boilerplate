<?php

add_action( 'customize_register', 'cd_customizer_settings' );
    function cd_customizer_settings( $wp_customize ) {

    $wp_customize->add_section( 'vl_theme_layout' , array(
        'title'      => 'Layout',
        'priority'   => 30,
    ) );

    // SIDEBAR OPTIONS

    $wp_customize->selective_refresh->add_partial( 'vl_sidebar_display', array(
        'selector' => 'aside.sidebar', // You can also select a css class
    ) );

    $wp_customize->add_setting( 'vl_sidebar_display' , array(
        'default'     => 'none',
        'transport'   => 'refresh',
    ) );
  
    $wp_customize->add_control( 'vl_sidebar_display', array(
        'label' => 'Sidebar Location',
        'section' => 'vl_theme_layout',
        'settings' => 'vl_sidebar_display',
        'type' => 'select',
        'choices' => array(
            'none' => 'No Sidebar',
            'left' => 'Left Sidebar',
            'right' => 'Right Sidebar',
            ),
        ) 
    );

    // TITLEBAR OPTIONS

    $wp_customize->selective_refresh->add_partial( 'vl_title_display', array(
        'selector' => '.titlebar-title', // You can also select a css class
    ) );

    $wp_customize->add_setting( 'vl_title_display' , array(
        'default'     => 'true',
        'transport'   => 'refresh',
    ) );
  
    $wp_customize->add_control( 'vl_title_display', array(
        'label' => 'Titlebar',
        'section' => 'vl_theme_layout',
        'settings' => 'vl_title_display',
        'type' => 'select',
        'choices' => array(
            'true' => 'Show Title',
            'false' => 'Hide Title',
            ),
        ) 
    );

    // BREADCRUMBS OPTIONS
    $wp_customize->selective_refresh->add_partial( 'vl_breadcrumbs_display', array(
        'selector' => '.breadcrumb-trail ', // You can also select a css class
    ) );

    $wp_customize->add_setting( 'vl_breadcrumbs_display' , array(
        'default'     => 'true',
        'transport'   => 'refresh',
    ) );
  
    $wp_customize->add_control( 'vl_breadcrumbs_display', array(
        'label' => 'Breadcrumbs',
        'section' => 'vl_theme_layout',
        'settings' => 'vl_breadcrumbs_display',
        'type' => 'select',
        'choices' => array(
            'true' => 'Show Breadcrumbs',
            'false' => 'Hide Breadcrumbs',
            ),
        ) 
    );
}

