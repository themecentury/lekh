<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for multiple select field
 */
?>
<div class="tcy-widget-field-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>">
		<?php echo esc_html( $tcy_widget_field_title ); ?>: 
	</label>
	<ul class="tcy-multiple-checkbox">
		<?php
		if( $tcy_widget_field_options ){
			foreach( $tcy_widget_field_options as $athm_option_name => $athm_option_title ){
				?>
				<li>
					<input 
					id="<?php echo esc_attr( $centurywidget->get_field_id($tcy_widget_field_name) ).'_'.$athm_option_name; ?>" 
					name="<?php echo esc_attr( $centurywidget->get_field_name($tcy_widget_field_name).'[]' ); ?>" 
					type="checkbox" 
					value="<?php echo $athm_option_name; ?>" 
					<?php checked(in_array($athm_option_name, (array)$tcy_widget_field_value)); ?> 
					/>
					<label for="<?php echo esc_attr( $centurywidget->get_field_id($tcy_widget_field_name) ).'_'.$athm_option_name; ?>"><?php echo esc_html( $athm_option_title ); ?></label>
				</li>
				<?php
			}
		}
		if ( isset( $tcy_widget_field_description ) ) { 
			?>
			<br/>
			<small><?php echo esc_html( $tcy_widget_field_description ); ?></small>
			<?php 
		}
		?>
	</ul>
</div>