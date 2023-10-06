// 100vhの調整
export const setFillHeight = () => {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
};
let vw = window.innerWidth;
window.addEventListener('resize', () => {
  if (vw === window.innerWidth) {
    // 画面の横幅にサイズ変動がないのでreturn
    return;
  }

  // 画面の横幅のサイズ変動があった時のみ高さを再計算する
  vw = window.innerWidth;
  setFillHeight();
});

// ナビゲーションボタンをクリックしたら、ナビゲーションを開く
const navBtn = document.querySelector('.header__nav');
const navBtnTxt = document.querySelector('#header__nav__button__text');
const nav = document.querySelector('.nav');
const navBg = document.querySelector('.nav__bg');
const navList = document.querySelector('.nav__list');
const navItems = document.querySelectorAll('.nav__item');
const navLinks = document.querySelectorAll('.nav__link');
const navClose = document.querySelector('.nav__close');
// ナビゲーションボタンをクリックしたら、ナビゲーションを開く
navBtn.addEventListener('click', () => {
  nav.classList.toggle('nav__open');
  navBg.classList.toggle('nav__open');
  navList.classList.toggle('nav__open');

  // ナビゲーションが開いているかどうかをチェックし、ボタンのテキストを更新
  if (nav.classList.contains('nav__open')) {
    navBtnTxt.textContent = 'CLOSE';
  } else {
    navBtnTxt.textContent = 'MENU';
  }
});
