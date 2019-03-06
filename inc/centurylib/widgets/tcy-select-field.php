<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description Select field for widget
 */
 ?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>">
		<?php echo esc_html( $tcy_widget_field_title ); ?>:
	</label>
	<select name="<?php echo esc_attr( $centurywidget->get_field_name( $tcy_widget_field_name ) ); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>" class="widefat <?php echo esc_attr($tcy_widget_relation_class); ?>" data-relations="<?php echo esc_attr($tcy_widget_relation_json) ?>">
		<?php foreach ( $tcy_widget_field_options as $athm_option_name => $athm_option_title ) { ?>
			<option value="<?php echo esc_attr( $athm_option_name ); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $athm_option_name ) ); ?>" <?php selected( $athm_option_name, $tcy_widget_field_value ); ?>>
				<?php echo esc_html( $athm_option_title ); ?>
			</option>
		<?php } ?>
	</select>
	<?php if ( isset( $tcy_widget_field_description ) ) { ?>
		<br/>
		<small><?php echo esc_html( $tcy_widget_field_description ); ?></small>
	<?php } ?>
</p>