<?php
$wp_customize->add_panel(
    'lekh_sections_panel', 
    array(
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('ALL Sections', 'lekh'),
    )
);

require_once lekh_file_directory('inc/customizer/sections/section-social-icons.php');

require_once lekh_file_directory('inc/customizer/sections/section-breadcrumbs-option.php');

require_once lekh_file_directory('inc/customizer/sections/section-posts-blocks.php');
