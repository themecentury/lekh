<?php

//define('LEKH_PARENT_DIR', get_template_directory());
define('LEKH_CHILD_DIR', get_stylesheet_directory());

define('LEKH_INCLUDES_DIR', get_template_directory() . '/inc');

if (!function_exists('lekh_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function lekh_setup() {

        // Make theme available for translation. Translations can be filed in the /languages/ directory
        load_theme_textdomain('lekh', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title
        add_theme_support('title-tag');

        // Enable support for Post Thumbnail
        add_theme_support('post-thumbnails');
        add_image_size('lekh-cp-520x400', 520, 400, true);
        add_image_size('lekh-cp-450x450', 450, 450, true);
        add_image_size('lekh-cp-700x700', 700, 700, true);
        add_image_size('lekh-cp-800x500', 800, 500, true);
        add_image_size('lekh-cp-1200x580', 1200, 580, true);

        // Set the default content width.
        $GLOBALS['content_width'] = 1160;

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'main_menu' => esc_html__('Main Menu', 'lekh'),
        ));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array('comment-form', 'comment-list', 'gallery', 'caption'));

        // Enable support for Post Formats
        add_theme_support('post-formats', array('image', 'video', 'audio', 'gallery', 'quote'));

        // Enable support for custom logo.
        add_theme_support('custom-logo', array(
            'height' => 400,
            'width' => 400,
            'flex-height' => true,
        ));

        // Set up the WordPress Custom Background Feature.
        $defaults = array(
            'default-color' => '#ffffff',
            'default-image' => '',
        );
        add_theme_support('custom-background', $defaults);

        // This theme styles the visual editor to resemble the theme style,
        add_editor_style(array('assets/css/editor-style.css', lekh_fonts_url()));

    }

endif;
add_action('after_setup_theme', 'lekh_setup');

/**
 * Enqueue scripts and styles.
 */
function lekh_scripts() {

    // Add Google Fonts
    wp_enqueue_style('lekh-fonts', lekh_fonts_url(), array(), null);

    // Add Font Awesome Icons
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome.css', array(), '4.7');

    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/lib/owl.carousel/css/owl.carousel.min.css', array(), '4.7');

    if (is_rtl()):
        wp_enqueue_style('lekh-default-style-rtl', get_template_directory_uri() . '/assets/css/lekh-rtl.css', array(), '1.0.0');
    else:
        wp_enqueue_style('lekh-default-style', get_template_directory_uri() . '/assets/css/lekh.css', array(), '1.0.0');
    endif;

    // Theme stylesheet
    wp_enqueue_style('lekh-style', get_stylesheet_uri(), array(), '1.0.0');

    wp_localize_script('jquery', 'lekh_global_object', array('ajax_url' => admin_url('admin-ajax.php')));

    wp_enqueue_script('lekh-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);

    wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/lib/parallax/parallax.min.js', array(), '1.5.0', true);

    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/lib/owl.carousel/js/owl.carousel.min.js', array(), '2.2.1', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('jquery-masonry');

    wp_enqueue_script('lekh-main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'lekh_scripts');


if ( ! function_exists( 'lekh_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see lekh_custom_header_setup().
 */
function lekh_header_style() {
    $header_text_color = get_header_textcolor();

    /*
     * If no custom options for text are set, let's bail.
     * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
     */
    if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
        return;
    }

    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style lekh="text/css">
    <?php
        // Has the text been hidden?
        if ( ! display_header_text() ) :
    ?>
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }
    <?php
        // If the user has set a custom color for the text use that.
        else :
    ?>
        #masthead .site-branding h1.site-title a, #masthead .site-branding h1.site-title a:hover {
            color: #<?php echo esc_attr( $header_text_color ); ?>;
        }
    <?php endif; ?>
    </style>
    <?php
}
endif;

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses lekh_header_style()
 */
function lekh_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'lekh_custom_header_args', array(
        'default-image'          => '',
        'default-text-color'     => '222222',
        'width'                  => 1600,
        'height'                 => 960,
        'flex-height'            => true,
        'wp-head-callback'       => 'lekh_header_style',
    ) ) );
}
add_action( 'after_setup_theme', 'lekh_custom_header_setup' );


/**
     * Filter the except length.
     *
     */
function lekh_excerpt_length($excerpt_length) {

    if (is_admin()) {
        return $excerpt_length;
    }

    if( is_home() ){
        $excerpt_length = get_theme_mod('blog_excerpt_length', 25);
    }elseif( is_archive() ){
        $excerpt_length = get_theme_mod('archive_excerpt_length', 25);
    }elseif( is_search() ){
        $excerpt_length = get_theme_mod( 'search_excerpt_length', 25);
    }else{
        $excerpt_length = 25;
    }

    return absint($excerpt_length);

}

add_filter('excerpt_length', 'lekh_excerpt_length', 999);

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 */
function lekh_excerpt_more($more) {
    if (is_admin()) {
        return $more;
    }
    if (get_theme_mod('show_read_more', 1)) {
        $more = sprintf('<span class="read-more-link"><a class="read-more" href="%1$s">%2$s</a></span>', esc_url(get_permalink(get_the_ID())), esc_html__('Read More', 'lekh')
    );

        return $more;
    }
}

add_filter('excerpt_more', 'lekh_excerpt_more');


/**
 * Exclude Featured Posts from the Main Loop
 */
if (get_theme_mod('show_featured_posts') && get_theme_mod('exclude_featured_posts', 1)) {

    function lekh_exclude_featured_posts($query) {
        if ($query->is_main_query() && $query->is_home()) {
            $query->set('post__not_in', lekh_get_featured_posts_ids());
        }
    }

    add_action('pre_get_posts', 'lekh_exclude_featured_posts');
}