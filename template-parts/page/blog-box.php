<?php
/**
 * Template part for displaying page content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lekh
 * @since Lekh 1.0.0
 */

$posts_per_page = get_theme_mod( 'lekh_blocks_noof_post', 3 );
$no_of_column = get_theme_mod( 'lekh_blocks_noof_column', 3 );
$show_title = get_theme_mod( 'lekh_show_block_title', 1 );
$thumbnail_size = get_theme_mod( 'lekh_blocks_thumbail_size', 'lekh-cp-700x700' );
$noimage_height = get_theme_mod( 'lekh_block_noimage_height', 100 );

$large_col = ($no_of_column>=1 && $no_of_column<=4) ? 12/$no_of_column : 4;
$medium_col = ($no_of_column==1) ? 12 : 6;
$noimage_height = ($noimage_height<20 || $noimage_height>150) ? 100 : $noimage_height;
?>
<section id="blog-box" class="blog-box">
    <div class="container-fluid container"> 
        <div class="row">
            <?php
           wp_reset_postdata();
           wp_reset_query();
            $args = array(
                'paged' => 1,
                'post_type' => 'post',
                'posts_per_page' => absint($posts_per_page),
                'posts_status' => 'publish',
            );
            $blog_result = new WP_Query($args);
            echo '<div style="clear:both;"></div>';
            if ($blog_result->have_posts()):
                $count_index = 0;
                while ($blog_result->have_posts()):
                    $blog_result->the_post();
                    $thumbanil_class = (has_post_thumbnail()) ? 'has-thumbnail' : 'no-thumbnail';
                    $padding_top = (has_post_thumbnail()) ? 0 : $noimage_height;
                    $count_index++;
                    if($count_index>$posts_per_page){
                        break;
                    }
                    ?>
                    <div class="col-<?php echo esc_attr($large_col); ?> col-sm-12 col-md-<?php echo esc_attr($medium_col); ?>">
                        <div class="innerbox-wraper <?php echo esc_attr($thumbanil_class); ?>" style="padding-top:<?php echo esc_attr($padding_top); ?>%;">
                            <div class="featured-image">
                                <?php the_post_thumbnail($thumbnail_size); ?>
                            </div>
                            <?php if($show_title): ?>
                                <div class="btn-wraper">
                                    <ul>
                                        <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                                    </ul>
                                </div>
                            <?php endif;  ?>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_query();
            wp_reset_postdata();
            ?>
            <div class="clear"></div>
        </div>
    </div>
</section>