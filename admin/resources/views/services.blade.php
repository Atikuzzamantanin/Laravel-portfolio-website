@extends('layout.app')
@section('title', 'Service Page')



@section('content')
<h1 class="h3 mb-4 text-gray-800">Service Page</h1>
<div class="container">
  <div class='row'>
    <div class="col-12">
    <button id="addnewbtn" class="btn btn-danger btn-sm my-3">Add New</button>
    </div>
  </div>
</div>

<div id="mainDiv" class="container d-none">
  <div class="row">
    <div class="col-12">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th  scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody id="service-table">
         

        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Spinner and Something went rong div -->

      <div id="loderDiv" class="container">
        <div class="row">
          <div class="col-md-12 text-center">
          <div  type="button" disabled>
            <span class="spinner-border spinner-border-md text-success" role="status" aria-hidden="true"></span>
             </div>
          </div>
        </div>
      </div>

  <div id="wrongDiv" class="container d-none">
    <div class="row">
      <div class="col-md-12 text-center p-5">
          <h2>Something Went Wrong !</h2>
      </div>
    </div>
  </div>

  <!--  End Spinner and Something went rong div -->
  

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-4 text-center">
          <h5 class="mt-3">Do You Want To Delete?</h5>
          <h5 id="serviceDelteId" class="mt-3 d-none"> </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
        <button id="serviceDelteConfirmbtn" type="button" class="btn btn-danger btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-6 text-center">

      <h5 id="serviceEditId" class="mt-3 d-none"> </h5>

          <div id="serviceEditForm" class="form-outline mb-4 d-none">
            <input type="text" id="serviceNameId" class="form-control mb-4" placeholder="Service Name" />
            <input type="text" id="serviceDesId" class="form-control mb-4" placeholder="Service Description" />
            <input type="text" id="serviceImgId" class="form-control mb-4" placeholder="Service Img Link" />
          </div>

              

        <div id="serviceEditLoader" class="container">
        <div class="row">
          <div class="col-md-12 text-center">
          <div  type="button" disabled>
            <span class="spinner-border spinner-border-md text-success" role="status" aria-hidden="true"></span>
             </div>
          </div>
        </div>
      </div>
             
               <h2 id="serviceEditrong" class="d-none">Something Went Wrong !</h2>
              

          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="serviceEditConfirmbtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>


<!--  Add new Button Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-6 text-center">

          <div id="serviceAddForm" class="form-outline mb-4">
            <h6><b>Add New Service</b></h6>
            <input type="text" id="serviceNameAddId" class="form-control mb-4" placeholder="Service Name" />
            <input type="text" id="serviceDesAddId" class="form-control mb-4" placeholder="Service Description" />
            <input type="text" id="serviceImgAddId" class="form-control mb-4" placeholder="Service image Link"/>
          </div>

              

          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="addNewBtnId" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection

  @section('scriptsection')
    <script type="text/javascript">
        getServiceData();



        // For Services table
function getServiceData() {
    axios.get('/service')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loderDiv').addClass('d-none');
                $('#service-table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {

                    $('<tr>').html(

                        "<td class='serviceImage'><img src=" + jsonData[i].service_img + "></td>" +
                        "<td>" + jsonData[i].service_name + "</td>" +
                        "<td>" + jsonData[i].service_dec + "</td>" +
                        "<td><a class='serviceEditbtn btn btn-success'    data-id=" + jsonData[i].id + " ><i class='far fa-edit'></i></a></td>" +
                        "<td><a  class='serviceDeltebtn btn btn-danger'  data-id=" + jsonData[i].id + " ><i class='far fa-trash-alt'></i></a></td>"


                    ).appendTo('#service-table');

                    // services table delete icon Click
                    $('.serviceDeltebtn').click(function() {
                        var id = $(this).data('id');
                        $('#serviceDelteId').html(id);
                        $('#deleteModal').modal('show');

                    })


                });

                // services table edit icon click
                $('.serviceEditbtn').click(function() {
                    var id = $(this).data('id');
                    $('#serviceEditId').html(id);
                    serviceUpdateDetails(id);
                    $('#editmodal').modal('show');

                })


            } else {

                $('#loderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }


        }).catch(function(error) {
            $('#loderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');
        });

}


