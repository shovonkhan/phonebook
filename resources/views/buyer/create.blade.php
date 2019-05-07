
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Buyer Deshboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buyer page</li>
      </ol>
    </section>

	<!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
              		<div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Add a new Buyer</h3>
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
							<form action="{{ route('buyer.store') }}" method="post" enctype="multipart/form-data">
							   		{{ csrf_field() }}
							   		<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="name">Buyer Name</label>
									   		<input type="text" name="buyer_name" class="form-control" placeholder="Buyer Name">
									   	</div>
									</div>
							   		<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="type">Buyer Type</label>
									   		<select name="buyer_type" class="form-control">
									   			<option value="Local">Local</option>
									   			<option value="LC">LC</option>
									   			<option value="Sub-Order">Sub-Order</option>
									   		</select>
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="email">email</label>
									   		<input type="text" name="email" class="form-control" placeholder="email">
									   	</div>
									</div>
									<div class="col-md-4">
									   	<div class="form-group">
									   		<label for="phone">phone</label>
									   		<input type="text" name="phone" class="form-control" placeholder="phone">
									   	</div>
									</div>
									<div class="col-md-12">
									   	<div class="form-group">
									   		<label for="history">Address</label>
									   		<textarea name="address" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									   	</div>
									   	<input type="hidden" name="status" value="1">
									</div>
									<div class="col-md-12">
									   	<div class="form-group">
									   		<input type="submit" class="btn btn-success">
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
	<script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	
	<script type="text/javascript">
		function readURL(input) {
	      if (input.files && input.files[0]) {
	          var reader = new FileReader();
	          reader.onload = function (e) {
	              $('#image')
	                  .attr('src', e.target.result)
	                  .width(80)
	                  .height(80);
	          };
	          reader.readAsDataURL(input.files[0]);
	      }
	   }
	</script>
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

