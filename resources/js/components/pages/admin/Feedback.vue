<template>
   <div>
      <layout>
         <div class="app-content content users">
            <div class="content-wrapper">
                <div class="content-body"> 
                <!-- Basic form layout section start -->
                <section id="configuration">
                    <div class="row">
                    <div class="col-12">
                        <div class="card rounded pad-20">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                            <div class="user-top">
                                <div class="row">
                                <div class="col-124">
                                    <h1 class="yellow-text ml-1">
                                    feedback
                                    </h1>
                                </div>
                                </div>
                            </div>
                            <div class="row"> <div class="col-xl-4 col-lg-6 col-md-10 col-12">
                                <div class="sorter">
                                    <form action="">
                                    <label for="">sort by</label>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                        <input type="text" contenteditable="true" spellcheck="true" class="form-control" placeholder="From" id="datepicker-1">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                        <input type="text" contenteditable="true" spellcheck="true" class="form-control" placeholder="to" id="datepicker-2">
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="maain-tabble table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                    <th>s.no</th>
                                    <th>User ID</th>
                                    <th>first name</th>
                                    <th>last name</th>
                                    <th>email address</th>
                                    <th>date</th>
                                    <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>01</td>
                                    <td>0012</td>
                                    <td>Mark</td>
                                    <td>Carson</td>
                                    <td>mark@carson.com</td>
                                    <td>dd/mm/yyyy</td>
                                    <td><div class="btn-group mr-1 mb-1">
                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu" > <a class="dropdown-item" href="feedback-details.php"><i class="fa fa-eye"></i>View </a> <a class="dropdown-item" href="#" data-toggle="modal" data-target=".block-user"><i class="fa fa-trash"></i>delete </a> </div>
                                        </div></td>
                                    </tr>
                                    <tr>
                                    <td>01</td>
                                    <td>0012</td>
                                    <td>Mark</td>
                                    <td>Carson</td>
                                    <td>mark@carson.com</td>
                                    <td>dd/mm/yyyy</td>
                                    <td><div class="btn-group mr-1 mb-1">
                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu"> <a class="dropdown-item" href="feedback-details.php"><i class="fa fa-eye"></i>View</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target=".block-user"><i class="fa fa-trash"></i>delete</a> </div>
                                        </div></td>
                                    </tr>
                                </tbody>
                                </table>
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
export default {
    name:'Feedback',
    components:{Layout},
    created(){
        let token = localStorage.getItem('token')
        if(token == null){
        this.$router.push('/login');
        this.$toasted.show('Frist you login with your account').goAway(2000);
        } 
    }
}
</script>
<style scoped>
.content-body {
    margin-top: 4%;
}
</style>