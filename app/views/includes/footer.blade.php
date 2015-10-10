<!--start-footer-->
<div class="footer">
	<div class="container">
		<div class="footer-main">
			<div class="col-md-5 footer-left">
				<h4>Follow Us</h4>
				<ul>
					<li><a href="https://www.facebook.com/kalugdangardenresort"><span class="fb"> </span></a></li>
					<li><a href="https://www.youtube.com/results?search_query=kalugdan+garden+resort"><span class="yt"> </span></a></li>
				</ul>
				<h4>Address</h4>
				<h5>047 T. Kalugdan Compound Ligas 3, Bacoor, 4102 Cavite</h5>
				<p>Mail Us On <a href="mailto:14kalugdangardenresort@gmail.com"> 14kalugdangardenresort@gmail.com</a></p>
				<p>Call Us On  (046) 417 2960</p>
			</div>
			<div class="col-md-7 footer-right">
				<!--<h4>Subscribe For Updates</h4>
				<span>
				<input type="text"  value="Enter email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter email';}">
				<input type="submit" value="SUBSCRIBE">
				</span>-->
				<ul>
					<li class="{{ ($mt == 'HOME') ? 'active' : ''}}"><a href="{{ URL::Route('home') }}">HOME</a></li>
					<li class="{{ ($mt == 'ABOUT') ? 'active' : ''}}"><a href="{{ URL::Route('getAbout') }}"  class="active">ABOUT</a></li>
					<li class="{{ ($mt == 'SERVICES') ? 'active' : ''}}"><a href="{{ URL::Route('getServices') }}">SERVICES</a></li>
					<li class="{{ ($mt == 'GALLERY') ? 'active' : ''}}"><a href="{{ URL::Route('getGallery') }}">GALLERY</a></li>
					<li class="{{ ($mt == 'NEWS') ? 'active' : ''}}"><a href="{{ URL::Route('getNews') }}">NEWS</a></li>
					<li class="{{ ($mt == 'TESTIMONIALS') ? 'active' : ''}}"><a href="{{ URL::Route('getTestimonials') }}">TESTIMONIALS</a></li>
					<li class="{{ ($mt == 'CONTACT') ? 'active' : ''}}"><a href="{{ URL::Route('getContact') }}">CONTACT US</a></li>
					<li class="{{ ($mt == 'RESERV') ? 'active' : ''}}"><a href="{{ URL::Route('getReservation') }}">RESERVATIONS</a></li>
					@if(!Auth::Check())
						<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog">Login</a></li>
						<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog1">Signup</a></li>
					@else
						@if(Auth::User()->isAdmin())
	           				<li><a href="{{ URL::Route('getFM') }}">ADMIN</a></li>
	           			@endif
					@endif

				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
	<a href="{{ URL::Route('home') }}" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>
        <!--end-footer-->