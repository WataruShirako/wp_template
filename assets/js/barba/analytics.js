import { barba } from './barbaInit.js';

export const setupAnalytics = () => {
  barba.hooks.after(() => {
    ga('set', 'page', window.location.pathname);
    ga('send', 'pageview');
  });
};
