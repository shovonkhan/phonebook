
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> --}}
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
		<!-- Default box -->
    	<div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Title</h3>
	          <a href="{{ route('lc.create')}}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
		              <h3 class="box-title">Employee List</h3>
		            </div>
	            <!-- /.box-header -->
		            <div class="box-body">
		            	<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>lc Logo</th>
									<th>lc Name</th>
									<th>lc Type</th>
									<th>lc Headquarters</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($lcs as $lc)
								<tr>
									<td> <img src="{{ asset('images/'.$lc->image) }}" class="img-responsive thumbnail" style="width: 70px; height: 70px;"> </td>
									<td>{{ $lc->customer }}</td>
									<td>{{ $lc->type }}</td>
									<td>{{ $lc->headquarters }}</td>
									<td>
										<a href="{{ route('lc.show',$lc->customer_id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
										<a href="{{ route('lc.edit',$lc->customer_id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										<form id="delete-form-{{ $lc->customer_id }}" action="{{ route('lc.destroy', $lc->customer_id) }}" method="post" style="display: none;">
		                          		{{ csrf_field() }}
		                          		{{ method_field('DELETE') }}
		                          
					                    </form>
					                    <a href="" onclick="
					                         if(confirm('Are you sure, You Want to Delete this?'))
					                         {
					                             event.preventDefault();
					                             document.getElementById('delete-form-{{ $lc->customer_id }}').submit();
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

