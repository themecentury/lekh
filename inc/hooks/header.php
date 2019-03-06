<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function lekh_body_classes($classes) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    $header_layout = esc_attr(get_theme_mod('header_layout', 'header-layout3'));
    $blog_sidebar_position = get_theme_mod('blog_sidebar_position', 'content-sidebar');
    $archive_sidebar_position = get_theme_mod('archive_sidebar_position', 'content-sidebar');
    $post_sidebar_position = esc_attr(get_theme_mod('post_sidebar_position', 'content-sidebar'));
    $post_style = esc_attr(get_theme_mod('post_style', 'fimg-classic'));
    $page_sidebar_position = esc_attr(get_theme_mod('page_sidebar_position', 'content-sidebar'));
    $page_style = esc_attr(get_theme_mod('page_style', 'fimg-classic'));

    // Adds a class for Header Layout
    $classes[] = $header_layout;

    // Adds a class to Posts
    if (is_single()) {
        $classes[] = $post_style;
    }

    // Adds a class to Pages
    if (is_page()) {
        $classes[] = $page_style;
    }

    // Check if there is no Sidebar.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-no-sidebar';
    } else {
        if (is_home()) {
            $classes[] = $blog_sidebar_position;
        }
        if (is_archive() || is_search()) {
            $classes[] = $archive_sidebar_position;
        }
        if (is_single()) {
            $classes[] = $post_sidebar_position;
        }
        if (is_page() && !is_home()) {
            $classes[] = $page_sidebar_position;
        }
    }

    return $classes;
}

add_filter('body_class', 'lekh_body_classes');