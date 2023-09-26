const lenis = new Lenis();

lenis.on('scroll', (e) => {
  //   console.log(e);
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

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
