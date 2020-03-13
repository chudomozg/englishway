(function ($) {
  $(document).ready(function () {
    $(".banner").owlCarousel({loop: true, items: 1});
    $(".frontpage-review__slider").owlCarousel({
      loop: true,
      responsive: {
        0: {
          items: 1
        },
        1140: {
          items: 3
        }
      }
    });
  });
})(jQuery);
