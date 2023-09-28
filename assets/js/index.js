barba.init({
  transitions: [
    {
      name: 'default-transition',
      leave() {
        // create your stunning leave animation here
      },
      enter() {
        // create your amazing enter animation here
      },
    },
  ],
});

// swiper
const swiper = new Swiper('.swiper', {
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

swiper.on('transitionEnd', function () {
  console.log('slide changed');
});

const lenis = new Lenis();

lenis.on('scroll', (e) => {
  //   console.log(e);
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);
