<template>
    <div>
        <layout>
            <div class="app-content content Quotation-log">
                    <div class="content-wrapper">
                        <div class="content-body">
                            <!-- Basic form layout section start -->
                            <section id="configuration">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card rounded pad-20">
                                            <div class="card-content collapse show">
                                                <div class="card-body card-dashboard">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h1><a href="users.php"><i class="fa fa-angle-left"></i>User QUOTATION LOG Listing</a></h1>
                                                            <div class="pro-info">
                                                                <img :src="`/uploads/${user.profile}`" class="img-fluid" alt="">
                                                                <br>
                                                                <h5>{{user.id}}</h5>
                                                                <h5>{{user.first_name}}</h5>
                                                            </div>
                                                            <div class="quot-head">
                                                                <h6>Quotation Log</h6>
                                                            </div>
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
                                                            &nbsp; &nbsp;<button class="btn btn-success" @click="getData()">Apply</button>
                                                        </div>
                                                         <div class="col-xl-4 col-lg-6 col-md-10 col-12">
                                                        Search Here: <input type="text" v-model="search" class="form-control" @change="getSearches">
                                                    </div>
                                                    </div> 
                                                    <div class="clearfix"></div>
                                                    <div class="maain-tabble table-responsive">
                                                          <table class="table">
                                                            <thead>
                                                                <tr class="text-center">
                                                                <th>S.No</th>
                                                                <th>QUOTATION Id</th>
                                                                <th>Date</th>
                                                                <th>Time</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                    
                                                            <tr class="text-center" :key="qoute.id" v-for="(qoute, index) in qoutations.data">
                                                            <td>{{++index}}</td>
                                                            <td>{{qoute.id}}</td>
                                                            <td>{{dateFormat(qoute.date)}}</td>
                                                            <td>{{qoute.time}}</td>
                                                            <td v-if="qoute.status == 'Recieved' " v-bind:style="{'color':'green','font-weight':'bolder'}">Recieved</td>
                                                            <td v-if="qoute.status == 'Expired' " v-bind:style="{'color':'red','font-weight':'bolder'}">Expired</td>
                                                            <td v-if="qoute.status == 'Pending' " v-bind:style="{'color':'orange','font-weight':'bolder'}">Pending</td>
                                                            <td v-if="qoute.status == 'Cancelled' " v-bind:style="{'color':'red','font-weight':'bolder'}">Cancelled</td>
                                                            <td><div class="btn-group mr-1 mb-1">
                                                                
                                                                <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button>
                                                                <div class="dropdown-menu"> <router-link :to="{path: '/admin/user-qoutation-detail/'+qoute.id }" class="dropdown-item"><i class="fa fa-eye"></i>View</router-link> </div>
                                                                </div></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <pagination :data="qoutations" @pagination-change-page="getUserQoute"></pagination>
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
import moment from 'moment';
import Layout from '../../../layout/Layout.vue';
export default {
    name:'UserQuotationLog',
    components:{Layout,DatePicker},
    data(){
            return{
                user:'',
                qoutations:'',
                id:'',
                entries:10,
                status:'getUserQuatation',
                from:'',
                to:'' ,       
                }
        },
    created(){
                //alert('working')
                this.getUserQoute();
                let token = localStorage.getItem('token')
                if(token == null){
                this.$router.push('/login');
                this.$toasted.show('Frist you login with your account').goAway(2000);
                }

                this.getSearches();
            },
    methods:{

            getSearches(){
                //alert(this.search)    
                axios({
                url:'/api/getSearches',
                method:'get',
                params:{
                search:this.search,
                id:this.$route.params.id     
                }
                }).then((response)=>{
                if(response.status == 200){
                if(this.search == ""){
                this.getUserQoute();    
                }
                this.qoutations = response.data;        
                }
                }) 
                },
           
           dateFormat : function (date) {
                return moment(date, 'YYYY-MM-DD').format("MMM Do YY");
                },
            getUserQoute(page =1){
                try{
                axios({
                url:'/api/users/'+this.$route.params.id+'?page='+page,
                method:'get',
                params:{
                entries:10,
                status:this.status,
                }
                }).then((response)=>{
                if(response.status == 200){
                console.log(response.data)
                this.user       = response.data.user[0] 
                this.qoutations = response.data.user_qoutation
                this.id  = this.qoutations.data[0].id;       
                }
                })
                }catch(err){
                console.warn(err)
                }    
                },

                getData:function(){  
                try{
                axios({
                url:'/api/users',
                method:'get',
                params:{
                from:this.from,
                to:this.to,
                status:'user-qoute-filter',
                id:this.$route.params.id
                }
                }).then((response)=>{
                if(response.status == 200){
                console.log(response.data)
                this.qoutations = response.data;         
                }
                })
                }catch(err){
                console.warn(err)
                }
                },
            },
       
}
</script>
<style scoped>
.content-body {
    margin-top: 4%;
}
</style>