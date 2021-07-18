<template>
    <div>
        <layout>
    <div class="app-content content dashboard">
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
											<h1>admin dashboard</h1>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="box">
												<div class="text-center">
													<h6>Quick Stats</h6>
												</div>
												<div class="row">
													<div class="col-md-6 col-12 text-center">
														<div class="c100 p40 big orange"> <span>60$</span>
															<div class="slice">
																<div class="bar"></div>
																<div class="fill"></div>
															</div>
														</div>
														<h6 class="yel">Average Monthly Income</h6>
													</div>
													<div class="col-md-6 col-12 text-center">
														<div class="c100 p60 big green"> <span>60$</span>
															<div class="slice">
																<div class="bar"></div>
																<div class="fill"></div>
															</div>
														</div>
														<h6 class="blue">Average Yearly Income</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-8 col-12 offset-lg-2 ">
											<div class="registerd-user">
												<div class="media align-items-center">
													<i class="fa fa-users"></i>
													<div class="media-body">
														<h2>registerd users</h2>
													</div>
													<h3>4688</h3>
												</div>
											</div>
										</div>
									</div>

									<div class="bottom tickets">
										<div class="row">
											<div class="col-12 text-center">
												<h2>Revenue Generated Per Month</h2>
											</div>
											<div class="col-12 text-right">
												<select name="" id="">
													<option value="">Select Year</option>
													<option value="">2012</option>
													<option value="">2012</option>
													<option value="">2012</option>
													<option value="">2012</option>
													<option value="">2012</option>
												</select>
											</div>
										</div>
										<div class="chart-main position-relative">
											<div class="row">
												<div class="col-xl-1 col-12">
													<h4>Revenue</h4>
												</div>
												<div class="col-12 col-xl-11">
													<div class="chartjs">
														<canvas id="line-stacked-area-1" height="250"></canvas>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-12 text-center">
													<h3>Months</h3>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h4>Activity Log</h4>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="maain-tabble table-responsive">
										<table class="table table-striped table-bordered zero-configuration">
											<thead>
												<tr>
													<th>s.no</th>
													<th>Activity</th>
													<th>Date</th>
													<th>time</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>01</td>
													<td>Lorem Ipsum is simply dummy text of the printing</td>
													<td>OCT 20 , 2020</td>
													<td>10:50 AM</td>
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
import Layout from '../../../layout/Layout.vue'
export default {
    name:'Index',
    components:{Layout},
	created(){
	let token	= localStorage.getItem('token')
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