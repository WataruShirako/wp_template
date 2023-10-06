import gsap from 'https://cdn.jsdelivr.net/npm/gsap@3.12.2/+esm';

export function pageTransition() {
  let tl = gsap.timeline();

  const transition1 = document.querySelector('.transition1');
  const transition2 = document.querySelector('.transition2');

  tl.to(transition1, {
    duration: 0.3,
    scaleY: 1,
    transformOrigin: 'top left',
    stagger: 0.2,
  });

  tl.to(
    transition2,
    {
      duration: 0.3,
      scaleY: 1,
      transformOrigin: 'bottom left',
      stagger: 0.2,
    },
    '-=0.4'
  );

  tl.to(transition1, {
    duration: 0.3,
    scaleY: 0,
    transformOrigin: 'bottom left',
    stagger: 0.2,
  });

  tl.to(
    transition2,
    {
      duration: 0.3,
      scaleY: 0,
      transformOrigin: 'top left',
      stagger: 0.2,
    },
    '-=0.4'
  );
}

export function contentAnimation() {}
