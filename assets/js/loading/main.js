import { gsap } from '../event.js';
import { getData, saveData } from '../utils.js';
import { textReveal } from './textReveal.js';

export const loader = () => {
  let textElements = [
    'country',
    'country',
    'country',
    'side',
    '2.0',
    '2.0',
    '🔥',
    'we',
    'found',
    '🔥',
  ];
  let textIndex = 0;
  let element = document.querySelector('.loader');
  let textDisplayElement = document.querySelector('.loader p');

  const CONTENTS = {
    MAIN: document.querySelector('main'),
    FOOTER: document.getElementById('footer'),
  };

  const MENU = document.getElementById('menu');
  const TOGGLE = document.getElementById('toggle');
  const OVERLAYPATH = document.getElementById('overlayPath');
  const NEWSITEM = document.getElementById('top__news');
  const NEWSCLOSE = document.getElementById('news__close');
  const NEWSCLICK = document.querySelector('.top__news__content');

  function updateText() {
    if (textIndex === textElements.length) {
      completeTextDisplay();
      return;
    }

    if (textDisplayElement) {
      textDisplayElement.textContent = textElements[textIndex];
      textIndex++;
    }

    let delay = 250;
    setTimeout(updateText, delay);
  }

  function newsClose() {
    // NEWSがない場合はスルー
    if (NEWSCLOSE && NEWSITEM) {
      NEWSCLICK.addEventListener('click', () => {
        NEWSITEM.style.display = 'none';
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

  function completeTextDisplay() {
    const loadingTimeout = setTimeout(() => {
      // 5秒後に実行される処理
      console.error('Loading timeout!');
      forceEndLoading();
    }, 5000); // 5000ミリ秒 = 5秒
    loading(loadingTimeout);
    gsap.to(element, {
      delay: 0.4,
      onStart: () => {
        textReveal();
      },
      onComplete: () => {
        // CANVAS.classList.add('loaded');
        element.style.display = 'none';
      },
    });
  }

  function loading(loadingTimeout) {
    // newsがある場合は、アニメーションを追加
    if (NEWSITEM && !getData('newsClose')) {
      gsap.set(NEWSITEM, {
        display: 'block',
        y: 200,
        opacity: 0,
      });
    }
    gsap
      .timeline({})
      .set(OVERLAYPATH, {
        attr: { d: 'M 0 100 V 100 Q 50 100 100 100 V 100 z' },
      })
      // 扇型を黒く塗りつぶしたパス
      .to(
        OVERLAYPATH,
        {
          duration: 0.5,
          ease: 'power4.in',
          attr: { d: 'M 0 100 V 50 Q 50 0 100 50 V 100 z' },
        },
        0
      )
      // 真っ黒なパス
      .to(OVERLAYPATH, {
        duration: 0.3,
        ease: 'power2',
        attr: { d: 'M 0 100 V 0 Q 50 0 100 0 V 100 z' },
      })
      // メニューを上に移動させながら非表示にする
      .to(
        MENU,
        {
          duration: 0.5,
          ease: 'power3.in',
          y: -100,
          onStart: () => {
            gsap.to(TOGGLE, {
              autoAlpha: 0,
              duration: 0.1,
            });
          },
        },
        0.1
      )
      // 後にアニメーションするパス
      // 真っ黒なパス
      .set(OVERLAYPATH, {
        attr: { d: 'M 0 0 V 100 Q 50 100 100 100 V 0 z' },
      })
      .set(
        MENU,
        {
          opacity: 0,
        },
        '<'
      )
      // 扇型の余白部分を黒く塗りつぶしたパス
      .to(OVERLAYPATH, {
        duration: 0.3,
        ease: 'power2.in',
        attr: { d: 'M 0 0 V 50 Q 50 0 100 50 V 0 z' },
      })
      // 透明なパス
      .to(OVERLAYPATH, {
        duration: 0.3,
        ease: 'power4',
        attr: { d: 'M 0 0 V 0 Q 50 0 100 0 V 0 z' },
      })
      // メインコンテンツを移動させながら表示させる
      .to(
        [CONTENTS.MAIN, CONTENTS.FOOTER],
        {
          duration: 0.5,
          ease: 'power4',
          y: 0,
          opacity: 1,
          onStart: () => {
            TOGGLE.setAttribute('aria-expanded', 'false');
            gsap.to(TOGGLE, {
              autoAlpha: 1,
              duration: 0.1,
            });
          },
        },
        '>-=0.4'
      )
      .to(
        '.loader',
        {
          duration: 0.25,
          opacity: 0,
          onComplete: () => {
            clearTimeout(loadingTimeout);
          },
        },
        '>-=0.4'
      );
    // NEWSITEMが存在する場合だけ、アニメーションを追加、ローカルストレージに保存されている場合はスルー
    if (NEWSITEM && !getData('newsClose')) {
      gsap.to(
        NEWSITEM,
        {
          delay: 0.8,
          duration: 0.8,
          y: 0,
          opacity: 1,
          ease: 'Expo.easeOut',
        },
        '>-=0.4'
      );
    }
  }

  function forceEndLoading() {
    element.style.display = 'none';
  }

  updateText();
  newsClose();
};
