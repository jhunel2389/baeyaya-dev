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
                <a href="#" class="list-group-item"> <span class="badge">14</span>Adults</a>
                <a href="#" class="list-group-item"> <span class="badge">14</span>Kids</a>
                <a href="#" class="list-group-item"> <span class="badge">14</span>Cottage</a>
                <a href="#" class="list-group-item"> <span class="badge">14</span>Total Price</a>
              </div>
            </div>
            <div class="col-md-4">
              <div id="pT"class="form-group" style="position:relative;">
                <label class="control-label" for="inputDefault">Category Type</label>
                <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                <select class="form-control input-sm" id="partyTypes" name="partyTypes" style="padding-top:0px;padding-left:5px;line-height:20pt;" required>
                  <option value="" disabled selected style="display:none;">Choose type</option>
                    <option value = "1">1</option>
                </select>
              </div>
              <div id="pT"class="form-group" style="position:relative;">
                <label class="control-label" for="inputDefault">Choose type</label>
                <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                <select class="form-control input-sm" id="partyTypes" name="partyTypes" style="padding-top:0px;padding-left:5px;line-height:20pt;" required>
                  <option value="" disabled selected style="display:none;">Choose here</option>
                  
                    <option value = "1">1</option>
                  
                </select>
              </div>
              <ul class="list-unstyled nmb">
                <li class=" checkbox">
                  <label class="custom_checkbox">
                    <input type="checkbox" id="a" name="interest[]" class="css-checkbox" type="checkbox" value="" checked>
                    <span>aaa</span>
                  </label>
                </li>
                <li class=" checkbox">
                  <label class="custom_checkbox">
                    <input type="checkbox" id="a" name="interest[]" class="css-checkbox" type="checkbox" value="" checked>
                    <span>aaa</span>
                  </label>
                </li>
                <li class=" checkbox">
                  <label class="custom_checkbox">
                    <input type="checkbox" id="a" name="interest[]" class="css-checkbox" type="checkbox" value="" checked>
                    <span>aaa</span>
                  </label>
                </li>
              </ul>
              
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Email</label>
                <input type="email" class="form-control input-sm" id="eventlocality" name="eventlocality"placeholder="" required>
              </div>
              <div class="form-group">
                <label class="control-label">No. of Kids</label>
                <input type="text" class="form-control input-sm" id="eventlocality" name="eventlocality"placeholder="" required>
              </div>
              <div class="form-group">
                <label class="control-label">No. of Adults</label>
                <input type="text" class="form-control input-sm" id="eventlocality" name="eventlocality"placeholder=" " required>
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
</div>
</body>

    
 
@stop