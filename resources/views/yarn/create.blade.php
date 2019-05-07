
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bank Deshboard
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
      	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
              		<div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Add a new Employee</h3>
			            </div>
			            <!-- /.box-header -->
			            <!-- /.box-header -->
			            @include('employee.includes.messages')
			            @if ($errors->any())
			                <div class="alert alert-danger">
			                    <ul>
			                        @foreach ($errors->all() as $error)
			                            <li>{{ $error }}</li>
			                        @endforeach
			                    </ul>
			                </div>
			            @endif
			            <div class="box-body">
				            <!-- form start -->
							<form action="{{ route('yarn.store') }}" method="post" enctype="multipart/form-data">
						   		{{ csrf_field() }}
						   		<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="name">Yarn Name</label>
								   		<input type="text" name="yarn_name" class="form-control" placeholder="Yarn Name">
								   	</div>
								</div>
								<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="company_name">Manufacture</label>
								   		<select  name="company_name" class="form-control select2">
								   			<option>Select Manufacture</option>
								   			@foreach($manufacters as $manuf)
								   			<option value="{{ $manuf->manufacture_name }}">{{ $manuf->manufacture_name }} </option>
								   			@endforeach
								   		</select>
								   	</div>
								</div>
								<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="opening_stock">Stock</label>
								   		<input type="text" name="opening_stock" class="form-control" placeholder="Stock">
								   	</div>
								</div>
								<div class="col-md-3">
								   	<div class="form-group">
								   		<label for="category">category Name</label>
								   		<input type="text" name="category" class="form-control" placeholder="Category Name">
								   	</div>
								</div>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<label for="remarks">Remarks</label>
								   		<textarea name="remarks" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
								   			
								   		</textarea>
								   	</div>
								</div>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<button type="submit" class="btn btn-success">Save</button>
								   	</div>
								</div>
						   	</form>
  						</div>
  					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<script>
		  $(function () {
		    // Replace the <textarea id="editor1"> with a CKEditor
		    // instance, using default configuration.
		    CKEDITOR.replace('editor1')
		    //bootstrap WYSIHTML5 - text editor
		    $('.textarea').wysihtml5()
		  })
	</script>
@endsection

