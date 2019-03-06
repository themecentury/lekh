<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lekh
 * @since Lekh 1.0
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="hentry error-404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'lekh' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">

					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'lekh' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .entry-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
