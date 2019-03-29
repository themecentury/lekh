<?php
/**
 * Displays main navigation
 *
 * @package Lekh
 * @since Lekh 1.0
 */

?>

<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'lekh' ); ?>">
	<?php 
	wp_nav_menu( array( 
		'theme_location' => 'main_menu', 
		'menu_id' => 'main-menu', 
		'menu_class' => 'main-menu', 
		'container' => false,
		'fallback_cb' => 'lekh_fallback_menu'
	) ); 
		// Main Menu 
	?>
</nav>
<?php if (get_theme_mod('show_searchform_onmenu', 1)) { ?>
	<div class="top-search">
		<span id="top-search-button" class="top-search-button"><i class="search-icon"></i></span>
		<?php get_search_form(); ?>
	</div>
<?php } // Search Icon 
