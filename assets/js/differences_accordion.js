(function ($) {
  $(document).ready(function ($) {
    let addAccordionClass = function () {
      let ww = document.body.clientWidth;
      if (ww < 992) {
        $(".ability__hide").addClass("collapse");
        $(".differences").addClass("differences-accordion");
        $(".diff__text").addClass("collapse");
        $(".diff__title").attr("data-toggle", "collapse");
      } else if (ww >= 992) {
        $(".ability__hide").removeClass("collapse");
        $(".differences").removeClass("differences-accordion");
        $(".diff__text").removeClass("collapse");
        $(".diff__title").removeAttr("data-toggle");
      }
    };
    $(window).resize(function () {
      addAccordionClass();
    });
    //Fire it when the page first loads:
    addAccordionClass();

    //Меняемтекст ссылки "А также"
    $(".ability__hide").on("shown.bs.collapse	", function () {
      $(".ability__hide-link").text("скрыть ▲");
    });

    $(".ability__hide").on("hidden.bs.collapse", function () {
      $(".ability__hide-link").text("а так же ▼");
    });
  });
})(jQuery);
