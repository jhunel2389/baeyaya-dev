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
    <div class="col-md-12">
        @if(Auth::Check())
        <div class="bglightblue gen_panel_header">
                Create Testimonials
        </div>
        <div class="gen_panel_body">
            <form method="post" action="{{URL::Route('postTestimonials')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">Got an testimonials? Tell us here!</label>
                    <textarea class="form-control input-sm" id="txt" name="txt" style="height:161px;resize:none;" placeholder="enter testimonials"></textarea>
                </div>
                <div style="margin-top:20px;">
                    <button type="submit" id="newAnn" class="btn_darkblue">Submit</button>
                </div>
                {{Form::token()}}
            </form>
        </div>
        @endif
    	<div class="editprofile_info">
            <div class="bggreen notification_header">
                Testimonials
            </div>
            <div class="friendrequest_list">
                <?php $testimonials = Testimonials::all();?>
                @if(count($testimonials) != 0)
                    @foreach($testimonials as $testimonial)
                    <?php $userInfo = UserInfo::where('user_id','=',$testimonial['user_id'])->first();?>
                    <div class="friendrequest_row">
                        <div class="notification_content">
                            <span>{{$userInfo['firstname']}},{{$userInfo['lastname']}}</span>
                            <p>{{$testimonial['testimonials']}}</p>
                            <span>created at: {{$testimonial['created_at']}}</span>
                        </div>
                        @if(Auth::User()['isAdmin'] == 1 || $userInfo['user_id'] == Auth::User()['id'])
                        <a class="notification_action" href="javascript:void(0);" data-id="">
                            <i class="demo-icon icon-remove-user">&#xe806;</i>
                        </a>   
                        @endif
                    </div>
                    @endforeach
                @else
                <label>No Testimonials</label>
                @endif
            </div>
        </div>  
    </div>
  </div>
</div>
	@include('includes.footer')
@stop