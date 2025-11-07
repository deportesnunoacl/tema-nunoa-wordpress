(function ($) {
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
})(jQuery);
