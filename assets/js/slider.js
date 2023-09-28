// three.jsのインポート
import * as THREE from 'three';

class Slider {
  constructor() {
    this.bindAll();

    this.vert = `
    varying vec2 vUv;
    void main() {
      vUv = uv;
      gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
    }
    `;

    this.frag = `
    varying vec2 vUv;

    uniform sampler2D texture1;
    uniform sampler2D texture2;
    uniform sampler2D disp;
    
    uniform float dispPower;
    uniform float intensity;
    uniform sampler2D uTexture;
    uniform float uImageAspect;
    uniform float uPlaneAspect;
    uniform float uTime;
    
    uniform vec2 size;
    uniform vec2 res;
    
    vec2 backgroundCoverUv( vec2 screenSize, vec2 imageSize, vec2 uv ) {
      float screenRatio = screenSize.x / screenSize.y;
      float imageRatio = imageSize.x / imageSize.y;
      vec2 newSize = screenRatio < imageRatio 
          ? vec2(imageSize.x * (screenSize.y / imageSize.y), screenSize.y)
          : vec2(screenSize.x, imageSize.y * (screenSize.x / imageSize.x));
      vec2 newOffset = (screenRatio < imageRatio 
          ? vec2((newSize.x - screenSize.x) / 2.0, 0.0) 
          : vec2(0.0, (newSize.y - screenSize.y) / 2.0)) / newSize;
      return uv * screenSize / newSize + newOffset;
    }
    
    void main() {
      vec2 uv = vUv;
      
      // アスペクト比を調整するロジック
      vec2 ratio = vec2(
        min(uPlaneAspect / uImageAspect, 1.0),
        min((1.0 / uPlaneAspect) / (1.0 / uImageAspect), 1.0)
      );
      vec2 fixedUv = vec2(
        (uv.x - 0.5) * ratio.x + 0.5,
        (uv.y - 0.5) * ratio.y + 0.5
      );
      vec2 offset = vec2(0.0, uTime * 0.0008);
    
      vec4 disp = texture2D(disp, uv);
      vec2 dispVec = vec2(disp.x, disp.y);
      
      vec2 distPos1 = uv + (dispVec * intensity * dispPower);
      vec2 distPos2 = uv + (dispVec * -(intensity * (1.0 - dispPower)));
      
      vec4 _texture1 = texture2D(texture1, distPos1);
      vec4 _texture2 = texture2D(texture2, distPos2);
    
      float r = texture2D(uTexture, fixedUv + offset).r;
      float g = texture2D(uTexture, fixedUv + offset * 0.5).g;
      float b = texture2D(uTexture, fixedUv).b;
    
      // RGBのズレを適用したテクスチャ情報を計算
      vec3 rgbShiftedTexture = mix(vec3(_texture1.r, _texture1.g, _texture1.b), vec3(r, g, b), dispPower);
    
      gl_FragColor = vec4(rgbShiftedTexture, 1.0);
    }
    
    `;

    this.el = document.querySelector('.js-slider');
    this.inner = this.el.querySelector('.js-slider__inner');
    this.slides = [...this.el.querySelectorAll('.js-slide')];
    this.bullets = [...this.el.querySelectorAll('.js-slider-bullet')];

    this.renderer = null;
    this.scene = null;
    this.clock = null;
    this.camera = null;

    this.images = [
      'https://source.unsplash.com/whOkVvf0_hU/',
      'https://source.unsplash.com/phIFdC6lA4E',
      'https://source.unsplash.com/whOkVvf0_hU/',
    ];

    this.data = {
      current: 0,
      next: 1,
      total: this.images.length - 1,
      delta: 0,
    };

    this.state = {
      animating: false,
      text: false,
      initial: true,
    };

    this.textures = null;

    this.init();
  }

  bindAll() {
    ['render', 'nextSlide'].forEach((fn) => (this[fn] = this[fn].bind(this)));
  }

  setStyles() {
    this.slides.forEach((slide, index) => {
      if (index === 0) return;

      gsap.set(slide, { autoAlpha: 0 });
    });

    this.bullets.forEach((bullet, index) => {
      if (index === 0) return;

      const txt = bullet.querySelector('.js-slider-bullet__text');
      const line = bullet.querySelector('.js-slider-bullet__line');

      gsap.set(txt, {
        alpha: 0.25,
      });
      gsap.set(line, {
        scaleX: 0,
        transformOrigin: 'left',
      });
    });
  }

  cameraSetup() {
    this.camera = new THREE.OrthographicCamera(
      this.el.offsetWidth / -2,
      this.el.offsetWidth / 2,
      this.el.offsetHeight / 2,
      this.el.offsetHeight / -2,
      1,
      1000
    );

    this.camera.lookAt(this.scene.position);
    this.camera.position.z = 1;
  }

  setup() {
    this.scene = new THREE.Scene();
    this.clock = new THREE.Clock(true);

    this.renderer = new THREE.WebGLRenderer({ alpha: true });
    this.renderer.setPixelRatio(window.devicePixelRatio);
    this.renderer.setSize(this.el.offsetWidth, this.el.offsetHeight);

    this.inner.appendChild(this.renderer.domElement);
  }

  loadTextures() {
    const loader = new THREE.TextureLoader();
    loader.crossOrigin = '';

    this.textures = [];
    this.images.forEach((image, index) => {
      const texture = loader.load(image + '?v=' + Date.now(), this.render);

      texture.minFilter = THREE.LinearFilter;
      texture.generateMipmaps = false;

      if (index === 0 && this.mat) {
        this.mat.uniforms.size.value = [texture.image.naturalWidth, texture.image.naturalHeight];
      }

      this.textures.push(texture);
    });

    this.disp = loader.load(
      'https://s3-us-west-2.amazonaws.com/s.cdpn.io/58281/rock-_disp.png',
      this.render
    );
    this.disp.magFilter = this.disp.minFilter = THREE.LinearFilter;
    this.disp.wrapS = this.disp.wrapT = THREE.RepeatWrapping;
  }

