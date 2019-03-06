<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for multiple checkbox field
 */
$tcy_widget_field_value = (array)$tcy_widget_field_value;
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<?php echo esc_html( $tcy_widget_field_title ); ?>
	<?php foreach ( $tcy_widget_field_options as $athm_option_name => $athm_option_title ) { ?>
		<label class="block-field widefat" for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ).esc_attr($athm_option_name); ?>">
			<input id="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ).esc_attr($athm_option_name); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $tcy_widget_field_name ) ); ?>[]" type="checkbox" value="<?php echo esc_attr($athm_option_name); ?>" <?php checked(1, in_array($athm_option_name, $tcy_widget_field_value) ); ?>/>
			<?php echo esc_html( $athm_option_title ); ?>
		</label>
	<?php } ?>
	<?php if ( isset( $tcy_widget_field_description ) ) { ?>
		<br/>
		<small><?php echo wp_kses_post( $tcy_widget_field_description ); ?></small>
	<?php } ?>
</p>