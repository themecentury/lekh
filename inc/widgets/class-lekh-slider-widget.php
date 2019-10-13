<?php
/**
 * @widget_name: Slider Widget
 * @description: The Widget will display post slider in your sidebar with lot's of filters
 * @package: ThemeCentury
 * @subpackage: Lekh
 * @author: ThemeCentury Team
 * @author_uri: https://themecentury.com
 * @since 1.0.0
 */

if (!class_exists('Lekh_Slider_Widget')) {
    
    class Lekh_Slider_Widget extends Centurylib_Master_Widget{

        /**
         * Register widget with WordPress.
         */
        public function __construct() {
            $widget_ops = array(
                'classname' => 'lekh_post_slider',
                'description' => esc_html__('Display block posts in grid layout.', 'lekh')
            );
            parent::__construct('lekh_post_slider', esc_html__('LH - Post Slider', 'lekh'), $widget_ops);
        }

        /**
         * Helper function that holds widget fields
         * Array is used in update and form functions
         */
        public function widget_fields( $instance = array() ){

            $lekh_author_listing = lekh_author_listing();
            $lekh_link_target = centurylib_link_target();

            $fields = array(
                'slider_widget_tabs'       => array(
                    'tcy_widget_field_name'     => 'slider_widget_tabs',
                    'tcy_widget_field_title'    => esc_html__( 'General', 'lekh' ),
                    'tcy_widget_field_default'  => 'general',
                    'tcy_widget_field_type'     => 'tabgroup',
                    'tcy_widget_field_options'  => array(
                        'general'=>array(
                            'tcy_widget_field_title'=>esc_html__('General', 'lekh'),
                            'tcy_widget_field_options'=> array(
                                'title'    => array(
                                    'tcy_widget_field_name'     => 'title',
                                    'tcy_widget_field_wraper'   => 'title',
                                    'tcy_widget_field_title'    => esc_html__( 'Title', 'lekh' ),
                                    'tcy_widget_field_default'  => '',
                                    'tcy_widget_field_type'     => 'text',
                                ),
                                'title_target'    => array(
                                    'tcy_widget_field_name'     => 'title_target',
                                    'tcy_widget_field_wraper'   => 'title-target',
                                    'tcy_widget_field_title'    => esc_html__( 'Title Target', 'lekh' ),
                                    'tcy_widget_field_default'  => '_self',
                                    'tcy_widget_field_type'     => 'select',
                                    'tcy_widget_field_options'  => $lekh_link_target,
                                    'tcy_widget_field_relation' => array(
                                        'exist' => array(
                                            'show_fields'   => array(
                                                'title-link', 
                                            ),
                                        ),
                                        'empty' => array(
                                            'hide_fields'   => array(
                                                'title-link', 
                                            ),
                                        ),
                                    ),
                                ),
                                'title_link'    => array(
                                    'tcy_widget_field_name'     => 'title_link',
                                    'tcy_widget_field_wraper'   => 'title-link',
                                    'tcy_widget_field_title'    => esc_html__( 'Title link', 'lekh' ),
                                    'tcy_widget_field_default'  => '',
                                    'tcy_widget_field_type'     => 'text',
                                ),
                                'lekh_slider_category'    => array(
                                    'tcy_widget_field_name'     => 'lekh_slider_category',
                                    'tcy_widget_field_wraper'   => 'centurylib-post-type',
                                    'tcy_widget_field_title'    => esc_html__( 'Category for Slider', 'lekh' ),
                                    'tcy_widget_taxonomy_type'  => 'category',
                                    'tcy_widget_field_type'     => 'termlist',
                                ),
                                'lekh_no_of_slide'   => array(
                                    'tcy_widget_field_name'     => 'lekh_no_of_slide',
                                    'tcy_widget_field_wraper'   => 'no-of-slide',
                                    'tcy_widget_field_title'    => esc_html__( 'No of Posts', 'lekh' ),
                                    'tcy_widget_field_default'  => 4,
                                    'tcy_widget_field_type'     => 'number',
                                ),
                                'lekh_read_more_text'    => array(
                                    'tcy_widget_field_name'     => 'lekh_read_more_text',
                                    'tcy_widget_field_wraper'   => 'read-more-text',
                                    'tcy_widget_field_title'    => esc_html__( 'Raedmore Text', 'lekh' ),
                                    'tcy_widget_field_default'  => esc_html__('Read More', 'lekh'),
                                    'tcy_widget_field_type'     => 'text',
                                ),
                                'lekh_show_full_height'          => array(
                                    'tcy_widget_field_name'     => 'lekh_show_full_height',
                                    'tcy_widget_field_wraper'   => 'show-full-height',
                                    'tcy_widget_field_title'    => esc_html__( 'Full Height ?', 'lekh' ),
                                    'tcy_widget_field_default'  => 0,
                                    'tcy_widget_field_type'     => 'checkbox',
                                ),
                                'lekh_image_size'          => array(
                                    'tcy_widget_field_name'     => 'lekh_image_size',
                                    'tcy_widget_field_wraper'   => 'lekh-image-size',
                                    'tcy_widget_field_title'    => esc_html__( 'Image Size ?', 'lekh' ),
                                    'tcy_widget_field_default'  => 'full',
                                    'tcy_widget_field_type'     => 'select',
                                    'tcy_widget_field_options'  => centurylib_get_image_sizes(),
                                ),
                            )
                        ),
                        'layout'=>array(
                            'tcy_widget_field_title'    => esc_html__('Layout', 'lekh'),
                            'tcy_widget_field_options'          => array(
                                'section_width'=>array(
                                    'tcy_widget_field_name'     => 'section_width',
                                    'tcy_widget_field_title'    => esc_html__( 'Section Width', 'lekh' ),
                                    'tcy_widget_field_wraper'   => 'lekh-section-width',
                                    'tcy_widget_field_default'  => 'container',
                                    'tcy_widget_field_type'     => 'select',
                                    'tcy_widget_field_options' => array(
                                        'container' => esc_html__('Box Width', 'lekh'),
                                        'container-fluid' => esc_html__('Full Width', 'lekh'),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            );

            $widget_fields_key = 'fields_'.$this->id_base;
            $widgets_fields = apply_filters( $widget_fields_key, $fields );
            return $widgets_fields;

        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget($args, $instance) {
            
            /*
             * Args Values
             */
            $before_widget = isset( $args['before_widget'] ) ? $args['before_widget'] : '';
            $after_widget  = isset( $args['after_widget'] ) ? $args['after_widget'] : '';
            $before_title = isset( $args['before_title'] ) ? $args['before_title'] : '';
            $after_title  = isset( $args['after_title'] ) ? $args['after_title'] : '';

            /*
             * General Tabs
             */
            $title      = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
            $title_target      = isset( $instance['title_target'] ) ? esc_attr( $instance['title_target'] ) : '';
            $title_link      = isset( $instance['title_link'] ) ? esc_url( $instance['title_link'] ) : '';
            $lekh_slider_category = isset($instance['lekh_slider_category']) ? absint($instance['lekh_slider_category']) : '';
            $lekh_no_of_slide = isset($instance['lekh_no_of_slide']) ? absint($instance['lekh_no_of_slide']) : 4;
            $lekh_read_more_text = empty($instance['lekh_read_more_text']) ? '' : esc_html($instance['lekh_read_more_text']);
            $lekh_show_full_height = isset($instance['lekh_show_full_height']) ? absint($instance['lekh_show_full_height']) : 0;
            $lekh_image_size = isset($instance['lekh_image_size']) ? esc_attr($instance['lekh_image_size']) : '';

            /*
             * Layout Tabs
             */
            $section_width = isset($instance['section_width']) ? esc_attr($instance['section_width']) : 'container';

            //Filter variables from form data
            $title = apply_filters('widget_title', $title, $instance, $this->id_base);
            $title_link_before = ($title_target) ? '<a href="'.$title_link.'" target="'.$title_target.'">' : '';
            $title_link_after = ($title_target) ? '</a>' : '';


            echo $before_widget;
            if ( ! empty( $instance['title'] ) ) {
                echo $before_title . $title_link_before . $title . $title_link_after . $after_title;
            }
            ?>
            <div class="slides_wraper <?php echo esc_attr($section_width); ?>">
                <div class="row">
                    <div class="slider_home owl-carousel lekh-slider-carousel">
                        <?php
                        $block_grid_args = lekh_query_args($lekh_slider_category, $lekh_no_of_slide);
                        $block_grid_query = new WP_Query($block_grid_args);
                        if ($block_grid_query->have_posts()) {
                            while ($block_grid_query->have_posts()) {
                                $block_grid_query->the_post();
                                ?>
                                <div class="single_slider <?php echo ($lekh_show_full_height) ? 'lekh-full-height' : ''; ?>" style="background-image:url('<?php the_post_thumbnail_url($lekh_image_size); ?>');">
                                    <div class="slider_item_tb">
                                        <div class="slider_item_tbcell">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <h2 class="wow fadeInDown" data-wow-delay="0.3s"><?php the_title(); ?></h2>
                                                        <div class="short-description wow fadeInRight" data-wow-delay="0.6s">
                                                            <?php the_excerpt(); ?>
                                                        </div>
                                                        <?php if ($lekh_read_more_text) { ?> 
                                                            <div class="slider_btn wow fadeInDown" data-wow-delay="0.9s">
                                                                <a href="<?php the_permalink(); ?>" class="slider_btn_one"><?php echo $lekh_read_more_text; ?></a>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>

            <?php
            echo $after_widget;
        }

    }

}