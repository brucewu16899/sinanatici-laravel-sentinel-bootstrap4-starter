import Popper from '../../../node_modules/popper.js/dist/umd/popper.js';

try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = Popper;
    require('bootstrap');
} catch (e) {}
