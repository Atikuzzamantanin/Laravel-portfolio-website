@extends('layout.app')
@section('title', 'Course Page')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Course Page</h1>
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
            <th class='th-sm' scope="col">Name</th>
            <th class='th-sm' scope="col">Fee</th>
            <th class='th-sm' scope="col">Class</th>
            <th class='th-sm' scope="col">Enroll</th>
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
            <h6 style="color:red;" class="m-4"><b>Add New Course</b></h6>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="courseNameId" class="form-control mb-3" placeholder="Course Name" />
                            <input type="text" id="courseDesId" class="form-control mb-3" placeholder="Course Description" />
                            <input type="text" id="courseFeeId" class="form-control mb-3" placeholder="Course Fee" />
                            <input type="text" id="courseEnrollId" class="form-control mb-3" placeholder="Total Enroll" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="courseClassId" class="form-control mb-3" placeholder="Total Class" />
                            <input type="text" id="courseLinkId" class="form-control mb-3" placeholder="Course Link" />
                            <input type="text" id="courseImageId" class="form-control mb-3" placeholder="Course Image" />
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
            <h6 style="color:red;" class="m-4"><b>Course Update</b></h6>

            <h5 id="courseEditId" class="mt-3 d-none"> </h5><br>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="courseNameUpdateId" class="form-control mb-3" placeholder="Course Name" />
                            <input type="text" id="courseDesUpdateId" class="form-control mb-3" placeholder="Course Description" />
                            <input type="text" id="courseFeeUpdateId" class="form-control mb-3" placeholder="Course Fee" />
                            <input type="text" id="courseEnrollUpdateId" class="form-control mb-3" placeholder="Total Enroll" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="courseClassUpdateId" class="form-control mb-3" placeholder="Total Class" />
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
  getCoursesData();


  // For Course table
