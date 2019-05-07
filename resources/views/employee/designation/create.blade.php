@extends('employee.layouts.app')

@section('main-contain')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Category Titel</h3>
            </div>
            <!-- /.box-header -->
            <!-- /.box-header -->
            @include('employee.includes.messages')
            <!-- form start -->
            <form role="form" action="{{ route('designation.store') }}" method="post">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="col-lg-offset-3 col-lg-6">
                    <div class="form-group">
                      <label for="name">Designation Title</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Designation">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea id="editor1" name="description" placeholder="Place some text description here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <a href="{{ route('designation.index')}}" class=" btn btn-warning">Back</a>
                   </div>
                </div>
              </div>
              <!-- /.box-body -->

              
            </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
