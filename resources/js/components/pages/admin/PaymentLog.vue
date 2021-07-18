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
											<h1><a><i class="fa fa-angle-left"></i>Payment Log</a></h1>
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
													<th>Payment Date</th>
													<th>Charges</th>
													<th>Status</th> 
                                                    <th>Action</th> 
												</tr>
											</thead>
											<tbody>
											<tr v-for="(payment, index) in payments">
                                                <td>{{++index}}</td>
                                                <td>{{payment.order_id}}</td>
                                                <td>{{payment.payment_date}}</td>
                                                <td>{{payment.charges}}</td>
                                                <td v-if="payment.status == 'Paid'" v-bind:style="{'color':'green'}">Paid</td>
                                                <td v-if="payment.status == 'Unpaid'" v-bind:style="{'color':'red'}">Unpaid</td>
                                                <td><div class="btn-group mr-1 mb-1">
                                                <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu"> <router-link :to="{path:'/admin/user-payment-detail/'+payment.id}" class="dropdown-item"><i class="fa fa-eye"></i>View</router-link> </div>
                                                </div></td>
                                            </tr>
											</tbody>
										</table>
                                       <pagination :data="payments" @pagination-change-page="getUserPaymentLog"></pagination>
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
    name:'PaymentLog',
    components:{Layout,DatePicker},
        data(){
        return{
            user:'',
            payments:{},
            id:'',
            from:'',
            to:''        
            }
    },
    created(){
        //alert(this.$route.params.id);
        this.getUserPaymentLog()
    },
    methods:{
        getUserPaymentLog(page =1){
        try{
        axios({
        url:'/api/getUserPaymentLog?page='+page,
        method:'get',
        params:{
        id:this.$route.params.id,
        entries:10,
        status:'payment-log'    
        }    
        }).then((response)=>{
        if(response.status == 200){
        this.payments = response.data.data   
        console.log(this.payments, '==========');
        }
        })
        }catch(err){
        console.log(err)
        }    
        },
        getData:function(page =1){
        try{
        axios({
        url:'/api/getUserPaymentLog?page='+page,
        method:'get',
        params:{
        from:this.from,
        to:this.to,
        status:'payment-filter'
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