@extends('layout.app')
@section('title', 'Project Page')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Project Page</h1>
<div class="container">
  <div class='row'>
    <div class="col-12">
    <button id="addnewCourseBtnId" class="btn btn-danger btn-sm my-3">Add New</button>
    </div>
  </div>
</div>

<div id="mainDivCourse" class="container d-none">
  <div class="row">
    <div class="col-12">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
          <th class='th-sm' scope="col">Image</th>
            <th class='th-sm' scope="col">Name</th>
            <th class='th-sm' scope="col">Description</th>
            <th class='th-sm' scope="col">Edit</th>
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

   <!--  Add new Button Course Modal -->
<div class="modal fade " id="addCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
          <div id="serviceAddForm" class="form-outline mb-4">
            <h6 style="color:red;" class="m-4"><b>Add New Project</b></h6>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="courseNameId" class="form-control mb-3" placeholder="Project Name" />
                            <input type="text" id="courseDesId" class="form-control mb-3" placeholder="Project Description" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="courseLinkId" class="form-control mb-3" placeholder="Project Link" />
                            <input type="text" id="courseImageId" class="form-control mb-3" placeholder="Project Image" />
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="CourseAddConfirmBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
<!--  End Add new Button Course Modal -->

  <!-- Course Update Modal  -->
  <div class="modal fade " id="updateCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">

          <div id="courseEditFrom" class="form-outline d-none mb-4">
            <h6 style="color:red;" class="m-4"><b>Project Update</b></h6>

            <h5 id="courseEditId" class="mt-3 d-none"> </h5><br>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="courseNameUpdateId" class="form-control mb-3" placeholder="Course Name" />
                            <input type="text" id="courseDesUpdateId" class="form-control mb-3" placeholder="Course Description" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="courseLinkUpdateId" class="form-control mb-3" placeholder="Course Link" />
                            <input type="text" id="courseImageUpdateId" class="form-control mb-3" placeholder="Course Image" />
                        </div>
                    </div>
                </div>
             </div>
        </div>

        <!-- Spinner and Something went rong div -->
        <div id="courseEditloade" class="container">
        <div class="row">
          <div class="col-md-12 text-center">
          <div  type="button" disabled>
            <span class="spinner-border spinner-border-md text-success" role="status" aria-hidden="true"></span>
             </div>
          </div>
        </div>
      </div>

  <div id="courseEditWrong" class="container d-none">
    <div class="row">
      <div class="col-md-12 text-center p-5">
          <h2>Something Went Wrong !</h2>
      </div>
    </div>
  </div>
   <!-- End Spinner and Something went rong div -->
        <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="CourseUpdateConfirmBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>

  <!-- End Course Update Modal -->





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
  getProjectData();


  // For Course table
