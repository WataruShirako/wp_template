// three.jsのインポート
import * as THREE from 'three';

const canvasEl = document.getElementById('fvCanvas');
const canvasSize = {
  w: window.innerWidth,
  h: window.innerHeight,
};

// シーンを作成
const scene = new THREE.Scene();

// レンダラーの設定
const renderer = new THREE.WebGLRenderer({ canvas: canvasEl, antialias: true });
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(canvasSize.w, canvasSize.h);

// カメラを作成
const camera = new THREE.PerspectiveCamera(75, canvasSize.w / canvasSize.h, 0.1, 1000);
camera.position.z = 5;

// メッシュを作成
const geometry = new THREE.SphereGeometry(1, 32, 32); // 球体のジオメトリを使用
const material = new THREE.MeshBasicMaterial({ color: 0xffffff });
const mesh = new THREE.Mesh(geometry, material);
scene.add(mesh);

// アニメーションループ
function animate() {
  requestAnimationFrame(animate);
  renderer.render(scene, camera);
}
animate();

// リサイズイベントをハンドル
window.addEventListener('resize', () => {
  const newWidth = window.innerWidth;
  const newHeight = window.innerHeight;

  camera.aspect = newWidth / newHeight;
  camera.updateProjectionMatrix();

  renderer.setSize(newWidth, newHeight);
});
