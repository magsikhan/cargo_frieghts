<template>
    <div>
        <div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<li class="nav-item active dashboard-link"><router-link :to="{name:'dashboard'}"><i class="fa fa-chart-area"></i><span class="menu-title" data-i18n="">Dashboard</span></router-link>
				</li>
				<li class="nav-item "><router-link :to="{ name:'users' }"><i class="fa fa-user-circle"></i><span class="menu-title" data-i18n="">user</span></router-link>
				</li>
				<li class="nav-item "><router-link :to="{name:'quotation-log'}"><i class="fa fa-clone"></i><span class="menu-title" data-i18n="">Quotation log</span></router-link>
				</li>
				<li class="nav-item "><router-link :to="{name:'order-log'}"><i class="fa fa-archive"></i><span class="menu-title" data-i18n="">order log</span></router-link>
				</li>
				<li class="nav-item "><router-link :to="{name:'payment-log'}"><i class="fa fa-dollar-sign"></i><span class="menu-title" data-i18n="">payments</span></router-link>
				</li>
				<li class="nav-item "><router-link :to="{name:'feedback'}"><i class="fa fa-clipboard-list"></i><span class="menu-title" data-i18n="">feedback</span></router-link>
				</li>

			</ul>
		</div>
	</div>
    </div>
</template>

<script>
export default {
    name:'Sidebar'
}
</script>
<style scoped>
.dashboard-link{
	padding-top: 14px !important;
}
</style>