<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <?php ew_get_right_sidebar(get_field('content_length',get_the_ID())); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-xl-3">
            <div class="contetnt-block main-content contetnt-block_md-bottom-delimiter row">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2 class="main-title"><?php the_title(); ?></h2>
                <?php wp_nav_menu( array( 'theme_location' => 'review-menu' ) ); ?> 
                  <?php echo ew_get_reviews() ?>
              <?php endwhile; else : ?>
                <article>
                  <p>Извините, записи не были найдены!</p>
                </article>
              <?php endif; ?>
          </div>
          <div class="contetnt-block form-reviw-block row">
            <?php echo do_shortcode('[contact-form-7 id="506" title="Отзыв"]'); ?>
          </div>
        </div>
    </div>
    <?php ew_get_bottom_sidebar(get_field('content_length',get_the_ID())); ?>
    </section>
    
</main>
<?php get_footer(); ?>