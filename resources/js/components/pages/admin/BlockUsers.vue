<template>
    <div>
            <layout>
                    <div class="app-content content users">
                        <div class="content-wrapper">
                            <div class="content-body"> 
                            <!-- Basic form layout section start -->
                            <section id="configuration">
                                <div class="row">
                                <div class="col-12">
                                    <div class="card rounded pad-20">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                        <div class="user-top">
                                            <div class="row">
                                            <div class="col-12 col-xl-4">
                                                <h1>
                                                BLOCKED USER LISTING
                                                </h1>
                                            </div>
                                            <div class="col-xl-8 text-xl-right"> <router-link :to="{name:'add-customer-residential'}" class="blue-btn">Add Residential Customer</router-link> <router-link :to="{name:'add-bussniss'}" class="green-btn">Add Business</router-link> <router-link :to="{name:'block-users'}" class="red-btn">Blocked</router-link> </div>
                                            </div>
                                        </div>
                                         <label for="sort">sort by</label>
                                        <div class="row">
                                            
                                            <div class="col-xl-4 col-lg-6 col-md-10 col-12">
                                             From: <date-picker v-bind:style="{'display':'inline-block'}" v-model="from" valueType="format">
                                                     </date-picker>
                                            </div> 
                                            <div class="col-xl-4 col-lg-6 col-md-10 col-12">
                                                 To: <date-picker v-model="to" valueType="format"></date-picker>
                                                &nbsp; &nbsp;<button class="btn btn-success" @click="getData">Apply</button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="maain-tabble table-responsive">
                                            <table class="table">
                                            <thead>
                                                <tr>
                                                <th>S.No</th>
                                                <th>User ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Type</th>
                                                <th>Registration Date</th>
                                                <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                    
                                                <tr :key="user.id" v-for="(user, index) in users.data">
                                                    <td>{{++index}}</td>
                                                    <td>{{user.id}}</td>
                                                    <td>{{user.first_name}}</td>
                                                    <td>{{user.last_name}}</td>
                                                    <td v-if="user.role_type_id == 1">Bussniss</td>
                                                    <td v-else>User</td>
                                                    <td>{{user.reg_date}}</td>
                                                    <td><div class="btn-group mr-1 mb-1">
                                                    <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button>
                                                    <div class="dropdown-menu"> <router-link :to="{path:'view-profile/'+user.id}" class="dropdown-item"><i class="fa fa-eye"></i>View</router-link>  <a  href="javascript:void(0)" @click="userUnblock(user.id)" class="dropdown-item" data-toggle="modal" data-target=".block-user"><i class="fa fa-ban"></i>UnBlock</a> <router-link :to="{path:'user-qoutation-log/'+user.id}" class="dropdown-item"><i class="fa fa-clone"></i>Quotation Log</router-link> <router-link :to="{path:'/user-payment-log/'+user.id}" class="dropdown-item"><i class="fa fa-clipboard-list"></i>payment Log</router-link> <router-link :to="{name:'/user-order-log/'+user.id}" class="dropdown-item"><i class="fa fa-clipboard-list"></i>order Log</router-link> </div>
                                                    </div></td>
                                                </tr>
                                            </tbody>
                                            </table>
                                           
                                            <pagination :data="users" @pagination-change-page="getUsers"></pagination>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </section>
                            </div>
                        </div>
                    </div>
        </layout>
    </div>
</template>
<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import Layout from '../../../layout/Layout.vue';
export default {
    name:'BlockUsers',
    components:{Layout,DatePicker},
    data(){
        return{
            from:'',
            to:'',
            users:[],
            entries:10,
        }
    },
        created(){
            let token = localStorage.getItem('token')
            if(token == null){
            this.$router.push('/login');
            this.$toasted.show('Frist you login with your account').goAway(2000);
            }   
        this.getUsers();
        },
        methods:{
            getData:function(){
            try{
            axios({
            url:'/api/users',
            method:'get',
            params:{
            from:this.from,
            to:this.to,
            status:'block-users'
            }
            }).then((response)=>{
            if(response.status == 200){
            this.users = response.data;
            console.warn(response.data)
            }
            })
            }catch(err){
            console.warn(err)
            }
            },
            getUsers(page = 1){
            try{
            axios({
            url:'/api/users?page='+page+'&entries='+this.entries,
            method:'get',
            params:{
            status:'block_users'
            }
            }).then((response)=>{
            if(response.status == 200){
            this.users = response.data;
            console.warn(response.data)
            }
            })

            }catch(err){
            console.warn(err)
            }
            },
        // customFormatter(date) {
        // return moment(date).format('MMMM Do YYYY, h:mm:ss a');
            userUnblock(id){  
            try{
            axios({
            url:'/api/users/'+id,
            method:'put',
            params:{
            status:'unblock'
            }
            }).then((response)=>{
            if(response.status == 200){     
            this.getUsers();
            this.$toasted.success(response.data.message).goAway(2000); 
            }
            })
            }catch(err){
            console.warn(err)
            }
            }
     }
       
}

</script>

<style scoped>
.col-xl-8.text-xl-right a {
    text-decoration: none !important;
}
.content-body {
    margin-top: 4%;
}
</style>