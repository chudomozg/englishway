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
            <div class="banner main-banner-xl col-12 d-xl-block d-sm-none owl-carousel">
                <?php echo(ew_get_sliders()) ?>        
            </div>
            <div class="differences row bg-white">
                <div class="differences__title col-12">
                    <h3>Наши отличия</h3>
                </div>
                <?php echo (ew_get_differences()) ?>  
            </div>
            <div class="you-can row bg-white">
            <div class="you-can__title col-12">
                    <h3>Обучаясь в школе Hello вы сможете:</h3>
                </div>
                <?php echo (ew_get_you_can()) ?>  
            </div>
            <div class="frontpage-review row bg-white">
                <div class="frontpage-review__title col-12">
                    <h3>Отзывы</h3>
                </div>
                <div class="frontpage-review__slider reviews col-12 owl-carousel">
                    <?php echo (ew_get_frontpage_review()) ?>  
                </div>


            </div>
            <div class="frontpage-gallery"></div>
        </div>
    </div>
    </section>
    
</main>
<?php get_footer(); ?>