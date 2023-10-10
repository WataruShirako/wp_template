import { gsap } from '../event.js';

const CANVAS = document.querySelector('.webgl-canvas');
const MOUSE = document.querySelector('.mouse');

let tl = gsap.timeline({});

export const textReveal = () => {
  gsap.set(CANVAS, {
    opacity: 0,
    y: 100,
  });
  gsap.set(MOUSE, {
    opacity: 0,
  });

  tl.from('.fv__text__h1 span', {
    opacity: 0,
    y: 50,
    filter: 'blur(2000px)',
    ease: 'Power3.out',
    stagger: {
      from: 'start',
      each: 0.05,
    },
  })
    .to('.fv__text__h1 span', {
      opacity: 1,
      y: 0,
      stagger: {
        from: 'start',
        each: 0.1,
        filter: 'blur(0px)',
      },
    })
    .to(
      CANVAS,
      {
        duration: 1,
        opacity: 0.75,
        y: 0,
        filter: 'blur(0px)',
        ease: 'Power3.out',
      },
      1.4
    )
    .to(MOUSE, {
      duration: 1,
      opacity: 1,
    });
};
