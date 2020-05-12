<?php get_header(); ?>
<main>
    <section class="main container-lg container-fluid">
    <div class="row">
        <?php ew_get_right_sidebar(get_field('content_length',get_the_ID())); ?>
        <div class="content col-12 col-md-8 col-xl-9 pb-xl-3">
            <div class="contetnt-block main-content row">
				<?php the_archive_title( '<h2 class="main-title">', '</h2>' );?>
                <?php wp_nav_menu( array( 'theme_location' => 'lang-menu' ) ); ?> 
                <?php if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						// the_title();

					endwhile;

					the_posts_navigation();
				?>
              <?php else : ?>
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