<?php
// Theme Footer Settings
$wp_customize->add_panel( 
	'panel_site_footer',
	array(
		'title'			=> esc_html__( 'Footer Options', 'lekh' ),
		'description'	=> esc_html__('Footer releated options and settings goes here. You can customize footer from this panel.', 'lekh'),
		'priority'		=> 50,
	)
);

require_once lekh_file_directory('inc/customizer/footer/section-info-footer.php');
require_once lekh_file_directory('inc/customizer/footer/section-footer-settings.php');