<?php
/**
 * @package ThemeCentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for page list field
 */
?>
<p class="tcy-widget-field-wrapper <?php echo esc_attr($tcy_widget_field_wraper); ?>">
	<label for="<?php echo esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ); ?>">
		<?php echo esc_html( $tcy_widget_field_title ); ?>: 
	</label>
	<?php
	/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
	$args = array(
		'selected'              => $tcy_widget_field_value,
		'name'                  => esc_attr( $centurywidget->get_field_name( $tcy_widget_field_name ) ),
		'id'                    => esc_attr( $centurywidget->get_field_id( $tcy_widget_field_name ) ),
		'class'                 => 'widefat',
		'show_option_none'      => esc_html__('Select Page','lekh'),
		'option_none_value'     => 0 // string
	);
	wp_dropdown_pages( $args );
	if($tcy_widget_field_value){
		/*?>
		<a href="<?php echo get_edit_post_link($tcy_widget_field_value ); ?>" target="_blank"><?php esc_html_e('Edit Page', 'lekh') ?></a>
		<?php */
	}
	if ( isset( $tcy_widget_field_description ) ) { 
		?>
		<br/>
		<small><?php echo esc_html( $tcy_widget_field_description ); ?></small>
		<?php 
	} 
	?>
</p>
