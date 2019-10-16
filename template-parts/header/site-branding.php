<?php
/**
 * Template part for displaying Site Branding.
 *
 * @package Lekh
 * @since Lekh 1.0
 */
$branding_alignment = lekh_branding_alignment();
$branding_class = $branding_alignment.'-brand';
$show_logo_on_menu = get_theme_mod('logo_on_navenu', 0);
if(!$show_logo_on_menu){
    $branding_class.= ' logo-exist';
}
?>
<div class="site-branding <?php echo esc_attr($branding_class); ?>">
    <div class="container">
        <div class="logo-brand-wrap">
            <?php
            if (!$show_logo_on_menu) {
                lekh_custom_logo();
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()):
                    ?>
                    <p class="site-description"><?php echo esc_html($description); ?></p>
                    <?php
                endif;
            }
            ?>
        </div>
        <?php
        if (is_active_sidebar('header-1')):
            ?><div class="header-ads-wrapper"><?php
            dynamic_sidebar('header-1');
            ?></div><?php
        else:
            $show_on_branding = get_theme_mod('show_on_branding', 'disable');
            if ($show_on_branding == 'enable') {
                //get_template_part('template-parts/snipits/lekh-social', 'icons');
                lekh_social_media();
            }
        endif;
        ?>
        <div class="clear"></div>
    </div>
</div><!-- .site-branding -->