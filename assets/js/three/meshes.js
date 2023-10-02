import * as THREE from 'https://unpkg.com/three/build/three.module.js';
import { loader, renderer } from './setup.js';

// FVメッシュ
export const createFvMesh = (img) => {
  const texture = loader.load(img.src);

  const uniforms = {
    uTexture: { value: texture },
    uImageAspect: { value: img.naturalWidth / img.naturalHeight },
    uPlaneAspect: { value: img.clientWidth / img.clientHeight },
    uTime: { value: 0 },
  };
  const geo = new THREE.PlaneGeometry(1, 1, 100, 100); // 後から画像のサイズにscaleするので1にしておく
  const mat = new THREE.ShaderMaterial({
    uniforms,
    vertexShader: document.getElementById('v-shader-fv').textContent,
    fragmentShader: document.getElementById('f-shader-fv').textContent,
  });

  const mesh = new THREE.Mesh(geo, mat);
  return mesh;
};

// Planeメッシュ
export const createMesh = (img) => {
  const texture = loader.load(img.src);

  const uniforms = {
    uTexture: { value: texture },
    uImageAspect: { value: img.naturalWidth / img.naturalHeight },
    uPlaneAspect: { value: img.clientWidth / img.clientHeight },
    uTime: { value: 0 },
  };
  const geo = new THREE.PlaneGeometry(1, 1, 100, 100); // 後から画像のサイズにscaleするので1にしておく
  const mat = new THREE.ShaderMaterial({
    uniforms,
    vertexShader: document.getElementById('v-shader').textContent,
    fragmentShader: document.getElementById('f-shader').textContent,
  });

  const mesh = new THREE.Mesh(geo, mat);

  return mesh;
};

// スライダーメッシュ
export const createSlideMesh = (opts) => {
  const geo = new THREE.PlaneGeometry(1, 1, 100, 100);

  let sliderImages = [];

  console.log(sliderImages);

  opts.images.forEach((img) => {
    let texture = loader.load(img.getAttribute('src') + '?v=' + Date.now());
    texture.magFilter = texture.minFilter = THREE.LinearFilter;
    texture.anisotropy = renderer.capabilities.getMaxAnisotropy();
    sliderImages.push(texture);
  });

  let mat = new THREE.ShaderMaterial({
    uniforms: {
      uTexture: { value: sliderImages[0] },
      uImageAspect: { value: opts.naturalWidth / opts.naturalHeight },
      uPlaneAspect: { value: opts.clientWidth / opts.clientHeight },
      uTime: { value: 0 },
      dispFactor: { type: 'f', value: 0.0 },
      currentImage: { type: 't', value: sliderImages[0] },
      nextImage: { type: 't', value: sliderImages[1] },
      shakeIntensity: { value: 0 },
    },
    vertexShader: document.getElementById('v-shader-slide').textContent,
    fragmentShader: document.getElementById('f-shader-slide').textContent,
    transparent: true,
    opacity: 1.0,
  });

  // スライダーのイベント
  let addEvents = function () {
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

  addEvents();

  const mesh = new THREE.Mesh(geo, mat);
  return mesh;
};

export const getMat = () => {
  console.log('mat inside getMat:', mat); // getMatが呼ばれたときのmatの値をログに出力
  return mat;
};
