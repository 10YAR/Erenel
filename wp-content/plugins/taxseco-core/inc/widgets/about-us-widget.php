<?php
/**
* @version  1.0
* @package  taxseco
* @author   Taxseco <support@angfuzsoft.com>
*
* Websites: http://www.angfuzsoft.com
*
*/

/**************************************
* Creating About Us Widget
***************************************/

class taxseco_aboutus_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'taxseco_aboutus_widget',

                // Widget name will appear in UI
                esc_html__( 'Taxseco :: About Us Widget', 'taxseco' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'taxseco' ),
                    'classname'                     => 'no-class',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $about_us   = apply_filters( 'widget_about_us', $instance['about_us'] );
            $btn_text   = apply_filters( 'widget_btn_text', $instance['btn_text'] );
            $btn_url   = apply_filters( 'widget_btn_url', $instance['btn_url'] );
            $social_icon      = isset( $instance['social_icon'] ) ? $instance['social_icon'] : false; 


            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
                echo '<div class="as-widget-about">';
                    
                    if( !empty( $about_us ) ){
                        echo '<p class="footer-text">'.wp_kses_post( $about_us ).'</p>';
                    }                    
                    if($social_icon){
                        echo '<div class="as-social style2">';
                            taxseco_social_icon();
                        echo '</div>';
                    }
                echo '</div>';
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {           
            
            if ( isset( $instance[ 'about_us' ] ) ) {
                $about_us = $instance[ 'about_us' ];
            }else {
                $about_us = '';
            }

            //button text
            if ( isset( $instance[ 'btn_text' ] ) ) {
                $btn_text = $instance[ 'btn_text' ];
            }else {
                $btn_text = '';
            }

            //button link
            if ( isset( $instance[ 'btn_url' ] ) ) {
                $btn_url = $instance[ 'btn_url' ];
            }else {
                $btn_url = '';
            }

            $social_icon = isset( $instance['social_icon'] ) ? (bool) $instance['social_icon'] : false;
            
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'about_us' ); ?>">
                    <?php
                        _e( 'About Us:' ,'dvpn');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_us' ); ?>" name="<?php echo $this->get_field_name( 'about_us' ); ?>" rows="8" cols="80"><?php echo esc_html( $about_us ); ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">
                    <?php
                        _e( 'Button' ,'dvpn');
                    ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" type="text" placeholder="<?php echo esc_attr__('Button Label', 'taxseco'); ?>" value="<?php echo esc_attr( $btn_text ); ?>" />
                <input class="widefat" id="<?php echo $this->get_field_id( 'btn_url' ); ?>" name="<?php echo $this->get_field_name( 'btn_url' ); ?>" type="text" placeholder="<?php echo esc_attr__('Button url', 'taxseco'); ?>" value="<?php echo esc_attr( $btn_url ); ?>" />
            </p>

            <p>
                <input class="checkbox" type="checkbox"<?php checked( $social_icon ); ?> id="<?php echo $this->get_field_id( 'social_icon' ); ?>" name="<?php echo $this->get_field_name( 'social_icon' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'social_icon' ); ?>"><?php _e( 'Display Social Icon?' ); ?></label>
            </p>
            
            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();          
            $instance['about_us']           = ( ! empty( $new_instance['about_us'] ) ) ? strip_tags( $new_instance['about_us'] ) : '';
            $instance['btn_text']           = ( ! empty( $new_instance['btn_text'] ) ) ? strip_tags( $new_instance['btn_text'] ) : '';
            $instance['btn_url']           = ( ! empty( $new_instance['btn_url'] ) ) ? strip_tags( $new_instance['btn_url'] ) : '';

            $instance['social_icon']      = isset( $new_instance['social_icon'] ) ? (bool) $new_instance['social_icon'] : false;
            return $instance;
        }
    } // Class taxseco_aboutus_widget ends here


    // Register and load the widget
    function taxseco_aboutus_load_widget() {
        register_widget( 'taxseco_aboutus_widget' );
    }
    add_action( 'widgets_init', 'taxseco_aboutus_load_widget' );