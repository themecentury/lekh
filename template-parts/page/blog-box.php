<?php
/**
 * Template part for displaying page content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lekh
 * @since Lekh 1.0.0
 */
?>
<section id="blog-box" class="blog-box">
    <div class="container-fluid container"> 
        <div class="row">
            <?php
           wp_reset_postdata();
           wp_reset_query();
            $args = array(
                'paged'=>1,
                'post_type' => 'post',
                'posts_per_page' => 3,
                'nopaging' => false,
                'posts_status' => 'publish',
            );
            $blog_result = new WP_Query($args);
            echo '<div style="clear:both;"></div>';
            if ($blog_result->have_posts()):
                while ($blog_result->have_posts()):
                    $blog_result->the_post();
                    ?>
                    <div class="col-4 col-sm-12 col-md-6">
                        <div class="innerbox-wraper">                             
                            <div class="featured-image">
                                <?php the_post_thumbnail('lekh-cp-700x700'); ?>
                            </div>
                            <div class="btn-wraper">
                                <ul>
                                    <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                                </ul>
                            </div>
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