import { createApp } from 'vue'
import App from './App.vue'
import store from './store/store.js' // Vuex 저장소 import

createApp(App)
// use : 해당 파라미터를 사용하겠다 라는 뜻
.use(store)
.mount('#app')
