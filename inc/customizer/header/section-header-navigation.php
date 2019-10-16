<?php
 /*
  *  Main Navigation Section
  */
 $wp_customize->add_section( 
 	'lekh_main_navigation',
 	array(
 		'title'       => esc_html__( 'Main Navigation', 'lekh' ),
 		'priority'    => 30,
 		'panel'       => 'panel_site_header',
 		'description' => esc_html__( 'Options for header main navigation section.', 'lekh' ),
	)
);

// Show Logo On Menu
/*$wp_customize->add_setting( 
	'logo_on_navenu', 
	array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	) 
);
$wp_customize->add_control( 
	'logo_on_navenu', 
	array(
		'label'   => esc_html__( 'Show logo on nav menu.', 'lekh' ),
		'section' => 'lekh_main_navigation',
		'type'    => 'checkbox',
	)
);*/

//Search Icon
$wp_customize->add_setting( 
	'show_searchform_onmenu', 
	array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	) 
);

$wp_customize->add_control( 
	'show_searchform_onmenu', 
	array(
		'label'   => esc_html__( 'Show Search form on menu', 'lekh' ),
		'section' => 'lekh_main_navigation',
		'type'    => 'checkbox',
	)
);

// Header Branding Alignment
$wp_customize->add_setting( 
 	'header_navigation_alignment', 
 	array(
 		'default'           => 'center',
 		'sanitize_callback' => 'sanitize_text_field',
 	)
);
$wp_customize->add_control( 
 	'header_navigation_alignment', 
 	array(
 		'label'   => esc_html__( 'Navigation alignment?', 'lekh' ),
 		'section' => 'lekh_main_navigation',
 		'type'    => 'radio',
 		'choices' => array(
 			'left' 		=> esc_html__( 'Left', 'lekh' ),
 			'center' 	=> esc_html__( 'Center', 'lekh' ),
 		),
 	) 
);