/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 import Vue from 'vue'
 import Axios from 'axios'
 import VueSweetalert2 from 'vue-sweetalert2';
 
 Vue.use(VueSweetalert2);
 
 import "sweetalert2/dist/sweetalert2.min.css"
 Vue.prototype.$eventHub = new Vue()
 Vue.prototype.$http = Axios
 
 //Vistas para pacientes
 Vue.component('patients-index', require('./views/patients/index.vue').default);
 Vue.component('patients-create', require('./views/patients/create.vue').default);
 
 //Vistas para odontólogos
 Vue.component('dentist-index', require('./views/dentist/index.vue').default);
 Vue.component('dentist-create', require('./views/dentist/create.vue').default);
 
 //Vistas para citas
 Vue.component('citas-create', require('./views/citas/create.vue').default);
 Vue.component('citas-index', require('./views/citas/index.vue').default);
 
 //Vistas para pagos
 Vue.component('documents-index', require('./views/documents/index.vue').default);
 Vue.component('documents-create', require('./views/documents/create.vue').default);
 
 //Vistas para ordenes de pago
 Vue.component('order_payments-index', require('./views/order_payments/index.vue').default);
 Vue.component('order_payments-create', require('./views/order_payments/create.vue').default);
 
 //Vistas para reportes
 Vue.component('report_orders-index', require('./views/reportes/Orders_index.vue').default);

  
 //Vistas para historia clínica
 Vue.component('historia-index', require('./views/historia_clinica/index.vue').default);
 Vue.component('historia-create', require('./views/historia_clinica/create.vue').default);
 
  //Vistas para historia clínica
  Vue.component('horarios-index', require('./views/horarios/index.vue').default);
  Vue.component('horarios-create', require('./views/horarios/create.vue').default);

  //Vistas para items
  Vue.component('items-index', require('./views/items/index.vue').default);
  Vue.component('items-create', require('./views/items/create.vue').default);

 const app = new Vue({
     el: '#main-wrapper'
 });