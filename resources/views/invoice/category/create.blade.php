<!DOCTYPE html>
<html>
	<head>
	  <title>Branch Add</title>
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
		<div class="container-fluid">
			{{-- Main Navbar start --}}
			@include('navbar')
			{{-- Main Navbar end --}}
		</div>
		<div class="container box">
  			<div class="row">
  				<div class="col-md-10 col-md-offset-1">
  					<div class="panel panel-primary">
  						<div class="panel-heading">
  							<h2>Category</h2>
  						</div>
  						<div class="panel-body">
  							@include('includes.messages')
							<form action="{{ route('category.store') }}" method="post">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="name">Category Name</label>
											<input type="text" class="form-control" name="name" placeholder="Category Name">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea name="descripiton" class="form-control" id="editor1" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" class="btn btn-info btn-sm" value="Save">
										</div>
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

