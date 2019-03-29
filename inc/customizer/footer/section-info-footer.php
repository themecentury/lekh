<?php
/*
 * Footer Settings 
 */

$wp_customize->add_section( 
  'lekh_infofooter_settings', 
  array(
    'title'       => esc_html__( 'Footer Bottom', 'lekh' ),
    'priority'    => 50,
    'panel'       => 'panel_site_footer',
    'description' => esc_html__( 'Settings for footer bottom section.', 'lekh' ),
  ) 
);

$wp_customize->add_setting(
  'lekh_copyright_text', 
  array(
    'default' => esc_html__('&copy; 2019 Best blog in 21st Century', 'lekh'),
    'sanitize_callback' => 'sanitize_text_field',
  ) 
);

$wp_customize->add_control(
  'lekh_copyright_text',
  array(
    'label'      => esc_html__('Copyright Text', 'lekh' ),
    'type'       =>'text',
    'section'    => 'lekh_infofooter_settings',
    'settings'   => 'lekh_copyright_text',
  )
);
