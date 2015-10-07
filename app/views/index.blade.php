@extends('layouts.master')

@section('head')
	@parent
	<title>Home Page</title>
@stop

@section('content')
	<div id="wowslider-container1">
		<div class="ws_images">
			<ul>
				<li><img src="{{app('customURL')}}data1/images/parking.jpg" alt="parking" title="parking" id="wows1_0"/></li>
				<li><img src="{{app('customURL')}}data1/images/olympic_pool.jpg" alt="Olympic Pool" title="Olympic Pool" id="wows1_1"/></li>
				<li><img src="{{app('customURL')}}data1/images/main_pool.jpg" alt="Main Pool" title="Main Pool" id="wows1_2"/></li>
				<li><a href="http://wowslider.com"><img src="data1/images/kiddie_pool.jpg" alt="wow slider" title="Kiddie Pool" id="wows1_3"/></a></li>
				<li><img src="{{app('customURL')}}data1/images/fishpond.jpg" alt="Fishpond" title="Fishpond" id="wows1_4"/></li>
			</ul>
		</div>
		<div class="ws_bullets">
			<div>
				<a href="#" title="parking"><span><img src="{{app('customURL')}}data1/tooltips/parking.jpg" alt="parking"/>1</span></a>
				<a href="#" title="Olympic Pool"><span><img src="{{app('customURL')}}data1/tooltips/olympic_pool.jpg" alt="Olympic Pool"/>2</span></a>
				<a href="#" title="Main Pool"><span><img src="{{app('customURL')}}data1/tooltips/main_pool.jpg" alt="Main Pool"/>3</span></a>
				<a href="#" title="Kiddie Pool"><span><img src="{{app('customURL')}}data1/tooltips/kiddie_pool.jpg" alt="Kiddie Pool"/>4</span></a>
				<a href="#" title="Fishpond"><span><img src="{{app('customURL')}}data1/tooltips/fishpond.jpg" alt="Fishpond"/>5</span></a>
			</div>
		</div>
		<div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">wowslider.com</a> by WOWSlider.com v8.5</div>
		<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="{{app('customURL')}}engine1/wowslider.js"></script>
	<script type="text/javascript" src="{{app('customURL')}}engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	<div id="div3">
		@if(!Auth::check())
			<div class="log-in">
				<ul>
					<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><span> </span>Login</a></li>
					<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog1">Signup</a></li>
					<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog2"><span> </span>Forgot Log-in</a></li>
				</ul>
			</div>
		@else
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		@endif
	</div>
	<!--start-staff-->
	<div class="staff">
		<div class="container">
			<div class="staff-top">
				<h3>WELCOME TO KALUGDAN GARDEN RESORT</h3>
			</div>
			<div class="staff-bottom">
				<?php $allBanners = Banners::all(); ?>
				@foreach($allBanners as $allBanner)
				<div class="col-md-4 staff-left">
					<a href="{{ URL::Route('getGallery') }}"><img src="{{app('customURL')}}images/{{$allBanner['img']}}" height="200" width="250" alt="">
					<h4>{{$allBanner['title']}}</h4>
					<p>{{$allBanner['content']}}</p>
				</div>
				@endforeach

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<div class="staffs">
		<div class="container">
			<div>
				<div>
					<h3><a href="{{ URL::Route('getNews') }}">News</h3>
					<ul>
						<li>
							<h4><a href="{{ URL::Route('getNews') }}">MUTYA NG CAVITE 2015</h4>
							<span><a href="{{ URL::Route('getNews') }}">October 4, 2015</span>
							<p>
								<a href="{{ URL::Route('getNews') }}">SWIMSUIT COMPETITION WILL BE HELD ON KALUGDAN GARDEN RESORT
							</p>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="staffs">
			<div class="container">
				<div>
					<div>
						<h3><a href="{{ URL::Route('getTestimonials') }}">Testimonials</h3>
						<ul>
							<li>
								<p><a href="{{ URL::Route('getTestimonials') }}">
									Masaya super saya sa mga slides! Overnight sulit mo ang pag swimming .This is totally fun!<br>
									<span><a href="{{ URL::Route('getTestimonials') }}">- Margaux Anne Muesco Barbin</a></span>
								</p>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	
	<!--end-staff-->
	@include('includes.footer')
@stop