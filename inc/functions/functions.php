<?php

/**
 * Lekh functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lekh
 * @since Lekh 1.0
 */

if (!function_exists('lekh_fonts_url')) :

    /**
     * Register Google fonts.
     *
     * @return string Google fonts URL for the theme.
     */
    function lekh_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Nunito Sans, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Open Sans: on or off', 'lekh')) {
            $fonts[] = 'Open Sans:400,700,300,400italic,700italic';
        }

        /* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins: on or off', 'lekh')) {
            $fonts[] = 'Open Sans:400,700';
        }

        /* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'lekh');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * // Set the default content width.
 *
 */

function lekh_fallback_menu() {
    $home_url = esc_url(home_url('/'));
    $main_site_url = 'themecentury.com/';
    $protocal_type = 'https://';
    ?>
    <ul class="main-menu">
        <li><a href="<?php echo esc_url($home_url); ?>" rel="home"><?php esc_html_e( 'Home', 'lekh' ); ?></a></li>
        <li><a href="<?php echo esc_url($protocal_type.'demo.'.$main_site_url.'wpthemes/lekh/'); ?>" target="_blank" rel="demo"><?php esc_html_e( 'Demo', 'lekh' ); ?></a></li>
        <li><a href="<?php echo esc_url($protocal_type.'docs.'.$main_site_url); ?>" target="_blank" rel="docs"><?php esc_html_e( 'Docs', 'lekh' ); ?></a></li>
        <li><a href="<?php echo esc_url($protocal_type.$main_site_url.'forums/forum/lekh-free-wordpress-theme'); ?>" target="_blank" rel="docs"><?php esc_html_e( 'Support Forum', 'lekh' ); ?></a></li>
    </ul>
    <?php
}

/**
 * Blog: Post Templates
 *
 */
function lekh_blog_template() {
	$blog_layout = get_theme_mod('blog_layout', 'list');
	if ('list' == $blog_layout) {
		return sanitize_file_name('list');
	} elseif ('grid' == $blog_layout) {
		return sanitize_file_name('grid');
	} else {
		return;
	}
}

/**
 * Blog: Post Columns
 *
 */
 function lekh_blog_column() {
 	$blog_layout = get_theme_mod('blog_layout', 'list');
 	$blog_sidebar_position = get_theme_mod('blog_sidebar_position', 'content-sidebar');

 	if ('list' == $blog_layout) {
 		if (!is_active_sidebar('sidebar-1') || 'content-fullwidth' == $blog_sidebar_position) {
 			$blog_column = 'col-6 col-sm-6';
 		} else {
 			$blog_column = 'col-12';
 		}
 	} elseif ('grid' == $blog_layout) {
 		if (!is_active_sidebar('sidebar-1') || 'content-fullwidth' == $blog_sidebar_position) {
 			$blog_column = 'col-4 col-sm-6';
 		} else {
 			$blog_column = 'col-6 col-sm-6';
 		}
 	} else {
 		$blog_column = 'col-12';
 	}

 	return ( $blog_column );
 }

/**
 * Archive: Post Templates
 *
 */
 function lekh_archive_template() {
 	$archive_layout = get_theme_mod('archive_layout', 'list');
 	if ('list' == $archive_layout) {
 		return sanitize_file_name('list');
 	} elseif ('grid' == $archive_layout) {
 		return sanitize_file_name('grid');
 	} else {
 		return;
 	}
 }

/**
 * Archive: Post Columns
 *
 */
function lekh_archive_column() {
	$archive_layout = get_theme_mod('archive_layout', 'list');
	$archive_sidebar_position = get_theme_mod('archive_sidebar_position', 'content-sidebar');

	if ('list' == $archive_layout) {
		if (!is_active_sidebar('sidebar-1') || 'content-fullwidth' == $archive_sidebar_position) {
			$archive_column = 'col-6 col-sm-6';
		} else {
			$archive_column = 'col-12';
		}
	} elseif ('grid' == $archive_layout) {
		if (!is_active_sidebar('sidebar-1') || 'content-fullwidth' == $archive_sidebar_position) {
			$archive_column = 'col-4 col-sm-6';
		} else {
			$archive_column = 'col-6 col-sm-6';
		}
	} else {
		$archive_column = 'col-12';
	}

	return ( $archive_column );
}


function lekh_get_featured_posts_ids() {
	$featured_posts_cat = absint(get_theme_mod('featured_posts_category', get_option('default_category')));
	$featured_posts_ids = array();

	$featured_posts = get_posts(array(
		'get_post' => 'post',
		'posts_per_page' => 5,
		'orderby' => 'date',
		'order' => 'DESC',
		'cat' => $featured_posts_cat,
		'ignore_sticky_posts' => true,
	));

	if ($featured_posts) {
		foreach ($featured_posts as $post) :
			$featured_posts_ids[] = $post->ID;
		endforeach;
		wp_reset_postdata();
	}

	return $featured_posts_ids;
}

/**
 * Display Custom Logo
 *
 */
function lekh_custom_logo() {

    if (function_exists('the_custom_logo') && has_custom_logo()) {
        ?>
        <h1 class="site-title site-logo"><?php the_custom_logo(); ?></h1>
        <?php 
    } else { ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
            rel="home"><?php bloginfo('name'); ?></a>
        </h1>
        <?php
    }

}

/**
 * Prints Credits in the Footer
 */
