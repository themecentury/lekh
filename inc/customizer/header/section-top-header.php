<?php
/*
 *  Top Header Section
 */
$wp_customize->add_section( 
	'lekh_top_header', 
	array(
		'title'       => esc_html__( 'Top Header', 'lekh' ),
		'priority'    => 10,
		'panel'       => 'panel_site_header',
		'description' => esc_html__( 'Options for top header settings section.', 'lekh' ),
	)
);

//Top Breaking News Label
$wp_customize->add_setting( 
	'breaking_news_label', 
	array(
		'default'           => esc_html__( 'Breaking News', 'lekh' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 
	'breaking_news_label', 
	array(
		'label'   => esc_html__( 'Breaking News Label', 'lekh' ),
		'section' => 'lekh_top_header',
		'type'    => 'text',
	)
);

//Top Header Category
$wp_customize->add_setting( 
	'enable_breaking_news', 
	array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 
	'enable_breaking_news', 
	array(
		'label'   => esc_html__( 'Enable Breaking News', 'lekh' ),
		'section' => 'lekh_top_header',
		'type'    => 'checkbox'
	)
);

//Top Header Category
$wp_customize->add_setting( 
	'top_header_category', 
	array(
		'default'           => '',
		'sanitize_callback' => 'lekh_sanitize_choices',
	)
);
$wp_customize->add_control( 
	'top_header_category', 
	array(
		'label'   => esc_html__( 'Breaking News Category', 'lekh' ),
		'section' => 'lekh_top_header',
		'type'    => 'select',
		'choices' => lekh_get_categories(),
	)
);