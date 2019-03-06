<?php
/**
 * Social Icons Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'lekh_social_icons_section', 
    array(
        'title' => esc_html__('Social Icons', 'lekh'),
        'panel' => 'lekh_sections_panel',
        'priority' => 5,
    )
);

/**
 * Repeater field for social media icons
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'social_media_icons', array(
        'sanitize_callback' => 'lekh_sanitize_repeater',
        'default' => json_encode(
            array(
                array(
                    'social_icon_class' => 'fa fa-facebook-f',
                    'social_icon_url' => '',
                    'social_icon_bg' => '',
                )
            )
        )
    )
);
$wp_customize->add_control(
    new Lekh_Repeater_Controler(
        $wp_customize, 
        'social_media_icons', 
        array(
            'label' => esc_html__('Social Media Icons', 'lekh'),
            'section' => 'lekh_social_icons_section',
            'settings' => 'social_media_icons',
            'priority' => 5,
            'lekh_box_label' => esc_html__('Social Media Icon', 'lekh'),
            'lekh_box_add_control' => esc_html__('Add Icon', 'lekh')
        ), 
        array(
            'social_icon_class' => array(
                'type' => 'social_icon',
                'label' => esc_html__('Social Media Logo', 'lekh'),
                'description' => esc_html__('Choose social media icon.', 'lekh')
            ),
            'social_icon_url' => array(
                'type' => 'url',
                'label' => esc_html__('Social Icon Url', 'lekh'),
                'description' => esc_html__('Enter social media url.', 'lekh')
            ),
            'social_icon_bg' => array(
                'type' => 'color',
                'default' => '#214d74',
                'label' => esc_html__('Social Icon Background', 'lekh'),
                'description' => esc_html__('Choose social media icon background color.', 'lekh')
            ),
        )
    )
);

