(function($){

    var winWidth, winHeight, scrollTop;
    var lekh = {

        snipits: {

            Variables: function(){
                winWidth = $(window).width();
                winHeight = $(window).height();
                scrollTop = $(document).scrollTop();
            },

            OwlCarousel: function(){



            },

            ScrollToTop: function(){
                jQuery("html, body").animate({scrollTop: 0}, "slow");
            },

            Gototop: function(){
                if (scrollTop > 20) {
                    $('#button_to_top').css('display', 'block');
                } else {
                    $('#button_to_top').css('display', 'none');
                }
            },

        },

        Events: function(){

        },

        Ready: function(){
            
            var __this = lekh;
            var snipits = __this.snipits;

            var go_to_top = snipits.ScrollToTop;
            $('#button_to_top').on('click', go_to_top);

        },

        Load: function(){},

        Resize: function(){},

        Scroll: function(){
            var __this = lekh;
            var snipits = __this.snipits;
            snipits.Variables();
            snipits.Gototop();
        },

        Init: function(){
            
            var __this = lekh;

            var ready = __this.Ready;
            $(document).ready(ready);

            var load = __this.Load;
            $(window).load(load);

            var resize = __this.Resize;
            $(window).resize(resize);

            var scroll = __this.Scroll;
            $(window).scroll(scroll);

        }

    };

    lekh.Init();

})(jQuery);

/**
 * File main.js
 *
 */
var $ = jQuery;

/**
 * Mobile Navigation
 */

(function ($) {

    var body, menuToggle, mobileSidebar, mobileNavigation;

    var $mobile_nav = $('#mobile-navigation');

    var $clone_main_menu = $('#site-navigation').children().clone();
    $clone_main_menu = $clone_main_menu.removeAttr('id');
    $clone_main_menu = $clone_main_menu.attr('id', 'mobile-menu');
    $clone_main_menu = $clone_main_menu.addClass('mobile-menu');

    var $clone_social_links = $('#social-links').children().clone();
    $clone_social_links = $clone_social_links.addClass('mobile-social-menu');

    $mobile_nav.append($clone_main_menu, $clone_social_links);

    function initMainNavigation(container) {

        // Add dropdown toggle that displays child menu items.
        var dropdownToggle = $('<button />', {
            'class': 'dropdown-toggle',
            'aria-expanded': false
        });

        container.find('.menu-item-has-children > a').after(dropdownToggle);

        // Toggle buttons and submenu items with active children menu items.
        container.find('.current-menu-ancestor > button').addClass('toggled-on');
        container.find('.current-menu-ancestor > .sub-menu').addClass('toggled-on');

        // Add menu items with submenus to aria-haspopup="true".
        container.find('.menu-item-has-children').attr('aria-haspopup', 'true');

        container.find('.dropdown-toggle').click(function (e) {
            var _this = $(this),
                    screenReaderSpan = _this.find('.screen-reader-text');

            e.preventDefault();
            _this.toggleClass('toggled-on');
            _this.next('.children, .sub-menu').toggleClass('toggled-on');

            // jscs:disable
            _this.attr('aria-expanded', _this.attr('aria-expanded') === 'false' ? 'true' : 'false');
            // jscs:enable

        });
    }
    initMainNavigation($('.mobile-navigation'));

    body = $('body');
    menuToggle = $('.menu-toggle');
    mobileSidebar = $('.mobile-sidebar');
    mobileNavigation = $('#mobile-navigation');

    // Enable menuToggle.
    (function () {

        // Return early if menuToggle is missing.
        if (!menuToggle.length) {
            return;
        }

        // Add an initial values for the attribute.
        menuToggle.add(mobileNavigation).attr('aria-expanded', 'false');

        menuToggle.on('click.lekh', function () {
            menuToggle.add(mobileSidebar).toggleClass('toggled-on');
            body.toggleClass('mobile-sidebar-active');

            // jscs:disable
            menuToggle.add(mobileNavigation).attr('aria-expanded', menuToggle.add(mobileNavigation).attr('aria-expanded') === 'false' ? 'true' : 'false');
            // jscs:enable
        });
    })();

    // Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
    (function () {
        if (!mobileNavigation.length || !mobileNavigation.children().length) {
            return;
        }

        // Toggle `focus` class to allow submenu access on tablets.
        function toggleFocusClassTouchScreen() {
            if (window.innerWidth >= 960) {
                $(document.body).on('touchstart.lekh', function (e) {
                    if (!$(e.target).closest('.mobile-navigation li').length) {
                        $('.mobile-navigation li').removeClass('focus');
                    }
                });
                mobileNavigation.find('.menu-item-has-children > a').on('touchstart.lekh', function (e) {
                    var el = $(this).parent('li');

                    if (!el.hasClass('focus')) {
                        e.preventDefault();
                        el.toggleClass('focus');
                        el.siblings('.focus').removeClass('focus');
                    }
                });
            } else {
                mobileNavigation.find('.menu-item-has-children > a').unbind('touchstart.lekh');
            }
        }

        if ('ontouchstart' in window) {
            $(window).on('resize.lekh', toggleFocusClassTouchScreen);
            toggleFocusClassTouchScreen();
        }

        mobileNavigation.find('a').on('focus.lekh blur.lekh', function () {
            $(this).parents('.menu-item').toggleClass('focus');
        });
    })();

    // Add the default ARIA attributes for the menu toggle and the navigations.
    function onResizeARIA() {
        if (window.innerWidth < 960) {
            if (menuToggle.hasClass('toggled-on')) {
                menuToggle.attr('aria-expanded', 'true');
            } else {
                menuToggle.attr('aria-expanded', 'false');
            }

            if (mobileSidebar.hasClass('toggled-on')) {
                mobileNavigation.attr('aria-expanded', 'true');
            } else {
                mobileNavigation.attr('aria-expanded', 'false');
            }

            menuToggle.attr('aria-controls', 'site-navigation');
        } else {
            menuToggle.removeAttr('aria-expanded');
            mobileNavigation.removeAttr('aria-expanded');
            menuToggle.removeAttr('aria-controls');
        }
    }
    /**
    * megamenu overflow fix js
    * @package ThemeCentury
    * @subpackage Lekh 
    * @since 1.1.2
    */
    function megamenuOverflow_fix(){
        var sub_menu = $('#main-menu .sub-menu');
        sub_menu.each(function(){
            var __this = $(this);
            var submenu_position = __this.position();
            var submenu_position_offset = __this.offset();
            var leftValue = submenu_position_offset.left;
            if(leftValue>900){
                __this.addClass('reverse');
            } 
            else{}
        });
    }
})(jQuery);

