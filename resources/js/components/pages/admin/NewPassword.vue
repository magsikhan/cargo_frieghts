<template>
   <div>
      <section class="login-main">
         <div class="container">
            <div class="login-inner">
               <div class="row align-items-center">
                  <div class="col-lg-6 col-12">
                     <div class="left">
                        <img src="/../images/login.png" class="img-fluid" alt="" />
                     </div>
                  </div>
                  <div class="col-lg-6 col-12">
                     <div class="right">
                        <img
                           src="/../images/login-login-logo.png"
                           class="img-fluid"
                           alt=""
                           />
                        <ValidationObserver ref="form" v-slot="{handleSubmit}">
                         <h1>Create New Password</h1>
                          <form action="" ref="chnagePassword" @submit.prevent="handleSubmit(changePassword)">
                            <div class="row">
                    <div class="col-12 form-group position-relative">
                      <ValidationProvider
                        rules="required"
                        name="Change Password"
                        v-slot="{ errors }"
                      >
                        <input
                          type="email"
                          class="form-control"
                          placeholder="Enter Your Email"
                          v-model="email"
                          name="change_password"
                        />
                        <span class="error">{{ errors[0] }}</span>
                      </ValidationProvider>
                       <i class="fa fa-envelope"></i>
                      <button type="button" class="view-btn position-absolute">
                       
                      </button>
                    </div>      
                      <div class="col-12 form-group position-relative">
                      <ValidationProvider
                        rules="required"
                        name="New Password"
                        v-slot="{ errors }"
                      >
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Enter New Password"
                          v-model="newPassword"
                          name="new_password"
                        />
                        <span class="error">{{ errors[0] }}</span>
                      </ValidationProvider>
                      <i class="fa fa-lock"></i>
                      <button type="button" class="view-btn position-absolute">
                        <i class="fa fa-eye-slash"></i>
                      </button>
                    </div>    
                              <div class="col-12">
                                <button
                                  type="submit"
                                  class="yel-btn"
                                  
                                >
                                  Continue
                                </button>
                              </div>
                              <div class="col-12 text-center">
                                    <router-link :to="{path:'/login/admin'}" class="back"
                                       ><i class="fa fa-arrow-left"></i>back to website</router-link
                                       >
                                 </div>
                            </div>
                          </form>
                        </ValidationObserver>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</template>
<script>
	export default {
	name: "NewPassword",
	data() {
		return {
		   errors: "",
		   email:"",
           newPassword:"",
		   token: "",
	  	 }
	},
	methods: {
		changePassword(){
		axios({
		url: "/api/changePassword",
		method: "post",
        data:{
        email:this.email,
        newPass:this.newPassword   
        }
		}).then((response) => {
        this.$toasted.success(response.data.message).goAway(2000);  
		  }).catch((err) => {
		  this.$toasted.error(err.response.data.message).goAway(2000);
		  })
		 }
		
      }

	}
</script>
<style scoped>
.error {
  color: red;
}
.content-body {
    margin-top: 4%;
}
</style>