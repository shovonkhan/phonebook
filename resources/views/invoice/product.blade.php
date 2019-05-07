<!DOCTYPE html>
<html>
	<head>
	  <title>Bank Add</title>
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
			@include('navbar')
			{{-- Main Navbar end --}}
		</div>
	<div class="container box">
		<div class="row">
			<div class="col-md-12">
				@include('invoice.add_new_product')
				{{-- <a href="{{ URL::route('info') }}" class="btn btn-primary">Add New</a> --}}
				<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#new-product-add">Add New Product</button>
				<hr/>
				<table id="example" class="table table-bordered table-responsive table-hover display">
					<thead>
						<tr>
							<th width="5px">ID</th>
							<th>Rate Date</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Rate</th>
							<th>Qty</th>
							<th>Company Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td width="5px">{{ $product->id }}</td>
							<td>{{ $product->p_date }}</td>
							<td>{{ $product->productname }}</td>
							<td>{{ $product->category }}</td>
							<td>$ {{ $product->price }}</td>
							<td>$ {{ $product->qty }}</td>
							<td>{{ $product->company }}</td>
							<td>
								<a href="{{ route('product-list.show',$product->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="{{ route('product-list.edit',$product->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<form id="delete-form-{{ $product->id }}" action="{{ route('product-list.destroy', $product->id) }}" method="post" style="display: none;">
                          		{{ csrf_field() }}
                          		{{ method_field('DELETE') }}
                          
			                    </form>
			                    <a href="" onclick="
			                         if(confirm('Are you sure, You Want to Delete this?'))
			                         {
			                             event.preventDefault();
			                             document.getElementById('delete-form-{{ $product->id }}').submit();
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

