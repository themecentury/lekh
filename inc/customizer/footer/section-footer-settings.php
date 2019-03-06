<?php
/*
 * Footer Settings 
 */

$wp_customize->add_section( 
  'lekh_footer_settings', 
  array(
    'title'       => esc_html__( 'Footer Settings', 'lekh' ),
    'priority'    => 50,
    'panel'       => 'panel_site_footer',
    'description' => esc_html__( 'Settings for footer section.', 'lekh' ),
  ) 
);

$wp_customize->add_setting(
  'lekh_parallax_footer', 
  array(
    'sanitize_callback' => 'esc_url',
  ) 
);

$wp_customize->add_control(
  new WP_Customize_Image_Control(
    $wp_customize,
    'lekh_parallax_footer',
    array(
      'label'      => esc_html__('Upload Image For Parallax Footer Background', 'lekh' ),
      'section'    => 'lekh_footer_settings',
      'settings'   => 'lekh_parallax_footer',
    )
  )
);
