import gsap from 'https://cdn.jsdelivr.net/npm/gsap@3.12.2/+esm';

export const loader = () => {
  let textElements = ['Hi', 'Hi', "It's", 'Noras', 'Inc.', 'Inc.', ':)', ';)', ':)'];
  let textIndex = 0;
  let element = document.querySelector('.loader');
  let textDisplayElement = document.querySelector('.loader p');

  const CONTENTS = {
    MAIN: document.querySelector('main'),
    FOOTER: document.getElementById('footer'),
  };
  const NAV = document.getElementById('nav');
  const MENU = document.getElementById('menu');
  const TOGGLE = document.getElementById('toggle');
  const OVERLAYPATH = document.getElementById('overlayPath');
  const NEWSITEM = document.getElementById('top__news');
  const NEWSCLOSE = document.getElementById('news__close');

  function newsClose() {
    // NEWCLOSEがない場合はスルー
    if (NEWSCLOSE) {
      NEWSCLOSE.addEventListener('click', () => {
        gsap.to(NEWSITEM, {
          duration: 2,
          y: 200,
          opacity: 0,
          ease: 'Expo.easeOut',
          onComplete: () => {
            NEWSITEM.style.display = 'none';
          },
        });
      });
    }
  }

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

  function loading() {
    // newsitemがない場合はスルー
    if (NEWSITEM) {
      gsap.set(NEWSITEM, {
        y: 200,
        opacity: 0,
      });
    }
    gsap
      .timeline({
        onStart: () => {
          TOGGLE.setAttribute('aria-label', 'メニューを開く');
        },
        onComplete: () => {
          NAV.setAttribute('aria-hidden', 'true');
        },
      })
      // 初めにアニメーションするパス
      // 透明なパス
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
        },
        '>-=0.4'
      );
    // NEWSITEMが存在する場合だけ、アニメーションを追加
    if (NEWSITEM) {
      gsap.to(
        NEWSITEM,
        {
          delay: 0.4,
          duration: 2,
          y: 0,
          opacity: 1,
          ease: 'Expo.easeIn',
        },
        '>-=0.4'
      );
    }
  }

  function completeTextDisplay() {
    loading();
    gsap.to(element, {
      delay: 0.4,
      onComplete: () => {
        element.style.display = 'none';
      },
    });
  }

  updateText();
  newsClose();
};
