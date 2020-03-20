<?php
class ew_test_Widget extends WP_Widget {
 
 public function __construct() {
  
     parent::__construct(
         'ew_test_widget',
         __( 'EglishWay Test Widget', 'ew_test_domain' ),
         array(
             'classname'   => 'ew-test-widget',
             'description' => __( 'Виджет для перехода к онлайн тестированию', 'ew_test_domain' )
             )
     );
    
     load_plugin_textdomain( 'ew_test_domain', false, basename( dirname( __FILE__ ) ) . '/languages' );
    
 }

 /**  
  * Front-end display of widget.
  *
  * @see WP_Widget::widget()
  *
  * @param array $args     Widget arguments.
  * @param array $instance Saved values from database.
  */
 public function widget( $args, $instance ) {    
    
    extract( $args );

    $before_widget ="<div class='widget widget__test-widget test-widget'>
                        <div class='test-widget__wrapper row d-flex justify-content-center m-0 h-100'>
    ";
    $ico=  "<div class='test-widget__ico'><img src='".get_template_directory_uri()."/assets/images/ico_test_widget_skype.svg'></div> ";
    $message    = "<div class='test-widget__message col-10 text-center'>".$instance['message']."</div>";
    $button = "<div class='test-widget__button button button_red col-9 p-0 w-100 primary-deep'><a href='/test' class=' '>Начать</a></div>";
    $after_widget ="</div></div>";  
       
    echo $before_widget;       
    echo $ico;       
    echo $message;
    echo $button;
    echo $after_widget;
      
 }


 /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
 public function update( $new_instance, $old_instance ) {        
      
     $instance = $old_instance;
     $instance['message'] = strip_tags( $new_instance['message'] );
      
     return $instance;
      
 }

 /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
 public function form( $instance ) {    
  
    //  $title      = esc_attr( $instance['title'] );
     $message    = esc_attr( $instance['message'] );
     ?>
     <p>
         <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Текст внутри виджета'); ?></label> 
         <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>"><?php echo $message; ?></textarea>
     </p>
  
 <?php 
 }
  
}

/* Register the widget */
add_action( 'widgets_init', function(){
  register_widget( 'ew_test_Widget' );
});