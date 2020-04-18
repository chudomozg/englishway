<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <div class="col-12 main-banner-sm px-0 d-lg-none d-block">
            <div class="row banner m-0 owl-carousel">
                <?php echo (ew_get_sliders()) ?>        
            </div>
            <div class="banner__nav banner-navigation">
                <button class="banner-navigation__prev"></button>
                <div class="banner-navigation__dots"></div>
                <button class="banner-navigation__next"></button>
            </div>
        </div>       
            <?php get_sidebar(); ?>

        <div class="content col-12 col-md-8 col-xl-9">
            <div class="row d-lg-block d-none main-banner-xl">
                <div class="banner owl-carousel">
                    <?php echo(ew_get_sliders()) ?>    
                </div>
                <div class="banner__nav banner-navigation">
                    <button class="banner-navigation__prev"></button>
                    <div class="banner-navigation__dots"></div>
                    <button class="banner-navigation__next"></button>
                </div>
            </div>
            <div class="differences differences-accordion contetnt-block row ">
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
                <div class="frontpage-review__slider reviews col-md-10 col-lg-12 mx-md-auto mx-lg-0 owl-carousel">
                    <?php echo (ew_get_frontpage_review()) ?>  
                </div>
                <div class="frontpage-review__nav d-md-flex d-lg-none d-none">
                    <div class="frontpage-review__prev"></div>
                    <div class="frontpage-review__next"></div>
                </div>
            </div>
            <div class="frontpage-gallery contetnt-block row">
                <div class="frontpage-gallery__title contetnt-block__title col-12">
                    <h3>Галерея</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <div class="col-12 px-0 px-md-3 px-lg-0">
                    <div class="frontpage-gallery__slider px-0 px-md-3  px-lg-0 col-12 col-md-10 col-lg-12 mx-md-auto owl-carousel">
                        <?php echo (ew_get_frontpage_random_gellery_img()) ?>
                    </div>
                    <div class="frontpage-gallery__slider-navigation slider-navigation row px-3 mx-n3 px-lg-0 mx-lg-0">
                        <button class="slider-navigation__prev d-md-none d-lg-block"></button>
                        <div class="slider-navigation__dots d-md-none d-lg-block"></div>
                        <button class="slider-navigation__next d-md-none d-lg-block"></button>
                        <div class='frontpage-gallery__more-link slider-more-link col-12 col-md-auto'><a href='/gallery'>Смотреть все фото</a></div>
                    </div>
                    <div class="frontpage-gallery__tablet-nav d-none d-md-flex d-lg-none">
                        <div class="frontpage-gallery__tablet-prev"></div>
                        <div class="frontpage-gallery__tablet-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
</main>
<?php get_footer(); ?>