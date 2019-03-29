<?php
/*
 * Background Image
 */
$background_image = $wp_customize->get_section('background_image');
$background_image->title = esc_html__('Image Settings', 'lekh');
$background_image->priority = 20;
$background_image->panel = 'panel_theme_options';

$wp_customize->add_setting( 
	'lekh_image_animation_on_hover', 
	array(
        'default'           => 0,
        'sanitize_callback' => 'lekh_sanitize_checkbox',
    ) 
);
$wp_customize->add_control( 
	'lekh_image_animation_on_hover', 
	array(
		'label'   => esc_html__( 'Display Hover Animation on Image?', 'lekh' ),
		'section' => 'background_image',
		'type'    => 'checkbox',
	) 
);  
