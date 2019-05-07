
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- bootstrap datepicker -->
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
  				<div class="col-md-10 col-md-offset-1">
  					<div class="panel panel-primary">
  						<div class="panel-heading">
  							<h2>Personal Information</h2>
  						</div>
  						<div class="panel-body">
  							@include('includes.messages')
							<form action="{{ route('personal.store') }}" method="post" enctype="multipart/form-data">
						   		{{ csrf_field() }}
						   		<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="name">Name</label>
								   		<input type="text" name="name" class="form-control" placeholder="Name">
								   	</div>
								</div>
						   		<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="designation">Designation</label>
								   		<input type="text" name="designation" class="form-control" placeholder="Designation">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="company">Company</label>
								   		<select name="company" class="form-control">
								   			<option>Select One</option>
								   			@foreach($company as $comp)
								   			<option value="{{ $comp->name }}">{{ $comp->name }}</option>
								   			@endforeach
								   		</select>
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="h_education">Last Education</label>
								   		<input type="text" name="h_education" class="form-control" placeholder="Last Education">
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
								   		<label for="email">Email</label>
								   		<input type="email" name="email" class="form-control" placeholder="Email">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="p_address">Present Address</label>
								   		<input type="text" name="p_address" class="form-control" placeholder="Present Address">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="c_address">Parmanent Address</label>
								   		<input type="text" name="c_address" class="form-control" placeholder="Parmanent Address">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="dob">Date of Birth</label>
								   		<input type="text" name="dob" id="datepicker" class="form-control" placeholder="Date Of Birth">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="salery">Salery</label>
								   		<input type="text" name="salery" class="form-control" placeholder="Salery">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="join_date">Joining Date</label>
								   		<input type="text" name="join_date" class="form-control" placeholder="Joining Date"  id="datepickerJ">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="image">Profile Picture</label>
								   		<input type="file" name="image" class="form-control" id="photo"  accept="image/*"  required onchange="readURL(this);">
									   	<br>
									   	<img id="image" src="#" />
									   	<br>
								   	</div>
								</div>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<label for="baiodata">Baio Data</label>
								   		<textarea name="baiodata" class="form-control" id="editor1" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
