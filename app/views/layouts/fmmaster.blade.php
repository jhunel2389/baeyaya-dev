<!doctype html>
<html lang="en">
<head>
	@section('head')
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

     <link href="{{app('customURL')}}css/chat_emoti_bar.css" rel="stylesheet">
    <!--<link href="{{app('customURL')}}css/custom_bootstrap.css" rel="stylesheet">-->
    <link href="{{app('customURL')}}css/custom_styles.css" rel="stylesheet">
    <link href="{{app('customURL')}}css/update.css" rel="stylesheet">
    <link rel="stylesheet" href="{{app('customURL')}}jquery_ui/jquery-ui.css">
    <link rel="stylesheet" href="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon.css">
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
	@show
</head>
<body>
<div class="container">
	@if(Session::has('success'))
		<div class="alert alert-success">{{Session::get('success')}}</div>
	@elseif (Session::has('fail'))
		<div class="alert alert-danger">{{Session::get('fail')}}</div>
	@endif
	 <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Transaction</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <!--<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filemaintenance <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Update Content</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
            </ul>
          </li>-->
          <li><a href="{{ URL::Route('home') }}">Home</a></li>
          <li><a href="{{ URL::Route('getFM') }}">Users</a></li>
          <li><a href="{{ URL::Route('getBanners') }}">Banners</a></li>
          <li><a href="{{ URL::Route('getFMNews') }}">News</a></li>
          <li><a href="{{ URL::Route('getFMGallery') }}">Gallery</a></li>
          <li><a href="{{ URL::Route('getFMWalkin') }}">Walk-in</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
	@yield('content')
	@section('javascript')
		
	@show
</div>
</body>
</html>
