<template>
 <div>
     <layout>
            <div class="app-content content edit-res">
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
                                                            <h1><a href="users.php"><i class="fa fa-angle-left"></i>Edit Profile</a></h1>
                                                        </div>
                                                    </div>
                                                    <div class="info-head d-sm-flex justify-content-between">
                                                        <h6>Personal Information</h6>
                                                        <h6>{{user.id}}</h6>
                                                    </div>
                                                    <div class="info-sec">
                                                        <ValidationObserver>
                                                        <form action="" ref="editForm"  enctype="multipart/form-data">
                                                            <div class="top">
                                                                <div class="row">
                                                                    <div class="col-12 text-center">
                                                                        <div class="attached"> <img :src="`/uploads/${user.profile}`" class="img-fluid" alt="">
                                                                            <button type="button" name="file" class="camera-btn" onclick="document.getElementById('upload').click()"><i class="fa fa-camera"></i></button>
                                                                            Change Profile <input type="file" accept="image/*" id="upload" @change="setImage($event)">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 text-right">
                                                                        <h3>Registration Date :</h3>
                                                                        <h2>{{dateFormat(user.reg_date)}}</h2>
                                                                        <button type="button" class="change-pass" data-toggle="modal" data-target=".modal-4">change password</button>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">first name*</label>
                                                                                 <ValidationProvider rules="required" name="First Name" v-slot="{errors}">
                                                                            <input type="text"  class="w-100" v-model="user.first_name">
                                                                            <span class="error">{{errors[0]}}</span>
                                                                                </ValidationProvider>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.first_name[0]}}</span>
                                                                           </div>
                                                                        
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">last name*</label>
                                                                            <input type="text"  class="w-100" v-model="user.last_name">
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Phone Number*</label>
                                                                              <ValidationProvider rules="required" name="Phone No" v-slot="{errors}">
                                                                             <input type="number" class="phone-no"  v-model="user.phone_no">
                                                                             <br />
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                        <span v-if="errors_exist" class="error">{{errors_exist.phone_no[0]}}</span>

                                                                        </div>
 
                                                                    <div class="col-12">
                                                                        <h4>Billing Address</h4>
                                                                    </div>


                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Address*</label>
                                                                              <ValidationProvider rules="required" name="Address" v-slot="{errors }">
                                                                            <input type="text" name="" placeholder="Abc street 123 road"  class="w-100" v-model="user.address">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">City*</label>
                                                                               <ValidationProvider rules="required" name="City" v-slot="{errors }">
                                                                            <input type="text" name="" placeholder="Abc" class="w-100" v-model="user.city">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">County*</label>
                                                                             <ValidationProvider rules="required" name="Country" v-slot="{errors }">
                                                                            <input type="text" name="" placeholder="Abc" class="w-100"   v-model="user.country">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Postcode*</label>
                                                                             <ValidationProvider rules="required" name="Post Code" v-slot="{ errors }">
                                                                            <input type="text" name=""  class="w-100" v-model="user.post_code">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                        </div>  

                                                                         <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Email*</label>
                                                                             <ValidationProvider rules="required" name="Email" v-slot="{ errors }">
                                                                            <input type="email" name="" placeholder="01234" class="w-100"  v-model="user.email">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                        </div>      
                                        
                                                                </div>
                                                            </div>

                                                            <div class="bottom">
                                                                <div class="row">
                            
                                                                    <div class="col-12 text-center">
                                                                        <button type="button" class="yel-btn" @click="update(user)">update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </ValidationObserver>
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
										<input type="password" placeholder="Enter New Password" class="form-control" @change="checkPass" v-model="currantPassword">
										<button type="button" class="view-btn position-absolute"><i class="fa fa-eye-slash"></i> </button>
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
                                <button type="button" class="yel-btn" data-dismiss="modal" aria-label="Close" @click="changePass(user.id)">update</button>
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
import moment from 'moment';
import { ValidationProvider, ValidationObserver } from 'vee-validate';
export default {
    name:'EditUser',
    components:{Layout,ValidationProvider,ValidationObserver},
    data(){
        return{
            user:'',
            id:'',
            first_name:'',
            last_name:'',
            phone_no:'',
            address:'',
            city:'',
            country:'',
            post_code:'',
            profile:'',
            checkCurrantPass:'',
            currantPassword:'',
            newPassword:'',
            confirmPassword:'',
            checkPassErr:'',
            errors_exist:''
        }
    },
        created(){
            let token = localStorage.getItem('token')
            if(token == null){
            this.$router.push('/login');
            this.$toasted.error('Frist you login with your account').goAway(2000);
            } 
            try{
                //this.id = this.$route.params.id;
                axios({
                url:'/api/users/'+this.$route.params.id+'/edit',
                method:'get',  
                }).then((response)=>{
                if(response.status == 200){
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
            setImage: function (event) {
            this.profile = event.target.files[0];
            console.log(this.user);
            },
            checkPass(){
            this.id = localStorage.getItem('user')    
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
            update(user) {
                let fd = new FormData();
                fd.append('_method', 'PUT');
                fd.append('first_name',user.first_name);
                fd.append('last_name',user.last_name);
                fd.append('email',user.email);
                fd.append('phone_no',user.phone_no);
                fd.append('address',user.address);
                fd.append('country',user.country);
                fd.append('city',user.city);
                fd.append('post_code',user.post_code);
                fd.append('profile',this.profile);
                axios({
                url:'/api/users/'+user.id,
                method:'post',
                data:fd    
                }).then((response =>{
                this.$toasted.success(response.data.message).goAway(2000)
                this.$router.push('/admin/users')   
                })).catch((err)=>{
                thi.$toasted.error(err)    
                })
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
.error{
    color:red
}
.content-body {
    margin-top: 4%;
}
</style>