function lekh_credits() {
    $copyright_text = get_theme_mod( 'lekh_copyright_text', esc_html__('&copy; 2019 Best blog in 21st Century', 'lekh') );
    echo wp_kses_post($copyright_text);
}

/**
 * Define font awesome social media icons
 *
 * @return array();
 * @since 1.0.0
 */
if (!function_exists('lekh_font_awesome_social_icon_array')) :

    function lekh_font_awesome_social_icon_array() {
        return array(
            "fa fa-facebook-square",
            "fa fa-facebook-f",
            "fa fa-facebook",
            "fa fa-facebook-official",
            "fa fa-twitter-square",
            "fa fa-twitter",
            "fa fa-yahoo",
            "fa fa-google",
            "fa fa-google-wallet",
            "fa fa-google-plus-circle",
            "fa fa-google-plus-official",
            "fa fa-instagram",
            "fa fa-linkedin-square",
            "fa fa-linkedin",
            "fa fa-pinterest-p",
            "fa fa-pinterest",
            "fa fa-pinterest-square",
            "fa fa-google-plus-square",
            "fa fa-google-plus",
            "fa fa-youtube-square",
            "fa fa-youtube",
            "fa fa-youtube-play",
            "fa fa-vimeo",
            "fa fa-vimeo-square",
        );
    }

endif;

/*
 * website layout
 */
if (!function_exists('lekh_website_layout')) :

    function lekh_website_layout() {
        $website_layout = get_theme_mod('website_layout', 'box');
        return $website_layout;
    }

endif;

/* --------------------------------------------------------------------------------------------------------------- */
/**
 * Social media function
 *
 * @since 1.0.0
 */
if (!function_exists('lekh_social_media')):

    function lekh_social_media() {
        $get_social_media_icons = get_theme_mod('social_media_icons', '');
        $get_decode_social_media = json_decode($get_social_media_icons);
        if (!empty($get_decode_social_media)) {
            echo '<div class="lekh-social-icons-wrapper">';
            foreach ($get_decode_social_media as $single_icon) {
                $icon_class = isset($single_icon->social_icon_class) ? $single_icon->social_icon_class : '';
                $icon_url = isset($single_icon->social_icon_url) ? $single_icon->social_icon_url : '';
                $icon_bg = isset($single_icon->social_icon_bg) ? $single_icon->social_icon_bg : '';
                if (!empty($icon_url)) {
                    echo '<span class="social-link"><a href="' . esc_url($icon_url) . '" target="_blank"><i class="' . esc_attr($icon_class) . '" style="background-color:'.sanitize_hex_color($icon_bg).'"></i></a></span>';
                }
            }
            echo '</div><!-- .lekh-social-icons-wrapper -->';
        }
    }

endif;

if (!function_exists('lekh_debug')):

    function lekh_debug($value, $dump = false) {
        if ($dump) {
            echo "<pre>";
            var_dump($value);
            echo "</pre>";
        } else {
            echo "<pre>";
            print_r($value);
            echo "</pre>";
        }
    }

endif;


if (!function_exists('lekh_lazyload_data')):

    function lekh_lazyload_data() {

        global $wp_query;
        $data_lazyload = array(
            'post_count' => $wp_query->post_count,
            'where' => is_home() ? 'home' : 'category',
        );
        return $data_lazyload;
    }



endif;


/**
 * categories in dropdown
 *
 * @since 1.0.9
 */
if (!function_exists('lekh_category_dropdown')) :

    function lekh_category_dropdown() {
        $lekh_categories = get_categories(array('hide_empty' => 0));
        $lekh_category_dropdown['0'] = esc_html__('Select Category', 'lekh');
        foreach ($lekh_categories as $lekh_category) {
            $lekh_category_dropdown[$lekh_category->term_id] = $lekh_category->cat_name;
        }
        return $lekh_category_dropdown;
    }

endif;

/**
 * Custom function for wp_query args
 * @since 1.0.9
 */
if (!function_exists('lekh_query_args')):

    function lekh_query_args($cat_id, $post_count = null) {
        if (!empty($cat_id)) {
            $lekh_args = array(
                'post_type' => 'post',
                'cat' => $cat_id,
                'posts_per_page' => $post_count
            );
        } else {
            $lekh_args = array(
                'post_type' => 'post',
                'posts_per_page' => $post_count,
                'ignore_sticky_posts' => 1
            );
        }

        return $lekh_args;
    }

endif;

if (!function_exists('lekh_get_categories')):
/**
 * Get all Categories
 */
function lekh_get_categories() {
    $args = array('fields' => 'ids');
    $categories = get_categories();
    $categories_list = array(
        '' => esc_html__('Select Category', 'lekh')
    );
    foreach ($categories as $category) {
        $categories_list['' . $category->term_id . ''] = $category->name;
    }
    return $categories_list;
}
endif;

if(!function_exists('lekh_add_class_to_body')){

    function lekh_add_class_to_body($classes){

        $website_skin = get_theme_mod('website_skin', 'no_skin');
        $classes[] = $website_skin;
        return $classes;

    }

}

add_filter('body_class', 'lekh_add_class_to_body');

add_filter( 'wp_calculate_image_srcset', '__return_false' );

if(!function_exists('lekh_author_listing')):

    function lekh_author_listing(){

        $authors = get_users();
        $author_listing = array();
        foreach ( $authors as $author_detail ) :
            $author_listing[$author_detail->ID]=$author_detail->data->user_login;
        endforeach;

        return $author_listing;

    }

endif;