<?php

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
    wp_enqueue_script( 'ew-mobile-menu', get_template_directory_uri()."/assets/js/menu.js");
    wp_enqueue_script( 'ew-slider', get_template_directory_uri()."/assets/js/slider.js");
}
add_action( 'wp_enqueue_scripts', 'ew_add_js' );

// Регистрирует новую боковую панель под названием 'sidebar'
function ew_add_widget_support() {
    register_sidebar( array(
                    'name' => 'Sidebar',
                    'id' => 'sidebar',
                    'before_widget' => '<div class="widget_wrapper">',
                    'after_widget' => '</div>',
                    'before_title' => '<h2 class="widget_title">',
                    'after_title' => '</h2>',
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
        $img=get_the_post_thumbnail();
        $desc=get_field('desc',$id);
        $link=get_field('link',$id);


        $outer_html .="
        <div class='slide'>";
        if (!empty($link)){
            $outer_html .="<a href='$link'>";
        }
        $outer_html .="
            <div class='slide__img'>
                $img
            </div>  
            <div class='slide__title'>
                $title
            </div>";

        if (!empty($link)){
            $outer_html .="</a>";
        }
         $outer_html .="</div>";
    }

    // Restore original Post Data
    wp_reset_postdata();
  
    return $outer_html;
}

function ew_get_differences(){
    $diffences = get_field('differences',get_the_ID());
    $outer_html ="";

    foreach ($diffences as $diff){
        $outer_html .= "
        <div class='diff col-xl-6'>
            <div class='diff__ico col-auto'>
            </div>
            <div class='diif__wrapper'>
                <div class='diff__title col-12'>
                    ".$diff['title']."
                </div>
                <div class='diff__text col-12'>
                    ".$diff['text']."
                </div>
            </div>
        </div>
        ";
   
    }
    return $outer_html;
}

function ew_get_you_can(){
    $abilitys = get_field('you_can',get_the_ID());
    $outer_html ="";

    foreach ($abilitys as $ab){
        $outer_html .= "
            <div class='ability col-xl-6 row'>
                <div class='ability__ico col-auto'>
                </div>
                <div class='ability__text col'>
                    $ab
                </div>
            </div>
        ";
    }

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

      }
      wp_reset_postdata();
  
      return $outer_html;

}