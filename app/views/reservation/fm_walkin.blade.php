@extends('layouts.fmmaster')
@section('head')
  @parent
  <title>Home Page</title>
@stop

@section('content')

  <div class="container">
    <div class="row">
      
        <h3>Walk-in Reservation</h3>
        <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">First Name</span>
              <input type="text" class="form-control" id= "fname" name= "fname" placeholder="First Name" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Contact</span>
              <input type="text" class="form-control" id= "contact" name= "contact" placeholder="Contact" aria-describedby="basic-addon1">
            </div>
           
        </div>
        <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Middle Name</span>
              <input type="text" class="form-control" id= "mname" name= "mname" placeholder="Middle Name" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Email</span>
              <input type="text" class="form-control" id= "email" name= "email" placeholder="Email" aria-describedby="basic-addon1">
            </div> 
        </div>
        <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Last Name</span>
              <input type="text" class="form-control" id= "lname" name= "lname" placeholder="Last Name" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Username</span>
              <input type="text" class="form-control" id= "uname" name= "uname" placeholder="Username" aria-describedby="basic-addon1">
            </div>
        </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Address</span>
        <input type="text" class="form-control" id= "address" name= "address" placeholder="Address" aria-describedby="basic-addon1">
      </div>
    </div>
  </div>
  <br>
  <div class="form-group">
        <button type="submit" id="saveInfo" class="btn_green" onclick="createUser();">Save Information</button> 
  </div>
</div>
<script type="text/javascript">
  function createUser()
  {
    $_token = "{{ csrf_token() }}";
    $fname = $('#fname').val();
    $mname = $('#mname').val();
    $lname = $('#lname').val();
    $address = $('#address').val();
    $contact = $('#contact').val();
    $email = $('#email').val();
    $uname = $('#uname').val();
    $checkValdation = false;

    //data-container="body" data-toggle="popover" data-placement="right" data-trigger="focus" data-content="Username already taken." data-original-title="" title=""

    if($fname.length == 0)
    {
      $checkValdation = true;
    }
    if($mname.length == 0)
    {
      $checkValdation = true;
    }
    if($lname.length == 0)
    {
      $checkValdation = true;
    }
    if($address.length == 0)
    {
      $checkValdation = true;
    }
    if($contact.length == 0)
    {
      $checkValdation = true;
    }
    if($email.length == 0)
    {
      $checkValdation = true;
    }
    if($uname.length == 0)
    {
      $checkValdation = true;
    }
    if($checkValdation)
    {
      alert("Please input all information.");
    }
    else
    {
      $.post('{{URL::Route('postCreate')}}',{ _token: $_token , fname: $fname , mname : $mname , lname: $lname , address : $address , contact: $contact , email : $email , uname: $uname} , function(data)
      {
        if(data == 1)
        {
          alert("You regestered successfully. Please check your email and verify your account. Thank you.");
          window.location="{{URL::route('home')}}";
        }
        if(data == 2)
        {
          alert("Regestration failed. Please try again later. Thank you.");
        }
        if(data == 3)
        {
          alert("Email Address has already taken. Please try other email. Thank you.");
        }
        if(data == 4)
        {
          alert("Username has already taken. Please try other username. Thank you.");
        }
      });
    }
  }
</script>
@stop