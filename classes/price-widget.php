<?php
class ew_price_widget extends WP_Widget {
 
 public function __construct() {
  
     parent::__construct(
         'ew_price_widget',
         __( 'EglishWay Price Widget', 'ew_price_domain' ),
         array(
             'classname'   => 'ew-price-widget',
             'description' => __( 'Виджет на странице "программы и курсы', 'ew_price_domain' )
             )
     );
    
     load_plugin_textdomain( 'ew_price_domain', false, basename( dirname( __FILE__ ) ) . '/languages' );
    
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
    $before_widget = '<div class="contetnt-block programms-prices row '.$instance['classes'].'">
                        <div class="programms-prices__title contetnt-block__title col-12">
                            <h3>Цены</h3>
                            <div class="contetnt-block__title-delimiter"></div>
                        </div>
                        <div class="programms-prices__price-wrapper row">';
                        $prices = array();
                        array_push($prices, array(
                          'prog_price_name' => $instance['ind_text'],
                          'prog_price_cost45' => $instance['ind_45'],
                          'prog_price_cost60' => $instance['ind_60'],
                        ));
                        array_push($prices, array(
                          'prog_price_name' => $instance['pair_text'],
                          'prog_price_cost45' => $instance['pair_45'],
                          'prog_price_cost60' => $instance['pair_60'],
                        ));
                        array_push($prices, array(
                          'prog_price_name' => $instance['group_text'],
                          'prog_price_cost45' => $instance['group_45'],
                          'prog_price_cost60' => $instance['group_60'],
                        ));
    $outer_html="";
  
    for ($i=0; $i<count($prices); $i++){
          $outer_html.= "
              <div class='programms-prices__price row programm_price mx-auto col-12 col-lg-4'>
                  <img class='programm_price_img mx-auto col-auto col-md-4 col-lg-auto mx-3 mx-md-0 mx-lg-3' src='".get_template_directory_uri()."/assets/images/prog_".$i.".svg'/>
                  <div class='programm_price_desc col-12 col-md-8 col-lg-12 row'>
                      <div class='programm_price_name col-12 px-0 px-md-3 px-lg-0'>".$prices[$i]["prog_price_name"]."</div>
                      <div class='programm_price_min col-12 col-md-7 col-lg-12 px-0 pr-md-3 pr-lg-0'>
                        <div class='programm_price_45min '><span class='programm_price_cost'>".$prices[$i]["prog_price_cost45"]."  ₽</span> 45 минут</div>
                        <div class='programm_price_60min'><span class='programm_price_cost'>".$prices[$i]["prog_price_cost60"]."  ₽</span> 60 минут</div>
                      </div>  
                      <div class='button button_programm_price  col-12 col-md-5 col-lg-12'><a href=''>Записаться</a></div>
                  </div>
              </div>
              ";
          if ($i<count($prices)-1){
            $outer_html.=" <div class='programms-prices-delimiter d-block d-md-none'></div>";
          }
      }
    $after_widget ="</div></div>";  
       
    echo $before_widget;       
    echo $outer_html;       
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
     $instance['classes'] = strip_tags( $new_instance['classes'] );
     $instance['ind_text'] = strip_tags( $new_instance['ind_text'] );
     $instance['ind_45'] = strip_tags( $new_instance['ind_45'] );
     $instance['ind_60'] = strip_tags( $new_instance['ind_60'] );
     $instance['pair_text'] = strip_tags( $new_instance['pair_text'] );
     $instance['pair_45'] = strip_tags( $new_instance['pair_45'] );
     $instance['pair_60'] = strip_tags( $new_instance['pair_60'] );
     $instance['group_text'] = strip_tags( $new_instance['group_text'] );
     $instance['group_45'] = strip_tags( $new_instance['group_45'] );
     $instance['group_60'] = strip_tags( $new_instance['group_60'] );
      
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
    $classes    = esc_attr( $instance['classes'] );
    $ind_text    = esc_attr( $instance['ind_text'] );
    $ind_45    = esc_attr( $instance['ind_45'] );
    $ind_60    = esc_attr( $instance['ind_60'] );
    $pair_text    = esc_attr( $instance['pair_text'] );
    $pair_45    = esc_attr( $instance['pair_45'] );
    $pair_60    = esc_attr( $instance['pair_60'] );
    $group_text    = esc_attr( $instance['group_text'] );
    $group_45    = esc_attr( $instance['group_45'] );
    $group_60    = esc_attr( $instance['group_60'] );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('classes'); ?>"><?php _e('Классы'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('classes'); ?>" name="<?php echo $this->get_field_name('classes'); ?>" value="<?php echo $classes; ?>">
    </p>
    <div class="program-price-back__input-box" style="margin-bottom:20px; border-top: 1px solid #ccd0d4;"> 
      <p><b>Индивидуальное занятие</b></p>
      <label for="<?php echo $this->get_field_id('ind_text'); ?>"><?php _e('Название'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('ind_text'); ?>" name="<?php echo $this->get_field_name('ind_text'); ?>" value="<?php echo $ind_text; ?>">
      <label for="<?php echo $this->get_field_id('ind_45'); ?>"><?php _e('Цена 45мин'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('ind_45'); ?>" name="<?php echo $this->get_field_name('ind_45'); ?>" value="<?php echo $ind_45; ?>">
      <label for="<?php echo $this->get_field_id('ind_60'); ?>"><?php _e('Цена 60мин'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('ind_60'); ?>" name="<?php echo $this->get_field_name('ind_60'); ?>" value="<?php echo $ind_60; ?>">
    </div>
    <div class="program-price-back__input-box" style="margin-bottom:20px; border-top: 1px solid #ccd0d4;">
      <p><b>Занятие в паре</b></p>
      <label for="<?php echo $this->get_field_id('pair_text'); ?>"><?php _e('Название'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('pair_text'); ?>" name="<?php echo $this->get_field_name('pair_text'); ?>" value="<?php echo $pair_text; ?>">
      <label for="<?php echo $this->get_field_id('pair_45'); ?>"><?php _e('Цена 45мин'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('pair_45'); ?>" name="<?php echo $this->get_field_name('pair_45'); ?>" value="<?php echo $pair_45; ?>">
      <label for="<?php echo $this->get_field_id('ind_60'); ?>"><?php _e('Цена 60мин'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('pair_60'); ?>" name="<?php echo $this->get_field_name('pair_60'); ?>" value="<?php echo $pair_60; ?>">
    </div>
    <div class="program-price-back__input-box" style="margin-bottom:20px; border-top: 1px solid #ccd0d4;">
      <p><b>Мини-группа (3-4 человека)</b></p>
      <label for="<?php echo $this->get_field_id('group_text'); ?>"><?php _e('Название'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('group_text'); ?>" name="<?php echo $this->get_field_name('group_text'); ?>" value="<?php echo $group_text; ?>">
      <label for="<?php echo $this->get_field_id('group_45'); ?>"><?php _e('Цена 45мин'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('group_45'); ?>" name="<?php echo $this->get_field_name('group_45'); ?>" value="<?php echo $group_45; ?>">
      <label for="<?php echo $this->get_field_id('group_60'); ?>"><?php _e('Цена 60мин'); ?></label> 
      <input style="width:100%;" type="text" id="<?php echo $this->get_field_id('group_60'); ?>" name="<?php echo $this->get_field_name('group_60'); ?>" value="<?php echo $group_60; ?>">
    </div>
  
 <?php 
 }
  
}

/* Register the widget */
add_action( 'widgets_init', function(){
  register_widget( 'ew_price_widget' );
});