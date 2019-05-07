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
        <li><a href="{{URL::to('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Yarn Stock</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>
          <a href="{{ URL::to('yarnstock/create')}}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
              <h3 class="box-title">Yarn Stock</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Chemical Name</th>
                  <th>Scientific Name</th>
                  <th>Stock</th>
                  <th>Use For</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($yarns as $yarn)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $yarn->yarn_name }}</td>
                  <td>{{ $yarn->company_name }}</td>
                  <td>{{ $yarn->opening_stock }}</td>
                  <td>{{ $yarn->category }}</td>
                  <td>
                    <a href="{{ route('yarnstock.edit',$yarn->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</section>
</div>
@endsection