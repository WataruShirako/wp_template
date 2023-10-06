import * as THREE from 'https://unpkg.com/three/build/three.module.js';

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

// scene初期設定
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
