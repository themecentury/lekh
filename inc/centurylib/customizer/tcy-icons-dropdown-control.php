<?php
/**
 * Custom Control for Icons Controls
 * @package ThemeCentury
 * @subpackage Centurylib
 * @since 1.0.0
 *
 */
if ( !class_exists( 'Centurylib_Customize_Icons_Control' )):

	class Centurylib_Customize_Icons_Control extends WP_Customize_Control {

		public $type = 'icons-control';
		
		public function enqueue(){
			
		}

		public function render_content() {
			$value = $this->value();
			?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <span class="te-customize-icons">
                    <span class="icon-preview">
                        <?php if( !empty( $value ) ) { echo '<i class="fa '. esc_attr( $value ) .'"></i>'; } ?>
                    </span>
                    <span class="icon-toggle">
                        <?php echo ( empty( $value ) ? esc_html__('Add Icon','lekh'): esc_html__('Change Icon','lekh') ); ?>
                        <span class="dashicons dashicons-arrow-down"></span>
                    </span>
                    <span class="icons-list-wrapper hidden">
                        <input class="icon-search" type="text" placeholder="<?php esc_attr_e('Search Icon','lekh'); ?>">
	                    <?php
	                    $fa_icon_list_array = centurylib_icons_array();
	                    foreach ( $fa_icon_list_array as $single_icon ) {
		                    if( $value == $single_icon ) {
			                    echo '<span class="single-icon selected"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
		                    }
		                    else {
			                    echo '<span class="single-icon"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
		                    }
	                    }
	                    ?>
                    </span>
                    <input type="hidden" class="te-icon-value" value="" <?php $this->link(); ?>>
                </span>
            </label>
			<?php
		}
	}
endif;