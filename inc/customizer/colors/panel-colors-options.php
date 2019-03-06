<?php
// Panel color options
$wp_customize->add_panel( 
	'panel_color_options',
	array(
		'title'			=> esc_html__( 'Color Options', 'lekh' ),
		'description'	=> esc_html__('Color releated options and settings goes here. You can customize website color from this panel.', 'lekh'),
		'priority'		=> 40,
	)
);

require_once lekh_file_directory('inc/customizer/colors/section-global-colors.php');
require_once lekh_file_directory('inc/customizer/colors/section-header-colors.php');
require_once lekh_file_directory('inc/customizer/colors/section-footer-colors.php');