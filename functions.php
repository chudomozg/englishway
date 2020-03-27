<?php
require get_template_directory() . '/classes/test-widget.php';
require get_template_directory() . '/classes/teacher-widget.php';

//стили и шрифты
function ew_add_css(){
    wp_enqueue_style( 'header-css', get_template_directory_uri()."/assets/css/header.css");
    wp_enqueue_style( 'footer-css', get_template_directory_uri()."/assets/css/footer.css");
    wp_enqueue_style( 'bootstrap', get_template_directory_uri()."/assets/css/bootstrap.min.css");
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri()."/assets/css/owl.carousel.min.css");
    wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
    wp_enqueue_style( 'google-open-sans', "https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap&subset=cyrillic,cyrillic-ext");
    wp_enqueue_style( 'google-istok-web', "https://fonts.googleapis.com/css?family=Istok+Web:400,700&display=swap&subset=cyrillic,cyrillic-ext");
}
add_action( 'wp_enqueue_scripts', 'ew_add_css' );

//JS
function ew_add_js(){
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri()."/assets/js/owl.carousel.min.js");
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri()."/assets/js/bootstrap.min.js");
    wp_enqueue_script( 'dif-accordion', get_template_directory_uri()."/assets/js/differences_accordion.js");
    wp_enqueue_script( 'vk-widget', "https://vk.com/js/api/openapi.js?167");
    wp_enqueue_script( 'ew-mobile-menu', get_template_directory_uri()."/assets/js/menu.js");
    wp_enqueue_script( 'ew-slider', get_template_directory_uri()."/assets/js/slider.js");
}
add_action( 'wp_enqueue_scripts', 'ew_add_js' );

// Регистрирует новую боковую панель под названием 'sidebar'
function ew_add_widget_support() {
    register_sidebar( array(
                    'name' => 'Sidebar',
                    'id' => 'sidebar',
                    'before_widget' => '<div class="widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widget-title">',
                    'after_title' => '</h3>',
    ) );
}
// Подхватывает(hook) инициацию виджета и запускает нашу функцию
add_action( 'widgets_init', 'ew_add_widget_support' );

// Регистрирует новое навигационное меню
function ew_register_nav_menu(){
    register_nav_menus( array(
        'header-menu' => 'header-menu',
        'footer-menu'  => 'footer-menu',
    ) );
}
add_action( 'after_setup_theme', 'ew_register_nav_menu', 0 );



if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );



//Возвращает массив ID записей всех опубликованных слайдов
function ew_get_sliders(){

    $args = array(
      'post_type'     => 'slider',
      'post_status'   => 'publish',
      'fields'        =>  'ids'
    );
    // The Query
    $result_query = new WP_Query( $args );
    
    while ( $result_query->have_posts() ) {
        $result_query->the_post();
        $id=get_the_ID();
        $title=get_the_title();
        $img=get_the_post_thumbnail_url( $id, "full" );;
        $desc=get_field('slider_desc',$id);
        $link_url=get_field('slider_link',$id);
        $link = (!empty($link_url)) ? "<a href='$link_url'>" : false;
        $link_end = (!empty($link_url)) ? "</a>" : false;
        $button_array=get_field('slider_button',$id) ;
        $button=(count($button_array["slider_button_on"]) && !empty($link)) 
        ? ("<div class='button button_red primary-deep col-8 col-sm-6 col-xl-7 col-md-7 col-xs-10 w-100'>".$button_array['slider_button_text']."</div>")
        : false;

        $outer_html .="
        <div class='slide'>
            <div class='slider__overlay'></div>
            <div class='slide__img' style='background: url($img) no-repeat;'>
                <div class='slide__message col-xl-7 col-md-8 col-xs-12'>
                $link
                    <div class='slide__title'>$title</div>
                    <div class='slide__text'>$desc</div>
                    <div class='slide__button'>$button</div>
                $link_end
                </div>
            </div>  
        </div>";
    }

    // Restore original Post Data
    wp_reset_postdata();
  
    return $outer_html;
}

