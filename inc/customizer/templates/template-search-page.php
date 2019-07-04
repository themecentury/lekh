<?php
/*
 *  Archive Page
 */
$wp_customize->add_section( 
	'lekh_search_page', 
	array(
		'title'       => esc_html__( 'Search Options', 'lekh' ),
		'priority'    => 50,
		'panel'       => 'panel_page_templates',
		'description' => esc_html__( 'Options for search page(search.php).', 'lekh' ),
	)
);


// Enable Breadcrumbs
$wp_customize->add_setting( 
	'enable_breadcrumbs_search', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control( 
	'enable_breadcrumbs_search', 
	array(
		'label'   	=> esc_html__( 'Enable Breadcrumbs?', 'lekh' ),
		'section' 	=> 'lekh_search_page',
		'type'    	=> 'checkbox',
		'priority'	=> 10,
	)
);

 // Archives Post Layout
$wp_customize->add_setting(
	'search_page_layout', 
	array(
		'default'           => 'list',
		'sanitize_callback' => 'lekh_sanitize_choices',
	)
);
$wp_customize->add_control( 
	'search_page_layout', 
	array(
		'label'   => esc_html__( 'Search Layout', 'lekh' ),
		'section' => 'lekh_search_page',
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
	'search_sidebar_position', 
	array(
		'default'           => 'content-sidebar',
		'sanitize_callback' => 'lekh_sanitize_choices',
	) 
);
$wp_customize->add_control( 
	'search_sidebar_position', 
	array(
		'label'   => esc_html__( 'Sidebar Position', 'lekh' ),
		'section' => 'lekh_search_page',
		'type'    => 'select',
		'choices' => array(
			'content-sidebar'   => esc_html__( 'Right Sidebar', 'lekh' ),
			'sidebar-content'   => esc_html__( 'Left Sidebar', 'lekh' ),
			'content-centered'  => esc_html__( 'No Sidebar Centered', 'lekh' ),
			'content-fullwidth' => esc_html__( 'No Sidebar Full width', 'lekh' ),
		)
	) 
);

// Archives Excerpt Length
$wp_customize->add_setting( 
	'search_excerpt_length', 
	array(
		'default'           => 25,
		'sanitize_callback' => 'absint',
	) 
);
$wp_customize->add_control( 
	'search_excerpt_length', 
	array(
		'label'   => esc_html__( 'Excerpt length', 'lekh' ),
		'section' => 'lekh_search_page',
		'type'    => 'number',
	) 
);