  createMesh() {
    this.mat = new THREE.ShaderMaterial({
      uniforms: {
        dispPower: { type: 'f', value: 0.0 },
        intensity: { type: 'f', value: 0.5 },
        res: { value: new THREE.Vector2(window.innerWidth, window.innerHeight) },
        size: { value: new THREE.Vector2(1, 1) },
        texture1: { type: 't', value: this.textures[0] },
        texture2: { type: 't', value: this.textures[1] },
        disp: { type: 't', value: this.disp },
      },
      transparent: true,
      vertexShader: this.vert,
      fragmentShader: this.frag,
    });

    const geometry = new THREE.PlaneGeometry(this.el.offsetWidth, this.el.offsetHeight, 1);

    const mesh = new THREE.Mesh(geometry, this.mat);

    this.scene.add(mesh);
  }

  transitionNext() {
    gsap.to(this.mat.uniforms.dispPower, 2, {
      value: 1,
      ease: Expo.easeOut,
      onUpdate: this.render,
      onComplete: () => {
        this.mat.uniforms.dispPower.value = 0.0;
        this.changeTexture();
        this.render.bind(this);
        this.state.animating = false;
      },
    });

    const current = this.slides[this.data.current];
    const next = this.slides[this.data.next];

    const currentImages = current.querySelectorAll('.js-slide__img');
    const nextImages = next.querySelectorAll('.js-slide__img');

    const currentText = current.querySelectorAll('.js-slider__text-line div');
    const nextText = next.querySelectorAll('.js-slider__text-line div');

    const currentBullet = this.bullets[this.data.current];
    const nextBullet = this.bullets[this.data.next];

    const currentBulletTxt = currentBullet.querySelectorAll('.js-slider-bullet__text');
    const nextBulletTxt = nextBullet.querySelectorAll('.js-slider-bullet__text');

    const currentBulletLine = currentBullet.querySelectorAll('.js-slider-bullet__line');
    const nextBulletLine = nextBullet.querySelectorAll('.js-slider-bullet__line');

    const tl = gsap.timeline();

    tl.paused(true);

    if (this.state.initial) {
      gsap.to('.js-scroll', 1.0, {
        yPercent: 100,
        alpha: 0,
        ease: Power4.easeInOut,
      });

      this.state.initial = false;
    }

    tl.staggerFromTo(
      currentImages,
      1.0,
      {
        yPercent: 0,
        scale: 1,
      },
      {
        yPercent: -185,
        scaleY: 1.5,
        ease: Expo.easeInOut,
      },
      0.075
    )
      .to(
        currentBulletTxt,
        1.5,
        {
          alpha: 0.25,
          ease: Linear.easeNone,
        },
        0
      )
      .set(
        currentBulletLine,
        {
          transformOrigin: 'right',
        },
        0
      )
      .to(
        currentBulletLine,
        1.0,
        {
          scaleX: 0,
          ease: Expo.easeInOut,
        },
        0
      );

    if (currentText) {
      tl.fromTo(
        currentText,
        2,
        {
          yPercent: 0,
        },
        {
          yPercent: -100,
          ease: Power4.easeInOut,
        },
        0
      );
    }

    tl.set(current, {
      autoAlpha: 0,
    }).set(
      next,
      {
        autoAlpha: 1,
      },
      1
    );

    if (nextText) {
      tl.fromTo(
        nextText,
        2,
        {
          yPercent: 100,
        },
        {
          yPercent: 0,
          ease: Power4.easeOut,
        },
        1.5
      );
    }

    tl.staggerFromTo(
      nextImages,
      1.0,
      {
        yPercent: 150,
        scaleY: 1.5,
      },
      {
        yPercent: 0,
        scaleY: 1,
        ease: Expo.easeInOut,
      },
      0.075,
      1
    )
      .to(
        nextBulletTxt,
        1.0,
        {
          alpha: 1,
          ease: Linear.easeNone,
        },
        1
      )
      .set(
        nextBulletLine,
        {
          transformOrigin: 'left',
        },
        1
      )
      .to(
        nextBulletLine,
        1.0,
        {
          scaleX: 1,
          ease: Expo.easeInOut,
        },
        1
      );

    tl.play();
  }

  prevSlide() {}

  nextSlide() {
    if (this.state.animating) return;

    this.state.animating = true;

    this.transitionNext();

    this.data.current = this.data.current === this.data.total ? 0 : this.data.current + 1;
    this.data.next = this.data.current === this.data.total ? 0 : this.data.current + 1;
  }

  changeTexture() {
    this.mat.uniforms.texture1.value = this.textures[this.data.current];
    this.mat.uniforms.texture2.value = this.textures[this.data.next];
  }

  listeners() {
    window.addEventListener('wheel', this.nextSlide, { passive: true });
  }

  render() {
    this.renderer.render(this.scene, this.camera);
  }

  init() {
    this.setup();
    this.cameraSetup();
    this.loadTextures();
    this.createMesh();
    this.setStyles();
    this.render();
    this.listeners();
  }
}

// Toggle active link
const links = document.querySelectorAll('.js-nav a');

links.forEach((link) => {
  link.addEventListener('click', (e) => {
    e.preventDefault();
    links.forEach((other) => other.classList.remove('is-active'));
    link.classList.add('is-active');
  });
});

// Init classes
const slider = new Slider();
