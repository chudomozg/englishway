<?php get_header(); ?>
<main>
    <section class="main container">
    <div class="row">
        <div class="banner main-banner-sm col-12 d-xl-none d-sm-block owl-carousel">
            <?php echo (ew_get_sliders()) ?>        
        </div>
        <div class="sidebar col-sm-12 col-xl-3 col-md-4 order-md-2 order-xl-1">
            <?php get_sidebar(); ?>
        </div>
        <div class="content col-sm-12 col-md-8 col-xl-9">
            <div class="row d-xl-block d-sm-none">
                <div class="banner main-banner-xl owl-carousel">
                    <?php echo(ew_get_sliders()) ?>    
                </div>
                <div class="banner__nav banner-navigation">
                    <button class="banner-navigation__prev"></button>
                    <div class="banner-navigation__dots"></div>
                    <button class="banner-navigation__next"></button>
                </div>
            </div>
            <div class="differences contetnt-block row ">
                <div class="differences__title contetnt-block__title col-12">
                    <h3>Наши отличия</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <?php echo (ew_get_differences()) ?>  
            </div>
            <div class="you-can contetnt-block row ">
            <div class="you-can__title contetnt-block__title col-12">
                    <h3>Обучаясь в школе Hello вы сможете:</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <?php echo (ew_get_you_can()) ?>  
            </div>
            <div class="frontpage-review contetnt-block row ">
                <div class="frontpage-review__title contetnt-block__title col-12">
                    <h3>Отзывы</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <div class="frontpage-review__slider reviews col-12 owl-carousel">
                    <?php echo (ew_get_frontpage_review()) ?>  
                </div>
            </div>
            <div class="frontpage-gallery contetnt-block row">
                <div class="frontpage-gallery__title contetnt-block__title col-12">
                    <h3>Галерея</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <div class="col-12">
                    <div class="frontpage-gallery__slider owl-carousel">
                        <?php echo (ew_get_frontpage_random_gellery_img()) ?>
                    </div>
                    
                    <div class="frontpage-gallery__slider-navigation slider-navigation">
                        <button class="slider-navigation__prev"></button>
                        <div class="slider-navigation__dots"></div>
                        <button class="slider-navigation__next"></button>
                        <div class='frontpage-gallery__more-link slider-more-link'><a href='/gallery'>Смотреть все фото</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
</main>
<?php get_footer(); ?>