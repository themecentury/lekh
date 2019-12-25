<?php

require_once lekh_file_directory( 'inc/customizer/sanitize.php');

/**
 * Lekh Theme Customizer.
 *
 * @package ThemeCentury
 * @subpackage Lekh
 * @since Lekh 1.0.0
 */
if( !function_exists('lekh_theme_customizer') ):

    function lekh_theme_customizer($wp_customize){

        require_once lekh_file_directory( 'inc/customizer/controls.php');
        require_once lekh_file_directory('inc/customizer/upsell/lekh-upsell-section.php'); //Upsell section
        require_once lekh_file_directory('inc/customizer/started/lekh-get-started-section.php'); //get-started panel
        require_once lekh_file_directory('inc/customizer/header/panel-header-options.php');
        require_once lekh_file_directory('inc/customizer/templates/panel-templates-options.php');
        require_once lekh_file_directory('inc/customizer/footer/panel-footer-options.php');
        require_once lekh_file_directory('inc/customizer/colors/panel-colors-options.php');
        require_once lekh_file_directory('inc/customizer/options/panel-theme-options.php');
        require_once lekh_file_directory( '/inc/customizer/sections/lekh-sections-panel.php' );  

    }

endif;
add_action( 'customize_register', 'lekh_theme_customizer', 10, 1 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lekh_customize_preview_js() {
    wp_enqueue_script( 'lekh_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20171005', true );
}

add_action( 'customize_preview_init', 'lekh_customize_preview_js' );
/* ----------------------------------------------------------------------------------------------------------------------- */

/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function lekh_customize_backend_scripts() {

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

    if ( is_rtl() ):
        wp_enqueue_style( 'lekh_admin_customizer_style', get_template_directory_uri() . '/assets/css/customizer-rtl.css' );
    else:
        wp_enqueue_style( 'lekh_admin_customizer_style', get_template_directory_uri() . '/assets/css/customizer.css' );
    endif;

    wp_enqueue_script( 'lekh_admin_customizer', get_template_directory_uri() . '/assets/js/customizer-controls.js', array(
        'jquery',
    ), '20170616', true );
}

add_action( 'customize_controls_enqueue_scripts', 'lekh_customize_backend_scripts', 10 );



/**
 * Add inline CSS for styles handled by the Theme customizer
 *
 */
function lekh_add_styles() {
    $logo_width_desktop   = esc_attr( get_theme_mod( 'logo_width_lg' ) );
    $logo_width_mobile    = esc_attr( get_theme_mod( 'logo_width_sm' ) );
    $header_image_padding = esc_attr( get_theme_mod( 'header_image_padding', 20 ) );
    $header_image_opacity = esc_attr( get_theme_mod( 'header_image_opacity', 40 ) );
    $site_tagline_color   = esc_attr( get_theme_mod( 'site_tagline_color' ) );
    $header_background    = esc_attr( get_theme_mod( 'header_background' ) );
    $footer_background    = esc_attr( get_theme_mod( 'footer_background' ) );

    $custom_styles = "";

    // Custom Logo
    if ( $logo_width_mobile != '' ) {
        $custom_styles .= "
        @media screen and (max-width: 599px) {
        .site-logo .custom-logo {max-width: {$logo_width_mobile}px;}
        }";
    }
    if ( $logo_width_desktop != '' ) {
        $custom_styles .= "
        @media screen and (min-width: 600px) {
        .site-logo .custom-logo {max-width: {$logo_width_desktop}px;}
        }";
    }

    // Header Image Padding
    if ( $header_image_padding != '' ) {
        $custom_styles .= ".header-image {padding-top: {$header_image_padding}px;padding-bottom: {$header_image_padding}px;}";
    }

    // Header Image Opacity
    if ( $header_image_opacity != '' ) {
        $custom_styles .= "
        .header-image:before {opacity: 0.{$header_image_opacity};}
        ";
    }


    // Site Tagline Color
    if ( $site_tagline_color != '' ) {
        $custom_styles .= "#masthead .site-description {color: {$site_tagline_color};}";
    }


    // Header Background Color
    $no_parallax_header = absint( get_theme_mod( 'show_headerimage_parallax', 0 ) ) ? 0 : 1;
    if ( $header_background != '' && $no_parallax_header ) {
        $custom_styles .= ".site-header {background-color: {$header_background};}";
    }


    // Footer Widget Area Background Color
    if ( $footer_background != '' ) {
        $custom_styles .= ".site-footer .footer-main-area{background-color: {$footer_background};}";

        if ( lekh_get_brightness( $footer_background ) > 155 ) {
            $custom_styles .= "
            .site-footer .footer-main-area{
                color: rgba(0,0,0,.7);
            }
            .site-footer .widget-title,
            .site-footer .widget a, 
            .site-footer .widget a:hover {
            color: rgba(0,0,0,.8);
            }
            .site-footer .footer-main-area ul li {
            border-bottom-color: rgba(0,0,0,.05);
            }
            .site-footer .widget_tag_cloud a {
            border-color: rgba(0,0,0,.05);
            background-color: rgba(0,0,0,.05);
            }";
        }
    }

    if ( $custom_styles != '' ) {
        wp_add_inline_style( 'lekh-style', $custom_styles );
    }
}

add_action( 'wp_enqueue_scripts', 'lekh_add_styles' );



