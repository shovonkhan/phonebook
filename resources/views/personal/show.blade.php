<!DOCTYPE html>
<html>
	<head>
	  <title>Personal Info</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
 <body>
  <br />
	<div class="container box">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="{{ route('personal.create') }}" class="btn btn-primary">Add New</a>
				<a href="{{ route('personal.index') }}" class="btn btn-info">Back</a>
				<a href="{{ route('personal.edit',$personal->id) }}" class="btn btn-info">Update</a>
				<hr/>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2>Company Name : {{ $personal->name }}</h2>
						Designation : <strong>{{ $personal->designation }}</strong>
					</div>
					<div class="panel-body">
						<div class="col-md-8 col-md-offset-2 text-center">
							<img src="{{ asset('images/'.$personal->image) }}" class="img-responsive thumbnail">
						</div>
						<table class="table table-responsive table-bordered table-hover">
							<tr class="success">
								<th>Name</th>
								<td>{{ $personal->name }}</td>
							</tr>
							<tr class="warning">
								<th>Designation</th>
								<td>{{ $personal->designation }}</td>
							</tr>
							<tr class="danger">
								<th>Last Education</th>
								<td>{{ $personal->h_education }}</td>
							</tr>
							<tr class="info">
								<th>Phone Numbar</th>
								<td>{{ $personal->phone }}</td>
							</tr>
							<tr class="active">
								<th>Email</th>
								<td>{{ $personal->email }}</td>
							</tr>
							<tr class="success">
								<th>Present Address</th>
								<td>{{ $personal->p_address }}</td>
							</tr>
							<tr class="info">
								<th>Permanent Address</th>
								<td>{{ $personal->c_address }}</td>
							</tr>
							<tr class="warning">
								<th>Company</th>
								<td>{{ $personal->company }}</td>
							</tr>
							<tr class="danger">
								<th>Salery</th>
								<td>{{ $personal->salery }}</td>
							</tr>
							<tr class="success">
								<th>Joining Date</th>
								<td>{{ $personal->join_date }}</td>
							</tr>
							<tr class="active">
								<th>Date Of Birth</th>
								<td>{{ $personal->dob }}</td>
							</tr>
						</table>
						<div class="well col-md-12">
							<h2>Baio Data Of <strong>{{ $personal->name }}</strong></h2>
							<p>{!! htmlspecialchars_decode($personal->baiodata) !!}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>

