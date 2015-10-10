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
    <br>
    <br>
   <p>
          Payment Policy<br>
 
•     50% of the total bill shall be made upon guest’s reservation through bank provided by Kalugdan Garden Resort. Payment must only in a form of Philippine Peso.<br>
•     50% balance payment upon check-in<br>

 
Check-in:<br>
•     Regular Check-in time in Cottage for Day-Swimming is 8:00am.<br>
•     Regular Check-in time in Cottage for Overnight-Swimming is 6:00pm.<br>
 
Check-out:<br>
 
•    Regular Check-out time in Cottage for Day-Swimming is 5:00pm.<br> 
•    Regular Check-out time in Cottage for Overnight Swimming is 4:00am.<br> 
•    There will be an additional fee of 200 pesos of the total guest’s bill for every hour extension for room.<br>
•    Another Transaction for cottage if the guest wants to extend.
 
Children Policy:<br>
•     Children 4 ft. below consider as kid rate. Children above 4ft are considered as adult rate.<br>
•     2 yrs. Old below are free.<br>

Key <br>
•     We will be issuing 1 key for every single room.<br>
•     The guest/s is/are obliged to return the key upon check-out. There will be a charge of Php.500.00 for every lost or damaged key.<br>
 
Cancellation and Reschedule Policy<br>
•  In case of no-show and cancel reservation, NO REFUND Policy.<br>
•  Rescheduling of reservation allowed when 50% down payment done.<br>
•  Rescheduling of reservation is allowed 3 days prior upon arrival.<br>
•  Only once allowed to reschedule the reservation.<br>
  
Pet Policy<br>
•     No pets allowed.<br>
•     We don’t provide lodge for pet.<br>


Kalugdan Garden Resort Rules<br>

• The resort is not liable for any loss, injury, death, accident, or damage sustained. However the resort shall its best to safeguard the interest of the customer. The resorts liability is in all cases shall be limited and to be based on the cost paid to the resort.<br>

</p>
  </div>
</div>
<script type="text/javascript">

    
@include('includes.footer')
@stop