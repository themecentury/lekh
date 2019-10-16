<?php
/*
 *  Blog Page
 */
$wp_customize->add_section( 
	'lekh_index_page', 
	array(
		'title'       => esc_html__( 'Blog Options', 'lekh' ),
		'priority'    => 40,
		'panel'       => 'panel_page_templates',
		'description' => esc_html__( 'Options for blog page(index.php).', 'lekh' ),
	)
);


// Enable Breadcrumbs
$wp_customize->add_setting( 
	'enable_breadcrumbs_index', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control( 
	'enable_breadcrumbs_index', 
	array(
		'label'   	=> esc_html__( 'Enable Breadcrumbs?', 'lekh' ),
		'section' 	=> 'lekh_index_page',
		'type'    	=> 'checkbox',
		'priority'	=> 10,
	)
);

// Blog Post Layout
$wp_customize->add_setting( 
	'blog_layout', 
	array(
		'default'           => 'list',
		'sanitize_callback' => 'lekh_sanitize_choices',
	) 
);
$wp_customize->add_control( 
	'blog_layout', 
	array(
		'label'   => esc_html__( 'Post Layout', 'lekh' ),
		'section' => 'lekh_index_page',
		'type'    => 'radio',
		'choices' => array(
			'list'  => esc_html__( 'List', 'lekh' ),
			'grid'  => esc_html__( 'Grid', 'lekh' ),
			'large' => esc_html__( 'Large', 'lekh' ),
		)
	) 
);
// Blog Sidebar Position
$wp_customize->add_setting( 
	'blog_sidebar_position', 
	array(
		'default'           => 'content-sidebar',
		'sanitize_callback' => 'lekh_sanitize_choices',
	) 
);
$wp_customize->add_control( 
	'blog_sidebar_position', 
	array(
		'label'   => esc_html__( 'Sidebar Position', 'lekh' ),
		'section' => 'lekh_index_page',
		'type'    => 'select',
		'choices' => array(
			'content-sidebar'   => esc_html__( 'Right Sidebar', 'lekh' ),
			'sidebar-content'   => esc_html__( 'Left Sidebar', 'lekh' ),
			'content-centered'  => esc_html__( 'No Sidebar Centered', 'lekh' ),
			'content-fullwidth' => esc_html__( 'No Sidebar Full width', 'lekh' ),
		)
	) 
);
// Blog Excerpt Length
$wp_customize->add_setting( 
	'blog_excerpt_length', 
	array(
		'default'           => 25,
		'sanitize_callback' => 'absint',
	) 
);
$wp_customize->add_control( 
	'blog_excerpt_length', 
	array(
		'label'   => esc_html__( 'Excerpt length', 'lekh' ),
		'section' => 'lekh_index_page',
		'type'    => 'number',
	) 
);
// Show Blocks Section
$wp_customize->add_setting( 
	'blog_show_cta', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
	) 
);
$wp_customize->add_control( 
	'blog_show_cta', 
	array(
		'label'   => esc_html__( 'Show Image Blocks?', 'lekh' ),
		'section' => 'lekh_index_page',
		'type'    => 'checkbox',
	) 
);
// Lazy Loading
$wp_customize->add_setting( 
	'blog_lazy_loading', 
	array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	) 
);
$wp_customize->add_control( 
	'blog_lazy_loading', 
	array(
		'label'   => esc_html__( 'Infinite Scrolling?', 'lekh' ),
		'section' => 'lekh_index_page',
		'type'    => 'checkbox',
	)
);