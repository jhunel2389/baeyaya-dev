@extends('layouts.master')

@section('head')
	@parent
	<title>Home Page</title>
@stop

@section('content')
      <div class="banner8">
   
		<!----//End-top-nav-script---->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-banner-->
	<!--start-contact-->
	<div class="contact">
    <div class="contact-main">
				<h3>HOW TO FIND US</h3>
				<div class="contact-top">
              
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.716236489991!2d120.971073!3d14.443509999999991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d2097a68a533%3A0x3af39e03cc25c4a9!2sKalugdan+Garden+Resort!5e0!3m2!1sen!2sph!4v1441907120402" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color: #242424;text-shadow: 0 1px 0 #ffffff;text-align: left;font-size: 0.7125em;padding: 5px;font-weight: 600;">View Larger Map</a></small>
    <!----//End-top-nav-script---->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="contact-main">
				
				<div class="contact-top">
					
					
					<div class="contact-one">
						<div class="col-md-4 contact-left">
							<div class="c-left">
								<span class="adrs"> </span>
							</div>
							<div class="c-right">
								<h5>Kalugdan Garden Resort,<span>Address: 047 T. Kalugdan Compound Ligas 3, Bacoor, 4102 Cavite</span></h5>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-4 contact-left">
							<div class="c-left">
								<span class="ph"> </span>
							</div>
							<div class="c-right">
							<p>Telephone: (046) 4235928/ 4172960
								<span>CELL #: 09207605857/09065325913</span>
							</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-4 contact-left">
							<div class="c-left">
								<span class="mail"> </span>
							</div>
							<div class="c-right">
								<p><a href="mailto:posomhedz@yahoo.com.ph">posomhedz@yahoo.com.ph</a></p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="contact-bottom">
					<h3>CONTACT FORM</h3>
					<div class="contact-text">
						<input type="text" name="fullname" id="fullname" value="{{(Auth::Check()) ? App::make("UserController")->userInfo(Auth::User()['id'])['firstname'].' '.App::make("UserController")->userInfo(Auth::User()['id'])['lastname'] : ''}}" placeholder="Full Name"/>
						<input type="text" name="contactemail" id="contactemail" value="{{(Auth::Check()) ? App::make("UserController")->userInfo(Auth::User()['id'])['email'] : ''}}" placeholder="Email"/>
						<textarea name="message" id="message" placeholder="Message:" ></textarea>
						<div class="contact-but">
							<input type="submit" name="sendMsg" id="sendMsg" value="Send" onclick="sendMsg();" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end-contact-->
	@include('includes.footer')

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

	function sendMsg()
	{
		$_token = "{{ csrf_token() }}";
		$fname = $('#fullname').val();
		$email = $('#contactemail').val();
		$message = $('#message').val();
		$checkValdation = false;

		//data-container="body" data-toggle="popover" data-placement="right" data-trigger="focus" data-content="Username already taken." data-original-title="" title=""

		if($fname.length == 0)
		{
			$checkValdation = true;
		}
		if($email.length == 0)
		{
			$checkValdation = true;
		}
		if($message.length == 0)
		{
			$checkValdation = true;
		}
		
		if($checkValdation)
		{
			alert("Please input all information.");
			$checkValdation = false;
		}
		else
		{
			$.post('{{URL::Route('sendContactMsg')}}',{ _token: $_token , fname: $fname , email : $email , message: $message} , function(data)
			{
				if(data == 1)
				{
					alert("Your message successfully sent.Thank you for contacting us.");
					if(!{{Auth::Check()}})
					{
						$('#fullname').val('');
						$('#contactemail').val('');
					}
					
					$('#message').val('');
				}
			});
		}
	}
	</script>					
	<!--End-pop-up-box-->

@stop