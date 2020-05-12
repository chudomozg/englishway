<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <?php get_sidebar("sidebar"); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-xl-3">
            <div class="contetnt-block main-content contetnt-block_md-bottom-delimiter row">
			          <h2 class="main-title">Программы и цены</h2>
                <?php wp_nav_menu( array( 'theme_location' => 'lang-menu' ) ); ?> 
                <div class="programs__title contetnt-block__title col-12">
                    <h3>Мы предлагаем</h3>
                    <div class="contetnt-block__title-delimiter"></div>
                </div>
                <?php 
                  global $query_string; 
                  $posts = query_posts($query_string.'&posts_per_page=20'); 
                ?>
                <?php if ( have_posts() ) : ?>
                <div class="programs__body row">
                  <?php
                  /* Start the Loop */
                  $program_num = 0;
                  while ( have_posts() ) : the_post();
                  ?>
                  <div class="program col-12 col-lg-6 col-xl-4 pr-lg-0">
                    <div class="program__header" data-target="#program__desc_<?php echo $program_num ?>" data-toggle="collapse">
                      <div class="program__ico">
                        <?php the_post_thumbnail(); ?>
                      </div>
                      <div class="program-title">
                        <?php the_title(); ?>
                      </div>
                    </div>
                    <div id="program__desc_<?php echo $program_num ?>" class="program__desc collapse show">
                      <div class="program-text">
                        <?php echo get_field('tr_programm_lang_desc',get_the_ID()); ?>
                      </div>
                      <div class="program__link">
                        <div class="program__link-arrow"></div>
                        <a href="<?php echo get_permalink(get_the_ID()); ?>">Подробнее</a> 
                      </div>
                    </div>
                  </div>
                 

                  <?php
                  $program_num++;
                  endwhile;
                  //the_posts_navigation();
                  ?>
                </div>
              <?php else : ?>
                <article>
                  <p>Извините, программы не были найдены!</p>
                </article>
              <?php endif; ?>
              <?php wp_reset_query();?>
          </div>
          <?php dynamic_sidebar("price_sidebar"); ?>
        </div>
    </div>
    </section>
    
</main>
<?php get_footer(); ?>