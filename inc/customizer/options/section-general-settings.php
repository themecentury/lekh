<?php
/**
 * General Setting Section
 *
 * @since 1.0.2
 */
$wp_customize->add_section(
    'lekh_general_settings_section', 
    array(
        'title' => esc_html__('General Settings', 'lekh'),
        'panel' => 'panel_theme_options',
        'priority' => 10,
    )
);


$wp_customize->add_setting( 
	'back_to_top_button', 
	array(
		'default'           => 0,
		'sanitize_callback' => 'lekh_sanitize_checkbox',
	) 
);

$wp_customize->add_control( 
	'back_to_top_button', 
	array(
		'label'   => esc_html__( 'Display Back To Top Button?', 'lekh' ),
		'section' => 'lekh_general_settings_section',
		'type'    => 'checkbox',
	) 
);

// Read More Link
$wp_customize->add_setting( 
	'show_read_more', array(
		'default'           => 1,
		'sanitize_callback' => 'lekh_sanitize_checkbox',
	) 
);
$wp_customize->add_control( 
	'show_read_more', 
	array(
		'label'   => esc_html__( 'Display Read More Link', 'lekh' ),
		'section' => 'lekh_general_settings_section',
		'type'    => 'checkbox',
	) 
);


// Archives Post Layout
$wp_customize->add_setting( 
	'website_layout', 
	array(
		'default'           => 'box',
		'sanitize_callback' => 'sanitize_lekh_website_layout',
	) 
);
$wp_customize->add_control( 
	'website_layout', 
	array(
		'label'   => esc_html__( 'Website Layout', 'lekh' ),
		'section' => 'lekh_general_settings_section',
		'type'    => 'radio',
		'choices' => array(
			'box'  => esc_html__( 'Box Width', 'lekh' ),
			'full' => esc_html__( 'Full Width', 'lekh' ),
		)
	) 
);
$wp_customize->add_setting(
	'website_skin', 
	array(
		'default' => 'no_skin',
		'sanitize_callback' => 'sanitize_lekh_website_skin',

	)
);

$wp_customize->add_control(
	'website_skin', 
	array(
		'label' => esc_html__('Website Skin', 'lekh'),
		'section' => 'layout_section',
		'type' => 'radio',
		'choices' => array(
			'no_skin' => esc_html__('Default', 'lekh'),
			'dark_skin' => esc_html__('Dark Skin', 'lekh'),
			'skin_one' => esc_html__('Skin One', 'lekh'),
		)
	)
);