import * as THREE from 'https://unpkg.com/three/build/three.module.js';
import { getMat } from './meshes.js';

const canvasEl = document.getElementById('webgl-canvas');

export const canvasSize = {
  w: window.innerWidth,
  h: window.innerHeight,
};

// レンダラーの設定
export const renderer = new THREE.WebGLRenderer({ canvas: canvasEl, antialias: true });

// カメラの設定、canvasの描画が画面ぴったりになるようカメラを調整
const fov = 60; // 視野角
const fovRad = (fov / 2) * (Math.PI / 180);
const dist = canvasSize.h / 2 / Math.tan(fovRad);
export const camera = new THREE.PerspectiveCamera(fov, canvasSize.w / canvasSize.h, 0.1, 2000);

// シーンの初期設定
export const scene = new THREE.Scene();
// ローダーの初期設定
export const loader = new THREE.TextureLoader();
// ライトの初期設定
export const light = new THREE.AmbientLight(0xffffff, 5.0);

// function初期設定
export function setupScene() {
  loader.crossOrigin = 'anonymous';

  // レンダラーの比率とサイズ設定
  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(canvasSize.w, canvasSize.h);

  // カメラの位置設定
  camera.position.z = dist;

  // シーンにライトを追加
  scene.add(light);
}

// htmlとthree.jsの描画サイズを合わせる
export const resize = () => {
  const width = window.innerWidth;
  const height = window.innerHeight;

  canvasSize.w = width;
  canvasSize.h = height;

  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(width, height);

  camera.aspect = width / height;
  camera.updateProjectionMatrix();

  // カメラの距離を計算し直す
  const fov = 60;
  const fovRad = (fov / 2) * (Math.PI / 180);
  const dist = canvasSize.h / 2 / Math.tan(fovRad);
  camera.position.z = dist;
};

// スライダーのイベント
export let addEvents = function () {
  let pagButtons = Array.from(document.getElementById('pagination').querySelectorAll('button'));
  let isAnimating = false;

  const mat = getMat();
  console.log(mat);

  pagButtons.forEach((el) => {
    el.addEventListener('click', function () {
      if (!isAnimating) {
        isAnimating = true;

        document.getElementById('pagination').querySelectorAll('.active')[0].className = '';
        this.className = 'active';

        let slideId = parseInt(this.dataset.slide, 10);

        mat.uniforms.nextImage.value = sliderImages[slideId];
        mat.uniforms.nextImage.needsUpdate = true;

        gsap.to(mat.uniforms.dispFactor, 1, {
          value: 1,
          ease: 'Expo.easeInOut',
          onComplete: function () {
            mat.uniforms.currentImage.value = sliderImages[slideId];
            mat.uniforms.currentImage.needsUpdate = true;
            mat.uniforms.dispFactor.value = 0.0;
            isAnimating = false;
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
