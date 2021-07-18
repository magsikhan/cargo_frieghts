<template>
    <div>
            <layout>
                <div class="app-content content add-busniess">
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
                                                                <h1><a><i class="fa fa-angle-left"></i>Add User</a></h1>
                                                            </div>
                                                        </div>
                                                        <div class="info-head">
                                                            <h6>Business Information</h6>
                                                        </div>
                                                        <div class="info-sec">
                                                            <ValidationObserver v-slot="{ handleSubmit }">
                                                                <form ref="form"
                                                                @submit.prevent="handleSubmit(create)">
                                                                <div class="top">
                                                                    <div class="row">
                                                                        <div class="col-12 text-center">
                                                                            <div class="attached">
                                                                                 Select Profile:   
                                                                                <input type="file" accept="image/*" @change="setImage" id="file-input">
                                                                            <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.profile[0]}}</span>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">  
                                                                         <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">first name*</label>
                                                                                 <ValidationProvider rules="required" name="First Name" v-slot="{errors}">
                                                                            <input type="text" name="First Name" placeholder="Enter First Name" class="w-100" v-model="first_name">
                                                                            <span class="error">{{errors[0]}}</span>
                                                                                </ValidationProvider>
                                                                             <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.first_name == errors_exist.first_name ? errors_exist.first_name[0] : " "}}</span>
                                                                            </div>    
                                                                           </div>
                                                                          
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">last name</label>
                                                                            <input type="text" placeholder="Enter Last Name" class="w-100" v-model="last_name">
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Phone Number*</label>
                                                                              <ValidationProvider rules="required" name="Phone No" v-slot="{ errors }">
                                                                             <input type="number" class="phone-no" placeholder="+1"  v-model="phone_no">
                                                                             <br />
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                             <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.phone_no[0]}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Company Number</label>
                                                                            <input type="number" placeholder="Enter Company Number" class="w-100" v-model="company_no">
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Company*</label>
                                                                             <ValidationProvider rules="required" name="Company Name" v-slot="{errors }">
                                                                            <input type="text" placeholder="Enter Company Name"  class="w-100" v-model="company">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                            <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.company[0]}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">VAT Number (If Applicable)</label>
                                                                            <input type="number" placeholder="Enter VAT Number" class="w-100" v-model="vat_no">  
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Account Department's Email*</label>
                                                                             <ValidationProvider rules="required" name="Department Email" v-slot="{ errors }">
                                                                            <input type="email" placeholder="Enter Email address" class="w-100"  v-model="dept_email">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                            <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.dept_email[0]}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <h4>Billing Address</h4>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Address</label>
                                                                            <input type="text" name="" placeholder="Abc street 123 road"  class="w-100" v-model="address">
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">City*</label>
                                                                               <ValidationProvider rules="required" name="City" v-slot="{ errors }">
                                                                            <input type="text" name="" placeholder="Abc" class="w-100"  v-model="city">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                            <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.city[0]}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">County*</label>
                                                                             <ValidationProvider rules="required" name="Country" v-slot="{errors }">
                                                                            <input type="text" name="" placeholder="Abc" class="w-100"  v-model="country">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                            <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.country[0]}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">Postcode*</label>
                                                                             <ValidationProvider rules="required" name="Post Code" v-slot="{ errors }">
                                                                            <input type="text" name="" placeholder="01234" class="w-100"   v-model="post_code">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="bottom">
                                                                    <div class="row">
                                                                        <div class="col-12 col-xl-4 col-md-6">
                                                                            <label for="">email address*</label>
                                                                             <ValidationProvider rules="required" name="Email Address" v-slot="{errors }">
                                                                            <input type="email" placeholder="Enter Email Address" class="w-100"  v-model="email">
                                                                             <span class="error">{{errors[0]}}</span>
                                                                            </ValidationProvider>
                                                                            <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.email[0]}}</span>
                                                                            </div>
                                                                            <p>Note: Prefer to use your professional email address</p>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6 position-relative">
                                                                            <label for="">password*</label>
                                                                              <ValidationProvider rules="required" name="Password" v-slot="{ errors }">
                                                                            <input type="password" placeholder="Enter password" class="w-100"  v-model="password">  
                                                                             <span class="error">{{errors[0]}}</span>                                                                          
                                                                            </ValidationProvider>
                                                                            <button type="button" class="eye"><i class="fa fa-eye-slash"></i></button>
                                                                            <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.password[0]}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-xl-4 col-md-6 position-relative">
                                                                            <label for="">confirm password*</label>
                                                                             <ValidationProvider rules="required" name="Confirm Password" v-slot="{ errors }">
                                                                            <input type="password" placeholder="Retype Password" class="w-100" v-model="confirm_pass"> 
                                                                             <span class="error">{{errors[0]}}</span>                                                                          
                                                                            </ValidationProvider>
                                                                            <button type="button" class="eye"><i class="fa fa-eye-slash"></i></button>
                                                                            <!-- <div>
                                                                            <span v-if="errors_exist" class="error">{{errors_exist.confirm_pass[0]}}</span>
                                                                            </div> -->
                                                                        </div>
                                                                        <div class="col-12 text-center">
                                                                            <button type="submit" class="yel-btn">add</button>
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
            </layout>
    </div>
</template>
<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate';
import Layout from '../../../layout/Layout.vue';
export default {
    name:'AddBussniss',
    components:{Layout,ValidationProvider,ValidationObserver},
    data(){
        return{
                first_name:'',
                last_name:'',
                email:'',
                password:'',
                confirm_pass:'',
                phone_no:'',
                address:'',
                city:'',
                country:'',
                post_code:'',
                profile:{},
                company_no:'',
                company:'',
                vat_no:'',
                dept_email:'',
                user_type:'Bussniss',
                errors_exist:''
               
            }
        },
        methods:{
            setImage: function (event) {
            console.log(event.target.files[0]);
            this.profile = event.target.files[0];
            },
            create(){   
            let data = new FormData(this.$refs.form);
            data.append('first_name', this.first_name)
            data.append('last_name', this.last_name)
            data.append('email', this.email)
            data.append('password', this.password)
            data.append('confirm_pass', this.confirm_pass)
            data.append('phone_no', this.phone_no)
            data.append('address', this.address)
            data.append('company', this.company)
            data.append('company_no', this.company_no)
            data.append('vtn_no', this.vat_no)
            data.append('dept_email', this.dept_email)
            data.append('city', this.city)
            data.append('country', this.country)
            data.append('post_code', this.post_code)
            data.append('profile', this.profile)
            data.append('user_type', this.user_type)  
            axios({
            url:'/api/users',
            method:'post',
            data:data
            }).then((response)=>{   
            this.$toasted.success(response.data.message).goAway(2000);  
            this.$router.push('/admin/users');
            }).catch((err)=>{  
            this.errors_exist = err.response.data.errors
            this.$toasted.error(err)    
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