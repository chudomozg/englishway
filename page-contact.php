<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <?php ew_get_right_sidebar(get_field('content_length',get_the_ID())); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-lg-3">
            <div class="contetnt-block main-content contetnt-block_md-bottom-delimiter row">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2 class="main-title"><?php the_title(); ?></h2>
                <?php wp_nav_menu( array( 'theme_location' => 'aboutus-menu' ) ); ?> 
                <div class="contact__title contetnt-block__title col-12">
                    <h3>АДРЕС И ТЕЛЕФОН</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <div class="contact-desc col-12 row ">      
                  <div class="contact-desc__call col-lg-5 order-lg-2">
                    <div class="contact-desc__phone">
                      <a href="tel:+7 (3812) 505-543">
                        <?php echo get_field('contact_phone', get_the_ID()); ?>
                      </a>
                    </div>
                    <div class="contact-desc__schedule">
                      <?php echo get_field('contact_schedule', get_the_ID()); ?>
                    </div>
                  </div>
                  <div class="contact-desc__address col-lg-7">
                    <div class="contact-desc__main-address">
                      <?php echo get_field('contact_address', get_the_ID()); ?>
                    </div>
                    <div class="contact-desc__dop-address">
                      <?php echo get_field('contact_dop_address', get_the_ID()); ?>
                    </div>
                  </div>
                </div>
                <div class="contact-map col-12">
                  <?php echo get_field('contact_map', get_the_ID()); ?>
                </div>
              <?php endwhile; else : ?>
                <article>
                  <p>Извините, записи не были найдены!</p>
                </article>
              <?php endif; ?>
          </div>
          <div class="contetnt-block recvizit row">
                <div class="recvizit__title contetnt-block__title col-12">
                    <h3>РЕКВИЗИТЫ</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <?php echo(ew_get_recvizit()); ?>
          </div>
        </div>
    </div>
    <?php ew_get_bottom_sidebar(get_field('content_length',get_the_ID())); ?>
    </section>
    
</main>
<?php get_footer(); ?>