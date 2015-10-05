@extends('layouts.master')

@section('head')
	@parent
	<title>Home Page</title>
@stop

@section('content')
	 <div class="banner6">
    </div>
		<!----//End-top-nav-script---->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-banner-->
	<!--start-services-->
	<div class="services">
		<div class="container">
			<div class="services-main">
				<h3>COTTAGES</h3>
				<div class="services-top">
					<div class="col-md-4 service-left">
						<a href="booking.html"><img src="images/1-one.jpg" alt="">
						<h4>MAIN POOL COTTAGES</h4>
						<p>COTTAGES 1,2,3,4,5,6,7,8,9<br>
                           CAPACITY Good for 12person<br>
                           PRICE: 600.00PHP</p>
						<div class="s-btn">
							<a href="index.html">LOG-IN NOW</a>
						</div>
					</div>
					<div class="col-md-4 service-left">
						<a href="booking.html"><img src="images/1-two.jpg" alt="">
						<h4>KIDDIE POOL COTTAGE</h4>
						<p>COTTAGES 10,11,12,13,14<br>
                           CAPACITY Good for 15 person<br>
                           PRICE: 800.00PHP</p>
						<div class="s-btn">
							<a href="index.html">lOG-IN NOW</a>
						</div>
					</div>
					<div class="col-md-4 service-left">
						<a href="booking.html"><img src="images/1-three.jpg" alt="">
						<h4>OLYMPIC POOL COTTAGE</h4>
						<p>COTTAGES 15,16,17,18,19,20,21,22<br>
                           CAPACITY Good for 15 person<br>
                           PRICE: 1000.00PHP</p>
						<div class="s-btn">
							<a href="index.html">LOG-IN NOW</a>
                            <br>
                    		<br>
                            <br>
                    		<br>
						</div>
					</div>
                    
                   <!-- <div class="col-md-4 service-left">
						<img src="images/kubo.jpg" alt="">
						<h4>KUBO</h4>
						<p>COTTAGES Hawaian,Coconut,Royal,Palmera,Phoenix<br>
                           CAPACITY Good for 15 person
                           PRICE: 1000.00PHP</p>
						<div class="s-btn">
							<a href="booking.html">BOOK NOW</a>
						</div>-->
          
		
	<!--end-services-->
	<!--start-other-->
	<!--<div class="other">
		<div class="container">
			<div class="other-main">
				<h3>OTHER SERVICES</h3>
				<div class="other-top">
					<div class="col-md-6 other-left">
						<h4>MASTER PLANNING</h4>
						<p>Aliquam congue fermentum nisl. Mauris accumsan nulla vel dia Sed in lacus ut enim adipiscin g aliquet. Nulla ve nenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula.</p>
						<div class="o-btn">
							<a href="#">Read More</a>
						</div>
					</div>
					<div class="col-md-6 other-left">
						<h4>ENVIRONMENTAL DATABASES</h4>
						<p>Nulla ve nenatis. In pede mi, aliquet sit amet, eui smod in, auctor ut, ligula. Aliqua m dapibus tinci dunt metusFusce euismod consequat ante. Lore m ipsum dolor sit amet, consectet</p>
						<div class="o-btn">
							<a href="#">Read More</a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--end-other-->
	<!--start-list-->
	<!--<div class="list">
		<div class="container">
			<div class="list-main">
				<h3>SERVICES LIST</h3>
			</div>-->
			<!--<div class="list-top">
				<!--<div class="col-md-3 list-left">
					<img src="images/l-1.jpg" alt="">
					<h4>BUSINESS PLANNING</h4>
					<ul>
						<li><a href="#">Integer vitae metus</a></li>
						<li><a href="#">Ut enim ad minim </a></li>
						<li><a href="#">Etiam aliquam fermentum</a></li>
						<li><a href="#">Sed laoreet aliquam</a></li>
						<li><a href="#">Nulla accumsan erat</a></li>
					</ul>
				</div>-->
                
				<div class="col-md-4 service1-left">
					<a href="booking.html"><img src="images/kubo.jpg" alt="">
					<h4>KUBO</h4>
					<p>
                     Hawaian,Coconut,Royal,Palmera,Phoenix<br>
                           CAPACITY Good for 15 person<br>
                           PRICE: 1000.00PHP</p>
						<div class="s-btn">
							<a href="index.html">LOG-IN NOW</a>
                            </div>
				</div>
				<div class="col-md-4 service1-left">
					<a href="booking.html"><img src="images/pavillion.jpg" alt="">
					<h4>PAVILLION</h4>
					<p>
                    Pavillion 1st and Pavillion 2nd<br>
                           CAPACITY Good for 30/40 person<br>
                           PRICE: 2500.00PHP</p>
						<div class="s-btn">
							<a href="index.html">LOG-IN NOW</a>
                            </div>
				</div>
				<div class="col-md-4 service1-left">
					<a href="booking.html"><img src="images/room.jpg" alt="">
					<h4>ROOM</h4>
					<p>
                    ROOM 1 AND ROOM 2<br>
                    CAPACITY Good for 6 PERSON<br>
                    Price start 1800-4800 PHP</p>
                    <div class="s-btn">
							<a href="index.html">LOG-IN NOW</a>
                            </div>
				</div>
				<div class="clearfix"></div>
                <br>
                <br>
                <br>
                <br>
			</div>
		</div>
	</div>
    </div>
	<!--end-list-->
	@include('includes.footer')
@stop