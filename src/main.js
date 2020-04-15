import Vue from 'vue'
import App from './App.vue'
import router from './router.js'

Vue.config.productionTip = false


Vue.filter('limit', function(array, length) {
  var limitCount = parseInt(length, 10);
  return array.slice(0, limitCount);
});

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')