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
        <form id="frm_pass_reset" method="post" action="#">
          <h4 class="text-uppercase nmt" style="margin-bottom:6px;font-weight:600;"></h4>
          <div class="row">
            <div class="col-md-8">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Type Password</label>
                    <input type="password" class="form-control input-sm" id="pass1" name="pass1"placeholder="Password"required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Re-type Password</label>
                    <input type="password" class="form-control input-sm" id="pass2" name="pass2"placeholder="Re-type Password"required>
                  </div>
                   <div class="form-group">
                      <button type="submit" id="next_submit" class="btn_green">Reset</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@include('includes.footer')
@stop