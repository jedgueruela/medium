window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueProgressBar from 'vue-progressbar';

import App from './App.vue';
import router from './router';

Vue.use(VueRouter);
Vue.use(VueProgressBar, {
	color: '#012161',
	failedColor: '#874b4b',
	thickness: '5px',
	transition: {
		speed: '0.5s',
		opacity: '0.6s',
		termination: 300
	},
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});
