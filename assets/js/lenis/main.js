import studioFreightlenis from 'https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.26/+esm';

const lenis = new studioFreightlenis();
export const lenisInit = () => {
  function raf(time) {
    lenis.raf(time);
    lenis.mouse;
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);
};
