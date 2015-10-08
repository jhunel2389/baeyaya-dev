@extends('layouts.master')

@section('head')
@parent
<title>reservation</title>
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
<?php 
  $id = Auth::User()['id'];
  $userInfo = UserInfo::find($id);
?>
<div class="container">
  <div class="row">
    
    <div class="col-md-12">
      <h3 class="text-uppercase sectionheading wt">test</h3>
      <div class="step_tabs text-uppercase">
        <div class="step active">Reset Password</div>

        <div style="clear:both;"></div>
      </div>
      <div class="create_event">
          <h4 class="text-uppercase nmt" style="margin-bottom:6px;font-weight:600;"></h4>
          <div class="row">
            <div class="col-md-8">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Type Password</label>
                    <input type="password" class="form-control input-sm" id="pass1" name="pass1"placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Re-type Password</label>
                    <input type="password" class="form-control input-sm" id="pass2" name="pass2"placeholder="Re-type Password" required>
                  </div>
                   <div class="form-group">
                      <button type="submit" id="next_submit" class="btn_green" onClick="resetPassword();">Reset</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
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

  function resetPassword()
  {
    $_token = "{{ csrf_token() }}";
    $pass1 = $('#pass1').val();
    $pass2 = $('#pass2').val();
    $passid = {{$passid}};
    $checkValdation = false;
    if($pass1.length == 0)
    {
      $checkValdation = true;
    }
    if($pass2.length == 0)
    {
      $checkValdation = true;
    }
    if($pass1 != $pass2)
    {
      $checkValdation = true;
    }


    if($checkValdation)
    {
      alert("Password thus not much or one of the fields are empty!,please try again");
    }
    else
    {
      $.post('{{URL::Route('postPassReset')}}',{ _token: $_token , pass1 : $pass1 , passid : $passid } , function(data)
      {
        if(data == 1)
        {
          alert("Your password is successfully reseet. you can log-in now. thank you.");
          window.location="{{URL::route('home')}}";
        }
        if(data == 2)
        {
          alert("Password reset failed. Please try again.Thank you!");
          window.location="{{URL::route('home')}}";
        }
      });
    }
  }
  
  </script>         
@stop