import { scene, resize, setupScene, addEvents } from './setup.js';
import { Fv, ImagePlane, Slider } from './classes.js';
import { createFvMesh, createMesh, createSlideMesh } from './meshes.js';
import { loop, imagePlaneArray, fvArray, slideImgArray } from './helpers.js';

export let mat;

// セットアップの関数
const init = () => {
  setupScene();
  resize();
  // addEvents();

  window.addEventListener('load', () => {
    // fv
    const fvImgArray = [...document.querySelectorAll('.fv__img')];
    for (const img of fvImgArray) {
      const mesh = createFvMesh(img);
      scene.add(mesh);

      const fv = new Fv(mesh, img);
      fv.setParams();
      fvArray.push(fv);
    }

    // 制作事例の画像
    const imageArray = [...document.querySelectorAll('.sh__img')];
    for (const img of imageArray) {
      const mesh = createMesh(img);
      scene.add(mesh);

      const imagePlane = new ImagePlane(mesh, img);
      imagePlane.setParams();
      imagePlaneArray.push(imagePlane);
    }

    // スライダー
    const slideArray = [...document.querySelectorAll('.s_img')];
    const mesh = createSlideMesh({ images: slideArray });
    scene.add(mesh);

    const slideImg = new Slider(mesh, slideArray[0]); // 最初の画像を基準として使用
    slideImg.setParams();
    slideImgArray.push(slideImg);

    loop();
  });

  // リサイズ処理
  let timeoutId = 0;

  // リサイズ（負荷軽減のためリサイズが完了してから発火する）
  window.addEventListener('resize', () => {
    if (timeoutId) clearTimeout(timeoutId);
    timeoutId = setTimeout(resize, 200);
  });
};

init();
