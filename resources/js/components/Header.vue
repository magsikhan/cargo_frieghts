<template>
    <div>
        <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a>
					</li>
					<li class="nav-item"> <router-link :to="{name:'dashboard'}" class="navbar-brand"> <img class="brand-logo img-fluid" alt="stack admin logo" src="/images/logo.png"/></router-link> </li>
					<li class="nav-item d-md-none"> <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a> </li>
				</ul>
			</div>
			<div class="navbar-container content">
				<div class="collapse navbar-collapse" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">
					</ul>
					<ul class="nav navbar-nav float-right">
						<li class="dropdown dropdown-notification nav-item test"> <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i> <span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span> </a>
							<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
								<li class="scrollable-container media-list ps-container ps-theme-dark ps-active-y" data-ps-id="75e644f2-605d-3ecc-f100-72d86e4a64d8">
									<a href="javascript:void(0)">
										<div class="media">
											<div class="media-left"><i class="fa grey-text fa-bell"></i>
											</div>
											<div class="media-body">
												<p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
												<small>
                    <time class="media-meta text-muted yellow-text" datetime="2015-06-11T18:29:20+08:00">Oct 22,2020 | 10:30 PM</time>
                    </small>
											


											</div>
										</div>
									</a>
									<a href="javascript:void(0)">
										<div class="media">
											<div class="media-left"><i class="fa grey-text fa-bell"></i>
											</div>
											<div class="media-body">
												<p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
												<small>
                  				  <time class="media-meta text-muted yellow-text" datetime="2015-06-11T18:29:20+08:00">Oct 22,2020 | 10:30 PM</time>
                   					 </small>
											


											</div>
										</div>
									</a>
									<a href="javascript:void(0)">
										<div class="media">
											<div class="media-left"><i class="fa grey-text fa-bell"></i>
											</div>
											<div class="media-body">
												<p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
												<small>
                    <time class="media-meta text-muted yellow-text" datetime="2015-06-11T18:29:20+08:00">Oct 22,2020 | 10:30 PM</time>
                    </small>
											


											</div>
										</div>
									</a>
									<a href="javascript:void(0)">
										<div class="media">
											<div class="media-left"><i class="fa grey-text fa-bell"></i>
											</div>
											<div class="media-body">
												<p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
												<small>
                    <time class="media-meta text-muted yellow-text" datetime="2015-06-11T18:29:20+08:00">Oct 22,2020 | 10:30 PM</time>
                    </small>
											


											</div>
										</div>
									</a>
									<a href="javascript:void(0)">
										<div class="media">
											<div class="media-left"><i class="fa grey-text fa-bell"></i>
											</div>
											<div class="media-body">
												<p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
												<small>
                    <time class="media-meta text-muted yellow-text" datetime="2015-06-11T18:29:20+08:00">Oct 22,2020 | 10:30 PM</time>
                    </small>
											


											</div>
										</div>
									</a>
									<a href="javascript:void(0)">
										<div class="media">
											<div class="media-left"><i class="fa grey-text fa-bell"></i>
											</div>
											<div class="media-body">
												<p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
												<small>
                    <time class="media-meta text-muted yellow-text" datetime="2015-06-11T18:29:20+08:00">Oct 22,2020 | 10:30 PM</time>
                    </small>
											


											</div>
										</div>
									</a>

								</li>
								<li class="dropdown-menu-footer"><a class="dropdown-item ml-3 black-text" href="notifications.php">View all</a>
								</li>
							</ul>
						</li>
						<li class="dropdown dropdown-user nav-item"> <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <span class="avatar avatar-online"> <img :src="`/uploads/${user.profile}`"/> </span> <span class="user-name">{{user.first_name}}</span> </a>
							<div class="dropdown-menu dropdown-menu-right"><router-link :to="{name:'profile'}" class="dropdown-item"><i class="fa fa-user-circle"></i>Profile</router-link>
								<router-link :to="{name: 'logout'}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</router-link> </div>
						</li>
						<li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
    </div>
</template>

<script>
export default {
    name:'Header',
	data(){
		return{
			id:'',
			user:'',
			notifications:[]
		}
	},
	created(){
	let token	= localStorage.getItem('token')
	if(token == null){
		this.$router.push('/login');
	}
	this.getNotifications()
	this.getLoginUser()
	
	},
	methods:{
		getLoginUser(){
		this.id = localStorage.getItem('user')
		//alert(this.id)	
		try{
		axios({
		url:'/api/loginUser?id='+this.id,
		method:'get',
		}).then((response)=>{
		if(response.status == 200){
		 this.user = response.data
		}	
		})	
		}catch(err){
			console.log(err)
		}
		},
		async getNotifications(){
	    let response = await axios.get('/api/getNotifications?id='+this.id)
		if(response){
        this.notifications = response.data 
		}else{
        this.$toasted.error(response.data.meesage) 
		}	
		}
	}
}


</script>