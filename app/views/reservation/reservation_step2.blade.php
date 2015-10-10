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
  $reservation = CottageReservation::find($reserve_id);
  $getcountcheck = (count(explode(",", $reservation['cottagelist_id']))-1);
  $countRoom = (empty($reservation['room_id'])) ? 0 : 1;
  $userInfo = UserInfo::where('user_id','=',Auth::User()['id'])->first();
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="step_tabs text-uppercase">
       <h3>Reservation</h3>
      </div>
      <div class="create_event">
        <form id="eventPart1" method="post" action="{{URL::Route('postReservation')}}" enctype="multipart/form-data">
          <h1 class="text-uppercase nmt" style="margin-bottom:6px;font-weight:600;">Hi {{$userInfo['firstname']}} </h1>
          <span>This is your total computation for your reservation.</span>
          <div class="row">
            <div class="col-md-12">
               <table class="table table-bordered">
        <thead>
          <tr>
            <th><h4>Swimming Rates</h4></th>
            <th><h4>Description</h4></th>
            <th><h4>Hrs/Qty</h4></th>
            <th><h4>Rate/Price</h4></th>
            <th><h4>Sub Total</h4></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Adults</td>
            <td><a href="#">above 4 ft</a></td>
            <td class="text-right">{{$reservation['num_adult']}}</td>
             <td class="text-right">150.00 - 170.00</td>
              <td class="text-right">total</td>
          </tr>
          <tr>
            <td>Kids</td>
            <td><a href="#">below 4 ft</a></td>
            <td class="text-right">{{$reservation['num_kid']}}</td>
             <td class="text-right">120.00 - 140.00</td>
              <td class="text-right">total</td>
          </tr>
          <tr>
            <td>Cottages</td>
            <td><a href="#">-</a></td>
            <td class="text-right">{{$getcountcheck}}</td>
             <td class="text-right">600.00-4,800.00</td>
              <td class="text-right">$250.00</td>
          </tr>
           <tr>
            <td>Rooms</td>
            <td><a href="#">-</a></td>
            <td class="text-right">{{$countRoom}}</td>
             <td class="text-right">1,800.00 - 4,800</td>
              <td class="text-right">$250.00</td>
          </tr>
        </tbody>
      </table>

<div class="row text-right">
  <div class="col-xs-2 col-xs-offset-8">
    <p>
      <strong>
        Sub Total : <br>
        TAX : <br>
        Total : <br>
      </strong>
    </p>
  </div>
  <div class="col-xs-2">
    <strong>
      P{{$reservation['total_amount']}}.00<br>
      N/A <br>
      P{{$reservation['total_amount']}}.00 <br>
    </strong>
  </div>
</div>
   Total amount section
           
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@include('includes.footer')
@stop