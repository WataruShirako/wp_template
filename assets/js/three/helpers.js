import { scene, camera, renderer } from './setup.js';

export const scroll = {
  targetScrollY: 0,
  scrollOffset: 0,
  prevScrollOffset: null,
  currentScrollY: 0,
};

// lerp関数
export const lerp = (s, e, m) => {
  return (1 - m) * s + m * e;
};

export const updateScroll = () => {
  // スクロール位置を取得
  scroll.targetScrollY = document.documentElement.scrollTop;
  // console.log('targetScrollY', scroll.targetScrollY);
  // lerp関数でスクロール位置をなめらかに追従
  scroll.currentScrollY = lerp(scroll.currentScrollY, scroll.targetScrollY, 0.1);
  // console.log('currentScrollY', scroll.currentScrollY);
  scroll.scrollOffset = scroll.targetScrollY - scroll.currentScrollY;
  // console.log('scrollOffset', scroll.scrollOffset);
};

export const imagePlaneArray = [];
export const fvArray = [];
export const slideImgArray = [];

// 毎フレーム呼び出す
export const loop = () => {
  requestAnimationFrame(loop);
  // composer.render();

  updateScroll();

  for (const plane of imagePlaneArray) {
    plane.update(scroll.scrollOffset);
  }

  for (const fv of fvArray) {
    fv.update(scroll.scrollOffset);
  }

  for (const slide of slideImgArray) {
    slide.update(scroll.scrollOffset);
  }

  // 現在のフレームでのscrollOffsetの値を保存
  scroll.prevScrollOffset = scroll.scrollOffset;

  renderer.render(scene, camera);
};

// メッシュを透明にする関数
export const makeTransparent = (mesh) => {
  mesh.material.transparent = true;
  mesh.material.opacity = 0;
};

// fvメッシュのampをウインドウ調整
export const getAmpValueFV = (ww) => {
  if (ww <= 640) {
    return 0.165;
  } else if (ww <= 960) {
    return 0.125;
  } else if (ww <= 1540) {
    return 0.105;
  } else {
    return 0.075;
  }
};

// fvメッシュのampをウインドウ調整
export const getAmpValueArc = (ww) => {
  if (ww <= 640) {
    return 0.165;
  } else if (ww <= 960) {
    return 0.125;
  } else if (ww <= 1540) {
    return 0.105;
  } else {
    return 0.075;
  }
};

// fvメッシュのfreqをウインドウ調整
export const getFreqValueArc = (ww) => {
  if (ww <= 640) {
    return 0.015;
  } else if (ww <= 960) {
    return 0.01;
  } else if (ww <= 1540) {
    return 0.008;
  } else {
    return 0.005;
  }
};

// fvメッシュのampをウインドウ調整
export const getTensValueArc = (ww) => {
  if (ww <= 640) {
    return -0.00075;
  } else if (ww <= 960) {
    return -0.00045;
  } else if (ww <= 1540) {
    return -0.00015;
  } else {
    return -0.00007;
  }
};
