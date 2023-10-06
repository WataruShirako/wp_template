import { canvasSize } from './setup.js';

// fv
export class Fv {
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

    if (Math.abs(this.previousOffset - offset) > 50) {
      console.log('Large Offset Change:', offset);
    }
    this.previousOffset = offset;

    // 保存
    localStorage.setItem('offset', offset);
  }
}

// plane
export class ImagePlane {
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

// slider
export class Slider {
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
