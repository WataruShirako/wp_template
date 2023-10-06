import { lenisInit } from './lenis/main.js';
import { pageTrantition, setFillHeight } from './utils.js';
import { setupAnalytics } from './barba/analytics.js';
import { barbaInit } from './barba/barbaInit.js';
import { threeInit } from './three/main.js';
import { loader } from './loading/main.js';
import { navigation } from './nav/main.js';

loader();
pageTrantition();
navigation();
setFillHeight();
setupAnalytics();
// barbaInit();
lenisInit();
threeInit();
