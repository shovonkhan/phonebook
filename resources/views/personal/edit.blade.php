<!DOCTYPE html>
<html>
	<head>
	  <title>Personal Add</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
	  <!-- Select2 -->
  	  <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
	  <!-- Select2 -->
	  <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
	</head>
	<body>
  	<br />
		<div class="container box">
  			<div class="row">
  				<div class="col-md-10 col-md-offset-1">
  					<div class="panel panel-primary">
  						<div class="panel-heading">
  							<h2>Personal Information</h2>
  						</div>
  						<div class="panel-body">
  							@include('includes.messages')
							<form action="{{ route('personal.update',$personal->id) }}" method="post" enctype="multipart/form-data">
						   		{{ csrf_field() }}
						   		{{ method_field('PUT') }}
						   		<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="name">Name</label>
								   		<input type="text" name="name" class="form-control" placeholder="Name" value="{{ $personal->name }}">
								   	</div>
								</div>
						   		<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="designation">Designation</label>
								   		<input type="text" name="designation" class="form-control" placeholder="Designation" value="{{ $personal->designation }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="company">Company</label>
								   		<select name="company" class="form-control">
								   			<option>Select One</option>
								   			@foreach($company as $comp)
								   			<option value="{{ $comp->name }}" {{ $comp->name === $personal->company ? 'selected' : '' }}>{{ $comp->name }}</option>
								   			@endforeach
								   		</select>
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="h_education">Last Education</label>
								   		<input type="text" name="h_education" class="form-control" placeholder="Last Education" value="{{ $personal->h_education }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="phone">Phone Number</label>
								   		<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ $personal->phone }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="email">Email</label>
								   		<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $personal->email }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="p_address">Present Address</label>
								   		<input type="text" name="p_address" class="form-control" placeholder="Present Address" value="{{ $personal->p_address }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="c_address">Parmanent Address</label>
								   		<input type="text" name="c_address" class="form-control" placeholder="Parmanent Address" value="{{ $personal->c_address }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="dob">Date of Birth</label>
								   		<input type="date" name="dob" class="form-control" placeholder="Date of Birth" value="{{ $personal->dob }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="salery">Salery</label>
								   		<input type="text" name="salery" class="form-control" placeholder="Salery" value="{{ $personal->salery }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="join_date">Joining Date</label>
								   		<input type="date" name="join_date" class="form-control" placeholder="Joining Date" value="{{ $personal->join_date }}">
								   	</div>
								</div>
								<div class="col-md-4">
								   	<div class="form-group">
								   		<label for="image">Profile Picture</label>
								   		<input type="file" name="image" class="form-control" value="{{ $personal->image }}">
								   	</div>
								</div>
								<div class="col-md-12">
								   	<div class="form-group">
								   		<label for="baiodata">Baio Data</label>
								   		<textarea name="baiodata" class="form-control" id="editor1" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $personal->baiodata }}</textarea>
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
		<script>
		  $(function () {
		    // Replace the <textarea id="editor1"> with a CKEditor
		    // instance, using default configuration.
		    CKEDITOR.replace('editor1')
		    //bootstrap WYSIHTML5 - text editor
		    $('.textarea').wysihtml5()
		  })
		</script>
	</body>
</html>

