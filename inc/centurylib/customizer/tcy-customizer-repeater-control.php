<?php

if ( ! class_exists( 'Centurylib_Customizer_Repeater_Control' )):
	/**
	 * Custom Control Repeater Controls
	 * @package ThemeCentury
	 * @subpackage Centurylib
	 * @since 1.0.0
	 *
	 */
	class Centurylib_Customizer_Repeater_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'repeater';

		public $repeater_main_label = '';

		public $repeater_add_control_field = '';

		/**
		 * The fields that each container row will contain.
		 *
		 * @access public
		 * @var array
		 */
		public $fields = array();

		/**
		 * Repeater drag and drop controler
		 *
		 * @since  1.0.0
		 */
		public function __construct( $manager, $id, $args = array(), $fields = array() ) {

			$this->fields                       = $fields;
			$this->repeater_main_label          = $args['repeater_main_label'];
			$this->repeater_add_control_field   = $args['repeater_add_control_field'];
			parent::__construct( $manager, $id, $args );

		}

		public function enqueue(){

			wp_enqueue_style( 'font-awesome', centurylib_directory_uri('assets/library/font-awesome/css/font-awesome.min.css'), array(), '4.7.0' );
			wp_enqueue_style( 'tcy-customizer-repeater-control',  centurylib_directory_uri('assets/parts/controls/css/tcy-customizer-repeater-control.min.css'), array(), '1.0.0' );
			wp_style_add_data( 'tcy-customizer-repeater-control', 'rtl', 'replace' );
			wp_enqueue_script('tcy-customizer-repeater-control', centurylib_directory_uri('assets/parts/controls/js/tcy-customizer-repeater-control.min.js'), array('jquery'), '1.0.0', false);

		}

		public function render_content() {
			?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <?php if ( $this->description ) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
                <?php
			}
			?>
            <ul class="tcy-repeater-field-wrap-control">
				<?php $this->get_fields(); ?>
            </ul>
            <input type="hidden" <?php $this->link(); ?> class="tcy-repeater-collection" value="<?php echo esc_attr( $this->value() ); ?>"/>
            <button type="button" class="button tcy-repeater-add-control-field"><?php echo esc_html( $this->repeater_add_control_field ); ?></button>
			<?php
		}

		private function get_fields() {

			$repeater_fields = $this->fields;
			$repeater_values = json_decode( $this->value() );

			?>
            <script type="text/html" class="tcy-repeater-field-generator">
                <li class="tcy-repeater-field-control">
                    <h3 class="repeater-field-title accordion-section-title">
						<?php echo esc_html( $this->repeater_main_label ); ?>
                    </h3>
                    <div class="repeater-fields hidden">
						<?php
						foreach ( $repeater_fields as $key => $field_single ) {
							$class = isset( $field_single['class'] ) ? $field_single['class'] : '';
							?>
                            <div class="single-field type-<?php echo esc_attr( $field_single['type'] ) . ' ' . $class; ?>">
								<?php
								$label       = isset( $field_single['label'] ) ? $field_single['label'] : '';
								$description = isset( $field_single['description'] ) ? $field_single['description'] : '';
								if ( $field_single['type'] != 'checkbox' ) { ?>
                                    <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                                    <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
									<?php
								}
								$new_value = '';
								$default   = isset( $field_single['default'] ) ? $field_single['default'] : '';

								switch ( $field_single['type'] ) {
									case 'text':
										echo '<input data-default="' . esc_attr( $default ) . '" data-name="' . esc_attr( $key ) . '" type="text" value="' . esc_attr( $new_value ) . '"/>';
										break;

									case 'url':
										echo '<input data-default="' . esc_attr( $default ) . '" data-name="' . esc_attr( $key ) . '" type="url" value="' . esc_url( $new_value ) . '"/>';
										break;

									case 'checkbox':
										echo '<input data-default="' . esc_attr( $default ) . '" data-name="' . esc_attr( $key ) . '" type="checkbox" value="' . esc_attr( $new_value ) . '"/>';
										?>
                                        <span class="customize-control-title checkbox"><?php echo esc_html( $label ); ?></span>
                                        <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
										<?php
										break;

									case 'textarea':
										echo '<textarea data-default="' . esc_attr( $default ) . '"  data-name="' . esc_attr( $key ) . '">' . esc_textarea( $new_value ) . '</textarea>';
										break;

									case 'select':
										$options = $field_single['options'];
										echo '<select  data-default="' . esc_attr( $default ) . '"  data-name="' . esc_attr( $key ) . '">';
										foreach ( $options as $option => $val ) {
											printf( '<option value="%s" %s>%s</option>', esc_attr( $option ), selected( $new_value, $option, false ), esc_attr( $val ) );
										}
										echo '</select>';
										break;

									case 'icons':
										?>
                                        <span class="tcy-customize-icons">
                                            <span class="icon-preview"></span>
                                            <span class="icon-toggle">
                                                <?php esc_html_e('Add Icon','lekh'); ?>
                                                <span class="dashicons dashicons-arrow-down"></span>
                                            </span>
                                            <span class="icons-list-wrapper hidden">
                                                <input class="icon-search" type="text" placeholder="<?php esc_attr_e('Search Icon','lekh'); ?>">
                                                <?php
                                                $fa_icon_list_array = centurylib_fa_iconslist();
                                                foreach ( $fa_icon_list_array as $single_icon ) {
                                                    echo '<span class="single-icon"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
                                                }
                                                ?>
                                            </span>
                                            <?php
                                            echo '<input class="te-icon-value"  data-default="' . esc_attr( $default ) . '" data-name="' . esc_attr( $key ) . '" type="hidden" value="' . esc_attr( $new_value ) . '"/>';
                                            ?>
                                        </span>
										<?php
										break;
									default:
										?><p><?php esc_html_e('Field type not found', 'lekh'); ?></p><?php
										break;
								}
								?>
                            </div>
							<?php
						}
						?>
                        <div class="clearfix repeater-footer">
                            <a class="repeater-field-remove" href="#remove">
								<?php esc_html_e( 'Delete', 'lekh' ) ?>
                            </a>
                            <?php esc_html_e( '|', 'lekh' ) ?>
                            <a class="repeater-field-close" href="#close">
								<?php esc_html_e( 'Close', 'lekh' ) ?>
                            </a>
                        </div>
                    </div>
                </li>
            </script>

			<?php
			if ( is_array( $repeater_values ) ) {
				foreach ( $repeater_values as $field_value ) { ?>
                    <li class="tcy-repeater-field-control">
                        <h3 class="repeater-field-title accordion-section-title">
							<?php echo esc_html( $this->repeater_main_label ); ?>
                        </h3>
                        <div class="repeater-fields hidden">
							<?php
							foreach ( $repeater_fields as $key => $field_single ) {
								$class = isset( $field_single['class'] ) ? $field_single['class'] : '';
								?>
                                <div class="single-field type-<?php echo esc_attr( $field_single['type'] ) . ' ' . $class; ?>">
									<?php
									$label       = isset( $field_single['label'] ) ? $field_single['label'] : '';
									$description = isset( $field_single['description'] ) ? $field_single['description'] : '';
									if ( $field_single['type'] != 'checkbox' ) { ?>
                                        <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                                        <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
										<?php
									}
									$new_value = isset( $field_value->$key ) ? $field_value->$key : '';
									$default   = isset( $field_single['default'] ) ? $field_single['default'] : '';

									switch ( $field_single['type'] ) {
										case 'text':
											echo '<input data-default="' . esc_attr( $default ) . '" data-name="' . esc_attr( $key ) . '" type="text" value="' . esc_attr( $new_value ) . '"/>';
											break;

										case 'url':
											echo '<input data-default="' . esc_attr( $default ) . '" data-name="' . esc_attr( $key ) . '" type="url" value="' . esc_url( $new_value ) . '"/>';
											break;

										case 'checkbox':
											echo '<input '.checked(true, $new_value,false).' data-default="' . esc_attr( $default ) . '" data-name="' . esc_attr( $key ) . '" type="checkbox" value="' . esc_attr( $new_value ) . '"/>';
											?>
                                            <span class="customize-control-title checkbox"><?php echo esc_html( $label ); ?></span>
                                            <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
											<?php
											break;

										case 'textarea':
											echo '<textarea data-default="' . esc_attr( $default ) . '"  data-name="' . esc_attr( $key ) . '">' . esc_textarea( $new_value ) . '</textarea>';
											break;

										case 'select':
											$options = $field_single['options'];
											echo '<select  data-default="' . esc_attr( $default ) . '"  data-name="' . esc_attr( $key ) . '">';
											foreach ( $options as $option => $val ) {
												printf( '<option value="%s" %s>%s</option>', esc_attr( $option ), selected( $new_value, $option, false ), esc_attr( $val ) );
											}
											echo '</select>';
											break;

										case 'icons':
											?>
                                            <span class="tcy-customize-icons">
                                                <span class="icon-preview">
                                                    <?php if( !empty( $new_value ) ) { echo '<i class="fa '. esc_attr( $new_value ) .'"></i>'; } ?>
                                                </span>
                                                <span class="icon-toggle">
                                                    <?php echo ( empty( $new_value )? esc_html__('Add Icon','lekh'): esc_html__('Edit Icon','lekh') ); ?>
                                                    <span class="dashicons dashicons-arrow-down"></span>
                                                </span>
                                                <span class="icons-list-wrapper hidden">
                                                    <input class="icon-search" type="text" placeholder="<?php esc_attr_e('Search Icon','lekh')?>">
                                                    <?php
                                                    $fa_icon_list_array = centurylib_fa_iconslist();
                                                    foreach ( $fa_icon_list_array as $single_icon ) {
                                                        if( $new_value == $single_icon ) {
                                                            echo '<span class="single-icon selected"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
                                                        } else {
                                                            echo '<span class="single-icon"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                                <?php
                                                echo '<input class="te-icon-value"  data-default="' . esc_attr( $default ) . '" data-name="' . esc_attr( $key ) . '" type="hidden" value="' . esc_attr( $new_value ) . '"/>';
                                                ?>
                                            </span>
											<?php
											break;
										default:
											break;
									}
									?>
                                </div>
								<?php
							}
							?>
                            <div class="clearfix repeater-footer">
                                <a class="repeater-field-remove" href="#remove">
									<?php esc_html_e( 'Delete', 'lekh' ) ?>
                                </a><?php esc_html_e( '|', 'lekh' ) ?>
                                <a class="repeater-field-close" href="#close">
									<?php esc_html_e( 'Close', 'lekh' ) ?>
                                </a>
                            </div>
                        </div>
                    </li>
				<?php
				}
			}
		}
	}
endif;