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
      <h3 class="text-uppercase sectionheading wt">Reservation</h3>
      <div class="step_tabs text-uppercase">
        <div class="step">Step 1</div>
        <div class="step active">Step 2</div>
        <div class="step">Step 3</div>
        <div style="clear:both;"></div>
      </div>
      <div class="create_event">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Enter Verification Code here</label>
              <input type="text" class="form-control input-sm" id="code" name="code"placeholder="" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label"></label>
            <button type="submit" id="next_submit" class="btn_green">submit</button>
            </div>
          </div>
        {{Form::token()}}
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
</script>

    
@include('includes.footer')
@stop