function ew_get_differences(){
    $diffences = get_field('differences',get_the_ID());
    $outer_html ="";
    $diff_number= 1;
    $show = "";
    foreach ($diffences as $diff){
        $show = ($diff_number == 1) ? "show" : "";
        $outer_html .= "
        <div class='diff col-12 col-lg-6 row'>
            <div class='diff__ico col-auto p-0'>
                <img src='".get_template_directory_uri()."/assets/images/diff_ico_ $diff_number.svg'/>
            </div>
            <div class='diif__wrapper col p-0'>
                <div class='diff__title col-12' data-toggle='collapse' data-target='#diff__text_$diff_number'>
                   ".$diff['title']."
                </div>
                <div id='diff__text_$diff_number' class='diff__text d-lg-block col-12 $show' data-parent='.differences-accordion'>
                    ".$diff['text']."
                </div>
            </div>
        </div>
        ";
        $diff_number++;
    }
    return $outer_html;
}

function ew_get_you_can(){
    $abilitys = get_field('you_can',get_the_ID());
    $outer_html ="";
    $ability_number = 1;
    foreach ($abilitys as $ab){
        if ($ability_number==5){
            $outer_html .="<div class='ability__hide row mx-0'>";
        }
        $outer_html .= "
            <div class='ability ability_number-$ability_number col-lg-6 row'>
                <div class='ability__ico col-auto'>
                </div>
                <div class='ability__text col'>
                    $ab
                </div>
            </div>
        ";
        $ability_number++;
    }
    $outer_html .="</div>";
    $outer_html .=" <div class='.ability__hide-wrapper d-lg-none'>
                        <a class='ability__hide-link' href='.ability__hide' data-toggle='collapse'>а так же ▼</a>
                    </div>";

    return $outer_html;
}

function ew_get_frontpage_review(){
    $outer_html="";
    $args = array(
        'post_type'     => 'reviews',
        'post_status'   => 'publish',
        'fields'        =>  'ids'
      );
      // The Query
      $result_query = new WP_Query( $args );

      while ( $result_query->have_posts() ) {
        $result_query->the_post();
        $id=get_the_ID();
        $img=get_the_post_thumbnail();
        $link=get_permalink($id);
        $text=get_field('review_body',$id);
        $date=get_field('review_date',$id);
        $name=get_field('review_name',$id);

        $outer_html.="
            <div class='reviews__review review row mx-auto'>
                <div class='review__img col-auto col-lg-8'>
                    $img
                </div>
                <div class='review__name col-auto col-lg-12'>
                    $name
                    <div class='review__date d-lg-none d-block'>$date</div>
                </div>
                <div class='review__quotation-mark review__quotation-mark_up d-md-block d-none col-12'></div>
                <div class='review__text col-12'>".wp_trim_words( $text, 20, "...")."</div>
                <div class='review__quotation-mark review__quotation-mark_down d-md-block d-none d-lg-none col-12'></div>
                <div class='review__link-more d-flex col-12'>
                    <div class='review__link-ico  d-block d-md-none d-lg-block'></div>
                    <a href='$link'>Читать целиком</a>
                </div>
            </div>
        ";

      }
      wp_reset_postdata();
  
      return $outer_html;

}


function ew_get_frontpage_random_gellery_img(){
    $outer_html="";
    $images =array();
    $image_random_keys = array();
    $args = array(
        'post_type'     => 'gallery',
        'post_status'   => 'publish',
        'fields'        =>  'ids'
      );
      
    //   The Query
      $result_query = new WP_Query( $args );

      while ( $result_query->have_posts() ) {
        $result_query->the_post();
        $id=get_the_ID();
        $gallery =  explode(",",get_field('gallery_images',$id)); 
        foreach ($gallery as $img){
            array_push($images, $img);
        }
      }
      wp_reset_postdata();

      $images = array_unique ($images); //удаляем дубликаты

      // Формируем массив случайных ключей изображений
      $random_count = (count($images)<8) ? count($images) : 8; 
      $image_random_keys = array_rand($images, $random_count);
      
      foreach ($image_random_keys as $key){
        $outer_html.= wp_get_attachment_image($images[$key],"medium");
      }

      return $outer_html;
}