<?php
/**
 * @widget_name: Author Widget
 * @description: The Widget will display author details in your sidebar with lot's of filters
 * @package: ThemeCentury
 * @subpackage: Lekh
 * @author: ThemeCentury Team
 * @author_uri: https://themecentury.com
 * @since 1.0.0
 */

if (!class_exists('Lekh_Author_Widget')) {

    class Lekh_Author_Widget extends Centurylib_Master_Widget {

        public  function __construct() {

            $widget_options = array(
                'classname' => 'lekh_author_widget',
                'description' => esc_html__( 'A widget to display posts and thumbs with a lots of filters.', 'lekh' ));
            parent::__construct('lekh_author_widget', esc_html__( 'LH - Author Widget', 'lekh' ), $widget_options);	

        }

    	/**
    	 * Helper function that holds widget fields
    	 * Array is used in update and form functions
    	 */
    	public function widget_fields( $instance = array() ){

            $lekh_author_listing = lekh_author_listing();
            $lekh_link_target = centurylib_link_target();

            $fields = array(
                'author_widget_tabs'       => array(
                    'tcy_widget_field_name'     => 'author_widget_tabs',
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
                                    'tcy_widget_field_default'  => esc_html__('Author Info', 'lekh'),
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
                                'author_id'    => array(
                                    'tcy_widget_field_name'     => 'author_id',
                                    'tcy_widget_field_wraper'   => 'centurylib-post-type',
                                    'tcy_widget_field_title'    => esc_html__( 'Choose author/user', 'lekh' ),
                                    'tcy_widget_field_default'  => 'post',
                                    'tcy_widget_field_type'     => 'select',
                                    'tcy_widget_field_options'  => $lekh_author_listing,
                                ),
                                'author_designation'   => array(
                                    'tcy_widget_field_name'     => 'author_designation',
                                    'tcy_widget_field_wraper'   => 'author-designation',
                                    'tcy_widget_field_title'    => esc_html__( 'Author Designation', 'lekh' ),
                                    'tcy_widget_field_default'  => esc_html__('Content Writer', 'lekh'),
                                    'tcy_widget_field_type'     => 'text',
                                ),
                                'show_avatar'    => array(
                                    'tcy_widget_field_name'     => 'show_avatar',
                                    'tcy_widget_field_wraper'   => 'show-avatar',
                                    'tcy_widget_field_title'    => esc_html__( 'Show Author Avatar?', 'lekh' ),
                                    'tcy_widget_field_default'  => 1,
                                    'tcy_widget_field_type'     => 'checkbox',
                                    'tcy_widget_field_relation' => array(
                                        'exist' => array(
                                            'show_fields'   => array(
                                                'avatar-size', 
                                            ),
                                        ),
                                        'empty' => array(
                                            'hide_fields'   => array(
                                                'avatar-size', 
                                            ),
                                        ),
                                    ),
                                ),
                                'avatar_size'          => array(
                                    'tcy_widget_field_name'     => 'avatar_size',
                                    'tcy_widget_field_wraper'   => 'avatar-size',
                                    'tcy_widget_field_title'    => esc_html__( 'Avatar Size', 'lekh' ),
                                    'tcy_widget_field_default'  => 150,
                                    'tcy_widget_field_type'     => 'number'
                                )
                            )
                        ),
                        'layout'=>array(
                            'tcy_widget_field_title'    => esc_html__('Layout', 'lekh'),
                            'tcy_widget_field_options'          => array(
                                'show_description'=>array(
                                    'tcy_widget_field_name'     => 'show_description',
                                    'tcy_widget_field_title'    => esc_html__( 'Show Author Description?', 'lekh' ),
                                    'tcy_widget_field_default'  => 1,
                                    'tcy_widget_field_type'     => 'checkbox',
                                    'tcy_widget_field_relation' => array(
                                        'empty'=>array(
                                            'hide_fields'=>array(
                                                'description-limit',
                                            ),
                                        ),
                                        'exist'=>array(
                                            'show_fields'=>array(
                                                'description-limit',
                                            ),
                                        ),
                                    ),
                                ),
                                'description_limit'=>array(
                                    'tcy_widget_field_name'     => 'description_limit',
                                    'tcy_widget_field_title'    => esc_html__( 'Description Limit', 'lekh' ),
                                    'tcy_widget_field_wraper'   => 'description-limit',
                                    'tcy_widget_field_default'  => '100',
                                    'tcy_widget_field_type'     => 'number',
                                    'tcy_widget_field_description'=> esc_html__('Specify number of characters to limit author description length', 'lekh'),
                                ),
                                'author_link_target'=>array(
                                    'tcy_widget_field_name'     => 'author_link_target',
                                    'tcy_widget_field_wraper'   => 'view-all-option',
                                    'tcy_widget_field_title'         => esc_html__( 'Author link target', 'lekh' ),
                                    'tcy_widget_field_default'  => '_self',
                                    'tcy_widget_field_type'     => 'select',
                                    'tcy_widget_field_options'  => $lekh_link_target,
                                ),
                                'all_link_text'=>array(
                                    'tcy_widget_field_name'     => 'all_link_text',
                                    'tcy_widget_field_wraper'   => 'all-link-text',
                                    'tcy_widget_field_title'    => esc_html__( 'All link text', 'lekh' ),
                                    'tcy_widget_field_default'  => esc_html__('View All', 'lekh'),
                                    'tcy_widget_field_type'     => 'text',
                                ),
                                'show_social_media'=>array(
                                    'tcy_widget_field_name'     => 'show_social_media',
                                    'tcy_widget_field_wraper'   => 'show-social-media',
                                    'tcy_widget_field_title'    => esc_html__( 'Show Social Media', 'lekh' ),
                                    'tcy_widget_field_default'  => 1,
                                    'tcy_widget_field_type'     => 'checkbox',
                                ),
                            )
                        )
                    )
                )
            );

            $widget_fields_key = 'fields_'.$this->id_base;
            $widgets_fields = apply_filters( $widget_fields_key, $fields );
            return $widgets_fields;

        }

    	/**
    	 * Display the widget
    	 */	
    	function widget( $args, $instance ) {

            /*
             * Args Values
             */
            $before_widget = isset( $args['before_widget'] ) ? $args['before_widget'] : '';
            $after_widget  = isset( $args['after_widget'] ) ? $args['after_widget'] : '';
            $before_title = isset( $args['before_title'] ) ? $args['before_title'] : '';
            $after_title  = isset( $args['after_title'] ) ? $args['after_title'] : '';


            /*
             * Instance General Tab Value
             */
            $title      = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
            $title_target      = isset( $instance['title_target'] ) ? esc_html( $instance['title_target'] ) : '';
            $title_link      = isset( $instance['title_link'] ) ? esc_html( $instance['title_link'] ) : '';
            $author_id    = isset($instance['author_id']) ? absint( $instance['author_id'] ) : 0;
            $author_designation       = isset( $instance['author_designation'] ) ? esc_html( $instance['author_designation'] ) : '';
            $show_avatar       = isset( $instance['show_avatar'] ) ? esc_html( $instance['show_avatar'] ) : '';
            $avatar_size       = isset( $instance['avatar_size'] ) ? esc_html( $instance['avatar_size'] ) : 120;

            /*
             * Instance Layout Tab Value
             */
            $show_description = isset( $instance['show_description'] ) ? absint( $instance['show_description'] ) : 0;
            $description_limit = isset( $instance['description_limit'] ) ? absint( $instance['description_limit'] ) : '';
            $author_link_target = isset( $instance['author_link_target'] ) ? esc_attr( $instance['author_link_target'] ) : '';
            $all_link_text = isset( $instance['all_link_text'] ) ? esc_html( $instance['all_link_text'] ) : '';
            $show_social_media = isset( $instance['show_social_media'] ) ? absint( $instance['show_social_media'] ) : '';

            //Get origional Author Link for author_id
            $author_link = get_author_posts_url( get_the_author_meta( 'ID', $author_id ) );
            $title_link_before = ($title_target) ? '<a href="'.$title_link.'" target="'.$title_target.'">' : '';
            $title_link_after = ($title_target) ? '</a>' : '';
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            echo $args['before_widget'];
            if ( ! empty( $instance['title'] ) ) {
                echo $before_title . $title_link_before . $title . $title_link_after . $after_title;
            }
            ?>
            <div class="card card-profile">
                <?php if ( $show_avatar ) { ?>
                    <div class="card-avatar">
                        <a href="<?php echo esc_url($author_link); ?>"><?php 
                        echo get_avatar( get_the_author_meta( 'ID', $author_id ), $avatar_size ); 
                        ?></a>
                    </div>
                <?php } ?>
                <div class="card-content">
                    <?php 
                    if ( $show_social_media ) {
                        lekh_social_media();
                    } 
                    if ( ! empty( $author_designation ) ): 
                        ?><h5 class="category text-gray"><?php echo $author_designation ?></h5><?php 
                    endif; 
                    ?>
                    <h4 class="card-title"><?php echo get_the_author_meta( 'display_name', $author_id ); ?></h4>
                    <?php 
                    if ( $show_description ) : ?>
                        <div class="card-description">
                            <?php 
                            $description = get_the_author_meta( 'description', $author_id ); 
                            echo wpautop( $this->trim_chars( $description, $description_limit ) );
                            if ( $author_link_target && $all_link_text ) : 
                                ?><a href="<?php echo $author_link; ?>"
                                 class="button secondary radius "><?php echo $all_link_text; ?></a><?php 
                             endif;
                             ?>
                         </div>
                         <?php 
                     endif; 
                     ?>
                 </div>
             </div>
             <?php 
             echo $args['after_widget']; 
         }

        /**
         * Limit character description
         *
         * @param string $string Content to trim
         * @param int $limit Number of characters to limit
         * @param string $more Chars to append after trimmed string
         *
         * @return string Trimmed part of the string
         */
        public function trim_chars( $string, $limit, $more = '...' ) {
            if ( ! empty( $limit ) ) {
                $text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $string ), ' ' );
                preg_match_all( '/./u', $text, $chars );
                $chars = $chars[0];
                $count = count( $chars );

                if ( $count > $limit ) {
                    $chars = array_slice( $chars, 0, $limit );

                    for ( $i = ( $limit - 1 ); $i >= 0; $i -- ) {
                        if ( in_array( $chars[ $i ], array( '.', ' ', '-', '?', '!' ) ) ) {
                            break;
                        }
                    }

                    $chars  = array_slice( $chars, 0, $i );
                    $string = implode( '', $chars );
                    $string = rtrim( $string, ".,-?!" );
                    $string .= $more;
                }
            }

            return $string;
        }
    }

}