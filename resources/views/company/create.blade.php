
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
							<form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
		   						{{ csrf_field() }}
		   						<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="name">Company Name</label>
								   		<input type="text" name="name" class="form-control" placeholder="Company Name">
								   	</div>
								</div>
		   						<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="type">Company Type</label>
								   		<select name="type" class="form-control">
								   			<option>Select a Option</option>
								   			<option value="1">Industrial</option>
								   			<option value="2">Export</option>
								   		</select>
								   	</div>
								</div>
		   						<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="managing_director">Managing Diractor</label>
								   		<input type="text" name="managing_director" class="form-control" placeholder="Managing Diractor">
								   	</div>
								</div>
		   						<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="chairman">Chairman</label>
								   		<input type="text" name="chairman" class="form-control" placeholder="Chairman">
								   	</div>
								</div>

								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="established">Established</label>
								   		<input type="date" name="established" class="form-control" placeholder="Established">
								   	</div>
								</div>

								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="headquarters">Corporet Office</label>
								   		<input type="text" name="headquarters" class="form-control" placeholder="Corporet Office">
								   	</div>
								</div>

								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="phone">Phone Number</label>
								   		<input type="text" name="phone" class="form-control" placeholder="Phone Number">
								   	</div>
								</div>

								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="email">Email Number</label>
								   		<input type="email" name="email" class="form-control" placeholder="Email Number">
								   	</div>
								</div>

								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="parent">Group Name</label>
								   		<input type="text" name="parent" class="form-control" placeholder="Group Number">
								   	</div>
								</div>


								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="website">Website Address</label>
								   		<input type="text" name="website" class="form-control" placeholder="Website Address">
								   	</div>
								</div>


								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="image">Logo<label>
								   		<input type="file" name="image" class="form-control" id="photo" accept="image/*"  required onchange="readURL(this);">
				                        <img id="image" src="#" />
								   	</div>
								</div>

								<div class="col-md-12">
								   	<div class="form-group">
								   		<label for="address">Address</label>
								   		<textarea name="address" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
								   	</div>
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

