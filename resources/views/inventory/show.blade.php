<!DOCTYPE html>
<html>
	<head>
	  <title>Inventory</title>
	  <meta name="csrf-token" content="{{ csrf_token() }}">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
 <body>
  <br />
	<div class="container box">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="{{ route('inventory.create') }}" class="btn btn-primary">Add New</a>
				<a href="{{ route('inventory.index') }}" class="btn btn-info">Back</a>
				<a href="{{ route('inventory.edit',$inventory->id) }}" class="btn btn-info">Update</a>
				<hr/>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2>Company Name : {{ $inventory->company }}</h2>
						Inventory Of Cheque Number : <strong>{{ $inventory->chq_no }}</strong>
					</div>
					<div class="panel-body">
						<div class="col-md-8 col-md-offset-2">
							<img src="{{ asset('images/'.$inventory->image) }}" class="img-responsive thumbnail">
						</div>
						<div class="col-md-6">
							<ul class="list-group">
							  <li class="list-group-item list-group-item-success"><strong> Bank Name :</strong></li>
							  <li class="list-group-item list-group-item-success"><strong> Company Name :</strong></li>
							  <li class="list-group-item list-group-item-info"><strong> Branch Name :</strong></li>
							  <li class="list-group-item list-group-item-warning"><strong> Chaque Nunmber :</strong></li>
							  <li class="list-group-item list-group-item-success"><strong> Date :</strong></li>
							  <li class="list-group-item list-group-item-danger"><strong> Amount :</strong></li>
							  <li class="list-group-item list-group-item-info"><strong> Permission Date :</strong></li>
							  <li class="list-group-item list-group-item-warning"><strong> Permission By :</strong></li>
							  <li class="list-group-item list-group-item-danger"><strong> Purpose :</strong></li>
							  <li class="list-group-item list-group-item-success"><strong> Status :</strong></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="list-group">
							  <li class="list-group-item list-group-item-success">{{ $inventory->company }}</li>
							  <li class="list-group-item list-group-item-success">{{ $inventory->bank }}</li>
							  <li class="list-group-item list-group-item-info">{{ $inventory->branch }}</li>
							  <li class="list-group-item list-group-item-warning">{{ $inventory->chq_no }}</li>
							  <li class="list-group-item list-group-item-success">{{ $inventory->s_date }}</li>
							  <li class="list-group-item list-group-item-danger">{{ $inventory->amount }}</li>
							  <li class="list-group-item list-group-item-info">{{ $inventory->permission_date }}</li>
							  <li class="list-group-item list-group-item-warning">
							  	@if($inventory->permission_by == 0)
								<button class="btn btn-success btn-xs">Phone</button>
								@elseif($inventory->permission_by == 1)
								<button class="btn btn-danger btn-xs">Office</button>
								@elseif($inventory->permission_by == 2)
								<button class="btn btn-warning btn-xs">Md Sir</button>
								@endif
							  </li>
							  <li class="list-group-item list-group-item-danger">{{ $inventory->purpose }}</li>
							  <li class="list-group-item list-group-item-success">
							  	@if($inventory->status == 1)
								<button class="btn btn-success btn-xs">Approved</button>
								@elseif($inventory->status == 2)
								<button class="btn btn-danger btn-xs">Cancel</button>
								@elseif($inventory->status == 0)
								<button class="btn btn-warning btn-xs">Hold</button>
								@endif
							  </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>

