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
		<meta name="keywords" content="Kalugdan Garden Resort" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="{{app('customURL')}}css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!--<link href="{{app('customURL')}}css/bootstrap.min.css" rel='stylesheet' type='text/css' />-->
		<link href="{{app('customURL')}}css/style2.css" rel='stylesheet' type='text/css' />
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
                <li class="{{ ($mt == 'RATES') ? 'active' : ''}}"><a href="{{ URL::Route('getRates') }}">RATES</a></li>
                <!--<li class="{{ ($mt == 'NEWS') ? 'active' : ''}}"><a href="{{ URL::Route('getNews') }}">NEWS</a></li>-->
                <li class="{{ ($mt == 'TESTIMONIALS') ? 'active' : ''}}"><a href="{{ URL::Route('getTestimonials') }}">TESTIMONIALS</a></li>
                <li class="{{ ($mt == 'CONTACT') ? 'active' : ''}}"><a href="{{ URL::Route('getContact') }}">CONTACT US</a></li>
                @if(Auth::Check())
					<li class="{{ ($mt == 'RESERV') ? 'active' : ''}}"><a href="{{ URL::Route('getReservation') }}">RESERVATIONS</a></li>
				@else
					<li class="{{ ($mt == 'RESERV') ? 'active' : ''}}"><a class="play-icon popup-with-zoom-anim" href="#small-dialog">RESERVATIONS</a></li>
				@endif
               	<li class="{{ ($mt == 'VIRTUAL') ? 'active' : ''}}"><a href="{{ URL::Route('virtualTour') }}">TOUR</a></li>
               	@if(Auth::Check())
               		<li><a href="{{ URL::Route('getLogout') }}">LOG-OUT</a></li>
           			@if(Auth::User()->isAdmin())
           				<!--<li><a href="{{ URL::Route('getFM') }}">ADMIN</a></li>-->
           			@endif
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
				<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog2"><span> </span>Forgot Password</a></li>
				<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog1"><span> </span>Sign up</a></li>
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
				<input type="text" placeholder="Enter Contact" class="email" name="contact" id="contact" maxlength="11"/>
				<input type="text" placeholder="Enter Email" class="text" name="email" id="email"/>
				<input type="text" placeholder="Username" name="uname" id="uname"/>
				<input type="password" placeholder="Password" name="pass" id="pass" maxlength="20"/>
				<input type="password" placeholder="Re-type Password" name="pass1" id="pass1" maxlength="20"/>
				<input type="submit" name="subreg" value="SignUp" onclick="createUser();" />
		</div>
	</div>	
	
	<div id="small-dialog2" class="mfp-hide">
		<div class="forgotpassword">
			<h3>Reset Password</h3>
			<h4>Enter Your Details Here</h4>
			<input type="text" class="email" placeholder="Email" name="for_email" id="for_email" />
			<input type="submit"  value="Forgot Password" onclick="forgotPassword();"/>
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

		$("#contact").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });			
	});


	function validateEmail(email) {
	    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	    return re.test(email);
	}

	function forgotPassword()
	{
		$_token = "{{ csrf_token() }}";
		$email = $('#for_email').val();
		$checkValdation = false;
		if($email.length == 0)
		{
			$checkValdation = true;
		}

		if($checkValdation)
		{
			alert("Please input all information.");
		}
		else
		{
			$.post('{{URL::Route('forgotPassword')}}',{ _token: $_token , email : $email } , function(data)
			{
				if(data == 1)
				{
					alert("Email not found. You may sign up now.");
				}
				if(data == 2)
				{
					alert("Please check your email and click the link to continue the change password process.");
				}
				if(data == 3)
				{
					alert("Password reset failed. Please try again.Thank you!");
				}
			});
		}
	}
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
		$pass1 = $('#pass1').val();
		$checkValdation = false;
		$check = 0;
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

		if($email.length != 0 && $check == 0 && !validateEmail($email))
		{
			$checkValdation = true;
			alert("Email address is invalid.Please try again.");
			$check = 1;
		}

		if($pass == $pass1 && $check == 0 && ($pass.length <= 5 || $pass.length >= 21))
		{
			$checkValdation = true;
			alert("Password must be minimum of 6 maximum 20.Thank you.");
			$check = 1;
		}
		if($pass != $pass1 && $check == 0 )
		{
			$checkValdation = true;
			alert("Password does not mutch, please try again.");
			$check = 1;
		}
		if($check == 0)
		{
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
						alert("You regestered successfully. Please check your email and verify your account. Thank you.");
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
	}
	</script>					
	<!--End-pop-up-box-->

	@yield('content')
	@section('javascript')
		
	@show
</body>
</html>
