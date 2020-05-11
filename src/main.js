import Vue from 'vue'
import App from './App.vue'
import router from './router.js'
import UpMeta from './services/UpdateMeta.js'

Vue.config.productionTip = false


Vue.filter('limit', function(array, length) {
  var limitCount = parseInt(length, 10);
  return array.slice(0, limitCount);
});

new Vue({
  router,
  mixins: [UpMeta],
  data() {
    return {
      meta:{
        title: null,
        tags: null
      }
    }
  },
  render: h => h(App)
}).$mount('#app')