function getCoursesData() {
    axios.get('/course')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivCourse').removeClass('d-none');
                $('#loderDivCourse').addClass('d-none');
                $('#course-table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {

                    $('<tr>').html(

                        "<td>" + jsonData[i].course_name + "</td>" +
                        "<td>" + jsonData[i].course_fee + "</td>" +
                        "<td>" + jsonData[i].course_totalclass + "</td>" +
                        "<td>" + jsonData[i].course_totalenroll + "</td>" +

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
                    courseUpdateDetails(id);
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

function courseAdd(courseName, courseDes, courseFee, courseEnroll, courseClass, courseLink, courseImage) {

    if (courseName.length == 0) {
        toastr.error('Course Name is Emty! ');
    } else if (courseDes.length == 0) {
        toastr.error('Course Description is Empty! ');
    } else if (courseFee.length == 0) {
        toastr.error('Course Fee is Empty! ');
    } else if (courseEnroll.length == 0) {
        toastr.error('Course Enroll is Empty! ');
    } else if (courseClass.length == 0) {
        toastr.error('Course Class is Empty! ');
    } else if (courseLink.length == 0) {
        toastr.error('Course Link is Empty! ');
    } else if (courseImage.length == 0) {
        toastr.error('Course Image is Empty! ');
    } else {
        $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

        axios.post('/courseAdd', {
                course_name: courseName,
                course_des: courseDes,
                course_fee: courseFee,
                course_totalenroll: courseEnroll,
                course_totalclass: courseClass,
                course_link: courseLink,
                course_img: courseImage,
            })
            .then(function(response) {
                $('#CourseAddConfirmBtn').html("Save");
                if (response.data == 1) {
                    $('#addCourseModal').modal('hide');
                    toastr.success('Insert Success');
                    getCoursesData();


                } else {
                    $('#addCourseModal').modal('hide');
                    toastr.erroe('Insert Fail !');
                    getCoursesData();

                }

            }).catch(function(error) {

            });
    }

}

// Course Add Button Run

$('#CourseAddConfirmBtn').click(function() {
    var courseName = $('#courseNameId').val();
    var courseDes = $('#courseDesId').val();
    var courseFee = $('#courseFeeId').val();
    var courseEnroll = $('#courseEnrollId').val();
    var courseClass = $('#courseClassId').val();
    var courseLink = $('#courseLinkId').val();
    var courseImage = $('#courseImageId').val();
    courseAdd(courseName, courseDes, courseFee, courseEnroll, courseClass, courseLink, courseImage);
});


// course delete confirm 
$('#courseDelteConfirmbtn').click(function() {
    var id = $('#courseDelteId').html();
    courseDelete(id);
})


// Course delete function/method
function courseDelete(deleteId) {
    $('#courseDelteConfirmbtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

    axios.post('/courseDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#courseDelteConfirmbtn').html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteCourseModal').modal('hide');
                    toastr.success('Course Delete Success');
                    getCoursesData();
                } else {
                    $('#deleteCourseModal').modal('hide');
                    toastr.error('Delete Fail !');
                    getCoursesData();
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

function courseUpdateDetails(detailsId) {
    axios.post('/courseDetails', {
            id: detailsId
        })

        .then(function(response) {

            if (response.status == 200) {
                $('#courseEditFrom').removeClass('d-none');
                $('#courseEditloade').addClass('d-none');

                var jsonData = response.data;
                $('#courseNameUpdateId').val(jsonData[0].course_name);
                $('#courseDesUpdateId').val(jsonData[0].course_des);
                $('#courseFeeUpdateId').val(jsonData[0].course_fee);

                $('#courseEnrollUpdateId').val(jsonData[0].course_totalenroll);
                $('#courseClassUpdateId').val(jsonData[0].course_totalclass);
                $('#courseLinkUpdateId').val(jsonData[0].course_link);
                $('#courseImageUpdateId').val(jsonData[0].course_img);
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
    var courseId = $('#courseEditId').html();
    var courseName = $('#courseNameUpdateId').val();
    var courseDes = $('#courseDesUpdateId').val();
    var courseFee = $('#courseFeeUpdateId').val();
    var courseEnroll = $('#courseEnrollUpdateId').val();
    var courseClass = $('#courseClassUpdateId').val();
    var courseLink = $('#courseLinkUpdateId').val();
    var courseImg = $('#courseImageUpdateId').val();
    courseUpdate(courseId, courseName, courseDes, courseFee, courseEnroll, courseClass, courseLink, courseImg);
});

// Course Update Final
function courseUpdate(courseId, courseName, courseDes, courseFee, courseEnroll, courseClass, courseLink, courseImg) {

    if (courseName.length == 0) {
        toastr.error('Course Name is Emty! ');
    } else if (courseDes.length == 0) {
        toastr.error('Course Description is Empty! ');
    } else if (courseFee.length == 0) {
        toastr.error('Course Fee is Empty! ');
    } else if (courseEnroll.length == 0) {
        toastr.error('Course Enroll is Empty! ');
    } else if (courseClass.length == 0) {
        toastr.error('Course Class is Empty! ');
    } else if (courseLink.length == 0) {
        toastr.error('Course Link is Empty! ');
    } else if (courseImg.length == 0) {
        toastr.error('Course Image is Empty! ');
    } else {

        $('#CourseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

        axios.post('/courseUpdate', {
                id: courseId,
                course_name: courseName,
                course_des: courseDes,
                course_fee: courseFee,
                course_totalenroll: courseEnroll,
                course_totalclass: courseClass,
                course_link: courseLink,
                course_img: courseImg
            })
            .then(function(response) {
                $('#CourseUpdateConfirmBtn').html("Save");
                if (response.data == 1) {
                    $('#updateCourseModal').modal('hide');
                    toastr.success('Course Update Success');
                    getCoursesData();


                } else {
                    $('#updateCourseModal').modal('hide');
                    getCoursesData();

                }

            }).catch(function(error) {

            });
    }

}

</script>
@endsection