<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lekh
 * @since Lekh 1.0
 */
get_header();

$enable_breadcrumbs = get_theme_mod( 'enable_breadcrumbs_404_page', 1 );
if($enable_breadcrumbs){
    lekh_breadcrumbs_template();
}
$sidebar_position_404 = get_theme_mod( '404_sidebar_position', 'content-sidebar' );
$lekh_404_page_title = get_theme_mod( 'lekh_404_page_title', esc_html__( 'Oops! That page can\'t be found.', 'lekh' ) );
$lekh_404_page_description = get_theme_mod( 'lekh_404_page_description', esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'lekh' ) );
$lekh_404_search_form = get_theme_mod( 'lekh_404_search_form', 1 );
 ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="hentry error-404 not-found">
				<?php if($lekh_404_page_title): ?>
					<header class="entry-header">
						<h1 class="entry-title"><?php echo esc_html( $lekh_404_page_title ); ?></h1>
					</header><!-- .entry-header -->
					<?php 
				endif;
				if($lekh_404_page_description || $lekh_404_search_form ): ?>
					<div class="entry-content">
						<?php if($lekh_404_page_description): ?>
							<p><?php echo esc_html( $lekh_404_page_description ); ?></p>
						<?php endif; ?>
						<?php if($lekh_404_search_form): ?>
							<?php get_search_form(); ?>
						<?php endif; ?>
					</div><!-- .entry-content -->
				<?php endif; ?>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
if ('content-sidebar' == $sidebar_position_404 || 'sidebar-content' == $sidebar_position_404) {
    get_sidebar();
}
get_footer();
