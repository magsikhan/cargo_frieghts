<template>
    <div>
        <layout>
    <div class="app-content content payment-log">
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
											<div class="col-12 col-xl-4">
                                                <h1>
                                               Order Log
                                                </h1>
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
												<tr>
													<th>s.no</th>
													<th>Order ID</th>
													<th>Date</th>
													<th>Time</th>
													<th>Status</th> 
                                                    <th>Action</th> 
												</tr>
											</thead>
											<tbody>
											<tr v-for="(order, index) in orders">
                                                <td>{{++index}}</td>
                                                <td>{{order.id}}</td>
                                                <td>{{order.date}}</td>
                                                <td>{{order.time}}</td>
                                                <td v-if="order.status == 'Completed' "   v-bind:style="{'color':'green'}">Completed</td>
                                                <td v-if="order.status == 'Pending' "     v-bind:style="{'color':'orange'}">Pending</td>
                                                <td v-if="order.status == 'Inprocess' " v-bind:style="{'color':'yellow'}">In Proccess</td>

                                                <td><div class="btn-group mr-1 mb-1">
                                                <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu"> <router-link :to="{path:'/user-order-log-details/'+order.id}" class="dropdown-item"><i class="fa fa-eye"></i>View</router-link> </div>
                                                </div></td>
                                            </tr>
											</tbody>
										</table>
                                       <pagination :data="orders" @pagination-change-page="getUserOrderLog"></pagination>
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
export default {
    name:'OrderLog',
    components:{Layout,DatePicker},
            data(){
            return{
                user:'',
                orders:{},
                id:'',
                from:'',
                to:''        
                }
        },
            created(){
                this.getUserOrderLog()
            },
            methods:{
                getUserOrderLog(page =1){
                try{
                axios({
                url:'/api/getUserOrderLog?page='+page,
                method:'get',
                params:{
                id:this.$route.params.id,
                entries:10,
				status:'order-log'    
                }    
                }).then((response)=>{
                if(response.status == 200){
                this.orders = response.data.data 
				console.log(this.orders)       
                }
                })
                }catch(err){
                console.log(err)
                }    
                },
                getData:function(page =1){
                try{
                axios({
                url:'/api/getUserOrderLog?page='+page,
                method:'get',
                params:{
                from:this.from,
                to:this.to,
                status:'order-filter'
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
              }
            }
    }

</script>
<style scoped>
.content-body {
    margin-top: 4%;
}
</style>