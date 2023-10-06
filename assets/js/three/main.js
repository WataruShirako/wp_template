import { scene, resize, setupScene } from './setup.js';
import { Fv, ImagePlane, Slider } from './classes.js';
import { createFvMesh, createMesh, createSlideMesh, disposeMesh } from './meshes.js';
import { loop, imagePlaneArray, fvArray, slideImgArray } from './helpers.js';

let allMeshes = [];

// セットアップの関数
export const threeInit = () => {
  setupScene();
  resize();

  const fvImgArray = [...document.querySelectorAll('.fv__img')];

  // もし fvImgArray が存在していれば、その中の処理を実行する
  if (fvImgArray && fvImgArray.length > 0) {
    for (const img of fvImgArray) {
      const mesh = createFvMesh(img);
      scene.add(mesh);
      allMeshes.push(mesh);

      const fv = new Fv(mesh, img);
      fv.setParams();
      fvArray.push(fv);
    }
  }

  // 制作事例の画像
  const imageArray = [...document.querySelectorAll('.sh__img')];

  if (imageArray && imageArray.length > 0) {
    for (const img of imageArray) {
      const mesh = createMesh(img);
      scene.add(mesh);
      allMeshes.push(mesh);

      const imagePlane = new ImagePlane(mesh, img);
      imagePlane.setParams();
      imagePlaneArray.push(imagePlane);
    }
  }

  // スライダー
  const slideArray = [...document.querySelectorAll('.s_img')];

  if (slideArray && slideArray.length > 0) {
    const mesh = createSlideMesh({ images: slideArray });
    scene.add(mesh);
    allMeshes.push(mesh);

    const slideImg = new Slider(mesh, slideArray[0]); // 最初の画像を基準として使用
    slideImg.setParams();
    slideImgArray.push(slideImg);
  }

  // リサイズ処理
  let timeoutId = 0;
  // リサイズ（負荷軽減のためリサイズが完了してから発火する）
  window.addEventListener('resize', () => {
    if (timeoutId) clearTimeout(timeoutId);
    timeoutId = setTimeout(resize, 200);
  });

  loop();
};

export const disposeAllMeshes = () => {
  allMeshes.forEach((mesh) => {
    // Use your `disposeMesh` function
    disposeMesh(mesh);
    // Remove the mesh from the scene
    scene.remove(mesh);
  });
  // Clear the array
  allMeshes = [];
};
