(function ($) {
  // =========================
  // HERO
  // =========================
  if (typeof wp !== 'undefined' && wp.customize) {

    wp.customize('nunoa_hero_title', function (value) {
      value.bind(function (newVal) {
        $('#hero-title').html(newVal);
      });
    });

    wp.customize('nunoa_hero_text', function (value) {
      value.bind(function (newVal) {
        $('#hero-text').text(newVal);
      });
    });

    // =========================
    // NOTICIAS
    // =========================
    wp.customize('nunoa_noticias_title', function (value) {
      value.bind(function (newVal) {
        $('#noticias-banner-title').text(newVal);
      });
    });

    wp.customize('nunoa_noticias_text', function (value) {
      value.bind(function (newVal) {
        $('#noticias-banner-text').text(newVal);
      });
    });

  }
})(jQuery);
