
@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fabrics Deshboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Fabrics page</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
    	<!-- Default box -->
	    <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Fabrics</h3>
	          <a href="{{ route('fabric.create') }}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
		              <h3 class="box-title">Fabric List</h3>
		            </div>
			
					{{-- <table id="example1" class="table table-bordered table-responsive table-hover display">
						<thead>
							<tr>
								<th>Fabric Name</th>
								<th>Fabric Type</th>
								<th>Stock</th>
								<th>Fabric Color</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($fabrics as $fabric)
							<tr>
								<td>{{ $fabric->fabric_code }}</td>
								<td>{{ $fabric->fabric_type }}</td>
								<td>{{ $fabric->opening_stock }}</td>
								<td>{{ $fabric->color }}</td>
								<td>
									<a href="{{ route('fabric.show',$fabric->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>

									<a href="{{ route('fabric.edit',$fabric->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

									<a href="{{ URL::to('fabric-delete/'.$fabric->id) }}" class="btn btn-xs btn-danger" id="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

									
								</td>
							</tr>
							@endforeach
						</tbody>
					</table> --}}
				</div>
			</div>
		</div>
	</section>
</div>


@endsection

