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
            <input type="text" class="form-control" id= "title" name= "title" placeholder="First Name" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Address</span>
            <input type="text" class="form-control" id= "content" name= "content" placeholder="Address" aria-describedby="basic-addon1">
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Middle Name</span>
            <input type="text" class="form-control" id= "title" name= "title" placeholder="Middle Name" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Email</span>
            <input type="text" class="form-control" id= "content" name= "content" placeholder="Email" aria-describedby="basic-addon1">
          </div> 
      </div>
      <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Last Name</span>
            <input type="text" class="form-control" id= "title" name= "title" placeholder="Last Name" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Username</span>
            <input type="text" class="form-control" id= "content" name= "content" placeholder="Username" aria-describedby="basic-addon1">
          </div>
      </div>
  </div>
</div>
@stop