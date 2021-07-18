import Vue from 'vue';
import VueRouter from 'vue-router'; 
import DateFormet from 'moment';
import { ValidationProvider, extend, ValidationObserver } from "vee-validate";
import {required,email,image} from "vee-validate/dist/rules";
extend ('required', {
    ...required,
    message: 'This field is required'
});
extend ('email', {
    ...email,
    message: 'Please enter valid email address'
});
extend ('image', {
    ...image,
    message: 'File type must be jpg jpeg png'
});
Vue.component("moment",moment);
Vue.component("ValidationObserver", ValidationObserver);
Vue.component("ValidationProvider", ValidationProvider);
Vue.prototype.moment = moment
Vue.use(DateFormet)
import VuePagination from 'laravel-vue-pagination';
import Datepicker from 'vue2-datepicker';
import ImageUploader from 'vue-image-upload-resize';
import VueToast from 'vue-toasted';
import App from './components/App';
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('VueToast', VueToast);
//Vue.component('ValidationObserver', ValidationObserver);
Vue.component('pagination', require('laravel-vue-pagination'));
require('./bootstrap');
//require('./components/plugins/vee-validate');
window.Vue = require('vue').default;
Vue.use(VueRouter)
Vue.use(VuePagination)
Vue.use(ImageUploader)
Vue.use(VueToast)
Vue.use(DateFormet)

import Login from './components/pages/admin/Login';
import Logout from './components/pages/admin/Logout';
import Index from './components/pages/admin/Index';
import Users from './components/pages/admin/Users';
import AddCustomerResidential from './components/pages/admin/AddCustomerResidential';
import AddBussniss from './components/pages/admin/AddBussniss';
import BlockedUserListing from './components/pages/admin/BlockedUserListing';
import QuotationLog from './components/pages/admin/QuotationLog';
import OrderLog from './components/pages/admin/OrderLog';
import PaymentLog from './components/pages/admin/PaymentLog';
import Feedback from './components/pages/admin/Feedback';
import ViewProfile from './components/pages/admin/ViewProfile';
import EditUser from './components/pages/admin/EditUser';
import BlockUsers from './components/pages/admin/BlockUsers';
import UserQuotationLog from './components/pages/admin/UserQuotationLog';
import UserQuotationDetails from './components/pages/admin/UserQuotationDetails';
import Profile from './components/pages/admin/Profile'
import EditProfile from './components/pages/admin/EditProfile'
import UserPaymentLog from './components/pages/admin/UserPaymentLog'
import UserPaymentLogDetails from './components/pages/admin/UserPaymentLogDetails'
import UserOrderLog from './components/pages/admin/UserOrderLog'
import UserOrderLogDetails from './components/pages/admin/UserOrderLogDetails'
import ForgotPassword from './components/pages/admin/ForgotPassword'
import NewPassword from './components/pages/admin/NewPassword'

import moment from 'moment';

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path:'/login/admin',
            name:'login',
            component:Login
        },
        {
            path:'/forgot-password',
            name:'forgot-password',
            component:ForgotPassword
        },
        {
            path:'/new-password',
            name:'new-password',
            component:NewPassword
        },
        {
            path:'/logout',
            name:'logout',
            component:Logout
        },
        {
            path:'/admin/profile',
            name:'profile',
            component:Profile
        },
        {
            path:'/admin/edit-profile/:id',
            name:'edit-profile',
            component:EditProfile
        },
        {
            path:'/admin/dashboard',
            name:'dashboard',
            component:Index
        },
        {
            path:'/admin/users',
            name:'users',
            component:Users
        },
        {
            path:'/admin/add-customer-residential',
            name:'add-customer-residential',
            component:AddCustomerResidential
        },
        {
            path:'/admin/add-bussniss',
            name:'add-bussniss',
            component:AddBussniss
        },
       
        {
            path:'/admin/quotation-log',
            name:'quotation-log',
            component:QuotationLog
        },
        {
            path:'/admin/order-log',
            name:'order-log',
            component:OrderLog
        },
        {
            path:'/admin/payment-log',
            name:'payment-log',
            component:PaymentLog
        },
        {
            path:'/admin/feedback',
            name:'feedback',
            component:Feedback
        },
        {
            path:'/admin/view-profile/:id',
            name:'view-profile',
            component:ViewProfile
        },
        {
            path:'/admin/edit-user/:id',
            name:'edit-user',
            component:EditUser
        },
        {
            path:'/admin/block-users',
            name:'block-users',
            component:BlockUsers
        },
        {
            path:'/admin/user-qoutation-log/:id',
            name:'user-qoutation-log',
            component:UserQuotationLog
        },
        {
            path:'/admin/user-qoutation-detail/:id',
            name:'user-qoutation-detail',
            component:UserQuotationDetails
        },
        {
            path:'/admin/user-payment-log/:id',
            name:'user-payment-log',
            component:UserPaymentLog
        },
        {
            path:'/admin/user-payment-log-details/:id',
            name:'user-payment-log-details',
            component:UserPaymentLogDetails
        },
        {
            path:'/admin/user-order-log/:id',
            name:'user-order-log',
            component:UserOrderLog
        },
        {
            path:'/admin/user-order-log-details/:id',
            name:'user-order-log-details',
            component:UserOrderLogDetails
        },
      
    ]
  })


const app = new Vue({
    el: '#app',
    router,
    render: test =>test(App)
});
