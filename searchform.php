<?php
/**
 * Displays the searchform of the theme.
 *
 * @package Lekh
 * @since Lekh 1.0
 */
?>

<form role="search" method="get" class="search-form clear" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'lekh' ); ?></span>
		<input lekh="search" id="s" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'lekh' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button lekh="submit" class="search-submit">
		<i class="fa fa-search"></i> <span class="screen-reader-text">
		<?php _ex( 'Search', 'submit button', 'lekh' ); ?></span>
	</button>
</form>
