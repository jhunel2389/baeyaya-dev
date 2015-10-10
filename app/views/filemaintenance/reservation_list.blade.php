@extends('layouts.fmmaster')
@section('head')
  @parent
  <title>Home Page</title>
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
            <?php $userInfo = UserInfo::where('user_id','=',$transaction['user_id'])->first();
            $reservation_type= ReservationType::find($transaction['reservation_type'])->first();
            ?>
              <tr>
                <td>{{$transaction['id']}}</td>
                <td>{{$userInfo['firstname']}}</td>
                <td>{{$userInfo['lastname']}}</td>
                <td>{{$reservation_type['name']}}</td>
                <td>{{$transaction['reservation_date']}}</td>
                <td> 
                  <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>
                  <select class="form-control input-sm" id="status" name="status" data-id="{{$transaction['id']}}"style="padding-top:0px;padding-left:5px;line-height:20pt;" >
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
                <td>'+data[$i].rdate+'</td>\
                <td>\
                  <i class="fa fa-2x fa-caret-down" style="position:absolute;right:10px;bottom:2px;color:#000;pointer-events:none;"></i>\
                  <select class="form-control input-sm" id="status" name="status" data-id="'+data[$i].id+'"style="padding-top:0px;padding-left:5px;line-height:20pt;" >\
                     <?php $status = Status::all();?>\
                     <option  selected value="'+data[$i].status+'">'+data[$i].status+'</option>\
                    @foreach($status as $stat)\
                        <option  value="{{$stat['status']}}">{{$stat['status']}}</option>\
                    @endforeach\
                  </select>\
                </td>\
              </tr>');
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

  $(document).on("change","#status",function() {
    var status = confirm("Are you sure, you want to update reservation status?");
    if(status == true)
    {
      $status = $('#status').val();
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
@stop