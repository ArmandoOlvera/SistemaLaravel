/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//Enlace del componente de categorias a su respectiva etiqueta
//En donde dice 'categoriascomponent' es el nombre de la etiqueta, mientras que './components/CategoriasComponent.vue' es la direccion del componente
Vue.component('categoriascomponent', require('./components/CategoriasComponent.vue').default);

//Enlace del componente de personas a su respectiva etiqueta
Vue.component('personascomponent', require('./components/PersonasComponent.vue').default);
 
//Enlace del componente de rol a su respectiva etiqueta
Vue.component('rolcomponent', require('./components/RolComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
  data:{
    menu : 0
  }
});
