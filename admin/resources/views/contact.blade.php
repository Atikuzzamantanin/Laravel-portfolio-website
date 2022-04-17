@extends('layout.app')
@section('title', 'Contact Page')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Contact Page</h1>


<div id="mainDivCourse" class="container d-none">
  <div class="row">
    <div class="col-12">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class='th-sm' scope="col">Name</th>
            <th class='th-sm' scope="col">Mobile</th>
            <th class='th-sm' scope="col">Email</th>
            <th class='th-sm' scope="col">Messages</th>
            <th class='th-sm' scope="col">Delete</th>
          </tr>
        </thead>
        <tbody id="course-table">
         

        </tbody>
      </table>
    </div>
  </div>
</div>


        <!-- Spinner and Something went rong div -->
        <div id="loderDivCourse" class="container">
        <div class="row">
          <div class="col-md-12 text-center">
          <div  type="button" disabled>
            <span class="spinner-border spinner-border-md text-success" role="status" aria-hidden="true"></span>
             </div>
          </div>
        </div>
      </div>

  <div id="wrongDivCourse" class="container d-none">
    <div class="row">
      <div class="col-md-12 text-center p-5">
          <h2>Something Went Wrong !</h2>
      </div>
    </div>
  </div>
   <!-- End Spinner and Something went rong div -->








<!-- Delete Modal -->
<div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-4 text-center">
          <h5 class="mt-3">Do You Want To Delete?</h5>
          <h5 id="courseDelteId" class="mt-3 d-none"> </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
        <button id="courseDelteConfirmbtn" type="button" class="btn btn-danger btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Delete Modal -->

 

@endsection

@section('scriptsection')
    <script type="text/javascript">
  getContactData();


  // For Course table
function getContactData() {
    axios.get('/contact')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivCourse').removeClass('d-none');
                $('#loderDivCourse').addClass('d-none');
                $('#course-table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {

                    $('<tr>').html(

                        "<td>" + jsonData[i].contact_name + "</td>" +
                        "<td>" + jsonData[i].contact_mobile + "</td>" +
                        "<td>" + jsonData[i].contact_emil + "</td>" +
                        "<td>" + jsonData[i].contact_msg + "</td>" +

                        "<td><a  class='courseeDeltebtn btn btn-danger'  data-id=" + jsonData[i].id + " ><i class='far fa-trash-alt'></i></a></td>"


                    ).appendTo('#course-table');

                });

                // Open Delete Modal Button Click
                $('.courseeDeltebtn').click(function() {
                    var id = $(this).data('id');
                    $('#courseDelteId').html(id);
                    $('#deleteCourseModal').modal('show');
                });

              

            } else {

                $('#loderDivCourse').addClass('d-none');
                $('#wrongDivCourse').removeClass('d-none');
            }


        }).catch(function(error) {
            $('#loderDivCourse').addClass('d-none');
            $('#wrongDivCourse').removeClass('d-none');
        });

}



// course delete confirm 
$('#courseDelteConfirmbtn').click(function() {
    var id = $('#courseDelteId').html();
    contactDelete(id);
})


// Course delete function/method
function contactDelete(deleteId) {
    $('#courseDelteConfirmbtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

    axios.post('/contactDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#courseDelteConfirmbtn').html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteCourseModal').modal('hide');
                    toastr.success(' Delete Success');
                    getContactData();
                } else {
                    $('#deleteCourseModal').modal('hide');
                    toastr.error('Delete Fail !');
                    getContactData();
                }
            } else {
                $('#deleteCourseModal').modal('hide');
                toastr.error('Something Went Wrong !');
            }
        })
        .catch(function(error) {
            $('#deleteCourseModal').modal('hide');
            toastr.error('Something Went Wrong !');
        });



}


</script>


@endsection 