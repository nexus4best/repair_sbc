require('./bootstrap')
window.Vue = require('vue')
import router from './route'
import store from './vuex/store'

// Vue.filter('mobileArea', function(text){
//     return text+'xxx'
// })

const app = new Vue({
    router,
    store,    
    el: '#app'
});