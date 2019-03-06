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