<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <?php ew_get_right_sidebar(get_field('content_length',get_the_ID())); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-xl-3">
            <div class="contetnt-block main-content row">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2 class="main-title"><?php the_title(); ?></h2>
                <?php the_content(); ?>
              <?php endwhile; else : ?>
                <article>
                  <p>Извините, записи не были найдены!</p>
                </article>
              <?php endif; ?>
          </div>
          <div class="contetnt-block programms-prices row">
                <div class="programms-prices__title contetnt-block__title col-12">
                    <h3>Цены</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <?php echo(ew_get_programms_prices()); ?>
          </div>
        </div>
    </div>
    <?php ew_get_bottom_sidebar(get_field('content_length',get_the_ID())); ?>
    </section>
    
</main>
<?php get_footer(); ?>