@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Deshboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>
          <a href="{{ route('employee.create')}}" class="col-lg-offset-5 btn btn-info">Add New</a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Photo</th>
                  <th>Edit</th>
                  <th>Show</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $emp)

                <tr>
                  <th>{{$emp->id}}</th>
                  <th>{{$emp->employee_name}}</th>
                  <th>{{$emp->salary}}</th>
                  <th><img src="{{URL::to($emp->photo)}}" style="width: 60px; height: 60px;"></th>
                  <th><a href="{{ URL::to('employee/creates/'.$emp->id) }}" class="btn btn-sm btn-info">Edit</a></th>
                  <th><a href="{{ URL::to('view-employee/'.$emp->id) }}" class="btn btn-sm btn-primary">View</a></th>
                  <th><a href="{{ URL::to('delete-employee/'.$emp->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></th>
                </tr>

                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Photo</th>
                  <th>Edit</th>
                  <th>Show</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
