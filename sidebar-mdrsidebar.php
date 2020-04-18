<?php if ( is_active_sidebar( 'mdrsidebar' ) ) : ?>
<div class="sidebar px-0 pl-lg-3 col-12 col-xl-3 col-md-4 order-2 order-xl-1">
    <aside id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'mdrsidebar' ); ?>
    </aside>
  </div>
<?php endif; ?>