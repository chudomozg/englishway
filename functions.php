<?php
require get_template_directory() . '/classes/test-widget.php';
require get_template_directory() . '/classes/teacher-widget.php';
require get_template_directory() . '/classes/price-widget.php';

//стили и шрифты
function ew_add_css(){
    wp_enqueue_style( 'header-css', get_template_directory_uri()."/assets/css/header.css");
    wp_enqueue_style( 'footer-css', get_template_directory_uri()."/assets/css/footer.css");
    wp_enqueue_style( 'bootstrap', get_template_directory_uri()."/assets/css/bootstrap.min.css");
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri()."/assets/css/owl.carousel.min.css");
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri()."/assets/css/owl.carousel.min.css");
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri()."/assets/css/magnific-popup.css");
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
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri()."/assets/js/jquery.magnific-popup.min.js", array('jquery'));
    wp_enqueue_script( 'vk-widget', "https://vk.com/js/api/openapi.js?167");
    wp_enqueue_script( 'ew-mobile-menu', get_template_directory_uri()."/assets/js/menu.js");
    wp_enqueue_script( 'ew-slider', get_template_directory_uri()."/assets/js/slider.js");
    wp_localize_script('ew-slider', 'slidersIds', ew_get_galleries_id());
    wp_enqueue_script( 'input-mask', get_template_directory_uri()."/assets/js/jquery.inputmask.min.js", array('jquery'));
    wp_enqueue_script( 'input-mask-rules', get_template_directory_uri()."/assets/js/imask_rules.js", array('jquery', 'input-mask'));
}
add_action( 'wp_enqueue_scripts', 'ew_add_js' );

// Регистрирует новую боковую панель под названием 'sidebar'
function ew_add_widget_support() {
    register_sidebar( array(
        'name' => 'Long right Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Middle right sidebar',
        'id' => 'mdrsidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Middle bottom sidebar',
        'id' => 'mdbsidebar',
        'before_widget' => '<div class="bottom-widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Short right sidebar',
        'id' => 'shtrsidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Short bottom sidebar',
        'id' => 'shtbsidebar',
        'before_widget' => '<div class="bottom-widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Price bottom sidebar',
        'id' => 'price_sidebar',
        'before_widget' => '<div class="bottom-widget-wrapper">',
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
        'aboutus-menu'  => 'aboutus-menu',
        'review-menu'  => 'review-menu',
        'lang-menu'  => 'lang-menu',
    ) );
}
add_action( 'after_setup_theme', 'ew_register_nav_menu', 0 );

function ew_get_right_sidebar($sb_length){
    switch ($sb_length){
        case "long":
            return (get_sidebar("sidebar"));
            break;
        case "middle":
            return (get_sidebar("mdrsidebar"));
            break;
        case "short":
            return (get_sidebar("shtrsidebar"));
            break;
        case "without":
            return false;
            break;
    }
}

function ew_get_bottom_sidebar($sb_length){
    switch ($sb_length){
        case "long":
            return false;
            break;
        case "middle":
            return (get_sidebar("mdbsidebar"));
            break;
        case "short":
            return (get_sidebar("shtbsidebar"));
            break;
        case "without":
            return false;
            break;
    }
}

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );



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
        $img=get_the_post_thumbnail_url( $id, "full" );
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

function ew_get_programms_prices(){
    $prices = array();
    array_push($prices, get_field('prog_price_1', get_the_ID()));
    array_push($prices, get_field('prog_price_2', get_the_ID()));
    array_push($prices, get_field('prog_price_3', get_the_ID()));
    $outer_html="";

  for ($i=0; $i<count($prices); $i++){
        $outer_html.= "
            <div class='programms-prices__price  programm_price col-12 col-lg-4'>
                <img class='programm_price_img m-auto col-auto col-md-4 col-lg-auto' src='".get_template_directory_uri()."/assets/images/prog_".$i.".svg'/>
                <div class='programm_price_desc col-12 col-md-8 col-lg-12'>
                    <div class='programm_price_name'>".$prices[$i]["prog_price_name"]."</div>
                    <div class='programm_price_45min '><span class='programm_price_cost'>".$prices[$i]["prog_price_cost45"]."  ₽</span> 45 минут</div>
                    <div class='programm_price_60min'><span class='programm_price_cost'>".$prices[$i]["prog_price_cost60"]."  ₽</span> 60 минут</div>
                    <div class='button button_programm_price '><a href=''>Записаться</a></div>
                </div>
            </div>";
    }

    return $outer_html;
}

