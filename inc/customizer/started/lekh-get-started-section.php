<?php
/**
 * Customizer settings for Important Link Panel
 *
 * @package ThemeCentury
 * @subpackage Lekh
 * @since 1.0.0
 */



$wp_customize->add_section( 
	'lekh_important_links', 
	array(
		'priority' => 10,
		'title'    => esc_html__( 'Get Started', 'lekh' ),
	) 
);

/**
 * This setting has the dummy Sanitizaition function as it contains no value to be sanitized
 */
$wp_customize->add_setting( 
	'lekh_important_links', 
	array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'lekh_links_sanitize',
	) 
);

$wp_customize->add_control( 
	new Lekh_Important_Links( 
		$wp_customize, 
		'important_links', 
		array(
			'label'    => esc_html__( 'Important Links', 'lekh' ),
			'section'  => 'lekh_important_links',
			'settings' => 'lekh_important_links',
		) 
	) 
);
// Theme Important Links Ended

