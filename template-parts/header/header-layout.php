<?php
/**
 * Template part for displaying Header.
 *
 * @package Lekh
 * @since Lekh 1.0
 */
$header_template = sanitize_file_name( get_theme_mod( 'header_layout', 'header-layout3' ) );
?>
<div class="site-header-wrap <?php echo $header_template; ?>">
    <?php
    if ($header_template == 'header-layout3') {
        get_template_part('template-parts/header/top', 'header');
    }
    if ($header_template != 'header-layout4') {
        get_template_part('template-parts/header/header', 'image');
    }
    get_template_part('template-parts/header/main', 'navbar');
    wp_reset_query();
	wp_reset_postdata();
    ?>
</div>