function ew_get_reviews(){
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
            <div class='reviews__review review review_page col-12 col-lg-6 row mx-auto mx-lg-0'>
                <div class='review__img col-auto'>
                    $img
                </div>
                <div class='review__name col-auto'>
                    $name
                    <div class='review__date'>$date</div>
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

function ew_get_programms(){
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

    // Restore original Post Data
    wp_reset_postdata();
  
    return $outer_html;
}

function ew_get_recvizit(){
    $id=get_the_ID();
    $recvizit=get_field('contact_recvizit',$id);
  
    return $recvizit;
}

function ew_get_teachers(){
    $outer_html="<div class='teachers col-12 row'>";
    $after = '</div>';
    $languages = "";
    $args = array(
        'post_type'     => 'teachers',
        'post_status'   => 'publish',
        'fields'        =>  'ids'
      );
      // The Query
      $result_query = new WP_Query( $args );

      while ( $result_query->have_posts() ) {
        $result_query->the_post();
        $id=get_the_ID();
        $img=get_the_post_thumbnail($id, "medium");
        $url=get_the_permalink($id);
        $name=get_field('teacher_name',$id);
        $exp=get_field('teacher_exp',$id);
        $lang=get_field('teacher_lang',$id);
        $languages = implode(", ", $lang);

        $outer_html.="
                        <div class='teacher__wrapper col-md-6'>
                            <div class='teacher'>
                                <a href='".$url."'>".$img."</a>
                                <div class='teacher_name'>".$name."</div>
                                <div class='teacher_exp'>Опыт работы: ".$exp." лет</div>
                                <div class='teacher_lang'>Преподаватель ".$languages."</div>
                                <a class='teacher_link' href='".$url."'>Подробнее</a>
                            </div>
                        </div>";
    }

    // Restore original Post Data
    wp_reset_postdata();
  
    return $outer_html;
}


function ew_get_galleries_id(){
    $args = array(
        'post_type'     => 'gallery',
        'post_status'   => 'publish',
        'fields'        =>  'ids'
      );
    // The Query
    $result_query = new WP_Query( $args );
    $ID_array = $result_query->posts;

    // Restore original Post Data
    wp_reset_postdata();

    return $ID_array;
}

function ew_get_galleries(){
    $outer_html="";
    $gallery_thml="";
    $args = array(
        'post_type'     => 'gallery',
        'post_status'   => 'publish',
        'fields'        =>  'ids'
      );
      // The Query
      $result_query = new WP_Query( $args );

      while ( $result_query->have_posts() ) {
        $result_query->the_post();
        $title=get_the_title();
        $id=get_the_ID();
        $gallery =  explode(",",get_field('gallery_images',$id)); 
        $outer_html.='  <div class="col-12 px-0 px-md-0 gallery gallery-'.$id.'">
                            <div class="gallery__title contetnt-block__title col-12">
                                <h3>'.$title.'</h3>
                                <div class="contetnt-block__title-delimiter"></div>
                            </div>';
        $outer_html.="      <div class='gallery__box owl-carousel'>";
        foreach ($gallery as $img){
            $outer_html.="<a class='popup-gallery-".$id."' href='".wp_get_attachment_image_url( $img, "full" )."'>";
            $outer_html.=wp_get_attachment_image($img,"full");
            $outer_html.="</a>";
        }
            $outer_html.="  </div>
                            <div class='banner-navigation banner-navigation_gallery d-none d-lg-flex'>
                                <button class='banner-navigation__prev'></button>
                                <div class='banner-navigation__dots'></div>
                                <button class='banner-navigation__next'></button>
                            </div>
                            <div class='gallery__md-navigation d-flex d-lg-none'>
                                <button class='banner-navigation__prev banner-navigation__prev_gallery'></button>
                                <button class='banner-navigation__next banner-navigation__next_gallery'></button>
                            </div>
                        </div>";
    }

    // Restore original Post Data
    wp_reset_postdata();
  
    return $outer_html;
}


add_filter('cf7_2_post_filter-reviews-title','filter_reviews_title',10,3);
function filter_reviews_title($value, $post_id, $form_data){
  //$value is the post field value to return, by default it is empty. If you are filtering a taxonomy you can return either slug/id/array.  in case of ids make sure to cast them integers.(see https://codex.wordpress.org/Function_Reference/wp_set_object_terms for more information.)
  //$post_id is the ID of the post to which the form values are being mapped to
  // $form_data is the submitted form data as an array of field-name=>value pairs

//   return $value;
  return $post_id;
}

add_filter('cf7_2_post_filter-reviews-review_date','filter_reviews_review_date',10,3);
function filter_reviews_review_date($value, $post_id, $form_data){
  //$value is the post field value to return, by default it is empty. If you are filtering a taxonomy you can return either slug/id/array.  in case of ids make sure to cast them integers.(see https://codex.wordpress.org/Function_Reference/wp_set_object_terms for more information.)
  //$post_id is the ID of the post to which the form values are being mapped to
  // $form_data is the submitted form data as an array of field-name=>value pairs
  $value=date('Ymd');
  return $value;
}


//Меняем заголовок для вопросов теста
add_filter( 'wp_insert_post_data' , 'modify_testq_title' , '99', 1 ); // Grabs the inserted post data so you can modify it.

function modify_testq_title( $data )
{
  if($data['post_type'] == 'tests' && isset($_POST['acf']['field_5e5cefc65edad'])) { // If the actual field name of the rating date is different, you'll have to update this.
    $title = wp_trim_words( $_POST['acf']['field_5e5cefc65edad'], 5, '..?' );
    $data['post_title'] =  $title ; //Updates the post title to your new title.
  }
  return $data; // Returns the modified data.
}

//Меняем slug у вопросов теста при сохранении
add_filter( 'wp_unique_post_slug', 'custom_unique_testq_slug', 10, 4 );
function custom_unique_testq_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( $post_type ==  'tests') {
        $slug = $post_ID;
    }
    return $slug;
}


