<?php
/*
  *  Header Settings
  */
 $wp_customize->add_section( 
 	'lekh_header_settings', 
 	array(
 		'title'       => esc_html__( 'Header Settings', 'lekh' ),
 		'priority'    => 100,
 		'panel'       => 'panel_site_header',
 		'description' => esc_html__( 'Options for header settings section.', 'lekh' ),
 	)
 );

 $wp_customize->add_setting( 
 	'header_layout', 
 	array(
 		'default'           => 'header-layout3',
 		'sanitize_callback' => 'lekh_sanitize_choices',
 	)
 );
 $wp_customize->add_control( 
 	'header_layout', 
 	array(
 		'label'   => esc_html__( 'Style', 'lekh' ),
 		'section' => 'lekh_header_settings',
 		'type'    => 'radio',
 		'choices' => array(
 			'header-layout1' => esc_html__( 'Header Layout 1 (Center align layout)', 'lekh' ),
 			'header-layout2' => esc_html__( 'Header Layout 2 (Left align layout)', 'lekh' ),
 			'header-layout3' => esc_html__( 'Layout 3(Top Header, Branding and Menu)', 'lekh' ),
 		)
 	)
 );