<?php
/**
 * Social Icons Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'lekh_breadcrumbs_section', 
    array(
        'title' => esc_html__('Breadcrumbs', 'lekh'),
        'panel' => 'lekh_sections_panel',
        'priority' => 20,
    )
);

/**
 * Breadcrumbs Layout
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'lekh_breadcrumbs_layout', 
    array(
        'sanitize_callback' => 'esc_attr',
        'default' => 'layout1'
    )
);
$wp_customize->add_control(
    'lekh_breadcrumbs_layout', 
    array(
        'type'      => 'select',
        'label'     => esc_html__('Breadcrumbs Layout', 'lekh'),
        'section'   => 'lekh_breadcrumbs_section',
        'settings'  => 'lekh_breadcrumbs_layout',
        'priority'  => 10,
        'choices'   => array(
            'layout1'   => esc_html__( 'Layout One', 'lekh' ),
            'layout2'   => esc_html__( 'Layout Two', 'lekh' ),
        ),
    )
);

/**
 * Breadcrumbs Background
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'lekh_breadcrumbs_background', 
    array(
        'sanitize_callback' => 'esc_url',
        'default' => ''
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'lekh_breadcrumbs_background', 
        array(
            'type'      => 'image',
            'label'     => esc_html__('Breadcrumbs Background', 'lekh'),
            'section'   => 'lekh_breadcrumbs_section',
            'settings'  => 'lekh_breadcrumbs_background',
            'priority'  => 20,
        )
    )
);

