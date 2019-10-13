<?php
/**
 * Class for adding Social Section Widget
 *
 * @package ThemeCentury
 * @subpackage DigitalMarket
 * @since 1.0.0
 */
if ( ! class_exists( 'Centurylib_Master_Widget' ) ) {

    abstract class Centurylib_Master_Widget extends WP_Widget {

        /**
         * Helper function that holds widget fields
         * Array is used in update and form functions
         */
        public function widget_fields( $instance = array() ){

            $fields = array(
                'title'    => array(
                    'tcy_widget_field_name'          => 'title',
                    'tcy_widget_field_title'         => esc_html__( 'Title', 'lekh' ),
                    'tcy_widget_field_default'       => '',
                    'tcy_widget_field_type'    => 'text',
                ),
            );

            return $fields;

        }

        /*Widget Backend*/
        public function form( $instance ) {

            $widget_fields = $this->widget_fields( $instance );
            
            // Loop through fields
            foreach ( $widget_fields as $widget_field ) {

                // Make array elements available as variables
                extract( $widget_field );
                $tcy_widget_field_default = isset( $widget_field['tcy_widget_field_default'] ) ? $widget_field['tcy_widget_field_default'] : '';
                $tcy_widget_field_value = isset( $instance[ $tcy_widget_field_name ] ) ? $instance[ $tcy_widget_field_name ] : $tcy_widget_field_default;
                tcy_widgets_show_widget_field( $this, $widget_field, $tcy_widget_field_value );
            }
            
        }


        /**
         * Function to Updating Tab widget
         *
         * @access public
         * @since 1.0.2
         *
         * @param array $tcy_widget_field_options tab fields array value
         * @param array $new_instance new arrays value
         * @param array $instance updated widget value
         * @return $instance
         *
         */
        public function update_tabgroup($tcy_widget_field_options, $new_instance, $instance){
            $tcy_widget_field_options = (array)$tcy_widget_field_options;
            foreach ( $tcy_widget_field_options as $tab_slug=>$tab_details ){
                $widget_fields = $tab_details['tcy_widget_field_options'];
                foreach ( $widget_fields as $widget_field ) {
                    extract( $widget_field );
                                // Use helper function to get updated field values
                    $tcy_widget_field_value = isset($new_instance[$tcy_widget_field_name]) ? $new_instance[$tcy_widget_field_name] : '';
                    $instance[$tcy_widget_field_name] = tcy_widgets_updated_field_value( $widget_field, $tcy_widget_field_value );
                    $instance = $this->field_wise_update($widget_field, $new_instance, $instance);
                }
            }
            return $instance;
        }

        /**
         * Function to Updating Accordion widget
         *
         * @access public
         * @since 1.0.2
         *
         * @param array $tcy_widget_field_options tab fields array value
         * @param array $new_instance new arrays value
         * @param array $instance updated widget value
         * @return $instance
         *
         */
        public function update_accordion($tcy_widget_field_options, $new_instance, $instance){
            $tcy_widget_field_options = (array)$tcy_widget_field_options ;
            foreach ( $tcy_widget_field_options as $accordion_slug=>$accordion_details ){
                $widget_fields = $accordion_details['tcy_widget_field_options'];
                foreach ( $widget_fields as $widget_field ) {
                    extract( $widget_field );
                    // Use helper function to get updated field values
                    $tcy_widget_field_value = isset($new_instance[$tcy_widget_field_name]) ? $new_instance[$tcy_widget_field_name] : '';
                    $instance[$tcy_widget_field_name] = tcy_widgets_updated_field_value( $widget_field, $tcy_widget_field_value );
                    $instance = $this->field_wise_update($widget_field, $new_instance, $instance);
                }
            }
            return $instance;
        }

        public function field_wise_update($widget_field, $new_instance, $instance){
            
            extract($widget_field);
            switch ($tcy_widget_field_type) {
                case 'tabgroup':
                    $instance = $this->update_tabgroup($tcy_widget_field_options, $new_instance, $instance);
                    break;
                case 'accordion':
                    $instance = $this->update_accordion($tcy_widget_field_options, $new_instance, $instance);
                    break;
                default:
                    //No need to set default
                    break;
            }
            return $instance;
            
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            
            $instance = $old_instance;

            $widget_fields = $this->widget_fields( $new_instance );

            // Loop through fields
            foreach ( $widget_fields as $widget_field ) {

                extract( $widget_field );

                // Use helper function to get updated field values
                $tcy_main_widget_value = isset($new_instance[$tcy_widget_field_name]) ? $new_instance[$tcy_widget_field_name] : '';
                $instance[$tcy_widget_field_name] = tcy_widgets_updated_field_value( $widget_field,  $tcy_main_widget_value);

                $instance = $this->field_wise_update($widget_field, $new_instance, $instance );
                
            }
            return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {

            esc_html_e('Blank widget created', 'lekh');
            
        }

    } // Class Centurylib_Master_Widget ends here
    
}