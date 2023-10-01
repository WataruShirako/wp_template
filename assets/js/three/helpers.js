import { scene, camera, renderer } from './setup.js';

// スクロール追従
let targetScrollY = 0; // スクロール位置
let currentScrollY = 0; // 線形補間を適用した現在のスクロール位置
let scrollOffset = 0; // 上記2つの差分

// 開始と終了をなめらかに補間する関数
export const lerp = (start, end, multiplier) => {
  return (1 - multiplier) * start + multiplier * end;
};

export const updateScroll = () => {
  // スクロール位置を取得
  targetScrollY = document.documentElement.scrollTop;
  // lerp関数でスクロール位置をなめらかに追従
  currentScrollY = lerp(currentScrollY, targetScrollY, 0.1);
  scrollOffset = targetScrollY - currentScrollY;
};

export const imagePlaneArray = [];
export const fvArray = [];
export const slideImgArray = [];

// 毎フレーム呼び出す
export const loop = () => {
  updateScroll();
  for (const plane of imagePlaneArray) {
    plane.update(scrollOffset);
    // console.log('planeのオフセット', scrollOffset);
  }

  for (const fv of fvArray) {
    fv.update(scrollOffset);
    // console.log('fvのオフセット', scrollOffset);
  }

  for (const slide of slideImgArray) {
    slide.update(scrollOffset);
    // console.log('slideのオフセット', scrollOffset);
  }

  renderer.render(scene, camera);

  requestAnimationFrame(loop);
};
