
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
				<div class="col-md-12">
					<a href="{{ route('receive.create') }}" class="btn btn-primary">Add New</a>
					<a href="{{ route('receive.index') }}" class="btn btn-info">Back</a>
					<a href="{{ route('receive.edit',$receive->id) }}" class="btn btn-warning">Update</a>
					<hr/>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h2>Company Name : {{ $receive->manufactur }}</h2>
							receive Address : <strong>{{ $receive->headquarters }}</strong>
						</div>
						<div class="panel-body">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>

@endsection