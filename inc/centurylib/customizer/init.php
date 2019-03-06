<?php
/*
 * Custom Controls for customizers
 */
if(!function_exists('centurylib_customize_control_register')){

	function centurylib_customize_control_register(){

		require_once centurylib_file_directory('customizer/tcy-theme-information-control.php');	
		require_once centurylib_file_directory('customizer/tcy-category-dropdown-control.php');	
		require_once centurylib_file_directory('customizer/tcy-customizer-message-control.php');		
		require_once centurylib_file_directory('customizer/tcy-customizer-repeater-control.php');
		require_once centurylib_file_directory('customizer/tcy-radio-image-control.php');
		
	}

}

add_action('customize_register', 'centurylib_customize_control_register');