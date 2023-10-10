import { pageTrantition, pageTrantitionEnd } from '../event.js';
import { navigation } from '../nav/main.js';
import { reload } from '../utils.js';

pageTrantition();
pageTrantitionEnd();
navigation();
reload();
