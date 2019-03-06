<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for number field
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>">
		<?php echo esc_html( $tcy_widget_field_title ); ?>:
	</label><br/>
	<input class="widefat" name="<?php echo esc_attr( $centurywidget->get_field_name( $tcy_widget_field_name ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>" value="<?php echo esc_html( $tcy_widget_field_value ); ?>"/>
	<?php if ( isset( $tcy_widget_field_description ) ) { ?>
		<br/>
		<small><?php echo esc_html( $tcy_widget_field_description ); ?></small>
	<?php } ?>
</p>