
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
	          <a href="{{ route('chemical-inventory.create') }}" class="col-lg-offset-5 btn btn-info">Add New</a>

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
		              <h3 class="box-title">Chemical Receive</h3>
		            </div>
				<table id="example1" class="table table-bordered table-responsive table-hover display">
					<thead>
						<tr>
							<th>Date</th>
							<th>Chemical Name</th>
							<th>Quantity</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($chemicalInventory as $chem)
						<tr>
							<td>{{ $chem->date }}</td>
							<td>{{ $chem->name }}</td>
							<td>{{ $chem->qty }}</td>
							<td>
								<a href="{{ route('chemical-inventory.show',$chem->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="{{ route('chemical-inventory.edit',$chem->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
			                    <a href="{{ URL::to('chemical-inventory-delete/'.$chem->id) }}" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</section>
</div>


@endsection

