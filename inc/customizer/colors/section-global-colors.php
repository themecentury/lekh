<?php
/*
 * Global Colors
 */
$global_colors = $wp_customize->get_section('colors');
$global_colors->title = esc_html__('Global Colors', 'lekh');
$global_colors->priority = 10;
$global_colors->panel = 'panel_color_options';

$background_color_control = $wp_customize->get_control('background_color');
$background_color_control->priority = 10;