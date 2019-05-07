@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fabric Stock Deshboard
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
          <a href="{{ route('fabric_stock.create')}}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
              <h3 class="box-title">Fabric Stock List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Fabric Code</th>
                  <th>Stock</th>
                  <th>Opening Stock</th>
                  <th>Reveive</th>
                  <th>Grade</th>
                  <th>Edit</th>
                  <th>Show</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stock_fabrics as $sf)

                <tr>
                  <td>{{$sf->date}}</td>
                  <td>{{$sf->fabric_code}}</td>
                  <td>{{$sf->stock}}</td>
                  <td>{{$sf->opening_stock}}</td>
                  <td>{{$sf->receive}}</td>
                  <td>{{$sf->grade}}</td>
                  <td><a href="{{ route('fabric_stock.edit',$sf->id) }}" class="btn btn-sm btn-info">Edit</a></td>
                  <td><a href="{{ URL::to('view-sfloyee/'.$sf->id) }}" class="btn btn-sm btn-primary">View</a></td>
                  <td><a href="{{ URL::to('delete-sfloyee/'.$sf->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></td>
                </tr>

                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Fabric Code</th>
                  <th>Stock</th>
                  <th>Opening Stock</th>
                  <th>Reveive</th>
                  <th>Grade</th>
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
