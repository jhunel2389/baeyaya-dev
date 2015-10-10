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
          <tbody>
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
  $(document).on("change","#status",function() {
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
  });
</script>
@stop