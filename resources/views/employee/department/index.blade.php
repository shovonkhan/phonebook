@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Department
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
          <a href="{{ route('department.create')}}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
              <h3 class="box-title">Department</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Edit</th>
                  <th>Show</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                <tr>
                  <td>{{ $loop->index +1 }}</td>
                  <td>{{ $department->name }}</td>
                  <td>{!! htmlspecialchars_decode($department->description) !!}</td>
                  <td>{{ $department->created_at }}</td>
                  <td><a href="{{route('department.edit', $department->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  <td><a href="{{route('department.show', $department->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                  <td>
                      <form id="delete-form-{{ $department->id }}" action="{{ route('department.destroy', $department->id) }}" method="post" style="display: none;">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          
                      </form>
                      <a href="" onclick="
                         if(confirm('Are you sure, You Want to Delete this?'))
                         {
                             event.preventDefault();
                             document.getElementById('delete-form-{{ $department->id }}').submit();
                         }
                         else{
                             event.preventDefault();
                         }
                         " class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Created At</th>
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
