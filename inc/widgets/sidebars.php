<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if(!function_exists('lekh_register_sidebar') ):
    function lekh_register_sidebar() {
        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'lekh'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here to appear in your sidebar.', 'lekh'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title"><span>',
            'after_title' => '</span></h2>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Widget Area 1', 'lekh'),
            'id' => 'footer-1',
            'description' => esc_html__('Add widgets here to appear in your footer.', 'lekh'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Widget Area 2', 'lekh'),
            'id' => 'footer-2',
            'description' => esc_html__('Add widgets here to appear in your footer.', 'lekh'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Widget Area 3', 'lekh'),
            'id' => 'footer-3',
            'description' => esc_html__('Add widgets here to appear in your footer.', 'lekh'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Widget Area 4', 'lekh'),
            'id' => 'footer-4',
            'description' => esc_html__('Add widgets here to appear in your footer.', 'lekh'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ));
    }
endif;
add_action('widgets_init', 'lekh_register_sidebar');



if(!function_exists('lekh_register_widgets')):

    function lekh_register_widgets(){

        require_once lekh_file_directory('inc/widgets/class-lekh-slider-widget.php');
        require_once lekh_file_directory( 'inc/widgets/class-lekh-author-widget.php');
        require_once lekh_file_directory( 'inc/widgets/class-lekh-social-widget.php');

        register_widget( 'Lekh_Author_Widget' );
        register_widget( 'Lekh_Slider_Widget' );
        register_widget( 'Lekh_Social_Icons_Widget' );

    }

endif;

add_action('widgets_init', 'lekh_register_widgets');