//Добавляем фильтр по таксономии (группы сложности и язык теста) в админку (вопросы тестов)
function filter_testq_by_taxonomies( $post_type, $which ) {

	// Apply this only on a specific post type
	if ( 'tests' !== $post_type )
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array( 'test_group', 'test_lang' );

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Все %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}

}
add_action( 'restrict_manage_posts', 'filter_testq_by_taxonomies' , 10, 2);


// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );


// создаем новую колонку в админке (вопросы тестов)
add_filter( 'manage_'.'tests'.'_posts_columns', 'add_views_column', 4 );
function add_views_column( $columns ){
	$num = 2; // после какой по счету колонки вставлять новые

	$new_columns = array(
        'group' => 'Группа сложности',
        'test_lang' => 'Язык теста'
	);

	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}

// заполняем колонку данными
// wp-admin/includes/class-wp-posts-list-table.php
add_action('manage_'.'tests'.'_posts_custom_column', 'fill_views_column', 5, 2 );
function fill_views_column( $colname, $post_id ){
	if( $colname === 'group' ){
        $term=get_term(get_field('question_group',$post_id),'test_group',"ARRAY_A");
        echo ($term['name']);
    }
    if( $colname === 'test_lang' ){
        $term=get_term(get_field('question_lang',$post_id),'test_lang',"ARRAY_A");
        echo ($term['name']);
	}
}