(function (Drupal, drupalSettings) {

  const defaultOptions = {};
  if (typeof drupalSettings.neoAnimate !== 'undefined' && typeof drupalSettings.neoAnimate.defaults !== 'undefined') {
    Object.assign(defaultOptions, drupalSettings.neoAnimate.defaults);
  }
  console.log(defaultOptions);

  Drupal.behaviors.neoColoris = {
    attach: () => {
      AOS.init(defaultOptions as AosOptions);
    }
  };

})(Drupal, drupalSettings);

export {};
