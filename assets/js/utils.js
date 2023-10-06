import gsap from 'https://cdn.jsdelivr.net/npm/gsap@3.12.2/+esm';

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

// ページ遷移アニメーション
export const pageTrantition = () => {
  const OVERLAYPATH = document.getElementById('overlayPath');
  const tl = gsap.timeline({});
  // 遷移開始
  document.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', function (e) {
      e.preventDefault(); // デフォルトのページ遷移を防ぐ
      let targetUrl = this.getAttribute('href'); // 遷移先URLを取得
      transitionAnimation(targetUrl); // アニメーション関数を実行
    });
  });
  function transitionAnimation(targetUrl) {
    // アニメーションロジック（画面を黒く覆う等）

    tl.set(OVERLAYPATH, {
      attr: { d: 'M 0 100 V 100 Q 50 100 100 100 V 100 z' },
    })
      .to(
        OVERLAYPATH,
        {
          duration: 0.5,
          ease: 'power4.in',
          attr: { d: 'M 0 100 V 50 Q 50 0 100 50 V 100 z' },
        },
        0
      )
      .to(OVERLAYPATH, {
        duration: 0.3,
        ease: 'power2',
        attr: { d: 'M 0 100 V 0 Q 50 0 100 0 V 100 z' },
        onComplete: () => {
          // sessionStorage.setItem('isAnimating', 'true'); // アニメーション中フラグをセット
          window.location.href = targetUrl; // アニメーション後にページ遷移
        },
      });
  }
};
