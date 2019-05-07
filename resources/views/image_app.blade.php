<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Image Croppar</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="app"><br/>
		<div class="container col-lg-offset-4 col-lg-4">
			<div class="row">
				@if(count($errors))
					@foreach($errors->all() as $error)
						<span class="text-danger">{{ $error }}</span>
					@endforeach
				@endif
				<form action="{{ route('upload') }}" method="post" accept-charset="utf-8" enctype="Multipart/form-data">
					{{ csrf_field() }}
					<input type="file" name="image">
					<img src="{{ asset('images/shovon.jpg') }}" alt="Image">
					<input type="submit" value="Upload" class="btn btn-success">
				</form>
				
			</div>
		</div>
	</div>	

	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
