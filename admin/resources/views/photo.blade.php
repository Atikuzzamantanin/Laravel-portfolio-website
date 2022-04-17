@extends('layout.app')
@section('title', 'Gallery Page')
@section('content')

<div class="container">
  <div class='row'>
    <div class="col-12">
    <button id="addnewCourseBtnId" class="btn btn-danger btn-sm my-3">Add Photo</button>
    </div>
  </div>
</div>


<div class="modal fade " id="addCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-body p-1 text-center">
          <div id="serviceAddForm" class="form-outline mb-4">
            <h6 style="color:red;" class="m-4"><b>Add New Photo</b></h6>
                <div class="container">
                    <div class="row">
                        <input id="imgInput" class="form-control" type="file">
                       
                           
                        <img  class="imgpreview mt-3" ‍ id="imgPreview" src="{{asset('siteImg/default-image.png')}}" >
                           
                           
                        
        
                    </div>
                </div>
             </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="savePhotobtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>

  <!-- select Photo -->
    <div class="container-fluid">
      <div class="row photoRow">
        

      </div>
      <button class="btn btn-primary" id="LoadMoreBtn">Load More</button>
    </div>

@endsection


@section('scriptsection')
    <script type="text/javascript">

        // Add New Btn Modal Open
         $('#addnewCourseBtnId').click(function() {
         $('#addCourseModal').modal('show');
      });

    //ইমেজের প্রিভিউ দেখার জন্য
      $('#imgInput').change(function(){
          var reader = new FileReader();
              reader.readAsDataURL(this.files[0]);
              reader.onload= function(event){
                var imgSourse = event.target.result;
                $('#imgPreview').attr('src',imgSourse);
              }
      })

//শেষ ইমেজের প্রিভিউ দেখার 


      $('#savePhotobtn').on('click',function(){
  
        $('#savePhotobtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio


        var photoFile = $('#imgInput').prop('files')[0];
        var formData = new FormData();
            formData.append('photo',photoFile);

            axios.post("photoUploed",formData).then(function(response){

              if(response.status==200 && response.data==1){
                $('#addCourseModal').modal('hide');
                $('#savePhotobtn').html('Save');
                toastr.success('Photo Upload Success');
              }else{
                $('#addCourseModal').modal('hide');
                toaster.error('Photo Upload Fail ! Try Again');
              }

            }).catch(function(error){
              toastr.error('Photo Upload Fail !');
              $('#savePhotobtn').html('Save');
            })


      })

      LoadPhoto();
      function LoadPhoto()
      {
        let URL= '/photoJSON'
        axios.get(URL).then(function(response){
            
          $.each(response.data, function(i, item) {

                $("<div class='col-md-4 p-1'>").html(

                    "<img data-id="+item['id']+" class='imgOnRow' src="+item['location']+">"


                ).appendTo('.photoRow');

                });

        }).catch(function(error){

        })

      }

      var ImgId=0;
      function LoadById(FirstImgId){
         ImgId=ImgId+3;
         let photoId=ImgId+FirstImgId;
          let URL = '/photoJSONById/'+photoId;
        
          axios.get(URL).then(function(response){
            
            $.each(response.data, function(i, item) {
  
                  $("<div class='col-md-3 p-1'>").html(
  
                      "<img data-id="+item['id']+" class='imgOnRow' src="+item['location']+">"
  
  
                  ).appendTo('.photoRow');
  
                  });
  
          }).catch(function(error){
  
          })
      }

      $('#LoadMoreBtn').on('click',function(){
        let FirstImgId = $(this).closest('div').find('img').data('id');
        
        LoadById(FirstImgId);
      })
    </script>

@endsection 