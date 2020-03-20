(function ($) {
  $(document).ready(function () {
    //Баннеры
    let banner = $(".banner");
    banner.owlCarousel({loop: true, items: 1, autoWidth: false, nav: false, dotsContainer: ".banner-navigation__dots"});
    $(".banner-navigation__prev").click(function () {
      banner.trigger("prev.owl.carousel");
    });
    $(".banner-navigation__next").click(function () {
      banner.trigger("next.owl.carousel");
    });

    $(".frontpage-review__slider").owlCarousel({
      loop: true,
      responsive: {
        0: {
          items: 1
        },
        1140: {
          items: 3
        }
      },
      margin: 30
    });
    $(".frontpage-review__slider").append("<div class='frontpage-review__more-link slider-more-link'><a href='/review'>Смотреть все отзывы</a></div>");

    //Галерея на главной
    $(".frontpage-gallery__slider").owlCarousel({
      loop: true,
      autoHeight: true,
      responsive: {
        0: {
          items: 1
        },
        1140: {
          items: 4
        }
      },
      margin: 16,
      dotsContainer: ".frontpage-gallery__slider-navigation .slider-navigation__dots"
    });
    $(".frontpage-gallery .slider-navigation__prev").click(function () {
      $(".frontpage-gallery__slider").trigger("prev.owl.carousel");
    });
    $(".frontpage-gallery .slider-navigation__next").click(function () {
      $(".frontpage-gallery__slider").trigger("next.owl.carousel");
    });
  });
})(jQuery);
