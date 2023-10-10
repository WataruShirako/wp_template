import { gsap } from './event.js';

// 100vhのガタ付き調整
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

// ローカルストレージに保存する期間を1日に設定
export const saveData = (key, data) => {
  const wrappedData = {
    data: data,
    timestamp: new Date().getTime(), // 現在の時間
  };
  localStorage.setItem(key, JSON.stringify(wrappedData));
};

export const getData = (key, expirationTime = 24 * 60 * 60 * 1000) => {
  // 1日
  const wrappedDataStr = localStorage.getItem(key);
  if (!wrappedDataStr) {
    return null;
  }

  const wrappedData = JSON.parse(wrappedDataStr);
  const now = new Date().getTime();

  // データが有効期限切れであればnullを返し、ローカルストレージから削除
  if (now - wrappedData.timestamp > expirationTime) {
    localStorage.removeItem(key);
    return null;
  }

  return wrappedData.data;
};

// safari用ブラウザバック時にリロード
export const reload = () => {
  window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
      // bfcache発動時の処理
      window.location.reload();
    }
  });
};
