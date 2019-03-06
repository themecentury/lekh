<?php
/*
 *  Archive Page
 */
$wp_customize->add_section( 
	'lekh_archive_page', 
	array(
		'title'       => esc_html__( 'Archive Options', 'lekh' ),
		'priority'    => 30,
		'panel'       => 'panel_page_templates',
		'description' => esc_html__( 'Options for archvie page(archive.php).', 'lekh' ),
	)
);

 // Archives Post Layout
$wp_customize->add_setting(
	'archive_layout', 
	array(
		'default'           => 'list',
		'sanitize_callback' => 'lekh_sanitize_choices',
	)
);
$wp_customize->add_control( 
	'archive_layout', 
	array(
		'label'   => esc_html__( 'Post Layout', 'lekh' ),
		'section' => 'lekh_archive_page',
		'type'    => 'radio',
		'choices' => array(
			'list'  => esc_html__( 'List', 'lekh' ),
			'grid'  => esc_html__( 'Grid', 'lekh' ),
			'large' => esc_html__( 'Large', 'lekh' ),
		)
	) 
);

// Archives Sidebar Position
$wp_customize->add_setting( 
	'archive_sidebar_position', 
	array(
		'default'           => 'content-sidebar',
		'sanitize_callback' => 'lekh_sanitize_choices',
	) 
);
$wp_customize->add_control( 
	'archive_sidebar_position', 
	array(
		'label'   => esc_html__( 'Sidebar Position', 'lekh' ),
		'section' => 'lekh_archive_page',
		'type'    => 'select',
		'choices' => array(
			'content-sidebar'   => esc_html__( 'Right Sidebar', 'lekh' ),
			'sidebar-content'   => esc_html__( 'Left Sidebar', 'lekh' ),
			'content-fullwidth' => esc_html__( 'No Sidebar Full width', 'lekh' ),
		)
	) 
);

// Archives Excerpt Length
$wp_customize->add_setting( 
	'archive_excerpt_length', 
	array(
		'default'           => 25,
		'sanitize_callback' => 'absint',
	) 
);
$wp_customize->add_control( 
	'archive_excerpt_length', 
	array(
		'label'   => esc_html__( 'Excerpt length', 'lekh' ),
		'section' => 'lekh_archive_page',
		'type'    => 'number',
	) 
);