<?php
/*
 *  Page Sections
 */
$wp_customize->add_section( 
	'lekh_single_page', 
	array(
		'title'       => esc_html__( 'Page Options', 'lekh' ),
		'priority'    => 20,
		'panel'       => 'panel_page_templates',
		'description' => esc_html__( 'Options for page details(page.php).', 'lekh' ),
	)
);

// Enable Breadcrumbs
$wp_customize->add_setting( 
	'enable_breadcrumbs_page', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control( 
	'enable_breadcrumbs_page', 
	array(
		'label'   	=> esc_html__( 'Enable Breadcrumbs?', 'lekh' ),
		'section' 	=> 'lekh_single_page',
		'type'    	=> 'checkbox',
		'priority'	=> 10,
	)
);


// Featured Image
$wp_customize->add_setting( 
	'page_has_featured_image', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'lekh_sanitize_checkbox',
	)
);

$wp_customize->add_control( 
	'page_has_featured_image', 
	array(
		'label'   => esc_html__( 'Display Featured Image', 'lekh' ),
		'section' => 'lekh_single_page',
		'type'    => 'checkbox',
		'priority'	=> 20,
	) 
);

// Page Styles
$wp_customize->add_setting( 
	'page_style', 
	array(
		'default'           => 'fimg-classic',
		'sanitize_callback' => 'lekh_sanitize_choices',
	) 
);

$wp_customize->add_control( 
	'page_style', 
	array(
		'priority'	=> 30,
		'label'           => esc_html__( 'Style', 'lekh' ),
		'section'         => 'lekh_single_page',
		'type'            => 'radio',
		'choices'         => array(
			'fimg-classic'   => esc_html__( 'Large Featured Image', 'lekh' ),
			'fimg-fullwidth' => esc_html__( 'Full width Featured Image', 'lekh' ),
			'fimg-banner'    => esc_html__( 'Full width with parallax Image', 'lekh' ),
		),
		'active_callback' => 'lekh_page_has_featured_image',
	)
);

    // Page Sidebar Position
$wp_customize->add_setting( 
	'page_sidebar_position', 
	array(
		'default'           => 'content-sidebar',
		'sanitize_callback' => 'lekh_sanitize_choices',
	) 
);

$wp_customize->add_control( 
	'page_sidebar_position', 
	array(
		'priority'	=> 40,
		'label'       => esc_html__( 'Sidebar Position', 'lekh' ),
		'description' => esc_html__( 'Sidebar options for Static Pages. To remove the Sidebar apply No Sidebar Template to the Page.', 'lekh' ),
		'section'     => 'lekh_single_page',
		'type'        => 'select',
		'choices'     => array(
			'content-sidebar' => esc_html__( 'Right Sidebar', 'lekh' ),
			'sidebar-content' => esc_html__( 'Left Sidebar', 'lekh' ),
			'content-centered'  => esc_html__( 'No Sidebar Centered', 'lekh' ),
			'content-fullwidth' => esc_html__( 'No Sidebar Full width', 'lekh' ),
		)
	) 
);
