<?php
/**
 * lekh functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @package lekh
 */

if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
    ini_set( 'error_log', get_template_directory() . '/debug.txt' );
}

/**
 *
 * @since NewsMagazine 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('lekh_file_directory') ){

    function lekh_file_directory( $file_path ){

        $parent_file_path = trailingslashit( get_stylesheet_directory() ) . $file_path;
        $child_file_path = trailingslashit( get_template_directory() ) . $file_path;
        if( file_exists( wp_normalize_path( $parent_file_path ) ) ){
            return wp_normalize_path( $parent_file_path );
        }else{
            return wp_normalize_path( $child_file_path );
        }

    }

}


/**
 * News Magazine Theme Initialize
 */
require_once lekh_file_directory( 'inc/init.php' );
