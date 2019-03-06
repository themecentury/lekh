<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for accordion field
 */
$tcy_widget_field_options = isset($widget_field['tcy_widget_field_options']) ? $widget_field['tcy_widget_field_options'] : array();
$all_values = get_option('widget_' . $centurywidget->id_base);
$this_widget_instance = isset($all_values[$centurywidget->number]) ? $all_values[$centurywidget->number] : array();
$tcy_widget_field_value = (array)$tcy_widget_field_value;
?>
<div class="tcy-widget-field-wrapper tcy-widget-accordion-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<?php
	if( count( $tcy_widget_field_options ) > 0 && is_array( $tcy_widget_field_options ) ){ 
		foreach ($tcy_widget_field_options as $accordion_key=>$accordion_details){
			$is_dropdown = in_array($accordion_key, $tcy_widget_field_value);
			$tcy_widget_field_title = isset($accordion_details['tcy_widget_field_title']) ? esc_html($accordion_details['tcy_widget_field_title']) : '';
			$tcy_widget_field_options = isset($accordion_details['tcy_widget_field_options']) ? $accordion_details['tcy_widget_field_options'] : array();
			$accordion_wraper_class = ($is_dropdown) ? 'open' : 'closed';
			$accordion_icon_class = ($is_dropdown) ? 'fa-angle-up' : 'fa-angle-down';
			?>
			<div class="tcy-accordion-wrapper <?php echo esc_attr($accordion_wraper_class); ?>">
				<label for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name.$accordion_key ) ); ?>" class="tcy-accordion-title"><?php esc_html($tcy_widget_field_title); ?>
					<?php echo esc_html($tcy_widget_field_title); ?><i class="teg-accordion-arrow fa <?php echo esc_attr($accordion_icon_class); ?>"></i>
					<input id="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name.$accordion_key ) ); ?>" name="<?php echo esc_attr( $centurywidget->get_field_name( $tcy_widget_field_name ) ); ?>[]" value="<?php echo esc_attr($accordion_key); ?>" <?php checked( 1, $is_dropdown ) ?> class="tcy-hidden" type="checkbox">
				</label>
				<div class="teg-accordion-content">
					<?php
					if(count($tcy_widget_field_options)):
					foreach($tcy_widget_field_options as $field_key=>$accordion_field):
						$current_widgets_field_default = isset($accordion_field['tcy_widget_field_default']) ? $accordion_field['tcy_widget_field_default'] : '';
						$current_field_widget_name = isset($accordion_field['tcy_widget_field_name']) ? $accordion_field['tcy_widget_field_name'] : '';

						if(!$current_field_widget_name){
							return;
						}
						$current_widgets_field_value = isset($this_widget_instance[$current_field_widget_name]) ? $this_widget_instance[$current_field_widget_name] : $current_widgets_field_default;
						tcy_widgets_show_widget_field( $centurywidget, $accordion_field, $current_widgets_field_value );
					endforeach;
				else:
					?>
					<p><?php esc_html_e('Sorry no field are added on accordion.', 'lekh'); ?></p>
					<?php
				endif;
					?>
				</div>
			</div>
			<?php
		}

	}else{
		?>
			<p><?php esc_html_e('There is no accordion on this accordion group', 'lekh'); ?></p>
		<?php
	}
	?>
	<?php if ( isset( $tcy_widget_field_description ) ) { ?>
		<br/>
		<small><?php echo wp_kses_post( $tcy_widget_field_description ); ?></small>
	<?php } ?>
</div>