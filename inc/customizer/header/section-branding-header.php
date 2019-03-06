<?php
 /*
  *  Branding Section
  */
 $wp_customize->add_section( 
 	'lekh_branding_header', 
 	array(
 		'title'       => esc_html__( 'Branding Options', 'lekh' ),
 		'priority'    => 20,
 		'panel'       => 'panel_site_header',
 		'description' => esc_html__( 'Options for header branding section.', 'lekh' ),
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
 		'section' => 'lekh_branding_header',
 		'type'    => 'radio',
 		'choices' => array(
 			'enable' => esc_html__( 'Enable(When no header ads)', 'lekh' ),
 			'disble' => esc_html__( 'Disable', 'lekh' ),
 		),
 	) 
 );


 // Social Media
 $wp_customize->add_setting( 
 	'lekh_social_media_header', 
 	array(
 		'default'           => 'enable',
 		'sanitize_callback' => 'lekh_sanitize_choices',
 	) 
 );
 $wp_customize->add_control( 
 	'lekh_social_media_header', 
 	array(
 		'label'   => esc_html__( 'Enable/disable social media on header', 'lekh' ),
 		'section' => 'lekh_branding_header',
 		'type'    => 'radio',
 		'choices' => array(
 			'enable'  => esc_html__( 'Enable', 'lekh' ),
 			'disable' => esc_html__( 'Disable', 'lekh' ),
 		)
 	) 
 );