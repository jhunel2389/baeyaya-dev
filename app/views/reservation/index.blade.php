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
       <h3>Reservation</h3>
      </div>
      <div class="create_event">
        <form id="eventPart1" method="post" action="{{URL::Route('postReservation')}}" enctype="multipart/form-data">
          <h4 class="text-uppercase nmt" style="margin-bottom:6px;font-weight:600;"></h4>
          <div class="row">
            <div class="col-md-4" id="eventPicture-to-upload">
               <div class="row" style="margin:0px -5px !important;">
                  <div class="col-md-6" style="padding:0px 5px !important;">
                    <div class="form-group">
                      <label class="control-label" for="inputDefault">Date</label>
                      <input type="text" class="form-control input-sm" id="date"name="date" style="font-size:9pt;" placeholder=" ">
                      <input type="hidden" id="seasoncode" name="seasoncode">
                    </div>
                  </div>
                  <div class="col-md-6" style="padding:0px 5px !important;">
                  <div class="form-group" id="forTime">
                    <label class="control-label" for="inputDefault">Time</label>
                    <input type="text" class="form-control input-sm" id="time" name="time" style="font-size:9pt;" placeholder="time" >
                  </div>
                </div>
                </div>
                <?php $reservationTypes = ReservationType::all();?>
                  <div id="pT"class="form-group" style="position:relative;">
                    <label class="control-label" for="inputDefault">Reservation Type</label>
                    <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                    <select class="form-control input-sm" id="rType" name="rType" style="padding-top:0px;padding-left:5px;line-height:20pt;" >
                      <option value="" disabled selected style="display:none;">Choose type</option>
                      @foreach($reservationTypes as $type)
                        <option value = "{{$type['id']}}">{{$type['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div id="forCottage">
                    <div id="pT"class="form-group" style="position:relative;">
                      <label class="control-label" for="inputDefault">Category type</label>
                      <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                      <select class="form-control input-sm" id="cType" name="cType" style="padding-top:0px;padding-left:5px;line-height:20pt;" >
                        <option value="" disabled selected style="display:none;">Choose here</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Email</label>
                      <input type="email" class="form-control input-sm" id="email" name="email"placeholder="" value="{{$userInfo['email']}}" >
                    </div>
                     <div class="form-group">
                      <label class="control-label">No. of Kids</label>
                      <input type="text" class="form-control input-sm" id="kid" name="kid"placeholder="" onkeypress="return isNumber(event)">
                    </div>
                    <div class="form-group">
                      <label class="control-label">No. of Adults</label>
                      <input type="text" class="form-control input-sm" id="adult" name="adult"placeholder=" " onkeypress="return isNumber(event)">
                    </div>
                  </div>
                  <div id="forRoom">
                     <div id="pT"class="form-group" style="position:relative;">
                      <label class="control-label" for="inputDefault">Room</label>
                      <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                      <select class="form-control input-sm" id="room" name="room" style="padding-top:0px;padding-left:5px;line-height:20pt;" >
                        <option value="" disabled selected style="display:none;">Choose room</option>
                        <?php $rooms = Room::all();?>
                        @foreach($rooms as $room)
                          <option value = "{{$room['rnid']}}">{{$room['roomname']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div id="pT"class="form-group" style="position:relative;">
                      <label class="control-label" for="inputDefault">Room Package</label>
                      <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                      <select class="form-control input-sm" id="roomPackage" name="roomPackage" style="padding-top:0px;padding-left:5px;line-height:20pt;" >
                        <option value="" disabled selected style="display:none;">Choose package</option>
                        <?php $roomPackages = RoomPackage::all();?>
                        @foreach($roomPackages as $package)
                          <option value = "{{$package['packid']}}">{{$package['description']}} -   Rate:{{$package['Hours']}} HRS </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group"  >
                      <input type="checkbox" id="add" name="" >
                      <span >Add addtional</span>
                    </div>
                  </div>
            </div>
            <div class="col-md-4" >
              <div id="forDay">
                <div class="form-group">
                  <label class="control-label" for="inputDefault">Choose Day</label>
                  <ul class="list-unstyled nmb">
                    <li class=" checkbox">
                      <label>
                        <input type="radio" id="1" name="day" class="css-checkbox"  value="1" checked>
                        <span>Morning</span>
                      </label>
                    </li>
                    <li class=" checkbox">
                      <label >
                        <input type="radio" id="2" name="day" class="css-checkbox"  value="2">
                        <span>Overnight</span>
                      </label>
                    </li>
                  </ul>
                  <input type="hidden" name="chosenDay" id="chosenDay" value="1">
                </div>
                <!--new -->
                <span id="season">
                  Regular Day
                </span>
                <br>
                 choose cottage or room here
                <ul class="list-unstyled nmb" id="list">
                  No display
                </ul>
                <!--new -->
                <input type="hidden" class="form-control" id="checkCottage" name="checkCottage" placeholder="">
              </div>

                
                 <div id="additional">
                    <div class="form-group">
                      <label class="control-label">Additional Person</label>
                      <input type="text" class="form-control input-sm" id="addPerson" name="addPerson"placeholder="" onkeypress="return isNumber(event)">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Extra Bed</label>
                      <input type="text" class="form-control input-sm" id="addBed" name="addBed"placeholder="" onkeypress="return isNumber(event)">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Extra Linen</label>
                      <input type="text" class="form-control input-sm" id="addLinen" name="addLinen"placeholder="" onkeypress="return isNumber(event)">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Extra Towel</label>
                      <input type="text" class="form-control input-sm" id="addTowel" name="addTowel"placeholder="" onkeypress="return isNumber(event)">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Extra Pillow</label>
                      <input type="text" class="form-control input-sm" id="addPillow" name="addPillow"placeholder="" onkeypress="return isNumber(event)">
                    </div>

                 </div>
              </div>
              <div class="col-md-4" >
                 <div class="list-group">
                  <a href="#" class="list-group-item active">
                  Computation
                  </a>
                  <div id="forCompute">
                  <a href="#" class="list-group-item"> <span class="badge" id="aTotal">0</span>Adults</a>
                  <a href="#" class="list-group-item"> <span class="badge"id="kTotal">0</span>Kids</a>
                  <a href="#" class="list-group-item"> <span class="badge" id="cTotal">0</span>Cottage</a>
                  <a href="#" class="list-group-item"> <span class="badge"id="total">0</span>Total Price</a>
                  <button type="button" id="compute" class="btn_green">Compute</button>
                  </div>
                  <div id="forComputeRoom">
                  <a href="#" class="list-group-item"> <span class="badge" id="rTotal">0</span>Room</a>
                  <a href="#" class="list-group-item"> <span class="badge"id="atotal">0</span>Additional Charges</a>
                  <a href="#" class="list-group-item"> <span class="badge"id="gtotal">0</span>Total Price</a>
                  <button type="button" id="computeRoom" class="btn_green">Compute</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="checkbox" id="term" name="" class=""  value="">
            <span>Accept terms and condition</span>
            <a target="_blank" href="{{URL::Route('getTerm')}}" >view here</a>
          </div>
        </div>
        <button type="submit" id="next_submit" class="btn_green" disabled>Reserve</button>
        {{Form::token()}}
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).on("click","#next_submit",function(event) {
    if ($.trim($('#date').val()) == "")
    {
      event.preventDefault(); 
      alert('please fill date.')
       
    }
    if ($.trim($('#rType').val()) == "")
    {
       event.preventDefault(); 
      alert('please choose reserve type.')
      
    }
  });
  $(document).ready(function() {
    $('#forRoom').hide();
    $('#additional').hide();
    $('#forAddtional').hide();
    $('#forComputeRoom').hide();
    $('#forTime').hide();
  });
  $(document).on("change","#add",function() {
    if($(this).is(":checked"))
    {
       $('#additional').show();
       $('#addPerson').val('');
       $('#addBed').val('');
       $('#addLinen').val('');
       $('#addTowel').val('');
       $('#addPillow').val('');
    }
    else
    {
        $('#additional').hide();
       $('#addPerson').val('');
       $('#addBed').val('');
       $('#addLinen').val('');
       $('#addTowel').val('');
       $('#addPillow').val('');
    }
  });
  $(document).on("change","#term",function() {

    if($(this).is(":checked"))
    {
      $('#next_submit').prop('disabled', false);
    }
    else
    {
       $('#next_submit').prop('disabled', true);
    }
  });
 $('#date').datepicker({
    inline: true,
    dateFormat: "mm/dd/yy",
    changeFirstDay: false,
    minDate: +7
  });


  $('input[name="day"]').click(function(){
    var id = $(this).attr("id");
    $("#chosenDay").empty();
    $("#chosenDay").val(id);
  });

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
$(document).on("click","#rType",function() {
  $date = $('#date').val();
  $rtype_id = $('#rType').val();
  $_token = "{{ csrf_token() }}";
  if($rtype_id == "2")
  {

    $('#forTime').show();
    $('#time').val('');
    $("#add").prop('checked', false);
    $('#forAddtional').show();
    $('#forCottage').hide();
    $('#forRoom').show();
    $('#forDay').hide();
    $('#forCompute').hide();
    $("#add").prop("disabled", false);
    $('#forComputeRoom').show();
     $.post('{{URL::Route('getRoom')}}',{_token:$_token, rtype_id:$rtype_id,date:$date},function(data)
    {
      console.log(data);
      if(data.length != 0)
      {
         $('#room').empty();
        for (var i = 0; i < data.length; i++) {
          if(i==0)
          {
            $('#room').append('<option value="" disabled selected style="display:none;">Choose room</option>');
          }
          $('#room').append('<option value = "'+data[i].id+'">'+data[i].name+'</option>');
        }
      }
      else
      {
        $('#room').empty();
        $('#room').append('<option value = "">No more available room for this day.</option>');
      }
     
    });
    
  }
  else
  {
     $('#forTime').hide();
     $('#time').val('');
    $('#forComputeRoom').hide();
    $("#add").prop('checked', false);
    $('#addPerson').val('');
    $('#addBed').val('');
    $('#addLinen').val('');
    $('#addTowel').val('');
    $('#addPilow').val('');
    $('#additional').hide();
    $('#forRoom').hide();
    $('#forCompute').show();
    $('#forDay').show();
    $('#forCottage').show();
    $.post('{{URL::Route('getCottageType')}}',{_token:$_token, rtype_id:$rtype_id},function(data)
    {
      console.log(data);
      if(data.length != 0)
      {
        $('#cType').empty();
        for (var i = 0; i < data.length; i++) {
          if(i==0)
          {
            $('#cType').append('<option value="" disabled selected style="display:none;">Choose type</option>');
          }
          $('#cType').append('<option value = "'+data[i].Cottage_ID+'">'+data[i].description+'</option>');
        }
      } 
    });
  }
});
$(document).on("change","#date",function() {
  $date = $('#date').val();
  $cottageType = $('#cType').val();
  $_token = "{{ csrf_token() }}";
  if($date == "")
  {
    alert('please fill date.');
  }
  else
  {
    $.post('{{URL::Route('getCottagelist')}}',{_token:$_token, cottageType:$cottageType,date:$date},function(data)
  {
    console.log(data);
    if(data.length != 0)
    {
     $('#list').empty();
      for (var i = 0; i < data.length; i++) {
        if(data[i].name != "")
        {
          $('#list').append(' <li class=" checkbox">\
            <label class="custom_checkbox">\
              <input type="checkbox" id="'+data[i].cottage_list+'" name="interest[]" class="css-checkbox"  value="'+data[i].cottage_list+'">\
              <span>'+data[i].name+'</span>\
            </label>\
          </li>');
        }
        else
        {
          $('#list').empty();
          $('#list').append('<label>No available cottage or room.</label>');
        }

        //new
        if(i==0)
        {
          $('#season').empty();
          if(data[i].season == 1)
          {
            $('#season').append('<label>'+data[i].details+'</label>');
          }
          else if(data[i].season == 2)
          {
            $('#season').append('<label>'+data[i].details+'</label>');
          }
          else if(data[i].season == 3)
          {
            $('#season').append('<label>'+data[i].details+'</label>');
          }

          $('#seasoncode').val(data[i].season);
        }
        //new
      }
    } 
    else
    {
      $('#list').empty();
      $('#list').append('<label>No available cottage or room.</label>');
    }
  });
  }

});
$(document).on("click","#cType",function() {
  $date = $('#date').val();
  $cottageType = $('#cType').val();
  $_token = "{{ csrf_token() }}";
  if($date == "")
  {
    alert('please fill date.');
  }
  else
  {
    $.post('{{URL::Route('getCottagelist')}}',{_token:$_token, cottageType:$cottageType,date:$date},function(data)
  {
    console.log(data);
    if(data.length != 0)
    {
      $('#list').empty();
      for (var i = 0; i < data.length; i++) {
        $('#list').append(' <li class=" checkbox">\
                  <label class="custom_checkbox">\
                    <input type="checkbox" id="'+data[i].cottage_list+'" name="interest[]" class="css-checkbox"  value="'+data[i].cottage_list+'">\
                    <span>'+data[i].name+'</span>\
                  </label>\
                </li>');
      }
    } 
    else
    {
      $('#list').empty();
      $('#list').append('<label>No available cottage or room.</label>');
    }
  });
  }
  
});
$(document).on("change",".custom_checkbox input",function(){
    var $cs=$(this).closest('.list-unstyled ').find(':checkbox:checked');
    if ($cs.length > 3) {
        this.checked=false;
    }
    var id = $(this).attr("id");
    if($(this).is(":checked"))
    {
      if($("#checkCottage").val().length <= 0)
      {
        $("#checkCottage").val(","+id);
      }
      else
      {
        var current_val = $("#checkCottage").val();
        var new_val = current_val+","+id;
        $("#checkCottage").val(new_val);
      }
    }
    else
    {
      var strValue = $("#checkCottage").val();
      strValue = strValue.replace(","+id,'');
      $("#checkCottage").val(strValue);
    }
  });
$(document).on("click","#compute",function(){
  var seasoncode = $('#seasoncode').val();
  var day = $('#chosenDay').val();
  var ctype =$("#cType").val();
  var kid = $('#kid').val();
  var adult = $('#adult').val();
  var check = $("#checkCottage").val();
  $_token = "{{ csrf_token() }}";
  $.post('{{URL::Route('compute')}}',{_token:$_token, kid:kid,adult:adult,check:check,ctype:ctype,day:day,seasoncode:seasoncode},function(data){
    console.log(data);
    $("#aTotal").empty();
    $("#kTotal").empty();
    $("#cTotal").empty();
    $("#total").empty();
    $("#aTotal").html(data.adultprice);
    $("#kTotal").html(data.kidprice);
    $("#cTotal").html(data.cottageprice);
    $("#total").html(data.total);
  });

  //alert($adult);

});

$(document).on("click","#computeRoom",function(){

  var roomPackage = $('#roomPackage').val();
  var addPerson =$("#addPerson").val();
  var addBed = $('#addBed').val();
  var addLinen = $('#addLinen').val();
  var addTowel = $("#addTowel").val();
   var addPillow = $("#addPillow").val();
  $_token = "{{ csrf_token() }}";
  $.post('{{URL::Route('computeRoom')}}',{_token:$_token, roomPackage:roomPackage,addPerson:addPerson,addBed:addBed,addLinen:addLinen,addTowel:addTowel,addPillow:addPillow},function(data){
    console.log(data);
    $("#rTotal").empty();
    $("#atotal").empty();
    $("#gtotal").empty();
    $("#rTotal").html(data.roomPrice);
    $("#atotal").html(data.addCharges);
    $("#gtotal").html(data.total);
  });

  //alert($adult);

});
</script>

    
@include('includes.footer')
@stop