
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
	          <a href="{{ route('bank.create') }}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
		              <h3 class="box-title">Banks List</h3>
		            </div>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<a href="{{ route('company.create') }}" class="btn btn-primary">Add New</a>
							<hr/>
							<table id="example1" class="table table-bordered table-responsive table-hover display">
								<thead>
									<tr>
										<th>Image</th>
										<th>Company Name</th>
										<th>Managing Director</th>
										<th>Chairman</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($companies as $company)
									<tr>
										<td><img src="{{ URL::to($company->image) }}" class="img-responsive thumbnail" style="width: 70px; height: 70px;"> </td>
										<td>{{ $company->name }}</td>
										<td>{{ $company->managing_director }}</td>
										<td>{{ $company->chairman }}</td>
										<td>
											<a href="{{ route('company.show',$company->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
											<a href="{{ route('company.edit',$company->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						                    <a href="{{ URL::to('company-delete/'.$company->id) }}" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
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

