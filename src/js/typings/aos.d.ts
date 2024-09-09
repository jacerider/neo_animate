interface AosOptions {
  // Global settings:
  // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  disable: false,
  // name of the event dispatched on the document, that AOS should initialize on
  startEvent: 'DOMContentLoaded',
  // class applied after initialization
  initClassName: 'aos-init',
  // class applied on animation
  animatedClassName: 'aos-animate',
  // if true, will add content of `data-aos` as classes on scroll
  useClassNames: false,
  // disables automatic mutations' detections (advanced)
  disableMutationObserver: false,
  // the delay on debounce used while resizing window (advanced
  debounceDelay: 50,
  // the delay on throttle used while scrolling the page (advanced)
  throttleDelay: 99,

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  // offset (in px) from the original trigger point
  offset: 120,
  // values from 0 to 3000, with step 50ms
  delay: 0,
  // duration of the animation (in ms)
  duration: 400,
  // easing function that will be used
  easing: 'ease',
  // whether animation should happen only once - while scrolling down
  once: false,
  // whether elements should animate out while scrolling past them
  mirror: false,
  // defines which position of the element regarding to window
  anchorPlacement: 'top-bottom',
}

interface Aos {
  init: (options?:AosOptions) => void;
  refresh: () => void;
  refreshHard: () => void;
}

declare var AOS:Aos;
