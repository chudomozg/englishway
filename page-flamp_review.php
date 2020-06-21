<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <?php ew_get_right_sidebar(get_field('content_length',get_the_ID())); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-lg-3">
            <div class="contetnt-block main-content row">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2 class="main-title"><?php the_title(); ?></h2>
                <?php
                 wp_nav_menu( array( 
                  'theme_location' => 'header-menu',
                  'level' => 2,
                  'child_of' => 217));?> 
                <div class="flamp-review col-12"><a class="flamp-widget" href="//omsk.flamp.ru/firm/english_way_shkola_inostrannykh_yazykov-70000001007278608"  data-flamp-widget-type="responsive-new" data-flamp-widget-id="70000001007278608" data-flamp-widget-width="100%" data-flamp-widget-count="10">Отзывы о нас на Флампе</a><script>!function(d,s){var js,fjs=d.getElementsByTagName(s)[0];js=d.createElement(s);js.async=1;js.src="//widget.flamp.ru/loader.js";fjs.parentNode.insertBefore(js,fjs);}(document,"script");</script></div>
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