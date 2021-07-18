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
                                                                          <span class="error" v-if="errors_exist">{{errors_exist.city[0]}}</span>
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
                                                                        <button type="button" @click="updateProfile(user)" class="yel-btn">update</button>
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
						<!-- <form action="">
							<div class="row mt-3">
								<div class="col-12 form-group">
									<div class="d-sm-flex justify-content-between align-items-center">
										<label for="">Current Password <span class="red-text">*</span></label>
										<input type="password" placeholder="Enter New Password" class="form-control" v-model="currentPass">
										<button type="button" class="view-btn position-absolute"><i class="fa fa-eye-slash"></i> </button>
									</div>
								</div>
								<div class="col-12 form-group">
									<div class="d-sm-flex justify-content-between align-items-center">
										<label for="">New Password <span class="red-text">*</span></label>
										<input type="password" placeholder="Enter New Password" class="form-control" v-model="newPass">
										<button type="button" class="view-btn position-absolute"><i class="fa fa-eye-slash"></i> </button>
									</div>
								</div>
								<div class="col-12 form-group">
									<div class="d-sm-flex justify-content-between align-items-center">
										<label for="">Confirm Password <span class="red-text">*</span></label>
										<input type="password" placeholder="Enter New Password" class="form-control" v-model="confirmPass">
										<button type="button" class="view-btn position-absolute"><i class="fa fa-eye-slash"></i> </button>
									</div>
								</div>
                                <div class="col-12 text-center">
                                <button type="button" class="yel-btn" data-dismiss="modal" aria-label="Close" @click="UpdatePass">update</button>
                                </div>
                            </div>
						</form> -->
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
import { ValidationProvider, ValidationObserver } from 'vee-validate';
import moment from 'moment';
export default {
    name:'EditProfile',
    components:{Layout,ValidationProvider,ValidationObserver},
    data(){
        return{
            user:'',
            id:'',
            first_name:'',
            last_name:'',
            email:'',
            phone_no:'',
            address:'',
            city:'',
            country:'',
            post_code:'',
            profile:'',
            // currantPass:'',
            // newPass:'',
            // confirmPass:'',
            errors_exist:''
        }
    },
    created(){
        let token = localStorage.getItem('token')
        if(token == null){
        this.$router.push('/login');
        this.$toasted.show('Frist you login with your account').goAway(2000);
        } 
        this.editProfile()
    },

    methods:{
        dateFormat : function (date) {
        return moment(date, 'YYYY-MM-DD').format("MMM Do YY");
        },
         editProfile(){
            axios({
            url:'/api/users/'+this.$route.params.id+'/edit',
            method:'get',  
            }).then((response)=>{
            this.user = response.data
            }).catch((err)=>{
            this.$toasted.error(err)    
            })
            },
         setImage: function (event) {
                // alert('done')
                this.profile = event.target.files[0];
                console.log(this.user);
            },
       async  updateProfile(user){
            let fd = new FormData();
                fd.append('_method', 'PUT');
                fd.append('id',user.id);
                fd.append('first_name',user.first_name);
                fd.append('last_name',user.last_name);
                fd.append('email',user.email);
                fd.append('phone_no',user.phone_no);
                fd.append('address',user.address);
                fd.append('country',user.country);
                fd.append('city',user.city);
                fd.append('post_code',user.post_code);
                fd.append('profile',this.profile);
                let response = await axios.post('/api/updateProfile/'+user.id,fd)
                .then((response)=>{
                this.$toasted.success(response.data.message).goAway(2000)  
                this.$router.push('/admin/profile')
                }).
                catch((err)=>{
                this.errors_exist = err.response.data.errors 
                console.log(this.errors_exist.city[0])  
                this.$toasted.error(response.data.message).goAway(2000)        
                })
                 
            
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