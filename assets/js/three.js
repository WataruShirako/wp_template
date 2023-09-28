// three.jsのインポート
import * as THREE from 'three';
// import { OrbitControls } from 'https://unpkg.com/three@0.142.0/examples/jsm/controls/OrbitControls.js';
// console.log(OrbitControls);

import { FontLoader } from 'https://unpkg.com/three/examples/jsm/loaders/FontLoader';
import { TextGeometry } from 'https://unpkg.com/three/examples/jsm/geometries/TextGeometry';

const canvasEl = document.getElementById('webgl-canvas');
const canvasSize = {
  w: window.innerWidth,
  h: window.innerHeight,
};

const renderer = new THREE.WebGLRenderer({ canvas: canvasEl, antialias: true });
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(canvasSize.w, canvasSize.h);

// ウィンドウとwebGLの座標を一致させるため、描画がウィンドウぴったりになるようカメラを調整
const fov = 60; // 視野角
const fovRad = (fov / 2) * (Math.PI / 180);
const dist = canvasSize.h / 2 / Math.tan(fovRad);
const camera = new THREE.PerspectiveCamera(fov, canvasSize.w / canvasSize.h, 0.1, 2000);
camera.position.z = dist;

const scene = new THREE.Scene();

const loader = new THREE.TextureLoader();

const light = new THREE.AmbientLight(0xffffff, 5.0);
scene.add(light);

const fontLoader = new FontLoader();

fontLoader.load(
  'wp-content/themes/norashp/assets/fonts/Bee_Four_Regular.json',
  function (font, img) {
    const geometry = new TextGeometry('NORAS INC.', {
      font: font,
      size: 400,
      height: 10,
      curveSegments: 12,
      bevelEnabled: true,
      bevelThickness: 0,
      bevelSize: 0,
      bevelOffset: 0,
      bevelSegments: 0,
    });

    geometry.center();

    const texture = loader.load('https://source.unsplash.com/uA2OC0NY5U8/');

    const uniforms = {
      uTexture: { value: texture },
      uImageAspect: { value: 16 / 9 },
      uPlaneAspect: { value: 16 / 9 },
      uTime: { value: 0 },
    };

    const textMaterial = new THREE.ShaderMaterial({
      uniforms,
      vertexShader: document.getElementById('v-shader').textContent,
      fragmentShader: document.getElementById('f-shader').textContent,
    });

    const text = new THREE.Mesh(geometry, textMaterial);
    scene.add(text);
  }
);

// 画像をテクスチャにしたplaneを扱うクラス
class ImagePlane {
  constructor(mesh, img) {
    this.refImage = img;
    this.mesh = mesh;
  }

  setParams() {
    // 参照するimg要素から大きさ、位置を取得してセット
    const rect = this.refImage.getBoundingClientRect();

    this.mesh.scale.x = rect.width;
    this.mesh.scale.y = rect.height;

    const x = rect.left - canvasSize.w / 2 + rect.width / 2;
    const y = -rect.top + canvasSize.h / 2 - rect.height / 2;
    this.mesh.position.set(x, y, this.mesh.position.z);
  }

  update(offset) {
    this.setParams();

    this.mesh.material.uniforms.uTime.value = offset;
  }
}

