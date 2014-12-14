<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='ROBOTS' content='NOFOLLOW'><!-- tell robots not to index links off this page -->
	<meta name='author' value='roobotics dev team'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='icon' href='{{ asset('images/kanga.png') }}'>
	<link rel='stylesheet' href='{{ asset('css/bootstrap.min.css') }}'>
	<link rel='stylesheet' href='{{ asset('css/bootstrap-theme.min.css') }}'>
	<link rel='stylesheet' href='{{ asset('css/baselayout.css') }}'>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type='text/javascript' src='{{ asset('js/jquery.js') }}'></script>
	@yield('head')
</head>
<body>
	<!-- Top menu bar -->
		<div class="container-fluid" id="navbar-top">
			<a class="navbar-brand" href="/">FRC Team 4373</a>
			<ul class="nav navbar-nav navbar-right">
				<li>
					@if (Sentry::check())
						<a href="/user/home/">{{{ Sentry::getUser()->first_name . ' ' . Sentry::getUser()->last_name }}}</a>
					@else
						<a href="/user/signup/">Request Account</a>
					@endif
				</li>
				<li>
					@if (Sentry::check())
						<a href="/user/logout/">Logout</a>
					@else
						<a href="/user/login/">Login</a>
					@endif
				</li>
				<li>
					<a href="/">Schedule</a>
				</li>
			</ul>
		</div>
		<!-- / Top menu bar -->
	<div id="wrapper">
		<!-- Collapsible Side navigation bar -->
		<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="/">About Our Bot</a>
                </li>
                <li>
                    <a href="/">About the Team</a>
                </li>
                <li>
                    <a href="/">Get in Touch</a>
                </li>
                <li>
                    <a href="/">Media Gallary</a>
                </li>
            </ul>
        </div>
		<!-- / Collapsible side navigation bar -->

		<!-- Main page content -->
		<div id="page-content-wrapper" >
			<div id="main-page-content">
				@yield('content')
			</div>
		</div>
		<!-- / Main page content -->
	</div>
	<!-- Sidebar hide/show jQuery code -->
	<script type="text/javascript" src=" {{ asset('js/sidebar.js') }} "></script>
	<!-- See website credits at {{ asset('credits') }} -->
</body>
</html>