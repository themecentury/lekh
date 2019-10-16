<?php
/**
 * Template part for displaying Header.
 *
 * @package Lekh
 * @since Lekh 1.0
 */
?>
<div class="site-header-wrap">
    <?php
    get_template_part('template-parts/header/top', 'header');
    get_template_part('template-parts/header/header', 'image');
    get_template_part('template-parts/header/main', 'navbar');
    wp_reset_query();
	wp_reset_postdata();
    ?>
</div>