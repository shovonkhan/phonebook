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
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="{{ route('company.create') }}" class="btn btn-primary">Add New</a>
				<a href="{{ route('company.index') }}" class="btn btn-info">Back</a>
				<a href="{{ route('company.edit',$company->id) }}" class="btn btn-info">Update</a>
				<hr/>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2>Company Name : {{ $company->name }}</h2>
						Corporate Office : <strong>{{ $company->headquarters }}</strong>
					</div>
					<div class="panel-body">
						<div class="col-md-8 col-md-offset-2">
							<img src="{{ URL::to($company->image) }}" class="img-responsive thumbnail">
						</div>
						<div class="col-md-6">
							<ul class="list-group">
							  <li class="list-group-item list-group-item-success"><strong> Company Name :</strong></li>
							  <li class="list-group-item list-group-item-info"><strong> Company Type :</strong></li>
							  <li class="list-group-item list-group-item-warning"><strong> Managing Director :</strong></li>
							  <li class="list-group-item list-group-item-danger"><strong> Chairman :</strong></li>
							  <li class="list-group-item list-group-item-success"><strong> Established :</strong></li>
							  <li class="list-group-item list-group-item-info"><strong> Corporate Office :</strong></li>
							  <li class="list-group-item list-group-item-warning"><strong> Phone :</strong></li>
							  <li class="list-group-item list-group-item-danger"><strong> Group Name :</strong></li>
							  <li class="list-group-item list-group-item-success"><strong> Email Address :</strong></li>
							  <li class="list-group-item list-group-item-info"><strong> WebSite Address :</strong></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="list-group">
							  <li class="list-group-item list-group-item-success">{{ $company->name }}</li>
							  <li class="list-group-item list-group-item-info">
							  	@if($company->type == 1)
								<button class="btn btn-success btn-xs">Industrial</button>
								@elseif($company->type == 2)
								<button class="btn btn-info btn-xs">Export</button>
								@endif
							  </li>
							  <li class="list-group-item list-group-item-warning">{{ $company->managing_director }}</li>
							  <li class="list-group-item list-group-item-danger">{{ $company->chairman }}</li>
							  <li class="list-group-item list-group-item-success">{{ $company->established }}</li>
							  <li class="list-group-item list-group-item-info">{{ $company->headquarters }}</li>
							  <li class="list-group-item list-group-item-warning">{{ $company->phone }}</li>
							  <li class="list-group-item list-group-item-danger">{{ $company->parent }}</li>
							  <li class="list-group-item list-group-item-success">{{ $company->email }}</li>
							  <li class="list-group-item list-group-item-info">{{ $company->website }}</li>
							</ul>
						</div>
						<div class="col-md-12">
							<div class="well">
								<h2>Address of {{ $company->name }}</h2>
								<p>{!! htmlspecialchars_decode($company->address) !!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

