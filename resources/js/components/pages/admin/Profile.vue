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
									<div class="row align-items-center">
										<div class="col-sm-6">
											<h1 class="yellow-text">Profile</h1>
										</div>
										<div class="col-sm-6 pb-2 pb-sm-0">
											<div class="attached">
												<img :src="`/uploads/${user.profile}`" class="img-fluid" alt="">
												<!-- <button type="button" name="file" class="camera-btn" onclick="document.getElementById('upload').click()"><i class="fa fa-camera"></i></button> -->
												<input type="file" id="upload" name="file">
											</div>
										</div>
									</div>
									<div class="info-head">
										<h6>Personal Information</h6>
									</div>
									<div class="info-sec">
										<div class="top">
											<div class="row">
												<div class="col-12 text-center">
												</div>
												<div class="col-12 text-right">
													<a href="#_" data-toggle="modal" data-target=".modal-4" class="blue-btn px-2 mr-1">Change Password</a>
													<router-link :to="{path:'/admin/edit-profile/'+user.id}" class="yel-btn px-5">Edit</router-link>
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
											</div>
											<div class="row pb-2">
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">Email Address</label>
													<h6>{{user.email}}</h6>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">Phone Number</label>
													<h6>{{user.phone_no}}</h6>
												</div>
											</div>
										</div>
										<div class="info-head info-head-2">
											<h6>Personal Information</h6>
										</div>
										<div class="top">
											<div class="row">
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">Address</label>
													<h6>{{user.address}}</h6>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">City</label>
													<h6>{{user.city}}</h6>
												</div>
											</div>
											<div class="row pb-2">
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">County</label>
													<h6>{{user.country}}</h6>
												</div>
												<div class="col-12 col-xl-4 col-md-6">
													<label for="">Postcode</label>
													<h6>{{user.post_code}}</h6>
												</div>
												<div class="col-12">
													<label for="">Country</label>
													<h6>{{user.country}}</h6>
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

<div class="modal fade modal-4" id="password-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="forget-pass pt-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					<div class="modal-body">
						<h1 class="text-center">Change Password</h1>
						<form action="">
							<div class="row mt-3">
								<div class="col-12 form-group">
									<div class="d-sm-flex justify-content-between align-items-center">
                                        <label for="">Current Password <span class="red-text">*</span></label>
										<input type="password" placeholder="Enter Current Password" class="form-control" @change="checkPass" v-model="currantPassword">
										<button type="button" class="view-btn position-absolute"><i class="fa fa-eye-slash"></i> </button>
                                        <span v-bind:style="{'color':'red','font-size':'10px'}" v-if="checkPassErr">{{checkPassErr}}</span>
									</div>
								</div>
								<div class="col-12 form-group">
									<div class="d-sm-flex justify-content-between align-items-center">
										<label for="">New Password <span class="red-text">*</span></label>
										<input type="password" placeholder="Enter New Password" class="form-control" v-model="newPassword">
										<button type="button" class="view-btn position-absolute"><i class="fa fa-eye-slash"></i> </button>
									</div>
								</div>
								<div class="col-12 form-group">
									<div class="d-sm-flex justify-content-between align-items-center">
										<label for="">Confirm Password <span class="red-text">*</span></label>
										<input type="password" placeholder="Enter New Password" class="form-control" v-model="confirmPassword">
										<button type="button" class="view-btn position-absolute"><i class="fa fa-eye-slash"></i> </button>
									</div>
								</div>
								<div class="col-12 text-center">
									<button type="button" class="yel-btn" data-dismiss="modal" aria-label="Close" @click="changePass(user.id)"> Update  </button>
								</div>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
        </layout>
    </div>
</template>
<script>
import Layout from '../../../layout/Layout.vue';
export default {
    name:'Profile',
    data(){
        return{
            user:'',
            id:'',
            checkCurrantPass:'',
            currantPassword:'',
            newPassword:'',
            confirmPassword:'',
            checkPassErr:''
        }
    },
    created(){
    this.viewProfile()
     let token = localStorage.getItem('token')
        if(token == null){
        this.$router.push('/login');
        this.$toasted.show('Frist you login with your account').goAway(2000);
        }
    },
    components:{Layout},
    methods:{
        checkPass(){
        try{
        axios({
        url:'/api/checkPass?id='+this.id,
        method:'post',
        params:{
        password:this.currantPassword 
        }   
        }).then((response)=>{
        if(response.status == 200){ 
        //alert(response.data.currantPass)  
        this.checkCurrantPass = response.data 
        //alert(this.checkCurrantPass)
        this.checkPassErr = response.data.message
        }    
        })    
        }catch(err){
        console.log(err)    
        }     
        },
        viewProfile(){   
        this.id = localStorage.getItem('user')    
        try{
        axios({
        url:'/api/viewProfile?id='+this.id,
        method:'get',    
        }).then((response)=>{
        if(response.status == 200){
        //alert(response.data)    
        console.log(response.data)    
        this.user = response.data
        }    
        })    
        }catch(err){
        console.log(err)    
        }    
        },
        changePass(id){    
        if(this.currantPassword != this.checkCurrantPass){
         return this.$toasted.error('Currant Password Not Match Try Again Letter').goAway(2000)
        }
        else if(!this.currantPassword && !this.newPassword && !this.confirmPassword){
            return  this.$toasted.error('Something is wrong').goAway(2000)
        }    
        else{
        try{
        axios({
        url:'/api/changePass',
        method:'post',  
        data:{
        id:id,
        password:this.confirmPassword
        }  
        }).then((response)=>{
        if(response.status == 200){
        this.currantPassword = null
        this.newPassword = null
        this.confirmPassword = null    
        console.log(response.data) 
        this.$toasted.success(response.data.message).goAway(2000);   
        }    
        })    
        }catch(err){
        console.log(err)    
        }
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