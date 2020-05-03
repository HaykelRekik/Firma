require('./bootstrap');

window.Vue = require('vue');

//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"

const store = new Vuex.Store(
   storeData
)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({

    el: '#app',

    store, //vuex

});
