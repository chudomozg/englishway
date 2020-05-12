(function ($) {
  $(document).ready(function () {
    //Баннеры
    let bannerSm = $(".main-banner-sm .banner");
    bannerSm.owlCarousel({loop: true, items: 1, autoWidth: false, nav: false, dotsContainer: ".main-banner-sm .banner-navigation__dots"});
    $(".main-banner-sm .banner-navigation__prev").click(function () {
      bannerSm.trigger("prev.owl.carousel");
    });
    $(".main-banner-sm .banner-navigation__next").click(function () {
      bannerSm.trigger("next.owl.carousel");
    });

    let bannerXl = $(".main-banner-xl .banner");
    bannerXl.owlCarousel({loop: true, items: 1, autoWidth: false, nav: false, dotsContainer: ".main-banner-xl .banner-navigation__dots"});
    $(".main-banner-xl .banner-navigation__prev").click(function () {
      bannerXl.trigger("prev.owl.carousel");
    });
    $(".main-banner-xl .banner-navigation__next").click(function () {
      bannerXl.trigger("next.owl.carousel");
    });

    //Отзывы на главной
    $(".frontpage-review__slider").owlCarousel({
      loop: true,
      responsive: {
        0: {
          items: 1
        },
        992: {
          items: 2
        },
        1140: {
          items: 3
        }
      },
      margin: 0
    });
    $(".frontpage-review__slider").append("<div class='frontpage-review__more-link slider-more-link'><a href='/review'>Смотреть все отзывы</a></div>");

    $(".frontpage-review__nav .frontpage-review__prev").click(function () {
      $(".frontpage-review__slider").trigger("prev.owl.carousel");
    });
    $(".frontpage-review__nav .frontpage-review__next").click(function () {
      $(".frontpage-review__slider").trigger("next.owl.carousel");
    });

    //Галерея на главной
    $(".frontpage-gallery__slider").owlCarousel({
      loop: true,
      autoHeight: true,
      responsive: {
        0: {
          items: 1
        },
        992: {
          items: 3
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
    $(".frontpage-gallery__tablet-prev").click(function () {
      $(".frontpage-gallery__slider").trigger("prev.owl.carousel");
    });
    $(".frontpage-gallery__tablet-next").click(function () {
      $(".frontpage-gallery__slider").trigger("next.owl.carousel");
    });

    //Страница Галерея
    slidersIds.forEach(function (id) {
      galleryName = ".gallery-" + id;
      gallery = $(galleryName + " .gallery__box");
      gallery.owlCarousel({
        loop: true,
        items: 1,
        autoWidth: false,
        nav: false,
        dotsContainer: galleryName + " .banner-navigation__dots"
      });
      $(galleryName + " .banner-navigation__prev").click(function () {
        $(".gallery-" + id + " .gallery__box").trigger("prev.owl.carousel");
      });
      $(galleryName + " .banner-navigation__next").click(function () {
        $(".gallery-" + id + " .gallery__box").trigger("next.owl.carousel");
      });

      //Magnific popup
      $(".popup-gallery-" + id).magnificPopup({
        type: "image",
        gallery: {
          enabled: true,
          tCounter: ""
        }
      });
    });
  });
})(jQuery);
