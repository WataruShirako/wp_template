const CANVAS = document.querySelector('.webgl-canvas');
const NAV = document.getElementById('nav');
const MENU = document.getElementById('menu');
const TOGGLE = document.getElementById('toggle');
const OVERLAYPATH = document.getElementById('overlayPath');
const NEWSITEM = document.getElementById('top__news');
const NEWSCLOSE = document.getElementById('news__close');
const NEWSCLICK = document.querySelector('.top__news__content');

export function newsClose() {
  // NEWSがない場合はスルー
  if (NEWSCLOSE && NEWSITEM) {
    NEWSCLICK.addEventListener('click', () => {
      saveData('newsClose', 'true');
    });
    NEWSCLOSE.addEventListener('click', () => {
      gsap.to(NEWSITEM, {
        duration: 0.8,
        y: 200,
        opacity: 0,
        ease: 'Power2.easeOut',
        onComplete: () => {
          NEWSITEM.style.display = 'none';
          // ローカルストレージに保存
          localStorage.setItem('newsClose', 'true');
          saveData('newsClose', 'true');
        },
      });
    });
  }
}
