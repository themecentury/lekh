<?php

// Theme important links started
class Lekh_Important_Links extends WP_Customize_Control {

	public $type = "lekh-important-links";

	public function render_content() {
			//Add Theme instruction, Support Forum, Demo Link, Rating Link
		$important_links = array(

			'theme-info'    => array(
				'link' => esc_url( 'https://themecentury.com/downloads/lekh/' ),
				'text' => esc_html__( 'Theme Info', 'lekh' ),
			),
			'support'       => array(
				'link' => esc_url( 'https://themecentury.com/forums/' ),
				'text' => esc_html__( 'Support', 'lekh' ),
			),
			'demo'          => array(
				'link' => esc_url( 'https://demo.themecentury.com/wpthemes/lekh/' ),
				'text' => esc_html__( 'View Demo', 'lekh' ),
			),
			'rating'        => array(
				'link' => esc_url( 'https://wordpress.org/support/view/theme-reviews/lekh?filter=5' ),
				'text' => esc_html__( 'Rate this theme', 'lekh' ),
			),
		);
		foreach ( $important_links as $important_link ) {
			echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr( $important_link['text'] ) . ' </a></p>';
		}
	}

}

class Lekh_Repeater_Controler extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'repeater';
	public $lekh_box_label = '';
	public $lekh_box_add_control = '';

	/**
	 * The fields that each container row will contain.
	 *
	 * @access public
	 * @var array
	 */
	public $fields = array();

	/**
	 * Repeater drag and drop controller
	 *
	 * @since  1.0.0
	 */
	public function __construct($manager, $id, $args = array(), $fields = array()) {

		$this->fields = $fields;
		$this->lekh_box_label = $args['lekh_box_label'];
		$this->lekh_box_add_control = $args['lekh_box_add_control'];
		parent::__construct($manager, $id, $args);
	}

	public function render_content() {

		$values = json_decode($this->value());
		?>
		<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>

		<?php if ($this->description) { ?>
			<span class="description customize-control-description">
				<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php } ?>

		<ul class="lekh-repeater-field-control-wrap">
			<?php $this->lekh_get_fields(); ?>
		</ul>

		<input type="hidden" <?php esc_attr($this->link()); ?> class="lekh-repeater-collector"
		value="<?php echo esc_attr($this->value()); ?>"/>
		<button type="button"
		class="button lekh-repeater-add-control-field"><?php echo esc_html($this->lekh_box_add_control); ?></button>
		<?php
	}

	private function lekh_get_fields() {
		$fields = $this->fields;
		$values = json_decode($this->value());

		if (is_array($values)) {
			foreach ($values as $value) {
				?>
				<li class="lekh-repeater-field-control">
					<h3 class="lekh-repeater-field-title"><?php echo esc_html($this->lekh_box_label); ?></h3>

					<div class="lekh-repeater-fields">
						<?php
						foreach ($fields as $key => $field) {
							$class = isset($field['class']) ? $field['class'] : '';
							?>
							<div
							class="lekh-repeater-field lekh-repeater-type-<?php echo esc_attr($field['type']) . ' ' . esc_attr($class); ?>">
							<?php
							$label = isset($field['label']) ? $field['label'] : '';
							$description = isset($field['description']) ? $field['description'] : '';
							if ($field['type'] != 'checkbox') {
								?>
								<span class="customize-control-title"><?php echo esc_html($label); ?></span>
								<span
								class="description customize-control-description"><?php echo esc_html($description); ?></span>
								<?php
							}

							$new_value = isset($value->$key) ? $value->$key : '';
							$default = isset($field['default']) ? $field['default'] : '';

							switch ($field['type']) {
								case 'text':
								echo '<input data-default="' . esc_attr($default) . '" data-name="' . esc_attr($key) . '" type="text" value="' . esc_attr($new_value) . '"/>';
								break;

								case 'url':
								echo '<input data-default="' . esc_attr($default) . '" data-name="' . esc_attr($key) . '" type="text" value="' . esc_url($new_value) . '"/>';
								break;

								case 'color':
								echo '<input class="lekh-color-picker" data-default="' . esc_attr($default) . '" data-name="' . esc_attr($key) . '" type="text" value="' . esc_url($new_value) . '"/>';
								break;

								case 'social_icon':
								echo '<div class="lekh-repeater-selected-icon">';
								echo '<i class="' . esc_attr($new_value) . '"></i>';
								echo '<span><i class="fa fa-angle-down"></i></span>';
								echo '</div>';
								echo '<ul class="lekh-repeater-icon-list lekh-clearfix">';
								$lekh_font_awesome_social_icon_array = lekh_font_awesome_social_icon_array();
								foreach ($lekh_font_awesome_social_icon_array as $lekh_font_awesome_icon) {
									$icon_class = $new_value == $lekh_font_awesome_icon ? 'icon-active' : '';
									echo '<li class=' . esc_attr($icon_class) . '><i class="' .esc_attr($lekh_font_awesome_icon) . '"></i></li>';
								}
								echo '</ul>';
								echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
								break;

								default:
								break;
							}
							?>
						</div>
					<?php }
					?>

					<div class="lekh-clearfix lekh-repeater-footer">
						<div class="alignright">
							<a class="lekh-repeater-field-remove"
							href="#remove"><?php esc_html_e('Delete', 'lekh') ?></a> |
							<a class="lekh-repeater-field-close"
							href="#close"><?php esc_html_e('Close', 'lekh') ?></a>
						</div>
					</div>
				</div>
			</li>
			<?php
		}
	}
}
}