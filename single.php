<?php get_header(); ?>
<main>
  <section class="main container-lg container-fluid">
      <div class="row">
        <!-- <div class="sidebar px-0 px-lg-3 col-12 col-xl-3 col-md-4 order-2 order-xl-1">
            
        </div> -->
        
        <div class="content col-12 col-md-8 col-xl-9">
            <div class="contetnt-block row">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="article-full">
                        <h2><?php the_title(); ?></h2>
                      <?php the_content(); ?>
                    </article>
              <?php endwhile; else : ?>
                    <article>
                      <p>Извините, записи не были найдены!</p>
                    </article>
              <?php endif; ?>
              </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>