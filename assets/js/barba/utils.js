import { barba } from './barbaInit.js';
// import { currentScrollY } from '../three/helpers.js';

// 時間を遅らせる
export function delay(n) {
  n = n || 2000;
  return new Promise((done) => {
    setTimeout(() => {
      done();
    }, n);
  });
}

// ページ遷移時にスクロールをトップに戻す
export const scrollTop = () => {
  // barba.hooks.beforeEnter(() => {
  //   window.scrollTo(0, 0);
  // });
  // barba.hooks.after(() => {
  //   currentScrollY = 0;
  // });
};
