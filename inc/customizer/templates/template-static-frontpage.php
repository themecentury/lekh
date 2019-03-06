<?php
/*
 * Static Front Page
 */
$static_front_page = $wp_customize->get_section('static_front_page');
$static_front_page->priority = 50;
$static_front_page->panel = 'panel_page_templates';
