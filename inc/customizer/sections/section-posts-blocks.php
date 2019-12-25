<?php
/**
 * Social Icons Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'lekh_posts_blocks_section', 
    array(
        'title' => esc_html__('Image Blocks', 'lekh'),
        'panel' => 'lekh_sections_panel',
        'priority' => 30,
    )
);

/**
 * Blocks Category
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'lekh_post_blocks_category', 
    array(
        'sanitize_callback' => 'absint',
        'default' => '0'
    )
);
$wp_customize->add_control(
	new Centurylib_Category_Dropdown_Control(
		$wp_customize,
		'lekh_post_blocks_category', 
		array(
			'label'     => esc_html__('Blocks by category', 'lekh'),
			'section'   => 'lekh_posts_blocks_section',
			'priority'  => 10,
		)
	)
);


/**
 * Remove Title
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'lekh_show_block_title', 
    array(
        'sanitize_callback' => 'absint',
        'default' => 1
    )
);
$wp_customize->add_control(
	'lekh_show_block_title', 
	array(
		'type'		=> 'checkbox',
		'label'     => esc_html__('Show block title ', 'lekh'),
		'section'   => 'lekh_posts_blocks_section',
		'priority'  => 20,
	)
);

/**
 * No of posts
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'lekh_blocks_noof_post', 
    array(
        'sanitize_callback' => 'absint',
        'default' => 3
    )
);
$wp_customize->add_control(
	'lekh_blocks_noof_post', 
	array(
		'type'		=> 'number',
		'label'     => esc_html__('No of posts', 'lekh'),
		'section'   => 'lekh_posts_blocks_section',
		'priority'  => 30,
	)
);

/**
 * No of column
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'lekh_blocks_noof_column', 
    array(
        'sanitize_callback' => 'absint',
        'default' => 3
    )
);
$wp_customize->add_control(
	'lekh_blocks_noof_column', 
	array(
		'type'		=> 'number',
		'label'     => esc_html__('No of column', 'lekh'),
		'section'   => 'lekh_posts_blocks_section',
		'priority'  => 40,
		'input_attrs' => array(
			'min' => 1,
			'max' => 4,
		),
	)
);

/**
 * Thumbnail Size
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'lekh_blocks_thumbail_size', 
    array(
        'sanitize_callback' => 'esc_attr',
        'default' => 'lekh-cp-700x700'
    )
);
$wp_customize->add_control(
	'lekh_blocks_thumbail_size', 
	array(
		'type'		=> 'select',
		'label'     => esc_html__('Thumbnail Size', 'lekh'),
		'section'   => 'lekh_posts_blocks_section',
		'priority'  => 50,
		'choices'	=> centurylib_get_image_sizes(),
	)
);

/**
 * No image height ratio
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'lekh_block_noimage_height', 
    array(
        'sanitize_callback' => 'absint',
        'default' => '100'
    )
);
$wp_customize->add_control(
	'lekh_block_noimage_height', 
	array(
		'type'		=> 'number',
		'label'     => esc_html__('NoImage block height(%)', 'lekh'),
		'section'   => 'lekh_posts_blocks_section',
		'priority'  => 60,
		'input_attrs' => array(
			'min' => 20,
			'max' => 150,
		),
		'description'=> esc_html__( 'Please enter the percentage value for height. This percentage is relative to block width.(min value is 20 and maximum value is 150)', 'lekh')
	)
);