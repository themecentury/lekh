<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description URL field for widget
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>">
		<?php echo esc_html( $tcy_widget_field_title ); ?>:
	</label>
	<input class="widefat <?php echo esc_attr($tcy_widget_relation_class); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $tcy_widget_field_name ) ); ?>" type="text" value="<?php echo esc_html( $tcy_widget_field_value ); ?>"  data-relations="<?php echo esc_attr($tcy_widget_relation_json) ?>"/>
	<?php if ( isset( $tcy_widget_field_description ) ) { ?>
		<br/>
		<small><?php echo esc_html( $tcy_widget_field_description ); ?></small>
	<?php } ?>
</p>