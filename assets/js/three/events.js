import { gsap } from '../event.js';

// スライダーのイベント
export const addEvents = (mat, sliderImages) => {
  let pagButtons = Array.from(document.getElementById('pagination').querySelectorAll('button'));
  let isAnimating = false;

  pagButtons.forEach((el) => {
    el.addEventListener('click', function () {
      if (!isAnimating) {
        isAnimating = true;

        document.getElementById('pagination').querySelectorAll('.active')[0].className = '';
        this.className = 'active';

        let slideId = parseInt(this.dataset.slide, 10);

        mat.uniforms.nextImage.value = sliderImages[slideId];
        mat.uniforms.nextImage.needsUpdate = true;
        mat.uniforms.shakeIntensity.value = 0; // 揺れの初期強度を設定

        gsap.to(mat.uniforms.dispFactor, 0.5, {
          value: 1,
          ease: 'elastic.in(1, 0.3)',
          onStart: function () {
            gsap.to(mat.uniforms.shakeIntensity, {
              duration: 0.5,
              value: 0.01,
              ease: 'elastic.in(1, 0.3)',
            });
          },
          onComplete: function () {
            mat.uniforms.currentImage.value = sliderImages[slideId];
            mat.uniforms.currentImage.needsUpdate = true;

            gsap.to(mat.uniforms.dispFactor, 0.5, {
              value: 0,
              ease: 'elastic.Out(1, 0.3)',
              onComplete: function () {
                // 揺れの強度を徐々に0にする
                gsap.to(mat.uniforms.shakeIntensity, {
                  duration: 0.5,
                  value: 0,
                  ease: 'elastic.Out(1, 0.3)',
                });
                isAnimating = false;
              },
            });
          },
        });

        let slideTitleEl = document.getElementById('slide-title');
        let slideStatusEl = document.getElementById('slide-status');
        let nextSlideTitle = document.querySelectorAll(`[data-slide-title="${slideId}"]`)[0]
          .innerHTML;
        let nextSlideStatus = document.querySelectorAll(`[data-slide-status="${slideId}"]`)[0]
          .innerHTML;

        gsap.fromTo(
          slideTitleEl,
          0.5,
          {
            autoAlpha: 1,
            y: 0,
          },
          {
            autoAlpha: 0,
            y: 20,
            ease: 'Expo.easeIn',
            onComplete: function () {
              slideTitleEl.innerHTML = nextSlideTitle;

              gsap.to(slideTitleEl, 0.5, {
                autoAlpha: 1,
                y: 0,
              });
            },
          }
        );

        gsap.fromTo(
          slideStatusEl,
          0.5,
          {
            autoAlpha: 1,
            y: 0,
          },
          {
            autoAlpha: 0,
            y: 20,
            ease: 'Expo.easeIn',
            onComplete: function () {
              slideStatusEl.innerHTML = nextSlideStatus;

              gsap.to(slideStatusEl, 0.5, {
                autoAlpha: 1,
                y: 0,
                delay: 0.1,
              });
            },
          }
        );
      }
    });
  });
};
