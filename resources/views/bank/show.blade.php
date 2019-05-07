
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
	<div class="container box box-success">
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
					<a href="{{ route('bank.create') }}" class="btn btn-primary">Add New</a>
					<a href="{{ route('bank.index') }}" class="btn btn-info">Back</a>
					<a href="{{ route('bank.edit',$bank->id) }}" class="btn btn-warning">Update</a>
					<hr/>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h2>Company Name : {{ $bank->name }}</h2>
							Bank Address : <strong>{{ $bank->headquarters }}</strong>
						</div>
						<div class="panel-body">
							<div class="col-md-8 col-md-offset-2">
								<img src="{{ URL::to($bank->image) }}" class="img-responsive thumbnail">
							</div>
							<div class="col-md-6">
								<ul class="list-group">
								  <li class="list-group-item list-group-item-success"><strong> Bank Name :</strong></li>
								  <li class="list-group-item list-group-item-danger"><strong> Type :</strong></li>
								  <li class="list-group-item list-group-item-info"><strong> Bank Type :</strong></li>
								  <li class="list-group-item list-group-item-warning"><strong> Chairman Name :</strong></li>
								  <li class="list-group-item list-group-item-success"><strong> Managing Director :</strong></li>
								  <li class="list-group-item list-group-item-danger"><strong> Established :</strong></li>
								  <li class="list-group-item list-group-item-info"><strong> Phone Number :</strong></li>
								  <li class="list-group-item list-group-item-warning"><strong> WebSite Address :</strong></li>
								</ul>
							</div>
							<div class="col-md-6">
								<ul class="list-group">
								  <li class="list-group-item list-group-item-success">{{ $bank->name }}</li>
								  <li class="list-group-item list-group-item-danger">{{ $bank->type }}</li>
								  <li class="list-group-item list-group-item-info">
								  	@if($bank->bank_type == 1)
								  	<button class="btn btn-success btn-xs">Govment</button>
								  	@elseif( $bank->bank_type == 2 )
								  	<button class="btn btn-info btn-xs">Privet</button>
								  	@endif
								  </li>
								  <li class="list-group-item list-group-item-warning">{{ $bank->chairman }}</li>
								  <li class="list-group-item list-group-item-success">{{ $bank->managing_director }}</li>
								  <li class="list-group-item list-group-item-danger">{{ $bank->established }}</li>
								  <li class="list-group-item list-group-item-info">{{ $bank->phone }}</li>
								  <li class="list-group-item list-group-item-warning"> {{ $bank->website }}</li>
								</ul>
							</div>
							<div class="well col-md-12">
								<h2>History Of {{ $bank->name }}</h2>
								<p>{!! htmlspecialchars_decode($bank->history) !!}</p>
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


