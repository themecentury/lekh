<?php
/*
 * Header Colors
 */
$wp_customize->add_section( 
  'lekh_header_colors', 
  array(
    'title'       => esc_html__( 'Header Colors', 'lekh' ),
    'priority'    => 20,
    'panel'       => 'panel_color_options',
    'description' => esc_html__( 'Colors for header section.', 'lekh' ),
  ) 
);

$header_textcolor_control = $wp_customize->get_control( 'header_textcolor' );
$header_textcolor_control->label    = esc_html__( 'Site Title', 'lekh' );
$header_textcolor_control->priority = 10;
$header_textcolor_control->section = 'lekh_header_colors';
$header_textcolor_settings = $wp_customize->get_setting( 'header_textcolor' );
$header_textcolor_settings->transport = 'postMessage';

// Site Tagline Color
$wp_customize->add_setting( 
	'site_tagline_color',
	array(
		'default'           => '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
	) 
);
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
		$wp_customize, 
		'site_tagline_color', 
		array(
			'label'    => esc_html__( 'Site Tagline', 'lekh' ),
			'section'  => 'lekh_header_colors',
			'priority' => 20,
		)
	)
);


// Header Background
$wp_customize->add_setting( 
	'header_background', 
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) 
);
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
		$wp_customize, 
		'header_background', 
		array(
			'label'    => esc_html__( 'Header Background', 'lekh' ),
			'section'  => 'lekh_header_colors',
			'priority' => 30,
		) 
	) 
);

// Header Background
$wp_customize->add_setting( 
	'search_icon_color', 
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) 
);
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
		$wp_customize, 
		'search_icon_color', 
		array(
			'label'    => esc_html__( 'Search Icon', 'lekh' ),
			'section'  => 'colors_header',
			'priority' => 40,
		) 
	) 
);