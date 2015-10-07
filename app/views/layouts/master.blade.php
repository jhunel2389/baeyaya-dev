<!doctype html>
<html lang="en">
<head>
	@section('head')
		<!-- Start WOWSlider.com HEAD section -->
		<link rel="stylesheet" type="text/css" href="{{app('customURL')}}engine1/style.css" />
		<script type="text/javascript" src="{{app('customURL')}}engine1/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- End WOWSlider.com HEAD section -->

		<script src="http://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


		<title>Kalugdan Garden Resort</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Blue Water Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="{{app('customURL')}}css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!--<link href="{{app('customURL')}}css/bootstrap.min.css" rel='stylesheet' type='text/css' />-->
		<link href="{{app('customURL')}}css/style.css" rel='stylesheet' type='text/css' />
		<!--<script src="{{app('customURL')}}js/jquery-1.11.0.min.js"></script>-->
		<link href='http://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>  
		<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="{{app('customURL')}}js/move-top.js"></script>
        <!----start-top-nav-script---->
        <!--<script type="text/javascript" src="{{app('customURL')}}js/responsive-nav.js"></script>-->

		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
		</script>
	    <script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		<!----//End-top-nav-script---->
	@show
	@yield('addHead')
</head>
<body>
	<div id="div2">
			<div id="topnav">
				<ul>
                <li><a href="{{ URL::Route('home') }}"><img src="{{app('customURL')}}images/mama.png" alt="LOGO" height="40" width="100"></a></li>
				<li class="{{ ($mt == 'HOME') ? 'active' : ''}}"><a href="{{ URL::Route('home') }}" class="active">HOME</a></li>
				<li class="{{ ($mt == 'ABOUT') ? 'active' : ''}}"><a href="{{ URL::Route('getAbout') }}">ABOUT</a></li>
				<li class="{{ ($mt == 'SERVICES') ? 'active' : ''}}"><a href="{{ URL::Route('getServices') }}">SERVICES</a></li>
                <li class="{{ ($mt == 'GALLERY') ? 'active' : ''}}"><a href="{{ URL::Route('getGallery') }}">GALLERY</a></li>
                <!--<li class="{{ ($mt == 'NEWS') ? 'active' : ''}}"><a href="{{ URL::Route('getNews') }}">NEWS</a></li>-->
                <li class="{{ ($mt == 'TESTIMONIALS') ? 'active' : ''}}"><a href="{{ URL::Route('getTestimonials') }}">TESTIMONIALS</a></li>
                <li class="{{ ($mt == 'CONTACT') ? 'active' : ''}}"><a href="{{ URL::Route('getContact') }}">CONTACT US</a></li>
               	<li class="{{ ($mt == 'RESERV') ? 'active' : ''}}"><a href="{{ URL::Route('getReservation') }}">RESERVATIONS</a></li>
               	@if(Auth::Check())
               		<li><a href="{{ URL::Route('getLogout') }}">LOG-OUT</a></li>
               	@endif
				</ul>				
			</div>
			<div id="topnav2">
				@if(!empty($alert))
					@if($alert == "success")
				    	<div class="alert alert-success">{{$msg}} {{Session::has('success')}}</div>
					@elseif($alert == "fail")
						<div class="alert alert-danger">{{$msg}}</div>
					@endif
					<script type="text/javascript">
						function hide_modal(){
							$('#topnav2').fadeOut();
							window.location="{{URL::route('home')}}";
						}
						$(window).load(function(){
							window.setTimeout(hide_modal, 4000);
						});
					</script>
				@endif				
			</div>
        </div>
    

	@if(Session::has('success'))

		
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{Session::get('fail')}}</div>
	@endif

	<!---pop-up-box---->
	<script type="text/javascript" src="{{app('customURL')}}js/modernizr.custom.min.js"></script>    
	<link href="{{app('customURL')}}css/popup-box.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="{{app('customURL')}}js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!---//pop-up-box---->
	<div id="small-dialog" class="mfp-hide">
		<div class="login">
			<h3>Log In</h3>
			<h4>Are you already a Member?</h4>
			<form action="{{ URL::Route('postLogin') }}" method="post">
				<input type="text" placeholder="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'UserName';}" />
				<input type="password" placeholder="Password" name="pass1" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"/>
				<input type="submit" value="Login" name="sub" class="btn btn-default"/>
				{{Form::token()}}
			</form>
		</div>
	</div>
	<div id="small-dialog1" class="mfp-hide">
		<div class="signup">
			<h3>Sign Up</h3>
			<h4>Enter Your Details Here</h4>
				<input type="text" placeholder="First Name" name="fname" id="fname"/>
				<input type="text" placeholder="Middle Name" name="mname" id="mname" />
				<input type="text" placeholder="Last Name" name="lname" id="lname" />
				<input type="text" placeholder="Address" name="address" id="address"/>
				<input type="text" placeholder="Enter Contact" class="email" name="contact" id="contact"/>
				<input type="text" placeholder="Enter Email" class="text" name="email" id="email"/>
				<input type="text" placeholder="Username" name="uname" id="uname"/>
				<input type="password" placeholder="Password" name="pass" id="pass"/>
				<input type="submit" name="subreg" value="SignUp" onclick="createUser();" />
		</div>
	</div>	
	
	<script>
	$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});								
	});

	function createUser()
	{
		$_token = "{{ csrf_token() }}";
		$fname = $('#fname').val();
		$mname = $('#mname').val();
		$lname = $('#lname').val();
		$address = $('#address').val();
		$contact = $('#contact').val();
		$email = $('#email').val();
		$uname = $('#uname').val();
		$pass = $('#pass').val();
		$checkValdation = false;

		//data-container="body" data-toggle="popover" data-placement="right" data-trigger="focus" data-content="Username already taken." data-original-title="" title=""

		if($fname.length == 0)
		{
			$checkValdation = true;
		}
		if($mname.length == 0)
		{
			$checkValdation = true;
		}
		if($lname.length == 0)
		{
			$checkValdation = true;
		}
		if($address.length == 0)
		{
			$checkValdation = true;
		}
		if($contact.length == 0)
		{
			$checkValdation = true;
		}
		if($email.length == 0)
		{
			$checkValdation = true;
		}
		if($uname.length == 0)
		{
			$checkValdation = true;
		}
		if($pass.length == 0)
		{
			$checkValdation = true;
		}
		if($checkValdation)
		{
			alert("Please input all information.");
		}
		else
		{
			$.post('{{URL::Route('postCreate')}}',{ _token: $_token , fname: $fname , mname : $mname , lname: $lname , address : $address , contact: $contact , email : $email , uname: $uname , pass : $pass} , function(data)
			{
				if(data == 1)
				{
					alert("You regestered successfully. Please check your email and verifyyour account. Thank you.");
					window.location="{{URL::route('home')}}";
				}
				if(data == 2)
				{
					alert("Regestration failed. Please try again later. Thank you.");
				}
				if(data == 3)
				{
					alert("Email Address has already taken. Please try other email. Thank you.");
				}
				if(data == 4)
				{
					alert("Username has already taken. Please try other username. Thank you.");
				}
			});
		}
	}
	</script>					
	<!--End-pop-up-box-->

	@yield('content')
	@section('javascript')
		
	@show
</body>
</html>
