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
                <h1>Login to Your Account</h1>
				<ValidationObserver ref="form">

			    <form @click.stop.prevent="SignIn">
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
                          v-model="formData.email"
                        />
                        <span class="error">{{ errors[0] }}</span>
                      </ValidationProvider>
                      <i class="fa fa-envelope"></i>
                    </div>
                    <div class="col-12 form-group position-relative">
                      <ValidationProvider
                        rules="required"
                        name="Password"
                        v-slot="{ errors }"
                      >
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Enter Password"
                          v-model="formData.password"
                        />
                        <span class="error">{{ errors[0] }}</span>
                      </ValidationProvider>
                      <i class="fa fa-lock"></i>
                      <button type="button" class="view-btn position-absolute">
                        <i class="fa fa-eye-slash"></i>
                      </button>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="">
                      <label class="login-check"
                        >Remember Me
                        <input type="checkbox" />
                        <span class="checkmark"></span
                      ></label>
                    </div>
                    <div class="">
                      <router-link :to="{path:'/forgot-password'}"
                        class="forgot"
                      >
                        Forgot Password?</router-link>
                    </div>
                  </div>
                  <button type="submit" class="yel-btn">login</button>
                  <div class="col-12 text-center">
                    <a href="#" class="back"
                      ><i class="fa fa-arrow-left"></i>back to website</a
                    >
                  </div>
                </form>
	           </ValidationObserver>
            
                <!--login modal start here-->

                <!-- Modal -->
                <div
                  class="modal fade modal-1"
                  id="exampleModalCenter"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true"
                >
                  <div
                    class="modal-dialog modal-dialog-centered"
                    role="document"
                  >
                    <div class="modal-content">
                      <div class="forget-pass">
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-label="Close"
                        >
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                          <h1>Password Recovery</h1>
                          <form action="">
                            <div class="row">
                              <div class="col-12 form-group">
                                <input
                                  type="text"
                                  placeholder="Enter Email Address"
                                  class="form-control"
                                />
                                <i class="fa fa-envelope"></i>
                              </div>
                              <div class="col-12">
                                <button
                                  type="button"
                                  class="form-control yel-btn"
                                  id="cont"
                                >
                                  Continue
                                </button>
                              </div>
                              <a
                                href="#"
                                data-dismiss="modal"
                                aria-label="Close"
                                ><i class="fa fa-arrow-left"></i> back to
                                login</a
                              >
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--login modal end here-->

                <!--forgot step 2 start here-->

                <!-- Button trigger modal -->

                <!-- Modal -->
                <div
                  class="modal fade modal-2"
                  id="exampleModal"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div
                    class="modal-dialog modal-dialog-centered"
                    role="document"
                  >
                    <div class="modal-content">
                      <div class="forget-pass">
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-label="Close"
                        >
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                          <h1>Password Recovery</h1>
                          <form action="">
                            <div class="row">
                              <div class="col-12 form-group">
                                <input
                                  type="number"
                                  placeholder="Enter verification code"
                                  class="form-control"
                                />
                                <i class="fas fa-pencil-alt"></i>
                              </div>
                              <div class="col-12 text-right">
                                <button type="button" class="code-txt">
                                  Didn’t Receive Code? Send it Again
                                </button>
                              </div>
                              <div class="col-12">
                                <button
                                  type="button"
                                  class="form-control yel-btn"
                                  id="count-2"
                                >
                                  Continue
                                </button>
                              </div>
                              <a
                                href="#"
                                data-dismiss="modal"
                                aria-label="Close"
                                ><i class="fa fa-arrow-left"></i> back to
                                login</a
                              >
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
                <div
                  class="modal fade modal-3"
                  id="password-modal"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div
                    class="modal-dialog modal-dialog-centered"
                    role="document"
                  >
                    <div class="modal-content">
                      <div class="forget-pass">
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-label="Close"
                        >
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                          <h1>Password Recovery</h1>
                          <form action="">
                            <div class="row">
                              <div class="col-12 form-group">
                                <input
                                  type="password"
                                  placeholder="Enter New Password"
                                  class="form-control"
                                />
                                <i class="fas fa-lock"></i>
                                <button
                                  type="button"
                                  class="view-btn position-absolute"
                                >
                                  <i class="fa fa-eye-slash"></i>
                                </button>
                              </div>
                              <div class="col-12 form-group">
                                <input
                                  type="password"
                                  placeholder="Retype Password"
                                  class="form-control"
                                />
                                <i class="fas fa-lock"></i>
                                <button
                                  type="button"
                                  class="view-btn position-absolute"
                                >
                                  <i class="fa fa-eye-slash"></i>
                                </button>
                              </div>
                              <div class="col-12">
                                <button
                                  type="button"
                                  class="form-control yel-btn"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                >
                                  Update
                                </button>
                              </div>
                              <a
                                href="#"
                                data-dismiss="modal"
                                aria-label="Close"
                                ><i class="fa fa-arrow-left"></i> back to
                                login</a
                              >
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--forgot step 2 end here-->
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
	name: "Login",
	data() {
		return {
		   errors: "",
		   formData: {
			 email: "",
			 password: "",
		   },
		   token: "",
	  	 }
	},
	methods: {
		SignIn() {
		this.$refs.form.validate().then((success) => {
		if(success){
		axios({
		url: "/api/login",
		method: "post",
		data: this.formData,
		})
		.then((response) => {
		localStorage.setItem("user", response.data.user);
		localStorage.setItem("token", this.token);
		this.$router.push("/admin/dashboard");
		})
		.catch((err) => {
		this.$toasted.error(err.response.data.message).goAway(2000);
		});
		}
		});
		},
	},
	};
</script>
<style scoped>
.error {
  color: red;
}
.content-body {
    margin-top: 4%;
}
</style>