<!DOCTYPE html>
<html <?php language_attributes(); ?>
 <head>
    <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
 </head>
 <body <?php body_class(); ?>>
    <header>
        
        <div class="header_wrapper">
            <div class="header_wrapper__header header">
                <div class="header__mobile_burger">
                    <!-- Ниже бургер реализован на чистом css, если с ним возникнут проблемы, использовать этот из вектора -->
                    <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/mburger.svg" alt=""> -->
                </div>
                <div class="header__burger">
                    <span></span>
                </div>
                <div class="header__phone_button phone_button">
                    <a class="hphone__link" href="tel:+7 (3812) 505-543">
                        <img class="phone_button__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/mdi_call.svg" alt="">
                    </a>
                </div>
                <a class="header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="header__logoimg" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo">
                </a>
                <div class="header__middle_contact_wrapper middle_contact_wrapper">
                    <div class="header__haddress haddress">
                        <a class="haddress__link" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">
                            <div class="haddress__ico ico"></div>
                            <div class="haddress_text_wrapper">
                                <div class="haddress__address"> ул. Фрунзе 40/7,  2 этаж</div>
                                <div class="haddress__wearehere">Мы в Омске</div>
                            </div>
                        </a>
                    </div>
                    <div class="header__hemail hemail">
                        <a class="hemail__link" href="mailto:englishwayomsk@gmail.com">
                            <div class="hemail__ico ico"></div>
                            <div class="hemail__email">englishwayomsk@gmail.com</div>    
                        </a>
                    </div>
                </div>
                <div class="header__hphone hphone">
                    <div class="hphone__link_wrapper">
                        <a class="hphone__link" href="tel:+7 (3812) 505-543">+7 (3812) 505-543</a>
                    </div>
                    <div class="hphone__recall_wrapper">
                        <button class="hphone__recall" data-toggle="modal" data-target="#exampleModal">Заказать звонок</button>
                    </div>
                </div>
            </div>
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>    
            
        </div> 
        
        <!-- MODAL CALL  -->
        <div class="callback modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="callback__title modal-title" id="exampleModalLabel">Заказать обратный звонок</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo do_shortcode('[contact-form-7 id="465" title="Обратный звонок"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
