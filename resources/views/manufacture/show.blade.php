
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
		<div class="container box box-info">
			<div class="box-header with-border">
	              <h3 class="box-title">Removable</h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              </div>
	              <!-- /.box-tools -->
	        </div>

	        <div class="box-body">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<a href="{{ route('manufacture.create') }}" class="btn btn-primary">Add New</a>
						<a href="{{ route('manufacture.index') }}" class="btn btn-info">Back</a>
						<a href="{{ route('manufacture.edit',$manufacture->id) }}" class="btn btn-info">Update</a>
						<hr/>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h2>Manufacture Name : {{ $manufacture->manufacture_name }}</h2>
								<strong>Manufacture Details : {!! htmlspecialchars_decode($manufacture->description) !!}</strong>
							</div>
							<div class="panel-body">
								<div class="col-md-6">
									<ul class="list-group">
									  <li class="list-group-item list-group-item-success"><strong> Manufacture Name :</strong></li>
									  <li class="list-group-item list-group-item-danger"><strong> Description :</strong></li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul class="list-group">
									  <li class="list-group-item list-group-item-success">{{ $manufacture->manufacture_name }}</li>
									  <li class="list-group-item list-group-item-success">{!! htmlspecialchars_decode($manufacture->description) !!}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection

