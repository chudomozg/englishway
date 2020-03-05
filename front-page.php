<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="article-full">
        <header>
        </header>
        <?php the_content(); ?>
      </article>
<?php endwhile; else : ?>
      <article>
        <p>Извините, записи не были найдены!</p>
      </article>
<?php endif; ?>
  </section><?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>