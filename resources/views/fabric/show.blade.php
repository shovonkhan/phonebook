@extends('layouts.main')

@section('main-contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fabric Deshboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fabric page</li>
      </ol>
    </section>

	<!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
              		<div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Add a new Fabric</h3>
			            </div>
			            <div class="box-body">
			            	<table class="table table-bordered table-responsive table-hover display">
							<thead>
								<tr>
									<th>Fabric Name</th>
									<td>{{$fabrics->fabric_name}}</td>
								</tr>
								<tr>
									<th>Fabric Type</th>
									<td>{{$fabrics->fabric_type}}</td>
								</tr>
								<tr>
									<th>Fabric Color</th>
									<td>{{$fabrics->color}}</td>
								</tr>
								<tr>
									<th>Lot</th>
									<td>{{$fabrics->lot}}</td>
								</tr>
								<tr>
									<th>Unit</th>
									<td>{{$fabrics->unit}}</td>
								</tr>
								<tr>
									<th>Buyer Name</th>
									<td>{{$fabrics->buyer_name}}</td>
								</tr>
								<tr>
									<th>GSM</th>
									<td>{{$fabrics->gsm}}</td>
								</tr>
								<tr>
									<th>Grade</th>
									<td>{{$fabrics->grade}}</td>
								</tr>
								<tr>
									<th>Construction</th>
									<td>{{$fabrics->construction}}</td>
								</tr>
								<tr>
									<th>Status</th>
									<td>
										@if($fabrics->status == 0)
											<button class="btn btn-warning btn-xs">Unactive</button>
										@else
											<button class="btn btn-success btn-xs">Active</button>
										@endif
									</td>
								</tr>
								<tr>
									<th>Remarks</th>
									<td>{{$fabrics->remarks}}</td>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
			            	
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</section>
</div>
@endsection