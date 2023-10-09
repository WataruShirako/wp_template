import { lenisInit } from './lenis/main.js';
import { setFillHeight } from './utils.js';
import { threeInit } from './three/main.js';
import { loader } from './loading/main.js';
import { navigation } from './nav/main.js';
import { pageTrantition, pageTrantitionEnd } from './event.js';

loader();
pageTrantition();
pageTrantitionEnd();
navigation();
setFillHeight();
lenisInit();
threeInit();
