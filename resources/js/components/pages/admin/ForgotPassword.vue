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
                           <h1>Password Recovery</h1>
                           <form action="" ref="forogtPassword" @submit.prevent="handleSubmit(send)">
                              <div class="row">
                                 <div class="col-12 form-group">
                                    <ValidationProvider
                                       rules="required|email"
                                       name="Email"
                                       v-slot="{ errors }"
                                       >
                                       <input
                                          type="email"
                                          class="form-control"
                                          placeholder="Enter Email Address"
                                          v-model="email"
                                          />
                                       <span class="error">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                    <i class="fa fa-envelope"></i>
                                 </div>
                                 <div class="col-12">
                                    <button type="submit"
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
	name: "ForgotPassword",
	data() {
		return {
		   errors: "",
		   email:"",
		   token: "",
	  	 }
	},
	methods: {
		send(){
		axios({
		url: "/api/forgotPassword",
		method: "get",
        params:{
        email:this.email    
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