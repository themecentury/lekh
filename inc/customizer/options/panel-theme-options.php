<?php
// Panel Theme options
$wp_customize->add_panel( 
	'panel_theme_options',
	array(
		'title'			=> esc_html__( 'Theme Options', 'lekh' ),
		'description'	=> esc_html__('Website settings goes here. You can customize website settings from this panel.', 'lekh'),
		'priority'		=> 40,
	)
);

require_once lekh_file_directory('inc/customizer/options/section-general-settings.php');
require_once lekh_file_directory('inc/customizer/options/section-background-image.php');