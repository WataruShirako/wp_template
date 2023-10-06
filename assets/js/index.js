import { lenisInit } from './lenis/main.js';
import { setFillHeight } from './utils.js';
import { setupAnalytics } from './barba/analytics.js';
import { barbaInit } from './barba/barbaInit.js';
import { threeInit } from './three/main.js';

setFillHeight();
setupAnalytics();
// barbaInit();
lenisInit();
threeInit();
