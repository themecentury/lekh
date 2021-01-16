<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description Repeater field for widget
 */
$tcy_repeater_row_title = isset($widget_field['tcy_repeater_row_title']) ? $widget_field['tcy_repeater_row_title'] : esc_html__('Row', 'lekh');
$tcy_repeater_addnew_label = isset($widget_field['tcy_repeater_addnew_label']) ? $widget_field['tcy_repeater_addnew_label'] : esc_html__('Add row', 'lekh');
$tcy_widget_field_options = isset($widget_field['tcy_widget_field_options']) ? $widget_field['tcy_widget_field_options'] : array();
$coder_repeater_depth = 'coderRepeaterDepth_'.'0';
$tcy_repeater_main_key = $tcy_widget_field_name;
?>
<div class="tcy-widget-field-wrapper tcy-widget-repeater-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<label class="tcy-widget-repeater-heading" for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>"><?php echo esc_html( $tcy_widget_field_title ); ?>:</label>
	<div class="tcy-repeater">
		<?php
		$repeater_count = 0;
		if( is_array( $tcy_widget_field_value )  && ( $tcy_widget_field_value ) > 0 ){
			foreach ($tcy_widget_field_value as $repeater_key=>$repeater_details){
				?>
				<div class="tcy-widget-repeater-table">
					<div class="tcy-repeater-top">
						<div class="tcy-repeater-title-action">
							<button type="button" class="tcy-repeater-action">
								<span class="te-toggle-indicator" aria-hidden="true"></span>
							</button>
						</div>
						<div class="tcy-repeater-title">
							<h3><?php echo esc_html($tcy_repeater_row_title); ?><span class="tcy-repeater-inner-title"></span></h3>
						</div>
					</div>
					<div class='tcy-repeater-inside hidden'>
						<?php
						foreach($tcy_widget_field_options as $repeater_slug => $repeater_data){
							
							$tcy_repeater_child_field_name = (isset($repeater_data['tcy_widget_field_name'] ) ) ? esc_attr($repeater_data['tcy_widget_field_name']) : '';
							$repeater_field_id  = esc_attr($centurywidget->get_field_id( $tcy_widget_field_name).$tcy_repeater_child_field_name);
							$tcy_widget_field_name = esc_attr($tcy_repeater_main_key.'['.$repeater_count.']['.$tcy_repeater_child_field_name.']');
							$repeater_data['tcy_widget_field_name'] = $tcy_widget_field_name;
							$tcy_widget_field_default = (isset($repeater_data['tcy_widget_field_default']) ) ? $repeater_data['tcy_widget_field_default'] : '';
							$tcy_widget_field_value = ( isset($repeater_details[$tcy_repeater_child_field_name] ) ) ? $repeater_details[$tcy_repeater_child_field_name] : $tcy_widget_field_default;
							tcy_widgets_show_widget_field( $centurywidget, $repeater_data, $tcy_widget_field_value );
						}
						?>
						<div class="tcy-repeater-control-actions">
							<button type="button" class="button-link button-link-delete tcy-repeater-remove"><?php esc_html_e('Remove','lekh');?></button> |
							<button type="button" class="button-link tcy-repeater-close"><?php esc_html_e('Close','lekh');?></button>
						</div>
					</div>
				</div>
				<?php
				$repeater_count++;
			}
		}

		?>
		<script type="text/html" class="tcy-code-for-repeater">
			<div class="tcy-widget-repeater-table">
				<div class="tcy-repeater-top">
					<div class="tcy-repeater-title-action">
						<button type="button" class="tcy-repeater-action">
							<span class="te-toggle-indicator" aria-hidden="true"></span>
						</button>
					</div>
					<div class="tcy-repeater-title">
						<h3><?php echo esc_html($tcy_repeater_row_title); ?><span class="tcy-repeater-inner-title"></span></h3>
					</div>
				</div>
				<div class='tcy-repeater-inside hidden'>
					<?php
					
					foreach($tcy_widget_field_options as $repeater_slug => $repeater_data){
						/**/
						$tcy_repeater_child_field_name = (isset($repeater_data['tcy_widget_field_name'] ) ) ? esc_attr($repeater_data['tcy_widget_field_name']) : '';
						$repeater_field_id  = esc_attr($centurywidget->get_field_id( $tcy_widget_field_name).$tcy_repeater_child_field_name);
						$tcy_widget_field_name = esc_attr($tcy_repeater_main_key.'['.$coder_repeater_depth.']['.$tcy_repeater_child_field_name.']');
						$repeater_data['tcy_widget_field_name'] = $tcy_widget_field_name;
						$tcy_widget_field_default = isset($repeater_data['tcy_widget_field_default']) ? $repeater_data['tcy_widget_field_default'] : '';
						tcy_widgets_show_widget_field( $centurywidget, $repeater_data, $tcy_widget_field_default );
					}
					?>
					<div class="tcy-repeater-control-actions">
						<button type="button" class="button-link button-link-delete tcy-repeater-remove"><?php esc_html_e('Remove','lekh');?></button> |
						<button type="button" class="button-link tcy-repeater-close"><?php esc_html_e('Close','lekh');?></button>
					</div>
				</div>
			</div>
		</script>

		<input class="tcy-total-repeater-counter" type="hidden" value="<?php echo esc_attr( $repeater_count ) ?>">
		<span class="button tcy-add-repeater" id="<?php echo esc_attr( $coder_repeater_depth ); ?>"><?php echo $tcy_repeater_addnew_label; ?></span><br/>

	</div>
	<?php if ( isset( $tcy_widget_field_description ) ) { ?>
		<small><?php echo esc_html( $tcy_widget_field_description ); ?></small>
	<?php } ?>
</div>