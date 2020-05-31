require('./bootstrap');

window.Vue = require('vue');

//support vuex


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({

    el: '#app',

    mounted(){
     
    }
    


});
