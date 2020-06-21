<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <?php ew_get_right_sidebar(get_field('content_length',get_the_ID())); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-lg-3">
            <div class="contetnt-block main-content row">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2 class="main-title">Отзыв от <?php echo get_field('review_date', get_the_ID()); ?></h2>
                <div class="review-page col-12 row">
                  <div class="review-page-photo col-12 col-md-4 col-md-3 col-lg-3 col-xl-2">
                    <?php echo ew_get_review_avatar();
                    ?>
                  </div>
                  <div class="review-page-detail col-md-8 col-lg-9 col-xl-10">
                    <div class="review-page-name">
                      <h4><?php echo get_field('review_name', get_the_ID()); ?></h4>
                    </div>
                    <div class="review-page-date">
                      Дата публикации: <?php echo get_the_date('j F Y'); ?>
                    </div>
                  </div>
                  <div class="review-page-text col-12">
                    <?php echo get_field('review_body', get_the_ID()); ?>
                  </div>
                </div>
              <?php endwhile; else : ?>
                <article>
                  <p>Извините, записи не были найдены!</p>
                </article>
              <?php endif; ?>
          </div>
        </div>
    </div>
    <?php ew_get_bottom_sidebar(get_field('content_length',get_the_ID())); ?>
    </section>
    
</main>
<?php get_footer(); ?>