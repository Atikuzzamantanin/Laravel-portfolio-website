@extends('layout.app')
@section('title', 'Visit Page')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Visitor Page</h1>
  <!-- Begin Page Content -->
  <div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>IP</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>IP</th>
                        <th>Date & Time</th>
                    </tr>
                </tfoot>
                @foreach($visitorData as $valu)
                <tbody>
                  
                    <tr>
                        <td>{{$valu->id}}</td>
                        <td>{{$valu->ip_address}}</td>
                        <td>{{$valu->visit_time}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->



@endsection