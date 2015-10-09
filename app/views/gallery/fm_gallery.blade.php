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
          <form method="post" action="{{ URL::Route('addPhotoGallery')}}" enctype="multipart/form-data">
            <div class="input-group">
                <input type ="file" name="images" id="images" >
            </div>
            <button type="submit" id="saveInfo" class="btn btn-info">Upload New Image</button>
            {{Form::token()}}  
            </form>
      </div>
      <div class="col-md-8">
        <div class="col-md-3" id="set1">
        </div>
        <div class="col-md-3" id="set2">
        </div>
        <div class="col-md-3" id="set3">
        </div>
        <div class="col-md-3" id="set4">
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  partyNews();
});
function partyNews()
{
  $.get('{{URL::Route('galleryImgs')}}', function(response)
    {
      $('#set1').empty();
      $('#set2').empty();
      $('#set3').empty();
      $('#set4').empty();
      if(response.length != 0)
      { 
        $ctr = 1;
        for ($i = 0; $i < response.length; $i++) 
        {
          $('#set'+$ctr).append('<div class="myprofile_gallery_wrapper" id="div_img'+response[$i].id+'">\
                  <img src="{{app('customURL')}}images/'+response[$i].img_file+'" class="img-rounded center-block" style="width:100%;height:auto;">\
                  <form class="picEdit nm" action="javascript:void(0)" method="post">\
                    <ul class="list-inline list-unstyled nmb gallery_options_list" style="position:absolute;bottom:5px;right:10px;">\
                      <li><button type="submit" class="btn-trash" onClick="deletePhoto('+response[$i].id+');"><i class="fa fa-trash-o"></i></button></li>\
                      <input type="hidden" name="_token" value="{{ csrf_token()}}">\
                    </ul>\
                  </form>\
                </div>');
          ($ctr == 4) ? $ctr = 1 : $ctr++;
        }
      }
    });
}

function deletePhoto(id)
{
    var status = confirm("Are you sure you want to delete this photo?");
    if(status == true)
    {
      $_token = "{{ csrf_token() }}";
      $.post('{{URL::Route('deletePhotoGallery')}}',{_token: $_token, imgId: id } , function(data)
      {
        if(data == 1)
        {
          $('#div_img'+id).fadeOut();
        }
        else
        {
          alert("Failed to delete photo. Please try again.");
        }
      });
    }
}
</script>
@stop