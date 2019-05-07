<!DOCTYPE html>
<html>
	<head>
	  <title>consumption Add</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" />
	  <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
	  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
	  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			{{-- Main Navbar start --}}
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">Office</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="#">Link <span class="sr-only">(current)</span></a></li>
			        <li class="dropdown active">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chemical <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('chemical.index') }}">View List</a></li>
			            <li><a href="{{ route('chemical.create') }}">Add New</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bank <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('bank.index') }}">View List</a></li>
			            <li><a href="{{ route('bank.create') }}">Add New</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Branch <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('branch.index') }}">View List</a></li>
			            <li><a href="{{ route('branch.create') }}">Add New</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventory <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="{{ route('inventory.index') }}">View List</a></li>
			            <li><a href="{{ route('inventory.create') }}">Add New</a></li>
			          </ul>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#">Link</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			{{-- Main Navbar end --}}
		</div>
	<div class="container box">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a href="{{ route('consumption.create') }}" class="btn btn-primary">Add New</a>
				<hr/>
				<table id="example" class="table table-bordered table-responsive table-hover display">
					<thead>
						<tr>
							<th>Date</th>
							<th>Lot No</th>
							<th>Buyer</th>
							<th>Color</th>
							<th>Count</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($consumptions as $consump)
						<tr>
							<td>{{ $consump->date }}</td>
							<td>{{ $consump->lot_no }}</td>
							<td>{{ $consump->buyer }}</td>
							<td>{{ $consump->color }}</td>
							<td>{{ $consump->yarn_count }}</td>
							<td>
								<a href="{{ route('consumption.show',$consump->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="{{ route('consumption.edit',$consump->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<form id="delete-form-{{ $consump->id }}" action="{{ route('consumption.destroy', $consump->id) }}" method="post" style="display: none;">
                          		{{ csrf_field() }}
                          		{{ method_field('DELETE') }}
                          
			                    </form>
			                    <a href="" onclick="
			                         if(confirm('Are you sure, You Want to Delete this?'))
			                         {
			                             event.preventDefault();
			                             document.getElementById('delete-form-{{ $consump->id }}').submit();
			                         }
			                         else{
			                             event.preventDefault();
			                         }
			                         " class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable( {
		        dom: 'Bfrtip',
		        buttons: [
		            {
		                extend: 'print',
		                customize: function ( win ) {
		                    $(win.document.body)
		                        .css( 'font-size', '10pt' )
		                        .prepend(
		                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
		                        );
		 
		                    $(win.document.body).find( 'table' )
		                        .addClass( 'compact' )
		                        .css( 'font-size', 'inherit' );
		                }
		            }
		        ]
		    } );
		} );
	</script>
 </body>
</html>

