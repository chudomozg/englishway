<?php if ( is_active_sidebar( 'mdbsidebar' ) ) : ?>
  <aside id="bottom-sidebar" class="bottom-sidebar sidebar row order-3 widget-area" role="complementary">
    <?php dynamic_sidebar( 'mdbsidebar' ); ?>
  </aside>
<?php endif; ?>