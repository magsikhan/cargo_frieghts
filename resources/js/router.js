import TopHeader from './components/Header';
import Sidebar from './components/Sidebar';
import Layout from './layout/Layout'
import Dashboard from './components/pages/user/Dashboard';
import Users from './components/pages/user/Users';
import AddCustomerResidential from './components/pages/user/AddCustomerResidential';
import AddBussniss from './components/pages/user/AddBussniss';
import BlockedUserListing from './components/pages/user/BlockedUserListing';
import QuotationLog from './components/pages/user/QuotationLog';
import OrderLog from './components/pages/user/OrderLog';
import PaymentLog from './components/pages/user/PaymentLog';
import Feedback from './components/pages/user/Feedback';
import ViewProfile from './components/pages/user/ViewProfile';
import EditUser from './components/pages/user/EditUser';
import BlockUsers from './components/pages/user/BlockUsers';
import UserQuotationLog from './components/pages/user/UserQuotationLog';
import UserQuotationDetails from './components/pages/user/UserQuotationDetails';

    routes : [
        {
            path:'/',
            name:'dashboard',
            component:Dashboard
        },
        {
            path:'/header',
            name:'header',
            component:TopHeader
        },
        {
            path:'/users',
            name:'users',
            component:Users
        },
        {
            path:'/add-customer-residential',
            name:'add-customer-residential',
            component:AddCustomerResidential
        },
        {
            path:'/add-bussniss',
            name:'add-bussniss',
            component:AddBussniss
        },
       
        {
            path:'/quotation-log',
            name:'quotation-log',
            component:QuotationLog
        },
        {
            path:'/order-log',
            name:'order-log',
            component:OrderLog
        },
        {
            path:'/payment-log',
            name:'payment-log',
            component:PaymentLog
        },
        {
            path:'/feedback',
            name:'feedback',
            component:Feedback
        },
        {
            path:'/view-profile/:id',
            name:'view-profile',
            component:ViewProfile
        },
        {
            path:'/edit-user/:id',
            name:'edit-user',
            component:EditUser
        },
        {
            path:'/block-users',
            name:'block-users',
            component:BlockUsers
        },
        {
            path:'/user-qoutation/:id',
            name:'user-qoutation',
            component:UserQuotationLog
        },
        {
            path:'/user-qoutation-detail/:id',
            name:'user-qoutation-detail',
            component:UserQuotationDetails
        },
      
    ]

    export default routes;