var lekh_lazyload_offset = 0;
var lekh_lazyload_ajax_loading = false;
function jquery_lazy_load_ajax(lazy_load_selector, lazy_load_data) {
    $('.loading-image').addClass('active');
    var lekh_ajax_url;
    lekh_ajax_url = lekh_global_object.ajax_url;
    $.ajax({
        url: lekh_ajax_url,
        type: "POST",
        dataType: "html",
        data: {
            action: 'lazy_load_post',
            lozyload: lazy_load_data,
        },
        success: function (response) {
            if (response){
                if($(response).find('.post-wrapper').length){
                    $lekh_items_data = $(response).html();
                    lazy_load_selector.append($lekh_items_data);
                    lazy_load_selector.masonry('reload');
                }
                lekh_lazyload_ajax_loading = false;
            } else {
                lazy_load_selector.attr('data-completed', '1');
            }
            $('.loading-image').removeClass('active');
        }
    });

}

function ajax_load_function() {

    if (lekh_lazyload_ajax_loading) {
        return;
    }
    var lazy_load_selector, lazy_load_data, lazy_load_completed, lazyLoadPosition, scrollTop, lazyLoadHeight, positionFromTop, winHeight;
    winHeight = $(window).height();
    scrollTop = $(window).scrollTop();
    lazy_load_selector = $('.lekh-lazy-loading');
    positionFromTop = lazy_load_selector.position().top;
    lazyLoadHeight = lazy_load_selector.height();
    lazyLoadPosition = positionFromTop + lazyLoadHeight;
    if (lazyLoadPosition > scrollTop + winHeight) {
        return;
    }
    lazy_load_completed = lazy_load_selector.data('completed');
    if (lazy_load_completed) {
        return;
    }
    lekh_lazyload_ajax_loading = true;
    lazy_load_data = lazy_load_selector.data('lazyload');
    lazy_load_data.offset = lazy_load_selector.find('.post-wrapper').length;
    lekh_lazyload_offset = (lekh_lazyload_offset) ? lekh_lazyload_offset : lazy_load_data.post_count;
    lazy_load_data.post_count = lekh_lazyload_offset;
    jquery_lazy_load_ajax(lazy_load_selector, lazy_load_data);

}

/**
 * Search Icon Toggle effect
 */
jQuery(document).ready(function () {

    jQuery(".breaking-news").owlCarousel({
                items: 1,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000, // Default is 5000
                smartSpeed: 250, // Default is 250
                autoplayHoverPause: false,
                loop: true,
                mouseDrag: false,
                touchDrag: false,
                animateOut: 'slideOutUp',
                animateIn: 'slideInUp'
            });

    jQuery(".format-gallery.owl-carousel").owlCarousel({
                items: 1,
                dots: false,
                autoplay: false,
                autoplayTimeout: 5000, // Default is 5000
                smartSpeed: 250, // Default is 250
                autoplayHoverPause: false,
                loop: true,
                margin:0,
                autoHeight: true,
                mouseDrag: false,
                touchDrag: false,
                //animateOut: 'slideOutUp',
                //animateIn: 'slideInUp'
            });

    $(window).on('scroll', function () {
        if ($('.lekh-lazy-loading').length) {
            ajax_load_function();
        }
    });
    
    var owlargs = {
        items:1,
    };
    jQuery('.lekh-slider-carousel').owlCarousel(owlargs);

    jQuery('.top-search-button').click(function () {
        jQuery('.top-search').toggleClass('active');
    });

    jQuery(window).load(function () {
        var gridwraper = jQuery('.wrapper-type-grid');
        gridwraper.masonry({
            itemSelector: '.post-wrapper'
        });
        jQuery('.gallery').masonry({
            itemSelector: '.gallery-item'
        });
    });

});
