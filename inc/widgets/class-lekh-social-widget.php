<?php
/**
 * @widget_name: Social Icons Widget
 * @description: This class handles everything that needs to be handled with the widget:the settings, form, display, and update.  Nice!
 * @package: ThemeCentury
 * @subpackage: Lekh
 * @author: ThemeCentury Team
 * @author_uri: https://themecentury.com
 * @since 1.0.0
 */

class Lekh_Social_Icons_Widget extends Centurylib_Master_Widget{
	
	public  function __construct() {

		$widget_options = array(
			'classname' => 'lekh-social-icons',
			'description' => esc_html__( 'A Widget to display social icons.', 'lekh' ));
		parent::__construct('lekh-social-icons', esc_html__( 'LH - Social Icons', 'lekh' ), $widget_options);	

	}

	/**
	 * Helper function that holds widget fields
	 * Array is used in update and form functions
	 */
	public function widget_fields( $instance = array() ){

        $centurylib_link_target = centurylib_link_target();

        $fields = array(
            'lekh_widget_tab'       => array(
                'tcy_widget_field_name'     => 'lekh_widget_tab',
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
                                'tcy_widget_field_title'    => esc_html__( 'Link Target', 'lekh' ),
                                'tcy_widget_field_default'  => '_self',
                                'tcy_widget_field_type'     => 'select',
                                'tcy_widget_field_options'  => $centurylib_link_target,
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
                            'social_icon_size'        => array(
                                'tcy_widget_field_name'         => 'social_icon_size',
                                'tcy_widget_field_title'        => esc_html__( 'Icons Size', 'lekh' ),
                                'tcy_widget_field_default'      => '',
                                'tcy_widget_field_type'         => 'select',
                                'tcy_widget_field_options'      => centurylib_faicon_sizes(),
                            ),
                            'social_media_target'        => array(
                                'tcy_widget_field_name'         => 'social_media_target',
                                'tcy_widget_field_title'        => esc_html__( 'Social icon open with', 'lekh' ),
                                'tcy_widget_field_default'      => '_blank',
                                'tcy_widget_field_type'         => 'select',
                                'tcy_widget_field_options'      => $centurylib_link_target,
                            ),
                            'social_icon_list'         => array(
                                'tcy_widget_field_name'     => 'social_icon_list',
                                'tcy_widget_field_title'    => esc_html__( 'Social Icon List', 'lekh' ),
                                'tcy_widget_field_type'     => 'repeater',
                                'tcy_widget_description'    => esc_html__('To add social icon click to add icon.', 'lekh'),
                                'tcy_repeater_row_title'    => esc_html__('Social Icon', 'lekh'),
                                'tcy_repeater_addnew_label' => esc_html__('Add Icon', 'lekh'),
                                'tcy_widget_field_options'  => array(
                                    'social_media_icon'  => array(
                                        'tcy_widget_field_name'     => 'social_media_icon',
                                        'tcy_widget_field_title'    => esc_html__( 'Social Media Icon', 'lekh' ),
                                        'tcy_widget_field_default'  => 'fa-facebook',
                                        'tcy_widget_field_type'     => 'icon',
                                    ),
                                    'social_media_link' => array(
                                        'tcy_widget_field_name'     => 'social_media_link',
                                        'tcy_widget_field_title'    => esc_html__( 'Social Media Link', 'lekh' ),
                                        'tcy_widget_field_default'  => 'https://facebook.com',
                                        'tcy_widget_field_type'     => 'url',
                                    ),
                                    'social_media_color' => array(
                                        'tcy_widget_field_name'     => 'social_media_color',
                                        'tcy_widget_field_title'    => esc_html__( 'Social Icon Color', 'lekh' ),
                                        'tcy_widget_field_default'  => '#00a0d2',
                                        'tcy_widget_field_type'     => 'color',
                                    ),
                                ),
                            ),
                            
                        )
                    ),
                ),
            ),
        );

        $widget_fields_key = 'fields_'.$this->id_base;
        $widgets_fields = apply_filters( $widget_fields_key, $fields );
        return $widgets_fields;

    }

	/**
	 * Display the widget
	 */	
	function widget( $args, $instance ) {

        $title = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $title_link = isset( $instance['title_link'] ) ? esc_url($instance['title_link']) : '';
        $title_target = isset( $instance['title_target'] ) ? esc_attr($instance['title_target']) : '';
        $social_icon_size = isset( $instance['social_icon_size'] ) ? esc_attr($instance['social_icon_size']) : '';
        $social_media_target = isset( $instance['social_media_target'] ) ? esc_attr($instance['social_media_target']) : '';
        $social_icon_list = isset( $instance['social_icon_list'] ) ? $instance['social_icon_list'] : array();

		/* Before widget (defined by themes).
		 * Display the widget title if one was input (before and after defined by themes). 
		 */
		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title']; 
            if($title_target){
                ?><a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>"><?php 
            }
            echo esc_html( $title );
            if($title_target){
                ?></a><?php 
            }
            echo $args['after_title'];
		} 
		?>
		<div class="social-icons">
            <?php
            foreach($social_icon_list as $index=>$social_media_details){

                $social_media_link = (isset($social_media_details['social_media_link'])) ? esc_attr($social_media_details['social_media_link']) : '';
                $social_media_icon = (isset($social_media_details['social_media_icon'])) ? esc_attr($social_media_details['social_media_icon']) : '';
                $social_media_color = (isset($social_media_details['social_media_color'])) ? esc_attr($social_media_details['social_media_color']) : '';
                ?><a 
                title="<?php esc_html_e('Lekh Social Media Icons', 'lekh'); ?>" 
                target="<?php echo esc_attr($social_media_target); ?>" 
                <?php if($social_media_target){ ?>
                href="<?php echo esc_attr($social_media_link); ?>" 
                <?php } ?> 
                style="background-color:<?php echo esc_attr( $social_media_color ); ?>"
                ><i 
                class="fa <?php echo esc_attr($social_media_icon).' '.esc_attr($social_icon_size); ?>" 
                ></i></a><?php
            }
            ?>
        </div>
        <!-- End  social-icons -->
        <?php	
        /* After widget (defined by themes). */
        echo $args['after_widget'];

    }

}
