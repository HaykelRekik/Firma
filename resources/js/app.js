require('./bootstrap');


window.Vue = require('vue');


//support vuex


Vue.component("HelloWorld", require('./components/HelloWorld.vue').default);


const app = new Vue({

    el: '#app',

    mounted(){
     
    }
    


});


