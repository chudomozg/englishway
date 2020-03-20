<?php
class ew_teacher_Widget extends WP_Widget {
 
 public function __construct() {
  
     parent::__construct(
         'ew_teacher_widget',
         __( 'EglishWay Teachers Widget', 'ew_teacher_domain' ),
         array(
             'classname'   => 'ew-teacher-widget',
             'description' => __( 'Виджет с преподавателями школы', 'ew_teacher_domain' )
             )
     );
    
     load_plugin_textdomain( 'ew_teacher_domain', false, basename( dirname( __FILE__ ) ) . '/languages' );
    
 }

 public function ew_get_random_teachers(){
    $outer_html="";
    $teachers = array();
    $teachers_random_keys = array();
    $args = array(
        'post_type'     => 'teachers',
        'post_status'   => 'publish',
        'fields'        =>  'ids'
        );
        
    //   The Query
    $result_query = new WP_Query( $args );

    while ( $result_query->have_posts() ) {
        $result_query->the_post();
        $id=get_the_ID();
        $img=get_the_post_thumbnail_url($id, "thumbnail");
        $link=get_permalink($id);

        array_push($teachers, [
            "id" => $id,
            "img" => $img,
            "link" => $link
        ]);
    }
    wp_reset_postdata();

    $teachers_random_keys = array_rand($teachers, 3);

    foreach ($teachers_random_keys as $key){
        $outer_html.= "<a class='teacher-widget__link col-4' href='".$teachers[$key]['link']."'>
        <img src='".$teachers[$key]['img']."' class='teacher-widget__img img-fluid'/></a>";
    };

    return $outer_html;
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

    $before_widget ="<div class='widget widget__teacher-widget teacher-widget'>
                        <div class='teacher-widget__wrapper row d-flex justify-content-center m-0 h-100'>
                            <div class='teacher-widget__links col-12 row'>";

    $teachers = self::ew_get_random_teachers();
    $teachers .= "</div>";

    $message    = "<div class='teacher-widget__message col-10 text-center'>
                    <a href='/teachers' class='teacher-widget__message-link'>".$instance['message']."</a></div>";
    $after_widget ="</div></div>";  
       
    echo $before_widget;      
    echo ($teachers);      
    echo $message;      
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
  
     $message    = esc_attr( $instance['message'] );
     ?>
     <p>
         <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Текстссылки'); ?></label> 
         <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>"><?php echo $message; ?></textarea>
     </p>
  
 <?php 
 }
  
}

/* Register the widget */
add_action( 'widgets_init', function(){
  register_widget( 'ew_teacher_Widget' );
});