<?php
/**
 * Sanitize Checkbox
 *
 */
function lekh_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Sanitize Radio Buttons and Select Lists
 *
 */
function lekh_sanitize_choices( $input, $setting ) {
    global $wp_customize;

    $control = $wp_customize->get_control( $setting->id );

    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function sanitize_lekh_website_layout( $input, $setting ) {
    global $wp_customize;

    $control = $wp_customize->get_control( $setting->id );

    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
function sanitize_lekh_website_skin( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

/**
 * Checks if Single Post has featured image
 */
function lekh_post_has_featured_image( $control ) {
    if ( $control->manager->get_setting( 'post_has_featured_image' )->value() == 1 ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Checks Header Layout
 */
function lekh_header_layout( $control ) {
    if ( $control->manager->get_setting( 'header_layout' )->value() != 'header-layout4' ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Checks if Page has featured image
 */
function lekh_page_has_featured_image( $control ) {
    if ( $control->manager->get_setting( 'page_has_featured_image' )->value() == 1 ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Checks whether a header image is set or not.
 */
function lekh_has_header_image( $control ) {
    if ( has_header_image() ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Get Contrast
 *
 */
function lekh_get_brightness( $hex ) {
    // returns brightness value from 0 to 255
    // strip off any leading #
    $hex = str_replace( '#', '', $hex );

    $c_r = hexdec( substr( $hex, 0, 2 ) );
    $c_g = hexdec( substr( $hex, 2, 2 ) );
    $c_b = hexdec( substr( $hex, 4, 2 ) );

    return ( ( $c_r * 299 ) + ( $c_g * 587 ) + ( $c_b * 114 ) ) / 1000;
}

/**
 * Sanitize repeater value
 *
 * @since 1.0.0
 */
function lekh_sanitize_repeater( $input ) {
    $input_decoded = json_decode( $input, true );

    if ( ! empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxes => $box ) {
            foreach ( $box as $key => $value ) {
                $input_decoded[ $boxes ][ $key ] = wp_kses_post( $value );
            }
        }

        return json_encode( $input_decoded );
    }

    return $input;
}
