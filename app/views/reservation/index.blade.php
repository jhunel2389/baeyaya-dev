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
        <div class="step active">Reservation Form</div>
        <!--
        <div class="step">Step 2</div>
        <div class="step">Step 3</div>-->
        <div style="clear:both;"></div>
      </div>
      <div class="create_event">
        <form id="eventPart1" method="post" action="{{URL::Route('postReservation')}}" enctype="multipart/form-data">
          <h4 class="text-uppercase nmt" style="margin-bottom:6px;font-weight:600;"></h4>
          <div class="row">
            <div class="col-md-4" id="eventPicture-to-upload">
              <div class="list-group">
                <a href="#" class="list-group-item active">
                Computation
                </a>
                <a href="#" class="list-group-item"> <span class="badge" id="aTotal">0</span>Adults</a>
                <a href="#" class="list-group-item"> <span class="badge"id="kTotal">0</span>Kids</a>
                <a href="#" class="list-group-item"> <span class="badge" id="cTotal">0</span>Cottage</a>
                <a href="#" class="list-group-item"> <span class="badge"id="total">0</span>Total Price</a>
              </div>
              <button type="button" id="compute" class="btn_green">Compute</button>
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="form-group">
                  <label class="control-label" for="inputDefault">Choose Day</label>
                  <ul class="list-unstyled nmb">
                    <li class=" checkbox">
                      <label >
                        <input type="radio" id="1" name="day" class="css-checkbox"  value="1">
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
                  <input type="hidden" name="chosenDay"id="chosenDay" value="1">
                </div>
                <div class="col-md-4">
                  <?php $reservationTypes = ReservationType::all();?>
                  <div id="pT"class="form-group" style="position:relative;">
                    <label class="control-label" for="inputDefault">Reservation Type</label>
                    <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                    <select class="form-control input-sm" id="rType" name="rType" style="padding-top:0px;padding-left:5px;line-height:20pt;" required>
                      <option value="" disabled selected style="display:none;">Choose type</option>
                      @foreach($reservationTypes as $type)
                        <option value = "{{$type['id']}}">{{$type['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div id="pT"class="form-group" style="position:relative;">
                    <label class="control-label" for="inputDefault">Category type</label>
                    <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                    <select class="form-control input-sm" id="cType" name="cType" style="padding-top:0px;padding-left:5px;line-height:20pt;" required>
                      <option value="" disabled selected style="display:none;">Choose here</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control input-sm" id="email" name="email"placeholder="" value="{{$userInfo['email']}}"required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">No. of Kids</label>
                    <input type="text" class="form-control input-sm" id="kid" name="kid"placeholder="" onkeypress="return isNumber(event)"required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">No. of Adults</label>
                    <input type="text" class="form-control input-sm" id="adult" name="adult"placeholder=" " onkeypress="return isNumber(event)"required>
                  </div>
                  <div class="row" style="margin:0px -5px !important;">
                    <div class="col-md-6" style="padding:0px 5px !important;">
                      <div class="form-group">
                        <label class="control-label" for="inputDefault">Date</label>
                        <input type="text" class="form-control input-sm" id="date"name="date" style="font-size:9pt;" placeholder=" "required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  choose cottage or room here
                  <ul class="list-unstyled nmb" id="list">
                    No display
                  </ul>
                  <input type="hidden" class="form-control" id="checkCottage" name="checkCottage" placeholder="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" id="next_submit" class="btn_green">Reserve</button>
        {{Form::token()}}
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
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
  $rtype_id = $('#rType').val();
  $_token = "{{ csrf_token() }}";
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
});
$(document).on("click","#cType",function() {
  $cottageType = $('#cType').val();
  $_token = "{{ csrf_token() }}";
  $.post('{{URL::Route('getCottagelist')}}',{_token:$_token, cottageType:$cottageType},function(data)
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
  var ctype =$("#cType").val();
  var kid = $('#kid').val();
  var adult = $('#adult').val();
  var check = $("#checkCottage").val();
  $_token = "{{ csrf_token() }}";
  $.post('{{URL::Route('compute')}}',{_token:$_token, kid:kid,adult:adult,check:check,ctype:ctype},function(data){
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
</script>

    
@include('includes.footer')
@stop