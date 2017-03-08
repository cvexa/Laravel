<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- //for-mobile-apps -->
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ URL::asset('css/contactstyle.css') }}" type="text/css" media="all" />
<link rel="stylesheet" href="{{ URL::asset('css/faqstyle.css') }}" type="text/css" media="all" />
<link href="{{ URL::asset('css/single.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ URL::asset('css/medile.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ URL::asset('css/jquery.seat-charts.css') }}" rel='stylesheet' type='text/css' />
<!-- banner-slider -->
<!-- <link href="{{ URL::asset('css/jquery.slidey.min.css') }}" rel="stylesheet"> -->
<!-- //banner-slider -->
<!-- pop-up -->
<link href="{{ URL::asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.4.js') }}"></script>
<script src="{{ URL::asset('js/jquery.seat-charts.js') }}"  ></script>

<!-- //js -->
<!-- banner-bottom-plugin -->
<link href="{{ URL::asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
<script src="{{ URL::asset('js/owl.carousel.js') }}"></script>

  
 
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]
	 
		});
	 
	}); 
</script> 
<!-- //banner-bottom-plugin -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ URL::asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/easing.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<?php date_default_timezone_set('Europe/Sofia'); ?>

</head>
	
<body>
<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="{{url('/home')}}"><h1>One<span>Movies</span></h1></a>
			</div>
			<div class="w3_search">
				<form action="#" method="post">
					<input type="text" name="Search" placeholder="Search" required="">
					<input type="submit" value="Go">
				</form>
			</div>

 
 <?php 
 $user_name = session('name');
 $genres = session('genres');
 $role = session('role');
 ?> 
 @if(!empty($user_name))        
 <span style="float:right;margin-top:2%;">Logged as <strong>{{ $user_name }}</strong></span> 
 @else
<span style="float:right;margin-top:2%;">Wellcome</strong></span>  
@endif                    

			<div class="clearfix"> </div>
		</div>
	</div>
	

	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li class="#"><a href="/home">Начало</a></li>
							

							<li><a href="news.html">За киното</a></li>
					
							<li><a href="short-codes.html">Контакти</a></li>
							@if(empty($role))
							<li><a href="{{ url('/login') }}">Вход</a></li>
							<li><a href="{{ url('/register') }}">Регистрация</a></li>
							@endif
							@if($role == \Config::get('constants.ROLE_USER'))
							<li><a href="{{url('/profile')}}">Моят Профил</a></li>
							<li><a href="{{url('/logout')}}">Излез</a></li>
							@endif
							@if($role == \Config::get('constants.ROLE_ADMIN'))

							<li><a href="{{url('/movies')}}">Admin Panel</a></li>
							<li><a href="{{url('/logout')}}">Излез</a></li>
							@endif
							<!-- <li><a href="{{ url('/reservation') }}">Резервация</a></li> -->

						</ul>
					</nav>
				</div>
			</nav>	
		</div>
	</div>

<!-- //nav -->
<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
			<li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>				  
		</ul>
  </nav>
  @yield('content')

  <!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>Subscribe to us</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<form action="#" method="post">
								<input type="email" name="email" placeholder="Your email..." required="">
								<input type="submit" value="Send">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 w3ls_footer_grid_right">
					<a href="index.html"><h2>One<span>Movies</span></h2></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2017 One Movies. All rights reserved | Development by Vratsa Software | Cvexa</p>
			</div>
			<div class="col-md-7 w3ls_footer_grid1_right">
				<ul>
					<li>
						<a href="genres.html">Movies</a>
					</li>
					<li>
						<a href="faq.html">FAQ</a>
					</li>
					<li>
						<a href="horror.html">Action</a>
					</li>
					<li>
						<a href="genres.html">Adventure</a>
					</li>
					<li>
						<a href="comedy.html">Comedy</a>
					</li>
					<li>
						<a href="icons.html">Icons</a>
					</li>
					<li>
						<a href="contact.html">Contact Us</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>

</body>
</html>