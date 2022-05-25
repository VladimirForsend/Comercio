<?php
 
// Creating the widget 
class rrss_custom_widget extends WP_Widget {
  
function __construct() {
parent::__construct(
  
// Base ID of your widget
'rrss_custom_widget', 
  
// Widget name will appear in UI
__('Boton rrss', 'rrss_custom_widget_domain'), 
  
// Widget description
array( 'description' => __( 'Pegue el link de fb' ), ) 
);
}
  
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo '<a class="whatsapp" href="' . $title . '"><div class="boton-wsapp"><i class="fab fa-whatsapp"></i><div class="texto-wsapp"><p>CONSULTE AQUÍ <span>Whatsapp</span></p></div><div class="foto-wsapp"></div></div></a>';
  
// This is where you run the code and display the output
echo __( '', 'rrss_custom_widget_domain' );
echo $args['after_widget'];
}
          
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'pegue link de fb', 'rrss_custom_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" placeholder="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
      
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
 
// Class rrss_custom_widget ends here
} 
 
 
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'rrss_custom_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );