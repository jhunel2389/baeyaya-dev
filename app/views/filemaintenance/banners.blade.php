@extends('layouts.fmmaster')
@section('head')
  @parent
  <title>Home Page</title>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <h3>Manage Banner</h3>
      <div class="col-md-4">
        <form method="post" action="{{URL::Route('saveBannerInfo')}}" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id= "id" name= "id" placeholder="" aria-describedby="basic-addon1">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Title</span>
            <input type="text" class="form-control" id= "title" name= "title" placeholder="title" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Content</span>
            <input type="text" class="form-control" id= "content" name= "content" placeholder="content" aria-describedby="basic-addon1">
          </div>
 			<div class="input-group">
          		<input type ="file" name="images" id="images" >
           </div>
          <button type="submit" id="saveInfo" class="btn btn-info">Save Information</button>
          {{Form::token()}}
        </form>
       
      </div>
      <div class="col-md-8">
        <div class="list-group">
          <a href="#" class="list-group-item active">
           Guest Information
          </a>
          <div id="guest_list">
            <?php $allBanners = Banners::all(); ?>
            @foreach($allBanners as $allBanner)
	            <div class="input-group" id="reserve{{$allBanner['id']}}">
	            <a href="javascript:void(0)" class="list-group-item">{{$allBanner['title']}}</a>
	            <span class="input-group-addon" data-type="edit" data-id="{{$allBanner['id']}}" style="cursor:pointer">Edit</span>
	            <span class="input-group-addon" data-type="delete" data-id="{{$allBanner['id']}}" style="cursor:pointer">Delete</span>
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
     $title = $('#title').val();
    $content = $('#content').val();
    $id = $('#id').val();
    $_token = "{{ csrf_token() }}";
      var status = confirm("Do you want to update this information ?");
    if(status == true)
    {
      $.post('{{URL::Route('updateBannerInfo')}}',{ _token: $_token, title :$title, content:$content , id:$id } , function(data)
      {
        console.log(data);
        $('#reserve'+data.ban_id).empty();
        $('#reserve'+data.ban_id).append('<a href="#" class="list-group-item">'+data.ban_title+'</a>\
                                                <span class="input-group-addon" data-type="edit" data-id="'+data.ban_id+'" style="cursor:pointer">Edit</span>\
                                                <span class="input-group-addon" data-type="delete" data-id="'+data.ban_id+'" style="cursor:pointer">Delete</span>')

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

               $('#title').val("");
		      $('#content').val("");
		      $('#saveInfo').show();
		      $('#updateInfo').hide();
      });
    }
    else
    {
      $('#title').val("");
      $('#content').val("");
      $('#saveInfo').show();
      $('#updateInfo').hide();
    }
  });





  /*$('#saveInfo').on('click',function()
  {
    $title = $('#title').val();
    $content = $('#content').val();
    $_token = "{{ csrf_token() }}";
    var status = confirm("Do you want to save this information ?");
    if(status == true)
    {
      $.post('{{URL::Route('saveBannerInfo')}}',{ _token: $_token, title :$title, content:$content} , function(data)
      {
      console.log(data);
        if(data.length != 0)
        {
          $('#title').val("");
          $('#content').val("");
          $("#guest_list").empty();
          for (var i = 0; i < data.length; i++) 
          {
            $("#guest_list").append('<div class="input-group">\
                              <a href="#" class="list-group-item">'+data[i].ban_title+'</a>\
                              <span class="input-group-addon" data-id="'+data[i].ban_id+'" style="cursor:pointer">Edit</span>\
                              <span class="input-group-addon" data-type="delete" data-id="'+data[i].ban_id+'" style="cursor:pointer">Delete</span>\
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
  });*/

function deleteInfo(_token,id)
 {
  var status = confirm("Do you want to delete this information ?");
      if(status == true)
      {
        $.post('{{URL::Route('deleteBannerInfo')}}',{ _token: $_token, id :$id} , function(data)
        {
          console.log(data);
           if(data.length != 0)
          {
            $("#guest_list").empty();
            for (var i = 0; i < data.length; i++) 
            {
              $("#guest_list").append('<div class="input-group">\
                                <a href="#" class="list-group-item">'+data[i].ban_title+'</a>\
                                <span class="input-group-addon" data-id="'+data[i].ban_id+'" style="cursor:pointer">Edit</span>\
                                <span class="input-group-addon" data-type="delete" data-id="'+data[i].ban_id+'" style="cursor:pointer">Delete</span>\
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
        $.post('{{URL::Route('getEditBannerInfo')}}',{ _token: _token, id :id} , function(data)
        {
          console.log(data);
          if(data.length != 0)
          {
            $('#title').val(data.ban_title);
            $('#content').val(data.ban_content);
            $('#id').val(data.ban_id);
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