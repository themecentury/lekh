<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description UPLOAD field for widget
 */
?>
<p class="tcy-widget-field-wrapper sub-option widget-upload <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>"><?php echo esc_html( $tcy_widget_field_title ); ?></label>
	<span class="img-preview-wrap" <?php echo empty( $tcy_widget_field_value ) ? 'style="display:none;"' : ''; ?>>
		<img class="widefat" src="<?php echo esc_url( $tcy_widget_field_value ); ?>" alt="<?php esc_attr_e( 'Image preview', 'lekh' ); ?>"  />
	</span>
	<!-- .img-preview-wrap -->
	<input type="text" class="widefat <?php echo esc_attr($tcy_widget_relation_class); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $tcy_widget_field_name ) ); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>" placeholder="<?php esc_html_e('Choose file', 'lekh'); ?>" value="<?php echo esc_url( $tcy_widget_field_value ); ?>" data-relations="<?php echo esc_attr($tcy_widget_relation_json) ?>" />
	<input type="button" value="<?php esc_attr_e( 'Upload Image', 'lekh' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','lekh'); ?>" data-button="<?php esc_attr_e( 'Select Image','lekh'); ?>"/>
	<input type="button" value="<?php esc_attr_e( 'Remove Image', 'lekh' ); ?>" class="button media-image-remove" />
</p>