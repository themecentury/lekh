<?php
// Theme Template Options
$wp_customize->add_panel( 
	'panel_page_templates',
	array(
		'title'			=> esc_html__( 'Templates Options', 'lekh' ),
		'description'	=> esc_html__('Templates releated options and settings goes here. Ex. Single post, Page, Page Templates, Archive, 404 etc.', 'lekh'),
		'priority'		=> 30,
	)
);

require_once lekh_file_directory('inc/customizer/templates/template-single-post.php');

require_once lekh_file_directory('inc/customizer/templates/template-single-page.php');

require_once lekh_file_directory('inc/customizer/templates/template-archive-page.php');

require_once lekh_file_directory('inc/customizer/templates/template-blog-page.php');

require_once lekh_file_directory('inc/customizer/templates/template-static-frontpage.php');
require_once lekh_file_directory('inc/customizer/templates/template-search-page.php');

require_once lekh_file_directory('inc/customizer/templates/template-404-page.php');
