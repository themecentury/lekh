<?php
/**
 * Template part for displaying Header Image
 *
 * @package Lekh
 * @since Lekh 1.0
 */

$enable_branding = get_theme_mod( 'header_branding_option', 'enable' );
if( $enable_branding != 'enable' ){
    return;
}

if (get_header_image()) {
	$is_header_parallax = absint( get_theme_mod( 'show_headerimage_parallax', 0 ) ) ? 1 : 0;
	$header_image_parallax = ' data-parallax="scroll" data-image-src="'.esc_url( get_header_image() ).'" ';
	$header_image_background = ' style="background-image: url('.esc_url( get_header_image() ).')" ';
    ?>
    <div class="header-image" <?php echo $is_header_parallax ? $header_image_parallax : $header_image_background; ?>>
        <div class="header-image-container">
    <?php get_template_part('template-parts/header/site', 'branding'); ?>
        </div>
    </div><!-- .header-image-->
    <?php
} else {
    get_template_part('template-parts/header/site', 'branding');
}