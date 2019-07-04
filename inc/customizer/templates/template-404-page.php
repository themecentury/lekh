<?php
/*
 *  404 Section
 */
$wp_customize->add_section( 
	'lekh_404_page', 
	array(
		'title'       => esc_html__( '404 Options', 'lekh' ),
		'priority'    => 70,
		'panel'       => 'panel_page_templates',
		'description' => esc_html__( 'Options for post details(404.php).', 'lekh' ),
	)
);



// Enable Breadcrumbs
$wp_customize->add_setting( 
	'enable_breadcrumbs_404_page', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control( 
	'enable_breadcrumbs_404_page', 
	array(
		'label'   	=> esc_html__( 'Enable Breadcrumbs?', 'lekh' ),
		'section' 	=> 'lekh_404_page',
		'type'    	=> 'checkbox',
		'priority'	=> 10,
	)
);

// 404 Sidebar Position
$wp_customize->add_setting( 
	'404_sidebar_position', 
	array(
		'default'           => 'content-sidebar',
		'sanitize_callback' => 'lekh_sanitize_choices',
	) 
);
$wp_customize->add_control( 
	'404_sidebar_position', 
	array(
		'label'   => esc_html__( 'Sidebar Position', 'lekh' ),
		'section' => 'lekh_404_page',
		'type'    => 'select',
		'choices' => array(
			'content-sidebar'   => esc_html__( 'Right Sidebar', 'lekh' ),
			'sidebar-content'   => esc_html__( 'Left Sidebar', 'lekh' ),
			'content-centered'  => esc_html__( 'No Sidebar Centered', 'lekh' ),
			'content-fullwidth' => esc_html__( 'No Sidebar Full width', 'lekh' ),
		)
	) 
);

// Enable Page Title
$wp_customize->add_setting( 
	'lekh_404_page_title', 
	array(
		'default'           => esc_html__( 'Oops! That page can’t be found.', 'lekh' ),
		'sanitize_callback' => 'esc_attr',
	)
);

$wp_customize->add_control( 
	'lekh_404_page_title', 
	array(
		'label'   	=> esc_html__( '404 Page Title', 'lekh' ),
		'section' 	=> 'lekh_404_page',
		'type'    	=> 'text',
		'priority'	=> 20,
	)
);

// Page Description
$wp_customize->add_setting( 
	'lekh_404_page_description', 
	array(
		'default'           => esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'lekh' ),
		'sanitize_callback' => 'esc_attr',
	)
);

$wp_customize->add_control( 
	'lekh_404_page_description', 
	array(
		'label'   	=> esc_html__( '404 Page Description', 'lekh' ),
		'section' 	=> 'lekh_404_page',
		'type'    	=> 'text',
		'priority'	=> 30,
	)
);

// Search Form
$wp_customize->add_setting( 
	'lekh_404_search_form', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control( 
	'lekh_404_search_form', 
	array(
		'label'   	=> esc_html__( 'Enable search form?', 'lekh' ),
		'section' 	=> 'lekh_404_page',
		'type'    	=> 'checkbox',
		'priority'	=> 40,
	)
);