<?php

/**
 * lekh Functions
 */
require_once lekh_file_directory('inc/functions/init.php');

/*
 * Include themecentury library 
 */
require_once lekh_file_directory( 'inc/centurylib/centurylib.php' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require_once lekh_file_directory( 'inc/widgets/sidebars.php' );

/**
 * require lekh hooks files.
 */
require_once lekh_file_directory( 'inc/hooks/init.php' );
  
/**
 * lekh Customizer
 */
require_once lekh_file_directory( 'inc/customizer/customizer.php' );