// service delete yes modal button
$('#serviceDelteConfirmbtn').click(function() {
    var id = $('#serviceDelteId').html();
    serviceDelete(id);
});



// service delete
function serviceDelete(deleteId) {

    $('#serviceDelteConfirmbtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

    axios.post('/serviceDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#serviceDelteConfirmbtn').html("Yes");

            if (response.data == 1) {
                $('#deleteModal').modal('hide');
                toastr.success('Service Delete Success');
                getServiceData();


            } else {
                $('#deleteModal').modal('hide');
                getServiceData();

            }
        }).catch(function(error) {

        });
}

// service Edit  modal fonfirm button
$('#serviceEditConfirmbtn').click(function() {
    var id = $('#serviceEditId').html();
    var name = $('#serviceNameId').val();
    var des = $('#serviceDesId').val();
    var img = $('#serviceImgId').val();

    serviceUpdate(id, name, des, img);
});

// eash service Update Details
function serviceUpdateDetails(detailsId) {
    axios.post('/serviceDetails', {
            id: detailsId
        })
        .then(function(response) {
            $('#serviceEditForm').removeClass('d-none');
            $('#serviceEditLoader').addClass('d-none');


            if (response.status == 200) {
                var jsonData = response.data;
                $('#serviceNameId').val(jsonData[0].service_name);
                $('#serviceDesId').val(jsonData[0].service_dec);
                $('#serviceImgId').val(jsonData[0].service_img);
            } else {
                $('#serviceEditLoader').addClass('d-none');
                $('#serviceEditrong').removeClass('d-none');
            }

        }).catch(function(error) {
            $('#serviceEditLoader').addClass('d-none');
            $('#serviceEditrong').removeClass('d-none');
        });
}

// eash service Update 
function serviceUpdate(serviceId, serviceName, serviceDes, serviceImg) {

    if (serviceName.length == 0) {
        toastr.error('Service Name is Emty! ');
    } else if (serviceDes.length == 0) {
        toastr.error('Service Description is Empty! ');
    } else if (serviceImg.length == 0) {
        toastr.error('Service Image is Empty! ');
    } else {

        $('#serviceEditConfirmbtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio

        axios.post('/serviceUpdate', {
                id: serviceId,
                name: serviceName,
                des: serviceDes,
                img: serviceImg,
            })
            .then(function(response) {
                $('#serviceEditConfirmbtn').html("Save");
                if (response.data == 1) {
                    $('#editmodal').modal('hide');
                    toastr.success('Service Update Success');
                    getServiceData();


                } else {
                    $('#editmodal').modal('hide');
                    getServiceData();

                }

            }).catch(function(error) {

            });
    }



}

  

//Service Add New Btn Click

$('#addnewbtn').click(function() {
    $('#addModal').modal('show');
});

 

// service Add  modal fonfirm button
$('#addNewBtnId').click(function() {
    var name = $('#serviceNameAddId').val();
    var des = $('#serviceDesAddId').val();
    var img = $('#serviceImgAddId').val();

    serviceAdd(name, des, img);
});


// Service Add Fucntion


function serviceAdd(serviceName, serviceDes, serviceImg) {

    if (serviceName.length == 0) {
        toastr.error('Service Name is Emty! ');
    } else if (serviceDes.length == 0) {
        toastr.error('Service Description is Empty! ');
    } else if (serviceImg.length == 0) {
        toastr.error('Service Image is Empty! ');
    } else {

        $('#addNewBtnId').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //animatio


        axios.post('/serviceAdd',{
                name: serviceName,
                des: serviceDes,
                img: serviceImg,
            })
            .then(function(response) {
                $('#addNewBtnId').html("Save");
                if (response.data == 1) {
                    $('#addModal').modal('hide');
                    toastr.success('Insert Success');
                    getServiceData();


                } else {
                    $('#addModal').modal('hide');
                    getServiceData();

                }

            }).catch(function(error) {

            });
    }



}
    </script>
@endsection 

