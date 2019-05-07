@extends('layouts.main')

@section('main-contain')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Yarn Receive
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Yarn Receive</h3>
          <a href="{{ URL::to('/yarn-receive-create') }}" class="col-lg-offset-5 btn btn-info">Add New</a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        	<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Yarn Receive</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Date</th>
								<th>Bill</th>
								<th>Count</th>
								<th>Manufactur</th>
								<th>Qty</th>
								<th>Rate</th>
								<th>Amount</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($yarn_receive_list as $list)
							<tr>
								<td>{{ $list->date }}</td>
								<td>{{ $list->bill }}</td>
								<td>{{ $list->productname }}</td>
								<td>{{ $list->manufacture_name }}</td>
								<td>{{ $list->qty }} kg</td>
								<td>{{ $list->price }}</td>
								<td>{{ $list->amount }}</td>
								<td>
									<a href="{{ URL::to('yarn-receive-show/'.$list->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
									<a href="{{ route('receive.edit',$list->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									<form id="delete-form-{{ $list->id }}" action="{{ route('receive.destroy', $list->id) }}" method="post" style="display: none;">
	                          		{{ csrf_field() }}
	                          		{{ method_field('DELETE') }}
	                          
				                    </form>
				                    <a href="" onclick="
				                         if(confirm('Are you sure, You Want to Delete this?'))
				                         {
				                             event.preventDefault();
				                             document.getElementById('delete-form-{{ $list->id }}').submit();
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
	</div>
</section>
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
@endsection

