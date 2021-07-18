<template>
    <div>
    <layout>
    <div class="app-content content user-quote-detail">
	<div class="content-wrapper">
		<div class="content-body">
			<section id="configuration">
				<div class="row">
					<div class="col-12">
						<div class="card rounded pad-20">
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">

									<div class="row">
										<div class="col-12">
											<h1><router-link :to="{name: 'user-qoutation-log/'+user.id }"><i class="fa fa-angle-left"></i></router-link></h1>
											<div class="pro-info">
												<img :src="`/uploads/${user.profile}`" class="img-fluid" alt="">
												<h4>User ID: {{user.id}}</h4>
												<h5>{{user.first_name}}</h5>
											</div>
										</div>
									</div>
									<form action="">
										<div class="info-head d-sm-flex justify-content-between mt-5">
											<h6>Package Details</h6>
											<h6>Quotation Id: {{qoutation.id}}</h6>
										</div>
										<div class="info-sec rounded-0">
											<div class="top">
												<div class="row">
													<div class="col-12 text-right">
														<h3>Status: <span class="red">{{qoutation.status}}</span></h3>
														<h3>cost: <span class="gray" v-if="qoutation.status == 'Expired'">{{packege_service_details.quotation_price}}</span>
														<span class="gray" v-if="qoutation.status == 'Cancelled'">{{packege_service_details.quotation_price}}</span>
														<span class="gray" v-if="qoutation.status == 'Recieved'"></span>
														<span class="gray" v-if="qoutation.status == 'Pending'"></span></h3>
													</div>
												</div>
												<div class="row">
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Package Type</label>
														<h6>{{packege_service_details.service_type}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Quantity</label>
														<h6>{{packege_service_details.quantity}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Dimensions Unit</label>
														<h6>{{packege_service_details.dimensions_unit}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Length</label>
														<h6>{{packege_service_details.length}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Width</label>
														<h6>{{packege_service_details.width}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Height</label>
														<h6>{{packege_service_details.height}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Weight Unit</label>
														<h6>{{packege_service_details.weight_unit}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Weight</label>
														<h6>{{packege_service_details.weight}}</h6>
													</div>
												</div>
											</div>
										</div>
										<div class="info-head rounded-0">
											<h6>Pickup Details</h6>
										</div>
										<div class="info-sec rounded-0">
											<div class="top">
												<div class="row">
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Location Type</label>
														<h6>{{pick_drop_details.location_type}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">Company Name</label>
														<h6>{{pick_drop_details.company_name}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Address Line 1</label>
														<h6>{{pick_drop_details.address_line_1}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">Address Line 2</label>
														<h6>{{pick_drop_details.address_line_2}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">City</label>
														<h6>{{pick_drop_details.city}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">county</label>
														<h6>{{pick_drop_details.country}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">PostCode</label>
														<h6>{{pick_drop_details.post_code}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">Country</label>
														<h6>{{pick_drop_details.country}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Contact Number</label>
														<h6>+44 345 6789</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">Reference Number (If applicable)</label>
														<h6>{{pick_drop_details.reference_number}}</h6>
													</div>
												</div>
											</div>
										</div>
										<div class="info-head rounded-0">
											<h6>Drop Off  Details</h6>
										</div>
										<div class="info-sec rounded-0">
											<div class="top">
												<div class="row">
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Location Type </label>
														<h6>{{pick_drop_details.location_type}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">Company Name</label>
														<h6>{{pick_drop_details.company_name}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Address Line 1</label>
														<h6>{{pick_drop_details.address_line_1}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">Address Line 2</label>
														<h6>{{pick_drop_details.address_line_2}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">City</label>
														<h6>{{pick_drop_details.city}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">county</label>
														<h6>{{pick_drop_details.country}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">PostCode</label>
														<h6>{{pick_drop_details.post_code}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">Country</label>
														<h6>{{pick_drop_details.country}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Contact Number</label>
														<h6>{{pick_drop_details.contact_number}}</h6>
													</div>
													<div class="col-12 col-xl-8 col-md-6">
														<label for="">Reference Number (If applicable)</label>
														<h6>{{pick_drop_details.reference_number}}</h6>
													</div>
												</div>
											</div>
										</div>
										<div class="info-head rounded-0">
											<h6>Service Details</h6>
										</div>
										<div class="info-sec">
											<div class="top">
												<div class="row">
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Service Type </label>
														<h6>{{packege_service_details.service_type}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Collection Date</label>
														<h6>{{packege_service_details.collection_date}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Collection Time</label>
														<h6>{{packege_service_details.collection_time}}</h6>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Loading</label>
														<label class="user-quote">Driver required to load<input type="radio" name="radio" value="Driver required to load"><span class="checkmark"></span></label>
														<label class="user-quote">Goods will be loaded<input type="radio" name="radio" value="Goods will be loaded"><span class="checkmark"></span></label>
													</div>
													<div class="col-12 col-xl-4 col-md-6">
														<label for="">Unloading</label>
														<label class="user-quote">Driver required to Unload<input type="radio" name="radio" value="Driver required to Unload"><span class="checkmark"></span></label>
														<label class="user-quote">Goods will be Unloaded<input type="radio" name="radio" value="Goods will be Unloaded"><span class="checkmark"></span></label>
													</div>
												</div>  

												<div class="row" v-if="qoutation.status == 'Pending' || 'Recieved' || 'Cancelled' ">
													<div class="col-12 col-xl-4 col-md-6">
														<p>Quotation Price</p>
														<input type="number" placeholder="Enter Quotation Price" class="form-control">
													</div>
													<div class="col-12 text-center">
														<button type="button" class="yel-btn" data-toggle="modal" data-target=".msg-submit">submit</button>
													</div>
												</div>


											</div>
										</div>
									</form>
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
export default {
    name:'UserQuotationDetails',
    components:{Layout},
	data(){
		return{
			user:'',
			qoutation:'',
			packege_service_details:'',
			pick_drop_details:''
		}
	},
         created(){
			  //alert('done');
			  let token = localStorage.getItem('token')
			  if(token == null){
			  this.$router.push('/login');
			  this.$toasted.show('Frist you login with your account').goAway(2000);
			  }
			   console.log(this.$route.params)
                try{
                axios({
                url:'/api/getQuoatationDetail/?id='+this.$route.params.id,
                method:'get',
                }).then((response)=>{
                if(response.status == 200){	
				this.user = response.data.user
				console.log(response.data);
				console.log(this.user.first_name)
				this.qoutation = response.data.qoutation
				this.packege_service_details = response.data.packege_service_details
				this.pick_drop_details = response.data.pick_drop_details
				console.log(this.pick_drop_details)
                }
                })
                }catch(err){
                console.warn(err)
            }
        }
}
</script>
<style scoped>
.content-body {
    margin-top: 4%;
}
</style>