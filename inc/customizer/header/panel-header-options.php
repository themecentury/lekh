<?php
// Theme Header Settings
$wp_customize->add_panel( 
	'panel_site_header',
	array(
		'title'			=> esc_html__( 'Header Options', 'lekh' ),
		'description'	=> esc_html__('Header releated options and settings goes here. You can customize header from this panel.', 'lekh'),
		'priority'		=> 20,
	)
);

require_once lekh_file_directory('inc/customizer/header/section-top-header.php');
require_once lekh_file_directory('inc/customizer/header/section-header-navigation.php');
require_once lekh_file_directory('inc/customizer/header/section-header-image.php');
require_once lekh_file_directory('inc/customizer/header/section-header-settings.php');
require_once lekh_file_directory('inc/customizer/header/section-title-tagline.php');