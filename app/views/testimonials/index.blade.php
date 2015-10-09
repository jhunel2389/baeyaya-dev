@extends('layouts.master')

@section('head')
	@parent
	<title>Home Page</title>
@stop
@section('addHead')
    <link href="{{app('customURL')}}css/chat_emoti_bar.css" rel="stylesheet">
    <!--<link href="{{app('customURL')}}css/custom_bootstrap.css" rel="stylesheet">-->
    <link href="{{app('customURL')}}css/custom_styles.css" rel="stylesheet">
    <link href="{{app('customURL')}}css/update.css" rel="stylesheet">
    <link rel="stylesheet" href="{{app('customURL')}}jquery_ui/jquery-ui.css">
    <link rel="stylesheet" href="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon-i18n.min.js"></script>
    <script type="text/javascript" src="{{app('customURL')}}jquery_ui/jquery-ui-sliderAccess.js"></script>
     <!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
    <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
    <!-- Fontawesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
    $(function() {
    $( '#date' ).datepicker({
    'formatDate': 'Y-m-d H:i:s'

    });

    $('#time').timepicker({
    timeFormat: 'hh:mm tt'
    });
    });
    </script>
@stop
@section('content')
<br><br><br><br><br><br><br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-9">
    	<div style="background:#fff;padding:10px;border-radius:0px 0px 8px 8px;">
			<div class="messages_right_dock">
				<div class="messages_wrapper" id="pleaseScroll">
					<ul class="list-unstyled messages_content">
						<div id="chat-window">
							<li>
								<span class="user_name">Alden Richard</span>
								<span class="send_timestamp">9/5/2015</span>
								<p>Ang pogi ko pows..</p>
							</li>
							<li>
								<span class="user_name">Maine Mendoza</span>
								<span class="send_timestamp">9/5/2015</span>
								<p>Uu po..</p>
							</li>
						</div>
					</ul>
				</div>
			</div>
		</div>
    </div>
  </div>
</div>
	@include('includes.footer')
@stop