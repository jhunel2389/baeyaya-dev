@extends('layouts.master')

@section('head')
	@parent
	<title>Home Page</title>
@stop

@section('content')
	<!--<div id="div5">-->
	<br>
	<br>
	<br>
	<div class="banner7">
	</div>

	<div id="contents">
		<div class="box">
			<div>
			<div class="body">
				<div class="gallery" align="center">
					<!--<h1>Gallery</h1>-->
					<br>
					<br>
					<br>
					<?php $imgGallery1st = Gallery::all()->random(1); ?>                        
					<div class="preview" align="center"><img name="preview" src="{{app('customURL')}}images/{{$imgGallery1st['img_file']}}" alt=""/></div>
					<div class="thumbnails">
						<?php $imgGalleries = Gallery::all(); ?>   
						@foreach($imgGalleries as $imgGallery)                    
						<img onmouseover="preview.src=img{{$imgGallery['id']}}.src" name="img{{$imgGallery['id']}}" src="{{app('customURL')}}images/{{$imgGallery['img_file']}}" alt="" width="10%; height=20%"/>
						@endforeach
						<!--<img onmouseover="preview.src=img2.src" name="img2" src="{{app('customURL')}}images/gallery2.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img3.src" name="img3" src="{{app('customURL')}}images/gallery3.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img4.src" name="img4" src="{{app('customURL')}}images/gallery4.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img5.src" name="img5" src="{{app('customURL')}}images/gallery5.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img6.src" name="img6" src="{{app('customURL')}}images/gallery6.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img7.src" name="img7" src="{{app('customURL')}}images/gallery7.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img8.src" name="img8" src="{{app('customURL')}}images/gallery8.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img9.src" name="img9" src="{{app('customURL')}}images/gallery9.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img10.src" name="img10" src="{{app('customURL')}}images/gallery10.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img11.src" name="img11" src="{{app('customURL')}}images/gallery11.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img12.src" name="img12" src="{{app('customURL')}}images/gallery12.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img13.src" name="img13" src="{{app('customURL')}}images/gallery13.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img14.src" name="img14" src="{{app('customURL')}}images/gallery14.jpg" alt="" width="10%; height=20%"/>
						<img onmouseover="preview.src=img15.src" name="img15" src="{{app('customURL')}}images/gallery15.jpg" alt="" width="10%; height=20%"/>-->


					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
	@include('includes.footer')
@stop