<?php

require_once lekh_file_directory( 'inc/customizer/upsell/upsell-section.php' );

$wp_customize->register_section_type( 'Lekh_Customize_Upsell_Section' );

// Register sections.
$wp_customize->add_section(
	new Lekh_Customize_Upsell_Section(
		$wp_customize,
		'theme_upsell',
		array(
			'title'    => esc_html__( 'Lekh Pro', 'lekh' ),
			'pro_text' => esc_html__( 'View Pro', 'lekh' ),
			'pro_url'  => 'https://themecentury.com/downloads/lekh-pro-premium-wordpress-plugin/?ref=lekh-upsell-button',
			'priority' => 1,
		)
	)
);