// Planeメッシュを作る関数
const createMesh = (img) => {
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

// スライダーのクラス
class Slider {
  constructor(mesh, img) {
    this.refImage = img;
    this.mesh = mesh;
  }

  setParams() {
    // 参照するimg要素から大きさ、位置を取得してセット
    const rect = this.refImage.getBoundingClientRect();

    this.mesh.scale.x = rect.width;
    this.mesh.scale.y = rect.height;

    const x = rect.left - canvasSize.w / 2 + rect.width / 2;
    const y = -rect.top + canvasSize.h / 2 - rect.height / 2;
    this.mesh.position.set(x, y, this.mesh.position.z);
  }

  update(offset) {
    this.setParams();

    this.mesh.material.uniforms.uTime.value = offset;
  }
}

// Sliderメッシュを作る関数
const createSliderMesh = (sli) => {
  const texture = loader.load(sli.src);

  const uniforms = {
    uTexture: { value: texture },
    uImageAspect: { value: sli.naturalWidth / sli.naturalHeight },
    uPlaneAspect: { value: sli.clientWidth / sli.clientHeight },
    uTime: { value: 0 },
  };
  const geo = new THREE.PlaneGeometry(1, 1, 100, 100); // 後から画像のサイズにscaleするので1にしておく
  const mat = new THREE.ShaderMaterial({
    uniforms,
    vertexShader: document.getElementById('v-shader-slide').textContent,
    fragmentShader: document.getElementById('f-shader-slide').textContent,
  });

  const mesh = new THREE.Mesh(geo, mat);

  return mesh;
};

// シリンダーのクラス
class Cylinder {
  constructor(mesh, img) {
    this.refImage = img;
    this.mesh = mesh;
  }

  setParams(offset = 0) {
    // 参照するimg要素から大きさ、位置を取得してセット
    const rect = this.refImage.getBoundingClientRect();

    this.mesh.scale.x = rect.width / 1100;
    this.mesh.scale.y = rect.height / 700;

    const x = rect.left - canvasSize.w / 2 + rect.width / 1.5;
    const y = -rect.top + canvasSize.h / 3 - rect.height / 4 - offset;
    this.mesh.position.set(x, y, 0);
  }

  update(offset) {
    this.setParams(offset);
  }
}

// シリンダーメッシュを作る関数
const createCylinderMesh = () => {
  const geo = new THREE.CylinderGeometry(400, 400, 300, 50);
  const mat = new THREE.MeshBasicMaterial({
    transparent: true,
    opacity: 1,
    alphaTest: 0.5,
    wireframe: true,
    color: 0xff0000,
  });

  const mesh = new THREE.Mesh(geo, mat);
  return mesh;
};

// スクロール追従
let targetScrollY = 0; // スクロール位置
let currentScrollY = 0; // 線形補間を適用した現在のスクロール位置
let scrollOffset = 0; // 上記2つの差分

// 開始と終了をなめらかに補間する関数
const lerp = (start, end, multiplier) => {
  return (1 - multiplier) * start + multiplier * end;
};

const updateScroll = () => {
  // スクロール位置を取得
  targetScrollY = document.documentElement.scrollTop;
  // リープ関数でスクロール位置をなめらかに追従
  currentScrollY = lerp(currentScrollY, targetScrollY, 0.1);
  scrollOffset = targetScrollY - currentScrollY;
};

const imagePlaneArray = [];
const sliderContentArray = [];

let cyl;

// 毎フレーム呼び出す
const loop = () => {
  updateScroll();
  for (const plane of imagePlaneArray) {
    plane.update(scrollOffset);
  }

  for (const slide of sliderContentArray) {
    slide.update(scrollOffset);
  }

  if (cyl) {
    cyl.update(scrollOffset);
  }

  renderer.render(scene, camera);

  requestAnimationFrame(loop);
};

// リサイズ処理
let timeoutId = 0;
const resize = () => {
  // three.jsのリサイズ
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

const main = () => {
  window.addEventListener('load', () => {
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
    const sliderArray = [...document.querySelectorAll('.js-slide')];
    for (const sli of sliderArray) {
      const mesh = createSliderMesh(sli);
      scene.add(mesh);

      const sliderContent = new Slider(mesh, sli);
      sliderContent.setParams();

      sliderContentArray.push(sliderContent);
    }

    // シリンダー
    const objElement = document.querySelector('.cyl');
    if (objElement) {
      const mesh = createCylinderMesh(objElement);
      scene.add(mesh);

      cyl = new Cylinder(mesh, objElement);
      cyl.setParams();
    }

    loop();
  });

  // リサイズ（負荷軽減のためリサイズが完了してから発火する）
  window.addEventListener('resize', () => {
    if (timeoutId) clearTimeout(timeoutId);

    timeoutId = setTimeout(resize, 200);
  });
};

main();
