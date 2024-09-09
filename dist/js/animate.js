(function(o, e) {
  const n = {};
  typeof e.neoAnimate < "u" && typeof e.neoAnimate.defaults < "u" && Object.assign(n, e.neoAnimate.defaults), console.log(n), o.behaviors.neoColoris = {
    attach: () => {
      AOS.init(n);
    }
  };
})(Drupal, drupalSettings);
//# sourceMappingURL=animate.js.map
