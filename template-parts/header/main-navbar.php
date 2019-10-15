<?php
/**
 * Template part for displaying Main Navbar.
 *
 * @package Lekh
 * @since Lekh 1.0
 */
$show_logo_on_menu = get_theme_mod('logo_on_navenu', 0);
$sticky_navigation_menu = absint(get_theme_mod('sticky_navigation_menu', 1));
$menu_alignment = lekh_navigation_alignment();
$navbar_class = ' navbar-'.$menu_alignment;
if ($show_logo_on_menu) {
    $navbar_class .= ' logo-exist';
}
?>
<div class="main-navbar <?php echo ($sticky_navigation_menu) ? 'sticky-nav ' : '';
echo $navbar_class; ?>">
    <div class="container">
        <?php
        if ($show_logo_on_menu) {
            lekh_custom_logo();
        }
        get_template_part('template-parts/navigation/navigation', 'main'); // Main Menu 
        ?>
    </div>
</div>
<?php
get_template_part('template-parts/header/mobile', 'navigation');
