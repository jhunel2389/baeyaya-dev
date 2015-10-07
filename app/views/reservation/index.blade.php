@extends('layouts.master')

@section('head')
@parent
<title>reservation</title>
@stop

@section('content')
  <head>
    <link href="{{app('customURL')}}css/chat_emoti_bar.css" rel="stylesheet">
    <link href="{{app('customURL')}}css/custom_bootstrap.css" rel="stylesheet">
    <link href="{{app('customURL')}}css/custom_styles.css" rel="stylesheet">
    <link href="{{app('customURL')}}css/update.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.3.0/flatly/bootstrap.min.css">
    <!-- Optional: Include the jQuery library -->
    <link rel="stylesheet" href="{{app('customURL')}}jquery_ui/jquery-ui.css">
    <link rel="stylesheet" href="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon-i18n.min.js"></script>
    <script type="text/javascript" src="{{app('customURL')}}jquery_ui/jquery-ui-sliderAccess.js"></script>
    <!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
    <script src="{{app('customURL')}}js/jquery.raty.js"></script>
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{app('customURL')}}js/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript">
    $(function() {
    $( '#event_start' ).datepicker({
    'formatDate': 'Y-m-d H:i:s'

    });

    $( '#event_end' ).datepicker({
    'formatDate': 'Y-m-d H:i:s'

    });

    $('#time_start').timepicker({
    timeFormat: 'hh:mm tt'
    });
    $('#time_end').timepicker({
    timeFormat: 'hh:mm tt'
    });
    });</script>
  </head>
  <body>
<div class="container">
  <div class="row">
    
    <div class="col-md-12">
      <h3 class="text-uppercase sectionheading wt">test</h3>
      <div class="step_tabs text-uppercase">
        <div class="step active">Step 1</div>
        <div class="step">Step 2</div>
        <div class="step">Step 3</div>
        <div style="clear:both;"></div>
      </div>
      <div class="create_event">
        <form id="eventPart1"class="" method="post" action="" enctype="multipart/form-data">
          <h4 class="text-uppercase nmt" style="margin-bottom:6px;font-weight:600;"></h4>
          <div class="row">
            <div class="col-md-4" id="eventPicture-to-upload">
              <div class="list-group">
                <a href="#" class="list-group-item active">
                Computation
                </a>
                <a href="#" class="list-group-item"> <span class="badge">0</span>Adults</a>
                <a href="#" class="list-group-item"> <span class="badge">0</span>Kids</a>
                <a href="#" class="list-group-item"> <span class="badge">0</span>Cottage</a>
                <a href="#" class="list-group-item"> <span class="badge">0</span>Total Price</a>
              </div>
              <button type="button" id="compute" class="btn_green">Compute</button>
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
              <ul class="list-unstyled nmb" id="list">
              </ul>
              
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">No. of Kids</label>
                <input type="text" class="form-control input-sm" id="kid" name="kid"placeholder="" required>
              </div>
              <div class="form-group">
                <label class="control-label">No. of Adults</label>
                <input type="text" class="form-control input-sm" id="adult" name="adult"placeholder=" " required>
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input type="email" class="form-control input-sm" id="eventlocality" name="eventlocality"placeholder="" required>
              </div>
                <div class="row" style="margin:0px -5px !important;">
                <div class="col-md-6" style="padding:0px 5px !important;">
                  <div class="form-group">
                    <label class="control-label" for="inputDefault">start</label>
                    <input type="text" class="form-control input-sm" id="event_start"name="event_start" style="font-size:9pt;" placeholder=" "required>
                    
                  </div>
                </div>
                <div class="col-md-6" style="padding:0px 5px !important;">
                  <div class="form-group">
                    <label class="control-label" for="inputDefault">start time</label>
                    <input type="text" class="form-control input-sm" id="time_start" name="time_start" style="font-size:9pt;" placeholder=" " required>
                  </div>
                </div>
              </div>
              <div class="row" style="margin:0px -5px !important;">
                <div class="col-md-6" style="padding:0px 5px !important;">
                  <div class="form-group">
                    <label class="control-label" for="inputDefault">end</label>
                    <input type="text" class="form-control input-sm" id="event_end" name="event_end" style="font-size:9pt;" placeholder="" required>
                  </div>
                </div>
                <div class="col-md-6" style="padding:0px 5px !important;">
                  <div class="form-group">
                    <label class="control-label" for="inputDefault">end time</label>
                    <input type="text" class="form-control input-sm" id="time_end" name="time_end" style="font-size:9pt;" placeholder="" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" id="next_submit" class="btn_green">Reserve</button>
      </form>
    </div>
  </div>
  <input type="text" class="form-control" id="checkCottage" name="checkCottage" placeholder="">
</div>
</body>
<script type="text/javascript">
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
  });

  //alert($adult);

});
</script>

    
@include('includes.footer')
@stop