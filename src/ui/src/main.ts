import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios';

Vue.config.productionTip = false
axios.defaults.baseURL = 'http://127.0.0.1/api/';
axios.defaults.headers.common['Header'] = 'application/json';

new Vue({
  router,
  store,
  render: (h: any) => h(App)
}).$mount('#app')
