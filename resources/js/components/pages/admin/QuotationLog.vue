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
                                          <div class="col-12">
                                             <h1 class="yellow-text">Quotation Log</h1>
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
                                                &nbsp; &nbsp;<button class="btn btn-success" @click="getData">Apply</button>
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
                    
                                                            <tr class="text-center" v-for="(qoute, index) in quatations">
                                                            <td>{{++index}}</td>
                                                            <td>{{qoute.id}}</td>
                                                            <td>{{qoute.date}}</td>
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
                                                        <pagination :data="quatations" @pagination-change-page="getUserQoute"></pagination>
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
import Layout from '../../../layout/Layout.vue';
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
export default {
    name:'QuotationLog',
    components:{Layout,DatePicker},
    data(){
    return{
    quatations:[], 
    to:'',
    from:''  
    }   
    },
    created(){
        let token = localStorage.getItem('token')
        if(token == null){
        this.$router.push('/login');
        this.$toasted.success('Frist you login with your account').goAway(2000);
        }  
        this.getQuatation() 
    },
    methods:{
    async getQuatation(){
    try{
    let response = await axios.get('/api/getQuations/')
    if(response.data){
    this.quatations = response.data
    console.log(this.quatations)  
    }   
    }catch(err){
    console.log(err);   
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
                status:'user-qoute-filter'
                }
                }).then((response)=>{
                if(response.status == 200){
                console.log(response.data)
                this.users = response.data;         
                }
                })
                }catch(err){
                console.warn(err)
                }
                },   
    }
}
</script>
<style scoped>
.content-body {
    margin-top: 4%;
}
</style>