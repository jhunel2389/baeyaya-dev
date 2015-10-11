@extends('layouts.fmmaster')
@section('head')
  @parent
  <title>Home Page</title>
@stop
@section('addHead')
<link rel="stylesheet" href="{{app('customURL')}}jquery_ui/jquery-ui.css">
    <link rel="stylesheet" href="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="{{app('customURL')}}jquery_ui/jquery-ui-timepicker-addon-i18n.min.js"></script>

@stop

@section('content')

  <div class="container">
    <div class="row">
      <h2>Reservation</h2>
        <p></p>                                                                                      
        <div class="table-responsive"> 
        <div class="col-md-4">
          <?php $reservationTypes = ReservationType::all();?>
          <div id="pT"class="form-group" style="position:relative;">
            <label class="control-label" for="inputDefault">Filter by reservation type:</label>
            <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
            <select class="form-control input-sm" id="rType" name="rType" style="padding-top:0px;padding-left:5px;line-height:20pt;" >
              <option value="" disabled selected style="display:none;">Choose type</option>
              @foreach($reservationTypes as $type)
                <option value = "{{$type['id']}}">{{$type['name']}}</option>
              @endforeach
            </select>
          </div>
        </div>  
        <div class="col-md-4">
          <?php $status = Status::all();?>
          <div id="pT"class="form-group" style="position:relative;">
            <label class="control-label" for="inputDefault">Filter by status:</label>
            <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
            <select class="form-control input-sm" id="sType" name="sType" style="padding-top:0px;padding-left:5px;line-height:20pt;" >
              <option value="" disabled selected style="display:none;">Choose status</option>
              @foreach($status as $stat)
                <option value = "{{$stat['status']}}">{{$stat['status']}}</option>
              @endforeach
            </select>
          </div>
        </div>       
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Reservation Type</th>
              <th>Date</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody id="list">
            <?php $transactions = CottageReservation::all();?>
            @foreach($transactions as $transaction)
            <script type="text/javascript">
              $(function() {
              $( '#date'+{{$transaction['id']}}).datepicker({
              'formatDate': 'Y-m-d H:i:s'

                });
              });
              </script>
            <?php $userInfo = UserInfo::where('user_id','=',$transaction['user_id'])->first();
            $reservation_type= ReservationType::find($transaction['reservation_type']);
            ?>
              <tr>
                <td>{{$transaction['id']}}</td>
                <td>{{$userInfo['firstname']}}</td>
                <td>{{$userInfo['lastname']}}</td>
                <td>{{$reservation_type['name']}}</td>
                <td><div class="form-group">
                      <input type="text" class="form-control input-sm" data-type="{{$transaction['reservation_type']}}"data-id="{{$transaction['id']}}"value="{{$transaction['reservation_date']}}"id="date{{$transaction['id']}}"name="date" style="font-size:9pt;" placeholder="{{$transaction['reservation_date']}}">
                    </div></td>
                    <script type="text/javascript">
                      $(document).on("change","#date{{$transaction['id']}}",function() {
                     
                        $id = $(this).data("id");
                        $type = $(this).data("type");
                        $_token   = "{{ csrf_token() }}";
                        $date = $('#date'+{{$transaction['id']}}).val();
                        var status = confirm("Are you sure, you want to update reservation date?");
                        if(status == true)
                        {
                          $.post('{{URL::Route('updateReservationDate')}}',{ type:$type,date:$date,id: $id , _token : $_token} , function(data){
                            console.log(data);
                            if(data == 0)
                            {
                              alert('Successfully update transaction date.');
                            }
                            else if(data == 1)
                            {
                              alert('This day is already book. Please choose another day.');
                            }
                            else
                            {
                              alert('failed to update date.');
                            }
                          });
                        }
                      });
                    </script>
                <td> 
                  <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                  <select class="form-control input-sm" id="status{{$transaction['id']}}" name="status" data-id="{{$transaction['id']}}"style="padding-top:0px;padding-left:5px;line-height:20pt;" >
                     <option value="" disabled selected style="display:none;">Choose status</option>
                     <?php $status = Status::all();?>
                    @foreach($status as $stat)
                      @if( $stat['status'] == $transaction['status'])
                        <option selected value="{{$stat['status']}}">{{$stat['status']}}</option>
                      @else
                        <option value="{{$stat['status']}}">{{$stat['status']}}</option>
                      @endif                  
                    @endforeach
                  </select>
                  <script type="text/javascript">
                   $(document).on("change","#status{{$transaction['id']}}",function() {
                      var status = confirm("Are you sure, you want to update reservation status?");
                      if(status == true)
                      {
                        $status = $('#status'+{{$transaction['id']}}).val();
                        $id = $(this).data("id");
                        $_token   = "{{ csrf_token() }}";
                        $.post('{{URL::Route('updateTransactionStatus')}}',{ id: $id , _token : $_token,status:$status} , function(data){

                                console.log(data);
                                if(data == 0)
                                {
                                   alert('success to update transaction status.')
                                }
                                else
                                {
                                  alert('failed to update transaction status.')
                                }
                        });
                      }
                      else
                      {
                        
                      }
                    });

                  </script>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#updateInfo').hide();
  });
  function filter(_token,rType,sType)
  {
    $.post('{{URL::Route('filterTransaction')}}',{  _token : _token,rType:rType,sType :sType} , function(data){
      console.log(data);
      if(data.length != 0)
      {
        $('#list').empty();
        for($i = 0 ; $i < data.length ; $i++)
        {
          $('#list').append(' <tr>\
                <td>'+data[$i].id+'</td>\
                <td>'+data[$i].fname+'</td>\
                <td>'+data[$i].lname+'</td>\
                <td>'+data[$i].rtpe+'</td>\
                <td><div class="form-group">\
                      <input type="text" class="form-control input-sm" data-type="'+data[$i].rtpe+'"data-id="'+data[$i].id+'"value="'+data[$i].rdate+'"id="date'+data[$i].id+'"name="date" style="font-size:9pt;" placeholder="">\
                    </div></td>\
                <td>\
                  <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>\
                  <select class="form-control input-sm" id="status'+data[$i].id+'" name="status'+data[$i].id+'" data-id="'+data[$i].id+'"style="padding-top:0px;padding-left:5px;line-height:20pt;" >\
                     <?php $status = Status::all();?>\
                     <option  selected value="'+data[$i].status+'">'+data[$i].status+'</option>\
                    @foreach($status as $stat)\
                        <option  value="{{$stat['status']}}">{{$stat['status']}}</option>\
                    @endforeach\
                  </select>\
                </td>\
              </tr>');

              $( '#date'+data[$i].id).datepicker({
              'formatDate': 'Y-m-d H:i:s'

                });
               $(document).on("change","#status"+data[$i].status,function() {
                      var status = confirm("Are you sure, you want to update reservation status?");
                      if(status == true)
                      {
                        $status = $('#status'+{{$transaction['id']}}).val();
                        $id = $(this).data("id");
                        $_token   = "{{ csrf_token() }}";
                        $.post('{{URL::Route('updateTransactionStatus')}}',{ id: $id , _token : $_token,status:$status} , function(data){

                                console.log(data);
                                if(data == 0)
                                {
                                   alert('success to update transaction status.')
                                }
                                else
                                {
                                  alert('failed to update transaction status.')
                                }
                        });
                      }
                      else
                      {
                        
                      }
                    });

              $(document).on("change","#date"+data[$i].status,function() {
                     
                        $id = $(this).data("id");
                        $type = $(this).data("type");
                        $_token   = "{{ csrf_token() }}";
                        $date = $('#date'+{{$transaction['id']}}).val();
                        var status = confirm("Are you sure, you want to update reservation date?");
                        if(status == true)
                        {
                          $.post('{{URL::Route('updateReservationDate')}}',{ type:$type,date:$date,id: $id , _token : $_token} , function(data){
                            console.log(data);
                            if(data == 0)
                            {
                              alert('Successfully update transaction date.');
                            }
                            else if(data == 1)
                            {
                              alert('Date already book or reserved. Please choose another date.');
                            }
                            else
                            {
                              alert('failed to update date.');
                            }
                          });
                        }
                      });
             
        }
        
      }
      else
      {
        $('#list').empty();
        $('#list').append('<label>No result found</label>');
      }
    });
  }
  $(document).on("change","#rType",function() {
    $rType = $('#rType').val();
    $sType = $('#sType').val();
    $_token   = "{{ csrf_token() }}";
    filter($_token,$rType,$sType);
    
  });
  $(document).on("change","#sType",function() {
    $rType = $('#rType').val();
    $sType = $('#sType').val();
    $_token   = "{{ csrf_token() }}";
    filter($_token,$rType,$sType);
    
  });

 
</script>
@stop