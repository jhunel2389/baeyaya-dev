@extends('layouts.fmmaster')
@section('head')
  @parent
  <title>Home Page</title>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <h3>User Information</h3>
      <div class="col-md-4">
        <form>
          <input type="hidden" class="form-control" id= "id" placeholder="" aria-describedby="basic-addon1">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">First Name</span>
            <input type="text" class="form-control" id= "fname" placeholder="Enter First name here" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Last Name</span>
            <input type="text" class="form-control" id= "lname" placeholder="Enter Last name here" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Middle Name</span>
            <input type="text" class="form-control" id="mname" placeholder="Enter Middle name here" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Address</span>
            <input type="text" class="form-control" id="address" placeholder="Enter address here" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Contact No.</span>
            <input type="text" class="form-control" id="contact" placeholder="Enter Contact here" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">E-mail</span>
            <input type="text" class="form-control" id="email" placeholder="Enter Email here" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Admin</span>
            <fieldset id="checkAdmin">
              <input type="checkbox" name="admin" id="admin" value="1">
            </fieldset>
          </div>
          <!--<button type="button" id="saveInfo" class="btn btn-info">Save Information</button>-->
          <button type="button" id="updateInfo"class="btn btn-warning">Update Information</button>
          
        </form>
      </div>
      <div class="col-md-8">
        <div class="list-group">
          <a href="#" class="list-group-item active">
           Guest Information
          </a>
          <div id="guest_list">
            <?php $allReserves = UserInfo::all(); ?>
            @foreach($allReserves as $allReserve)
            <div class="input-group" id="reserve{{$allReserve['id']}}">
            <a href="{{ URL::Route('getReserve',$allReserve['id']) }}" class="list-group-item">{{$allReserve['lastname']}},{{$allReserve['firstname']}}</a>
            <span class="input-group-addon" data-type="edit" data-id="{{$allReserve['id']}}" style="cursor:pointer">Edit</span>
            <!--<span class="input-group-addon" data-type="delete" data-id="{{$allReserve['id']}}" style="cursor:pointer">Delete</span>-->
            </div>
            @endforeach
          <div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#updateInfo').hide();
  });

  $('#updateInfo').on('click',function()
  {
    var atLeastOneIsChecked = $('#checkAdmin :checkbox:checked').length;
    $fname = $('#fname').val();
    $lname = $('#lname').val();
    $mname = $('#mname').val();
    $address = $('#address').val();
    $contact = $('#contact').val();
    $email = $('#email').val();
    $isAdmin = atLeastOneIsChecked;
    $id = $('#id').val();
    $_token = "{{ csrf_token() }}";
      var status = confirm("Do you want to update this information ?");
    if(status == true)
    {
      $.post('{{URL::Route('updateInfo')}}',{ _token: $_token, fname :$fname, lname:$lname,
                                          mname:$mname, address:$address, contact:$contact,
                                          email:$email, id:$id , isAdmin:$isAdmin } , function(data)
      {
        console.log(data);
        $('#reserve'+data.reserve_id).empty();
        $('#reserve'+data.reserve_id).append('<a href="#" class="list-group-item">'+data.lname+','+data.fname+'</a>\
                                                <span class="input-group-addon" data-type="edit" data-id="'+data.reserve_id+'" style="cursor:pointer">Edit</span>\
                                                <span class="input-group-addon" data-type="delete" data-id="'+data.reserve_id+'" style="cursor:pointer">Delete</span>')

         $('.input-group-addon').on('click',function()
               {
                  $type = $(this).data("type");
                  $id = $(this).data("id");
                  $_token = "{{ csrf_token() }}";
                  if($type == "delete")
                  {
                    deleteInfo($_token,$id);
                  }
                  else
                  {
                    editInfo($_token,$id);

                  }
                  
               }); 
           $('#fname').val("");
      $('#lname').val("");
      $('#mname').val("");
      $('#address').val("");
      $('#contact').val("");
      $('#email').val("");
      $('#saveInfo').show();
      $('#updateInfo').hide();
      });
    }
    else
    {
      $('#fname').val("");
      $('#lname').val("");
      $('#mname').val("");
      $('#address').val("");
      $('#contact').val("");
      $('#email').val("");
      $('#saveInfo').show();
      $('#updateInfo').hide();
    }
  
  });
  
  

  $('#saveInfo').on('click',function()
  {
    $fname = $('#fname').val();
    $lname = $('#lname').val();
    $mname = $('#mname').val();
    $address = $('#address').val();
    $contact = $('#contact').val();
    $email = $('#email').val();
    $_token = "{{ csrf_token() }}";
    var status = confirm("Do you want to save this information ?");
    if(status == true)
    {
      $.post('{{URL::Route('saveInfo')}}',{ _token: $_token, fname :$fname, lname:$lname,
                                          mname:$mname, address:$address, contact:$contact,
                                          email:$email } , function(data)
      {
      console.log(data);
        if(data.length != 0)
        {
          $('#fname').val("");
          $('#lname').val("");
          $('#mname').val("");
          $('#address').val("");
          $('#contact').val("");
          $('#email').val("");
          $("#guest_list").empty();
          for (var i = 0; i < data.length; i++) 
          {
            $("#guest_list").append('<div class="input-group">\
                              <a href="#" class="list-group-item">'+data[i].lname+','+data[i].fname+'</a>\
                              <span class="input-group-addon" data-id="'+data[i].reserve_id+'" style="cursor:pointer">Edit</span>\
                              <span class="input-group-addon" data-type="delete" data-id="'+data[i].reserve_id+'" style="cursor:pointer">Delete</span>\
                            </div>')
          } 
           $('.input-group-addon').on('click',function()
               {
                  $type = $(this).data("type");
                  $id = $(this).data("id");
                  $_token = "{{ csrf_token() }}";
                  if($type == "delete")
                  {
                    deleteInfo($_token,$id);
                  }
                  else
                  {
                    editInfo($_token,$id);

                  }
                  
               });    
        }
      });
    }
  });

 function deleteInfo(_token,id)
 {
  var status = confirm("Do you want to delete this information ?");
      if(status == true)
      {
        $.post('{{URL::Route('deleteInfo')}}',{ _token: $_token, id :$id} , function(data)
        {
          console.log(data);
           if(data.length != 0)
          {
            $("#guest_list").empty();
            for (var i = 0; i < data.length; i++) 
            {
              $("#guest_list").append('<div class="input-group">\
                                <a href="#" class="list-group-item">'+data[i].lname+','+data[i].fname+'</a>\
                                <span class="input-group-addon" data-id="'+data[i].reserve_id+'" style="cursor:pointer">Edit</span>\
                                <span class="input-group-addon" data-type="delete" data-id="'+data[i].reserve_id+'" style="cursor:pointer">Delete</span>\
                              </div>')
            }
            $('.input-group-addon').on('click',function()
               {
                  $type = $(this).data("type");
                  $id = $(this).data("id");
                  $_token = "{{ csrf_token() }}";
                  if($type == "delete")
                  {
                    deleteInfo($_token,$id);
                  }
                  else
                  {
                    editInfo($_token,$id);

                  }
                  
               });     
          }

        });
      }   
 }
 function editInfo(_token,id)
 {
  var status = confirm("Do you want to edit this information ?");
      if(status == true)
      {
        $.post('{{URL::Route('getEditInfo')}}',{ _token: _token, id :id} , function(data)
        {
          console.log(data);
          if(data.length != 0)
          {
            $('#fname').val(data.fname);
            $('#lname').val(data.lname);
            $('#mname').val(data.mname);
            $('#address').val(data.address);
            $('#contact').val(data.contact);
            $('#email').val(data.email);
            $('#saveInfo').hide();
            $('#updateInfo').show();
            $('#id').val(data.reserve_id);
            if(data.isAdmin == 1)
            {
              $('#admin').prop('checked', true);
            }
            else
            {
              $('#admin').prop('checked', false);
            }
            
          }
        });
      }
 }

 $('.input-group-addon').on('click',function()
 {
    $type = $(this).data("type");
    $id = $(this).data("id");
    $_token = "{{ csrf_token() }}";
    if($type == "delete")
    {
      deleteInfo($_token,$id);
    }
    else
    {
      editInfo($_token,$id);

    }
    
 });

</script>

@stop