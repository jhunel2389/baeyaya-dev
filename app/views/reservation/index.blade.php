@extends('layouts.master')

@section('head')
@parent
<title>reservation</title>
@stop

    @section('content')
    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <!-- Optional: Include the jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="jquery_ui/jquery-ui.css">
<link rel="stylesheet" href="jquery_ui/jquery-ui-timepicker-addon.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="jquery_ui/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="jquery_ui/jquery-ui-timepicker-addon-i18n.min.js"></script>
<script type="text/javascript" src="jquery_ui/jquery-ui-sliderAccess.js"></script>
<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $('#start_time').timepicker({
    timeFormat: 'hh:mm tt'
    });
  });
  </script>
    </head>
    
 <div class="banner9">
    </div>
    
    <!----//End-top-nav-script---->
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
    <div class="booking">
    
    <div class="container">
      <div class="booking-main">
        <h3>RESERVATION</h3>
                <br>
            
      
      <form class="form-horizontal" role="form">
          <div class="bglightblue editprofile_header">
          Fill Information
          </div>
        <div class="editprofile_info">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group" style="position:relative;">
                <label class="control-label">Reservation Type:</label>
                <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:7px;color:#000;pointer-events:none;"></i>
                <select class="form-control" id="rtype" style="padding-left:10px;padding-top:7px;">
                  <option value="" selected disabled style="display:none;">Choose  Type</option>
                  <?php $ReservationTypes = ReservationType::all();?>
                  @foreach($ReservationTypes as $type)
                  <option value="{{$type['id']}}">{{$type['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group" style="position:relative;">
                <label class="control-label">Cottage Type:</label>
                <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:7px;color:#000;pointer-events:none;"></i>
                <select class="form-control" id="cottageType" style="padding-left:10px;padding-top:7px;">
                </select>
              </div>
              <div>
                <div class="row" id="checklist">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label" for="inputDefault">No. of adults</label>
                <input id="adult" type="text" class="form-control input-sm" id="inputDefault" style="font-size:9pt;">
              </div>
              <div class="form-group">
                <label class="control-label" for="inputDefault">No. of kids</label>
                <input id="kid" type="text" class="form-control input-sm" id="inputDefault" style="font-size:9pt;">
              </div>
              <div class="form-group">
                <label class="control-label" for="inputDefault">Email</label>
                <input id="email" type="text" class="form-control input-sm" id="inputDefault" style="font-size:9pt;">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label class="control-label" for="inputDefault">Date</label>
                    <input id="datepicker" type="text" class="form-control input-sm" id="inputDefault" style="font-size:9pt;" placeholder="mm/dd/yyyy">
                  </div>
                  <div class="col-md-6">
                    <label class="control-label" for="inputDefault">Time</label>
                    <input id="start_time" type="text" class="form-control input-sm" id="inputDefault" style="font-size:9pt;"placeholder="hh:mm am/pm">
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <button id="compute"type="button" class="btn btn-default">Compute</button>
              <div class="list-group" id="compute_list"hidden>
                <a href="#" class="list-group-item active">
                  Cottage Total Price
                </a>
                <ul class="list-group">
                  <li class="list-group-item">
                    <span class="badge">14</span>
                    Adult Total Price
                  </li>
                  <li class="list-group-item">
                    <span class="badge">14</span>
                    Kid Total Price
                  </li>
                  <li class="list-group-item">
                    <span class="badge">14</span>
                    Total Price
                  </li>
                </ul>
                <button id="compute"type="button" class="btn btn-default">Reserve Now</button>
              </div>

            </div>
          </div>
        </div>
      </form>
    <script type="text/javascript">
    $('#compute').on('click',function(){
      $adult = $('#adult').val();
      $kid   = $('#kid').val();
      $adult = parseInt($adult)+parseInt($kid);
      $('#compute_list').show();
    });

    $('#rtype').on("change",function(data)
    {
      $rtype_id = $('#rtype').val();
      $_token = "{{ csrf_token() }}";
      $.post('{{URL::Route('getCottageType')}}',{ _token: $_token, rtype_id :$rtype_id} , function(data)
      {
        //console.log(data);
        
         if(data.length != 0)
        {
          $('#cottageType').empty();
          for (var i = 0; i < data.length; i++) 
          {
             
             if(i == 0)
             {
              $('#cottageType').append('<option selected value="" disabled style="display:none;">Choose Type</option>');
             }
            $('#cottageType').append('<option value="'+data[i].Cottage_ID+'">'+data[i].description+'</option>');
          }
            $('#cottageType').on("change",function(data)
            {
              $cottageType = $('#cottageType').val();
              $_token = "{{ csrf_token() }}";
              $.post('{{URL::Route('getCottagelist')}}',{ _token: $_token, cottageType :$cottageType} , function(data)
              {
                console.log(data);
                if(data.length != 0)
                {
                  $('#checklist').empty();
                  $('#checklist').append('<h5>Choose Cottage</h5>');
                  for (var i = 0; i < data.length; i++) 
                  {
                   // $('#cottagelist').append('<option value="'+data[i].cottage_list+'">'+data[i].name+'</option>');
                   $('#checklist').append('<div class="col-md-4">\
                                              <div class="checkbox">\
                                                <label>\
                                                  <input type="checkbox"> '+data[i].name+'\
                                                </label>\
                                              </div>\
                                            </div>');
                  }
                  $('input[type=checkbox]').on('change', function (e) {
                      if ($('input[type=checkbox]:checked').length > 3) {
                          $(this).prop('checked', false);
                          alert("allowed only 3 cottages");
                      }
                  });
                }
                else
                {
                  $('#checklist').empty();
                  $('#checklist').append('<label>No available cottages</label>');
                }

              });
              
            });
        }
        else
        {
          $('#cottagelist').append('<option value="">No list</option>');
        }
      });
    });

    </script>
@stop