require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



import Vue from 'vue';
import store from './store';

Vue.component('product-add', require('./components/product/ProductAdd').default);

const app = new Vue({
  el: '#app',
  store,
})