function getProjectData() {
    axios.get('/project')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivCourse').removeClass('d-none');
                $('#loderDivCourse').addClass('d-none');
                $('#course-table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {

                    $('<tr>').html(
                      "<td class='projectImage'><img src=" + jsonData[i].project_img + "></td>" +
                        "<td>" + jsonData[i].project_name + "</td>" +
                        "<td>" + jsonData[i].project_des + "</td>" +

                        "<td><a class='courseEditbtn btn btn-primary'    data-id=" + jsonData[i].id + " ><i class='far fa-edit'></i></a></td>" +
                        "<td><a  class='courseeDeltebtn btn btn-danger'  data-id=" + jsonData[i].id + " ><i class='far fa-trash-alt'></i></a></td>"


                    ).appendTo('#course-table');

                });

                // Open Delete Modal Button Click
                $('.courseeDeltebtn').click(function() {
                    var id = $(this).data('id');
                    $('#courseDelteId').html(id);
                    $('#deleteCourseModal').modal('show');
                });

                // Open Update Modal Button Click
                $('.courseEditbtn').click(function() {
                    var id = $(this).data('id');
                    projectUpdateDetails(id);
                    $('#courseEditId').html(id);
                    $('#updateCourseModal').modal('show');
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


// Add New Btn Modal Open

$('#addnewCourseBtnId').click(function() {
    $('#addCourseModal').modal('show');
});

// Course Add Method/Function

function projectAdd(projectName, projectDes, projectLink, projectImage) {

    if (projectName.length == 0) {
        toastr.error('Project Name is Emty! ');
    } else if (projectDes.length == 0) {
        toastr.error('Project Description is Empty! ');
    } else if (projectLink.length == 0) {
        toastr.error('Project Link is Empty! ');
    } else if (projectImage.length == 0) {
        toastr.error('Project Image is Empty! ');
    } else {
        $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

        axios.post('/projectAdd', {
                project_name: projectName,
                project_des: projectDes,
                project_link: projectLink,
                project_img: projectImage,
            })
            .then(function(response) {
                $('#CourseAddConfirmBtn').html("Save");
                if (response.data == 1) {
                    $('#addCourseModal').modal('hide');
                    toastr.success('Insert Success');
                    getProjectData();


                } else {
                    $('#addCourseModal').modal('hide');
                    toastr.erroe('Insert Fail !');
                    getProjectData();

                }

            }).catch(function(error) {

            });
    }

}

// Course Add Button Run

$('#CourseAddConfirmBtn').click(function() {
    var projectName = $('#courseNameId').val();
    var projectDes = $('#courseDesId').val();
    var projectLink = $('#courseLinkId').val();
    var projectImage = $('#courseImageId').val();
    projectAdd(projectName, projectDes, projectLink, projectImage);
});


// course delete confirm 
$('#courseDelteConfirmbtn').click(function() {
    var id = $('#courseDelteId').html();
    projectDelete(id);
})


// Course delete function/method
function projectDelete(deleteId) {
    $('#courseDelteConfirmbtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

    axios.post('/projectDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#courseDelteConfirmbtn').html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteCourseModal').modal('hide');
                    toastr.success('Project Delete Success');
                    getProjectData();
                } else {
                    $('#deleteCourseModal').modal('hide');
                    toastr.error('Delete Fail !');
                    getProjectData();
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


// course update

function projectUpdateDetails(detailsId) {
    axios.post('/projectDetails', {
            id: detailsId
        })

        .then(function(response) {

            if (response.status == 200) {
                $('#courseEditFrom').removeClass('d-none');
                $('#courseEditloade').addClass('d-none');

                var jsonData = response.data;
                $('#courseNameUpdateId').val(jsonData[0].project_name);
                $('#courseDesUpdateId').val(jsonData[0].project_des);
                $('#courseLinkUpdateId').val(jsonData[0].project_link);
                $('#courseImageUpdateId').val(jsonData[0].project_img);
            } else {
                $('#courseEditloade').addClass('d-none');
                $('#courseEditWrong').removeClass('d-none');
            }

        }).catch(function(error) {
            $('#courseEditloade').addClass('d-none');
            $('#courseEditWrong').removeClass('d-none');
        });

}


// Course Update Confirm Button Exucute
$('#CourseUpdateConfirmBtn').click(function() {
    var projectId = $('#courseEditId').html();
    var projectName = $('#courseNameUpdateId').val();
    var projectDes = $('#courseDesUpdateId').val();
    var projectLink = $('#courseLinkUpdateId').val();
    var projectImg = $('#courseImageUpdateId').val();
    projectUpdate(projectId, projectName, projectDes, projectLink, projectImg);
});

// Course Update Final
function projectUpdate(projectId, projectName, projectDes, projectLink, projectImg) {

    if (projectName.length == 0) {
        toastr.error('Project Name is Emty! ');
    } else if (projectDes.length == 0) {
        toastr.error('Project Description is Empty! ');
    }  else if (projectLink.length == 0) {
        toastr.error('Project Link is Empty! ');
    } else if (projectImg.length == 0) {
        toastr.error('Project Image is Empty! ');
    } else {

        $('#CourseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

        axios.post('/projectUpdate', {
                id: projectId,
                project_name: projectName,
                project_des: projectDes,
                project_link: projectLink,
                project_img: projectImg
            })
            .then(function(response) {
                $('#CourseUpdateConfirmBtn').html("Save");
                if (response.data == 1) {
                    $('#updateCourseModal').modal('hide');
                    toastr.success('Project Update Success');
                    getProjectData();


                } else {
                    $('#updateCourseModal').modal('hide');
                    getProjectData();

                }

            }).catch(function(error) {

            });
    }

}

</script>
@endsection