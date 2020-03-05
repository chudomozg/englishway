(function($) {
  $(document).ready(function() {
    $(".header__burger").click(function(event) {
      $(".header__burger, .menu-header-container").toggleClass("active");
    });
  });
})(jQuery);
