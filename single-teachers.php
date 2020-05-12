<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <?php ew_get_right_sidebar(get_field('content_length',get_the_ID())); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-lg-3">
            <div class="contetnt-block main-content row">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2 class="main-title">Преподаватель</h2>
                <div class="teacher-content col-12 row">
                  <div class="teacher-photo col-12 col-md-6 col-lg-5">
                    <?php the_post_thumbnail( "full" );?>
                  </div>
                  <div class="teacher-desc col-12 col-md-6 col-lg-7">
                    <div class="teacher-name">
                      <h4><?php the_title(); ?></h4>
                    </div>
                    <div class="teacher-lang">
                      Преподаватель языка(ов): <?php echo implode(", ", get_field('teacher_lang',get_the_ID())); ?>
                    </div>
                    <div class="teacher-exp">
                      Опыт работы: <?php echo get_field('teacher_exp', get_the_ID()); ?> лет
                    </div>
                  </div>
                  <div class="teacher-text col-12">
                    <?php the_content(); ?>
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