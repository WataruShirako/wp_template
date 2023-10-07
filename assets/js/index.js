import { lenisInit } from './lenis/main.js';
import { setFillHeight } from './utils.js';
import { threeInit } from './three/main.js';
import { loader } from './loading/main.js';
import { navigation } from './nav/main.js';
import { pageTrantition } from './event.js';

loader();
pageTrantition();
navigation();
setFillHeight();
lenisInit();
threeInit();
