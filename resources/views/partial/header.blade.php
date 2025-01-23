<!-- BEGIN #header -->
<div id="header" class="app-header">
    <!-- BEGIN mobile-toggler -->
    <div class="mobile-toggler">
        <button type="button" class="menu-toggler" @if (!empty($appTopNav) && !empty($appSidebarHide)) data-toggle="top-nav-mobile" @else data-toggle="sidebar-mobile" @endif>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <!-- END mobile-toggler -->

    <!-- BEGIN brand -->
    <div class="brand">
        <div class="desktop-toggler">
            <button type="button" class="menu-toggler" @if (empty($appSidebarHide))data-toggle="sidebar-minify"@endif>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>

		<a href="/" class="brand-logo">
			{{-- <img src="/assets/img/logo.png" class="invert-dark" alt="" height="20"> --}}
			<div class="invert-dark">SiAkad</div>
		</a>
	</div>
	<!-- END brand -->

	<!-- BEGIN menu -->
	<div class="menu">
		<form class="menu-search">
		</form>
		<div class="menu-item dropdown">
			<a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
				<div class="menu-img online">
					<div class="d-flex align-items-center justify-content-center w-100 h-100 bg-gray-800 text-gray-300 rounded-circle overflow-hidden">
						<i class="fa fa-user fa-2x mb-n3"></i>
					</div>
				</div>
				<div class="menu-text">{{ auth()->user()->username }}</div>
			</a>
			<div class="dropdown-menu dropdown-menu-end me-lg-3">
				{{-- <a class="dropdown-item d-flex align-items-center" href="#">Edit Profile <i class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i></a>
				<a class="dropdown-item d-flex align-items-center" href="#">Inbox <i class="fa fa-envelope fa-fw ms-auto text-body text-opacity-50"></i></a>
				<a class="dropdown-item d-flex align-items-center" href="#">Calendar <i class="fa fa-calendar-alt fa-fw ms-auto text-body text-opacity-50"></i></a>
				<a class="dropdown-item d-flex align-items-center" href="#">Setting <i class="fa fa-wrench fa-fw ms-auto text-body text-opacity-50"></i></a> --}}
				{{-- <div class="dropdown-divider"></div> --}}
				<form action="{{ route('auth.logout') }}" method="POST">
					@csrf
					<button class="dropdown-item d-flex align-items-center" type="submit">Logout
						<i class="fa fa-toggle-off fa-fw ms-auto text-body text-opacity-50"></i></button>
				</form>
			</div>
		</div>
	</div>
	<!-- END menu -->
</div>
<!-- END #header -->
