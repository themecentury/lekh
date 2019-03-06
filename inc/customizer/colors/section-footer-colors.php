<?php
/*
 * Footer Colors
 */
$wp_customize->add_section( 
  'lekh_footer_colors', 
  array(
    'title'       => esc_html__( 'Footer Colors', 'lekh' ),
    'priority'    => 10,
    'panel'       => 'panel_color_options',
    'description' => esc_html__( 'Colors for footer section.', 'lekh' ),
  ) 
);

// Footer Widget Area Background
$wp_customize->add_setting( 
	'footer_background', 
	array(
		'default'           => '#1b2126',
		'sanitize_callback' => 'sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
		$wp_customize, 
		'footer_background', 
		array(
			'label'   => esc_html__( 'Footer Widget Area Background', 'lekh' ),
			'section' => 'lekh_footer_colors',
		) 
	) 
);