<!DOCTYPE html>
<html>
	<head>
	  <title>Proforma Invoice</title>
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
							<th>Customer ID</th>
							<th>Buyer Name</th>
							<th>Product</th>
							<th>Customer Name</th>
							<th>Master LC NO</th>
							<th>PI NO</th>
							<th>PI Date</th>
							<th>Rate</th>
							<th>Qty</th>
							<th>Amount</th>
							<th>T Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($all_product_info as $lc)
						<tr>
							<td>{{ $lc->customer_id }}</td>
							<td>{{ $lc->customer }}</td>
							<td>{{ $lc->productname }}</td>
							<td>{{ $lc->pi_to }}</td>
							<td>{{ $lc->master_lc_no }}</td>
							<td>{{ $lc->pi_no }}</td>
							<td>{{ $lc->pi_date }}</td>
							<td>$ {{ $lc->price }}</td>
							<td>{{ $lc->qty }}</td>
							<td><a href="{{ URL::to('/products/info/'.$lc->cus_id) }}" >$ {{ $lc->amount }}</a></td>
							<td>$ {{ $lc->total_amount }}</td>
							<td><a href="{{ route('show_info',$lc->customer_id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
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

