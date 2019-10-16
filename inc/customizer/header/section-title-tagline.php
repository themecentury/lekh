<?php

$title_tagline = $wp_customize->get_section( 'title_tagline' );
$title_tagline->panel = 'panel_site_header';
$title_tagline->priority = 20;


$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

// Logo Max Width (desktop)
$wp_customize->add_setting( 
	'logo_width_lg', 
	array(
		'default'           => 220,
		'sanitize_callback' => 'absint',
	) 
);

$wp_customize->add_control( 
	'logo_width_lg', 
	array(
		'label'    => esc_html__( 'Logo Max Width (desktop)', 'lekh' ),
		'section'  => 'title_tagline',
		'type'     => 'number',
		'priority' => 10,
	) 
);

// Logo Max Width (mobile)
$wp_customize->add_setting( 
	'logo_width_sm', 
	array(
		'default'           => 180,
		'sanitize_callback' => 'absint',
	) 
);

$wp_customize->add_control( 
	'logo_width_sm', 
	array(
		'label'    => esc_html__( 'Logo Max Width (mobile)', 'lekh' ),
		'section'  => 'title_tagline',
		'type'     => 'number',
		'priority' => 20,
	) 
);

// Show social media on top bar
$wp_customize->add_setting( 
 	'header_branding_option', 
 	array(
 		'default'           => 'enable',
 		'sanitize_callback' => 'sanitize_text_field',
 	)
);

$wp_customize->add_control( 
 	'header_branding_option', 
 	array(
 		'label'   => esc_html__( 'Enable branding section?', 'lekh' ),
 		'section' => 'title_tagline',
 		'type'    => 'radio',
 		'priority' => 60,
 		'choices' => array(
 			'enable' => esc_html__( 'Enable', 'lekh' ),
 			'disble' => esc_html__( 'Disable', 'lekh' ),
 		),
 	)
);

// Show social media on top bar
$wp_customize->add_setting( 
 	'show_on_branding', 
 	array(
 		'default'           => 'disble',
 		'sanitize_callback' => 'sanitize_text_field',
 	)
);

$wp_customize->add_control( 
 	'show_on_branding', 
 	array(
 		'label'   => esc_html__( 'Social media on branding?', 'lekh' ),
 		'section' => 'title_tagline',
 		'type'    => 'radio',
 		'priority' => 70,
 		'choices' => array(
 			'enable' => esc_html__( 'Enable', 'lekh' ),
 			'disble' => esc_html__( 'Disable', 'lekh' ),
 		),
 	)
);

// Header Branding Alignment
$wp_customize->add_setting( 
 	'header_branding_alignment', 
 	array(
 		'default'           => 'center',
 		'sanitize_callback' => 'sanitize_text_field',
 	)
);
$wp_customize->add_control( 
 	'header_branding_alignment', 
 	array(
 		'label'   => esc_html__( 'Branding alignment?', 'lekh' ),
 		'section' => 'title_tagline',
 		'type'    => 'radio',
 		'priority' => 80,
 		'choices' => array(
 			'left' 		=> esc_html__( 'Left', 'lekh' ),
 			'center' 	=> esc_html__( 'Center', 'lekh' ),
 		),
 	) 
);
