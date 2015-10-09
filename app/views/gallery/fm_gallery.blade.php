@extends('layouts.fmmaster')
@section('head')
  @parent
  <title>Home Page</title>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <h3>Manage Gallery Photo</h3>
      <div class="col-md-4">
          <form method="post" action="javascript:void(0)" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id= "id" name= "id" placeholder="" aria-describedby="basic-addon1">
            <div class="input-group">
                <input type ="file" name="images" id="images" >
            </div>
            <button type="submit" id="saveInfo" class="btn btn-info">Upload New Image</button>
            {{Form::token()}}  
      </div>
      <div class="col-md-8">
        <div class="list-group">
          <a href="#" class="list-group-item active">
           News
          </a>
          <div id="guest_list">
            <?php $allGalleries = Gallery::all(); ?>
            @if(!empty($allGalleries))
              @foreach($allGalleries as $allGallery)
              @endforeach
            @endif
          <div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</script>
@stop