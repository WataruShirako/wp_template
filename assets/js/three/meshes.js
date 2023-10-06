import * as THREE from 'https://unpkg.com/three/build/three.module.js';
import rawLoader from 'https://cdn.jsdelivr.net/npm/raw-loader@4.0.2/+esm';
import { loader, renderer } from './setup.js';
import { addEvents } from './events.js';

// FVメッシュ
export const createFvMesh = (img) => {
  const texture = loader.load(img.src);

  const uniforms = {
    uTexture: { value: texture },
    uImageAspect: { value: img.naturalWidth / img.naturalHeight },
    uPlaneAspect: { value: img.clientWidth / img.clientHeight },
    uTime: { value: 0 },
    uOpacity: { value: 1 },
  };
  const geo = new THREE.PlaneGeometry(1, 1, 100, 100);
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
    uOpacity: { value: 1.0 },
  };
  const geo = new THREE.PlaneGeometry(1, 1, 100, 100);
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
      uOpacity: { value: 1.0 },
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

  addEvents(mat, sliderImages);

  const mesh = new THREE.Mesh(geo, mat);
  return mesh;
};

export const getMat = () => {
  return mat;
};

export const disposeMesh = (mesh) => {
  if (mesh) {
    if (mesh.geo) {
      mesh.geo.dispose();
    }
    if (mesh.mat) {
      if (Array.isArray(mesh.mat)) {
        mesh.mat.forEach((m) => m.dispose());
      } else {
        mesh.mat.dispose();
      }
    }
    // Add other disposals as needed, such as textures
  }
};
