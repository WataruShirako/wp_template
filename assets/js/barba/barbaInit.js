import barbacore from 'https://cdn.jsdelivr.net/npm/@barba/core@2.9.7/+esm';
import { disposeAllMeshes, threeInit } from '../three/main.js';
import { setupHeadReplacement } from './headManager.js';
import { delay } from './utils.js';
import { scroll } from '../three/helpers.js';
import { pageTransition } from './animation.js';

let scrollPosition = 0;
let savedScrollY = 0;

export const barba = barbacore;

export const barbaInit = () => {
  // 取り出し

  const savedOffset = localStorage.getItem('offset');

  setupHeadReplacement();
  console.log(scroll.targetScrollY, scrollPosition);

  barba.init({
    preventRunning: true,
    sync: true,
    scrollTo: false,
    transitions: [
      {
        once() {
          threeInit();
        },
        beforeLeave(data) {},
        async leave(data) {
          // アニメーションの時間に合わせて遅らせる
          disposeAllMeshes();
          const done = this.async();
          pageTransition();
          scrollPosition = window.scrollY;
          await delay(1000);
          done();
        },
        enter(data) {
          threeInit();
          window.scrollTo(0, scrollPosition);
          scroll.targetScrollY = scrollPosition;
          scroll.currentScrollY = 0;
        },
        after(data) {
          // console.log('After transition...');
        },
      },
    ],
    view: [
      {
        namespace: 'index',
      },
      {
        namespace: 'contact',
      },
    ],
  });
};
