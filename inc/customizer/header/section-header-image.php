<?php
$header_image = $wp_customize->get_section( 'header_image' );
$header_image->panel = 'panel_site_header';
$header_image->priority = 90;

// Show Logo On Menu
$wp_customize->add_setting( 
	'show_headerimage_parallax', 
	array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control( 
	'show_headerimage_parallax', 
	array(
		'label'   => esc_html__( 'Parallax header image', 'lekh' ),
		'section' => 'header_image',
		'type'    => 'checkbox',
	)
);