<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for checkbox field
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<input class="<?php echo esc_attr($tcy_widget_relation_class); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $tcy_widget_field_name ) ); ?>" type="checkbox" value="1" <?php checked( '1', $tcy_widget_field_value ); ?> data-relations="<?php echo esc_attr($tcy_widget_relation_json) ?>"/>
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>">
		<?php echo esc_html( $tcy_widget_field_title ); ?>
	</label>
	<?php if ( isset( $tcy_widget_field_description ) ) { ?>
		<br/>
		<small><?php echo wp_kses_post( $tcy_widget_field_description ); ?></small>
	<?php } ?>
</p>