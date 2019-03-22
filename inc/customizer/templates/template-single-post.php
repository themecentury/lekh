<?php
/*
 *  Branding Section
 */
$wp_customize->add_section( 
	'lekh_single_post', 
	array(
		'title'       => esc_html__( 'Post Options', 'lekh' ),
		'priority'    => 10,
		'panel'       => 'panel_page_templates',
		'description' => esc_html__( 'Options for post details(single.php).', 'lekh' ),
	)
);

// Feauted Image
$wp_customize->add_setting( 
	'post_has_featured_image', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'lekh_sanitize_checkbox',
	)
);

$wp_customize->add_control( 
	'post_has_featured_image', 
	array(
		'label'   => esc_html__( 'Display Featured Image', 'lekh' ),
		'section' => 'lekh_single_post',
		'type'    => 'checkbox',
	)
);

// Post Styles
$wp_customize->add_setting( 
	'post_style', 
	array(
		'default'           => 'fimg-classic',
		'sanitize_callback' => 'lekh_sanitize_choices',
	)
);

$wp_customize->add_control( 
	'post_style', 
	array(
		'label'           => esc_html__( 'Style', 'lekh' ),
		'section'         => 'lekh_single_post',
		'type'            => 'radio',
		'choices'         => array(
			'fimg-classic'   => esc_html__( 'Classic Featured Image', 'lekh' ),
			'fimg-fullwidth' => esc_html__( 'Full width Featured Image', 'lekh' ),
			'fimg-banner'    => esc_html__( 'Full width with parallax Image', 'lekh' ),
		),
		'active_callback' => 'lekh_post_has_featured_image',
	) 
);

// Post Sidebar Position
$wp_customize->add_setting( 
	'post_sidebar_position', 
	array(
		'default'           => 'content-sidebar',
		'sanitize_callback' => 'lekh_sanitize_choices',
	) 
);

$wp_customize->add_control( 
	'post_sidebar_position', 
	array(
		'label'   => esc_html__( 'Sidebar Position', 'lekh' ),
		'section' => 'lekh_single_post',
		'type'    => 'select',
		'choices' => array(
			'content-sidebar'   => esc_html__( 'Right Sidebar', 'lekh' ),
			'sidebar-content'   => esc_html__( 'Left Sidebar', 'lekh' ),
			'content-centered'  => esc_html__( 'No Sidebar Centered', 'lekh' ),
			'content-fullwidth' => esc_html__( 'No Sidebar Full width', 'lekh' ),
		)
	) 
);

// Author Bio
$wp_customize->add_setting( 
	'show_author_bio',
	array(
		'default'           => 1,
		'sanitize_callback' => 'lekh_sanitize_checkbox',
	) 
);

$wp_customize->add_control( 
	'show_author_bio', 
	array(
		'label'   => esc_html__( 'Display Author Bio', 'lekh' ),
		'section' => 'lekh_single_post',
		'type'    => 'checkbox',
	) 
);