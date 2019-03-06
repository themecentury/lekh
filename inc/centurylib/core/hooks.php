<?php
/*
 * Enqueue Scripts and Styles
 */

if(!function_exists('centurylib_enqueue_scripts') ):

	function centurylib_enqueue_scripts(){

		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_enqueue_style( 'centurylib-admincss', centurylib_assets_url('css/tcy-admin-styles.css'), array(), '1.0.0');
		wp_enqueue_script('centurylib-admin-css', centurylib_assets_url('js/tcy-admin-script.js'), array('jquery'), '1.0.0', true);
		wp_enqueue_style( 'font-awesome', centurylib_assets_url('library/font-awesome/css/font-awesome.min.css'), array(), '1.0.0');

	}

endif;

add_action('admin_enqueue_scripts', 'centurylib_enqueue_scripts');
