<?php

$title_tagline = $wp_customize->get_section( 'title_tagline' );
$title_tagline->panel = 'panel_site_header';
$title_tagline->priority = 80;


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