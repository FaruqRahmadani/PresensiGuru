import swal from 'sweetalert'
require('./bootstrap');
require('./Angle/modernizr.custom');
require('matchMedia/index');
require('bootstrap/dist/js/bootstrap');
require('jQuery-Storage-API/jquery.storageapi');
require('jquery.easing/jquery.easing');
require('slimscroll');
require('chosen');
require('select2');
require('datatables.net-bs/js/dataTables.bootstrap');
require('./Angle/demo-datatable');
require('./Angle/app');
require('./custom');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
