<template>
 <div>
     <layout>
            <div class="app-content content resi-profile">
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
											<h1><router-link :to="{name:'users'}"><i class="fa fa-angle-left"></i>Back</router-link></h1>
										</div>
									</div>
									<div class="info-head d-sm-flex justify-content-between">
										<h6>Personal Information</h6>
										<h6>{{user.id}}</h6>
									</div>
									<div class="info-sec">
										<div class="top">
											<div class="row">
												<div class="col-12 text-center">
													<div class="attached">
														<img :src="`/uploads/${user.profile}`" class="img-fluid" alt="image">
														
													</div>
												</div>
												<div class="col-12 text-right">
													<h3>Registration Date :</h3>
													<h2>{{dateFormat(user.reg_date)}}</h2>
												</div>
											</div>
											<div class="row">
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">first name</label>
													<h6>{{user.first_name}}</h6>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">last name</label>
													<h6>{{user.last_name}}</h6>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">Phone Number</label>
													<h6>{{user.phone_no}}</h6>
												</div>
												<div class="col-12">
													<h4>Billing Address</h4>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">Address</label>
													<h6>{{user.address}}</h6>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">City</label>
													<h6>{{user.city}}</h6>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">County</label>
													<h6>{{user.country}}</h6>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">Postcode</label>
													<h6>{{user.post_code}}</h6>
												</div>
											
											</div>
										</div>
										<div class="bottom">
											<div class="row">
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">email address</label>
													<h6>{{user.email}}</h6>
												</div>

											</div>
										</div>
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
import moment from 'moment';
export default {
    name:'ViewProfile',
    components:{Layout},
    data(){
        return{
            user:null,
            id:null,
        }
    },
    created(){
		let token = localStorage.getItem('token')
        if(token == null){
        this.$router.push('/login');
        this.$toasted.show('Frist you login with your account').goAway(2000);
        }
		try{
            //this.id = this.$route.params.id;
            axios({
                url:'/api/users/'+this.$route.params.id,
                method:'get',
            }).then((response)=>{
                if(response.status == 200){
					//alert('working');
                    this.user = response.data;
                }
            })
        }catch(err){
            console.warn(err)
        }
      },
	  methods:{
		 dateFormat : function (date) {
         return moment(date, 'YYYY-MM-DD').format("MMM Do YY");
         },
	  }

}


</script>
<style scoped>
.content-body {
    margin-top: 4%;
}
</style>