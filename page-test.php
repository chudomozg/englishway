<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row page-test">
        <?php ew_get_right_sidebar(get_field('content_length',get_the_ID())); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-lg-3">
            <div class="contetnt-block main-content row">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2 class="main-title"><?php the_title(); ?></h2>
                <div class="test-online__title contetnt-block__title col-12">
                    <h3>Онлайн</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <div class="test-online__md-text d-none d-md-block d-lg-none">
                  Тест из 50 вопросов, направленный на выявление уровня знаний
                </div>
                <div class="test-online-page row">
                  <div class="test-online-page__test col-12 col-lg-6 row">
                    <div class="test-online-page__flag col-12 col-md-4 col-lg-12">
                      <img src="<?php echo get_template_directory_uri()."/assets/images/flag_britain.png" ?>" alt="">
                    </div>
                    <div class="col-12 col-md-8 col-lg-12">
                      <div class="test-online-page__name">
                        Английский язык
                      </div>
                      <div class="test-online-page__text d-block d-md-none d-lg-block">
                        Тест из 50 вопросов, направленный на выявление уровня знаний
                      </div>
                      <div class="test-online-page__button button button_red mx-auto w-50 primary-deep">
                        <a href="/user_test/english/">Пройти</a>
                      </div>
                    </div>
                  </div>
                  <div class="test-online-page__test col-12 col-lg-6 row">
                    <div class="test-online-page__flag col-12 col-md-4 col-lg-12">
                      <img src="<?php echo get_template_directory_uri()."/assets/images/flag_france.png" ?>" alt="">
                    </div>
                    <div class="col-12 col-md-8 col-lg-12">
                      <div class="test-online-page__name">
                        Французский язык
                      </div>
                      <div class="test-online-page__text d-block d-md-none d-lg-block">
                        Тест из 50 вопросов, направленный на выявление уровня знаний
                      </div>
                      <div class="test-online-page__button button button_red mx-auto w-50 primary-deep">
                        <a href="/user_test/franch/">Пройти</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="test-real__title contetnt-block__title col-12">
                    <h3>Тестирование в офисе englishway!</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <div class="test-real__desc">
                  <div class="test-real__text">
                    Приходите на тестирование в офис EnglishWay! Вы узнаете свой точный уровень, менеджер сразу подберет вам подходящую группу, расскажет о вашей программе, и вы сможете приступить к занятиям.
                  </div>
                  <div class="col-6 col-lg-5 col-xl-4 mx-auto">
                    <div class="test-online-page__button button button_red mx-auto w-100 primary-deep">
                      <a data-toggle="modal" href="#offline-test">Записаться</a>
                    </div>
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
    <!-- MODAL TEST OFFLINE  -->
    <div class="callback modal fade" id="offline-test" tabindex="-1" role="dialog" aria-labelledby="offline-test-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="callback__title modal-title" id="offline-test-label">Тестирование в офисе Englishway!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo do_shortcode('[contact-form-7 id="973" title="Тестирование оффлайн"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php ew_get_bottom_sidebar(get_field('content_length',get_the_ID())); ?>
    </section>
    
</main>
<?php get_footer(); ?>