<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-template-parts
 *
 * @package Lekh
 * @since Lekh 1.0
 */
?>
</div><!-- .inside -->
</div><!-- .container -->
</div><!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php
	$parallax_footer = get_theme_mod('lekh_parallax_footer');
	if($parallax_footer) { ?>
		<div class="parallax" style='background-image: url("<?php echo esc_url($parallax_footer); ?>"); '>
			<div class="parallax-content"><?php  
	} ?>
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
	<div class="widget-area" role="complementary" style="<?php echo ($parallax_footer)? 'background-color:transparent !important;': ''; ?>">
			<div class="container">
				<div class="row">
					<div class="col-3 col-md-4" id="footer-area-1">
						<?php if ( is_active_sidebar( 'footer-1' ) ) {
							dynamic_sidebar( 'footer-1' );
						} // end footer widget area 1 ?>
					</div>	
					<div class="col-3 col-md-4" id="footer-area-2">
						<?php if ( is_active_sidebar( 'footer-2' ) ) {
							dynamic_sidebar( 'footer-2' );
						} // end footer widget area 2 ?>
					</div>
					<div class="col-3 col-md-4" id="footer-area-3">
						<?php if ( is_active_sidebar( 'footer-3' ) ) {
							dynamic_sidebar( 'footer-3' );
						} // end footer widget area 3 ?>
					</div>
					<div class="col-3 col-md-4" id="footer-area-4">
						<?php if ( is_active_sidebar( 'footer-4' ) ) {
							dynamic_sidebar( 'footer-4' );
						} // end footer widget area 3 ?>
					</div>
				</div>
			</div><!-- .container -->
		</div><!-- .widget-area -->
	<?php endif; ?>
	<div class="footer-copy">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="site-credits"><?php lekh_credits(); ?></div>
					<div class="site-info">
						<a href="<?php echo esc_url( esc_html__( 'https://wordpress.org/', 'lekh' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'lekh' ), 'WordPress' ); ?></a>
						<span class="sep"> - </span>
						<a href="<?php echo esc_url( esc_html__( 'http://themecentury.com', 'lekh' ) ); ?>"><?php printf( esc_html__( 'Lekh by %s', 'lekh' ), 'ThemeCentury' ); ?></a>
					</div><!-- .site-info -->
				</div>
			</div>
		</div><!-- .container -->
	</div><!-- .footer-copy -->
<?php
if($parallax_footer){ ?>
		</div>
		</div><?php 
	} ?>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>

