<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lekh
 * @since Lekh 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('grid-post'); ?>>

	<?php if ( has_post_thumbnail() ) { 
		/**
    	* Image animation on hover
    	* @package ThemeCentury
    	* @subpackage Lekh 
    	* @since 1.1.2
    	*/ 
		?>
		<?php $hoverEffect = get_theme_mod('lekh_image_animation_on_hover'); ?>
		<figure class="entry-thumbnail <?php if($hoverEffect) {echo 'hovereffect';} else{ echo '';} ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('lekh-cp-800x500'); ?>
			</a>
		</figure>
	<?php } ?>

	<div class="entry-header">
		<?php if ( 'post' === get_post_type() ) { ?>
			<div class="entry-meta entry-category">
				<span class="cat-links"><?php the_category( ', ' ); ?></span>
			</div>
		<?php } ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php if ( 'post' === get_post_type() ) { ?>
			<div class="entry-meta">
				<span class="posted-on">
					<?php the_time( get_option( 'date_format' ) ); ?>
				</span>
			</div>
		<?php } ?>
	</div><!-- .entry-header -->

	<div class="entry-summary">
		 <?php the_excerpt(); ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->
